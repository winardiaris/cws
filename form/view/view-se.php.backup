<?php
include("../../inc/conf.php");
include("../function.php") ;
if(isset($_GET['file_no'])){
	$qry = mysql_query("SELECT * FROM `se` WHERE `file_no`='".$_GET['file_no']."'") or die(mysql_error());
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
	
	$edit = 1;
	
	if($count>0){
?>
<h3>Socio Economic Assessment Report  </h3>
<hr>
<h4>Assessment Remaks</h4>
	<table border="1" class="table table-bordered">
		<tr>
			<td><label>File Number:</label></td>
			<td><?php if($edit==1){echo $data['file_no'];}?></td>
			
			<td><label>Date of Assessment:</label></td>
			<td><?php if($edit==1){echo $data['doa'];}?></td>
			
			<td><label>Interviewer:</label></td>
			<td><?php if($edit==1){echo $assessment[0];}?></td>
		</tr>
		<tr>
			<td><label>Location: </label></td>
			<td><?php if($edit==1){echo $assessment[1];}?></td>
			
			<td><label>Date of last assessment:</label></td>
			<td><?php if($edit==1){echo $assessment[2];}?></td>
			
			<td><label>Assistance receiving since <i>(if any)</i>:</label></td>
			<td><?php if($edit==1){echo $assessment[3];}?></td>
		</tr>
		<tr>
			<td><label>Interpreter:</label></td>
			<td><?php if($edit==1){echo $assessment[4];} ?></td>
			
			<td><label># of home visit(s) and date:</label></td>
			<td><?php if($edit==1){echo $assessment[5];} ?></td>
			
			<td><label>Date of last home visit:</label></td>
			<td><?php if($edit==1){echo $assessment[6];} ?></td>
		</tr>
	</table>
	
<hr>
<h4>Background Information and Assessment Purpose</h4>
	<table border="1" class="table table-bordered">
		<tr>
			<td><label>1. How PoC (and family) survived from date of arrival to the date of assessment?</label></td>
		</tr><tr>	
			<td><?php if($edit==1){echo $background[0];} ?></td>
		</tr>
		<tr>
			<td><label>2. Current Situation (Socio-economic):</label></td>
		</tr><tr>	
			<td><?php if($edit==1){echo $background[1];} ?></td>
		</tr>
	</table>
	<hr>
<h4>Living Condition <small>(to be filled in after home visits)</small></h4>
<h4>A. GENERAL</h4>
	<table border="1" class="table table-bordered">
		<tr>
			<td><label>House/Room condition:</label></td>
			<td>
				<label><input disabled type="checkbox" id="room_1" value="1" <?php if($edit==1){if($house[0]==1){echo "checked";}} ?> > No repair</label><br>
				<label><input disabled type="checkbox" id="room_2" value="1" <?php if($edit==1){if($house[1]==1){echo "checked";}} ?>> Medium repair</label><br>
				<label><input disabled type="checkbox" id="room_3" value="1" <?php if($edit==1){if($house[2]==1){echo "checked";}} ?>> Leaking ceiling</label><br>
				<label><input disabled type="checkbox" id="room_4" value="1" <?php if($edit==1){if($house[3]==1){echo "checked";}} ?>> Shared toilet/bathroom</label><br>
				<label><input disabled type="checkbox" id="room_5" value="1" <?php if($edit==1){if($house[4]==1){echo "checked";}} ?>> No toilet/bathroom</label><br>
			</td><td>
				<label><input disabled type="checkbox" id="room_6" value="1" <?php if($edit==1){if($house[5]==1){echo "checked";}} ?>> Air ventilation (windows, etc)</label><br>
				<label><input disabled type="checkbox" id="room_7" value="1" <?php if($edit==1){if($house[6]==1){echo "checked";}} ?>> No air ventilation</label><br>
				<label><input disabled type="checkbox" id="room_8" value="1" <?php if($edit==1){if($house[7]==1){echo "checked";}} ?>> Shared kitchen</label><br>
				<label><input disabled type="checkbox" id="room_9" value="1" <?php if($edit==1){if($house[8]==1){echo "checked";}} ?>> No kitchen</label><br>
				<label><input disabled type="checkbox" id="room_10" value="1" <?php if($edit==1){if($house[9]==1){echo "checked";}} ?>> Dampness </label><br>
				<label><input disabled type="checkbox" id="room_11" value="1" <?php if($edit==1){if($house[10]==1){echo "checked";}} ?>> Smell</label><br>
			</td>
		</tr>
		<tr>
			<td><label>Furniture / Equipment:</label></td>
			<td>
				<label><input disabled type="checkbox" id="furni_1" value="1"  <?php if($edit==1){if($fur[0]==1){echo "checked";}} ?>> Bed</label><br>
				<label><input disabled type="checkbox" id="furni_2" value="1" <?php if($edit==1){if($fur[1]==1){echo "checked";}} ?>> Sofa</label><br>
				<label><input disabled type="checkbox" id="furni_3" value="1" <?php if($edit==1){if($fur[2]==1){echo "checked";}} ?>> Wardrobe/Cupboard</label><br>
				<label><input disabled type="checkbox" id="furni_4" value="1" <?php if($edit==1){if($fur[3]==1){echo "checked";}} ?>> Table</label><br>
				<label><input disabled type="checkbox" id="furni_5" value="1" <?php if($edit==1){if($fur[4]==1){echo "checked";}} ?>> Chairs</label><br>	
				<label><input disabled type="checkbox" id="furni_6" value="1" <?php if($edit==1){if($fur[5]==1){echo "checked";}} ?>> Rice cooker</label><br>
				<label><input disabled type="checkbox" id="furni_7" value="1" <?php if($edit==1){if($fur[6]==1){echo "checked";}} ?>> Refrigerator</label><br>
				<label><input disabled type="checkbox" id="furni_8" value="1" <?php if($edit==1){if($fur[7]==1){echo "checked";}} ?>> Gas stove</label><br>
				<label><input disabled type="checkbox" id="furni_9" value="1" <?php if($edit==1){if($fur[8]==1){echo "checked";}} ?>> Washing machine</label><br>
				<label><input disabled type="checkbox" id="furni_10" value="1" <?php if($edit==1){if($fur[9]==1){echo "checked";}} ?>> TV set </label><br>
			</td><td valign="top">		
				<label><input disabled type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[10]==1){echo "checked";}} ?>> Iron</label><br>
				<label><input disabled type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[11]==1){echo "checked";}} ?>> Computer (laptop, tablet)</label><br>
				<label><input disabled type="checkbox" id="furni_13" value="1" <?php if($edit==1){if($fur[12]==1){echo "checked";}} ?>> DVD player</label><br>
				<label><input disabled type="checkbox" id="furni_14" value="1" <?php if($edit==1){if($fur[13]==1){echo "checked";}} ?>> AC</label><br>
				<label><input disabled type="checkbox" id="furni_15" value="1" <?php if($edit==1){if($fur[14]==1){echo "checked";}} ?>> Fan</label><br>
				<label><input disabled type="checkbox" id="furni_16" value="1" <?php if($edit==1){if($fur[15]==1){echo "checked";}} ?>> Internet Connection</label><br>
				<label><input disabled type="checkbox" id="furni_17" value="1" <?php if($edit==1){if($fur[16]==1){echo "checked";}} ?>> TV Cable</label><br>
				<label><input disabled type="checkbox" id="furni_18" value="1" <?php if($edit==1){if($fur[17]==1){echo "checked";}} ?>> Piped Clean & Safe Water</label><br>
				<label><input disabled type="checkbox" id="furni_19" value="1" <?php if($edit==1){if($fur[18]==1){echo "checked";}} ?>> Motorcycle</label><br>
				<label><input disabled type="checkbox" id="furni_20" value="1" <?php if($edit==1){if($fur[19]==1){echo "checked";}} ?>> Mobile phone</label><br>
				<label><input disabled type="checkbox" id="furni_21" value="1" <?php if($edit==1){if($fur[20]==1){echo "checked";}} ?>> Others</label><br>
			</td>
		</tr>
	</table>
	
	<table border="1" class="table table-bordered">
		<tr>
			<td ><label>Number of rooms: </label></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[0];}?></td>
			
			<td><label>Living space in M2:</label></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[1];}?></td>
			
			<td><label>Monthly rent fee:</label></td>
			<td width="50px"><?php if($edit==1){echo $living_cond[2];}?></td>
		</tr>
		<tr>
			<td colspan="6"><label>Notes/comments on general condition: </label></td>
		</tr>
		<tr>
			<td colspan="6"><?php if($edit==1){echo $living_cond[3];}?></td>
		</tr>
	</table>
	
	<table border="1" class="table table-bordered">
		<tr>
			<td>Security and Safety Measures:</td>
			<td colspan="3">
				<label><input disabled type="checkbox" id="sec_1" value="1" <?php if($edit==1){if($sec[0]==1){echo "checked";}} ?>> Fenced accommodation</label>
				<label><input disabled type="checkbox" id="sec_2" value="1" <?php if($edit==1){if($sec[1]==1){echo "checked";}} ?>> Secure gate</label>
				<label><input disabled type="checkbox" id="sec_3" value="1" <?php if($edit==1){if($sec[2]==1){echo "checked";}} ?>> Secure doors & windows</label>
				<label><input disabled type="checkbox" id="sec_4" value="1" <?php if($edit==1){if($sec[3]==1){echo "checked";}} ?>> Multiple Entry/Exit points in the building</label>
				<label><input disabled type="checkbox" id="sec_5" value="1" <?php if($edit==1){if($sec[4]==1){echo "checked";}} ?>> Fire Extinguisher</label>
			</td>
		</tr>
		<tr>
			<td><label>Neighbourhood/Relationship with Around People:</label></td>
			<td colspan="3">
				<label><input disabled type="checkbox" id="neig_1" value="1" <?php if($edit==1){if($neigh[0]==1){echo "checked";}} ?>> Clean & healthy area</label>
				<label><input disabled type="checkbox" id="neig_2" value="1" <?php if($edit==1){if($neigh[1]==1){echo "checked";}} ?>> Dense populated area</label>
				<label><input disabled type="checkbox" id="neig_3" value="1" <?php if($edit==1){if($neigh[2]==1){echo "checked";}} ?>> Slum area</label>
				<label><input disabled type="checkbox" id="neig_4" value="1" <?php if($edit==1){if($neigh[3]==1){echo "checked";}} ?>> Trading area</label>
				<label><input disabled type="checkbox" id="neig_5" value="1" <?php if($edit==1){if($neigh[4]==1){echo "checked";}} ?>> Others</label>
			</td>
		</tr>
		<tr>
			<td><label>Police station:</label></td>
			<td><?php if($edit==1){echo $phnn[0];}?></td>
			
			<td><label>Health facilities:</label></td>
			<td><?php if($edit==1){echo $phnn[1];}?></td>
		</tr>
		<tr>
			<td><label>Notes: </label></td>
			<td colspan="3"><?php if($edit==1){echo $phnn[2];}?></td>
		</tr>
		<tr>
			<td><label>Number of person living in same house:  </label></td>
			<td colspan="3"><?php if($edit==1){echo $phnn[3];}?></td>
		</tr>
	</table>
	
