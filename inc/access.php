<?php
	$group_id=$_SESSION['group_id'];
if(isset($group_id)){
	$getR=mysql_query("SELECT COUNT(*) AS `R` FROM `usergroup` WHERE `group_id`='$group_id' AND `group_access` LIKE '%$R%'");
	$getW=mysql_query("SELECT COUNT(*) AS `W` FROM `usergroup` WHERE `group_id`='$group_id' AND `group_access` LIKE '%$W%'");
	
	$read=mysql_fetch_array($getR);
	$write=mysql_fetch_array($getW);
	if($read['R'] > 0 AND $write['W'] > 0){
		$allow="RW";
		
	}
	elseif($read['R'] > 0 AND $write['W'] == 0){
		$allow="R";
		echo'
		<script>
		$(document).ready(function() {
			$(".form-control").attr("disabled",true);
			$("select").attr("disabled",true);
			$(":radio").attr("disabled",true);
			$(":checkbox").attr("disabled",true);
			$(".btn-success").attr("disabled",true);
			$(".btn-danger").attr("disabled",true);
			$(":file").attr("disabled",true);
			
			var page = $(".page-header").text();
			$(".page-header").text(page+" (Read only)");
			$(".page-header").addClass("text-warning");
		});
		</script>
		';
	}
	elseif($read['R'] == 0 AND $write['W'] > 0){
		$allow="0";
		echo '<script>alert("Authentication Failure !!");window.location="?page=dashboard";</script>';
		return false;
	}
	else{
		$allow="0";
		echo '<script>alert("Authentication Failure !!");window.location="?page=dashboard";</script>';
		return false;
	}
}
else{
	echo '<script>alert("You not logged !!");window.location="?page=login";</script>';
}
?>
