<?php include("form/navigasi.php") ?>
<script>
	$(document).ready(function(){
		var	col1a = $("#col1a"),
			col1b = $("#col1b"),
			col2a = $("#col2a"),
			col2b = $("#col2b"),
			col3a = $("#col3a"),
			col3b = $("#col3b"),
			col4a = $("#col4a"),
			col4b = $("#col4b");
			
		$(col1b).hide();$(col2b).hide();$(col3b).hide();$(col4b).hide();
		$(col1a).click(function(){
			if (col1b.is(':visible')) {col1b.hide();}
			else {
				if(col2b.is(':visible')){col2b.hide();col1b.show();window.location="#col1a";}
				else{col1b.show();window.location="#col1a";}
			}
		});
		$(col2a).click(function(){
			if (col2b.is(':visible')) {col2b.hide();}
			else {
				if(col1b.is(':visible')){col1b.hide();col2b.show();window.location="#col2a";}
				else{col2b.show();window.location="#col2a";}
			}
		});
			
		$(col3a).click(function(){
			if (col3b.is(':visible')) {col3b.hide();}
			else {
				if(col4b.is(':visible')){col4b.hide();col3b.show();window.location="#col3a";}
				else{col3b.show();window.location="#col3a";}
			}
		});
		
		$(col4a).click(function(){
			if (col4b.is(':visible')) {col4b.hide();}
			else {
				if(col3b.is(':visible')){col3b.hide();col4b.show();window.location="#col4a";}
				else{col4b.show();window.location="#col4a";}
			}
		});
		
		function collapseme(b,a){
			if ($(b).is(':visible')) {$(b).hide();}
			else {
				if($(a).is(':visible')){$(a).hide();$(b).show();window.location=$(this);}
				else{$(b).show();window.location=$(this);}
			}
		}
			
	});