<hr>
<h4>B. PERSON WITH SPECIFIC NEEDS</h4>
	<table border="1" class="table table-bordered">
		<tr>
			<td><label>Please specify more about the vulnerabilities: </label></td>
			<td colspan="3"><?php if($edit==1){echo $data['vulnerabilities'];}; ?></td>
		</tr>
		<tr>
			<td colspan="4"><label>1. CHILDREN </label></td>
		</tr>
		<tr>
			<td width="300px">Unaccompanied minors:  </td>
			<td >
				<label class="radio-inline"><input disabled type="radio" name="unaccompanied_minors"  value="1" <?php if($edit==1){if($child[0]==1){echo "checked"; }} ?>  >Yes</label><label class="radio-inline"><input disabled type="radio" name="unaccompanied_minors"  value="0" <?php if($edit==1){if($child[0]==0){echo "checked"; }} ?>>No</label>
			</td>
			<td width="50px" align="center">
				<label>#</label><?php if($edit==1){echo $child[1];}?>
			</td>
			<!-- -->
			<td rowspan="2">
				<label>Remarks:</label>
				<?php if($edit==1){echo $child[4];}?>
			</td>
		</tr>
		<tr>
			<td>Separated children:</td>
			<td>
				
				<label class="radio-inline"><input disabled type="radio" name="separated_children"  value="1" <?php if($edit==1){if($child[2]==1){echo "checked"; }} ?>>Yes</label><label class="radio-inline"><input disabled type="radio" name="separated_children"  value="0" <?php if($edit==1){if($child[2]==0){echo "checked"; }} ?>>No</label>
			
			</td>
			<td width="50px" align="center">
				<label>#</label><?php if($edit==1){echo $child[3];}?>
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
			<td colspan="4"><label>2. PROTECTION NEEDS:</label></td>
		</tr>
		<tr>
			<td colspan="4"><?php if($edit==1){echo $child_protect[1];}?></td>
		</tr>
		
	</table>
	
