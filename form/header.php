<?php
include ("inc/conf.php");
?>
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
	<script src="<?php echo $URL ?>js/bootstrap.min.js"></script>
	<script src="<?php echo $URL ?>js/bootstrap-datepicker.js"></script>
	<script src="<?php echo $URL ?>js/plugins/metisMenu/metisMenu.min.js"></script>
	<script src="<?php echo $URL ?>js/sb-admin-2.js"></script>
	<script src="<?php echo $URL ?>js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $URL ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
   
</head>
<body >

<div id="wrapper"><!-- /#wrapper -->

<!-- test draggable div for history.back() -->
<script>$(function() {$("#close").draggable();});</script>

<?php 
	echo $iframe;
	if(isset($_GET['page'])){
		echo'<div id="close"><button class="btn btn-default " onClick="history.back();"><i class="fa fa-chevron-left" ></i></button></div>';
	}
?>	
<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" id="modal">
					<input class="form-control">
				</div>
			</div>
		</div>
	</div>
	
