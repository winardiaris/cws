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
function getCountry($id){
	$qry=mysql_query("SELECT `country_name` FROM `master_contry` WHERE `country_id`='$id'");
	$data = mysql_fetch_array($qry);
	echo $data['country_name'];
}
function getData($file_no){
	$str = "";
	
	$qia =mysql_query("SELECT count(*) AS `ada` FROM `ia` WHERE `file_no`='$file_no' AND `status`='1' ") or die(mysql_error());
	$data1 =mysql_fetch_array($qia);
	if($data1['ada']>0){
		$str .="<a href='?page=ia-form&op=edit&file_no=$file_no'>IA</a>, ";
	}
	
	$qse =mysql_query("SELECT count(*) AS `ada` FROM `se` WHERE `file_no`='$file_no' AND `status`='1' ")or die(mysql_error());
	$data2 =mysql_fetch_array($qse);
	if($data2['ada']>0){
		$str .="<a href='?page=se-form&op=edit&file_no=$file_no'>SE</a>, ";
	}
	
	$qbia =mysql_query("SELECT count(*) AS `ada` FROM `bia` WHERE `file_no`='$file_no' AND `status`='1' ")or die(mysql_error());
	$data3 =mysql_fetch_array($qbia);
	if($data3['ada']>0){
		$str .="<a href='?page=bia-form&op=edit&file_no=$file_no'>BIA</a>, ";
	}	
	
	$qhr =mysql_query("SELECT count(*) AS `ada` FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' ")or die(mysql_error());
	$data4 =mysql_fetch_array($qhr);
	if($data4['ada']>0){
		$str .="<a href='?page=hr-form&op=edit&file_no=$file_no'>HR</a>";
	}
	
	return $str;
}




if(isset($_GET['op'])){
	$op = $_GET['op'];

	if($op=="nextAssessment"){
		$file_no=$_GET['file_no'];
		$doa=$_GET['doa'];
		
		$qry = mysql_query("SELECT `status` FROM `person` WHERE `file_no`='$file_no'");
		$data = mysql_fetch_array($qry);
		$status = $data['status'];
		if($status=="Refugee"){
			$plus = "3 month";
		}
		else{
			$plus = "6 month";
		}
		
		$a = strtotime($plus,strtotime($doa));
		$a = date("Y-m-d", $a);
		$b = strtotime("-2 week",strtotime($a));
		$next = date("Y-m-d", $b);	
		echo "Reassessment: <span id='dore'>".$next."</span>";
	}
}


?>
