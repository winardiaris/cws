<?php
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "delperson"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `person` WHERE `file_no`='$file_no' AND `active`='3' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "resperson"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `person` SET `active`='1' WHERE `file_no`='$file_no' AND `active`='3' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `ia` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "resia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `ia` SET `status`='1' WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delse"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$del = mysql_query("DELETE FROM `se` WHERE `file_no`='$file_no' AND `status`='0' AND `se_id`='$se_id' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "resse"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$del = mysql_query("UPDATE `se` SET `status`='1' WHERE `file_no`='$file_no' AND `status`='0' AND `se_id`='$se_id' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delbia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `bia` WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "resbia"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `bia` SET `status`='1' WHERE `file_no`='$file_no' AND `status`='0' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "delhr"){
	$file_no = $_GET['file_no'];
	$hr_id = $_GET['hr_id'];
	$del = mysql_query("DELETE FROM `hr` WHERE `file_no`='$file_no' AND `status`='0' AND `hr_id`='$hr_id' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}
elseif($op == "reshr"){
	$file_no = $_GET['file_no'];
	$hr_id = $_GET['hr_id'];
	$del = mysql_query("UPDATE `hr` SET `status`='1'  WHERE `file_no`='$file_no' AND `status`='0' AND `hr_id`='$hr_id' ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}


?>
