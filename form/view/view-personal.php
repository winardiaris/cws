<?php 
include("../../inc/conf.php");
include("../function.php") ;
	if(isset($_GET['file_no'])){
		$file_no = $_GET['file_no'];
		$qry = mysql_query("
				SELECT `person`.`file_no`,`person`.`name`,`master_country`.`country_name` ,`person`.`dob`,`person`.`age`,`person`.`sex`,`marital_status`.`marital`,`person`.`address`,`person`.`phone`,`person`.`photo`,`person`.`status`,`person`.`arrival`,`person`.`education`,`person`.`skill`,`person`.`mot`,`person`.`known_language`,`person`.`previous_occupation`,`person`.`volunteer`,`person`.`active`, `person`.`comment` FROM `person`INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id` INNER JOIN `marital_status` ON `person`.`marital` = `marital_status`.`marital_id` 
				WHERE `person`.`file_no` ='$file_no'") 
				or die(mysql_error());
		$data = mysql_fetch_array($qry);
      
      $edu=explode("|",$data['education']);
		$edu1=explode(",",$edu[0]);
		$edu2=explode(",",$edu[1]);
		$edu3=explode(",",$edu[2]);
		//$comment = $data['comment'];
		
		$split=explode(",",$data['arrival']);
		if($data['photo']!=""){$photo = $URL."form/".$data['photo'];}else{$photo = $URL.'form/photo/default.png';}
	}
?>



<hr>
<table  style="border:none !important;" width="100%">
<tr>
	<td valign="bottom"><h4>Personal Information</h4></td>
	<td align="right"><img src="<?php echo $photo; ?>" style="height:120px;width:100px;"><br></td>
</tr>
</table>
<table class="table table-bordered">
<tr>
	<td ><b>UNHCR Case Number:</b></td>
	<td><?php echo $data['file_no'];?></td>
	<td ><b>Status:</b></td>
	<td ><?php echo $data['status'];?></td>
</tr>
<tr>
	<td><b>Name:</b></td>
	<td><?php echo $data['name'];?></td>
	<td><b>Date & port arrival:</b></td>
	<td><?php echo $split[1].", ".$split[0];?></td>
</tr>
<tr>
	<td><b>Country of Origin:</b></td>
	<td><?php echo $data['country_name'];?></td>
	<td><b>Education:</b></td>
	<td>
		<b>Formal:</b><br>
		<?php if($edu1[0]==1){$tedu1 .="Elementary School, ";}
				elseif($edu1[1]==1){$tedu1 .= "Junior High School, ";} 
				elseif($edu1[2]==1){$tedu1 .= "Senior High School, ";} 
				elseif($edu1[3]==1){$tedu1 .= "Vocational School, ";} 
				elseif($edu1[4]==1){$tedu1 .= "Accelerated School, ";}
				echo $tedu1;
		?>
		<br>
		<b>Informal:</b><br>
		<b>CWS:</b><br>
		<?php		
				if($edu2[0]==1){$tedu2 .="English, ";}
				elseif($edu2[1]==1){$tedu2 .= "Bahasa Indonesia, ";} 
				elseif($edu2[2]==1){$tedu2 .= "Computer, ";} 
				elseif($edu2[3]==1){$tedu2 .= "Art, ";} 
				elseif($edu2[4]==1){$tedu2 .= "Handicraft, ";}
				echo $tedu2;
		?>
		<br>
		<b>Insitution:</b><br>
		<?php		
				if($edu3[0]==1){$tedu3 .="English, ";}
				elseif($edu3[1]==1){$tedu3 .= "Art, ";} 
				echo $tedu3;	
		?>
	</td>
</tr>
<tr>
	<td><b>Date of Birth / Age:</b></td>
	<td><?php echo $data['dob']." / ".$data['age'];?></td>
	<td><b>Skills:</b></td>
	<td><?php echo $data['skill'];?></td>
</tr>
<tr>
	<td><b>Sex:</b></td>
	<td><?php if($data['sex']=="M"){echo "Male";}else{echo "Female";}?></td>
	<td><b>Mother Tongue:</b></td>
	<td><?php echo $data['mot'];?></td>
</tr>
<tr>
	<td><b>Marital Status:</b></td>
	<td><?php echo $data['marital'];?></td>
	<td><b>Knowledge of other languages:</b></td>
	<td><?php echo $data['known_language'];?></td>
</tr>
<tr>
	<td><b>Address (in detail):</b></td>
	<td><?php echo getAddress($data['address']);?></td>
	<td><b>Previous occupation:</b></td>
	<td><?php echo $data['previous_occupation'];?></td>
</tr>
<tr>
	<td><b>Phone No:</b></td>
	<td><?php echo $data['phone'];?></td>
	<td><b>Willingness to volunteer:</b></td>
	<td><?php echo $data['volunteer'];?></td>
</tr>
<tr>
	<td><b>Active Status:</b></td>
	<td><?php if($data['active']==1){echo"Active";}elseif($data['active']==2){echo"Terminated";}else{echo"Deleted";}?></td>
	<td><b>Date of recognition:</b></td>
	<td></td>
</tr>
</table>

<h5>Reported family member</h5>
<table class="table table-bordered">
<tr>
	<th width="10px">No</th>
	<th>Name</th>
	<th>Age</th>
	<th>Sex</th>
	<th>Relation</th>
	<th>Current location</th>
	<th>Remarks</th>
	<th>Last Contact</th>
</tr>
<?php
	
	$option=mysql_query("SELECT * FROM `reported_family` WHERE `file_no`='$file_no' ");
	$no=0;
	if(mysql_num_rows($option)>0){
		while($data2=mysql_fetch_array($option)){
			$no ++;	$id=$data2['id'];$value=$data2['value'];$split=explode(";",$value);
			$name=$split[0];$age=$split[1];	$sex=$split[2]; $relation=$split[3]; $location=$split[4];$remarks =	$split[5];$contact=$split[6];
			echo 
			"<tr>
				<td align='right' width'10px'>".$no.".</td>
				<td>".$name."</td>
				<td width='20px'>".$age."</td>
				<td width='20px'>".$sex."</td>
				<td >".$relation."</td>
				<td >".$location."</td>
				<td >".$remarks."</td>
				<td >".$contact."</td>
			</tr>";
		}
	}
	else{
		echo '<tr><td> - </td><td> - </td><td> - </td><td> - </td><td> - </td><td> - </td><td> - </td><td> - </td></tr>';
	}
?>
</table>
<?php
// comment 
echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
echo '<div class="page-break"></div>';
?>

