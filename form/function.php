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
	
	$qse =mysql_query("SELECT `se_id` FROM `se` WHERE `file_no`='$file_no' AND `status`='1' ORDER BY `doa` DESC ")or die(mysql_error());
	$ada = mysql_num_rows($qse);
	$data2 =mysql_fetch_array($qse);
	if($ada>0){
		$str .="<a href='?page=se-form&op=edit&file_no=$file_no&se_id=".$data2['se_id']."'>SE</a>, ";
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

function UbahSimbol($str){
	$str = trim(htmlentities(htmlspecialchars($str)));
	$search = array ("'\''",
						"'\"'",
						"'%'",
						"'@'",
						"'_'",
						"'1=1'",
						"'/'",
						"'!'",
						"'<'",
						"'>'",
						"'\('",
						"'\)'",
						"';'",
						"'-'",
						"'_'");

	$replace = array ("xpetiksatux",
						"xpetikduax",
						"xpersenx",
						"xtkeongx",
						"xgwahx",
						"x1smdgan1x",
						"xgaringx",
						"xserux",
						"xkkirix",
						"xkkananx",
						"xkkurix",
						"xkkurnanx",
						"xtitikkomax",
						"xstripx",
						"xstripbwhx");

	$str = preg_replace($search,$replace,$str);
	return $str;
	
}
function Balikin($str){
	$search = array ("'xpetiksatux'",
						"'xpetikduax'",
						"'xpersenx'",
						"'xtkeongx'",
						"'xgwahx'",
						"'x1smdgan1x'",
						"'xgaringx'",
						"'xserux'",
						"'xkkirix'",
						"'xkkananx'",
						"'xkkurix'",
						"'xkkurnanx'",
						"'xtitikkomax'",
						"'xstripx'",
						"'xstripbwhx'");

	$replace = array ("'",
						"\"",
						"%",
						"@",
						"_",
						"1=1",
						"/",
						"!",
						"<",
						">",
						"(",
						")",
						";",
						"-",
						"_");

	$str = preg_replace($search,$replace,$str);

	return $str;
 }





if(isset($_GET['op'])){
	$op = $_GET['op'];
	if($op=="setHistory"){
		$user_id = $_GET['user_id'];
		$log_location = $_GET['log_location'];
		$log_message = $_GET['log_message'];
		$log_time = $_GET['log_time'];
		
		setHistory($user_id,$log_location,$log_message,$log_time);
	}

}


?>
