<?php
$file_id = 99;
include ("../inc/conf.php");
$op = $_GET['op'];
if($op == "check"){
	$user_name = $_GET['user_name'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `user` WHERE `user_name`='$user_name';") or die(mysql_error());
	$user = mysql_fetch_array($qry);
	
	if($user['ada'] > 0){
		echo "inuse";
	}
	elseif($user['ada'] == 0){
		echo "avail";
	}
}
elseif($op=="saveuser"){
	$group_id = $_GET['group_id'];
	$user_name = $_GET['name'];
	$user_real_name = $_GET['real_name'];
	$user_password = $_GET['password'];
	$md5_password = md5($user_password);
	$user_info= $_GET['info'];
	$save = mysql_query("INSERT INTO `user` (`group_id`,`user_name`,`user_real_name`,`user_password`,`user_info`) 
						VALUES('$group_id','$user_name','$user_real_name','$md5_password','$user_info')") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="updateuser"){
	$user_id = $_GET['user_id'];
	$group_id = $_GET['group_id'];
	$user_name = $_GET['name'];
	$user_real_name = $_GET['real_name'];
	$user_password = $_GET['password'];
	$md5_password = md5($user_password);
	$user_info= $_GET['info'];
	if($user_password != ""){
		$save = mysql_query("UPDATE `user` SET `group_id`='$group_id',`user_name`='$user_name',`user_real_name`='$user_real_name',
						`user_password`='$md5_password', `user_info`='$user_info',`last_change`='$NOW' WHERE `user_id`='$user_id';") or die(mysql_error());
	}
	else{
		$save = mysql_query("UPDATE `user` SET `group_id`='$group_id',`user_name`='$user_name',`user_real_name`='$user_real_name',
						 `user_info`='$user_info',`last_change`='$NOW' WHERE `user_id`='$user_id';") or die(mysql_error());
	}
	
	if($save){echo "success";}
	else{echo "error";}
}

elseif($op == "checkgroup"){
	$group_name = $_GET['group_name'];
	$qry = mysql_query("SELECT COUNT(*) AS `ada` FROM `usergroup` WHERE `group_name`='$group_name' ;") or die(mysql_error());
	$group = mysql_fetch_array($qry);
	
	if($group['ada'] > 0){
		echo "inuse";
	}
	elseif($group['ada'] == 0){
		echo "avail";
	}
}
elseif($op=="saveusergroup"){
	$group_name = $_GET['group_name'];
	$value = htmlspecialchars($_GET['value']);
	
	$save =mysql_query("INSERT INTO `usergroup` (`group_name`,`group_access`) VALUES ('$group_name','$value')") or die(mysql_error());

	if($save){echo "success";}
	else{echo "error";}
}
elseif($op=="updateusergroup"){
	$group_id = $_GET['group_id'];
	$group_name = $_GET['group_name'];
	$value = htmlspecialchars($_GET['value']);
	
	$save =mysql_query("UPDATE `usergroup` SET `group_name`='$group_name',`group_access`='$value' WHERE `group_id`='$group_id'") or die(mysql_error());

	if($save){echo "success";}
	else{echo "error";}
}



?>
