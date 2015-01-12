<?php 
include("form/navigasi.php");
?>
<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
<div class="col-lg-12"><h3 class="page-header">Best Interest Assessment Report for Temporary Care</h3></div>
<div class=" row col-lg-12">
	<div class="panel-group" id="accordion">
		<!-- date assessment -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseDate">1. Date of Assessment</a>
			</h4>
		</div>
		<div id="collapseDate" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label>File No: </label>
					<input class="form-control" id="file_no">
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of Assessment: </label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="date_assessment" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Place</label>
					<input class="form-control" id="place_assessment">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Case Worker</label>
					<input class="form-control" id="case_worker">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Organization</label>
					<input class="form-control" id="org">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interpreter name & organization</label>
					<input class="form-control" id="inorg">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Identification of child</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  value="UNHCR" checked>UNHCR</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  value="CWS" >CWS</label><br>
					<label class="radio-inline"><input type="radio" name="ioc"  id="other" >Other</label>
					<input class="form-control" style="padding:5px;height:25px;width:150px;" placeholder="(Name, if other)" id="others">
					<br><button class="btn btn-success" id="save_1"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- Child Bio data 
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseChild">2. Child Bio data</a>
			</h4>
		</div>
		<div id="collapseChild" class="panel-collapse collapse in">
		<div class="panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label>UNHCR Case No</label>
					<input class="form-control" id="unhcr_no">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Link Case No</label>
					<input class="form-control" id="case_no">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>First Name</label>
					<input class="form-control" id="first_name">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Family Name</label>
					<input class="form-control" id="family_name">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Nick name</label>
					<input class="form-control" id="nick_name">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Ethnicity</label>
					<input class="form-control" id="ethnicity">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Religion</label>
					<input class="form-control" id="religion">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>ID Card No</label>
					<input class="form-control" id="id_card">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Claimed date of Birth (DoB)</label>
					<input class="form-control" id="dob">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Place of Birth</label>
					<textarea class="form-control" id="pob"></textarea>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Country of Origin</label>
					<input class="form-control" id="coo">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Nationality</label>
					<input class="form-control" id="national">
				</div>
			</div>
			<div class="col-lg-12"></div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Gender</label>
					<label class="radio-inline"><input type="radio" name="gender"  value="M" checked>Male</label>
					<label class="radio-inline"><input type="radio" name="gender"  value="F">Female</label>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Address in indonesia</label>
					<textarea class="form-control" id="address"></textarea>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Phone number in Indonesia</label>
					<input class="form-control" id="phone">
				</div>
			</div>
			<div class="col-lg-12"></div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Mother tongue</label>
					<input class="form-control" id="mot">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Knowledge of other languages</label>
					<input class="form-control" id="known_language">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="status" id="status">
							<option value="0">-- select --</option>
							<option >Refugee</option>
							<option >Asylum Seeker</option>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label></label>
					<input class="form-control" id="">
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- 3 - History of separation 
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseHistory">3. History of separation</a>
			</h4>
		</div>
		<div id="collapseHistory" class="panel-collapse collapse ">
		<div class="panel-body">
			
		</div>
		</div>
		</div> -->
		<!-- 4 – Personal history  ( Background(Brief history describing hardships or trauma experienced)) -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapsePersonal">4. Personal history</a><br><small>( Background(Brief history describing hardships or trauma experienced))</small>
			</h4>
		</div>
		<div id="collapsePersonal" class="panel-collapse collapse ">
		<div class="panel-body">
			<ol>
				<li>
					<label>In the Country of Origin</label>
					<textarea class="form-control"></textarea>
				</li>
				<li>
					<label>During the flight</label>
					<textarea class="form-control" rows="15"></textarea>
				</li>
				<li>
					<label>In the country of Asylum</label>
					<textarea class="form-control"></textarea>
				</li>
			</ol>
			<br><button class="btn btn-success" id="save_4"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- 5 - Types of identified vulnerabilities -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseIdentified">5. Types of identified vulnerabilities</a>
			</h4>
		</div>
		<div id="collapseIdentified" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="well well-small panel-green">
				<label style="text-decoration:underline;">Instruction</label>
			<p>Please Tick (<input type="checkbox" checked>) as appropriate- <span class="text-danger">Tick the one or several corresponding vulnerabilities</span>
