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
	$qry = mysql_query("SELECT * FROM `se` WHERE `file_no`='".$_GET['file_no']."' ORDER BY `doa` DESC LIMIT 1 ") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count = mysql_num_rows($qry);

	$assessment = explode(";",$data['assessment_data']);
	$background = explode(";",$data['background_info']);
	$living_env = explode(";",$data['living_env']);
	$house=explode(",",$living_env[0]);
	$fur=explode(",",$living_env[1]);
	$living_cond = explode(";",$data['living_cond']);
	$sec_neigh=explode(";",$data['sec_neigh']);
	$sec=explode(",",$sec_neigh[0]);
	$neigh=explode(",",$sec_neigh[1]);
	$phnn = explode(";",$data['phnn']);
	$child_protect = explode(";",$data['child_protect']);
	$child = explode(",",$child_protect[0]);
	$support_system = explode(";",$data['support_system']);
	$household=explode(",",$support_system[0]);
	$expe=explode(",",$support_system[1]);
	$com=explode(",",$support_system[2]);
	$recommend=explode(";",$data['recommend']);
	$verification=explode(";",$data['verification']);

	$q = mysql_query("SELECT * FROM `person` WHERE `file_no`='".$_GET['file_no']."'") or die(mysql_error());
	$person = mysql_fetch_array($q);

	$edit = 1;

	if($count>0){
?>
<h4>Socio Economic <?php if($data['id']==0){echo "Assessment";}else{echo "Re-Assessment";} ?> Report  </h4>
<hr>
<h5>Assessment Remaks</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td><b>File Number:</b></td>
			<td><?php if($edit==1){echo $data['file_no'];}?></td>

			<td><b>Date of Assessment:</b></td>
			<td><?php if($edit==1){echo $data['doa'];}?></td>

			<td><b>Interviewer:</b></td>
			<td><?php if($edit==1){echo $assessment[0];}?></td>
		</tr>
		<tr>
			<td><b>Location: </b></td>
			<td><?php if($edit==1){echo $assessment[1];}?></td>

			<td><b>Date of last assessment:</b></td>
			<td><?php if($edit==1){echo $assessment[2];}?></td>

			<td><b>Assistance receiving since <i>(if any)</i>:</b></td>
			<td><?php if($edit==1){echo $assessment[3];}?></td>
		</tr>
		<tr>
			<td><b>Interpreter:</b></td>
			<td><?php if($edit==1){echo $assessment[4];} ?></td>

			<td><b># of home visit(s):</b></td>
			<td><?php if($edit==1){echo $assessment[5];} ?></td>

			<td><b>Date of last home visit:</b></td>
			<td><?php if($edit==1){echo $assessment[6];} ?></td>
		</tr>
		<tr>
			<td><label>Status:</label></td>
			<td><?php if($edit==1){echo $person['status'];} ?></td>
		</tr>
	</table>
<h5>Background Information and Assessment Purpose</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td><b>1. How PoC (and family) survived from date of arrival to the date of assessment?</b></td>
		</tr><tr>
			<td><?php if($edit==1){echo $background[0];} ?></td>
		</tr>
		<tr>
			<td><b>2. Current Situation (Socio-economic):</b></td>
		</tr><tr>
			<td><?php if($edit==1){echo $background[1];} ?></td>
		</tr>
	</table>
<h5>Living Condition <small>(to be filled in after home visits)</small></h5>
<h5>A. GENERAL</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td><b>House/Room condition:</b></td>
			<td>
				<b><input disabled type="checkbox" id="room_1" value="1" <?php if($edit==1){if($house[0]==1){echo "checked";}} ?> > No repair</b><br>
				<b><input disabled type="checkbox" id="room_2" value="1" <?php if($edit==1){if($house[1]==1){echo "checked";}} ?>> Medium repair</b><br>
				<b><input disabled type="checkbox" id="room_3" value="1" <?php if($edit==1){if($house[2]==1){echo "checked";}} ?>> Leaking ceiling</b><br>
				<b><input disabled type="checkbox" id="room_4" value="1" <?php if($edit==1){if($house[3]==1){echo "checked";}} ?>> Shared toilet/bathroom</b><br>
				<b><input disabled type="checkbox" id="room_5" value="1" <?php if($edit==1){if($house[4]==1){echo "checked";}} ?>> No toilet/bathroom</b><br>
			</td><td>
				<b><input disabled type="checkbox" id="room_6" value="1" <?php if($edit==1){if($house[5]==1){echo "checked";}} ?>> Air ventilation (windows, etc)</b><br>
				<b><input disabled type="checkbox" id="room_7" value="1" <?php if($edit==1){if($house[6]==1){echo "checked";}} ?>> No air ventilation</b><br>
				<b><input disabled type="checkbox" id="room_8" value="1" <?php if($edit==1){if($house[7]==1){echo "checked";}} ?>> Shared kitchen</b><br>
				<b><input disabled type="checkbox" id="room_9" value="1" <?php if($edit==1){if($house[8]==1){echo "checked";}} ?>> No kitchen</b><br>
				<b><input disabled type="checkbox" id="room_10" value="1" <?php if($edit==1){if($house[9]==1){echo "checked";}} ?>> Dampness </b><br>
				<b><input disabled type="checkbox" id="room_11" value="1" <?php if($edit==1){if($house[10]==1){echo "checked";}} ?>> Smell</b><br>
			</td>
		</tr>
		<tr>
			<td><b>Furniture / Equipment:</b></td>
			<td>
				<b><input disabled type="checkbox" id="furni_1" value="1"  <?php if($edit==1){if($fur[0]==1){echo "checked";}} ?>> Bed</b><br>
				<b><input disabled type="checkbox" id="furni_2" value="1" <?php if($edit==1){if($fur[1]==1){echo "checked";}} ?>> Sofa</b><br>
				<b><input disabled type="checkbox" id="furni_3" value="1" <?php if($edit==1){if($fur[2]==1){echo "checked";}} ?>> Wardrobe/Cupboard</b><br>
				<b><input disabled type="checkbox" id="furni_4" value="1" <?php if($edit==1){if($fur[3]==1){echo "checked";}} ?>> Table</b><br>
				<b><input disabled type="checkbox" id="furni_5" value="1" <?php if($edit==1){if($fur[4]==1){echo "checked";}} ?>> Chairs</b><br>
				<b><input disabled type="checkbox" id="furni_6" value="1" <?php if($edit==1){if($fur[5]==1){echo "checked";}} ?>> Rice cooker</b><br>
				<b><input disabled type="checkbox" id="furni_7" value="1" <?php if($edit==1){if($fur[6]==1){echo "checked";}} ?>> Refrigerator</b><br>
				<b><input disabled type="checkbox" id="furni_8" value="1" <?php if($edit==1){if($fur[7]==1){echo "checked";}} ?>> Gas stove</b><br>
				<b><input disabled type="checkbox" id="furni_9" value="1" <?php if($edit==1){if($fur[8]==1){echo "checked";}} ?>> Washing machine</b><br>
				<b><input disabled type="checkbox" id="furni_10" value="1" <?php if($edit==1){if($fur[9]==1){echo "checked";}} ?>> TV set </b><br>
			</td><td valign="top">
				<b><input disabled type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[10]==1){echo "checked";}} ?>> Iron</b><br>
				<b><input disabled type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[11]==1){echo "checked";}} ?>> Computer (laptop, tablet)</b><br>
				<b><input disabled type="checkbox" id="furni_13" value="1" <?php if($edit==1){if($fur[12]==1){echo "checked";}} ?>> DVD player</b><br>
				<b><input disabled type="checkbox" id="furni_14" value="1" <?php if($edit==1){if($fur[13]==1){echo "checked";}} ?>> AC</b><br>
				<b><input disabled type="checkbox" id="furni_15" value="1" <?php if($edit==1){if($fur[14]==1){echo "checked";}} ?>> Fan</b><br>
				<b><input disabled type="checkbox" id="furni_16" value="1" <?php if($edit==1){if($fur[15]==1){echo "checked";}} ?>> Internet Connection</b><br>
				<b><input disabled type="checkbox" id="furni_17" value="1" <?php if($edit==1){if($fur[16]==1){echo "checked";}} ?>> TV Cable</b><br>
				<b><input disabled type="checkbox" id="furni_18" value="1" <?php if($edit==1){if($fur[17]==1){echo "checked";}} ?>> Piped Clean & Safe Water</b><br>
				<b><input disabled type="checkbox" id="furni_19" value="1" <?php if($edit==1){if($fur[18]==1){echo "checked";}} ?>> Motorcycle</b><br>
				<b><input disabled type="checkbox" id="furni_20" value="1" <?php if($edit==1){if($fur[19]==1){echo "checked";}} ?>> Mobile phone</b><br>
				<b><input disabled type="checkbox" id="furni_21" value="1" <?php if($edit==1){if($fur[20]==1){echo "checked";}} ?>> Others</b><br>
			</td>
		</tr>
	</table>

	<table border="1" class="table table-bordered">
		<tr>
			<td ><b>Number of rooms: </b></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[0];}?></td>

			<td><b>Living space in M2:</b></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[1];}?></td>

			<td><b>Monthly rent fee:</b></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[2];}?></td>
		</tr>
		<tr>
			<td colspan="6"><b>Notes/comments on general condition: </b></td>
		</tr>
		<tr>
			<td colspan="6"><?php if($edit==1){echo $living_cond[3];}?></td>
		</tr>
	</table>

	<table border="1" class="table table-bordered">
		<tr>
			<td>Security and Safety Measures:</td>
			<td colspan="3">
				<b><input disabled type="checkbox" id="sec_1" value="1" <?php if($edit==1){if($sec[0]==1){echo "checked";}} ?>> Fenced accommodation</b>
				<b><input disabled type="checkbox" id="sec_2" value="1" <?php if($edit==1){if($sec[1]==1){echo "checked";}} ?>> Secure gate</b>
				<b><input disabled type="checkbox" id="sec_3" value="1" <?php if($edit==1){if($sec[2]==1){echo "checked";}} ?>> Secure doors & windows</b>
				<b><input disabled type="checkbox" id="sec_4" value="1" <?php if($edit==1){if($sec[3]==1){echo "checked";}} ?>> Multiple Entry/Exit points in the building</b>
				<b><input disabled type="checkbox" id="sec_5" value="1" <?php if($edit==1){if($sec[4]==1){echo "checked";}} ?>> Fire Extinguisher</b>
			</td>
		</tr>
		<tr>
			<td><b>Neighbourhood/Relationship with Around People:</b></td>
			<td colspan="3">
				<b><input disabled type="checkbox" id="neig_1" value="1" <?php if($edit==1){if($neigh[0]==1){echo "checked";}} ?>> Clean & healthy area</b>
				<b><input disabled type="checkbox" id="neig_2" value="1" <?php if($edit==1){if($neigh[1]==1){echo "checked";}} ?>> Dense populated area</b>
				<b><input disabled type="checkbox" id="neig_3" value="1" <?php if($edit==1){if($neigh[2]==1){echo "checked";}} ?>> Slum area</b>
				<b><input disabled type="checkbox" id="neig_4" value="1" <?php if($edit==1){if($neigh[3]==1){echo "checked";}} ?>> Trading area</b>
				<b><input disabled type="checkbox" id="neig_5" value="1" <?php if($edit==1){if($neigh[4]==1){echo "checked";}} ?>> Others</b>
			</td>
		</tr>
		<tr>
			<td><b>Police station:</b></td>
			<td><?php if($edit==1){echo $phnn[0];}?></td>

			<td><b>Health facilities:</b></td>
			<td><?php if($edit==1){echo $phnn[1];}?></td>
		</tr>
		<tr>
			<td><b>Notes: </b></td>
			<td colspan="3"><?php if($edit==1){echo $phnn[2];}?></td>
		</tr>
		<tr>
			<td><b>Number of person living in same house:  </b></td>
			<td colspan="3"><?php if($edit==1){echo $phnn[3];}?></td>
		</tr>
	</table>

