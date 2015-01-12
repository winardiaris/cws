<?php

include ("../inc/conf.php");



function user_save(){
	$group_id = $_POST['group_id'];
	$user_name = $_POST['user_name'];
	$user_real_name = $_POST['user_real_name'];
	$user_password = $_POST['user_password'];
	$md5_password = md5($user_password);
	$user_mail= $_POST['user_mail'];
	$user_info= $_POST['user_info'];
	mysql_query("INSERT INTO `user` 
				VALUES('',
				'$group_id',
				'$user_name',
				'$user_real_name',
				'$md5_password',
				'$user_mail',
				'$user_info',
				NULL,
				NULL)") or die(mysql_error());
}
function user_update($NOW){
	$user_id = $_POST['user_id'];
	$group_id = $_POST['group_id'];
	$user_name = $_POST['user_name'];
	$user_real_name = $_POST['user_real_name'];
	$user_password = $_POST['user_password'];
	$md5_password = md5($user_password);
	$user_mail= $_POST['user_mail'];
	$user_info= $_POST['user_info'];
	
	mysql_query("UPDATE `user` SET
				`group_id`='$group_id',
				`user_name`='$user_name',
				`user_real_name`='$user_real_name',
				`user_password`='$md5_password',
				`user_mail`='$user_mail',
				`user_info`='$user_info',
				`last_change`='$NOW'
				WHERE `user_id`='$user_id'
	") or die(mysql_error());
}

function system_log($user_id,$log_location,$log_message,$log_time){
		//make a log
		mysql_query("INSERT INTO `system_log` VALUES ('','$user_id','$log_location','$log_message','$log_time') ") or die(mysql_error());
}

if(isset($_POST['user_save'])){
	user_save();
	system_log($_SESSION['user_id'],"User form","Add new User",$NOW);
}
elseif(isset($_POST['user_update'])){
	user_update($NOW);
	system_log($_SESSION['user_id'],"User form","Edit user $user_id",$NOW);
}

?>
