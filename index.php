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
		case "se-data":
		$view = "form/se-data.php";
		break;
		
		// BIA --------
		case "bia-form":
		$view = "form/bia-form.php";
		break;
		case "bia-data":
		$view = "form/bia-data.php";
		break;
		
		// HR --------
		case "hr-form":
		$view = "form/hr-form.php";
		break;
		case "hr-data":
		$view = "form/hr-data.php";
		break;
		
		//USER --------
		case "user":
		$view = "form/user.php";
		break;
		case "user-form":
		$view = "form/user-form.php";
		break;
		case "user-action":
		$view = "form/user-action.php";
		break;
		case "user-group":
		$view = "form/usergroup.php";
		break;
		
		
		//DELETED DATA
		case "deleted":
		$view = "form/deleted-data.php";
		break;
		
		//CHART --------
		case "chart":
		$view = "form/chart/chart.php";
		break;
		
		
		//test --------
		case "test":
		$view = "testaccess.php";
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
