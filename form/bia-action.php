<?php
$file_id = 5;
include ("../inc/conf.php");
include ("function.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `bia` WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	setHistory($_SESSION['user_id'],"bia_form","Check Available for File No [$file_no]",$NOW);
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
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	
	$save = mysql_query("INSERT INTO `bia` (`file_no`,`doa`,`assessment`,`created`) VALUES ('$file_no','$doa','$value','$NOW') ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save Date of Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "updateassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	
	$save = mysql_query("UPDATE `bia` SET `doa`='$doa', `assessment`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1' ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Update Date of Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveph1"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `ph1`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Personal history for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveph2"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `ph2`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Personal history for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveph3"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `ph3`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Personal history for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}

elseif($op == "savetoiva1"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `toiva1`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	if($save){echo "success";}
	else{echo "error";}
}                           
	elseif($op == "savetoiva2"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva2`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva3"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva3`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva4"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva4`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva5"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva5`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva6"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva6`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva7"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva7`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva8"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva8`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva9"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva9`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva10"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva10`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva11"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva11`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva12"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva12`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva13"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva13`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva14"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva14`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva15"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva15`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva16"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva16`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva17"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva17`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva18"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva18`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva19"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva19`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva20"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva20`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva21"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva21`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoiva22"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toiva22`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }


//toivb
	elseif($op == "savetoivb1"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb1`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }

	elseif($op == "savetoivb2"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb2`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoivb3"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb3`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoivb4"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb4`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoivb5"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb5`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoivb6"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb6`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }
	
	elseif($op == "savetoivb7"){ $file_no = $_GET['file_no']; $value = UbahSimbol(htmlspecialchars($_GET['value'])); $save = mysql_query(" UPDATE `bia` SET `toivb7`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error()); if($save){echo "success"; setHistory($_SESSION['user_id'],"bia_form","Save/Update Types of identified vulnerabilities for File No [$file_no]",$NOW); } else{echo "error";} }




elseif($op == "saveedu"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `edu`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success"; 
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Education for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savehealth"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `health`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Health for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savepsy"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `psy`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Psychosocial conditions for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveinter"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `interaction`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update  Interactions for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveliva"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `living_a`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Living conditions in place of residence A). for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivb"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `living_b`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
	   setHistory($_SESSION['user_id'],"bia_form","Save/Update Living conditions in place of residence B). for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivc"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `living_c`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Living conditions in place of residence C). for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivd"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `living_d`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Living conditions in place of residence D). for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelive"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `living_e`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Living conditions in place of residence E). for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savefin"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `financial`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Financial Situation and Supporting System for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savecws"){
	$file_no = $_GET['file_no'];;
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `cws_analysis`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update CWS - Analysis of information & conclusions by Caseworker for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveopt"){
	$file_no = $_GET['file_no'];
	$value = UbahSimbol(htmlspecialchars($_GET['value']));
	$save = mysql_query(" UPDATE `bia` SET `optional`='$value',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_form","Save/Update Optional for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$del = mysql_query("UPDATE `bia` SET `status`='0' WHERE  `file_no`='$file_no' AND `status`='1' ;  ") or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"bia_data","Delete SE data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
?>
