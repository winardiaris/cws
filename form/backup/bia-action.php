<?php
include ("../inc/conf.php");
include ("function.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `bia` WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
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
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save  BIA Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "updateassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$value = htmlspecialchars($_GET['value']);
	
	$save = mysql_query("UPDATE `bia` SET `doa`='$doa', `assessment`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Update  BIA Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savehistory"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `personal_history`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Personal history for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savetoiv"){
	$file_no = $_GET['file_no'];;
	$toiv1 = htmlspecialchars($_GET['toiv1']);
	$toiv2 = htmlspecialchars($_GET['toiv2']);
	$toiv3 = htmlspecialchars($_GET['toiv3']);
	$toiv4 = htmlspecialchars($_GET['toiv4']);
	$toiv5 = htmlspecialchars($_GET['toiv5']);
	$toiv6 = htmlspecialchars($_GET['toiv6']);
	$save = mysql_query(" UPDATE `bia` SET `toiv1`='$toiv1',`toiv2`='$toiv2',`toiv3`='$toiv3',`toiv4`='$toiv4',`toiv5`='$toiv5',`toiv6`='$toiv6',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Types of identified vulnerabilities for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveedu"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `edu`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Education for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savehealth"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `health`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Health for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savepsy"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `psy`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Psychosocial conditions for File No [$file_no]",$NOW);
	}
	
	else{echo "error";}
}
elseif($op == "saveinter"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `interaction`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Interaction for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveliva"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `living_a`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Living condition A. Suggested Questions for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivb"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `living_b`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Living condition B. Description of the house for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivc"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `living_c`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Living condition C. House facilities for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivd"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `living_d`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Living condition D. Security & Safety for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelive"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `living_e`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Living condition E. Documentation & Security for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savefin"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `financial`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA Financial Situation and Supporting System for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savecws"){
	$file_no = $_GET['file_no'];;
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `cws_analysis`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA CWS - Analysis of information & conclusions by Caseworker for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveopt"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `bia` SET `optional`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  BIA CWS - Analysis of information & conclusions by Caseworker for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `bia` SET `status`='0' WHERE  `file_no`='$file_no' AND `status`='1' ;  ") or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_data","Delete  BIA data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
?>
