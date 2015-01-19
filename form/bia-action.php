<?php
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `bia` WHERE `file_no`='$file_no';") or die(mysql_error());
	
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
elseif($op == "saveassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `bia` (`file_no`,`doa`,`assessment`,`created`) VALUES ('$file_no','$doa','$value','$NOW') ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savehistory"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `personal_history`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no';") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savetoiv"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `toiv`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no';") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "saveedu"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `edu`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no';") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
?>
