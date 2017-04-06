<?php
include("../../inc/conf.php");
include("../function.php") ;

if(empty($_GET['a'])){
	echo '
<html><head>

	<link href="'.$URL.'css/bootstrap.css" rel="stylesheet">
	<link href="'.$URL.'css/custom.css" rel="stylesheet">
	<link href="'.$URL.'font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="view">';
}

if(isset($_GET['file_no']) AND isset($_GET['id'])){
	$file_no = $_GET['file_no'];
	$hr_id = $_GET['id'];

	$qry = mysql_query("SELECT * FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' AND `hr_id`='$hr_id'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count=mysql_num_rows($qry);

	$edit = 1;
	if($count>0){
		include ("header.php");
?>

<h4>Health Report</h4>
<hr>
<h5>Basic</h5>
<table class="table table-bordered" >
	<tr>
		<td>
			<b>UNHCR Case Number: </b>
			<?php if($edit==1){echo $data['file_no'];} ?>
		</td>
		<td>
			<b>IC’s Personal information:</b>
			<?php if($edit==1){echo Balikin($data['ics']);} ?>
		</td>
	</tr>
	<tr>
		<td>
			<b>Report Update: </b>
			<?php if($edit==1){echo $data['report_date'];} ?>
		</td>
		<td>
			<b>Reported by: </b>
			<?php if($edit==1){echo Balikin($data['reported']);} ?>
		</td>
	</tr>
	<tr>
		<td>
			<b>Location: </b>
			<?php if($edit==1){echo Balikin($data['location']);} ?>
		</td>
		<td></td>

	</tr>
</table>
<div class="page-break"></div>


<?php
		$q=mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id'")or die(mysql_error());
		$a=0;
		$counts=mysql_num_rows($q);
		while($d=mysql_fetch_array($q)){
			$a++;
		$id = explode(".",$d['person_id']);
		if(count($id)==2){
			$x = mysql_query("SELECT * FROM `reported_family` WHERE `id`='".$id[1]."' ;")or die(mysql_error());
			$y = mysql_fetch_array($x);
			$z = explode(";",$y['value']);
			$name = $z[0];
			$age = $z[1];
			if($z[2]=="M"){$sex = "Male";}else{$sex="Female";}
		}elseif(count($id)==1){
			$x = mysql_query("SELECT * FROM `person` WHERE `file_no`='".$id[0]."' ;")or die(mysql_error());
			$y = mysql_fetch_array($x);
			$name = $y['name'];
			$age = $y['age'];
			if($y['sex']=="M"){$sex = "Male";}else{$sex="Female";}
		}


?>

		<h5>Health Report</h5>
		<table class="table table-bordered" >
			<tr>
				<?php
					echo "
					<td><b>Name: </b> ".$name."</td>
					<td><b>Age: </b> ".$age."</td>
					<td><b>Gender :</b> ".$sex."</td>";
				?>
			</tr>
			<tr>
				<td colspan="3"><b>Situation:</b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['situation']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>1. Chronology/ Situation reported:</b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr1']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>2. Action taken:</b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr2']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>3. Budget estimate:</b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr3']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>4. Risk happened when the recommended procedure is not conducted: </b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr4']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>5. Concomitant illnesses that would affect treatment of the disease:</b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr5']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>6. How long the procedure will take: </b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr6']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><b>7. Suggestion: </b></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr7']);} ?></p></td>
			</tr>
		</table>

<?php
		if($a != $counts){
			echo '<div class="page-break"></div>';
		}

		}
	   // comment
		echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';

		//== panel
		if(empty($_GET['a'])){
			$link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
			$file = "HR_".$data['file_no']."_".$data['report_date'];
			echo'
			<form action="../pdfin.php" method="post">
			<div class="atas">
				<input type="text" name="link" value="'.$link.'" hidden>
				<input type="text" name="file" value="'.$file.'" hidden>
			   <button class="btn print btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				<button type="submit" class="btn btn-sm btn-default " ><i class="fa fa-download"></i> Get PDF</button>
			</div>
			</form>';
		}
		//==panel
	}
	else{
		echo "No data HR for File Number: ".$_GET['file_no'];
		echo '<div class="page-break"></div>';
	}
}
if(empty($_GET['a'])){
	echo'</body>
</html>';
}
?>
