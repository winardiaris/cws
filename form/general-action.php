<?php
include ("../inc/conf.php");
$op = $_GET['op'];


if($op == "getcountry"){
	$country = $_GET['country'];
	$get = mysql_query("SELECT * FROM `master_country` ");
	echo '<option value="0">-- select --</option>';
	while($data = mysql_fetch_array($get)){
		echo '<option value="'.$data['country_id'].'"';
			if($country == $data['country_id']){echo 'selected';}
		echo '>'.$data['country_name'].'</option>';
	}
}
elseif($op == "getmarital"){
	$status = $_GET['status'];
	$b = mysql_query("SELECT * FROM `marital_status` ") or die(mysql_error());
	echo '<option value="0">-- select --</option>';
	while ($data = mysql_fetch_array($b)){
		echo '<option value="'.$data['marital_id'].'"';
			if($status == $data['marital_id']){echo 'selected';}
		echo'>'.$data['marital'].'</option>';
	}
}
elseif($op == "getrelation"){
	$b = mysql_query("SELECT * FROM `family_relation` ") or die(mysql_error());
	echo '<option value="0">-- select --</option>';
	while ($data = mysql_fetch_array($b)){
		echo '<option>'.$data['relation'].'</option>';
	}
}
?>
