<?php
$file_id = 6;
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$id_data = $_GET['id_data'];
    
   $qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$person = mysql_fetch_array($qry);

		if($person['ada']>0){
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
		echo '<option value="'.$d['id'].'">'.$name2.'</option>';
	}
}
elseif($op=="save_basic"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$location = $_GET['location'];
	$ics = $_GET['ics'];
	$id_data = $_GET['id_data'];
	$reported = $_GET['reported'];
	$save = mysql_query("
				INSERT INTO `hr` (`file_no`,`id_data`,`report_date`,`location`,`ics`,`reported`,`created`) 
				VALUES('$file_no','$id_data','$report_date','$location','$ics','$reported','$NOW');"
			) or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}

elseif($op=="update_basic"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE `hr` SET `report_date`='$report_date', `basic`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}

elseif($op=="save_hr1"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr2"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr3"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr4"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr5"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr6"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="save_hr7"){
	$hr_id = $_GET['hr_id'];
	$person_id=$_GET['person_id']; $id_data = $_GET['id_data'];
	$situation = $_GET['situation'];
	$val = $_GET['val'];
	
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

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `hr` SET `status`='0' WHERE  `file_no`='$file_no' AND `status`='1' ;  ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}

?>
