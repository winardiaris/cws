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

<h4>Initial Assessment</h4>
<hr>
<table class="table table-bordered" border="1">
	<tr>
		<td width="25%"><b>File No:</b></td>
		<td width="25%"><?php echo $_GET['file_no']; ?></td>
		
		<td width="25%"><b>Date of Assessment:</b></td>
		<td width="25%"><?php echo $assessment[0]; ?></td>
	</tr>
	<tr>
		<td><b>Location:</b></td>
		<td><?php echo $assessment[1];?></td>
		
		<td><b>Assessment conducted by: </b></td>
		<td><?php echo $assessment[2]; ?></td>
	</tr>
</table>

<h5>Legal Documentation</h5>
<table class="table table-bordered" border="1">
	<tr>
		<td width="60%"><b>1. Did you register in your neighbourhood/ local authorities?</b></td>
		<td><?php echo $legal_doc[0]; ?></td>
	</tr>
	<tr>
		<td width="60%"><b>2. Do you have an attestation letter?</b></td>
		<td><?php echo $legal_doc[1]; ?></td>
	</tr>
	<tr>
		<td width="60%"><b>3. Do you have a valid passport and/ or other recognized travel documents? </b></td>
		<td><?php echo $legal_doc[2]; ?></td>
	</tr>
</table>

<h5>Current Living Condition</h5>
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
					<td align="center">'.$split[4].'</td>
					<td>'.$split[5].'</td>
					<td>'.$split[6].'</td>
					<td>'.$split[7].'</td>
				</tr>';
			}
		?>
	</tbody>
</table>

<h5 >Visual inspection of the UAM’s current living environment</h5>
<table class="table table-bordered" border="1">
	<tr>
		<td><b>Type of Residence:</b></td>
		<td colspan="4">
			<b class="radio-inline"> <input type="radio" name="ia_type_residence" value="1" <?php if($residence = 1) echo "checked='checked'"; ?> disabled> House</b>
			<b class="radio-inline"> <input type="radio" name="ia_type_residence" value="2" <?php if($residence = 1) echo "checked='checked'"; ?> disabled> Apartment</b>
			<b class="radio-inline"> <input type="radio" name="ia_type_residence" value="3" <?php if($residence = 1) echo "checked='checked'"; ?> disabled > Rented Room</b>
		</td>
	</tr>
	<tr>
		<td><b>House/Room condition:</b></td>
		<td>
			<b><input type="checkbox" disabled id="ia_room_1" value="1" <?php if($edit==1){if($room[0]==1)echo "checked='checked'";} ?>> In good condition</b><br>
			<b><input type="checkbox" disabled id="ia_room_2" value="1" <?php if($edit==1){if($room[1]==1)echo "checked='checked'";} ?>> Medium repair</b><br>
			<b><input type="checkbox" disabled id="ia_room_3" value="1" <?php if($edit==1){if($room[2]==1)echo "checked='checked'";} ?>> Leaking ceiling</b><br>
		</td><td>
			<b><input type="checkbox" disabled id="ia_room_4" value="1" <?php if($edit==1){if($room[3]==1)echo "checked='checked'";} ?>> Shared toilet/bathroom</b><br>
			<b><input type="checkbox" disabled id="ia_room_5" value="1" <?php if($edit==1){if($room[4]==1)echo "checked='checked'";} ?>> No toilet/bathroom</b><br>
			<b><input type="checkbox" disabled id="ia_room_6" value="1" <?php if($edit==1){if($room[5]==1)echo "checked='checked'";} ?>> Adequate air ventilation (windows, etc)</b><br>
		</td><td>
			<b><input type="checkbox" disabled id="ia_room_7" value="1" <?php if($edit==1){if($room[6]==1)echo "checked='checked'";} ?>> Inadequate air ventilation</b><br>
			<b><input type="checkbox" disabled id="ia_room_8" value="1" <?php if($edit==1){if($room[7]==1)echo "checked='checked'";} ?>> Piped Clean & Safe Water</b><br>
			<b><input type="checkbox" disabled id="ia_room_9" value="1" <?php if($edit==1){if($room[8]==1)echo "checked='checked'";} ?>> Shared kitchen</b><br>
		</td><td>	
			<b><input type="checkbox" disabled id="ia_room_10" value="1" <?php if($edit==1){if($room[9]==1)echo "checked='checked'";} ?>> No kitchen</b><br>
			<b><input type="checkbox" disabled id="ia_room_11" value="1" <?php if($edit==1){if($room[10]==1)echo "checked='checked'";} ?>> Damp</b><br>
			<b><input type="checkbox" disabled id="ia_room_12" value="1" <?php if($edit==1){if($room[11]==1)echo "checked='checked'";} ?>> Smell</b><br>
		</td>
	</tr>
	<tr>
		<td><b>UAM’s Furniture:</b></td>
		<td>
			<b><input type="checkbox" disabled id="ia_furniture_1" value="1" <?php if($edit==1){if($furniture[0]==1)echo "checked='checked'";} ?>> Bed </b><br>
			<b><input type="checkbox" disabled id="ia_furniture_2" value="1" <?php if($edit==1){if($furniture[1]==1)echo "checked='checked'";} ?>> Mattress </b><br>
			<b><input type="checkbox" disabled id="ia_furniture_3" value="1" <?php if($edit==1){if($furniture[2]==1)echo "checked='checked'";} ?>> Carpet </b><br>
		</td><td colspan="3">	
			<b><input type="checkbox" disabled id="ia_furniture_4" value="1" <?php if($edit==1){if($furniture[3]==1)echo "checked='checked'";} ?>> Wardrobe/Cupboard</b><br>
			<b><input type="checkbox" disabled id="ia_furniture_5" value="1" <?php if($edit==1){if($furniture[4]==1)echo "checked='checked'";} ?>> Table</b><br>
			<b><input type="checkbox" disabled id="ia_furniture_6" value="1" <?php if($edit==1){if($furniture[5]==1)echo "checked='checked'";} ?>> Chairs</b><br>
		</td>
	</tr>
	<tr>
		<td><b>Does the UAM share a bedroom? </b><br><i>With whom?</i></td>
		<td colspan="4"><?php echo $living_cond[0]; ?></td>
	</tr>
	<tr>
		<td><b>Living space in m2</b></td>
		<td colspan="4"><?php echo $living_cond[1]; ?></td>
	</tr>
	<tr>
		<td><b>Rent:</b></td>
		<td colspan="4"><?php echo $living_cond[2]; ?></td>
	</tr>
