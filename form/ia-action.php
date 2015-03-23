<?php
$file_id = 3;
include ("../inc/conf.php");
include ("function.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `ia` WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	$person = mysql_fetch_array($qry);
	$ia = mysql_fetch_array($qry2);
	
	setHistory($_SESSION['user_id'],"ia_form","Check Available for File No [$file_no]",$NOW);
	if($person['ada'] > 0 AND $ia['ada'] > 0){
		echo "inuse";
	}
	elseif($person['ada'] > 0 AND $ia['ada'] == 0){
		echo "avail";
	}
	elseif($person['ada'] == 0 AND $ia['ada'] == 0){
		echo "nodata";
	}
}
elseif($op == "addassessment"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `ia` (`file_no`,`assessment`,`created`) VALUES('$file_no','$value','$NOW') ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Save IA Assessemnt for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "updateassessment"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE  `ia` SET `assessment`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Update IA Assessemnt for File No [$file_no]",$NOW);	
	}
	else{echo "error";}
}
elseif($op == "savelegaldoc"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE `ia` SET `legal_doc`='$value' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Save/Update IA Legal Document for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "addwhomliving"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `with_whom_living` VALUES('','$file_no','$value','$NOW') ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Add IA with whow living for File No [$file_no]",$NOW);
	}
	else{echo "error";}
	
}
elseif($op == "deletewhomliving"){
	$id = $_GET['id'];
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `with_whom_living` WHERE id='".$id."' AND file_no='".$file_no."' ;")or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Delete IA with whow living for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveiadoc"){
	$file_no = $_GET['file_no'];
	$living_env = $_GET['living_env'];
	$living_cond = $_GET['living_cond'];
	$q12 = $_GET['q12'];
	$q34 = $_GET['q34'];
	$q56 = $_GET['q56'];
	$q78 = $_GET['q78'];
	$remarks_staff = $_GET['remarks_staff'];
	
	$save = mysql_query("UPDATE `ia` SET `living_env`='$living_env', `living_cond`='$living_cond', `q12`='$q12', `q34`='$q34', `q56`='$q56', `q78`='$q78', `remarks_staff`='$remarks_staff', `created`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_form","Save/Update IA Current Living Condition for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `ia` SET `status`='0' WHERE  `file_no`='$file_no' AND `status`='1' ;  ") or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"ia_data","Delete IA Data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
?>
