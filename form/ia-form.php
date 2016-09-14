<?php 
$R="R4";$W="W4";
$LOCATION = "ia_form";
setHistory($_SESSION['user_id'],$LOCATION,"Open IA Form",$NOW);

include("form/navigasi.php");
	
if(isset($_GET['op'])){
	if(isset($_GET['file_no'])){
		$qry = mysql_query("SELECT * FROM `ia` WHERE `file_no`='".$_GET['file_no']."'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
		
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
		
		//
		$disable = "disabled";
		$button = '<button  class="btn btn-success" id="update_assessment" ><i class="fa fa-refresh"></i> Update </button>';
		$edit = 1;
	}
}
else{
	$button = '<button  class="btn btn-success" id="save_assessment" ><i class="fa fa-save"></i> Save </button>';
	$edit = 0;
}



?>



<script>
(function($) {
	$(document).ready(function(){
		
		
		var file_no = $("#file_no").val();
		var country2 = $("#country2").val();
		
		$("#uam_living_coo").load("form/general-action.php","op=getcountry&country="+country2);
		$("#uam_living_relationship").load("form/general-action.php","op=getrelation");
		$("#file_no").change(function(){file_no = $(this).val();$("#whom_living").load("form/ia-whom-living.php?file_no="+file_no);});
		if(file_no != ""){$("#whom_living").load("form/ia-whom-living.php?file_no="+file_no);}
		
		//check available
		$("#file_no").change(function(){
			var datanya = "&file_no="+$(this).val();
			
			$.ajax({url: "form/ia-action.php",data: "op=check"+datanya,cache: false,
				success: function(msg){
					if(msg=="inuse"){
						$("#a").addClass("text-warning").removeClass("text-success text-danger").html("<i class='fa fa-warning'></i> In use");
					}
					else if(msg=="avail"){
						$("#a").addClass("text-success").removeClass("text-danger text-warning").html("<i class='fa fa-check'></i> Available");
					}
					else{
						$("#a").addClass("text-danger").removeClass("text-success text-warning").html("<i class='fa fa-warning'></i> No Data");
					}
				}
			});
		});
		
		//save assessment
		$("#save_assessment").click(function(){
			if(file_no == ""){
				alert("Please insert UNHCR Case Number");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-danger")){
				var r = confirm("No Data for ["+file_no+"], Add new Data?");
				if (r == true) {window.location="?page=person-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{
				var date_ = $("#ia_date_assessment").val(),
					location = $("#ia_location_assessment").val(),
					by = $("#ia_assessment_by").val();
				var datanya = "&file_no="+file_no+"&value="+date_+";"+location+";"+by;
				$.ajax({url: "form/ia-action.php",data: "op=addassessment"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseTwo").addClass("in");
							$("#file_no").attr("disabled",true);
							$("#a").html("");
						}
						else{alert("Data not saved !!");}
					}
				});
			}
		});
		
		//update assessment
		$("#update_assessment").click(function(){
			if(file_no == ""){
				alert("Please insert UNHCR Case Number");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-danger")){
				var r = confirm("No Data for ["+file_no+"], Add new Data?");
				if (r == true) {window.location="?page=person-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{
				var date_ = $("#ia_date_assessment").val(),
					location = $("#ia_location_assessment").val(),
					by = $("#ia_assessment_by").val();
				var datanya = "&file_no="+file_no+"&value="+date_+";"+location+";"+by;
				$.ajax({url: "form/ia-action.php",data: "op=updateassessment"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseTwo").addClass("in");
							$("#file_no").attr("disabled",true);
							$("#a").html("");
						}
						else{alert("Data not saved !!");}
					}
				});
			}
		});
		
		//save_legal_doc
		$("#save_legal_doc").click(function(){
			var doc_1 = $("#legal_doc_1").val(),doc_2 = $("#legal_doc_2").val(),doc_3 = $("#legal_doc_3").val();
			var datanya = "&file_no="+file_no+"&value="+doc_1+";"+doc_2+";"+doc_3;
			$.ajax({url: "form/ia-action.php",data: "op=savelegaldoc"+datanya,cache: false,
				success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");$("#collapseTwo").removeClass("in");$("#collapseThree").addClass("in");}
					else{alert("Data not saved !!");}
				}
			});
			
		});
		
		
		//add whom living
		$("#add_whom_living").click(function(){
			var name = $("#uam_living_name").val(),case_number = $("#uam_living_case_number").val(),coo = $("#uam_living_coo").val(),dob = $("#uam_living_dob").val(),age = $("#uam_living_age").val(),sex = $('input:radio[name=ia-living-sex]:checked').val(),phone = $("#uam_living_phone").val(),relation = $("#uam_living_relationship").val(),meet = $("#uam_living_meet").val(),file_no = $("#file_no").val();
			
			var datanya = "&file_no="+file_no+"&value="+name+";"+case_number+";"+coo+";"+dob+","+age+";"+sex+";"+phone+";"+relation+";"+meet;
			
			$.ajax({url: "form/ia-action.php",data: "op=addwhomliving"+datanya,cache: false,
				success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");$("#whom_living").load("form/ia-whom-living.php?file_no="+file_no);	$(".ia-living .form-control").val("");$(".ia-living select").val("0");	
					}
					else{alert("Data not saved !!");}
				}
			});
		});
		
		//save_ia_doc
		$("#save_ia_doc").click(function(){
			var type_residence = $('input:radio[name=ia_type_residence]:checked').val(),
				room_1 = $("#ia_room_1:checked").length,room_2 = $("#ia_room_2:checked").length,
				room_3 = $("#ia_room_3:checked").length,room_4 = $("#ia_room_4:checked").length,
				room_5 = $("#ia_room_5:checked").length,room_6 = $("#ia_room_6:checked").length,
				room_7 = $("#ia_room_7:checked").length,room_8 = $("#ia_room_8:checked").length,
				room_9 = $("#ia_room_9:checked").length,room_10 = $("#ia_room_10:checked").length,
				room_11 = $("#ia_room_11:checked").length,room_12 = $("#ia_room_12:checked").length;
				
			var	furniture_1=$("#ia_furniture_1:checked").length,furniture_2=$("#ia_furniture_2:checked").length,
				furniture_3=$("#ia_furniture_3:checked").length,furniture_4=$("#ia_furniture_4:checked").length,
				furniture_5=$("#ia_furniture_5:checked").length,furniture_6=$("#ia_furniture_6:checked").length;	
			
			var cond_1=$("#ia_living_cond_1").val(),cond_2=$("#ia_living_cond_2").val(),cond_3=$("#ia_living_cond_3").val();
				
			var room = room_1+","+room_2+","+room_3+","+room_4+","+room_5+","+room_6+","+room_7+","+room_8+","+room_9+","+room_10+","+room_11+","+room_12;
			
			var furniture= furniture_1+","+furniture_2+","+furniture_3+","+furniture_4+","+furniture_5+","+furniture_6;
			
			var living_env = type_residence+";"+room+";"+furniture;
			
			var living_cond = cond_1+";"+cond_2+";"+cond_3;
			
			var	q12 = $("#ia_q1").val()+";"+$("#ia_q2").val(),
				q34 = $("#ia_q3").val()+";"+$("#ia_q4").val(),
				q56 = $("#ia_q5").val()+";"+$("#ia_q6").val(),
				q78 = $("#ia_q7").val()+";"+$("#ia_q8").val(),
				remarks_staff = $("#ia_remakrs_staff").val(),
				file_no = $("#file_no").val();

			var datanya = "&file_no="+file_no+"&living_env="+living_env+"&living_cond="+living_cond+"&q12="+q12+"&q34="+q34+"&q56="+q56+"&q78="+q78+"&remarks_staff="+remarks_staff;
			
			$.ajax({url: "form/ia-action.php",data: "op=saveiadoc"+datanya, cache: false,
				success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseTwo").removeClass("in");
						$("#collapseThree").removeClass("in");
					}
					else{alert("Data not saved !!");}
				}
			});
			
		});

		//comment
		$("#comment").change(function(){
			var	file_no = $("#file_no").val(),comments = $(this).val();
			var 	datanya = "&file_no="+file_no+"&comment="+comments;
			$.ajax({url: "form/general-action.php",data: "op=ia_comment"+datanya,cache: false,
				beforeSend:function(){$("#t").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#t").text("Data saved");}
					else{$("#t").text("Data not saved !!");}
				}
			});
		});
		
		
	});
}) (jQuery);
</script>
<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
<div class="col-lg-12"><h3 class="page-header">INITIAL ASSESSMENT FORM for Unaccompanied Minors (UAM)</h3></div>

