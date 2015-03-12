<?php 
include("../../inc/conf.php");
include("../function.php") ;
	if(isset($_GET['file_no'])){
		$file_no = $_GET['file_no'];
		$qry = mysql_query("
				SELECT `person`.`file_no`,`person`.`name`,`master_country`.`country_name` ,`person`.`dob`,`person`.`age`,`person`.`sex`,`marital_status`.`marital`,`person`.`address`,`person`.`phone`,`person`.`photo`,`person`.`status`,`person`.`arrival`,`person`.`education`,`person`.`skill`,`person`.`mot`,`person`.`known_language`,`person`.`previous_occupation`,`person`.`volunteer`,`person`.`date_recognition`,`person`.`active`FROM `person`INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id` INNER JOIN `marital_status` ON `person`.`marital` = `marital_status`.`marital_id` 
				WHERE `person`.`file_no` ='$file_no'") 
				or die(mysql_error());
		$data = mysql_fetch_array($qry);
      
      $edu=explode("|",$data['education']);
		$edu1=explode(",",$edu[0]);
		$edu2=explode(",",$edu[1]);
		$edu3=explode(",",$edu[2]);
		
		$split=explode(",",$data['arrival']);
		if($data['photo']!=""){$photo = $URL."form/".$data['photo'];}else{$photo = $URL.'form/photo/default.png';}
	}
?>

<div class="photos" ><img src="<?php echo $photo; ?>"></div><br>
<h3>Personal Information</h3>
<hr>
<table class="table table-bordered">
<tr>
	<td width="15%"><label>File No:</label></td>
	<td width="35%"><?php echo $data['file_no'];?></td>
	<td width="15%"><label>Status:</label></td>
	<td width="35%"><?php echo $data['status'];?></td>
</tr>
<tr>
	<td><label>Name:</label></td>
	<td><?php echo $data['name'];?></td>
	<td><label>Date & port arrival:</label></td>
	<td><?php echo $split[1].", ".$split[0];?></td>
</tr>
<tr>
	<td><label>Country of Origin:</label></td>
	<td><?php echo $data['country_name'];?></td>
	<td><label>Education:</label></td>
	<td>
		<label>Formal:</label><br>
		<?php if($edu1[0]==1){$tedu1 .="Elementary School, ";}
				elseif($edu1[1]==1){$tedu1 .= "Junior High School, ";} 
				elseif($edu1[2]==1){$tedu1 .= "Senior High School, ";} 
				elseif($edu1[3]==1){$tedu1 .= "Vocational School, ";} 
				elseif($edu1[4]==1){$tedu1 .= "Accelerated School, ";}
				echo $tedu1;
		?>
		<br>
		<label>Informal:</label><br>
		<label>CWS:</label><br>
		<?php		
				if($edu2[0]==1){$tedu2 .="English, ";}
				elseif($edu2[1]==1){$tedu2 .= "Bahasa Indonesia, ";} 
				elseif($edu2[2]==1){$tedu2 .= "Computer, ";} 
				elseif($edu2[3]==1){$tedu2 .= "Art, ";} 
				elseif($edu2[4]==1){$tedu2 .= "Handicraft, ";}
				echo $tedu2;
		?>
		<br>
		<label>Insitution:</label><br>
		<?php		
				if($edu3[0]==1){$tedu3 .="English, ";}
				elseif($edu3[1]==1){$tedu3 .= "Art, ";} 
				echo $tedu3;	
		?>
	</td>
</tr>
<tr>
	<td><label>Date of Birth / Age:</label></td>
	<td><?php echo $data['dob']." / ".$data['age'];?></td>
	<td><label>Skills:</label></td>
	<td><?php echo $data['skill'];?></td>
</tr>
<tr>
	<td><label>Sex:</label></td>
	<td><?php if($data['sex']=="M"){echo "Male";}else{echo "Female";}?></td>
	<td><label>Mother of Tongue:</label></td>
	<td><?php echo $data['mot'];?></td>
</tr>
<tr>
	<td><label>Marital Status:</label></td>
	<td><?php echo $data['marital'];?></td>
	<td><label>Knowledge of other languages:</label></td>
	<td><?php echo $data['known_language'];?></td>
</tr>
<tr>
	<td><label>Address (in detail):</label></td>
	<td><?php echo getAddress($data['address']);?></td>
	<td><label>Previous occupation:</label></td>
	<td><?php echo $data['previous_occupation'];?></td>
</tr>
<tr>
	<td><label>Phone No:</label></td>
	<td><?php echo $data['phone'];?></td>
	<td><label>Willingness to volunteer:</label></td>
	<td><?php echo $data['volunteer'];?></td>
</tr>
<tr>
	<td><label>Active Status:</label></td>
	<td><?php if($data['active']==1){echo"Active";}elseif($data['active']==2){echo"Terminated";}else{echo"Deleted";}?></td>
	<td><label>Date of recognition:</label></td>
	<td><?php echo $data['date_recognition'];?></td>
</tr>
</table>

<h4>Reported family member</h4>
<hr>
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
		while($data=mysql_fetch_array($option)){
			$no ++;	$id=$data['id'];$value=$data['value'];$split=explode(";",$value);
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
<hr>

