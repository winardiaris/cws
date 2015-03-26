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
<body>
	<button class="btn print btn-sm btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print</button>	
<?php
if(isset($_GET['file_no'])){
	$qry = mysql_query("SELECT * FROM `ia` WHERE `file_no`='".$_GET['file_no']."'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count = mysql_num_rows($qry);
	
	$assessment = explode(";",$data['assessment']);
	$legal_doc = explode(";",$data['legal_doc']);
	$living_env = explode(";",$data['living_env']);
	
	$residence = $living_env[0];
	$room = explode(",",$living_env[1]);
	$furniture = explode(",",$living_env[2]);
	$living_cond = explode(";",$data['living_cond']);

	$q12 = explode(";",$data['q12']);
	$q34 = explode(";",$data['q34']);
	$q56 = explode(";",$data['q56']);
	$q78 = explode(";",$data['q78']);
	$edit=1;
	
	if($count>0){

?>	

<h3>Initial Assessment</h3>
<table class="table table-bordered" border="1">
	<tr>
		<td width="150px"><label>File No:</label></td>
		<td><?php echo $_GET['file_no']; ?></td>
		
		<td><label>Date of Assessment:</label></td>
		<td><?php echo $assessment[0]; ?></td>
	</tr>
	<tr>
		<td><label>Location:</label></td>
		<td><?php echo $assessment[1];?></td>
		
		<td><label>Assessment conducted by: </label></td>
		<td><?php echo $assessment[2]; ?></td>
	</tr>
</table>
<hr>
<h4>Legal Documentation</h4>
<table class="table table-bordered" border="1">
	<tr>
		<td><label>1. Did you register in your neighbourhood/ local authorities?</label></td>
		<td><?php echo $legal_doc[0]; ?></td>
	</tr>
	<tr>
		<td><label>2. Do you have an attestation letter?</label></td>
		<td><?php echo $legal_doc[1]; ?></td>
	</tr>
	<tr>
		<td><label>3. Do you have a valid passport and/ or other recognized travel documents? </label></td>
		<td><?php echo $legal_doc[2]; ?></td>
	</tr>
</table>
<hr>
<h4>Current Living Condition</h4>
<table class="table table-bordered  table-hover" border="1">
	<thead>
		<tr>
			<th width="10px" >No.</th>
			<th>Name</th>
			<th>File Number</th>
			<th>Country</th>
			<th>DoB , Age</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Relationship</th>
			<th>When did you meet this person?</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$file_no=$_GET['file_no'];
			$no=0;
			
			$qry = mysql_query("SELECT * FROM `with_whom_living` WHERE `file_no`='$file_no'") or die(mysql_error());
			while($data2=mysql_fetch_array($qry)){
				$no++;
				$id=$data2['id'];$value=$data2['value'];$split=explode(";",$value);
				echo'
				<tr>
					<td align="right">'.$no.'.</td>
					<td>'.$split[0].'</td>
					<td>'.$split[1].'</td>
					<td>'; echo getCountry($split[2]); echo'</td>
					<td>'.$split[3].'</td>
					<td>'.$split[4].'</td>
					<td>'.$split[5].'</td>
					<td>'.$split[6].'</td>
					<td>'.$split[7].'</td>
				</tr>';
			}
		?>
	</tbody>
</table>
<hr>
<h4 >Visual inspection of the UAM’s current living environment</h4>
<table class="table table-bordered" border="1">
	<tr>
		<td><label>Type of Residence:</label></td>
		<td colspan="4">
			<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="1" <?php if($residence = 1) echo "checked"; ?> disabled> House</label>
			<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="2" <?php if($residence = 1) echo "checked"; ?> disabled> Apartment</label>
			<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="3" <?php if($residence = 1) echo "checked"; ?> disabled > Rented Room</label>
		</td>
	</tr>
	<tr>
		<td><label>House/Room condition:</label></td>
		<td>
			<label><input type="checkbox" id="ia_room_1" value="1" <?php if($edit==1){if($room[0]==1)echo "checked";} ?>> In good condition</label><br>
			<label><input type="checkbox" id="ia_room_2" value="1" <?php if($edit==1){if($room[1]==1)echo "checked";} ?>> Medium repair</label><br>
			<label><input type="checkbox" id="ia_room_3" value="1" <?php if($edit==1){if($room[2]==1)echo "checked";} ?>> Leaking ceiling</label><br>
		</td><td>
			<label><input type="checkbox" id="ia_room_4" value="1" <?php if($edit==1){if($room[3]==1)echo "checked";} ?>> Shared toilet/bathroom</label><br>
			<label><input type="checkbox" id="ia_room_5" value="1" <?php if($edit==1){if($room[4]==1)echo "checked";} ?>> No toilet/bathroom</label><br>
			<label><input type="checkbox" id="ia_room_6" value="1" <?php if($edit==1){if($room[5]==1)echo "checked";} ?>> Adequate air ventilation (windows, etc)</label><br>
		</td><td>
			<label><input type="checkbox" id="ia_room_7" value="1" <?php if($edit==1){if($room[6]==1)echo "checked";} ?>> Inadequate air ventilation</label><br>
			<label><input type="checkbox" id="ia_room_8" value="1" <?php if($edit==1){if($room[7]==1)echo "checked";} ?>> Piped Clean & Safe Water</label><br>
			<label><input type="checkbox" id="ia_room_9" value="1" <?php if($edit==1){if($room[8]==1)echo "checked";} ?>> Shared kitchen</label><br>
		</td><td>	
			<label><input type="checkbox" id="ia_room_10" value="1" <?php if($edit==1){if($room[9]==1)echo "checked";} ?>> No kitchen</label><br>
			<label><input type="checkbox" id="ia_room_11" value="1" <?php if($edit==1){if($room[10]==1)echo "checked";} ?>> Damp</label><br>
			<label><input type="checkbox" id="ia_room_12" value="1" <?php if($edit==1){if($room[11]==1)echo "checked";} ?>> Smell</label><br>
		</td>
	</tr>
	<tr>
		<td><label>UAM’s Furniture:</label></td>
		<td>
			<label><input type="checkbox" id="ia_furniture_1" value="1" <?php if($edit==1){if($furniture[0]==1)echo "checked";} ?>> Bed </label><br>
			<label><input type="checkbox" id="ia_furniture_2" value="1" <?php if($edit==1){if($furniture[1]==1)echo "checked";} ?>> Mattress </label><br>
			<label><input type="checkbox" id="ia_furniture_3" value="1" <?php if($edit==1){if($furniture[2]==1)echo "checked";} ?>> Carpet </label><br>
		</td><td colspan="3">	
			<label><input type="checkbox" id="ia_furniture_4" value="1" <?php if($edit==1){if($furniture[3]==1)echo "checked";} ?>> Wardrobe/Cupboard</label><br>
			<label><input type="checkbox" id="ia_furniture_5" value="1" <?php if($edit==1){if($furniture[4]==1)echo "checked";} ?>> Table</label><br>
			<label><input type="checkbox" id="ia_furniture_6" value="1" <?php if($edit==1){if($furniture[5]==1)echo "checked";} ?>> Chairs</label><br>
		</td>
	</tr>
	<tr>
		<td><label>Does the UAM share a bedroom? </label><br><i>With whom?</i></td>
		<td colspan="4"><?php echo $living_cond[0]; ?></td>
	</tr>
	<tr>
		<td><label>Living space in m2</label></td>
		<td colspan="4"><?php echo $living_cond[1]; ?></td>
	</tr>
	<tr>
		<td><label>Rent:</label></td>
		<td colspan="4"><?php echo $living_cond[2]; ?></td>
	</tr>
</table>
<hr>
<table class="table table-bordered " border="1">
	<tr>
		<td align="right" width="10px">1.</td>
		<td><label>Potential risks created by the living environment? Other comments?</label></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q12[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">2.</td>
		<td><label>How do you pay for regular expenses? Who pays the rent? Are you asked to contribute to household costs (food, rent, etc.)? Any coercion? The difference between chores and being enslaved</label></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q12[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">3.</td>
		<td><label>How do you spend the day? Do you have sleeping problems? </label></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q34[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">4.</td>
		<td><label>Do you have any health problems, conditions, or disabilities? Have you been treated for any illness since in Indonesia?</label></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q34[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">5.</td>
		<td><label>Do you face any problems in your current living arrangement? Do you have any problems with your housemates, neighbours, or others (e.g. police)? Anyone tease you? Potential of abuse*</label></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q56[0];  ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">6.</td>
		<td><label>Are there any people around you who can help you address these problems? What kinds of support do you need?</label></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q56[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">7.</td>
		<td><label>Do you have anything else you would like to tell me?</label></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q78[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">8.</td>
		<td><label>Comments from housemates:</label></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q78[1]; ?></p></td>
	</tr>
	<tr>
		<td colspan="2"><label>Remarks from CWS staff: </label><?php echo $data2['remarks_staff']; ?></td>
	</tr>
</table>
<?php
	// comment 
	echo '<label>Comment:</label>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
	}
	else{
		echo "No data IA for File Number: ".$_GET['file_no'];
		
	}	
}
?>
<hr>
</body>
</html>
