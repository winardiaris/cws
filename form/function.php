<?php
include ("../inc/conf.php");
function getAddress($address){
	$a = explode(";",$address);
	if(count($a)>1){
		$b = explode(".",$a[0]); $prov = $b[0]; $kota = $prov.".".$b[1]; $kec = $kota.".".$b[2];
		$qry = mysql_query("SELECT `nama` FROM `data_wilayah` WHERE `kode`='$prov' or `kode`='$kota' or `kode` ='$kec';") or die(mysql_error());
		while($data = mysql_fetch_array($qry)){
			$lengkap = $data['nama'].", ".$lengkap;
		}
		$c = $a[1].", ".$lengkap;
		$data = substr($c,0,(strlen($c)-2));
	}
	else{
		$data = $address;
	}
	
	return $data;
}


?>