<div class=" row col-lg-12">
	<div class="col-lg-2  ">
		<div class="form-group">
			<label>UNHCR Case Number: <span  id="a"></span></label>
			<input class="form-control"  name="file_no" id="file_no" <?php if($edit==1){echo 'value="'.$_GET['file_no'].'" '; echo $disable;} ?> > 
		</div>			
	</div>
	<div class="col-lg-2  ">
		<label>Date of Assessment:</label>
		<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
			<input type="text" class="form-control" id="ia_date_assessment" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $assessment[0];} ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		</div>
	</div>
	<div class="col-lg-3  ">
		<div class="form-group">
			<label>Location:</label>
			<input class="form-control"  id="ia_location_assessment" placeholder="be as specific as possible" value="<?php if($edit==1){echo $assessment[1];} ?>">
		</div>			
	</div>
	<div class="col-lg-3 ">
		<div class="form-group">
			<label>Assessment conducted by: </label>
			<input class="form-control" id="ia_assessment_by" value="<?php if($edit==1){echo $assessment[2];} ?>">
		</div>
	</div>
	<div class="col-lg-2 ">
		<div class="form-group">
			<label></label><br>
			<?php echo $button;?>
		</div>
	</div>
	
</div> <!-- form-ia-date -->
<div class="col-lg-12">
	<?php if($edit==1){
		echo getWhoLastChange("".$data['file_no']."","ia_form");
	}?>
	<div class="panel-group" id="accordion">
		
		<!-- B panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Legal Documentation</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse ">
		<!-- panel body -->
		<div class="panel-body"> 
			<div class="col-lg-12">
				<div class="form-group">
					<label>1. Did you register in your neighbourhood/ local authorities?</label>
					<textarea class="form-control"id="legal_doc_1" ><?php if($edit==1){echo $legal_doc[0];} ?></textarea>
				</div>
				<div class="form-group">
					<label>2. Do you have an attestation letter?</label>
					<textarea class="form-control" id="legal_doc_2"><?php if($edit==1){echo $legal_doc[1];} ?></textarea>
				</div>
				<div class="form-group">
					<label>3. Do you have a valid passport and/ or other recognized travel documents? </label>
					<textarea class="form-control" id="legal_doc_3"><?php if($edit==1){echo $legal_doc[2];} ?></textarea>
				</div>
			</div>
    </div><!-- panel body -->
    <div class="panel-footer">
				<button class="btn btn-success" type="submit" id="save_legal_doc" title="Legal Documentation"><i class="fa fa-save"></i> Save</button>
    </div>
		</div>
		</div>
		<!-- B panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Current Living Condition</a>
			</h4>			
		</div>
		<div id="collapseThree" class="panel-collapse collapse">
		<div class="panel-body"><!-- panel body -->
			<div class="col-lg-12">
			<h4 >With whom are you living now?</h4>
			<div class="table-responsive">
			
				<div class="col-lg-6">
					<table class="table  ia-living">
					<tbody>
						<tr>
							<td align="right" width="10px"><label>1.</label></td>
							<td width="200px"><label>Name</label></td>
							<td><input class="form-control" id="uam_living_name" placeholder="Name"></td>
						</tr>
						<tr>
							<td align="right" ><label>2.</label></td>
							<td><label>Case number and Status </label><br><i>(if applicable)</i></td>
							<td><input class="form-control" id="uam_living_case_number" Placeholder="Case Number"></td>
						</tr>
						<tr>
							<td align="right" ><label>3.</label></td>
							<td><label>Country of origin</label></td>
							<td><input type="hidden" id="country2" value="<?php if($edit==1){echo $data['uam_living_coo'];}?>">
								<select class="form-control" id="uam_living_coo"></select>
							</td>
						</tr>
						<tr>
							<td align="right" ><label>4.</label></td>
							<td><label>Date of Birth/age</label></td>
							<td>
								<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control" id="uam_living_dob"  placeholder="yyyy-mm-dd" onchange="CalAge(uam_living_dob,uam_living_age);" ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
								<label>Age</label> <input class="form-control" id="uam_living_age" type="number">
							</td>
						</tr>
					</tbody>
					</table>
				</div>
				<div class="col-lg-6">
					<table class="table  ia-living">
					<tbody>
						<tr>
							<td align="right" width="10px"><label>5.</label></td>
							<td><label>Sex</label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="ia-living-sex"  value="M" checked>Male</label>
									<label class="radio-inline"><input type="radio" name="ia-living-sex"  value="F">Female</label>
								</div>
							</td>
						</tr>
						<tr>
							<td align="right" width="10px"><label>6.</label></td>
							<td><label>Phone number</label></td>
							<td><input class="form-control" id="uam_living_phone" placeholder="Phone"></td>
						</tr>
						<tr>
							<td align="right" width="10px"><label>7.</label></td>
							<td><label>Relationship to you</label></td>
							<td><select class="form-control" id="uam_living_relationship" ></select></td>
						</tr>
						<tr>
							<td align="right" width="10px"><label>8.</label></td>
							<td><label>When did you meet this person?</label></td>
							<td><input class="form-control" id="uam_living_meet" placeholder="When did you meet this person?"></td>
						</tr>
						
					</tbody>
					</table>
				</div>
				<div class="col-lg-6">
				<button type="submit" class="btn btn-success" id="add_whom_living" title="Add with whom are you living now?"><i class="fa fa-plus"></i> Add</button>			
				</div>
			</div>
			<h4 > Data </h4>
			<div id="whom_living"></div>
	
			</div>
			
			<div class="col-lg-12">
				<h4 >Visual inspection of the UAM’s current living environment</h4>
					<div class="col-lg-4">
						<div class="well well-sm">
						<div class="form-group">
							<h4>Type of Residence:</h4>
							<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="1" <?php if($edit==1){if($residence = 1) echo "checked";} ?> > House</label><br>
							<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="2" <?php if($edit==1){if($residence = 1) echo "checked";} ?> > Apartment</label><br>
							<label class="radio-inline"> <input type="radio" name="ia_type_residence" value="3" <?php if($edit==1){if($residence = 1) echo "checked";} ?> > Rented Room</label>
						</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm">
						<h4>House/Room condition:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="ia_room_1" value="1" <?php if($edit==1){if($room[0]==1)echo "checked";} ?>> In good condition</label><br>
							<label><input type="checkbox" id="ia_room_2" value="1" <?php if($edit==1){if($room[1]==1)echo "checked";} ?>> Medium repair</label><br>
							<label><input type="checkbox" id="ia_room_3" value="1" <?php if($edit==1){if($room[2]==1)echo "checked";} ?>> Leaking ceiling</label><br>
							<label><input type="checkbox" id="ia_room_4" value="1" <?php if($edit==1){if($room[3]==1)echo "checked";} ?>> Shared toilet/bathroom</label><br>
							<label><input type="checkbox" id="ia_room_5" value="1" <?php if($edit==1){if($room[4]==1)echo "checked";} ?>> No toilet/bathroom</label><br>
							<label><input type="checkbox" id="ia_room_6" value="1" <?php if($edit==1){if($room[5]==1)echo "checked";} ?>> Adequate air ventilation (windows, etc)</label><br>
							<label><input type="checkbox" id="ia_room_7" value="1" <?php if($edit==1){if($room[6]==1)echo "checked";} ?>> Inadequate air ventilation</label><br>
							<label><input type="checkbox" id="ia_room_8" value="1" <?php if($edit==1){if($room[7]==1)echo "checked";} ?>> Piped Clean & Safe Water</label><br>
							<label><input type="checkbox" id="ia_room_9" value="1" <?php if($edit==1){if($room[8]==1)echo "checked";} ?>> Shared kitchen</label><br>
							<label><input type="checkbox" id="ia_room_10" value="1" <?php if($edit==1){if($room[9]==1)echo "checked";} ?>> No kitchen</label><br>
							<label><input type="checkbox" id="ia_room_11" value="1" <?php if($edit==1){if($room[10]==1)echo "checked";} ?>> Damp</label><br>
							<label><input type="checkbox" id="ia_room_12" value="1" <?php if($edit==1){if($room[11]==1)echo "checked";} ?>> Smell</label><br>
						</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="well well-sm">
						<h4>UAM’s Furniture:</h4>
						<div class="checkbox">
						<label><input type="checkbox" id="ia_furniture_1" value="1" <?php if($edit==1){if($furniture[0]==1)echo "checked";} ?>> Bed </label><br>
						<label><input type="checkbox" id="ia_furniture_2" value="1" <?php if($edit==1){if($furniture[1]==1)echo "checked";} ?>> Mattress </label><br>
						<label><input type="checkbox" id="ia_furniture_3" value="1" <?php if($edit==1){if($furniture[2]==1)echo "checked";} ?>> Carpet </label><br>
						<label><input type="checkbox" id="ia_furniture_4" value="1" <?php if($edit==1){if($furniture[3]==1)echo "checked";} ?>> Wardrobe/Cupboard</label><br>
						<label><input type="checkbox" id="ia_furniture_5" value="1" <?php if($edit==1){if($furniture[4]==1)echo "checked";} ?>> Table</label><br>
						<label><input type="checkbox" id="ia_furniture_6" value="1" <?php if($edit==1){if($furniture[5]==1)echo "checked";} ?>> Chairs</label><br>
						</div>
						</div>
					</div>
					<div class="col-lg-12"></div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Does the UAM share a bedroom? </label><br><i>With whom?	</i>
							<textarea class="form-control" id="ia_living_cond_1" placeholder="type here"><?php if($edit==1){echo $living_cond[0];} ?></textarea>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Living space in m2</label>
							<input class="form-control" id="ia_living_cond_2" placeholder="type here" value="<?php if($edit==1){echo $living_cond[1];} ?>">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label>Rent:</label>
							<input class="form-control" id="ia_living_cond_3" placeholder="type here" value="<?php if($edit==1){echo $living_cond[2];} ?>">
						</div>
					</div>
					<div class="col-lg-12">
						<ol>
						<li>
							<div class="form-group">
							<label>Potential risks created by the living environment? Other comments?</label>
							<textarea class="form-control" id="ia_q1"><?php if($edit==1){echo $q12[0];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>How do you pay for regular expenses? Who pays the rent? Are you asked to contribute to household costs (food, rent, etc.)? Any coercion? The difference between chores and being enslaved</label>
							<textarea class="form-control" id="ia_q2"><?php if($edit==1){echo $q12[1];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>How do you spend the day? Do you have sleeping problems? </label>
							<textarea class="form-control" id="ia_q3"><?php if($edit==1){echo $q34[0];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>Do you have any health problems, conditions, or disabilities? Have you been treated for any illness since in Indonesia?</label>
							<textarea class="form-control" id="ia_q4"><?php if($edit==1){echo $q34[1];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>Do you face any problems in your current living arrangement? Do you have any problems with your housemates, neighbours, or others (e.g. police)? Anyone tease you? Potential of abuse*</label>
							<textarea class="form-control" id="ia_q5"><?php if($edit==1){echo $q56[0];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>Are there any people around you who can help you address these problems? What kinds of support do you need?</label>
							<textarea class="form-control" id="ia_q6"><?php if($edit==1){echo $q56[1];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>Do you have anything else you would like to tell me?</label>
							<textarea class="form-control" id="ia_q7"><?php if($edit==1){echo $q78[0];} ?></textarea>
							</div>
						</li>
						<li>
							<div class="form-group">
							<label>Comments from housemates:</label>
							<textarea class="form-control" id="ia_q8"><?php if($edit==1){echo $q78[1];} ?></textarea>
							</div>
						</li>
						</ol>
						<div class="form-group">
							<label>Remarks from CWS staff: </label>
							<textarea class="form-control" id="ia_remakrs_staff"><?php if($edit==1){echo $data['remarks_staff'];} ?></textarea>
						</div>
						
						<i>Please be sure to inform the UAM of next steps and the follow up that s/he can expect.</i>
						<br>
					</div>
			</div>
		</div>
    <!-- panel body -->
    <div class="panel-footer">
        <button  class="btn btn-success" id="save_ia_doc" title="Save for (Visual inspection of the UAM’s current living environment) "><i class="fa fa-save"></i> Save</button>
    </div>
		</div>
		</div>
		<!-- C panel -->
	</div>
</div>
<?php
// comment 
if($edit==1 AND $_SESSION['group_id']==1){
echo '<div class="col-lg-12" ><label>Comment:</label><textarea class="form-control" id="comment">'; echo Balikin($data['comment']); echo'</textarea><br><small id="t"></small></div> ';
}
?>
</div><!-- /#page-wrapper -->
</div>
