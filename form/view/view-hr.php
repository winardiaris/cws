<?php
include("../../inc/conf.php");
include("../function.php") ;

if(isset($_GET['file_no'])){
	$qry = mysql_query("SELECT * FROM `hr` WHERE `file_no`='".$_GET['file_no']."' AND `status`='1'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count=mysql_num_rows($qry);
	$basic = explode(";",$data['basic']);
	$file_no = $_GET['file_no'];
	$edit = 1;
	
	if($count>0){
	
?>
<hr>
<h3>Health Report Form</h3>


<hr>
<h4>Basic</h4>
<table class="table table-bordered" >
	<tr>
		<td><label>File No: </label>  <span id="a"></span></td>
		<td><?php if($edit==1){echo $data['file_no'];} ?></td>
		<td><label>IC’s Personal information:</label></td>
		<td><?php if($edit==1){echo $basic[1];} ?></td>
	</tr>
	<tr>
		<td><label>Report Update: </label></td>
		<td><?php if($edit==1){echo $data['report_date'];} ?></td>
		<td><label>Reported by: </label></td>
		<td><?php if($edit==1){echo $basic[2];} ?></td>
	</tr>
	<tr>
		<td><label>Location: </label></td>
		<td><?php if($edit==1){echo $basic[0];} ?></td>
		<td></td>
		<td></td>
	</tr>
</table>

<hr>
<h4>Health Report</h4>
<table class="table table-bordered" >
	<tr>
		<td><label>1. Chronology/ Situation reported:</label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr1'];} ?></td>
	</tr>
	<tr>
		<td><label>2. Action taken:</label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr2'];} ?></td>
	</tr>
	<tr>
		<td><label>3. Budget estimate:</label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr3'];} ?></td>
	</tr>
	<tr>
		<td><label>4. Risk happened when the recommended procedure is not conducted: </label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr4'];} ?></td>
	</tr>
	<tr>
		<td><label>5. Concomitant illnesses that would affect treatment of the disease:</label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr5'];} ?></td>
	</tr>
	<tr>
		<td><label>6. How long the procedure will take: </label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr6'];} ?></td>
	</tr>
	<tr>
		<td><label>7. Suggestion: </label></td>
	</tr>
	<tr>
		<td ><?php if($edit==1){echo $data['hr7'];} ?></td>
	</tr>
</table>		
<?php
	}
	else{
		echo "No data HR for File Number: ".$_GET['file_no'];
		
	}	
}
?>
