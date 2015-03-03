<?php
include("../../inc/conf.php");
include("../function.php") ;
?>
<html>
<head>
	<link href="<?php echo $URL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/custom.css" rel="stylesheet">
	<script src="<?php echo $URL ?>js/jquery.js"></script>
</head>
<body>
	<?php
		if(isset($_POST['file_no'])){
			$j = count($_POST['view']);
			for($i=0;$i<$j;$i++){
				$view = $view.";".$_POST['view'][$i];
				$pecah = explode(";",substr($view,1,strlen($view)));
				
				$a = $a."$('#content').append('<div id=\"o".$i."\" ></div>'); $('#o".$i."').load('".$pecah[$i]."?file_no=".$_GET['file_no']."');";
			}
			echo "<script>
					$(document).ready(function(){
						".$a."
					});
				</script>";
		}
		else{
			$a = "$('#content').append('<div id=\"oo\" ></div>'); $('#oo').load('view-personal.php?file_no=".$_GET['file_no']."');";
			echo "<script>
					$(document).ready(function(){
						".$a."
					});
				</script>";
		}
	?>
	
<form method="post" action="?file_no=<?php if(isset($_GET['file_no'])){ echo $_GET['file_no'];} ?>">
	<div class="checkbox atas">
		<label class="checkbox-inline"><input type="checkbox" name="view[]" id="view[]" value="view-personal.php"   <?php if(isset($_POST['file_no'])){if($pecah[0]=="view-personal.php" OR $pecah[1]=="view-personal.php" OR $pecah[2]=="view-personal.php" OR $pecah[3]=="view-personal.php" OR $pecah[4]=="view-personal.php" ){ echo "checked";} } ?>> Personal</label>
		
		<label class="checkbox-inline"><input type="checkbox" name="view[]" id="view[]" value="view-ia.php"  <?php if(isset($_POST['file_no'])){if($pecah[0]=="view-ia.php" OR $pecah[1]=="view-ia.php" OR $pecah[2]=="view-ia.php" OR $pecah[3]=="view-ia.php" OR $pecah[4]=="view-ia.php" ){ echo "checked";} } ?>> IA </label>
		
		<label class="checkbox-inline"><input type="checkbox" name="view[]" id="view[]" value="view-se.php" <?php if(isset($_POST['file_no'])){if($pecah[0]=="view-se.php" OR $pecah[1]=="view-se.php" OR $pecah[2]=="view-se.php" OR $pecah[3]=="view-se.php" OR $pecah[4]=="view-se.php" ){ echo "checked";} } ?> > SE </label>
		
		<label class="checkbox-inline"><input type="checkbox" name="view[]" id="view[]" value="view-bia.php" <?php if(isset($_POST['file_no'])){if($pecah[0]=="view-bia.php" OR $pecah[1]=="view-bia.php" OR $pecah[2]=="view-bia.php" OR $pecah[3]=="view-bia.php" OR $pecah[4]=="view-bia.php" ){ echo "checked";} } ?>> BIA </label>
		
		<label class="checkbox-inline"><input type="checkbox" name="view[]" id="view[]" value="view-hr.php" <?php if(isset($_POST['file_no'])){if($pecah[0]=="view-hr.php" OR $pecah[1]=="view-hr.php" OR $pecah[2]=="view-hr.php" OR $pecah[3]=="view-hr.php" OR $pecah[4]=="view-hr.php" ){ echo "checked";} } ?> > HR </label>
		
		<input type="hidden" id="file_no" name="file_no" value="<?php if(isset($_GET['file_no'])){ echo $_GET['file_no'];} ?>" >
		<button type="submit" class="btn btn-sm btn-default" id="ok" >View</button>
	</div>
	</form>
<div id="page-print">
	<button class="print" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
	<div id="content">
	</div>
</div>
</body>
</html>
