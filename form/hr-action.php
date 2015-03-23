<?php
$file_id = 6;
include ("../inc/conf.php");
include ("function.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$id_data = $_GET['id_data'];
    
   $qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$person = mysql_fetch_array($qry);

		if($person['ada']>0){
			//cek first assessment
			$qry2 = mysql_query(
						"SELECT COUNT(*) AS `ada` FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' AND `id_data`='0';"
						) or die(mysql_error());
			$hr = mysql_fetch_array($qry2);
			
			//new assessment
			if($id_data==0){
				if($hr['ada']>0){echo "inuse";} //new assessment (sudah ada)
				else{echo "avail";}	 //new assessment (tersedia)
			}
			//reassessment
			elseif($id_data==1){
				if($hr['ada']>0){echo "avail";}  //re-assessment (tersedia)
				else{echo "nodatahr";} //re-assessment (ditolak) karena belum ada HR
			}
		}
		//person belum ada
		else{echo "nodataperson";}	
}
elseif($op=="getID"){
	$file_no = $_GET['file_no'];
	$q = mysql_query("SELECT max(`hr_id`) as `hr_id` FROM `hr` WHERE `file_no`='$file_no' ")or die(mysql_error());
	$d = mysql_fetch_array($q);
	echo $d['hr_id'];
}
elseif($op=="getData"){
	$file_no = $_GET['file_no'];
	$q1 = mysql_query("SELECT * FROM `person` WHERE `file_no`='$file_no' ")or die(mysql_error());
	$d1 =mysql_fetch_array($q1);
	echo '<option value="'.$file_no.'" selected >'.$d1['name'].'</option>';
	
	$q2 = mysql_query("SELECT * FROM `reported_family` WHERE `file_no`='$file_no' ")or die(mysql_error());
	while($d = mysql_fetch_array($q2)){
		$pecah = explode(";",$d['value']);
		$name2 = $pecah[0];
		echo '<option value="'.$file_no.".".$d['id'].'">'.$name2.'</option>';
	}
}
elseif($op=="getHRData"){
	$hr_id = $_GET['hr_id'];
	$person_id = $_GET['person_id'];
	$q = mysql_query("SELECT * FROM `hr_data` WHERE  `hr_id`='$hr_id' AND `person_id`='$person_id'")or die(mysql_error());
	$d = mysql_fetch_array($q);
	
	echo Balikin($d['situation'])."|||".Balikin($d['hr1'])."|||".Balikin($d['hr2'])."|||".Balikin($d['hr3'])."|||".Balikin($d['hr4'])."|||".Balikin($d['hr5'])."|||".Balikin($d['hr6'])."|||".Balikin($d['hr7']);
}

elseif($op=="save_basic"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$location = UbahSimbol($_GET['location']);
	$ics = UbahSimbol($_GET['ics']);
	$id_data = $_GET['id_data'];
	$reported = UbahSimbol($_GET['reported']);
	$save = mysql_query("
				INSERT INTO `hr` (`file_no`,`id_data`,`report_date`,`location`,`ics`,`reported`,`created`) 
				VALUES('$file_no','$id_data','$report_date','$location','$ics','$reported','$NOW');"
			) or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save Basic data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="update_basic"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$location = UbahSimbol($_GET['location']);
	$ics = UbahSimbol($_GET['ics']);
	$id_data = $_GET['id_data'];
	$reported = UbahSimbol($_GET['reported']);
	$hr_id = $_GET['hr_id'];
	$save = mysql_query("
				UPDATE  `hr` SET 
				`id_data`='$id_data',
				`report_date`='$report_date',
				`location`='$location',
				`ics`='$ics',
				`reported`='$reported',
				`last_change`='$NOW' 
				WHERE `file_no`='$file_no'
				AND `hr_id`='$hr_id'"
			) or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Update Basic data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}

elseif($op=="save_hr1"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr1`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr1`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Chronology/Situation reported for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr2"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr2`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr2`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Action taken for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr3"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr3`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr3`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Budget estimate for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr4"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr4`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr4`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Risk happened when the recommended procedure is not conducted for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr5"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr5`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr5`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Concomitant illnesses that would affect treatment of the disease for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr6"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr6`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr6`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update How long the procedure will take for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="save_hr7"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = UbahSimbol($_GET['situation']);
	$val = UbahSimbol($_GET['val']);
	
	$cek = mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_errno());
	$ada = mysql_num_rows($cek);
	
	if($ada>0){
		//update
		$save = mysql_query("UPDATE `hr_data` SET `situation`='$situation',`hr7`='$val',`last_change`='$NOW' WHERE `hr_id`='$hr_id' AND `person_id`='$person_id' ")or die(mysql_error());
	}
	else{
		//save
		$save = mysql_query("INSERT INTO `hr_data` (`hr_id`,`person_id`,`situation`,`id_data`,`hr7`,`created`) VALUES ('$hr_id','$person_id','$situation','$id_data','$val','$NOW') ")or die(mysql_error());
	}

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_form","Save/Update Suggestion for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "del"){
	$hr_id = $_GET['hr_id'];
	$del = mysql_query("UPDATE `hr` SET `status`='0' WHERE  `hr_id`='$hr_id' AND `status`='1' ;  ") or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"hr_data","Delete HR data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
?>
