<?php
include("../../inc/conf.php");
include("../function.php") ;
?>
<html>
<head>
	<link href="<?php echo $URL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/custom.css" rel="stylesheet">
	<link href="<?php echo $URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="<?php echo $URL ?>js/jquery.js"></script>
</head>
<body>
 <button class="btn print btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
<?php
if(isset($_GET['op'])){
	$op=$_GET['op'];
	$a=$_GET['a'];
	$id=$_GET['id'];
	$file_no = $_GET['file_no'];
	if($op=="ia"){
		echo "<script>$(document).ready(function(){ $('#page-print').load('view-ia.php?file_no=".$file_no."');});</script>";
	}
	elseif($op=="se" AND $a =="" ){
		echo "<script>$(document).ready(function(){ $('#page-print').load('view-se.php?file_no=".$file_no."&id=".$id."');});</script>";
	}
	elseif($op=="se" AND $a =="all" ){
		echo "<script>$(document).ready(function(){ $('#page-print').load('view-se-all.php?file_no=".$file_no."');});</script>";
	}
	elseif($op=="bia"){
		echo "<script>$(document).ready(function(){ $('#page-print').load('view-bia.php?file_no=".$file_no."');});</script>";
	}
	elseif($op=="hr"){
		echo "<script>$(document).ready(function(){ $('#page-print').load('view-hr.php?file_no=".$file_no."');});</script>";
	}
	
}


?>

<div id="page-print"></div>
</body>
</html>
