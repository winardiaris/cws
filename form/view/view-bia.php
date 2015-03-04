<?php 
include("../../inc/conf.php");
include("../function.php") ;
	
if(isset($_GET['file_no'])){
	$qry = mysql_query("SELECT * FROM `bia` WHERE `file_no`='".$_GET['file_no']."' AND `status`='1'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count=mysql_num_rows($qry);
	
	$assessment=explode(";",$data['assessment']);
	$history=explode(";",$data['personal_history']);
	$toiv=explode(";",$data['toiv']);
	$edu=explode(";",$data['edu']);
	$health=explode(";",$data['health']);
	$psy=explode(";",$data['psy']);
	$liva=explode(";",$data['living_a']);
	$livb=explode(";",$data['living_b']);
	$livc=explode(";",$data['living_c']);
	$livd=explode(";",$data['living_d']);
	$live=explode(";",$data['living_e']);
	$fin=explode(";",$data['financial']);
	$cws=explode(";",$data['cws_analysis']);
	$opt=explode(";",$data['optional']);
	

	$edit = 1;
	
	if($count>0){
?>
<div class="table-responsive">
<h3>Best Interest Assessment Report for Temporary Care</h3>
<hr>

<h4>Date of Assessment</h4>
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>File No:</label></td>
		<td valign="top"><?php if($edit==1){echo $data['file_no'];}?></td>
		
		<td valign="top"><label>Date of Assessment: </label></td>
		<td valign="top"><?php if($edit==1){echo $data['doa'];}?></td>
	</tr>
	<tr>	
		<td valign="top"><label>Location</label></td>
		<td valign="top"><?php if($edit==1){echo $assessment[0];}?></td>
	
	
		<td valign="top"><label>Case Worker</label></td>
		<td valign="top"><?php if($edit==1){echo $assessment[1];}?></td>
	</tr>
	<tr>	
		<td valign="top"><label>Organization</label></td>
		<td valign="top"><?php if($edit==1){echo $assessment[2];}?></td>
		
		<td valign="top"><label>Interpreter name & organization</label></td>
		<td valign="top"><?php if($edit==1){echo $assessment[3];}?></td>
	</tr>
	<tr >
		<td valign="top"><label>Identification of child</label></td>
		<td valign="top" colspan="3">
			<label class="radio-inline"><input disabled type="radio" name="ioc"  value="UNHCR" <?php if($edit==1){if($assessment[4]=="UNHCR"){echo"checked";}  } ?>>UNHCR</label>
			<label class="radio-inline"><input disabled type="radio" name="ioc"  value="CWS" <?php if($edit==1){if($assessment[4]=="CWS"){echo"checked";}  } ?>>CWS</label>
			<label class="radio-inline"><input disabled type="radio" name="ioc"  value="other" id="other" <?php if($edit==1){if($assessment[4]=="other"){echo"checked";}  } ?>>Other: <?php if($edit==1){if($assessment[4]=="other"){echo $assessment[5];}}?></label>
		</td>
	</tr>
	
</table>

<hr>
<h4>Personal history<br><small>( Background(Brief history describing hardships or trauma experienced))</small></h4>
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>1. In the Country of Origin</label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $history[0]; } ?></td>
	</tr>
	<tr>
		<td valign="top"><label>2. During the flight</label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $history[1]; } ?></td>
	</tr>
	<tr>
		<td valign="top"><label>3. In the country of Asylum</label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $history[2]; } ?></td>
	</tr>
</table>

