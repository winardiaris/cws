<?php
include ("form/header.php");
if(!empty($_GET['page'])){
	$page = $_GET['page'];
	switch($page){
		//LOGIN --------
		case "login":
		$view = "form/login.php";
		break;
		
		//DASHBOARD --------
		case "dashboard":
		$view = "form/dashboard.php";
		break;
		
		//Person --------
		case "person-form":
		$view = "form/personal-form.php";
		break;
		case "person-data":
		$view = "form/personal-data.php";
		break;
		
		// IA --------
		case "ia-form":
		$view = "form/ia-form.php";
		break;
		case "ia-data":
		$view = "form/ia-data.php";
		break;
		
		// SE --------
		case "se-form":
		$view = "form/se-form.php";
		break;
		case "ia-data":
		$view = "form/se-data.php";
		break;
		
		// BIA --------
		case "bia-form":
		$view = "form/bia-form.php";
		break;
		case "ia-data":
		$view = "form/bia-data.php";
		break;
		
		//USER --------
		case "user":
		$view = "form/user.php";
		break;
		
		default:
		$view = "form/404.php";
		break;
	}

include $view;
}
else{
	header("location:?page=login");
}
include ("form/footer.php");


?>
