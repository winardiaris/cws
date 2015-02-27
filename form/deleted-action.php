<?php
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "delperson"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `person` WHERE `file_no`='$file_no' AND `active`='3' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `ia` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delse"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `se` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delbia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `bia` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delhr"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `hr` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}


?>
