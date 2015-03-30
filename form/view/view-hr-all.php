<?php
include("../../inc/conf.php");
include("../function.php") ;

if(empty($_GET['p'])){
	echo '
<html><head>
	
	<link href="'.$URL.'css/bootstrap.css" rel="stylesheet">
	<link href="'.$URL.'css/custom.css" rel="stylesheet">
	<link href="'.$URL.'font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body class="view">';
}

if(isset($_GET['file_no'])){
	$file_no = $_GET['file_no'];	
	$qry = mysql_query("SELECT * FROM `hr` WHERE `file_no`='$file_no' AND `status`='1'") or die(mysql_error());
	$count=mysql_num_rows($qry);
	$edit = 1;
	if($count>0){
		while($data = mysql_fetch_array($qry)){
			$hr_id = $data['hr_id'];
?>			
			<h4>Health Report File Number : <?php echo $_GET['file_no']?></h4>
			
			<h5>Basic</h5>
			<table class="table table-bordered" >
				<tr>
					<td>
						<b>File No: </b>
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
			$counts=mysql_num_rows($q);
			$a=0;
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
			
			//---------
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
			

			//----------
			}
			// comment 
			echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>
			<div class="page-break"></div>	';	
		}
		
		//== panel
		if(empty($_GET['p'])){
			$link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
			$file = "HR_".$data['file_no']."_ALL";
			echo'
			<form action="../pdfin.php" method="post">
			<div class="atas">
				<input type="text" name="link" value="'.$link.'" hidden>
				<input type="text" name="file" value="'.$file.'" hidden>
			   <button class="btn print btn-sm btn-primary" onclick="window.print()">Print</button>
				<input type="submit" value="Get PDF" class="btn btn-sm btn-default " >
			</div>
			</form>';
		}
		//==panel
	}
	else{
		echo "No data HR for File Number: ".$_GET['file_no'];
	}
}

if(empty($_GET['p'])){
	echo'</body>
</html>';
}	
?>
