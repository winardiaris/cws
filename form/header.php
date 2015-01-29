<?php include ("inc/conf.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $NAME ?>">
	<meta name="author" content="winardiaris">

	<title><?php echo $NAME ?></title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link href="<?php echo $URL ?>css/custom.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/datepicker3.css" rel="stylesheet">

	 
	<link href="<?php echo $URL ?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/plugins/timeline.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/sb-admin-2.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/plugins/morris.css" rel="stylesheet">
	<link href="<?php echo $URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script src="<?php echo $URL ?>js/custom.js"></script>
	
	<script src="<?php echo $URL ?>js/jquery.js"></script>
	<script src="<?php echo $URL ?>js/jquery-ui.min.js"></script>
	<script src="<?php echo $URL ?>js/jquery.md5.js"></script>
	
	<script src="<?php echo $URL ?>js/bootstrap.min.js"></script>
	<script src="<?php echo $URL ?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo $URL ?>js/plugins/metisMenu/metisMenu.min.js"></script>
	<script src="<?php echo $URL ?>js/sb-admin-2.js"></script>
	<script src="<?php echo $URL ?>js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="<?php echo $URL ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="<?php echo $URL ?>js/plugins/morris/raphael.min.js"></script>
	<script src="<?php echo $URL ?>js/plugins/morris/morris.min.js"></script>
	<!-- Flot Charts JavaScript -->
	<script src="<?php echo $URL ?>js/plugins/flot/excanvas.min.js"></script>
	<script src="<?php echo $URL ?>js/plugins/flot/jquery.flot.js"></script>
	<script src="<?php echo $URL ?>js/plugins/flot/jquery.flot.pie.js"></script>
	<script src="<?php echo $URL ?>js/plugins/flot/jquery.flot.resize.js"></script>
	<script src="<?php echo $URL ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>

   
</head>
<body >
<script>$(document).ready(function() {$('#dataTables').dataTable();});</script>
<div id="wrapper"><!-- /#wrapper -->

<div id="divpopup" name="divpopup" class="wrapper" style="display:none" onClick="window.framepopup.location='<?php echo $URL; ?>loading.html';setdisplay(divpopup,0); return false"><div class="col-lg-12"><a href=# id="iframebtn" onClick="window.framepopup.location='<?php echo $URL; ?>loading.html\';setdisplay(divpopup,0); return false"><button type="button" class="btn btn-danger  btn-close btn-circle"><i class="fa fa-close"></i></button></a><iframe id="framepopup" name="framepopup"  src="loading.html"></iframe></div></div>

	