</script>

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12"><h1 class="page-header">SOCIO-ECONOMIC ASSESSMENT REPORT</h1></div>
<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<!-- date assessment -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseDate">Assessment Remaks</a>
			</h4>
		</div>
		<div id="collapseDate" class="panel-collapse collapse ">
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
					<label>Location: </label>
					<input class="form-control" id="location">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Assistance receiving since <i>(if any)</i>:</label>
					<input class="form-control" id="assistance_receiving">
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of last assessment:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="last_assessment" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interviewer:</label>
					<input class="form-control" id="interviewer">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interpreter:</label>
					<input class="form-control" id="interpreter">
				</div>
			</div>
			<div class="col-lg-4">
				<label># of home visit(s) and date:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="home_visit" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of last home visit:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="last_home_visit" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label></label><br>
					<button type="submit" class="btn btn-primary" id="save_assessment" ><i class="fa fa-save"></i> Save </button>
				</div>
			</div>

		</div><!-- panel body -->
		</div>
		</div>
		
		
		<!-- A panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Background Information and Assessment Purpose</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse ">
		<div class="panel-body">
			<ol>
			<li>
				<div class="form-group">
				<label>How PoC (and family) survived from date of arrival to the date of assessment?</label>
				<textarea class="form-control" id="" rows="10"></textarea>
				</div>
			</li>
			<li>
				<div class="form-group">
				<label>Current Situation (Socio-economic):</label>
				<textarea class="form-control" id="" rows="10"></textarea><br>
				<button class="btn btn-success" id="save_back"><i class="fa fa-save"></i> Save</button>
				</div>
			</li>
			</ol>
		
		</div>
		</div>
		</div><!-- panel panel-default -->
		<!-- B panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Living Condition <small>(to be filled in after home visits)</small></a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
		<div class="panel-body">
			<!-- A. GENERAL -->
			<div class="panel panel-primary">
			<div class="panel-heading"><span class="collapseme" id="col1a">A. GENERAL</span></div>
			<div class="panel-body" id="col1b">
				<div class="col-lg-4">
					<div class="well well-sm">
						<h4>House/Room condition:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="room_1" value="1" > No repair</label><br>
							<label><input type="checkbox" id="room_2" value="1" > Medium repair</label><br>
							<label><input type="checkbox" id="room_3" value="1" > Leaking ceiling</label><br>
							<label><input type="checkbox" id="room_4" value="1" > Shared toilet/bathroom</label><br>
							<label><input type="checkbox" id="room_5" value="1" > No toilet/bathroom</label><br>
							<label><input type="checkbox" id="room_6" value="1" > Air ventilation (windows, etc)</label><br>
							<label><input type="checkbox" id="room_7" value="1" > No air ventilation</label><br>
							<label><input type="checkbox" id="room_8" value="1" > Shared kitchen</label><br>
							<label><input type="checkbox" id="room_9" value="1" > No kitchen</label><br>
							<label><input type="checkbox" id="room_10" value="1" > Dampness </label><br>
							<label><input type="checkbox" id="room_12" value="1" > Smell</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h4>Furniture / Equipment: <small>(tick as appropriate)</small></h4>
						<div class="checkbox">
							<label><input type="checkbox" id="furni_1" value="1" > Bed</label><br>
							<label><input type="checkbox" id="furni_2" value="1" > Sofa</label><br>
							<label><input type="checkbox" id="furni_3" value="1" > Wardrobe/Cupboard</label><br>
							<label><input type="checkbox" id="furni_4" value="1" > Table</label><br>
							<label><input type="checkbox" id="furni_5" value="1" > Chairs</label><br>
							<label><input type="checkbox" id="furni_6" value="1" > Rice cooker</label><br>
							<label><input type="checkbox" id="furni_7" value="1" > Refrigerator</label><br>
							<label><input type="checkbox" id="furni_8" value="1" > Gas stove</label><br>
							<label><input type="checkbox" id="furni_9" value="1" > Washing machine</label><br>
							<label><input type="checkbox" id="furni_10" value="1" > TV set </label><br>
							<label><input type="checkbox" id="furni_12" value="1" > Iron</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<div class="checkbox">
							<label><input type="checkbox" id="furni_12" value="1" > Computer (laptop, tablet)</label><br>
							<label><input type="checkbox" id="furni_13" value="1" > DVD player</label><br>
							<label><input type="checkbox" id="furni_14" value="1" > AC</label><br>
							<label><input type="checkbox" id="furni_15" value="1" > Fan</label><br>
							<label><input type="checkbox" id="furni_16" value="1" > Internet Connection</label><br>
							<label><input type="checkbox" id="furni_17" value="1" > TV Cable</label><br>
							<label><input type="checkbox" id="furni_18" value="1" > Piped Clean & Safe Water</label><br>
							<label><input type="checkbox" id="furni_19" value="1" > Motorcycle</label><br>
							<label><input type="checkbox" id="furni_20" value="1" > Mobile phone</label><br>
							<label><input type="checkbox" id="furni_21" value="1" > Others</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-12"></div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Number of rooms: </label>
						<input class="form-control" id="" placeholder="type here" value="">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Living space in M2:</label>
						<input class="form-control" id="" placeholder="type here" value="">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Monthly rent fee:</label>
						<input class="form-control" id="" placeholder="type here" value="">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Notes/comments on general condition: </label>
						<textarea class="form-control" rows="5" id=""></textarea>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h4>Security and Safety Measures:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="sec_1" value="1" > Fenced accommodation</label><br>
							<label><input type="checkbox" id="sec_2" value="1" > Secure gate</label><br>
							<label><input type="checkbox" id="sec_3" value="1" > Secure doors & windows</label><br>
							<label><input type="checkbox" id="sec_4" value="1" > Multiple Entry/Exit points in the building</label><br>
							<label><input type="checkbox" id="sec_5" value="1" > Fire Extinguisher</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="well well-sm">
						<h4>Neighbourhood/Relationship with Around People:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="neig_1" value="1" > Clean & healthy area</label><br>
							<label><input type="checkbox" id="neig_2" value="1" > Dense populated area</label><br>
							<label><input type="checkbox" id="neig_3" value="1" > Slum area</label><br>
							<label><input type="checkbox" id="neig_4" value="1" > Trading area</label><br>
							<label><input type="checkbox" id="neig_5" value="1" > Others</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Police station:</label>
						<input class="form-control" id="police">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Health facilities:</label>
						<input class="form-control" id="health">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Notes: </label>
						<textarea class="form-control" id="notes"></textarea>
					</div>
					<div class="form-group">
						<label>Number of person living in same house:  </label>
						<textarea class="form-control" id="person_living" rows="6"></textarea>
						<br>
						<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
					</div>
				</div>
			</div>
			</div><!-- A. GENERAL -->
			<!-- B. PERSON -->
			<div class="panel panel-primary">
			<div class="panel-heading"><span class="collapseme" id="col2a">B. PERSON WITH SPECIFIC NEEDS</span> <br><small>(e.g. person with disabilities, child/woman/older person- at risk, survivor of SGBV, traumatic experience, serious medical problems etc.)</small></div>
			<div class="panel-body" id="col2b">
				<div class="form-group">
					<label>Please specify more about the vulnerabilities: </label><br><small>(Type of vulnerability and how it has affected functioning in his/her daily life and special attention needs to be paid on)</small>
					<textarea class="form-control" id="specify" rows="15"></textarea>
				</div>
				<label>1. CHILDREN </label>
				<div class="table-responsive">
					<table class="table table-bordered ">
						<tbody>
							<tr>
								<td width="300px">Unaccompanied minors:  </td>
								<td width="50px" align="left">
									<div class="form-group">
									<label class="radio-inline"><input type="radio" name="unaccompanied-minors"  value="1" checked>Yes</label><br>
									<label class="radio-inline"><input type="radio" name="unaccompanied-minors"  value="0">No</label>
								</div>
								</td>
								<td width="90px" align="center">
									<label>#</label><input class="form-control" >
								</td>
								<!-- -->
								<td rowspan="2">
									<label>Remarks:</label>
									<textarea class="form-control" rows="5" ></textarea>
								</td>
							</tr>
							<tr>
								<td>Separated children:</td>
								<td width="20px">
									<div class="form-group">
									<label class="radio-inline"><input type="radio" name="separated_children"  value="1" checked>Yes</label><br>
									<label class="radio-inline"><input type="radio" name="separated_children"  value="0">No</label>
								</div>
								</td>
								<td width="90px" align="center">
									<label>#</label><input class="form-control" >
								</td>
							</tr>
							<tr>
								<td># of children attending school:</td>
								<td colspan="3"><textarea class="form-control"  id="child_school" placeholder="Comments"></textarea></td>
							</tr>
							<tr>
								<td># of children not attending school:</td>
								<td colspan="3"><textarea class="form-control"  id="child_not_school" placeholder="Comments"></textarea></td>
							</tr>
							<tr>
								<td># of children with specific education needs:</td>
								<td colspan="3"><textarea class="form-control"  id="child_spec_school" placeholder="Comments"></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				<br>
				<label>2. PROTECTION NEEDS:</label><br><small>[e. g. SGBV, spouse in detention, etc. Please describe if any]</small>
				<div class="form-cgroup">
					<textarea class="form-control" rows="5"></textarea>
					<br>
					<button class="btn btn-success" id="save_person"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
			</div>
			
		</div>
		</div>
		</div><!-- panel panel-default -->
		<!-- c panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Financial And Other Support System Available To The Person Of Concern</a>
			</h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse in">
		<div class="panel-body">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col3a">Support System</span><br><small>(Financial and other supports)</small></div>
				<div class="panel-body" id="col3b">
					<div class="col-lg-6">
					<div class="well well-sm ">
						<h4>Approximate monthly household income</h4><br>
						<label>CWS/UNHCR cash assistance:</label><input class="form-control">
						<label>Non-CWS/UNHCR assistance:</label><input class="form-control">
						<label>Other sources of income: <small>(e.g. IOM/JRS, etc)</small></label><input class="form-control">
						<label>Other sources of income: <small>(e.g. from relative in CoO/CoA/Abroad, etc.)</small></label>
						<textarea class="form-control" rows="5"></textarea>
					</div>
					</div>
					
					<div class="col-lg-6">
					<div class="well well-sm ">
						<h4>Approximate monthly expenditure</h4><br>
						<label>Rent fee:</label><input class="form-control">
						<label>Food:</label><input class="form-control">
						<label>Clothes:</label><input class="form-control">
						<label>Transport:</label><input class="form-control">
						<label>Other:</label><input class="form-control">
					</div>
					</div>
					<br>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Comments on available financial support system (cash): </label>
							<textarea class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Comments on available other support system (in kind): </label>
							<textarea class="form-control"></textarea><br>
							<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>
					
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col4a" >Recommendations:</span></div>
				<div class="panel-body" id="col4b">
					<table >
						<tr>
							<td width="300px"><label>Assistance Highly Recommended:  </label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="AHR" value="1"> YES</label>
									<label class="radio-inline"><input type="radio" name="AHR" value="0"> NO</label>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Assistance Recommended:  </label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="AR" value="1"> YES</label>
									<label class="radio-inline"><input type="radio" name="AR" value="0"> NO</label>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Assistance Not Recommended:  </label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="ANR" value="1"> YES</label>
									<label class="radio-inline"><input type="radio" name="ANR" value="0"> NO</label>
								</div>
							</td>
						</tr>
					</table>
					<br><br>
					<div class="form-group">
						<label>Final remarks, including recommendation on cash, non-cash or other form of assistance</label><br><small>(if applicable):</small>
						<textarea class="form-control" rows="20"></textarea>
						<br>
						<button class="btn btn-success"><i class="fa fa-save"></i> Save</button>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		</div><!-- panel panel-default -->
		<!-- perbedaan hak akses -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Assessment verified by: </a>
			</h4>
		</div>
		<div id="collapseFour" class="panel-collpase collapse">
			<div class="panel-body">
				<div class="col-lg-4">
					<div class="form-group">
						<label>Name:</label>
						<input class="form-control" id="ver_name">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Signature:</label>
						<input class="form-control" id="ver_signature">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Date:</label>
						<input class="form-control" id="ver_date">
					</div>
				</div>
				<div class="form-group">
					<label>Remarks by reviewing officer: </label>
					<textarea class="form-control" rows="5" id="ver_remarks"></textarea>
				</div>
			</div>
		</div>
		</div>
		
	</div><!-- panel-group -->



</div>
</div><!-- row -->
</div><!-- page-wrapper -->