</table>

<table class="table table-bordered " border="1">
	<tr>
		<td align="right" width="10px">1.</td>
		<td><b>Potential risks created by the living environment? Other comments?</b></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q12[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">2.</td>
		<td><b>How do you pay for regular expenses? Who pays the rent? Are you asked to contribute to household costs (food, rent, etc.)? Any coercion? The difference between chores and being enslaved</b></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q12[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">3.</td>
		<td><b>How do you spend the day? Do you have sleeping problems? </b></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q34[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">4.</td>
		<td><b>Do you have any health problems, conditions, or disabilities? Have you been treated for any illness since in Indonesia?</b></td>
	</tr>
	<tr>
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q34[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">5.</td>
		<td><b>Do you face any problems in your current living arrangement? Do you have any problems with your housemates, neighbours, or others (e.g. police)? Anyone tease you? Potential of abuse*</b></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q56[0];  ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">6.</td>
		<td><b>Are there any people around you who can help you address these problems? What kinds of support do you need?</b></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q56[1]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">7.</td>
		<td><b>Do you have anything else you would like to tell me?</b></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q78[0]; ?></p></td>
	</tr>
	<tr>
		<td align="right" width="10px">8.</td>
		<td><b>Comments from housemates:</b></td>
	</tr>
	<tr>
		
		<td colspan="2"><p style="margin-left:20px;"><?php echo $q78[1]; ?></p></td>
	</tr>
	<tr>
		<td colspan="2"><b>Remarks from CWS staff: </b><?php echo $data2['remarks_staff']; ?></td>
	</tr>
</table>
<?php
	// comment 
	echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
	echo '<div class="page-break"></div>';
	
	//== panel
		if(empty($_GET['a'])){
			$link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
			$file = "IA_".$data['file_no']."_".$assessment[0];
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
		echo "No data IA for File Number: ".$_GET['file_no'];
		echo '<div class="page-break"></div>';
		
	}	
}
if(empty($_GET['a'])){
	echo'</body>
</html>';
}
?>