<hr>
<h4>Types of identified vulnerabilities</h4>
<table class="table table-bordered">
	<tr>
		<td valign="top" ><label>Child at risk of deportation</label></td>
		<td valign="top" >
			<label><input disabled type="checkbox" id="toiv1a" <?php if($edit==1){if($toiv[0]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv1b" <?php if($edit==1){if($toiv[1]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv1c" <?php if($edit==1){if($toiv[2]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Child without legal documentation</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv2a" <?php if($edit==1){if($toiv[4]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv2b" <?php if($edit==1){if($toiv[5]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv2c" <?php if($edit==1){if($toiv[6]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[7];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Street Children</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv3a" <?php if($edit==1){if($toiv[8]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv3b" <?php if($edit==1){if($toiv[9]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv3c" <?php if($edit==1){if($toiv[10]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[11] ;}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Medical Case</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv4a" <?php if($edit==1){if($toiv[12]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv4b" <?php if($edit==1){if($toiv[13]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv4c" <?php if($edit==1){if($toiv[14]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[15];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Disabled child:</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv5a" <?php if($edit==1){if($toiv[16]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv5b" <?php if($edit==1){if($toiv[17]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv5c" <?php if($edit==1){if($toiv[18]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[19];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of violence</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv6a" <?php if($edit==1){if($toiv[20]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv6b" <?php if($edit==1){if($toiv[21]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv6c" <?php if($edit==1){if($toiv[22]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[23];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of sexual violence</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv7a" <?php if($edit==1){if($toiv[24]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv7b" <?php if($edit==1){if($toiv[25]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv7c" <?php if($edit==1){if($toiv[26]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[27];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of trafficking</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv8a" <?php if($edit==1){if($toiv[28]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv8b" <?php if($edit==1){if($toiv[29]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv8c" <?php if($edit==1){if($toiv[30]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[31];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of Child Labour</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv9a" <?php if($edit==1){if($toiv[32]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv9b" <?php if($edit==1){if($toiv[33]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv9c" <?php if($edit==1){if($toiv[34]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[35];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of forced Labour</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv10a" <?php if($edit==1){if($toiv[36]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv10b" <?php if($edit==1){if($toiv[37]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv10c" <?php if($edit==1){if($toiv[38]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[39];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of exploitation</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv11a" <?php if($edit==1){if($toiv[40]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv11b" <?php if($edit==1){if($toiv[41]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv11c" <?php if($edit==1){if($toiv[42]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[43];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of prostitution</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv12a" <?php if($edit==1){if($toiv[44]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv12b" <?php if($edit==1){if($toiv[45]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv12c" <?php if($edit==1){if($toiv[46]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[47];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Minor victim used or recruited by smugglers</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv13a" <?php if($edit==1){if($toiv[48]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv13b" <?php if($edit==1){if($toiv[49]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv13c" <?php if($edit==1){if($toiv[50]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[51];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Minor in conflict with the Law</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv14a" <?php if($edit==1){if($toiv[52]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv14b" <?php if($edit==1){if($toiv[53]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv14c" <?php if($edit==1){if($toiv[54]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[55];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>In hiding <small>(e.g. fear of being identified or found)</small></label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv15a" <?php if($edit==1){if($toiv[56]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv15b" <?php if($edit==1){if($toiv[57]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv15c" <?php if($edit==1){if($toiv[58]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[59];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Experiencing rejection by community</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv16a" <?php if($edit==1){if($toiv[60]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv16b" <?php if($edit==1){if($toiv[61]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv16c" <?php if($edit==1){if($toiv[62]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[63];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Bodily injured</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv17a" <?php if($edit==1){if($toiv[64]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv17b" <?php if($edit==1){if($toiv[65]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv17c" <?php if($edit==1){if($toiv[66]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[67];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of severe beatings</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv18a" <?php if($edit==1){if($toiv[68]=="1"){echo "checked";}}?>> CoO </label>
			<label><input disabled type="checkbox" id="toiv18b"<?php if($edit==1){if($toiv[69]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv18c" <?php if($edit==1){if($toiv[70]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[71];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Lack of basic needs <small>(food, water, shelter)</small></label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv19a" <?php if($edit==1){if($toiv[72]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv19b" <?php if($edit==1){if($toiv[73]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv19c" <?php if($edit==1){if($toiv[74]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[75];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of rape / sexual abuses</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv20a" <?php if($edit==1){if($toiv[76]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv20b" <?php if($edit==1){if($toiv[77]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv20c" <?php if($edit==1){if($toiv[78]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[79];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Unsafe in community <br><small>(a.g. abuse by family or community, domestic violence)</small></label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv21a" <?php if($edit==1){if($toiv[80]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv21b" <?php if($edit==1){if($toiv[81]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv21c" <?php if($edit==1){if($toiv[82]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[83];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Other <small>(explain)</small></label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv22a" <?php if($edit==1){if($toiv[84]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv22b" <?php if($edit==1){if($toiv[85]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv22c" <?php if($edit==1){if($toiv[86]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[87];}?></td>
	</tr>
	<tr>
		<td valign="top" colspan="3" class="info" ><label>Special attention: Girls at risk <small>(can be cumulated with previous section)</small></label></td>
	</tr>
	<tr>
		<td valign="top"><label>Girl without protection</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv23a" <?php if($edit==1){if($toiv[88]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv23b" <?php if($edit==1){if($toiv[89]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv23c" <?php if($edit==1){if($toiv[90]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[91];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Pregnant girl</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv24a" <?php if($edit==1){if($toiv[92]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv24b" <?php if($edit==1){if($toiv[93]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv24c" <?php if($edit==1){if($toiv[94]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[95];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Adolescent parent</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv25a" <?php if($edit==1){if($toiv[96]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv25b" <?php if($edit==1){if($toiv[97]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv25c" <?php if($edit==1){if($toiv[98]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label>
			<?php if($edit==1){echo $toiv[99];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of rape / sexual abuses</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv26a" <?php if($edit==1){if($toiv[100]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv26b" <?php if($edit==1){if($toiv[101]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv26c" <?php if($edit==1){if($toiv[102]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[103];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Engaging in survival sex</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv27a" <?php if($edit==1){if($toiv[104]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv27b" <?php if($edit==1){if($toiv[105]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv27c" <?php if($edit==1){if($toiv[106]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[107];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Other forms of GBVs</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv28a" <?php if($edit==1){if($toiv[108]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv28b" <?php if($edit==1){if($toiv[109]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv28c" <?php if($edit==1){if($toiv[110]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[111];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Victim of forced marriage</label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="toiv29a" <?php if($edit==1){if($toiv[112]=="1"){echo "checked";}}?>> CoO</label>
			<label><input disabled type="checkbox" id="toiv29b" <?php if($edit==1){if($toiv[113]=="1"){echo "checked";}}?>> During flight </label>
			<label><input disabled type="checkbox" id="toiv29c" <?php if($edit==1){if($toiv[114]=="1"){echo "checked";}}?>> CoA</label>
		</td>
		<td valign="top"><label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $toiv[115];}?></td>
	</tr>
	
</table>
			
<hr>			
<h4>Education</h4>	
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>Suggested questions</label></td>
		<td valign="top"><label>*Did you go to school prior to the separation?</label>
			<?php if($edit==1){echo $edu[0];}?>
			<br>
			<label>	*Do you like to go to school?</label>
			<?php if($edit==1){echo $edu[1];}?>
			<br>
			<label>	*How do you spend your time? What do you like to do? <small>(Language, Computer, etc.)</small> </label>
			<?php if($edit==1){echo $edu[2];}?>
			<br>
			<label>	Observations</label>
			<?php if($edit==1){echo $edu[3];}?>
		</td>
	</tr>
	<tr>
		<td valign="top"><label>Level of education / grade</label></td>
		<td valign="top"><?php if($edit==1){echo $edu[4];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Skills & Occupation</label></td>
		<td valign="top"><?php if($edit==1){echo $edu[5];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Previous occupation, if any</label></td>
		<td valign="top"><?php if($edit==1){echo $edu[6];}?></td>
	</tr>
</table>
			
<hr>
<h4>Health</h4>		
<table class="table table-bordered">
	<tr>
		<td valign="top" colspan="3">
			<label>Suggested questions:</label>
			<?php if($edit==1){echo $health[0];}?>
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[1];}?>
		</td>
	</tr>
	<tr>
		<td valign="top" width="300px">
			<Label>Whether medical attention is being</Label><br>
			<label class="checkbox-inline"><input disabled type="radio" value="0" name="health3" <?php if($edit==1){if($health[2]=="0"){echo "checked";}}?>> Received</label>
			<label class="checkbox-inline"><input disabled type="radio" value="1" name="health3" <?php if($edit==1){if($health[2]=="1"){echo "checked";}}?>> Required</label>
		</td>
		<td valign="top" colspan="2">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[3];}?>
		</td>
	</tr>
	<tr>
		<td valign="top"><label>Physical Health problems</label></td>
		<td valign="top" >
			<label><input disabled type="checkbox" id="health5a" <?php if($edit==1){if($health[4]=="1"){echo "checked";}}?>> Past history </label><br>
			<label><input disabled type="checkbox" id="health5b" <?php if($edit==1){if($health[5]=="1"){echo "checked";}}?>> During flight </label><br>
			<label><input disabled type="checkbox" id="health5c" <?php if($edit==1){if($health[6]=="1"){echo "checked";}}?>> At present</label><br>
		</td>
		<td valign="top">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[7];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Child with HIV/AIDS</label></td>
		<td valign="top" >
			<label><input disabled type="checkbox" id="health6a" <?php if($edit==1){if($health[8]=="1"){echo "checked";}}?>> Past history </label><br>
			<label><input disabled type="checkbox" id="health6b" <?php if($edit==1){if($health[9]=="1"){echo "checked";}}?>> During flight </label><br>
			<label><input disabled type="checkbox" id="health6c" <?php if($edit==1){if($health[10]=="1"){echo "checked";}}?>> At present</label><br>
		</td>
		<td valign="top">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[11];}?></td>
			
	</tr>
	<tr>
		<td valign="top"><label>Addictions <i>(Drugs, alcohol, etc.)</i></label></td>
		<td valign="top" >
			<label><input disabled type="checkbox" id="health7a" <?php if($edit==1){if($health[12]=="1"){echo "checked";}}?>> Past history </label><br>
			<label><input disabled type="checkbox" id="health7b" <?php if($edit==1){if($health[13]=="1"){echo "checked";}}?>> During flight </label><br>
			<label><input disabled type="checkbox" id="health7c" <?php if($edit==1){if($health[14]=="1"){echo "checked";}}?>> At present</label><br>
		</td>
		<td valign="top">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[15];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Hearing impairment</label></td>
		<td valign="top" >
			<label><input disabled type="checkbox" id="health8a" <?php if($edit==1){if($health[16]=="1"){echo "checked";}}?>> Past history </label><br>
			<label><input disabled type="checkbox" id="health8b" <?php if($edit==1){if($health[17]=="1"){echo "checked";}}?>> During flight </label><br>
			<label><input disabled type="checkbox" id="health8c" <?php if($edit==1){if($health[18]=="1"){echo "checked";}}?>> At present</label><br>
		</td>
		<td valign="top">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[19];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Mental disability</label></td>
		<td valign="top" style="max-width:200px;">
			<label><input disabled type="checkbox" id="health9a" <?php if($edit==1){if($health[20]=="1"){echo "checked";}}?>> Past history </label><br>
			<label><input disabled type="checkbox" id="health9b" <?php if($edit==1){if($health[21]=="1"){echo "checked";}}?>> During flight </label><br>
			<label><input disabled type="checkbox" id="health9c" <?php if($edit==1){if($health[22]=="1"){echo "checked";}}?>> At present</label><br>
		</td>
		<td valign="top">
			<label><i>Observation:</i></label><br>
			<?php if($edit==1){echo $health[23];}?></td>
	</tr>
	
</table>
		
<hr>
<h4>Psychosocial conditions</a><br> <small class="text-danger">(This part can be filled by Psychosocial workers)</small></h4>
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>Date of Face-to-Face interview</label><br>
				<i>(If different from BIA date)</i></td>
		<td valign="top"><?php if($edit==1){echo $psy[0];}?></td>
	</tr>
	<tr>
		<td valign="top"  rowspan="4"><br><br><br><b>Social Resources </b></td>
		<td valign="top" width="300px"><label>Is the Child able to form and maintain relationships with family/friends?</label></td>
		<td valign="top"><?php if($edit==1){echo $psy[1];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>What are the Child’s favorite activities?</label></td>
		<td valign="top"><?php if($edit==1){echo $psy[2];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Hobbies & interests</label></td>
		<td valign="top"><?php if($edit==1){echo $psy[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Daily Activities - How child occupy himself daily?</label></td>
		<td valign="top"><?php if($edit==1){echo $psy[4];}?></td>
	</tr>
	<tr>
		<td valign="top" colspan="2"><label>*Do you feel healthy?</label><br><i> If not, please, explain type of sickness/how you feel physically.</i> </td>
		<td valign="top"><?php if($edit==1){echo $psy[5];}?></td>
	</tr>
	<tr>
		<td valign="top" colspan="2"><label>*Do you have access to medical care?</label><br><i>If not, explain why?</i> </td>
		<td valign="top"><?php if($edit==1){echo $psy[6];}?></td>
	</tr>
	
</table>

<hr>
<table class="table table-bordered">
	<tr>
		<td valign="top" colspan="3" class="info"><label>Mental status assessment</label></td>
	</tr>
	<tr><td valign="top" colspan="3" ></td></tr>
	<tr class="success">
		<th>Psychosocial symptoms & problems </th>
		<th>Frequency</th>
		<th>Observations</th>
	</tr>
	<tr>
		<td valign="top" width="300px"><label>Eating problem</label><br><i> (characterized by a compulsion to overeat or avoiding food)</i></td>
		<td valign="top" width="30px">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy8a" value="1" <?php if($edit==1){if($psy[7]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy8a" value="0" <?php if($edit==1){if($psy[7]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[8];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Depressed</label><br><label><i>(a person experiences deep, unshakable sadness and diminished interest in nearly all activities)</i></label></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy9a" value="1" <?php if($edit==1){if($psy[9]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy9a" value="0" <?php if($edit==1){if($psy[9]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[10];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Sleeping disturbance</label><br><i>(Any condition that interferes with sleep)</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy10a" value="1" <?php if($edit==1){if($psy[11]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy10a" value="0" <?php if($edit==1){if($psy[11]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[12];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Easily get angry</label></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy11a" value="1" <?php if($edit==1){if($psy[13]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy11a" value="0" <?php if($edit==1){if($psy[13]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[14];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Confused </label><br><i>(disoriented mentally; being unable to think with clarity or act with understanding and intelligence)</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy12a" value="1" <?php if($edit==1){if($psy[15]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy12a" value="0" <?php if($edit==1){if($psy[15]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[16];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Lack of concentration </label><br><i>(inability to direct one's thinking in whatever direction one would intend))</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy13a" value="1" <?php if($edit==1){if($psy[17]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy13a" value="0" <?php if($edit==1){if($psy[17]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[18];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Feeling hopeless</label><br><i>(without hope; despairing)</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy14a" value="1" <?php if($edit==1){if($psy[19]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy14a" value="0" <?php if($edit==1){if($psy[19]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[20];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Feeling unworthy </label><br><i>(his/her sense of meaning is undermined)</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy15a" value="1" <?php if($edit==1){if($psy[21]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy15a" value="0" <?php if($edit==1){if($psy[21]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[22];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Lack of trust to others </label></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy16a" value="1" <?php if($edit==1){if($psy[23]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy16a" value="0" <?php if($edit==1){if($psy[23]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[24];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Deprived from community/others </label></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy17a" value="1" <?php if($edit==1){if($psy[25]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy17a" value="0" <?php if($edit==1){if($psy[25]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[26];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Coping Mechanism </label><br><i>(an adaptation to environmental stress that is based on conscious or unconscious choice and that enhances control over behaviour or gives psychological comfort)</i></td>
		<td valign="top">
			<div class="form-group">
			<label class="radio-inline"><input disabled type="radio" name="psy18a" value="1" <?php if($edit==1){if($psy[27]=="1"){echo "checked";}}?>> Yes</label><br>
			<label class="radio-inline"><input disabled type="radio" name="psy18a" value="0" <?php if($edit==1){if($psy[27]=="0"){echo "checked";}}?>> No</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[21];}?></td>
	</tr>
</table>

<hr>
<h4>INTERACTION <br><small> with the person during the interview</small><br><small><i></i>Simple Description of the Child AS or refugee as he appears - (describe what you see; highlight the positive, not just the negative; Avoid labels.)</small>
</h4>
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>Mood, attitude, appearance, speech, affect, thought consent</label></td>
	</tr>
	<tr>
		<td valign="top">
		<?php if($edit==1){echo $data['interaction'];}?>
		</td>
	</tr>
</table>


<hr>
<h4>Living conditions in place of residence</h4>

<label>a). Suggested Questions:</label>
<table class="table table-bordered">
	<tr>
		<td valign="top"><label>With whom do you currently live?  <i>(Note names, ages, gender)</i> How long have you been living here?Is there an adult in <i>(name/location in country of asylum)</i> who is looking after you?  <i>If so, note name, relationship, contact information.</i> How did you find this place to stay? How is your relationship with your caretaker and/or housemates? </label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $liva[0];}?></td>
	</tr>
	<tr>
		<td valign="top"><label>Do you like to stay with this family? How often do you eat? Where do you sleep? How do you feel living here? Are you happy here? Do you think you have enough food? If not, please explain. Who prepares the food? Do you have access to clean water? Are appropriate sanitation facilities in place, where you live in? </label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $liva[1];}?><br><br><small>If the child has already in the shelter, put the situation before living in shelter in this section.</small></td>
	</tr>
	<tr>
		<td valign="top"><label>Responses:</label></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $liva[2];}?></td>
	</tr>
	<tr>
		<td valign="top">
			<label>Type of housing</label> 
			<label class="radio-inline"><input disabled type="radio" name="liva4" value="CWS" <?php if($edit==1){if($liva[3]=="CWS"){echo "checked";}}?>> CWS</label>
			<label class="radio-inline"><input disabled type="radio" name="liva4" value="House" <?php if($edit==1){if($liva[3]=="House"){echo "checked";}}?>> House</label>
			<br><small class="text-danger">(If CWS shelter is tick, no need to fill up part b, c& d)</small>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<label>Number of Person Living in the Same Room/House</label><br>
			<?php if($edit==1){echo $liva[4];}?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<label>Neighbourhood/Relationship with around People</label><br>
			<?php if($edit==1){echo $liva[5];}?>
		</td>
	</tr>
</table>
					
<label>b). Description of the house</label>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<label><input disabled type="checkbox" id="livb1" <?php if($edit==1){if($livb[0]=="1"){echo "checked";}}?>> Bedroom</label> <br>
			<label><input disabled type="checkbox" id="livb2" <?php if($edit==1){if($livb[1]=="1"){echo "checked";}}?>> Bathroom</label><br>
			<label><input disabled type="checkbox" id="livb3" <?php if($edit==1){if($livb[2]=="1"){echo "checked";}}?>> Electricity</label><br>
			<label><input disabled type="checkbox" id="livb4" <?php if($edit==1){if($livb[3]=="1"){echo "checked";}}?>> Guest room</label><br>
			<label><input disabled type="checkbox" id="livb5" <?php if($edit==1){if($livb[4]=="1"){echo "checked";}}?>> Terrace</label><br>
			<label><input disabled type="checkbox" id="livb6" <?php if($edit==1){if($livb[5]=="1"){echo "checked";}}?>> Direct access to public transportation</label><br>
		</td><td valign="top">
			<label><input disabled type="checkbox" id="livb7" <?php if($edit==1){if($livb[6]=="1"){echo "checked";}}?>> Living room</label><br>
			<label><input disabled type="checkbox" id="livb8" <?php if($edit==1){if($livb[7]=="1"){echo "checked";}}?>> Backyard</label><br>
			<label><input disabled type="checkbox" id="livb9" <?php if($edit==1){if($livb[8]=="1"){echo "checked";}}?>> Dining room</label><br>
			<label><input disabled type="checkbox" id="livb10" <?php if($edit==1){if($livb[9]=="1"){echo "checked";}}?>> Piped Clean & Safe Water</label><br>
			<label><input disabled type="checkbox" id="livb11" <?php if($edit==1){if($livb[10]=="1"){echo "checked";}}?>> Kitchen</label><br>
			<label><input disabled type="checkbox" id="livb12" <?php if($edit==1){if($livb[11]=="1"){echo "checked";}}?>> Dug Well Water</label><br> 
			
		</td>
	</tr>
	<tr>
		<td valign="top" colspan="2">
			<label>Remarks:</label><br>
			<?php if($edit==1){echo $livb[12];}?>
		</td>
	</tr>
</table>
	
<label>c). House facilities </label>

<table class="table table-bordered">
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc1a" <?php if($edit==1){if($livc[0]=="1"){echo "checked";}}?>>Fan</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc1b" value="0" <?php if($edit==1){if($livc[1]=="1"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc1b" value="1" <?php if($edit==1){if($livc[1]=="0"){echo "checked";}}?>> House owner</label>
		</td>

		<td valign="top"><label><input disabled type="checkbox" id="livc2a" <?php if($edit==1){if($livc[2]=="1"){echo "checked";}}?>>TV set</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc2b" value="0" <?php if($edit==1){if($livc[3]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc2b" value="1" <?php if($edit==1){if($livc[3]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc3a" <?php if($edit==1){if($livc[4]=="1"){echo "checked";}}?>>Telephone (mobile)</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc3b" value="0" <?php if($edit==1){if($livc[5]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc3b" value="1" <?php if($edit==1){if($livc[5]=="1"){echo "checked";}}?>> House owner</label>
		</td>

		<td valign="top"><label><input disabled type="checkbox" id="livc4a" <?php if($edit==1){if($livc[6]=="1"){echo "checked";}}?>>Radio</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc4b" value="0" <?php if($edit==1){if($livc[7]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc4b" value="1" <?php if($edit==1){if($livc[7]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc5a" <?php if($edit==1){if($livc[8]=="1"){echo "checked";}}?>>Furniture</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc5b" value="0" <?php if($edit==1){if($livc[9]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc5b" value="1" <?php if($edit==1){if($livc[9]=="1"){echo "checked";}}?>> House owner</label>
		</td>

		<td valign="top"><label><input disabled type="checkbox" id="livc6a" <?php if($edit==1){if($livc[10]=="1"){echo "checked";}}?>>Refrigerator</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc6b" value="0" <?php if($edit==1){if($livc[11]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc6b" value="1" <?php if($edit==1){if($livc[11]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc7a" <?php if($edit==1){if($livc[12]=="1"){echo "checked";}}?>>Satellite/Cable TV</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc7b" value="0" <?php if($edit==1){if($livc[13]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc7b" value="1" <?php if($edit==1){if($livc[13]=="1"){echo "checked";}}?>> House owner</label>
		</td>

		<td valign="top"><label><input disabled type="checkbox" id="livc8a" <?php if($edit==1){if($livc[14]=="1"){echo "checked";}}?>>Washing machine</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc8b" value="0" <?php if($edit==1){if($livc[15]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc8b" value="1" <?php if($edit==1){if($livc[15]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc9a" <?php if($edit==1){if($livc[16]=="1"){echo "checked";}}?>>Computer</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc9b" value="0" <?php if($edit==1){if($livc[17]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc9b" value="1" <?php if($edit==1){if($livc[17]=="1"){echo "checked";}}?>> House owner</label>
		</td>

		<td valign="top"><label><input disabled type="checkbox" id="livc10a" <?php if($edit==1){if($livc[18]=="1"){echo "checked";}}?>>Internet connection</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc10b" value="0" <?php if($edit==1){if($livc[19]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc10b" value="1" <?php if($edit==1){if($livc[19]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
	<tr>
		<td valign="top"><label><input disabled type="checkbox" id="livc11a" <?php if($edit==1){if($livc[20]=="1"){echo "checked";}}?>>Kitchen Utensils</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc11b" value="0" <?php if($edit==1){if($livc[21]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc11b" value="1" <?php if($edit==1){if($livc[21]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	
		<td valign="top"><label><input disabled type="checkbox" id="livc12a" <?php if($edit==1){if($livc[22]=="1"){echo "checked";}}?>>Other</label></td>
		<td valign="top"><label><input disabled type="radio" name="livc12b" value="0" <?php if($edit==1){if($livc[23]=="0"){echo "checked";}}?>> Private</label>
			<label><input disabled type="radio" name="livc12b" value="1" <?php if($edit==1){if($livc[23]=="1"){echo "checked";}}?>> House owner</label>
		</td>
	</tr>
</table>

<label>d). Security & Safety</label>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<label><input disabled type="checkbox" id="livd1" <?php if($edit==1){if($livd[0]=="1"){echo "checked";}}?>>Fenced Accommodation</label><br>
			<label><input disabled type="checkbox" id="livd2" <?php if($edit==1){if($livd[1]=="1"){echo "checked";}}?>>Secured Gate(s)</label><br>
			<label><input disabled type="checkbox" id="livd3" <?php if($edit==1){if($livd[2]=="1"){echo "checked";}}?>>Health Facilities </label><br>
			<label><input disabled type="checkbox" id="livd4" <?php if($edit==1){if($livd[3]=="1"){echo "checked";}}?>>Police station access</label><br>
		</td><td valign="top">
			<label><input disabled type="checkbox" id="livd5" <?php if($edit==1){if($livd[4]=="1"){echo "checked";}}?>>Secured Doors & Windows</label><br>
			<label><input disabled type="checkbox" id="livd6" <?php if($edit==1){if($livd[5]=="1"){echo "checked";}}?>>Multiple Entry/Exit points in the building</label><br>
			<label><input disabled type="checkbox" id="livd7" <?php if($edit==1){if($livd[6]=="1"){echo "checked";}}?>>Fire Extinguisher</label>
		</td>	
	</tr>
	<tr>
		<td valign="top" colspan="2">
			<Label>Remarks:</Label><br>
			<?php if($edit==1){echo $livd[7];}?>
		</td>
	</tr>
</table>

<label>e). Documentation & Security</label>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<label>Suggested Questions</label><br>
			<?php if($edit==1){echo $live[0];} ?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<label><input disabled type="checkbox" id="live2" <?php if($edit==1){if($live[1]==1){echo "checked";}}?>>Registered to neighbourhood/local authorities </label><br>
			<label><input disabled type="checkbox" id="live3" <?php if($edit==1){if($live[2]==1){echo "checked";}}?>>Attestation Letter</label><br>
			<label><input disabled type="checkbox" id="live4" <?php if($edit==1){if($live[3]==1){echo "checked";}}?>>Valid Passports and/or other recognized travel documents</label>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<Label>Remarks:</Label><br>
			<?php if($edit==1){echo $live[4];} ?>
		</td>
	</tr>
</table>

<hr>
<h4>Financial Situation and Supporting System</h4>
<table clas="table table-bordered" border="1">
	<tr>
		<td valign="top" colspan="4">
			<label>How the child survived from Date of Arrival to the date of Assessment</label><br>
			<?php if($edit==1){echo $fin[0];}?>
		</td>
	</tr>
	<tr>
		<td valign="top" colspan="2"><label>Expenses </label></td>
		<td valign="top">Amount (weekly in IDR): <?php if($edit==1){echo $fin[1];}?></td>
		<td valign="top" >
			<label>Remarks:</label><br>
			<?php if($edit==1){echo $fin[2];}?>
		</td>
	</tr>
	<tr>
		<td valign="top"><label>Resources </label></td>
		<td valign="top">
			<label><input disabled type="checkbox" id="fin4" <?php if($edit==1){if($fin[3]){echo "checked";}}?>> Personal income</label><br> 
			<label><input disabled type="checkbox" id="fin5" <?php if($edit==1){if($fin[4]){echo "checked";}}?>> CWS</label><br> 
			<label><input disabled type="checkbox" id="fin6" <?php if($edit==1){if($fin[5]){echo "checked";}}?>> Employment Situationr</label><br> 
			<label><input disabled type="checkbox" id="fin7" <?php if($edit==1){if($fin[6]){echo "checked";}}?>> Family abroad (where?)</label><br> 
			<label><input disabled type="checkbox" id="fin8" <?php if($edit==1){if($fin[7]){echo "checked";}}?>> Assistance received (from?)</label><br> 
			<label><input disabled type="checkbox" id="fin9" <?php if($edit==1){if($fin[8]){echo "checked";}}?>> Government</label><br> 
			<label><input disabled type="checkbox" id="fin10" <?php if($edit==1){if($fin[9]){echo "checked";}}?>> Other</label><br> 
		</td>
		<td valign="top">Amount (weekly in IDR): <?php if($edit==1){echo $fin[10];}?></td>
		<td valign="top">
			<label>Remarks</label><br>
			<?php if($edit==1){echo $fin[11];}?>
		</td>
	</tr>
	
</table>

<hr>
<h4>CWS - Analysis of information & conclusions by Caseworker</h4>
<table class="table table-bordered" >
	<tr>
		<td colspan="3">
			<label>Children at risk : Risk rating </label>
			<div class="well well-sm">
				<label>Instructions</label>
				<p>
					<b>Risk rating box:</b> After completing each risk category, staff will be asked to indicate whether the person of concern is believed to be at high (H), medium (M), or low (L) risk as defined below:
					<ul>
						<li><b> H:</b> reflects a need for immediate intervention by UNHCR or a partner agency. Staff should immediately refer the individual to the appropriate service provider, and follow up with the provider on a weekly basis until they confirm that they have taken action in connection with the individual at heightened risk. This will ensure that the individual’s situation is adequately addressed, and that the referral system is functioning efficiently. (FEW DAYS)</li>
						<li><b> M:</b> indicates that intervention should be scheduled and occur, but that immediate intervention is not necessary. Note that cases placed in the medium risk category can move into the high-risk category if intervention does not take place. Therefore, staff should implement a structured monitoring system to ensure adequate and timely follow up. </li>
						<li><b> L:</b> denotes that the regular referral system applies. Additionally, staff should review the situation of individuals at low risk at regular intervals or implement another structured monitoring and follow-up mechanism to ensure that the case is handled adequately.</li>
					</ul>
				</p>
			</div>	
		</td>
	</tr>
	<tr class="warning">
		<td valign="top" colspan="3">Summary of risk categories</td>
	</tr>
	<tr>
		<th >Categories</th>
		<th>Risk rate</th>
		<th>Needs</th>
	</tr>
	<tr>
		<td valign="top">Boy at risk</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws1" value="L" <?php if($edit==1){if($cws[0]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws1" value="M" <?php if($edit==1){if($cws[0]=="M"){echo "checked";}}?>> M</label>
				<label ><input disabled type="radio" name="cws1" value="H" <?php if($edit==1){if($cws[0]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[1];}?></td>
	</tr>
	<tr>
		<td valign="top">Girl at risk</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws2" value="L" <?php if($edit==1){if($cws[2]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws2" value="M" <?php if($edit==1){if($cws[2]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws2" value="H" <?php if($edit==1){if($cws[3]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[3];}?></td>
	</tr>
	<tr><td valign="top" colspan="3"></td></tr>
	<tr class="warning">
		<td valign="top" colspan="3">Referral areas as priority  <small class="text-danger">Please Tick (<input disabled type="checkbox" checked>) as appropriate</small></td>
	</tr>
	<tr>
		<th>Areas</th>
		<th width="250px">Risk rate</th>
		<th>Follow up actions / assistance (CWS, UNHCR, others), according to BiA& victim’s wishes</th>
	</tr>
	<tr>
		<td valign="top">Legal protection <br><small>(including documentation)</small> </td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws3" value="L" <?php if($edit==1){if($cws[4]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws3" value="M" <?php if($edit==1){if($cws[4]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws3" value="H" <?php if($edit==1){if($cws[4]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[5];}?></td>
	</tr>
	<tr>
		<td valign="top">RSD </td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws4" value="L" <?php if($edit==1){if($cws[6]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws4" value="M" <?php if($edit==1){if($cws[6]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws4" value="H" <?php if($edit==1){if($cws[6]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[7];}?></td>
	</tr>
	<tr>
		<td valign="top">Basic needs <br><small>(food, water)</small> </td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws5" value="L" <?php if($edit==1){if($cws[8]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws5" value="M" <?php if($edit==1){if($cws[8]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws5" value="H" <?php if($edit==1){if($cws[8]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[9];}?></td>
	</tr>
	<tr>
		<td valign="top">Education</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws6" value="L" <?php if($edit==1){if($cws[10]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws6" value="M" <?php if($edit==1){if($cws[10]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws6" value="H" <?php if($edit==1){if($cws[10]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[11];}?></td>
	</tr>
	<tr>
		<td valign="top">SGBVs</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws7" value="L" <?php if($edit==1){if($cws[12]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws7" value="M" <?php if($edit==1){if($cws[12]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws7" value="H" <?php if($edit==1){if($cws[12]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[13];}?></td>
	</tr>
	<tr>
		<td valign="top">Medical assitance</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws8" value="L" <?php if($edit==1){if($cws[14]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws8" value="M" <?php if($edit==1){if($cws[14]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws8" value="H" <?php if($edit==1){if($cws[14]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[15];}?></td>
	</tr>
	<tr>
		<td valign="top">Psychosocial</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws9" value="L" <?php if($edit==1){if($cws[16]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws9" value="M" <?php if($edit==1){if($cws[16]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws9" value="H" <?php if($edit==1){if($cws[16]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[17];}?></td>
	</tr>
	<tr>
		<td valign="top">Material assitance <br><small>(shelter, NFI, financial)</small></td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws10" value="L" <?php if($edit==1){if($cws[18]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws10" value="M" <?php if($edit==1){if($cws[18]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws10" value="H" <?php if($edit==1){if($cws[18]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[19];}?></td>
	</tr>
	<tr>
		<td valign="top">Recreational activities / Community activities</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws11" value="L" <?php if($edit==1){if($cws[20]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws11" value="M" <?php if($edit==1){if($cws[20]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws11" value="H" <?php if($edit==1){if($cws[20]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[21];}?></td>
	</tr>
	<tr>
		<td valign="top">Regular Home visits</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws12" value="L" <?php if($edit==1){if($cws[22]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws12" value="M" <?php if($edit==1){if($cws[22]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws12" value="H" <?php if($edit==1){if($cws[22]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[23];}?></td>
	</tr>
	<tr>
		<td valign="top">Family tracing</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws13" value="L" <?php if($edit==1){if($cws[24]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws13" value="M" <?php if($edit==1){if($cws[24]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws13" value="H" <?php if($edit==1){if($cws[24]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[25];}?></td>
	</tr>
	<tr>
		<td valign="top">Durable solution</td>
		<td valign="top">
			<div class="checkbox">
				<label><input disabled type="radio" name="cws14" value="L" <?php if($edit==1){if($cws[26]=="L"){echo "checked";}}?>> L</label>
				<label><input disabled type="radio" name="cws14" value="M" <?php if($edit==1){if($cws[26]=="M"){echo "checked";}}?>> M</label>
				<label><input disabled type="radio" name="cws14" value="H" <?php if($edit==1){if($cws[26]=="H"){echo "checked";}}?>> H</label>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[27];}?></td>
	</tr>
	<tr>
		<td valign="top">Caseworker signature & date</td>
		<td valign="top" colspan="2"><?php if($edit==1){echo $cws[28];}?></td>
	</tr>
</table>

<hr>
<h4>Optional</h4>
<table class="table table-bordered">
	<tr>
		<td><label>UNHCR</label><br><small>Child Protection officer or <br>Community Services -  Follow up <br>& Conclusions</small></td>
		<td>Conclusions: <br><?php if($edit==1){echo $opt[0];}?> </td>
		<td>CSO or CP name & date: <br><?php if($edit==1){echo $opt[1];}?> </td>
	</tr>
	<tr>
		<td><label>Panel conclusion</label><br><small>(Optional –for complicated cases,<br> only if necessary)</small></td>
		<td>Final conclusions: <br><?php if($edit==1){echo $opt[2];}?></td>
		<td>CSO or CP name & date: <br><?php if($edit==1){echo $opt[3];}?></td>
	</tr>
</table>	
</div>
<?php		
	}
	else{
		echo "No data BIA for File Number: ".$_GET['file_no'];
	}	
}
?>
