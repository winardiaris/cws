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
	$qry = mysql_query("SELECT * FROM `bia` WHERE `file_no`='".$_GET['file_no']."' AND `status`='1'") or die(mysql_error());
	$data = mysql_fetch_array($qry);
	$count=mysql_num_rows($qry);

	$assessment=explode(";",Balikin($data['assessment']));

		//toiv
		$toiva1=explode(";",Balikin($data['toiva1']));$toiva2=explode(";",Balikin($data['toiva2']));$toiva3=explode(";",Balikin($data['toiva3']));
		$toiva4=explode(";",Balikin($data['toiva4']));$toiva5=explode(";",Balikin($data['toiva5']));$toiva6=explode(";",Balikin($data['toiva6']));
		$toiva7=explode(";",Balikin($data['toiva7']));$toiva8=explode(";",Balikin($data['toiva8']));$toiva9=explode(";",Balikin($data['toiva9']));
		$toiva10=explode(";",Balikin($data['toiva10']));$toiva11=explode(";",Balikin($data['toiva11']));$toiva12=explode(";",Balikin($data['toiva12']));
		$toiva13=explode(";",Balikin($data['toiva13']));$toiva14=explode(";",Balikin($data['toiva14']));$toiva15=explode(";",Balikin($data['toiva15']));
		$toiva16=explode(";",Balikin($data['toiva16']));$toiva17=explode(";",Balikin($data['toiva17']));$toiva18=explode(";",Balikin($data['toiva18']));
		$toiva19=explode(";",Balikin($data['toiva19']));$toiva20=explode(";",Balikin($data['toiva20']));$toiva21=explode(";",Balikin($data['toiva21']));
		$toiva22=explode(";",Balikin($data['toiva22']));
		//toivb
		$toivb1=explode(";",Balikin($data['toivb1']));$toivb2=explode(";",Balikin($data['toivb2']));$toivb3=explode(";",Balikin($data['toivb3']));
		$toivb4=explode(";",Balikin($data['toivb4']));$toivb5=explode(";",Balikin($data['toivb5']));$toivb6=explode(";",Balikin($data['toivb6']));
		$toivb7=explode(";",Balikin($data['toivb7']));


		$edu=explode(";",Balikin($data['edu']));
		$health=explode(";",Balikin($data['health']));
		$psy=explode(";",Balikin($data['psy']));
		$liva=explode(";",Balikin($data['living_a']));
		$livb=explode(";",Balikin($data['living_b']));
		$livc=explode(";",Balikin($data['living_c']));
		$livd=explode(";",Balikin($data['living_d']));
		$live=explode(";",Balikin($data['living_e']));
		$fin=explode(";",Balikin($data['financial']));
		$cws=explode(";",Balikin($data['cws_analysis']));
		$opt=explode(";",Balikin($data['optional']));


	$edit = 1;

	if($count>0){
		include ("header.php");
?>
<h4>Best Interest Assessment Report for Temporary Care</h4>
<hr>
<h5>Date of Assessment</h5>
<table class="table table-bordered">
	<tr>
		<td valign="top"><b>UNHCR Case Number:</b></td>
		<td valign="top"><?php if($edit==1){echo $data['file_no'];}?></td>

		<td valign="top"><b>Date of Assessment: </b></td>
		<td valign="top"><?php if($edit==1){echo $data['doa'];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Location</b></td>
		<td valign="top"><?php if($edit==1){echo $assessment[0];}?></td>


		<td valign="top"><b>Case Worker</b></td>
		<td valign="top"><?php if($edit==1){echo $assessment[1];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Organization</b></td>
		<td valign="top"><?php if($edit==1){echo $assessment[2];}?></td>

		<td valign="top"><b>Interpreter name & organization</b></td>
		<td valign="top"><?php if($edit==1){echo $assessment[3];}?></td>
	</tr>
	<tr >
		<td valign="top"><b>Identification of child</b></td>
		<td valign="top" colspan="3">
			<b class="radio-inline"><input disabled type="radio" name="ioc"  value="UNHCR" <?php if($edit==1){if($assessment[4]=="UNHCR"){echo"checked='checked'";}  } ?>>UNHCR</b>
			<b class="radio-inline"><input disabled type="radio" name="ioc"  value="CWS" <?php if($edit==1){if($assessment[4]=="CWS"){echo"checked='checked'";}  } ?>>CWS</b>
			<b class="radio-inline"><input disabled type="radio" name="ioc"  value="other" id="other" <?php if($edit==1){if($assessment[4]=="other"){echo"checked='checked'";}  } ?>>Other: <?php if($edit==1){if($assessment[4]=="other"){echo $assessment[5];}}?></b>
		</td>
	</tr>

</table>

<h5>Personal history<br><small>( Background(Brief history describing hardships or trauma experienced))</small></h5>
<table class="table table-bordered">
	<tr>
		<td valign="top"><b>1. In the Country of Origin</b></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $data['ph1']; } ?></td>
	</tr>
	<tr>
		<td valign="top"><b>2. During the flight</b></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $data['ph2']; } ?></td>
	</tr>
	<tr>
		<td valign="top"><b>3. In the country of Asylum</b></td>
	</tr>
	<tr>
		<td valign="top"><?php if($edit==1){echo $data['ph4']; } ?></td>
	</tr>
</table>

<h5>Types of identified vulnerabilities</h5>
<table class="table table-bordered">
	<tr>
		<td valign="top" width="20%"><b>Child at risk of deportation</b></td>
		<td valign="top" width="20%">
			<b><input type="checkbox" disabled id="toiva1a" <?php if($edit==1){if($toiva1[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva1b" <?php if($edit==1){if($toiva1[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva1c" <?php if($edit==1){if($toiva1[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td width="60%"><b>Observations:</b><br><?php if($edit==1){echo $toiva1[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Child without legal documentation</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva2a" <?php if($edit==1){if($toiva2[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva2b" <?php if($edit==1){if($toiva2[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva2c" <?php if($edit==1){if($toiva2[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva2[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Street Children</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva3a" <?php if($edit==1){if($toiva3[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva3b" <?php if($edit==1){if($toiva3[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva3c" <?php if($edit==1){if($toiva3[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva3[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Medical Case</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva4a" <?php if($edit==1){if($toiva4[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva4b" <?php if($edit==1){if($toiva4[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva4c" <?php if($edit==1){if($toiva4[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva4[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Disabled child:</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva5a" <?php if($edit==1){if($toiva5[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva5b" <?php if($edit==1){if($toiva5[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva5c" <?php if($edit==1){if($toiva5[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva5[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of violence</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva6a" <?php if($edit==1){if($toiva6[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva6b" <?php if($edit==1){if($toiva6[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva6c" <?php if($edit==1){if($toiva6[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva6[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of sexual violence</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva7a" <?php if($edit==1){if($toiva7[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva7b" <?php if($edit==1){if($toiva7[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva7c" <?php if($edit==1){if($toiva7[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva7[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of trafficking</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva8a" <?php if($edit==1){if($toiva8[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva8b" <?php if($edit==1){if($toiva8[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva8c" <?php if($edit==1){if($toiva8[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva8[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of Child Labour</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva9a" <?php if($edit==1){if($toiva9[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva9b" <?php if($edit==1){if($toiva9[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva9c" <?php if($edit==1){if($toiva9[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva9[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of forced Labour</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva10a" <?php if($edit==1){if($toiva10[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva10b" <?php if($edit==1){if($toiva10[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva10c" <?php if($edit==1){if($toiva10[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva10[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of exploitation</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva11a" <?php if($edit==1){if($toiva11[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva11b" <?php if($edit==1){if($toiva11[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva11c" <?php if($edit==1){if($toiva11[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva11[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of prostitution</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva12a" <?php if($edit==1){if($toiva12[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva12b" <?php if($edit==1){if($toiva12[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva12c" <?php if($edit==1){if($toiva12[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva12[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Minor victim used or recruited by smugglers</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva13a" <?php if($edit==1){if($toiva13[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva13b" <?php if($edit==1){if($toiva13[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva13c" <?php if($edit==1){if($toiva13[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva13[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Minor in conflict with the Law</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva14a" <?php if($edit==1){if($toiva14[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva14b" <?php if($edit==1){if($toiva14[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva14c" <?php if($edit==1){if($toiva14[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva14[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>In hiding <small>(e.g. fear of being identified or found)</small></b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva15a" <?php if($edit==1){if($toiva15[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva15b" <?php if($edit==1){if($toiva15[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva15c" <?php if($edit==1){if($toiva15[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva15[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Experiencing rejection by community</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva16a" <?php if($edit==1){if($toiva16[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva16b" <?php if($edit==1){if($toiva16[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva16c" <?php if($edit==1){if($toiva16[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva16[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Bodily injured</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva17a" <?php if($edit==1){if($toiva17[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva17b" <?php if($edit==1){if($toiva17[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva17c" <?php if($edit==1){if($toiva17[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva17[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of severe beatings</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva18a" <?php if($edit==1){if($toiva18[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva18b" <?php if($edit==1){if($toiva18[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva18c" <?php if($edit==1){if($toiva18[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva18[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Lack of basic needs <small>(food, water, shelter)</small></b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva19a" <?php if($edit==1){if($toiva19[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva19b" <?php if($edit==1){if($toiva19[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva19c" <?php if($edit==1){if($toiva19[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva19[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of rape / sexual abuses</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva20a" <?php if($edit==1){if($toiva20[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva20b" <?php if($edit==1){if($toiva20[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva20c" <?php if($edit==1){if($toiva20[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva20[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Unsafe in community <br><small>(a.g. abuse by family or community, domestic violence)</small></b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva21a" <?php if($edit==1){if($toiva21[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva21b" <?php if($edit==1){if($toiva21[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva21c" <?php if($edit==1){if($toiva21[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva21[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Other <small>(explain)</small></b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toiva22a" <?php if($edit==1){if($toiva22[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toiva22b" <?php if($edit==1){if($toiva22[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toiva22c" <?php if($edit==1){if($toiva22[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toiva22[3];}?></td>
	</tr>
	<tr>
		<td valign="top" colspan="3" class="info" ><b>Special attention: Girls at risk <small>(can be cumulated with previous section)</small></b></td>
	</tr>
	<tr>
		<td valign="top"><b>Girl without protection</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb1a" <?php if($edit==1){if($toivb1[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb1b" <?php if($edit==1){if($toivb1[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb1c" <?php if($edit==1){if($toivb1[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb1[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Pregnant girl</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb2a" <?php if($edit==1){if($toivb2[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb2b" <?php if($edit==1){if($toivb2[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb2c" <?php if($edit==1){if($toivb2[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb2[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Adolescent parent</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb3a" <?php if($edit==1){if($toivb3[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb3b" <?php if($edit==1){if($toivb3[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb3c" <?php if($edit==1){if($toivb3[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb3[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of rape / sexual abuses</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb4a" <?php if($edit==1){if($toivb4[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb4b" <?php if($edit==1){if($toivb4[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb4c" <?php if($edit==1){if($toivb4[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb4[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Engaging in survival sex</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb5a" <?php if($edit==1){if($toivb5[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb5b" <?php if($edit==1){if($toivb5[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb5c" <?php if($edit==1){if($toivb5[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb5[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Other forms of GBVs</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb6a" <?php if($edit==1){if($toivb6[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb6b" <?php if($edit==1){if($toivb6[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb6c" <?php if($edit==1){if($toivb6[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb6[3];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Victim of forced marriage</b></td>
		<td valign="top" >
			<b><input type="checkbox" disabled id="toivb6a" <?php if($edit==1){if($toivb6[0]=="1"){echo "checked='checked'";}}?>> CoO</b><br>
			<b><input type="checkbox" disabled id="toivb6b" <?php if($edit==1){if($toivb6[1]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input type="checkbox" disabled id="toivb6c" <?php if($edit==1){if($toivb6[2]=="1"){echo "checked='checked'";}}?>> CoA</b><br>
		</td>
		<td><b>Observations:</b><br><?php if($edit==1){echo $toivb6[3];}?></td>
	</tr>

</table>

<h5>Education</h5>
<table class="table table-bordered">
	<tr>
		<td valign="top" width="200px"><b>Suggested questions</b></td>
		<td valign="top"><b>*Did you go to school prior to the separation?</b><br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $edu[0];}?></p>
			<b>	*Do you like to go to school?</b><br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $edu[1];}?></p>
			<b>	*How do you spend your time? What do you like to do? <small>(Language, Computer, etc.)</small> </b> <br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $edu[2];}?></p>
			<b>	Observations</b></br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $edu[3];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top"><b>Level of education / grade</b></td>
		<td valign="top"><?php if($edit==1){echo $edu[4];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Skills & Occupation</b></td>
		<td valign="top"><?php if($edit==1){echo $edu[5];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Previous occupation, if any</b></td>
		<td valign="top"><?php if($edit==1){echo $edu[6];}?></td>
	</tr>
</table>

<h5>Health</h5>
<table class="table table-bordered">
	<tr>
		<td valign="top" colspan="3">
			<b>Suggested questions:</b>
			<p style="margin-left:15px;"><?php if($edit==1){echo $health[0];}?></p>
			<b><i>Observation:</i></b><br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $health[1];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top" width="300px">
			<Label>Whether medical attention is being</Label><br>
			<b class="checkbox-inline"><input disabled type="radio" value="0" name="health4" <?php if($edit==1){if($health[2]=="0"){echo "checked='checked'";}}?>> Received</b>
			<b class="checkbox-inline"><input disabled type="radio" value="1" name="health4" <?php if($edit==1){if($health[2]=="1"){echo "checked='checked'";}}?>> Required</b>
		</td>
		<td valign="top" colspan="2">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[3];}?>
		</td>
	</tr>
	<tr>
		<td valign="top"><b>Physical Health problems</b></td>
		<td valign="top" width="150px">
			<b><input disabled type="checkbox" id="health5a" <?php if($edit==1){if($health[4]=="1"){echo "checked='checked'";}}?>> Past history </b><br>
			<b><input disabled type="checkbox" id="health5b" <?php if($edit==1){if($health[5]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input disabled type="checkbox" id="health5c" <?php if($edit==1){if($health[6]=="1"){echo "checked='checked'";}}?>> At present</b><br>
		</td>
		<td valign="top">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[7];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Child with HIV/AIDS</b></td>
		<td valign="top" >
			<b><input disabled type="checkbox" id="health6a" <?php if($edit==1){if($health[8]=="1"){echo "checked='checked'";}}?>> Past history </b><br>
			<b><input disabled type="checkbox" id="health6b" <?php if($edit==1){if($health[9]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input disabled type="checkbox" id="health6c" <?php if($edit==1){if($health[10]=="1"){echo "checked='checked'";}}?>> At present</b><br>
		</td>
		<td valign="top">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[11];}?></td>

	</tr>
	<tr>
		<td valign="top"><b>Addictions <i>(Drugs, alcohol, etc.)</i></b></td>
		<td valign="top" >
			<b><input disabled type="checkbox" id="health7a" <?php if($edit==1){if($health[12]=="1"){echo "checked='checked'";}}?>> Past history </b><br>
			<b><input disabled type="checkbox" id="health7b" <?php if($edit==1){if($health[13]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input disabled type="checkbox" id="health7c" <?php if($edit==1){if($health[14]=="1"){echo "checked='checked'";}}?>> At present</b><br>
		</td>
		<td valign="top">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[15];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Hearing impairment</b></td>
		<td valign="top" >
			<b><input disabled type="checkbox" id="health8a" <?php if($edit==1){if($health[16]=="1"){echo "checked='checked'";}}?>> Past history </b><br>
			<b><input disabled type="checkbox" id="health8b" <?php if($edit==1){if($health[17]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input disabled type="checkbox" id="health8c" <?php if($edit==1){if($health[18]=="1"){echo "checked='checked'";}}?>> At present</b><br>
		</td>
		<td valign="top">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[19];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Mental disability</b></td>
		<td valign="top" style="max-width:200px;">
			<b><input disabled type="checkbox" id="health9a" <?php if($edit==1){if($health[20]=="1"){echo "checked='checked'";}}?>> Past history </b><br>
			<b><input disabled type="checkbox" id="health9b" <?php if($edit==1){if($health[21]=="1"){echo "checked='checked'";}}?>> During flight </b><br>
			<b><input disabled type="checkbox" id="health9c" <?php if($edit==1){if($health[22]=="1"){echo "checked='checked'";}}?>> At present</b><br>
		</td>
		<td valign="top">
			<b><i>Observation:</i></b><br>
			<?php if($edit==1){echo $health[23];}?></td>
	</tr>

</table>

<h5>Psychosocial conditions</h5><br> <small class="text-danger">(This part can be filled by Psychosocial workers)</small>
<!--
//aaaa
-->
<table class="table table-bordered">
	<tr>
		<td valign="top"><b>Date of Face-to-Face interview</b><i>(If different from BIA date)</i><br>
				<b><?php if($edit==1){echo $psy[0];}?></b>
		</td>
	</tr>
	<tr>
		<td class="info"><b>Social Resources </b></td>
	</tr>
	<tr>
		<td valign="top">
			<b>Is the Child able to form and maintain relationships with family/friends?</b>
			<p style="margin-left:15px;"><?php if($edit==1){echo $psy[1];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>What are the Child’s favorite activities?</b>
		    <p style="margin-left:15px;"><?php if($edit==1){echo $psy[2];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Hobbies & interests</b>
		   <p style="margin-left:15px;"><?php if($edit==1){echo $psy[3];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Daily Activities - How child occupy himself daily?</b>
			<p style="margin-left:15px;"><?php if($edit==1){echo $psy[4];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top" >
			<b>*Do you feel healthy?</b><br>
			<i> If not, please, explain type of sickness/how you feel physically.</i>
			<p style="margin-left:15px;"><?php if($edit==1){echo $psy[5];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top" >
			<b>*Do you have access to medical care?</b><br><i>If not, explain why?</i>
			<p style="margin-left:15px;"><?php if($edit==1){echo $psy[6];}?></p>
		</td>
	</tr>

</table>

<table class="table table-bordered">
	<tr>
		<td valign="top" colspan="3" class="info"><b>Mental status assessment</b></td>
	</tr>
	<tr><td valign="top" colspan="3" ></td></tr>
	<tr class="success">
		<th>Psychosocial symptoms & problems </th>
		<th>Frequency</th>
		<th>Observations</th>
	</tr>
	<tr>
		<td valign="top" width="300px"><b>Eating problem</b><br><i> (characterized by a compulsion to overeat or avoiding food)</i></td>
		<td valign="top" width="30px">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy8a" value="1" <?php if($edit==1){if($psy[7]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy8a" value="0" <?php if($edit==1){if($psy[7]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[8];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Depressed</b><br><b><i>(a person experiences deep, unshakable sadness and diminished interest in nearly all activities)</i></b></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy9a" value="1" <?php if($edit==1){if($psy[9]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy9a" value="0" <?php if($edit==1){if($psy[9]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[10];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Sleeping disturbance</b><br><i>(Any condition that interferes with sleep)</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy10a" value="1" <?php if($edit==1){if($psy[11]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy10a" value="0" <?php if($edit==1){if($psy[11]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[12];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Easily get angry</b></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy11a" value="1" <?php if($edit==1){if($psy[13]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy11a" value="0" <?php if($edit==1){if($psy[13]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[14];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Confused </b><br><i>(disoriented mentally; being unable to think with clarity or act with understanding and intelligence)</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy12a" value="1" <?php if($edit==1){if($psy[15]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy12a" value="0" <?php if($edit==1){if($psy[15]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[16];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Lack of concentration </b><br><i>(inability to direct one's thinking in whatever direction one would intend))</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy13a" value="1" <?php if($edit==1){if($psy[17]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy13a" value="0" <?php if($edit==1){if($psy[17]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[18];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Feeling hopeless</b><br><i>(without hope; despairing)</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy14a" value="1" <?php if($edit==1){if($psy[19]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy14a" value="0" <?php if($edit==1){if($psy[19]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[20];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Feeling unworthy </b><br><i>(his/her sense of meaning is undermined)</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy15a" value="1" <?php if($edit==1){if($psy[21]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy15a" value="0" <?php if($edit==1){if($psy[21]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[22];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Lack of trust to others </b></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy16a" value="1" <?php if($edit==1){if($psy[23]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy16a" value="0" <?php if($edit==1){if($psy[23]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[24];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Deprived from community/others </b></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy17a" value="1" <?php if($edit==1){if($psy[25]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy17a" value="0" <?php if($edit==1){if($psy[25]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[26];}?></td>
	</tr>
	<tr>
		<td valign="top"><b>Coping Mechanism </b><br><i>(an adaptation to environmental stress that is based on conscious or unconscious choice and that enhances control over behaviour or gives psychological comfort)</i></td>
		<td valign="top">
			<div class="form-group">
			<b class="radio-inline"><input disabled type="radio" name="psy18a" value="1" <?php if($edit==1){if($psy[27]=="1"){echo "checked='checked'";}}?>> Yes</b><br>
			<b class="radio-inline"><input disabled type="radio" name="psy18a" value="0" <?php if($edit==1){if($psy[27]=="0"){echo "checked='checked'";}}?>> No</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $psy[28];}?></td>
	</tr>
</table>

<h5>INTERACTION <br><small> with the person during the interview</small><br><small><i></i>Simple Description of the Child AS or refugee as he appears - (describe what you see; highlight the positive, not just the negative; Avoid bs.)</small>
</h5>
<table class="table table-bordered">
	<tr>
		<td valign="top"><b>Mood, attitude, appearance, speech, affect, thought consent</b></td>
	</tr>
	<tr>
		<td valign="top">
		<p style="margin-left:15px;"><?php if($edit==1){echo $data['interaction'];}?></p>
		</td>
	</tr>
</table>



<h5>Living conditions in place of residence</h5>

<b>a). Suggested Questions:</b>
<table class="table table-bordered">
	<tr>
		<td valign="top"><b>With whom do you currently live?  <i>(Note names, ages, gender)</i> How long have you been living here?Is there an adult in <i>(name/location in country of asylum)</i> who is looking after you?  <i>If so, note name, relationship, contact information.</i> How did you find this place to stay? How is your relationship with your caretaker and/or housemates? </b></td>
	</tr>
	<tr>
		<td valign="top"><p style="margin-left:15px;"><?php if($edit==1){echo $liva[0];}?></p></td>
	</tr>
	<tr>
		<td valign="top"><b>Do you like to stay with this family? How often do you eat? Where do you sleep? How do you feel living here? Are you happy here? Do you think you have enough food? If not, please explain. Who prepares the food? Do you have access to clean water? Are appropriate sanitation facilities in place, where you live in? </b></td>
	</tr>
	<tr>
		<td valign="top">
			<p style="margin-left:15px;"><?php if($edit==1){echo $liva[1];}?></p><br><br>
			<small>If the child has already in the shelter, put the situation before living in shelter in this section.</small>
		</td>
	</tr>
	<tr>
		<td valign="top"><b>Responses:</b></td>
	</tr>
	<tr>
		<td valign="top"><p style="margin-left:15px;"><?php if($edit==1){echo $liva[2];}?></p></td>
	</tr>
	<tr>
		<td valign="top">
			<b>Type of housing</b>
			<b class="radio-inline"><input disabled type="radio" name="liva4" value="CWS" <?php if($edit==1){if($liva[3]=="CWS"){echo "checked='checked'";}}?>> CWS</b>
			<b class="radio-inline"><input disabled type="radio" name="liva4" value="House" <?php if($edit==1){if($liva[3]=="House"){echo "checked='checked'";}}?>> House</b>
			<br><small class="text-danger">(If CWS shelter is tick, no need to fill up part b, c& d)</small>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Number of Person Living in the Same Room/House</b><br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $liva[4];}?></p>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Neighbourhood/Relationship with around People</b><br>
			<p style="margin-left:15px;"><?php if($edit==1){echo $liva[5];}?></p>
		</td>
	</tr>
</table>

<b>b). Description of the house</b>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<b><input disabled type="checkbox" id="livb1" <?php if($edit==1){if($livb[0]=="1"){echo "checked='checked'";}}?>> Bedroom</b> <br>
			<b><input disabled type="checkbox" id="livb2" <?php if($edit==1){if($livb[1]=="1"){echo "checked='checked'";}}?>> Bathroom</b><br>
			<b><input disabled type="checkbox" id="livb3" <?php if($edit==1){if($livb[2]=="1"){echo "checked='checked'";}}?>> Electricity</b><br>
			<b><input disabled type="checkbox" id="livb4" <?php if($edit==1){if($livb[3]=="1"){echo "checked='checked'";}}?>> Guest room</b><br>
			<b><input disabled type="checkbox" id="livb5" <?php if($edit==1){if($livb[4]=="1"){echo "checked='checked'";}}?>> Terrace</b><br>
			<b><input disabled type="checkbox" id="livb6" <?php if($edit==1){if($livb[5]=="1"){echo "checked='checked'";}}?>> Direct access to public transportation</b><br>
		</td><td valign="top">
			<b><input disabled type="checkbox" id="livb7" <?php if($edit==1){if($livb[6]=="1"){echo "checked='checked'";}}?>> Living room</b><br>
			<b><input disabled type="checkbox" id="livb8" <?php if($edit==1){if($livb[7]=="1"){echo "checked='checked'";}}?>> Backyard</b><br>
			<b><input disabled type="checkbox" id="livb9" <?php if($edit==1){if($livb[8]=="1"){echo "checked='checked'";}}?>> Dining room</b><br>
			<b><input disabled type="checkbox" id="livb10" <?php if($edit==1){if($livb[9]=="1"){echo "checked='checked'";}}?>> Piped Clean & Safe Water</b><br>
			<b><input disabled type="checkbox" id="livb11" <?php if($edit==1){if($livb[10]=="1"){echo "checked='checked'";}}?>> Kitchen</b><br>
			<b><input disabled type="checkbox" id="livb12" <?php if($edit==1){if($livb[11]=="1"){echo "checked='checked'";}}?>> Dug Well Water</b><br>

		</td>
	</tr>
	<tr>
		<td valign="top" colspan="2">
			<b>Remarks:</b><br>
			<?php if($edit==1){echo $livb[12];}?>
		</td>
	</tr>
</table>

<b>c). House facilities </b>

<table class="table table-bordered">
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc1a" <?php if($edit==1){if($livc[0]=="1"){echo "checked='checked'";}}?>>Fan</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc1b" value="0" <?php if($edit==1){if($livc[1]=="1"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc1b" value="1" <?php if($edit==1){if($livc[1]=="0"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc2a" <?php if($edit==1){if($livc[2]=="1"){echo "checked='checked'";}}?>>TV set</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc2b" value="0" <?php if($edit==1){if($livc[3]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc2b" value="1" <?php if($edit==1){if($livc[3]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc3a" <?php if($edit==1){if($livc[4]=="1"){echo "checked='checked'";}}?>>Telephone (mobile)</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc3b" value="0" <?php if($edit==1){if($livc[5]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc3b" value="1" <?php if($edit==1){if($livc[5]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc4a" <?php if($edit==1){if($livc[6]=="1"){echo "checked='checked'";}}?>>Radio</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc4b" value="0" <?php if($edit==1){if($livc[7]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc4b" value="1" <?php if($edit==1){if($livc[7]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc5a" <?php if($edit==1){if($livc[8]=="1"){echo "checked='checked'";}}?>>Furniture</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc5b" value="0" <?php if($edit==1){if($livc[9]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc5b" value="1" <?php if($edit==1){if($livc[9]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc6a" <?php if($edit==1){if($livc[10]=="1"){echo "checked='checked'";}}?>>Refrigerator</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc6b" value="0" <?php if($edit==1){if($livc[11]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc6b" value="1" <?php if($edit==1){if($livc[11]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc7a" <?php if($edit==1){if($livc[12]=="1"){echo "checked='checked'";}}?>>Satellite/Cable TV</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc7b" value="0" <?php if($edit==1){if($livc[13]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc7b" value="1" <?php if($edit==1){if($livc[13]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc8a" <?php if($edit==1){if($livc[14]=="1"){echo "checked='checked'";}}?>>Washing machine</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc8b" value="0" <?php if($edit==1){if($livc[15]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc8b" value="1" <?php if($edit==1){if($livc[15]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc9a" <?php if($edit==1){if($livc[16]=="1"){echo "checked='checked'";}}?>>Computer</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc9b" value="0" <?php if($edit==1){if($livc[17]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc9b" value="1" <?php if($edit==1){if($livc[17]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc10a" <?php if($edit==1){if($livc[18]=="1"){echo "checked='checked'";}}?>>Internet connection</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc10b" value="0" <?php if($edit==1){if($livc[19]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc10b" value="1" <?php if($edit==1){if($livc[19]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
	<tr>
		<td valign="top"><b><input disabled type="checkbox" id="livc11a" <?php if($edit==1){if($livc[20]=="1"){echo "checked='checked'";}}?>>Kitchen Utensils</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc11b" value="0" <?php if($edit==1){if($livc[21]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc11b" value="1" <?php if($edit==1){if($livc[21]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>

		<td valign="top"><b><input disabled type="checkbox" id="livc12a" <?php if($edit==1){if($livc[22]=="1"){echo "checked='checked'";}}?>>Other</b></td>
		<td valign="top"><b><input disabled type="radio" name="livc12b" value="0" <?php if($edit==1){if($livc[23]=="0"){echo "checked='checked'";}}?>> Private</b>
			<b><input disabled type="radio" name="livc12b" value="1" <?php if($edit==1){if($livc[23]=="1"){echo "checked='checked'";}}?>> House owner</b>
		</td>
	</tr>
</table>

<b>d). Security & Safety</b>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<b><input disabled type="checkbox" id="livd1" <?php if($edit==1){if($livd[0]=="1"){echo "checked='checked'";}}?>>Fenced Accommodation</b><br>
			<b><input disabled type="checkbox" id="livd2" <?php if($edit==1){if($livd[1]=="1"){echo "checked='checked'";}}?>>Secured Gate(s)</b><br>
			<b><input disabled type="checkbox" id="livd3" <?php if($edit==1){if($livd[2]=="1"){echo "checked='checked'";}}?>>Health Facilities </b><br>
			<b><input disabled type="checkbox" id="livd4" <?php if($edit==1){if($livd[3]=="1"){echo "checked='checked'";}}?>>Police station access</b><br>
		</td><td valign="top">
			<b><input disabled type="checkbox" id="livd5" <?php if($edit==1){if($livd[4]=="1"){echo "checked='checked'";}}?>>Secured Doors & Windows</b><br>
			<b><input disabled type="checkbox" id="livd6" <?php if($edit==1){if($livd[5]=="1"){echo "checked='checked'";}}?>>Multiple Entry/Exit points in the building</b><br>
			<b><input disabled type="checkbox" id="livd7" <?php if($edit==1){if($livd[6]=="1"){echo "checked='checked'";}}?>>Fire Extinguisher</b>
		</td>
	</tr>
	<tr>
		<td valign="top" colspan="2">
			<Label>Remarks:</Label><br>
			<?php if($edit==1){echo $livd[7];}?>
		</td>
	</tr>
</table>

<b>e). Documentation & Security</b>
<table class="table table-bordered">
	<tr>
		<td valign="top">
			<b>Suggested Questions</b><br>
			<?php if($edit==1){echo $live[0];} ?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b><input disabled type="checkbox" id="live2" <?php if($edit==1){if($live[1]==1){echo "checked='checked'";}}?>>Registered to neighbourhood/local authorities </b><br>
			<b><input disabled type="checkbox" id="live3" <?php if($edit==1){if($live[2]==1){echo "checked='checked'";}}?>>Attestation Letter</b><br>
			<b><input disabled type="checkbox" id="live4" <?php if($edit==1){if($live[3]==1){echo "checked='checked'";}}?>>Valid Passports and/or other recognized travel documents</b>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<Label>Remarks:</Label><br>
			<?php if($edit==1){echo $live[4];} ?>
		</td>
	</tr>
</table>


<h5>Financial Situation and Supporting System</h5>
<table class="table table-bordered" >
	<tr>
		<td valign="top" colspan="4">
			<b>How the child survived from Date of Arrival to the date of Assessment</b><br>
			<?php if($edit==1){echo $fin[0];}?>
		</td>
	</tr>
	<tr>
		<td valign="top" width="200px"><b>Expenses </b></td>
		<td valign="top"width="160px">Amount (weekly in IDR): <br><b><?php if($edit==1){echo $fin[1];}?></b></td>
		<td valign="top" >
			<b>Remarks:</b><br>
			<?php if($edit==1){echo $fin[2];}?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<b>Resources </b><br>
			<b><input disabled type="checkbox" id="fin4" <?php if($edit==1){if($fin[3]){echo "checked='checked'";}}?>> Personal income</b><br>
			<b><input disabled type="checkbox" id="fin5" <?php if($edit==1){if($fin[4]){echo "checked='checked'";}}?>> CWS</b><br>
			<b><input disabled type="checkbox" id="fin6" <?php if($edit==1){if($fin[5]){echo "checked='checked'";}}?>> Employment Situationr</b><br>
			<b><input disabled type="checkbox" id="fin7" <?php if($edit==1){if($fin[6]){echo "checked='checked'";}}?>> Family abroad (where?)</b><br>
			<b><input disabled type="checkbox" id="fin8" <?php if($edit==1){if($fin[7]){echo "checked='checked'";}}?>> Assistance received (from?)</b><br>
			<b><input disabled type="checkbox" id="fin9" <?php if($edit==1){if($fin[8]){echo "checked='checked'";}}?>> Government</b><br>
			<b><input disabled type="checkbox" id="fin10" <?php if($edit==1){if($fin[9]){echo "checked='checked'";}}?>> Other</b><br>
		</td>
		<td valign="top">Amount (weekly in IDR): <br><b><?php if($edit==1){echo $fin[10];}?></b></td>
		<td valign="top">
			<b>Remarks</b><br>
			<?php if($edit==1){echo $fin[11];}?>
		</td>
	</tr>

</table>


<h5>CWS - Analysis of information & conclusions by Caseworker</h5>
<table class="table table-bordered" >
	<tr>
		<td colspan="3">
			<b>Children at risk : Risk rating </b>
			<div class="well well-sm">
				<b>Instructions</b>
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
				<b><input disabled type="radio" name="cws1" value="L" <?php if($edit==1){if($cws[0]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws1" value="M" <?php if($edit==1){if($cws[0]=="M"){echo "checked='checked'";}}?>> M</b>
				<b ><input disabled type="radio" name="cws1" value="H" <?php if($edit==1){if($cws[0]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[1];}?></td>
	</tr>
	<tr>
		<td valign="top">Girl at risk</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws2" value="L" <?php if($edit==1){if($cws[2]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws2" value="M" <?php if($edit==1){if($cws[2]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws2" value="H" <?php if($edit==1){if($cws[3]=="H"){echo "checked='checked'";}}?>> H</b>
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
				<b><input disabled type="radio" name="cws3" value="L" <?php if($edit==1){if($cws[4]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws3" value="M" <?php if($edit==1){if($cws[4]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws3" value="H" <?php if($edit==1){if($cws[4]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[5];}?></td>
	</tr>
	<tr>
		<td valign="top">RSD </td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws4" value="L" <?php if($edit==1){if($cws[6]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws4" value="M" <?php if($edit==1){if($cws[6]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws4" value="H" <?php if($edit==1){if($cws[6]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[7];}?></td>
	</tr>
	<tr>
		<td valign="top">Basic needs <br><small>(food, water)</small> </td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws5" value="L" <?php if($edit==1){if($cws[8]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws5" value="M" <?php if($edit==1){if($cws[8]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws5" value="H" <?php if($edit==1){if($cws[8]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[9];}?></td>
	</tr>
	<tr>
		<td valign="top">Education</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws6" value="L" <?php if($edit==1){if($cws[10]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws6" value="M" <?php if($edit==1){if($cws[10]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws6" value="H" <?php if($edit==1){if($cws[10]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[11];}?></td>
	</tr>
	<tr>
		<td valign="top">SGBVs</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws7" value="L" <?php if($edit==1){if($cws[12]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws7" value="M" <?php if($edit==1){if($cws[12]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws7" value="H" <?php if($edit==1){if($cws[12]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[13];}?></td>
	</tr>
	<tr>
		<td valign="top">Medical assitance</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws8" value="L" <?php if($edit==1){if($cws[14]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws8" value="M" <?php if($edit==1){if($cws[14]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws8" value="H" <?php if($edit==1){if($cws[14]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[15];}?></td>
	</tr>
	<tr>
		<td valign="top">Psychosocial</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws9" value="L" <?php if($edit==1){if($cws[16]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws9" value="M" <?php if($edit==1){if($cws[16]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws9" value="H" <?php if($edit==1){if($cws[16]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[17];}?></td>
	</tr>
	<tr>
		<td valign="top">Material assitance <br><small>(shelter, NFI, financial)</small></td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws10" value="L" <?php if($edit==1){if($cws[18]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws10" value="M" <?php if($edit==1){if($cws[18]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws10" value="H" <?php if($edit==1){if($cws[18]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[19];}?></td>
	</tr>
	<tr>
		<td valign="top">Recreational activities / Community activities</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws11" value="L" <?php if($edit==1){if($cws[20]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws11" value="M" <?php if($edit==1){if($cws[20]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws11" value="H" <?php if($edit==1){if($cws[20]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[21];}?></td>
	</tr>
	<tr>
		<td valign="top">Regular Home visits</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws12" value="L" <?php if($edit==1){if($cws[22]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws12" value="M" <?php if($edit==1){if($cws[22]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws12" value="H" <?php if($edit==1){if($cws[22]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[23];}?></td>
	</tr>
	<tr>
		<td valign="top">Family tracing</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws13" value="L" <?php if($edit==1){if($cws[24]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws13" value="M" <?php if($edit==1){if($cws[24]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws13" value="H" <?php if($edit==1){if($cws[24]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[25];}?></td>
	</tr>
	<tr>
		<td valign="top">Durable solution</td>
		<td valign="top">
			<div class="checkbox">
				<b><input disabled type="radio" name="cws14" value="L" <?php if($edit==1){if($cws[26]=="L"){echo "checked='checked'";}}?>> L</b>
				<b><input disabled type="radio" name="cws14" value="M" <?php if($edit==1){if($cws[26]=="M"){echo "checked='checked'";}}?>> M</b>
				<b><input disabled type="radio" name="cws14" value="H" <?php if($edit==1){if($cws[26]=="H"){echo "checked='checked'";}}?>> H</b>
			</div>
		</td>
		<td valign="top"><?php if($edit==1){echo $cws[27];}?></td>
	</tr>
	<tr>
		<td valign="top">Caseworker signature & date</td>
		<td valign="top" colspan="2"><?php if($edit==1){echo $cws[28];}?></td>
	</tr>
</table>


<h5>Optional</h5>
<table class="table table-bordered">
	<tr>
		<td><b>UNHCR</b><br><small>Child Protection officer or <br>Community Services -  Follow up <br>& Conclusions</small></td>
		<td>Conclusions: <br><?php if($edit==1){echo $opt[0];}?> </td>
		<td>CSO or CP name & date: <br><?php if($edit==1){echo $opt[1];}?> </td>
	</tr>
	<tr>
		<td><b>Panel conclusion</b><br><small>(Optional –for complicated cases,<br> only if necessary)</small></td>
		<td>Final conclusions: <br><?php if($edit==1){echo $opt[2];}?></td>
		<td>CSO or CP name & date: <br><?php if($edit==1){echo $opt[3];}?></td>
	</tr>
</table>

<?php
		// comment
		echo '<b>Comment:</b>'; echo '<p style="margin-left:20px;">'.Balikin($data['comment']).'</p>';
		echo '<div class="page-break"></div>';
		//== panel
		if(empty($_GET['a'])){
			$link =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."&a=hide";
			$file = "BIA_".$data['file_no']."_".$data['doa'];
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
		echo "No data BIA for File Number: ".$_GET['file_no'];
		echo '<div class="page-break"></div>';
	}
}

if(empty($_GET['a'])){
	echo'</body>
</html>';
}
?>

