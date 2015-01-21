<?php
	$group_id=$_SESSION['group_id'];
	$qry=mysql_query("SELECT `file_id` FROM  `access` WHERE  `group_id` ='$group_id' AND `file_id`='$file_id'");
	if(mysql_num_rows($qru)==0){
		echo "<script type='text/javascript'> alert('Access Forbiden !!');history.back();</script>";
		return false;
	}
?>
