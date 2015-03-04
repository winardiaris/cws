<?php

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
	$str = "<small>".$str."</small>";
	return $str;
}

function setHistory($user_id,$log_location,$log_message,$log_time){
	mysql_query("INSERT INTO `system_log` (`user_id`,`log_location`,`log_message`,`log_time`) VALUES('$user_id','$log_location','$log_message','$log_time') ") OR DIE(mysql_error());
	return true;
}

function getWhoLastChange($file_no,$location){
	$qry = mysql_query("SELECT `user_id`, MAX(`log_time`) AS `time` FROM `system_log` WHERE `log_message` like '%[$file_no]%' AND `log_location`='$location'")or die(mysql_error());
	$count=mysql_num_rows($qry);
	if($count>0){
	$data = mysql_fetch_array($qry);
	$user_id = $data['user_id'];
	$time = $data['time'];
	
	$qry2 = mysql_query("SELECT `user_real_name` FROM `user` WHERE `user_id`='$user_id' ")or die(mysql_error());
	$data2 =mysql_fetch_array($qry2);
	$name = $data2['user_real_name'];
	
	$str = "<small>Last changed by: ".$name." - ".$time."</small>";
	
	return $str;
	}
}

function balikinSimbol($str){
	$search = array ("'xpetiksatux'",
						"'xpetikx'",
						"'xpersenx'",
						"'xkeongx'",
						"'xgwahx'",
						"'x1smdg1x'",
						"'xgaringx'",
						"'xgaring2x'",
						"'xserux'",
						"'xkkirix'",
						"'xkkananx'",
						"'xkkurix'",
						"'xkkurnanx'",
						"'xkomax'",
						"'xstripx'",
						"'xtitikx'",
						"'xpetiksatux'",
						"'xpetikduax'",
						"'xcacingx'",
					);

	$replace = array ("'",
						"`",
						"%",
						"@",
						"_",
						"1=1",
						"/",
						"\\",
						"!",
						"<",
						">",
						"(",
						")",
						";",
						"-",
						".",
						"'",
						"\"",
						"~",
					);

	$str = preg_replace($search,$replace,$str);

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
	elseif($op=="setHistory"){
		$user_id = $_GET['user_id'];
		$log_location = $_GET['log_location'];
		$log_message = $_GET['log_message'];
		$log_time = $_GET['log_time'];
		
		setHistory($user_id,$log_location,$log_message,$log_time);
	}

}


?>
