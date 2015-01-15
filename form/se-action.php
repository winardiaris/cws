<?php
include ("../inc/conf.php");
$op = $_GET['op'];
$file_no = $_GET['file_no'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `se` WHERE `file_no`='$file_no';") or die(mysql_error());
	
	$person = mysql_fetch_array($qry);
	$se = mysql_fetch_array($qry2);
	
	if($person['ada'] > 0 AND $se['ada'] > 0){
		echo "inuse";
	}
	elseif($person['ada'] > 0 AND $se['ada'] == 0){
		echo "avail";
	}
	elseif($person['ada'] == 0 AND $se['ada'] == 0){
		echo "nodata";
	}
}
elseif($op == "addassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `se` (`file_no`,`doa`,`assessment_data`,`created`) VALUES('$file_no','$doa','$value','$NOW') ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "saveback"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `se` SET `background_info`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savelivinga"){
	$file_no = $_GET['file_no'];
	$living_env = htmlspecialchars($_GET['living_env']);
	$living_cond = htmlspecialchars($_GET['living_cond']);
	$sec_neigh = htmlspecialchars($_GET['sec_neigh']);
	$phnn = htmlspecialchars($_GET['phnn']);
	$save = mysql_query(" UPDATE `se` SET `living_env`='$living_env', `living_cond`='$living_cond',`sec_neigh`='$sec_neigh',`phnn`='$phnn', `last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}

?>
