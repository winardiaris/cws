<?php
include ("../inc/conf.php");
$op = $_GET['op'];

if($op == "check"){
	$file_no = $_GET['file_no'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `file_no`='$file_no';") or die(mysql_error());
	$person = mysql_fetch_array($qry);
	
	if($person['ada'] > 0){
		echo "inuse";
	}
	else{
		echo "avail";
	}

}
elseif($op == "getcountry"){
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
elseif($op == "getprov"){
	$kode = $_GET['kode'];
	$prov = mysql_query("SELECT * FROM `data_wilayah` WHERE LENGTH(`kode`)<=2 ORDER BY `nama` ASC;") or die(mysql_error());
	echo '<option value="0">-- Provinsi --</option>';
	while ($data = mysql_fetch_array($prov)){
		echo '<option value="'.$data['kode'].'" ';
			if($kode == $data['kode']){echo 'selected';}
		echo'>'.$data['nama'].'</option>';
	}
}
elseif($op == "getkab"){
	$kode = $_GET['kode'];
	$prov = $_GET['prov'];
	$kab = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '$prov%' AND LENGTH(`kode`)>2 AND LENGTH(`kode`)<=5 ORDER BY `nama` ASC;") or die(mysql_error());
	echo '<option value="0">-- Kabupaten/Kota --</option>';
	while ($data = mysql_fetch_array($kab)){
		echo '<option value="'.$data['kode'].'" ';
			if($kode == $data['kode']){echo 'selected';}
		echo'>'.$data['nama'].'</option>';
	}
}
elseif($op == "getkec"){
	$kode = $_GET['kode'];
	$kab = $_GET['kab'];
	$kec = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '$kab%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `nama` ASC;") or die(mysql_error());
	echo '<option value="0">-- Kecamatan/Kelurahan --</option>';
	while ($data = mysql_fetch_array($kec)){
		echo '<option value="'.$data['kode'].'" ';
			if($kode == $data['kode']){echo 'selected';}
		echo'>'.$data['nama'].'</option>';
	}
}
?>
