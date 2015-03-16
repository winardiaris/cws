<?php
include("../../inc/conf.php");
include("../function.php") ;

if(isset($_GET['file_no']) AND isset($_GET['id'])){
	$file_no = $_GET['file_no'];
	$hr_id = $_GET['id'];
	
	$qry = mysql_query("SELECT * FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' AND `hr_id`='$hr_id'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count=mysql_num_rows($qry);
	
	$edit = 1;
	if($count>0){
	
?>
<hr>
<h3>Health Report</h3>
<hr>
<h4>Basic</h4>
<table class="table table-bordered" >
	<tr>
		<td>
			<label>File No: </label>
			<?php if($edit==1){echo $data['file_no'];} ?>
		</td>
		<td>
			<label>IC’s Personal information:</label>
			<?php if($edit==1){echo Balikin($data['ics']);} ?>
		</td>
	</tr>
	<tr>
		<td>
			<label>Report Update: </label>
			<?php if($edit==1){echo $data['report_date'];} ?>
		</td>
		<td>
			<label>Reported by: </label>
			<?php if($edit==1){echo Balikin($data['reported']);} ?>
		</td>
	</tr>
	<tr>
		<td>
			<label>Location: </label>
			<?php if($edit==1){echo Balikin($data['location']);} ?>
		</td>
		<td></td>

	</tr>
</table>


<?php 
		$q=mysql_query("SELECT * FROM `hr_data` WHERE `hr_id`='$hr_id'")or die(mysql_error());
		while($d=mysql_fetch_array($q)){
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
		<hr>
		<h4>Health Report</h4>
		<table class="table table-bordered" >
			<tr>
				<?php 
					echo "
					<td><label>Name: </label> ".$name."</td>
					<td><label>Age: </label> ".$age."</td>
					<td><label>Gender :</label> ".$sex."</td>";
				?>
			</tr>
			<tr>
				<td colspan="3"><label>Situation:</label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['situation']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>1. Chronology/ Situation reported:</label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr1']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>2. Action taken:</label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr2']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>3. Budget estimate:</label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr3']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>4. Risk happened when the recommended procedure is not conducted: </label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr4']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>5. Concomitant illnesses that would affect treatment of the disease:</label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr5']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>6. How long the procedure will take: </label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr6']);} ?></p></td>
			</tr>
			<tr>
				<td colspan="3"><label>7. Suggestion: </label></td>
			</tr>
			<tr>
				<td colspan="3"><p style="margin-left:15px;"><?php if($edit==1){echo Balikin($d['hr7']);} ?></p></td>
			</tr>
		</table>

<?php		
		}
	   // comment 
		echo '<label>Comment:</label>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
	}
	else{
		echo "No data HR for File Number: ".$_GET['file_no'];
	}	
}
?>