<h5>B. PERSON WITH SPECIFIC NEEDS</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td><b>Please specify more about the vulnerabilities: </b></td>
			<td colspan="3"><?php if($edit==1){echo $data['vulnerabilities'];}; ?></td>
		</tr>
		<tr>
			<td colspan="4"><b>1. CHILDREN </b></td>
		</tr>
		<tr>
			<td width="300px">Unaccompanied minors:  </td>
			<td >
				<b class="radio-inline"><input disabled type="radio" name="unaccompanied_minors"  value="1" <?php if($edit==1){if($child[0]==1){echo "checked"; }} ?>  >Yes</b><b class="radio-inline"><input disabled type="radio" name="unaccompanied_minors"  value="0" <?php if($edit==1){if($child[0]==0){echo "checked"; }} ?>>No</b>
			</td>
			<td width="50px" align="center">
				<b>#</b><?php if($edit==1){echo $child[1];}?>
			</td>
			<!-- -->
			<td rowspan="2">
				<b>Remarks:</b>
				<?php if($edit==1){echo $child[4];}?>
			</td>
		</tr>
		<tr>
			<td>Separated children:</td>
			<td>

				<b class="radio-inline"><input disabled type="radio" name="separated_children"  value="1" <?php if($edit==1){if($child[2]==1){echo "checked"; }} ?>>Yes</b><b class="radio-inline"><input disabled type="radio" name="separated_children"  value="0" <?php if($edit==1){if($child[2]==0){echo "checked"; }} ?>>No</b>

			</td>
			<td width="50px" align="center">
				<b>#</b><?php if($edit==1){echo $child[3];}?>
			</td>
		</tr>
		<tr>
			<td># of children attending school:</td>
			<td colspan="3"><?php if($edit==1){echo $child[5];}?></td>
		</tr>
		<tr>
			<td># of children not attending school:</td>
			<td colspan="3"><?php if($edit==1){echo $child[6];}?></td>
		</tr>
		<tr>
			<td># of children with specific education needs:</td>
			<td colspan="3"><?php if($edit==1){echo $child[7];}?></td>
		</tr>
		<tr>
			<td colspan="4"><b>2. PROTECTION NEEDS:</b></td>
		</tr>
		<tr>
			<td colspan="4"><?php if($edit==1){echo $child_protect[1];}?></td>
		</tr>

	</table>

