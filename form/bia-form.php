<?php 
$R="R8";$W="W8";
include("form/navigasi.php");
if(isset($_GET['op'])){
	if(isset($_GET['file_no'])){
		$file_no = $_GET['file_no'];
		$qry = mysql_query("SELECT * FROM `bia` WHERE `file_no`='".$_GET['file_no']."' AND `status`='1'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
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
		
		$button = '<button class="btn btn-success" id="update_1"><i class="fa fa-refresh"></i> Update</button>';
		$edit = 1;
		
		setHistory($_SESSION['user_id'],"bia_form","Open BIA Form for File no [$file_no] ",$NOW);
	}
}
else{
		$button = '<button class="btn btn-success" id="save_1"><i class="fa fa-save"></i> Save</button>';
		$edit = 0;
		setHistory($_SESSION['user_id'],"bia_form","Open BIA form",$NOW);
}
?>
<script src="form/bia.js"></script>
<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
<div class="col-lg-12"><h3 class="page-header">Best Interest Assessment Report for Temporary Care</h3></div>
<div class=" row col-lg-12">
	<div class="panel-group" id="accordion">
		<!-- date assessment -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseDate">Date of Assessment</a>
			</h4>
		</div>
		<div id="collapseDate" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label>File No: <span  id="a"></span> </label>
					<input class="form-control" id="file_no" <?php if($edit==1){echo 'value="'.$data['file_no'].'" disabled';}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of Assessment: </label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="date_assessment" placeholder="yyyy-mm-dd" <?php if($edit==1){echo 'value="'.$data['doa'].'"';}?>><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Location</label>
					<input class="form-control" id="location_assessment" <?php if($edit==1){echo 'value="'.$assessment[0].'" ';}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Case Worker</label>
					<input class="form-control" id="case_worker" <?php if($edit==1){echo 'value="'.$assessment[1].'" ';}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Organization</label>
					<input class="form-control" id="org" <?php if($edit==1){echo 'value="'.$assessment[2].'" ';}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interpreter name & organization</label>
					<input class="form-control" id="inorg" <?php if($edit==1){echo 'value="'.$assessment[3].'" ';}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Identification of child</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  value="UNHCR" <?php if($edit==1){if($assessment[4]=="UNHCR"){echo"checked";}  } ?>>UNHCR</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  value="CWS" <?php if($edit==1){if($assessment[4]=="CWS"){echo"checked";}  } ?>>CWS</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  value="other" id="other" <?php if($edit==1){if($assessment[4]=="other"){echo"checked";}  } ?>>Other</label>
					<input class="form-control" style="padding:5px;height:25px;width:150px;" placeholder="(Name, if other)" id="others" <?php if($edit==1){if($assessment[4]=="other"){echo 'value="'.$assessment[5].'" ';}}?>>
					<br><?php echo $button;?>
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- Personal history  ( Background(Brief history describing hardships or trauma experienced)) -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapsePersonal">Personal history</a><br><small>( Background(Brief history describing hardships or trauma experienced))</small>
			</h4>
		</div>
		<div id="collapsePersonal" class="panel-collapse collapse ">
		<div class="panel-body">
			<ol>
				<li>
					<label>In the Country of Origin</label>
					<textarea class="form-control" rows="7" id="person1"><?php if($edit==1){echo $data['ph1']; } ?></textarea>
				</li>
				<li>
					<label>During the flight</label>
					<textarea class="form-control" rows="15" id="person2"><?php if($edit==1){echo $data['ph2']; } ?></textarea>
				</li>
				<li>
					<label>In the country of Asylum</label>
					<textarea class="form-control" rows="7" id="person3"><?php if($edit==1){echo $data['ph3']; } ?></textarea>
				</li>
			</ol>
			<br><small id="thistory"></small><br><button class="btn btn-success" id="save_2"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Types of identified vulnerabilities -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseIdentified">Types of identified vulnerabilities</a></h4>
		</div>
		<div id="collapseIdentified" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="well well-small panel-green">
				<label style="text-decoration:underline;">Instruction</label>
			<p>Please Tick (<input type="checkbox" checked>) as appropriate - <span class="text-danger">Tick the one or several corresponding vulnerabilities</span>
<br><br>Staff may complete this section in the absence of the person of concern, based on the staff’s record of information previously collected in the personal study.
<i><br>(CoO: Country of origin; CoA: Country of Asylum)</i></p>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<td width="300px"><label>1. Child at risk of deportation</label></td>
						<td width="200px">
							<label><input type="checkbox" id="toiva1a" <?php if($edit==1){if($toiva1[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva1b" <?php if($edit==1){if($toiva1[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva1c" <?php if($edit==1){if($toiva1[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva1d"><?php if($edit==1){echo $toiva1[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>2. Child without legal documentation</label></td>
						<td>
							<label><input type="checkbox" id="toiva2a" <?php if($edit==1){if($toiva2[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva2b" <?php if($edit==1){if($toiva2[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva2c" <?php if($edit==1){if($toiva2[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva2d"><?php if($edit==1){echo $toiva2[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>3. Street Children</label></td>
						<td>
							<label><input type="checkbox" id="toiva3a" <?php if($edit==1){if($toiva3[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva3b" <?php if($edit==1){if($toiva3[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva3c" <?php if($edit==1){if($toiva3[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva3d"><?php if($edit==1){echo $toiva3[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>4. Medical Case</label></td>
						<td>
							<label><input type="checkbox" id="toiva4a" <?php if($edit==1){if($toiva4[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva4b" <?php if($edit==1){if($toiva4[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva4c" <?php if($edit==1){if($toiva4[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva4d"><?php if($edit==1){echo $toiva4[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>5. Disabled child</label></td>
						<td>
							<label><input type="checkbox" id="toiva5a" <?php if($edit==1){if($toiva5[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva5b" <?php if($edit==1){if($toiva5[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva5c" <?php if($edit==1){if($toiva5[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva5d"><?php if($edit==1){echo $toiva5[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>6. Victim of violence</label></td>
						<td>
							<label><input type="checkbox" id="toiva6a" <?php if($edit==1){if($toiva6[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva6b" <?php if($edit==1){if($toiva6[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva6c" <?php if($edit==1){if($toiva6[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva6d"><?php if($edit==1){echo $toiva6[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>7. Victim of sexual violence</label></td>
						<td>
							<label><input type="checkbox" id="toiva7a" <?php if($edit==1){if($toiva7[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva7b" <?php if($edit==1){if($toiva7[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva7c" <?php if($edit==1){if($toiva7[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva7d"><?php if($edit==1){echo $toiva7[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>8. Victim of trafficking</label></td>
						<td>
							<label><input type="checkbox" id="toiva8a" <?php if($edit==1){if($toiva8[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva8b" <?php if($edit==1){if($toiva8[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva8c" <?php if($edit==1){if($toiva8[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva8d"><?php if($edit==1){echo $toiva8[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>9. Victim of Child Labour</label></td>
						<td>
							<label><input type="checkbox" id="toiva9a" <?php if($edit==1){if($toiva9[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva9b" <?php if($edit==1){if($toiva9[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva9c" <?php if($edit==1){if($toiva9[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva9d"><?php if($edit==1){echo $toiva9[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>10. Victim of forced Labour</label></td>
						<td>
							<label><input type="checkbox" id="toiva10a" <?php if($edit==1){if($toiva10[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva10b" <?php if($edit==1){if($toiva10[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva10c" <?php if($edit==1){if($toiva10[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva10d"><?php if($edit==1){echo $toiva10[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>11. Victim of exploitation</label></td>
						<td>
							<label><input type="checkbox" id="toiva11a" <?php if($edit==1){if($toiva11[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva11b" <?php if($edit==1){if($toiva11[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva11c" <?php if($edit==1){if($toiva11[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva11d"><?php if($edit==1){echo $toiva11[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>12. Victim of prostitution</label></td>
						<td>
							<label><input type="checkbox" id="toiva12a" <?php if($edit==1){if($toiva12[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva12b" <?php if($edit==1){if($toiva12[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva12c" <?php if($edit==1){if($toiva12[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva12d"><?php if($edit==1){echo $toiva12[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>13. Minor victim used or recruited by smugglers</label></td>
						<td>
							<label><input type="checkbox" id="toiva13a" <?php if($edit==1){if($toiva13[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva13b" <?php if($edit==1){if($toiva13[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva13c" <?php if($edit==1){if($toiva13[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva13d"><?php if($edit==1){echo $toiva13[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>14. Minor in conflict with the Law</label></td>
						<td>
							<label><input type="checkbox" id="toiva14a" <?php if($edit==1){if($toiva14[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva14b" <?php if($edit==1){if($toiva14[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva14c" <?php if($edit==1){if($toiva14[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva14d"><?php if($edit==1){echo $toiva14[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>15. In hiding <small>(e.g. fear of being identified or found)</small></label></td>
						<td>
							<label><input type="checkbox" id="toiva15a" <?php if($edit==1){if($toiva15[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva15b" <?php if($edit==1){if($toiva15[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva15c" <?php if($edit==1){if($toiva15[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva15d"><?php if($edit==1){echo $toiva15[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>16. Experiencing rejection by community</label></td>
						<td>
							<label><input type="checkbox" id="toiva16a" <?php if($edit==1){if($toiva16[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva16b" <?php if($edit==1){if($toiva16[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva16c" <?php if($edit==1){if($toiva16[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva16d"><?php if($edit==1){echo $toiva16[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>17. Bodily injured</label></td>
						<td>
							<label><input type="checkbox" id="toiva17a" <?php if($edit==1){if($toiva17[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva17b" <?php if($edit==1){if($toiva17[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva17c" <?php if($edit==1){if($toiva17[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva17d"><?php if($edit==1){echo $toiva17[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>18. Victim of severe beatings</label></td>
						<td>
							<label><input type="checkbox" id="toiva18a" <?php if($edit==1){if($toiva18[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva18b" <?php if($edit==1){if($toiva18[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva18c" <?php if($edit==1){if($toiva18[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva18d"><?php if($edit==1){echo $toiva18[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>19. Lack of basic needs <small>(food, water, shelter)</small></label></td>
						<td>
							<label><input type="checkbox" id="toiva19a" <?php if($edit==1){if($toiva19[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva19b" <?php if($edit==1){if($toiva19[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva19c" <?php if($edit==1){if($toiva19[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva19d"><?php if($edit==1){echo $toiva19[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>20. Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" id="toiva20a" <?php if($edit==1){if($toiva20[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva20b" <?php if($edit==1){if($toiva20[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva20c" <?php if($edit==1){if($toiva20[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva20d"><?php if($edit==1){echo $toiva20[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>21. Unsafe in community <br><small>(a.g. abuse by family or community, domestic violence)</small></label></td>
						<td>
							<label><input type="checkbox" id="toiva21a" <?php if($edit==1){if($toiva21[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva21b" <?php if($edit==1){if($toiva21[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva21c" <?php if($edit==1){if($toiva21[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva21d"><?php if($edit==1){echo $toiva21[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>22. Other <small>(explain)</small></label></td>
						<td>
							<label><input type="checkbox" id="toiva22a" <?php if($edit==1){if($toiva22[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toiva22b" <?php if($edit==1){if($toiva22[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toiva22c" <?php if($edit==1){if($toiva22[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiva22d"><?php if($edit==1){echo $toiva22[3];}?></textarea></td>
					</tr>
					<tr><td colspan="3"><small id="ttoiva"></small></td></tr>
			</table>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<tr>
						<td colspan="3" class="info" ><p>Special attention: Girls at risk <small>(can be cumulated with previous section)</small></p></td>
					</tr>
					<tr>
						<td><label>1. Girl without protection</label></td>
						<td>
							<label><input type="checkbox" id="toivb1a" <?php if($edit==1){if($toivb1[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb1b" <?php if($edit==1){if($toivb1[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb1c" <?php if($edit==1){if($toivb1[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb1d" ><?php if($edit==1){echo $toivb1[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>2. Pregnant girl</label></td>
						<td>
							<label><input type="checkbox" id="toivb2a" <?php if($edit==1){if($toivb2[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb2b" <?php if($edit==1){if($toivb2[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb2c" <?php if($edit==1){if($toivb2[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb2d" ><?php if($edit==1){echo $toivb2[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>3. Adolescent parent</label></td>
						<td>
							<label><input type="checkbox" id="toivb3a" <?php if($edit==1){if($toivb3[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb3b" <?php if($edit==1){if($toivb3[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb3c" <?php if($edit==1){if($toivb3[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb3d" ><?php if($edit==1){echo $toivb3[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>4. Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" id="toivb4a" <?php if($edit==1){if($toivb4[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb4b" <?php if($edit==1){if($toivb4[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb4c" <?php if($edit==1){if($toivb4[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb4d" ><?php if($edit==1){echo $toivb4[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>5. Engaging in survival sex</label></td>
						<td>
							<label><input type="checkbox" id="toivb5a" <?php if($edit==1){if($toivb5[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb5b" <?php if($edit==1){if($toivb5[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb5c" <?php if($edit==1){if($toivb5[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb5d" ><?php if($edit==1){echo $toivb5[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>6. Other forms of GBVs</label></td>
						<td>
							<label><input type="checkbox" id="toivb6a" <?php if($edit==1){if($toivb6[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb6b" <?php if($edit==1){if($toivb6[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb6c" <?php if($edit==1){if($toivb6[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb6d" ><?php if($edit==1){echo $toivb6[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>7. Victim of forced marriage</label></td>
						<td>
							<label><input type="checkbox" id="toivb7a" <?php if($edit==1){if($toivb7[0]=="1"){echo "checked";}}?>> CoO</label>
							<label><input type="checkbox" id="toivb7b" <?php if($edit==1){if($toivb7[1]=="1"){echo "checked";}}?>> During flight </label>
							<label><input type="checkbox" id="toivb7c" <?php if($edit==1){if($toivb7[2]=="1"){echo "checked";}}?>> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toivb7d" ><?php if($edit==1){echo $toivb7[3];}?></textarea></td>
					</tr>
					<tr><td colspan="3"><small id="ttoivb"></small></td></tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_3"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Education -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseEdu"> Education</a>
			</h4>
		</div>
		<div id="collapseEdu" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td><label>Suggested questions</label></td>
						<td><label>*Did you go to school prior to the separation?</label>
							<textarea class="form-control" id="edu1"><?php if($edit==1){echo $edu[0];}?></textarea>
							<br>
							<label>	*Do you like to go to school?</label>
							<textarea class="form-control" id="edu2"><?php if($edit==1){echo $edu[1];}?></textarea>
							<br>
							<label>	*How do you spend your time? What do you like to do? <small>(Language, Computer, etc.)</small> </label>
							<textarea class="form-control" id="edu3"><?php if($edit==1){echo $edu[2];}?></textarea>
							<br>
							<label>	Observations</label>
							<textarea class="form-control" id="edu4"><?php if($edit==1){echo $edu[3];}?></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Level of education / grade</label></td>
						<td><textarea class="form-control" id="edu5"><?php if($edit==1){echo $edu[4];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Skills & Occupation</label></td>
						<td><textarea class="form-control" id="edu6"><?php if($edit==1){echo $edu[5];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Previous occupation, if any</label></td>
						<td><textarea class="form-control" id="edu7"><?php if($edit==1){echo $edu[6];}?></textarea></td>
					</tr>
				</table>
			</div>
			<br><button class="btn btn-success" id="save_4"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Health  -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseHealth"> Health </a>
			</h4>
		</div>
		<div id="collapseHealth" class="panel-collapse collapse ">
		<div class="panel-body">
			<div class="well well-sm panel-green">
				Medical assessment - Health Condition
				<br><i>(Note: All medically‑at‑risk cases require an up‑dated medical report)</i>
				<br><span class="text-danger">Please Tick (<input type="checkbox" checked>) as appropriate</span>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td colspan="3">
							<label>Suggested questions:</label>
							<textarea class="form-control" id="health1"><?php if($edit==1){echo $health[0];}?></textarea>
							<label>Observation:</label>
							<textarea class="form-control" id="health2"><?php if($edit==1){echo $health[1];}?></textarea>
						</td>
					</tr>
					<tr>
						<td width="300px">
							<Label>Whether medical attention is being</Label><br>
							<label class="checkbox-inline"><input type="radio" value="0" name="health3" <?php if($edit==1){if($health[2]=="0"){echo "checked";}}?>> Received</label>
							<label class="checkbox-inline"><input type="radio" value="1" name="health3" <?php if($edit==1){if($health[2]=="1"){echo "checked";}}?>> Required</label>
						</td>
						<td colspan="2">
							<label>Observation:</label>
							<textarea class="form-control" id="health4"><?php if($edit==1){echo $health[3];}?></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Physical Health problems</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health5a" <?php if($edit==1){if($health[4]=="1"){echo "checked";}}?>> Past history </label><br>
							<label><input type="checkbox" id="health5b" <?php if($edit==1){if($health[5]=="1"){echo "checked";}}?>> During flight </label><br>
							<label><input type="checkbox" id="health5c" <?php if($edit==1){if($health[6]=="1"){echo "checked";}}?>> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health5d"><?php if($edit==1){echo $health[7];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Child with HIV/AIDS</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health6a" <?php if($edit==1){if($health[8]=="1"){echo "checked";}}?>> Past history </label><br>
							<label><input type="checkbox" id="health6b" <?php if($edit==1){if($health[9]=="1"){echo "checked";}}?>> During flight </label><br>
							<label><input type="checkbox" id="health6c" <?php if($edit==1){if($health[10]=="1"){echo "checked";}}?>> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health6d"><?php if($edit==1){echo $health[11];}?></textarea></td>
							
					</tr>
					<tr>
						<td><label>Addictions <i>(Drugs, alcohol, etc.)</i></label></td>
						<td width="200px">
							<label><input type="checkbox" id="health7a" <?php if($edit==1){if($health[12]=="1"){echo "checked";}}?>> Past history </label><br>
							<label><input type="checkbox" id="health7b" <?php if($edit==1){if($health[13]=="1"){echo "checked";}}?>> During flight </label><br>
							<label><input type="checkbox" id="health7c" <?php if($edit==1){if($health[14]=="1"){echo "checked";}}?>> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health7d"><?php if($edit==1){echo $health[15];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Hearing impairment</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health8a" <?php if($edit==1){if($health[16]=="1"){echo "checked";}}?>> Past history </label><br>
							<label><input type="checkbox" id="health8b" <?php if($edit==1){if($health[17]=="1"){echo "checked";}}?>> During flight </label><br>
							<label><input type="checkbox" id="health8c" <?php if($edit==1){if($health[18]=="1"){echo "checked";}}?>> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health8d"><?php if($edit==1){echo $health[19];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Mental disability</label></td>
						<td style="max-width:200px;">
							<label><input type="checkbox" id="health9a" <?php if($edit==1){if($health[20]=="1"){echo "checked";}}?>> Past history </label><br>
							<label><input type="checkbox" id="health9b" <?php if($edit==1){if($health[21]=="1"){echo "checked";}}?>> During flight </label><br>
							<label><input type="checkbox" id="health9c" <?php if($edit==1){if($health[22]=="1"){echo "checked";}}?>> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health9d"><?php if($edit==1){echo $health[23];}?></textarea></td>
					</tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_5"><i class="fa fa-save"></i> Save</button>			
		</div>
		</div>
		</div>
		<!-- Psychosocial conditions    (This part can be filled by Psychosocial workers) -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapsePsy"> Psychosocial conditions</a><br> <small class="text-danger">(This part can be filled by Psychosocial workers)</small>
			</h4>
		</div>
		<div id="collapsePsy" class="panel-collapse collapse ">
		<div class="panel-body">
			<div class="well well-sm ">
				<label style="text-decoration:underline;">Instruction</label><br>
				<ul>
					<li>Once possible risk categories are identified, staff should check the relevant indicators below. The check boxes in the risk categories allow staff to specify whether the trauma, hardships or conditions happened in the past or the present and whether they apply to the person of concern.  Trauma, hardships or conditions that have occurred in the recent past or have a high probability of occurring in the near future should be recorded as present risk.</li>
					<li>Alternatively, staff may complete this section in the absence of the person of concern, based on the staff’s knowledge and record of information previously collected.</li>
					<li>If staff does not feel comfortable or unqualified for the question, please refer the questionnaire to Psychosocial workers</li>
				</ul>
			</div>
			<div class="col-lg-4">
				<label>Date of Face-to-Face interview</label><br>
				<i>(If different from BIA date)</i>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="psy1" value="<?php if($edit==1){echo $psy[0];}?>" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-12"></div><br>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td width="200px" rowspan="4"><br><br><br><b>Social Resources </b></td>
						<td width="300px"><label>Is the Child able to form and maintain relationships with family/friends?</label></td>
						<td><textarea class="form-control" id="psy2"><?php if($edit==1){echo $psy[1];}?></textarea></td>
					</tr>
					<tr>
						<td><label>What are the Child’s favorite activities?</label></td>
						<td><textarea class="form-control" id="psy3"><?php if($edit==1){echo $psy[2];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Hobbies & interests</label></td>
						<td><textarea class="form-control" id="psy4"><?php if($edit==1){echo $psy[3];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Daily Activities - How child occupy himself daily?</label></td>
						<td><textarea class="form-control" id="psy5"><?php if($edit==1){echo $psy[4];}?></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you feel healthy?</label><br><i> If not, please, explain type of sickness/how you feel physically.</i> </td>
						<td><textarea class="form-control" id="psy6"><?php if($edit==1){echo $psy[5];}?></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you have access to medical care?</label><br><i>If not, explain why?</i> </td>
						<td><textarea class="form-control" id="psy7"><?php if($edit==1){echo $psy[6];}?></textarea></td>
					</tr>
					
				</table>
				<table class="table table-bordered">
					<tr>
						<td colspan="3" class="info"><label>Mental status assessment</label><i> (Describe any deviation from the norm under each category)</i>   <span class="text-danger">Please Tick (<input type="checkbox" checked>) as appropriate</span></td>
					</tr>
					<tr><td colspan="3" ></td></tr>
					<tr class="success">
						<th>Psychosocial symptoms & problems </th>
						<th>Frequency</th>
						<th>Observations</th>
					</tr>
					<tr>
						<td width="300px"><label>Eating problem</label><br><i> (characterized by a compulsion to overeat or avoiding food)</i></td>
						<td width="30px">
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy8a" value="1" <?php if($edit==1){if($psy[7]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy8a" value="0" <?php if($edit==1){if($psy[7]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy8b"><?php if($edit==1){echo $psy[8];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Depressed</label><br><p><i>(a person experiences deep, unshakable sadness and diminished interest in nearly all activities)</i></p></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy9a" value="1" <?php if($edit==1){if($psy[9]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy9a" value="0" <?php if($edit==1){if($psy[9]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy9b"><?php if($edit==1){echo $psy[10];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Sleeping disturbance</label><br><i>(Any condition that interferes with sleep)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy10a" value="1" <?php if($edit==1){if($psy[11]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy10a" value="0" <?php if($edit==1){if($psy[11]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy10b"><?php if($edit==1){echo $psy[12];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Easily get angry</label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy11a" value="1" <?php if($edit==1){if($psy[13]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy11a" value="0" <?php if($edit==1){if($psy[13]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy11b"><?php if($edit==1){echo $psy[14];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Confused </label><br><i>(disoriented mentally; being unable to think with clarity or act with understanding and intelligence)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy12a" value="1" <?php if($edit==1){if($psy[15]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy12a" value="0" <?php if($edit==1){if($psy[15]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy12b"><?php if($edit==1){echo $psy[16];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of concentration </label><br><i>(inability to direct one's thinking in whatever direction one would intend))</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy13a" value="1" <?php if($edit==1){if($psy[17]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy13a" value="0" <?php if($edit==1){if($psy[17]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy13b"><?php if($edit==1){echo $psy[18];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling hopeless</label><br><i>(without hope; despairing)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy14a" value="1" <?php if($edit==1){if($psy[19]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy14a" value="0" <?php if($edit==1){if($psy[19]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy14b"><?php if($edit==1){echo $psy[20];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling unworthy </label><br><i>(his/her sense of meaning is undermined)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy15a" value="1" <?php if($edit==1){if($psy[21]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy15a" value="0" <?php if($edit==1){if($psy[21]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy15b"><?php if($edit==1){echo $psy[22];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of trust to others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy16a" value="1" <?php if($edit==1){if($psy[23]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy16a" value="0" <?php if($edit==1){if($psy[23]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy16b"><?php if($edit==1){echo $psy[24];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Deprived from community/others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy17a" value="1" <?php if($edit==1){if($psy[25]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy17a" value="0" <?php if($edit==1){if($psy[25]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy17b"><?php if($edit==1){echo $psy[26];}?></textarea></td>
					</tr>
					<tr>
						<td><label>Coping Mechanism </label><br><i>(an adaptation to environmental stress that is based on conscious or unconscious choice and that enhances control over behaviour or gives psychological comfort)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy18a" value="1" <?php if($edit==1){if($psy[27]=="1"){echo "checked";}}?>> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy18a" value="0" <?php if($edit==1){if($psy[27]=="0"){echo "checked";}}?>> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy18b"><?php if($edit==1){echo $psy[28];}?></textarea></td>
					</tr>
				</table>
			</div>
			<br><button class="btn btn-success" id="save_6"><i class="fa fa-save"></i> Save</button>			
			</div>	
			
		</div>
		</div>
		</div>
		<!-- INTERACTION -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseInteraction">INTERACTION </a><small> with the person during the interview</small><br><small><i></i>Simple Description of the Child AS or refugee as he appears - (describe what you see; highlight the positive, not just the negative; Avoid labels.)</small>
			</h4>
		</div>
		<div id="collapseInteraction" class="panel-collapse collapse  ">
		<div class="panel-body">
			
			<div class="form-group">
				<label>Mood, attitude, appearance, speech, affect, thought consent</label>
				<textarea class="form-control" id="interaction" rows="5"><?php if($edit==1){echo $data['interaction'];}?></textarea>
			</div>
			
			<br><button class="btn btn-success" id="save_7"><i class="fa fa-save"></i> Save</button>	
			
		</div>
		</div>
		</div>
		<!-- Living conditions in place of residence -->
		<div class="panel panel-default">
		<div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseLiving"> Living conditions in place of residence</a></h4></div>
		<div id="collapseLiving" class="panel-collapse collapse ">
		<div class="panel-body">
			
			<!-- a). Suggested Questions: -->
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col9aa" >a). Suggested Questions:</span></div>
				<div class="panel-body" id="col9ab">
					<div class="form-group">
						<ul>
							<li><p>With whom do you currently live?  <i>(Note names, ages, gender)</i> How long have you been living here?Is there an adult in <i>(name/location in country of asylum)</i> who is looking after you?  <i>If so, note name, relationship, contact information.</i> How did you find this place to stay? How is your relationship with your caretaker and/or housemates? </p>
						<textarea class="form-control"  id="liva1"><?php if($edit==1){echo $liva[0];}?></textarea></li>
							<li><p>Do you like to stay with this family? How often do you eat? Where do you sleep? How do you feel living here? Are you happy here? Do you think you have enough food? If not, please explain. Who prepares the food? Do you have access to clean water? Are appropriate sanitation facilities in place, where you live in? </p>
						<textarea class="form-control" id="liva2"><?php if($edit==1){echo $liva[1];}?></textarea></li>
						</ul>
						<br>
						<small>If the child has already in the shelter, put the situation before living in shelter in this section.</small>
					</div>
					<div class="form-group">
						<label>Responses:</label>
						<textarea class="form-control" id="liva3"><?php if($edit==1){echo $liva[2];}?></textarea>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Type of housing</label><br>
							<label class="radio-inline"><input type="radio" name="liva4" value="CWS" <?php if($edit==1){if($liva[3]=="CWS"){echo "checked";}}?>> CWS</label><br>
							<label class="radio-inline"><input type="radio" name="liva4" value="House" <?php if($edit==1){if($liva[3]=="House"){echo "checked";}}?>> House</label><br>
							<small class="text-danger">(If CWS shelter is tick, no need to fill up part b, c& d)</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Number of Person Living in the Same Room/House</label>
							<textarea class="form-control" id="liva5"><?php if($edit==1){echo $liva[4];}?></textarea>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Neighbourhood/Relationship with around People</label>
							<textarea class="form-control" id="liva6"><?php if($edit==1){echo $liva[5];}?></textarea>
						</div>
						<br><button class="btn btn-success" id="save_living_a"><i class="fa fa-save"></i> Save</button>
					</div>
				
				
				<!-- -->
				</div>
			</div>
			<!-- b). Description of the house -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="collapseme" id="col9ba">b). Description of the house</span>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small></div>
				<div class="panel-body" id="col9bb">
					<div class="col-lg-4">
						<div class="well well-sm"><div class="checkbox">
						<label><input type="checkbox" id="livb1" <?php if($edit==1){if($livb[0]=="1"){echo "checked";}}?>> Bedroom</label> <br>
						<label><input type="checkbox" id="livb2" <?php if($edit==1){if($livb[1]=="1"){echo "checked";}}?>> Bathroom</label><br>
						<label><input type="checkbox" id="livb3" <?php if($edit==1){if($livb[2]=="1"){echo "checked";}}?>> Electricity</label><br>
						<label><input type="checkbox" id="livb4" <?php if($edit==1){if($livb[3]=="1"){echo "checked";}}?>> Guest room</label><br>
						<label><input type="checkbox" id="livb5" <?php if($edit==1){if($livb[4]=="1"){echo "checked";}}?>> Terrace</label><br>
						<label><input type="checkbox" id="livb6" <?php if($edit==1){if($livb[5]=="1"){echo "checked";}}?>> Direct access to public transportation</label><br>
						</div></div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm"><div class="checkbox">
						<label><input type="checkbox" id="livb7" <?php if($edit==1){if($livb[6]=="1"){echo "checked";}}?>> Living room</label><br>
						<label><input type="checkbox" id="livb8" <?php if($edit==1){if($livb[7]=="1"){echo "checked";}}?>> Backyard</label><br>
						<label><input type="checkbox" id="livb9" <?php if($edit==1){if($livb[8]=="1"){echo "checked";}}?>> Dining room</label><br>
						<label><input type="checkbox" id="livb10" <?php if($edit==1){if($livb[9]=="1"){echo "checked";}}?>> Piped Clean & Safe Water</label><br>
						<label><input type="checkbox" id="livb11" <?php if($edit==1){if($livb[10]=="1"){echo "checked";}}?>> Kitchen</label><br>
						<label><input type="checkbox" id="livb12" <?php if($edit==1){if($livb[11]=="1"){echo "checked";}}?>> Dug Well Water</label><br> 
						</div></div>
					</div>
					<div class="col-lg-4">
						<label>Remarks:</label>
						<textarea class="form-control" id="livb13"><?php if($edit==1){echo $livb[12];}?></textarea>
						<br><button class="btn btn-success" id="save_living_b"><i class="fa fa-save"></i> Save</button>
					</div>
					
				</div>
			</div>
			<!-- c). House facilities -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="collapseme" id="col9ca">c). House facilities </span>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small>
				</div>
				<div class="panel-body" id="col9cb">
					<div class="col-lg-6">
						<div class="table-responsive checkbox">
							<table class="table table-bordered">
								<tr>
									<td><label><input type="checkbox" id="livc1a" <?php if($edit==1){if($livc[0]=="1"){echo "checked";}}?>>Fan</label></td>
									<td><label><input type="radio" name="livc1b" value="0" <?php if($edit==1){if($livc[1]=="1"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc1b" value="1" <?php if($edit==1){if($livc[1]=="0"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc2a" <?php if($edit==1){if($livc[2]=="1"){echo "checked";}}?>>TV set</label></td>
									<td><label><input type="radio" name="livc2b" value="0" <?php if($edit==1){if($livc[3]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc2b" value="1" <?php if($edit==1){if($livc[3]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc3a" <?php if($edit==1){if($livc[4]=="1"){echo "checked";}}?>>Telephone (mobile)</label></td>
									<td><label><input type="radio" name="livc3b" value="0" <?php if($edit==1){if($livc[5]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc3b" value="1" <?php if($edit==1){if($livc[5]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc4a" <?php if($edit==1){if($livc[6]=="1"){echo "checked";}}?>>Radio</label></td>
									<td><label><input type="radio" name="livc4b" value="0" <?php if($edit==1){if($livc[7]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc4b" value="1" <?php if($edit==1){if($livc[7]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc5a" <?php if($edit==1){if($livc[8]=="1"){echo "checked";}}?>>Furniture</label></td>
									<td><label><input type="radio" name="livc5b" value="0" <?php if($edit==1){if($livc[9]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc5b" value="1" <?php if($edit==1){if($livc[9]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc6a" <?php if($edit==1){if($livc[10]=="1"){echo "checked";}}?>>Refrigerator</label></td>
									<td><label><input type="radio" name="livc6b" value="0" <?php if($edit==1){if($livc[11]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc6b" value="1" <?php if($edit==1){if($livc[11]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive checkbox">
							<table class="table table-bordered">
								<tr>
									<td><label><input type="checkbox" id="livc7a" <?php if($edit==1){if($livc[12]=="1"){echo "checked";}}?>>Satellite/Cable TV</label></td>
									<td><label><input type="radio" name="livc7b" value="0" <?php if($edit==1){if($livc[13]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc7b" value="1" <?php if($edit==1){if($livc[13]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc8a" <?php if($edit==1){if($livc[14]=="1"){echo "checked";}}?>>Washing machine</label></td>
									<td><label><input type="radio" name="livc8b" value="0" <?php if($edit==1){if($livc[15]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc8b" value="1" <?php if($edit==1){if($livc[15]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc9a" <?php if($edit==1){if($livc[16]=="1"){echo "checked";}}?>>Computer</label></td>
									<td><label><input type="radio" name="livc9b" value="0" <?php if($edit==1){if($livc[17]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc9b" value="1" <?php if($edit==1){if($livc[17]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc10a" <?php if($edit==1){if($livc[18]=="1"){echo "checked";}}?>>Internet connection</label></td>
									<td><label><input type="radio" name="livc10b" value="0" <?php if($edit==1){if($livc[19]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc10b" value="1" <?php if($edit==1){if($livc[19]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc11a" <?php if($edit==1){if($livc[20]=="1"){echo "checked";}}?>>Kitchen Utensils</label></td>
									<td><label><input type="radio" name="livc11b" value="0" <?php if($edit==1){if($livc[21]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc11b" value="1" <?php if($edit==1){if($livc[21]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="livc12a" <?php if($edit==1){if($livc[22]=="1"){echo "checked";}}?>>Other</label></td>
									<td><label><input type="radio" name="livc12b" value="0" <?php if($edit==1){if($livc[23]=="0"){echo "checked";}}?>> Private</label>
										<label><input type="radio" name="livc12b" value="1" <?php if($edit==1){if($livc[23]=="1"){echo "checked";}}?>> House owner</label>
									</td>
								</tr>
							</table>
							<br><button class="btn btn-success" id="save_living_c"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- d). Security & Safety -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="collapseme" id="col9da">d). Security & Safety</span>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small>
				</div>
				<div class="panel-body" id="col9db">
					<div class="well well-sm col-lg-5 checkbox">
						<label><input type="checkbox" id="livd1" <?php if($edit==1){if($livd[0]=="1"){echo "checked";}}?>>Fenced Accommodation</label><br>
						<label><input type="checkbox" id="livd2" <?php if($edit==1){if($livd[1]=="1"){echo "checked";}}?>>Secured Gate(s)</label><br>
						<label><input type="checkbox" id="livd3" <?php if($edit==1){if($livd[2]=="1"){echo "checked";}}?>>Health Facilities </label><br>
						<label><input type="checkbox" id="livd4" <?php if($edit==1){if($livd[3]=="1"){echo "checked";}}?>>Police station access</label><br>
						<label><input type="checkbox" id="livd5" <?php if($edit==1){if($livd[4]=="1"){echo "checked";}}?>>Secured Doors & Windows</label><br>
						<label><input type="checkbox" id="livd6" <?php if($edit==1){if($livd[5]=="1"){echo "checked";}}?>>Multiple Entry/Exit points in the building</label><br>
						<label><input type="checkbox" id="livd7" <?php if($edit==1){if($livd[6]=="1"){echo "checked";}}?>>Fire Extinguisher</label>
					</div>
					<div class="col-lg-7">
						<div class="form-group">
							<Label>Remarks:</Label>
							<textarea class="form-control" id="livd8"><?php if($edit==1){echo $livd[7];}?></textarea>
						</div>
						<button class="btn btn-success" id="save_living_d"><i class="fa fa-save"></i> Save</button>
					</div>
				</div>
			</div>
			<!-- e). Documentation & Security -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span class="collapseme" id="col9ea">e). Documentation & Security</span>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small>
				</div>
				<div class="panel-body" id="col9eb">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Suggested Questions</label>
							<textarea class="form-control" id="live1" rows="5"><?php if($edit==1){echo $live[0];} ?></textarea>
						</div>
						<div class="checkbox">
						<label><input type="checkbox" id="live2" <?php if($edit==1){if($live[1]==1){echo "checked";}}?>>Registered to neighbourhood/local authorities </label><br>
						<label><input type="checkbox" id="live3" <?php if($edit==1){if($live[2]==1){echo "checked";}}?>>Attestation Letter</label><br>
						<label><input type="checkbox" id="live4" <?php if($edit==1){if($live[3]==1){echo "checked";}}?>>Valid Passports and/or other recognized travel documents</label>
						</div>
						<br><br>
						<div class="form-group">
							<Label>Remarks:</Label>
							<textarea class="form-control" id="live5"><?php if($edit==1){echo $live[4];} ?></textarea>
						</div>
						<br><button class="btn btn-success" id="save_living_e"><i class="fa fa-save"></i> Save</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	
		</div>
		<!-- Financial Situation and Supporting System -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFinancial"> Financial Situation and Supporting System</a>
			</h4>
		</div>
		<div id="collapseFinancial" class="panel-collapse collapse ">
		<div class="panel-body">
			<div class="form-group">
				<label>How the child survived from Date of Arrival to the date of Assessment</label>
				<textarea class="form-control" id="fin1"><?php if($edit==1){echo $fin[0];}?></textarea>
			</div>
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>Expenses </h4><br>
					<label>Amount (weekly in IDR)</label>
					<input type="number" class="form-control" id="fin2" value="<?php if($edit==1){echo $fin[1];}?>"><br><br>
					<label>Remarks</label>
					<textarea class="form-control" id="fin3"><?php if($edit==1){echo $fin[2];}?></textarea>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>Resources  </h4>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small>
					<br><br>
					<label>Source</label>
					<div class="checkbox">
						<label><input type="checkbox" id="fin4" <?php if($edit==1){if($fin[3]){echo "checked";}}?>> Personal income</label><br> 
						<label><input type="checkbox" id="fin5" <?php if($edit==1){if($fin[4]){echo "checked";}}?>> CWS</label><br> 
						<label><input type="checkbox" id="fin6" <?php if($edit==1){if($fin[5]){echo "checked";}}?>> Employment Situationr</label><br> 
						<label><input type="checkbox" id="fin7" <?php if($edit==1){if($fin[6]){echo "checked";}}?>> Family abroad (where?)</label><br> 
						<label><input type="checkbox" id="fin8" <?php if($edit==1){if($fin[7]){echo "checked";}}?>> Assistance received (from?)</label><br> 
						<label><input type="checkbox" id="fin9" <?php if($edit==1){if($fin[8]){echo "checked";}}?>> Government</label><br> 
						<label><input type="checkbox" id="fin10" <?php if($edit==1){if($fin[9]){echo "checked";}}?>> Other</label><br> 
					</div>
					<label>Amount (weekly in IDR)</label>
					<input type="number" class="form-control" id="fin11" value="<?php if($edit==1){echo $fin[10];}?>"><br><br>
					<label>Remarks</label>
					<textarea class="form-control" id="fin12"><?php if($edit==1){echo $fin[11];}?></textarea>
				</div>
			</div>
			<br><button class="btn btn-success" id="save_8"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- CWS - Analysis of information & conclusions by Caseworker -->
		<div class="panel panel-danger">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseCWS">CWS - Analysis of information & conclusions by Caseworker</a>
			</h4>
		</div>
		<div id="collapseCWS" class="panel-collapse collapse  ">
		<div class="panel-body">
			<label>Children at risk : Risk rating </label>
			<div class="well well-sm">
				<label>Instructions</label>
				<p>
					<b>Risk rating box:</b> After completing each risk category, staff will be asked to indicate whether the person of concern is believed to be at high (H), medium (M), or low (L) risk as defined below:
					<ul>
						<li><b> HIGH:</b> reflects a need for immediate intervention by UNHCR or a partner agency. Staff should immediately refer the individual to the appropriate service provider, and follow up with the provider on a weekly basis until they confirm that they have taken action in connection with the individual at heightened risk. This will ensure that the individual’s situation is adequately addressed, and that the referral system is functioning efficiently. (FEW DAYS)</li><br>
						<li><b> MEDIUM:</b> indicates that intervention should be scheduled and occur, but that immediate intervention is not necessary. Note that cases placed in the medium risk category can move into the high-risk category if intervention does not take place. Therefore, staff should implement a structured monitoring system to ensure adequate and timely follow up. </li><br>
						<li><b> LOW:</b> denotes that the regular referral system applies. Additionally, staff should review the situation of individuals at low risk at regular intervals or implement another structured monitoring and follow-up mechanism to ensure that the case is handled adequately.</li>
					</ul>
				</p>
			</div>	
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr class="warning">
						<td colspan="3">Summary of risk categories  <small class="text-danger">Please Tick (<input type="checkbox" checked>) as appropriate</small></td>
					</tr>
					<tr>
						<th width="200px">Categories</th>
						<th width="270px">Risk rate</th>
						<th>Needs</th>
					</tr>
					<tr>
						<td>Boy at risk</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws1" value="L" <?php if($edit==1){if($cws[0]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws1" value="M" <?php if($edit==1){if($cws[0]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label ><input type="radio" name="cws1" value="H" <?php if($edit==1){if($cws[0]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws1"><?php if($edit==1){echo $cws[1];}?></textarea></td>
					</tr>
					<tr>
						<td>Girl at risk</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws2" value="L" <?php if($edit==1){if($cws[2]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws2" value="M" <?php if($edit==1){if($cws[2]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws2" value="H" <?php if($edit==1){if($cws[3]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws2"><?php if($edit==1){echo $cws[3];}?></textarea></td>
					</tr>
					<tr><td colspan="3"></td></tr>
					<tr class="warning">
						<td colspan="3">Referral areas as priority  <small class="text-danger">Please Tick (<input type="checkbox" checked>) as appropriate</small></td>
					</tr>
					<tr>
						<th>Areas</th>
						<th width="250px">Risk rate</th>
						<th>Follow up actions / assistance (CWS, UNHCR, others), according to BiA& victim’s wishes</th>
					</tr>
					<tr>
						<td>Legal protection <br><small>(including documentation)</small> </td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws3" value="L" <?php if($edit==1){if($cws[4]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws3" value="M" <?php if($edit==1){if($cws[4]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws3" value="H" <?php if($edit==1){if($cws[4]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws3"><?php if($edit==1){echo $cws[5];}?></textarea></td>
					</tr>
					<tr>
						<td>RSD </td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws4" value="L" <?php if($edit==1){if($cws[6]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws4" value="M" <?php if($edit==1){if($cws[6]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws4" value="H" <?php if($edit==1){if($cws[6]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws4"><?php if($edit==1){echo $cws[7];}?></textarea></td>
					</tr>
					<tr>
						<td>Basic needs <br><small>(food, water)</small> </td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws5" value="L" <?php if($edit==1){if($cws[8]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws5" value="M" <?php if($edit==1){if($cws[8]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws5" value="H" <?php if($edit==1){if($cws[8]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws5"><?php if($edit==1){echo $cws[9];}?></textarea></td>
					</tr>
					<tr>
						<td>Education</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws6" value="L" <?php if($edit==1){if($cws[10]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws6" value="M" <?php if($edit==1){if($cws[10]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws6" value="H" <?php if($edit==1){if($cws[10]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws6"><?php if($edit==1){echo $cws[11];}?></textarea></td>
					</tr>
					<tr>
						<td>SGBVs</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws7" value="L" <?php if($edit==1){if($cws[12]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws7" value="M" <?php if($edit==1){if($cws[12]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws7" value="H" <?php if($edit==1){if($cws[12]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws7"><?php if($edit==1){echo $cws[13];}?></textarea></td>
					</tr>
					<tr>
						<td>Medical assitance</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws8" value="L" <?php if($edit==1){if($cws[14]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws8" value="M" <?php if($edit==1){if($cws[14]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws8" value="H" <?php if($edit==1){if($cws[14]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws8"><?php if($edit==1){echo $cws[15];}?></textarea></td>
					</tr>
					<tr>
						<td>Psychosocial</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws9" value="L" <?php if($edit==1){if($cws[16]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws9" value="M" <?php if($edit==1){if($cws[16]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws9" value="H" <?php if($edit==1){if($cws[16]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws9"><?php if($edit==1){echo $cws[17];}?></textarea></td>
					</tr>
					<tr>
						<td>Material assitance <br><small>(shelter, NFI, financial)</small></td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws10" value="L" <?php if($edit==1){if($cws[18]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws10" value="M" <?php if($edit==1){if($cws[18]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws10" value="H" <?php if($edit==1){if($cws[18]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws10"><?php if($edit==1){echo $cws[19];}?></textarea></td>
					</tr>
					<tr>
						<td>Recreational activities / Community activities</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws11" value="L" <?php if($edit==1){if($cws[20]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws11" value="M" <?php if($edit==1){if($cws[20]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws11" value="H" <?php if($edit==1){if($cws[20]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws11"><?php if($edit==1){echo $cws[21];}?></textarea></td>
					</tr>
					<tr>
						<td>Regular Home visits</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws12" value="L" <?php if($edit==1){if($cws[22]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws12" value="M" <?php if($edit==1){if($cws[22]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws12" value="H" <?php if($edit==1){if($cws[22]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws12"><?php if($edit==1){echo $cws[23];}?></textarea></td>
					</tr>
					<tr>
						<td>Family tracing</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws13" value="L" <?php if($edit==1){if($cws[24]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws13" value="M" <?php if($edit==1){if($cws[24]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws13" value="H" <?php if($edit==1){if($cws[24]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws13"><?php if($edit==1){echo $cws[25];}?></textarea></td>
					</tr>
					<tr>
						<td>Durable solution</td>
						<td>
							<div class="checkbox">
								<label><input type="radio" name="cws14" value="L" <?php if($edit==1){if($cws[26]=="L"){echo "checked";}}?>> LOW</label>
								<label><input type="radio" name="cws14" value="M" <?php if($edit==1){if($cws[26]=="M"){echo "checked";}}?>> MEDIUM</label>
								<label><input type="radio" name="cws14" value="H" <?php if($edit==1){if($cws[26]=="H"){echo "checked";}}?>> HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws14"><?php if($edit==1){echo $cws[27];}?></textarea></td>
					</tr>
					<tr>
						<td>Caseworker signature & date</td>
						<td colspan="2"><textarea class="form-control" id="cws15"><?php if($edit==1){echo $cws[28];}?></textarea></td>
					</tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_9"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Optional -->
		<div class="panel panel-danger">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseoptional">Optional</a>
			</h4>
		</div>
		<div id="collapseoptional" class="panel-collapse collapse ">
		<div class="panel-body">
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>UNHCR</h4><small>Child Protection officer or Community Services -  Follow up & Conclusions</small><br><br>
					<label>Conclusions </label>
					<textarea class="form-control" id="opt1" rows="8"><?php if($edit==1){echo $opt[0];}?></textarea><br>
					<label>CSO or CP name & date</label>
					<textarea class="form-control" id="opt2"><?php if($edit==1){echo $opt[1];}?></textarea><br>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>Panel conclusion</h4><small>(Optional –for complicated cases, only if necessary)</small><br><br>
					<label>Final conclusions</label>
					<textarea class="form-control" id="opt3" rows="8"><?php if($edit==1){echo $opt[2];}?></textarea><br>
					<label>CSO or CP name & date</label>
					<textarea class="form-control" id="opt4"><?php if($edit==1){echo $opt[3];}?></textarea>
				</div>
			</div>
			<div class="col-lg-12"><button class="btn btn-success" id="save_opt"><i class="fa fa-save"></i> Save</button></div>

		</div>
		</div>
		</div>
	</div>
<?php
// comment 
if($edit==1 AND $_SESSION['group_id']==1){
echo '<div class="col-lg-12" ><label>Comment:</label><textarea class="form-control" id="comment">'; echo Balikin($data['comment']); echo'</textarea><br><small id="t"></small></div> ';
}
?>	
</div>

</div><!-- row -->
</div><!-- page-wrapper -->
