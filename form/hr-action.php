<?php
$file_id = 6;
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	$person = mysql_fetch_array($qry);
	$bia = mysql_fetch_array($qry2);
	
	if($person['ada'] > 0 AND $bia['ada'] > 0){
		echo "inuse";
	}
	elseif($person['ada'] > 0 AND $bia['ada'] == 0){
		echo "avail";
	}
	elseif($person['ada'] == 0 AND $bia['ada'] == 0){
		echo "nodata";
	}
}
elseif($op == "find"){
	$qry=mysql_query("SELECT  `file_no`,`name` FROM `person` WHERE `active`='1'") or die(mysql_error());
	while($data=mysql_fetch_array($qry)){
		echo '<option value="'.$data['file_no'] .'">'.$data['file_no'] .'</option>';
		echo '<option value="'.$data['file_no'] .'">'.$data['name'] .'</option>';
	}
}
elseif($op == "getdata"){
	$file_no = $_GET['file_no'];
	$qry=mysql_query("	SELECT  `person`.`name`,`master_country`.`country_name` AS `coo` ,`person`.`phone`,`person`.`dob`,`person`.`sex`,`person`.`status`
						FROM `person`
						INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id`	 WHERE `person`.`file_no`='$file_no'") or die(mysql_error());
	$data=mysql_fetch_array($qry);
	echo $data['name'].",".$data['coo'].",".$data['phone'].",".$data['dob'].",".$data['sex'].",".$data['status'];
	
}
elseif($op=="savehr1"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `hr` (`file_no`,`report_date`,`basic`,`created`) VALUES('$file_no','$report_date','$value','$NOW');") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="updatehr1"){
	$file_no = $_GET['file_no'];
	$report_date = $_GET['report_date'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE `hr` SET `report_date`='$report_date', `basic`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="savehr2"){
	$file_no = $_GET['file_no'];
	$hr1=htmlspecialchars($_GET['hr1']); 
	$hr2=htmlspecialchars($_GET['hr2']); 
	$hr3=htmlspecialchars($_GET['hr3']); 
	$hr4=htmlspecialchars($_GET['hr4']); 
	$hr5=htmlspecialchars($_GET['hr5']); 
	$hr6=htmlspecialchars($_GET['hr6']); 
	$hr7=htmlspecialchars($_GET['hr7']); 
	$save = mysql_query("UPDATE `hr` SET `hr1`='$hr1',`hr2`='$hr2',`hr3`='$hr3',`hr4`='$hr4',`hr5`='$hr5',`hr6`='$hr6',`hr7`='$hr7', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ") or die(mysql_error());
	
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
