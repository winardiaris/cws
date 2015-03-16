<?php
include ("../inc/conf.php");
include ("function.php");
$op = $_GET['op'];
$file_no = $_GET['file_no'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$id_data = $_GET['id_data'];
	
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$person = mysql_fetch_array($qry);
	
		if($person['ada']>0){
			//cek first assessment
			$qry2 = mysql_query(
						"SELECT COUNT(*) AS `ada` FROM `se` WHERE `file_no`='$file_no' AND `status`='1' AND `id`='0';"
						) or die(mysql_error());
			$se = mysql_fetch_array($qry2);
			
			//new assessment
			if($id_data==0){
				if($se['ada']>0){echo "inuse";} //new assessment (sudah ada)
				else{echo "avail";}	 //new assessment (tersedia)
			}
			//reassessment
			elseif($id_data==1){
				if($se['ada']>0){echo "avail";}  //re-assessment (tersedia)
				else{echo "nodatase";} //re-assessment (ditolak) karena belum ada SE
			}
		}
		//person belum ada
		else{echo "nodataperson";}
	
	
	
	
	//if($a==0){
		//$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
		//$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `se` WHERE `file_no`='$file_no' ;") or die(mysql_error());
		
		//$person = mysql_fetch_array($qry);
		//$se = mysql_fetch_array($qry2);
		
		//if($person['ada'] > 0 AND $se['ada'] > 0){
			//echo "inuse";
		//}
		//elseif($person['ada'] > 0 AND $se['ada'] == 0){
			//echo "avail";
		//}
		//elseif($person['ada'] == 0 AND $se['ada'] == 0){
			//echo "nodata";
		//}
		
		
	//}
	//elseif($a==1){
		//$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
		//$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `se` WHERE `file_no`='$file_no' AND `status`='0';") or die(mysql_error());
		
		//$person = mysql_fetch_array($qry);
		//$se = mysql_fetch_array($qry2);

		//if($person['ada'] > 0 AND $se['ada'] > 0){
			//echo "inuse";
		//}
		//elseif($person['ada'] > 0 AND $se['ada'] == 0){
			//echo "avail";
		//}
		//elseif($person['ada'] == 0 AND $se['ada'] == 0){
			//echo "nodata";
		//}

	//}	
}
elseif($op=="nextAssessment"){
	$file_no=$_GET['file_no'];
	$doa=$_GET['doa'];
	
	$qry = mysql_query("SELECT `status` FROM `person` WHERE `file_no`='$file_no'");
	$data = mysql_fetch_array($qry);
	$status = $data['status'];
	if($status=="Refugee"){
		$plus = "+3 month";
	}
	else{
		$plus = "+6 month";
	}
	
	$a = strtotime($plus,strtotime($doa));
	$a = date("Y-m-d", $a);
	$b = strtotime("-2 week",strtotime($a));
	$next = date("Y-m-d", $b);	
	echo "Next Assessment: <span id='dore'>".$next."</span>";
}
elseif($op == "lastAssessment"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT max(`doa`) as `doa` FROM `se` WHERE `file_no`='$file_no' AND `status`='1'")or die(mysql_error());
	$data = mysql_fetch_array($qry);
   $doa = $data['doa'];

	$qry2 = mysql_query("SELECT `assessment_data` FROM `se` WHERE `file_no`='$file_no' AND `doa`='$doa' AND `status`='1' ")or die(mysql_error());
	$data2 = mysql_fetch_array($qry2);
	$a =explode(";",$data2['assessment_data']);
	$last = $a[5];
   echo $doa.";".$last;
	
}
elseif($op == "addassessment"){
	$file_no = $_GET['file_no'];
	$doa = $_GET['doa'];
	$dore = $_GET['dore'];
	$a = $_GET['a'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `se` (`file_no`,`id`,`doa`,`dore`,`assessment_data`,`created`) VALUES('$file_no','$a','$doa','$dore','$value','$NOW') ;") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save SE Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "getseid"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT MAX(`se_id`) AS `se_id` FROM `se` WHERE `file_no`='$file_no'")or die(mysql_error());
	$data = mysql_fetch_array($qry);
	echo $data['se_id'];
}
elseif($op == "updateassessment"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$doa = $_GET['doa'];
	$dore = $_GET['dore'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("UPDATE `se` SET `doa`='$doa',`dore`='$dore',`assessment_data`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id';") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Update SE Assessment for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveback"){
	$se_id = $_GET['se_id'];
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query(" UPDATE `se` SET `background_info`='$value', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Background Information and Assessment Purpose for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivinga"){
	$se_id = $_GET['se_id'];
	$file_no = $_GET['file_no'];
	$living_env = htmlspecialchars($_GET['living_env']);
	$living_cond = htmlspecialchars($_GET['living_cond']);
	$sec_neigh = htmlspecialchars($_GET['sec_neigh']);
	$phnn = htmlspecialchars($_GET['phnn']);
	$save = mysql_query(" UPDATE `se` SET `living_env`='$living_env', `living_cond`='$living_cond',`sec_neigh`='$sec_neigh',`phnn`='$phnn', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Living Condition A. General for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savelivingb"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$vulne = htmlspecialchars($_GET['vulne']);
	$child_protect = htmlspecialchars($_GET['child_protect']);
	$save = mysql_query(" UPDATE `se` SET `vulnerabilities`='$vulne', `child_protect`='$child_protect',`last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Living Condition B. Person With Spesific Needs for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savefinanciala"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$support = htmlspecialchars($_GET['support']);
	$save = mysql_query(" UPDATE `se` SET `support_system`='$support', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Financial A. Support System for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "savefinancialb"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$recommend = htmlspecialchars($_GET['recommend']);
	$save = mysql_query(" UPDATE `se` SET `recommend`='$recommend', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Financial B. Recommendation for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "saveverification"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$verification = htmlspecialchars($_GET['verification']);
	$save = mysql_query(" UPDATE `se` SET `verification`='$verification', `last_change`='$NOW' WHERE `file_no`='$file_no' AND `se_id`='$se_id'") or die(mysql_error());
	
	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],"se_form","Save/Update SE Assessment verified for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "del"){
	$file_no = $_GET['file_no'];
	$se_id = $_GET['se_id'];
	$del = mysql_query("UPDATE `se` SET `status`='0' WHERE  `file_no`='$file_no' AND `se_id`='$se_id' AND `status`='1' ;  ") or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],"se_data","Delete SE Data for File No [$file_no]",$NOW);
	}
	else{echo "error";}
}
?>