<h5>Financial And Other Support System Available To The Person Of Concern</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td colspan="4" ><h5>Support System</h5></td>
		</tr>
		<tr>
			<td colspan="4"><b>Approximate monthly household income</b></td>
		</tr>
		<tr>
			<td width="30%"><b>CWS/UNHCR cash assistance:</b></td>
			<td  colspan="3"><?php if($edit==1){echo $household[0];} ?></td>
		</tr>
		<tr>
			<td><b>Non-CWS/UNHCR assistance:</b></td>
			<td  colspan="3"><?php if($edit==1){echo $household[1];} ?></td>
		</tr>
		<tr>
			<td><b>Other sources of income: <br><small>(e.g. IOM/JRS, etc)</small></b></td>
			<td  colspan="3"><?php if($edit==1){echo $household[2];} ?></td>
		</tr>
		<tr>
			<td><b>Other sources of income: <br><small>(e.g. from relative in CoO/CoA/Abroad, etc.)</small></b></td>
			<td  colspan="3"><?php if($edit==1){echo $household[3];} ?></td>
		</tr>
		<tr>
			<td colspan="4"><b>Approximate monthly expenditure</b></td>
		</tr>
		<tr>
			<td><b>Rent fee:</b></td>
			<td><?php if($edit==1){echo $expe[0];} ?></td>
			<td><b>Food:</b></td>
			<td><?php if($edit==1){echo $expe[1];} ?></td>
		</tr>
		<tr>
			<td><b>Clothes:</b></td>
			<td><?php if($edit==1){echo $expe[2];} ?></td>
			<td><b>Transport:</b></td>
			<td><?php if($edit==1){echo $expe[3];} ?></td>
		</tr>
		<tr>
			<td><b>Other:</b></td>
			<td colspan="3"><?php if($edit==1){echo $expe[4];} ?></td>
		</tr>
		<tr>
			<td><b>Comments on available financial support system <br>(cash): </b></td>
			<td colspan="3"><?php if($edit==1){echo $com[0];} ?></td>
		</tr>
		<tr>
			<td><b>Comments on available other support system <br>(in kind): </b></td>
			<td colspan="3"><?php if($edit==1){echo $com[1];} ?></td>
		</tr>

		<tr>
			<td colspan="4"><h5>Recommendations:</h5></td>
		</tr>
		<tr>
			<td width="300px"><b>Assistance Highly Recommended:  </b></td>
			<td colspan="3">
				<b class="radio-inline"><input disabled type="radio" name="radioahr" value="1" <?php if($edit==1){if($recommend[0]==1){echo "checked";}}?>> YES</b>
				<b class="radio-inline"><input disabled type="radio" name="radioahr" value="0" <?php if($edit==1){if($recommend[0]==0){echo "checked";}}?>> NO</b>
			</td>
		</tr>
		<tr>
			<td><b>Assistance Recommended:  </b></td>
			<td colspan="3">

					<b class="radio-inline"><input disabled type="radio" name="radioar" value="1" <?php if($edit==1){if($recommend[1]==1){echo "checked";}}?>> YES</b>
					<b class="radio-inline"><input disabled type="radio" name="radioar" value="0" <?php if($edit==1){if($recommend[1]==0){echo "checked";}}?>> NO</b>

			</td>
		</tr>
		<tr>
			<td><b>Assistance Not Recommended:  </b></td>
			<td colspan="3">

					<b class="radio-inline"><input disabled type="radio" name="radioanr" value="1" <?php if($edit==1){if($recommend[2]==1){echo "checked";}}?>> YES</b>
					<b class="radio-inline"><input disabled type="radio" name="radioanr" value="0" <?php if($edit==1){if($recommend[2]==0){echo "checked";}}?>> NO</b>

			</td>
		</tr>
		<tr>
			<td colspan="4"><b>Final remarks, including recommendation on cash, non-cash or other form of assistance</b><br><small>(if applicable):</small></td>
		</tr>
		<tr>
			<td colspan="4"><?php if($edit==1){echo $recommend[3];}?></td>
		</tr>

	</table>
<h5>Assessment verified by:</h5>
	<table border="1" class="table table-bordered">
		<tr>
			<td><b>Name:</b></td>
			<td><?php if($edit==1){echo $verification[0];} ?></td>

			<td><b>Phone Number:</b></td>
			<td><?php if($edit==1){echo $verification[1];} ?></td>

			<td><b>Next Assessment:</b></td>
			<td><?php if($edit==1){echo $data['nextassessment'];} ?></td>
		</tr>
		<tr>
			<td><b>Remarks by reviewing officer: </b></td>
			<td colspan="5"><?php if($edit==1){echo $verification[3];} ?></td>
		</tr>
	</table>


<?php
      //comment
		echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
		echo '<div class="page-break"></div>';
	}
	else{
		echo "No data SE for File Number: ".$_GET['file_no'];
		echo '<div class="page-break"></div>';

	}
}
if(empty($_GET['a'])){
	echo'</body>
</html>';
}
?>

