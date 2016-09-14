<?php
include ("../../inc/conf.php");
include ("../function.php");
$op = $_REQUEST['op'];

if($op == "check"){
	$file_no = $_REQUEST['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$qry2 = mysql_query("SELECT COUNT(*) AS `ada` FROM `assistance` WHERE `file_no`='$file_no' AND `status`='1';") or die(mysql_error());
	
	$person = mysql_fetch_array($qry);
	$assistance = mysql_fetch_array($qry2);
	
	setHistory($_SESSION['user_id'],"assistance_form","Check Available for UNHCR Case Number [$file_no]",$NOW);
	if($person['ada'] > 0 AND $assistance['ada'] > 0){
		echo "inuse";
	}
	elseif($person['ada'] > 0 AND $assistance['ada'] == 0){
		echo "avail";
	}
	elseif($person['ada'] == 0 AND $assistance['ada'] == 0){
		echo "nodata";
	}
}
elseif($op=="addassistance"){
  $file_no=$_REQUEST['file_no'];
  $rfa=$_REQUEST['rfa'];
  $save = mysql_query("insert into `assistance` (`file_no`,`rfa`,`created`) values('$file_no','$rfa','$NOW')" ) or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"SAVE Assistance for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}
elseif($op=="update_assistance"){
  $file_no=$_REQUEST['file_no'];
  $rfa=$_REQUEST['rfa'];
  $save = mysql_query("update `assistance` set `rfa`='$rfa', `created`='$NOW'  where `file_no`='$file_no'; " ) or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"Update  Assistance for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}
elseif($op=="save_financeassistance"){
  $file_no=$_REQUEST['file_no'];
  $fa_type_value_amount=$_REQUEST['fa_type_value_amount'];
  $uam=$_REQUEST['uam'];
  $fa_day=$_REQUEST['fa_day'];
  $save = mysql_query("update `assistance` set `fa_day`='$fa_day', `fa_type_value_amount`='$fa_type_value_amount', `uam`='$uam',`last_change`='$NOW' where `file_no`='$file_no' " ) or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"save_financeassistance for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}
elseif($op=='save_healthassistance'){
 $file_no=$_REQUEST['file_no'];
  $ha_note=UbahSimbol($_REQUEST['ha_note']);
  
  $save = mysql_query("update `assistance` set `ha_note`='$ha_note', `last_change`='$NOW' where `file_no`='$file_no' ") or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"save_Health Assistance Note for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}
elseif($op=='save_educationaccess'){
  $file_no=$_REQUEST['file_no'];
  $ea_class=$_REQUEST['ea_class'];
  $ea_note=UbahSimbol($_REQUEST['ea_note']);
  $save = mysql_query("update `assistance` set `ea_class`='$ea_class', `ea_note`='$ea_note', `last_change`='$NOW' where  `file_no`='$file_no'") or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"save_Educational Access for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}
elseif($op=='save_psychologicalcounselling'){
  $file_no=$_REQUEST['file_no'];
  $pc_note=UbahSimbol($_REQUEST['pc_note']);
  $save = mysql_query("update `assistance` set `pc_note`='$pc_note',`last_change`='$NOW' where  `file_no`='$file_no'") or die(mysql_error());
  if($save){
    echo 'success';
    setHistory($_SESSION['user_id'],'assistance_form',"save_Psychological Conselling for UNHCR Case Number [$file_no]",$NOW);
  }
  else{echo"error";}
}



?>
