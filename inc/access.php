<?php
	$group_id=$_SESSION['group_id'];
	$getR=mysql_query("SELECT COUNT(*) AS `R` FROM `usergroup` WHERE `group_id`='$group_id' AND `group_access` LIKE '%$R%'");
	$getW=mysql_query("SELECT COUNT(*) AS `W` FROM `usergroup` WHERE `group_id`='$group_id' AND `group_access` LIKE '%$W%'");
	
	$read=mysql_fetch_array($getR);
	$write=mysql_fetch_array($getW);
	if($read['R'] > 0 AND $write['W'] > 0){
		$allow="RW";
	}
	elseif($read['R'] > 0 AND $write['W'] == 0){
		$allow="R";
	}
	else{
		$allow=0;
	}
	
?>
