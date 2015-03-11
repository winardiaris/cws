<?php
include("../../inc/conf.php");
include("../function.php") ;
?>
<html>
<head>
	<link href="<?php echo $URL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/custom.css" rel="stylesheet">
	<script src="<?php echo $URL ?>js/jquery.js"></script>
	<link href="<?php echo $URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<script>
$(document).ready(function(){
	var 	content = $("#content"),
			file_no = $("#file_no").val(),
			id = $("#id").val(),
			tperson = $("#tperson"),
			tia = $("#tia"),
			tse = $("#tse"),
			tbia = $("#tbia"),
			thr = $("#thr");

		
		tperson.load("view-personal.php?file_no="+file_no);
		tia.hide();
		tse.hide();
		tbia.hide();
		thr.hide();





	$("#person").change(function(){
		if($(this).is(":checked")){
			tperson.show();
			tperson.load("view-personal.php?file_no="+file_no);
		}
		else{tperson.hide();} 
	});
	$("#ia").change(function(){
		if($(this).is(":checked")){
			tia.show();
			tia.load("view-ia.php?file_no="+file_no);
		}
		else{tia.hide();} 
	});
	$("#se").change(function(){
		if($(this).is(":checked")){
			tse.show();
			tse.load("view-se-person.php?file_no="+file_no+"&id="+id);
		}
		else{tse.hide();} 
	});
	$("#bia").change(function(){
		if($(this).is(":checked")){
			tbia.show();
			tbia.load("view-bia.php?file_no="+file_no);
		}
		else{tbia.hide();} 
	});
	$("#hr").change(function(){
		if($(this).is(":checked")){
			thr.show();
			thr.load("view-hr.php?file_no="+file_no);
		}
		else{thr.hide();} 
	});
	

	
});

	
</script>

	<div class="checkbox atas">
		<label class="checkbox-inline"><input type="checkbox" id="person" checked> Personal </label>
		<label class="checkbox-inline"><input type="checkbox" id="ia" > IA </label>
		<label class="checkbox-inline"><input type="checkbox" id="se" > SE </label>
		<label class="checkbox-inline"><input type="checkbox" id="bia" > BIA </label>
		<label class="checkbox-inline"><input type="checkbox" id="hr" > HR </label>
		<input type="hidden" id="file_no" name="file_no" value="<?php if(isset($_GET['file_no'])){ echo $_GET['file_no'];} ?>" >
		<input type="hidden" id="id" name="id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];} ?>" >
		<button class="print btn btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
	</div>

<div id="page-print">
	
	<div id="content">
	<div id="tperson"></div>
	<div id="tia"></div>
	<div id="tse"></div>
	<div id="tbia"></div>
	<div id="thr"></div>
	</div>
</div>
</body>
</html>
