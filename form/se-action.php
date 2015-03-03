<?php
$file_id = 4;
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
	$dore = $_GET['dore'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `se` (`file_no`,`doa`,`dore`,`assessment_data`,`created`) VALUES('$file_no','$doa','$dore','$value','$NOW') ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "updateassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$dore = $_GET['dore'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE `se` SET `doa`='$doa',`dore`='$dore',`assessment_data`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no';") or die(mysql_error());
	
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
elseif($op == "savelivingb"){
	$file_no = $_GET['file_no'];
	$vulne = htmlspecialchars($_GET['vulne']);
	$child_protect = htmlspecialchars($_GET['child_protect']);
	$save = mysql_query(" UPDATE `se` SET `vulnerabilities`='$vulne', `child_protect`='$child_protect',`last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savefinanciala"){
	$file_no = $_GET['file_no'];
	$support = htmlspecialchars($_GET['support']);
	$save = mysql_query(" UPDATE `se` SET `support_system`='$support', `last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savefinancialb"){
	$file_no = $_GET['file_no'];
	$recommend = htmlspecialchars($_GET['recommend']);
	$save = mysql_query(" UPDATE `se` SET `recommend`='$recommend', `last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "saveverification"){
	$file_no = $_GET['file_no'];
	$verification = htmlspecialchars($_GET['verification']);
	$save = mysql_query(" UPDATE `se` SET `verification`='$verification', `last_change`='$NOW' WHERE `file_no`='$file_no'") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `se` SET `status`='0' WHERE  `file_no`='$file_no' AND `status`='1' ;  ") or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}

?>