<br><br>Staff may complete this section in the absence of the person of concern, based on the staff’s record of information previously collected in the personal study.
<i><br>(CoO: Country of origin; CoA: Country of Asylum)</i></p>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<tr>
						<td width="300px"><label>Child at risk of deportation</label></td>
						<td width="200px">
							<label><input type="checkbox" id="501a"> CoO</label>
							<label><input type="checkbox" id="501b"> During flight </label>
							<label><input type="checkbox" id="501c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="501d"></textarea></td>
					</tr>
					<tr>
						<td><label>Child without legal documentation</label></td>
						<td>
							<label><input type="checkbox" id="502a"> CoO</label>
							<label><input type="checkbox" id="502b"> During flight </label>
							<label><input type="checkbox" id="502c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="502d"></textarea></td>
					</tr>
					<tr>
						<td><label>Street Children</label></td>
						<td>
							<label><input type="checkbox" id="503a"> CoO</label>
							<label><input type="checkbox" id="503b"> During flight </label>
							<label><input type="checkbox" id="503c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="503d"></textarea></td>
					</tr>
					<tr>
						<td><label>Medical Case</label></td>
						<td>
							<label><input type="checkbox" id="504a"> CoO</label>
							<label><input type="checkbox" id="504b"> During flight </label>
							<label><input type="checkbox" id="504c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="504d"></textarea></td>
					</tr>
					<tr>
						<td><label>Disabled child</label></td>
						<td>
							<label><input type="checkbox" id="505a"> CoO</label>
							<label><input type="checkbox" id="505b"> During flight </label>
							<label><input type="checkbox" id="505c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="505d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of violence</label></td>
						<td>
							<label><input type="checkbox" id="506a"> CoO</label>
							<label><input type="checkbox" id="506b"> During flight </label>
							<label><input type="checkbox" id="506c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="506d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of sexual violence</label></td>
						<td>
							<label><input type="checkbox" id="507a"> CoO</label>
							<label><input type="checkbox" id="507b"> During flight </label>
							<label><input type="checkbox" id="507c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="507d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of trafficking</label></td>
						<td>
							<label><input type="checkbox" id="508a"> CoO</label>
							<label><input type="checkbox" id="508b"> During flight </label>
							<label><input type="checkbox" id="508c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="508d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of Child Labour</label></td>
						<td>
							<label><input type="checkbox" id="509a"> CoO</label>
							<label><input type="checkbox" id="509b"> During flight </label>
							<label><input type="checkbox" id="509c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="509d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of forced Labour</label></td>
						<td>
							<label><input type="checkbox" id="510a"> CoO</label>
							<label><input type="checkbox" id="510b"> During flight </label>
							<label><input type="checkbox" id="510c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="510d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of exploitation</label></td>
						<td>
							<label><input type="checkbox" id="511a"> CoO</label>
							<label><input type="checkbox" id="511b"> During flight </label>
							<label><input type="checkbox" id="511c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="511d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of prostitution</label></td>
						<td>
							<label><input type="checkbox" id="512a"> CoO</label>
							<label><input type="checkbox" id="512b"> During flight </label>
							<label><input type="checkbox" id="512c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="512d"></textarea></td>
					</tr>
					<tr>
						<td><label>Minor victim used or recruited by smugglers</label></td>
						<td>
							<label><input type="checkbox" id="513a"> CoO</label>
							<label><input type="checkbox" id="513b"> During flight </label>
							<label><input type="checkbox" id="513c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="513d"></textarea></td>
					</tr>
					<tr>
						<td><label>Minor in conflict with the Law</label></td>
						<td>
							<label><input type="checkbox" id="514a"> CoO</label>
							<label><input type="checkbox" id="514b"> During flight </label>
							<label><input type="checkbox" id="514c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="514d"></textarea></td>
					</tr>
					<tr>
						<td><label>In hiding <small>(e.g. fear of being identified or found)</small></label></td>
						<td>
							<label><input type="checkbox" id="515a"> CoO</label>
							<label><input type="checkbox" id="515b"> During flight </label>
							<label><input type="checkbox" id="515c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="515d"></textarea></td>
					</tr>
					<tr>
						<td><label>Experiencing rejection by community</label></td>
						<td>
							<label><input type="checkbox" id="516a"> CoO</label>
							<label><input type="checkbox" id="516b"> During flight </label>
							<label><input type="checkbox" id="516c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="516d"></textarea></td>
					</tr>
					<tr>
						<td><label>Bodily injured</label></td>
						<td>
							<label><input type="checkbox" id="517a"> CoO</label>
							<label><input type="checkbox" id="517b"> During flight </label>
							<label><input type="checkbox" id="517c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="517d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of severe beatings</label></td>
						<td>
							<label><input type="checkbox" id="518a"> CoO</label>
							<label><input type="checkbox" id="518b"> During flight </label>
							<label><input type="checkbox" id="518c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="518d"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of basic needs <small>(food, water, shelter)</small></label></td>
						<td>
							<label><input type="checkbox" id="519a"> CoO</label>
							<label><input type="checkbox" id="519b"> During flight </label>
							<label><input type="checkbox" id="519c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="519d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" id="520a"> CoO</label>
							<label><input type="checkbox" id="520b"> During flight </label>
							<label><input type="checkbox" id="520c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="520d"></textarea></td>
					</tr>
					<tr>
						<td><label>Unsafe in community <br><small>(a.g. abuse by family or community, domestic violence)</small></label></td>
						<td>
							<label><input type="checkbox" id="521a"> CoO</label>
							<label><input type="checkbox" id="521b"> During flight </label>
							<label><input type="checkbox" id="521c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="521d"></textarea></td>
					</tr>
					<tr>
						<td><label>Other <small>(explain)</small></label></td>
						<td>
							<label><input type="checkbox" id="522a"> CoO</label>
							<label><input type="checkbox" id="522b"> During flight </label>
							<label><input type="checkbox" id="522c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="522d"></textarea></td>
					</tr>
					<tr>
						<td colspan="3" class="info" ><p>Special attention: Girls at risk <small>(can be cumulated with previous section)</small></p></td>
					</tr>
					<tr>
						<td><label>Girl without protection</label></td>
						<td>
							<label><input type="checkbox" id="523a"> CoO</label>
							<label><input type="checkbox" id="523b"> During flight </label>
							<label><input type="checkbox" id="523c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="523d"></textarea></td>
					</tr>
					<tr>
						<td><label>Pregnant girl</label></td>
						<td>
							<label><input type="checkbox" id="524a"> CoO</label>
							<label><input type="checkbox" id="524b"> During flight </label>
							<label><input type="checkbox" id="524c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="524d"></textarea></td>
					</tr>
					<tr>
						<td><label>Adolescent parent</label></td>
						<td>
							<label><input type="checkbox" id="525a"> CoO</label>
							<label><input type="checkbox" id="525b"> During flight </label>
							<label><input type="checkbox" id="525c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="525d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" id="526a"> CoO</label>
							<label><input type="checkbox" id="526b"> During flight </label>
							<label><input type="checkbox" id="526c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="526d"></textarea></td>
					</tr>
					<tr>
						<td><label>Engaging in survival sex</label></td>
						<td>
							<label><input type="checkbox" id="527a"> CoO</label>
							<label><input type="checkbox" id="527b"> During flight </label>
							<label><input type="checkbox" id="527c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="527d"></textarea></td>
					</tr>
					<tr>
						<td><label>Other forms of GBVs</label></td>
						<td>
							<label><input type="checkbox" id="528a"> CoO</label>
							<label><input type="checkbox" id="528b"> During flight </label>
							<label><input type="checkbox" id="528c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="528d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of forced marriage</label></td>
						<td>
							<label><input type="checkbox" id="529a"> CoO</label>
							<label><input type="checkbox" id="529b"> During flight </label>
							<label><input type="checkbox" id="529c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="529d"></textarea></td>
					</tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_5"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- 6 – Education -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseEdu">6. Education</a>
			</h4>
		</div>
		<div id="collapseEdu" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td><label>Suggested questions</label></td>
						<td><label>*Did you go to school prior to the separation?</label>
							<textarea class="form-control" id="61a"></textarea>
							<br>
							<label>	*Do you like to go to school?</label>
							<textarea class="form-control" id="61b"></textarea>
							<br>
							<label>	*How do you spend your time? What do you like to do? <small>(Language, Computer, etc.)</small> </label>
							<textarea class="form-control" id="61c"></textarea>
							<br>
							<label>	Observations</label>
							<textarea class="form-control" id="61d"></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Level of education / grade</label></td>
						<td><textarea class="form-control" id="62"></textarea></td>
					</tr>
					<tr>
						<td><label>Skills & Occupation</label></td>
						<td><textarea class="form-control" id="63"></textarea></td>
					</tr>
					<tr>
						<td><label>Previous occupation, if any</label></td>
						<td><textarea class="form-control" id="64"></textarea></td>
					</tr>
				</table>
			</div>
			<br><button class="btn btn-success" id="save_6"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- 7 – Health  -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseHealth">7. Health </a>
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
							<textarea class="form-control" id="71a"></textarea>
							<label>Observation:</label>
							<textarea class="form-control" id="71a"></textarea>
						</td>
					</tr>
					<tr>
						<td width="300px">
							<Label>Whether medical attention is being</Label><br>
							<label class="checkbox-inline"><input type="checkbox" name="72a"> Received</label>
							<label class="checkbox-inline"><input type="checkbox" name="72a"> Required</label>
						</td>
						<td colspan="2">
							<label>Observation:</label>
							<textarea class="form-control" id="72b"></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Physical Health problems</label></td>
						<td width="200px">
							<label><input type="checkbox" id="73a"> Past history </label><br>
							<label><input type="checkbox" id="73b"> During flight </label><br>
							<label><input type="checkbox" id="73c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="73d"></textarea></td>
					</tr>
					<tr>
						<td><label>Child with HIV/AIDS</label></td>
						<td width="200px">
							<label><input type="checkbox" id="74a"> Past history </label><br>
							<label><input type="checkbox" id="74b"> During flight </label><br>
							<label><input type="checkbox" id="74c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="74d"></textarea></td>
					</tr>
					<tr>
						<td><label>Addictions <i>(Drugs, alcohol, etc.)</i></label></td>
						<td width="200px">
							<label><input type="checkbox" id="75a"> Past history </label><br>
							<label><input type="checkbox" id="75b"> During flight </label><br>
							<label><input type="checkbox" id="75c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="75d"></textarea></td>
					</tr>
					<tr>
						<td><label>Hearing impairment</label></td>
						<td width="200px">
							<label><input type="checkbox" id="76a"> Past history </label><br>
							<label><input type="checkbox" id="76b"> During flight </label><br>
							<label><input type="checkbox" id="76c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="76d"></textarea></td>
					</tr>
					<tr>
						<td><label>Mental disability</label></td>
						<td style="max-width:200px;">
							<label><input type="checkbox" id="77a"> Past history </label><br>
							<label><input type="checkbox" id="77b"> During flight </label><br>
							<label><input type="checkbox" id="77c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="77d"></textarea></td>
					</tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_7"><i class="fa fa-save"></i> Save</button>			
		</div>
		</div>
		</div>
		<!-- 8 – Psychosocial conditions    (This part can be filled by Psychosocial workers) -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapsePsy">8. Psychosocial conditions</a><br> <small class="text-danger">(This part can be filled by Psychosocial workers)</small>
			</h4>
		</div>
		<div id="collapsePsy" class="panel-collapse collapse ">
		<div class="panel-body">
			<div class="well well-sm panel-green">
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
					<input type="text" class="form-control" id="801" value=""><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-12"></div><br>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td width="200px" rowspan="4"><br><br><br><b>SOCIAL RESOURCES</b></td>
						<td width="300px"><label>Is the Child able to form and maintain relationships with family/friends?</label></td>
						<td><textarea class="form-control" id="802a"></textarea></td>
					</tr>
					<tr>
						<td><label>What are the Child’s favorite activities?</label></td>
						<td><textarea class="form-control" id="802b"></textarea></td>
					</tr>
					<tr>
						<td><label>Hobbies & interests</label></td>
						<td><textarea class="form-control" id="802c"></textarea></td>
					</tr>
					<tr>
						<td><label>Daily Activities - How child occupy himself daily?</label></td>
						<td><textarea class="form-control" id="802d"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you feel healthy?</label><br><i> If not, please, explain type of sickness/how you feel physically.</i> </td>
						<td><textarea class="form-control" id="803"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you have access to medical care?</label><br><i>If not, explain why?</i> </td>
						<td><textarea class="form-control" id="804"></textarea></td>
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
							<label class="radio-inline"><input type="radio" name="805a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="805a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="805b"></textarea></td>
					</tr>
					<tr>
						<td><label>Depressed</label><br><p><i>(a person experiences deep, unshakable sadness and diminished interest in nearly all activities)</i></p></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="806a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="806a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="806b"></textarea></td>
					</tr>
					<tr>
						<td><label>Sleeping disturbance</label><br><i>(Any condition that interferes with sleep)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="807a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="807a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="807b"></textarea></td>
					</tr>
					<tr>
						<td><label>Easily get angry</label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="808a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="808a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="808b"></textarea></td>
					</tr>
					<tr>
						<td><label>Confused </label><br><i>(disoriented mentally; being unable to think with clarity or act with understanding and intelligence)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="809a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="809a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="809b"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of concentration </label><br><i>(inability to direct one's thinking in whatever direction one would intend))</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="810a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="810a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="810b"></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling hopeless</label><br><i>(without hope; despairing)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="811a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="811a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="811b"></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling unworthy </label><br><i>(his/her sense of meaning is undermined)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="812a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="812a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="812b"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of trust to others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="813a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="813a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="813b"></textarea></td>
					</tr>
					<tr>
						<td><label>Deprived from community/others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="814a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="814a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="814b"></textarea></td>
					</tr>
					<tr>
						<td><label>Coping Mechanism </label><br><i>(an adaptation to environmental stress that is based on conscious or unconscious choice and that enhances control over behaviour or gives psychological comfort)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="815a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="815a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="815b"></textarea></td>
					</tr>
				</table>
			</div>
			<br><button class="btn btn-success" id="save_8"><i class="fa fa-save"></i> Save</button>			
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
		<div id="collapseInteraction" class="panel-collapse collapse ">
		<div class="panel-body">
			<label>INTERACTION <small>with the person during the interview</small></label><br>
			<i>Simple Description of the Child AS or refugee as he appears - (describe what you see; highlight the positive, not just the negative; Avoid labels.)</i><br><br><br>
			<div class="form-group">
				<label>Mood, attitude, appearance, speech, affect, thought consent</label>
				<textarea class="form-control" id="interaction" rows="5">
				
				</textarea>
			</div>
			
			<br><button class="btn btn-success" id="save_inter"><i class="fa fa-save"></i> Save</button>	
			
		</div>
		</div>
		</div>
		<!-- 9 – Living conditions in place of residence -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseLiving">9. Living conditions in place of residence</a>
			</h4>
		</div>
		<div id="collapseLiving" class="panel-collapse collapse in">
		<div class="panel-body">
			
			<!-- a). Suggested Questions: -->
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col9aa">a). Suggested Questions:</span></div>
				<div class="panel-body" id="col9ab">
					<div class="form-group">
						<ul>
							<li><p>With whom do you currently live?  <i>(Note names, ages, gender)</i> How long have you been living here?Is there an adult in <i>(name/location in country of asylum)</i> who is looking after you?  <i>If so, note name, relationship, contact information.</i> How did you find this place to stay? How is your relationship with your caretaker and/or housemates? </p>
						<textarea class="form-control"  id="9a01a"></textarea></li>
							<li><p>Do you like to stay with this family? How often do you eat? Where do you sleep? How do you feel living here? Are you happy here? Do you think you have enough food? If not, please explain. Who prepares the food? Do you have access to clean water? Are appropriate sanitation facilities in place, where you live in? </p>
						<textarea class="form-control" id="9a01b"></textarea></li>
						</ul>
						<br>
						<small>If the child has already in the shelter, put the situation before living in shelter in this section.</small>
					</div>
					<div class="form-group">
						<label>Responses:</label>
						<textarea class="form-control" id="9a02"></textarea>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Type of housing</label><br>
							<label class="radio-inline"><input type="radio" name="9a03" value="CWS"> CWS</label><br>
							<label class="radio-inline"><input type="radio" name="9a03" value="House"> House</label><br>
							<small class="text-danger">(If CWS shelter is tick, no need to fill up part b, c& d)</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Number of Person Living in the Same Room/House</label>
							<textarea class="form-control" id="9a04"></textarea>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Neighbourhood/Relationship with around People</label>
							<textarea class="form-control" id="9a05"></textarea>
						</div>
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
						<label><input type="checkbox" id="9b01"> Bedroom</label> <br>
						<label><input type="checkbox" id="9b02"> Bathroom</label><br>
						<label><input type="checkbox" id="9b03"> Electricity</label><br>
						<label><input type="checkbox" id="9b04"> Guest room</label><br>
						<label><input type="checkbox" id="9b05"> Terrace</label><br>
						<label><input type="checkbox" id="9b06"> Direct access to public transportation</label><br>
						</div></div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm"><div class="checkbox">
						<label><input type="checkbox" id="9b07"> Living room</label><br>
						<label><input type="checkbox" id="9b08"> Backyard</label><br>
						<label><input type="checkbox" id="9b09"> Dining room</label><br>
						<label><input type="checkbox" id="9b10"> Piped Clean & Safe Water</label><br>
						<label><input type="checkbox" id="9b11"> Kitchen</label><br>
						<label><input type="checkbox" id="9b12"> Dug Well Water</label><br> 
						</div></div>
					</div>
					<div class="col-lg-4">
						<label>Remarks:</label>
						<textarea class="form-control" id="9b13"></textarea>
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
					<div class="table-responsive checkbox">
						<table class="table table-bordered">
							<tr>
								<td><label><input type="checkbox" id="9c01a">Fan</label></td>
								<td><label><input type="checkbox" id="9c01b">Private</label>
									<label><input type="checkbox" id="9c01c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c02a">Satellite/Cable TV</label></td>
								<td><label><input type="checkbox" id="9c02b">Private</label>
									<label><input type="checkbox" id="9c02c">House owner</label>
								</td>
							</tr>
							<tr>
								<td><label><input type="checkbox" id="9c03a">TV set</label></td>
								<td><label><input type="checkbox" id="9c03b">Private</label>
									<label><input type="checkbox" id="9c03c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c04a">Washing machine</label></td>
								<td><label><input type="checkbox" id="9c04b">Private</label>
									<label><input type="checkbox" id="9c04c">House owner</label>
								</td>
							</tr>
							<tr>
								<td><label><input type="checkbox" id="9c05a">Telephone (mobile)</label></td>
								<td><label><input type="checkbox" id="9c05b">Private</label>
									<label><input type="checkbox" id="9c05c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c06a">Computer</label></td>
								<td><label><input type="checkbox" id="9c06b">Private</label>
									<label><input type="checkbox" id="9c06c">House owner</label>
								</td>
							</tr>
							<tr>
								<td><label><input type="checkbox" id="9c07a">Radio</label></td>
								<td><label><input type="checkbox" id="9c07b">Private</label>
									<label><input type="checkbox" id="9c07c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c08a">Internet connection</label></td>
								<td><label><input type="checkbox" id="9c08b">Private</label>
									<label><input type="checkbox" id="9c08c">House owner</label>
								</td>
							</tr>
							<tr>
								<td><label><input type="checkbox" id="9c09a">Furniture</label></td>
								<td><label><input type="checkbox" id="9c09b">Private</label>
									<label><input type="checkbox" id="9c09c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c10a">Kitchen Utensils</label></td>
								<td><label><input type="checkbox" id="9c10b">Private</label>
									<label><input type="checkbox" id="9c10c">House owner</label>
								</td>
							<tr>
								<td><label><input type="checkbox" id="9c11a">Refrigerator</label></td>
								<td><label><input type="checkbox" id="9c11b">Private</label>
									<label><input type="checkbox" id="9c11c">House owner</label>
								</td>
								<!-- -->
								<td><label><input type="checkbox" id="9c12a">Other</label></td>
								<td><label><input type="checkbox" id="9c12b">Private</label>
									<label><input type="checkbox" id="9c12c">House owner</label>
								</td>
							</tr>
							
							
							
							
							
						</table>
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
				
				</div>
			</div>

		</div>
		</div>
		</div>
		<!-- 10 - Financial Situation and Supporting System -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFinancial">10. Financial Situation and Supporting System</a>
			</h4>
		</div>
		<div id="collapseFinancial" class="panel-collapse collapse ">
		<div class="panel-body">
			
		</div>
		</div>
		</div>
		<!-- 11  - CWS - Analysis of information & conclusions by Caseworker -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseCWS">11. CWS - Analysis of information & conclusions by Caseworker</a>
			</h4>
		</div>
		<div id="collapseCWS" class="panel-collapse collapse ">
		<div class="panel-body">
			
		</div>
		</div>
		</div>
	</div>
	
</div>
</div><!-- row -->
</div><!-- page-wrapper -->
