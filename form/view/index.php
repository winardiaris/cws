<?php
include("../../inc/conf.php");
include("../function.php") ;
?>
<html>
<head>
	<link href="<?php echo $URL ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $URL ?>css/custom.css" rel="stylesheet">
	<link href="<?php echo $URL ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="view">
	<div class=" atas">
		<form method="get" action="" style="float:left;">
			<label class="checkbox-inline"><input type="checkbox" name="person" <?php if(isset($_GET['person'])){ echo "checked='checked'";} ?>> Personal </label>
			<label class="checkbox-inline"><input type="checkbox" name="ia" <?php if(isset($_GET['ia'])){ echo "checked='checked'";} ?>> IA </label>
			<label class="checkbox-inline"><input type="checkbox" name="se" <?php if(isset($_GET['se'])){ echo "checked='checked'";} ?>> SE </label>
			<label class="checkbox-inline"><input type="checkbox" name="bia" <?php if(isset($_GET['bia'])){ echo "checked='checked'";} ?>> BIA </label>
			<label class="checkbox-inline"><input type="checkbox" name="hr" <?php if(isset($_GET['hr'])){ echo "checked='checked'";} ?>> HR </label>
			<input type="hidden" id="file_no" name="file_no" value="<?php if(isset($_GET['file_no'])){ echo $_GET['file_no'];} ?>" >
			<button type="submit" class="print btn btn-sm btn-primary" ><i class="fa fa-search"></i> Show</button>
			<button type="button" class="print btn btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
		</form>
		<form action="<?php echo $URL; ?>form/pdfin.php" method="post" style="float:left;margin-left:5px;">
			<?php
				if(isset($_GET['file_no'])){
					$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
					$file = "Person_".$_GET['file_no']."_".$TODAY;

					echo '
					<input type="text" name="link" value="'.$link.'" hidden >
					<input type="text" name="file" value="'.$file.'" hidden >
					<button type="submit"  class="btn btn-sm btn-default " ><i class="fa fa-download"></i> Get PDF</button>';
				}
			?>
		</form>
		</div>

<div id="page-print">
	<div id="content">
		<?php
			include ("header.php");

			if(isset($_GET['person'])){
				$person = $URL."form/view/view-personal.php?file_no=".$_GET['file_no']."&a=hide";
				$cperson = file_get_contents($person);
				echo $cperson;
			}

			if(isset($_GET['ia'])){
				$a = $URL."form/view/view-ia.php?file_no=".$_GET['file_no']."&a=hide";
				$ca = file_get_contents($a);
				echo $ca;
			}

			if(isset($_GET['se'])){
				$b = $URL."form/view/view-se-person.php?file_no=".$_GET['file_no']."&a=hide";
				$cb = file_get_contents($b);
				echo $cb;
			}

			if(isset($_GET['bia'])){
				$c = $URL."form/view/view-bia-person.php?file_no=".$_GET['file_no']."&a=hide";
				$cc = file_get_contents($c);
				echo $cc;
			}

			if(isset($_GET['hr'])){
				$d = $URL."form/view/view-hr-person.php?file_no=".$_GET['file_no']."&a=hide";
				$cd = file_get_contents($d);
				echo $cd;
			}
			include ("footer.php");
		?>
	</div>
</div>
</body>
</html>