<hr>
<h4>Financial And Other Support System Available To The Person Of Concern</h4>
	<table border="1" class="table table-bordered">
		<tr>
			<td colspan="4" ><h4>Support System</h4></td>
		</tr>
		<tr>
			<td colspan="4"><label>Approximate monthly household income</label></td>
		</tr>
		<tr>
			<td width="30%"><label>CWS/UNHCR cash assistance:</label></td>
			<td  colspan="3"><?php if($edit==1){echo $household[0];} ?></td>
		</tr>
		<tr>
			<td><label>Non-CWS/UNHCR assistance:</label></td>
			<td  colspan="3"><?php if($edit==1){echo $household[1];} ?></td>
		</tr>
		<tr>
			<td><label>Other sources of income: <br><small>(e.g. IOM/JRS, etc)</small></label></td>
			<td  colspan="3"><?php if($edit==1){echo $household[2];} ?></td>
		</tr>
		<tr>
			<td><label>Other sources of income: <br><small>(e.g. from relative in CoO/CoA/Abroad, etc.)</small></label></td>
			<td  colspan="3"><?php if($edit==1){echo $household[3];} ?></td>
		</tr>
		<tr>
			<td colspan="4"><label>Approximate monthly expenditure</label></td>
		</tr>
		<tr>
			<td><label>Rent fee:</label></td>
			<td><?php if($edit==1){echo $expe[0];} ?></td>
			<td><label>Food:</label></td>
			<td><?php if($edit==1){echo $expe[1];} ?></td>
		</tr>
		<tr>
			<td><label>Clothes:</label></td>
			<td><?php if($edit==1){echo $expe[2];} ?></td>
			<td><label>Transport:</label></td>
			<td><?php if($edit==1){echo $expe[3];} ?></td>
		</tr>
		<tr>
			<td><label>Other:</label></td>
			<td colspan="3"><?php if($edit==1){echo $expe[4];} ?></td>
		</tr>
		<tr>
			<td><label>Comments on available financial support system <br>(cash): </label></td>
			<td colspan="3"><?php if($edit==1){echo $com[0];} ?></td>
		</tr>
		<tr>
			<td><label>Comments on available other support system <br>(in kind): </label></td>
			<td colspan="3"><?php if($edit==1){echo $com[1];} ?></td>
		</tr>
		
		<tr>
			<td colspan="4"><h4>Recommendations:</h4></td>
		</tr>
		<tr>
			<td width="300px"><label>Assistance Highly Recommended:  </label></td>
			<td colspan="3">
				<label class="radio-inline"><input disabled type="radio" name="radioahr" value="1" <?php if($edit==1){if($recommend[0]==1){echo "checked";}}?>> YES</label>
				<label class="radio-inline"><input disabled type="radio" name="radioahr" value="0" <?php if($edit==1){if($recommend[0]==0){echo "checked";}}?>> NO</label>
			</td>
		</tr>
		<tr>
			<td><label>Assistance Recommended:  </label></td>
			<td colspan="3">
				
					<label class="radio-inline"><input disabled type="radio" name="radioar" value="1" <?php if($edit==1){if($recommend[1]==1){echo "checked";}}?>> YES</label>
					<label class="radio-inline"><input disabled type="radio" name="radioar" value="0" <?php if($edit==1){if($recommend[1]==0){echo "checked";}}?>> NO</label>
				
			</td>
		</tr>
		<tr>
			<td><label>Assistance Not Recommended:  </label></td>
			<td colspan="3">
				
					<label class="radio-inline"><input disabled type="radio" name="radioanr" value="1" <?php if($edit==1){if($recommend[2]==1){echo "checked";}}?>> YES</label>
					<label class="radio-inline"><input disabled type="radio" name="radioanr" value="0" <?php if($edit==1){if($recommend[2]==0){echo "checked";}}?>> NO</label>
				
			</td>
		</tr>
		<tr>
			<td colspan="4"><label>Final remarks, including recommendation on cash, non-cash or other form of assistance</label><br><small>(if applicable):</small></td>
		</tr>
		<tr>
			<td colspan="4"><?php if($edit==1){echo $recommend[3];}?></td>
		</tr>
		
	</table>
<hr>
<h4>Assessment verified by:</h4>		
	<table border="1" class="table table-bordered">
		<tr>
			<td><label>Name:</label></td>
			<td><?php if($edit==1){echo $verification[0];} ?></td>
			
			<td><label>Signature:</label></td>
			<td><?php if($edit==1){echo $verification[1];} ?></td>
			
			<td><label>Date:</label></td>
			<td><?php if($edit==1){echo $verification[2];} ?></td>
		</tr>
		<tr>
			<td><label>Remarks by reviewing officer: </label></td>
			<td colspan="5"><?php if($edit==1){echo $verification[3];} ?></td>
		</tr>
	</table>


<?php
	}
	else{
		echo "No data SE for File Number: ".$_GET['file_no'];
		
	}	
}
?>
