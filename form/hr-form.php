<?php
$R="R10";$W="W10";
include("form/navigasi.php") ;

if(isset($_GET['op'])){
	if(isset($_GET['file_no'])){
		$file_no = $_GET['file_no'];
		//$qry2=mysql_query(" ") or die(mysql_error());
		//$data2=mysql_fetch_array($qry2);
		
		
		$button = '<button class="btn btn-success" id="update_hr1"><i class="fa fa-refresh"></i> Update</button>';
		$edit = 1;
	}
}
else{
		$button = '<button class="btn btn-success" id="save_hr1"><i class="fa fa-save"></i> Save</button>';
		$edit = 0;
}
	
?>
<script>
$(document).ready(function(){
   //id_data 
	var id_data = $("input:radio[name=id_data]:checked").val();
	
	$("#file_no").change(function(){
		var 	file_no = $(this).val(),
				datanya = "&file_no="+file_no+"&id_data="+id_data;
		$.ajax({url: "form/hr-action.php",data: "op=check"+datanya,cache: false,
			success: function(msg){
				if(msg=="inuse"){
					$("#a").addClass("text-warning").removeClass("text-success text-danger").html("<i class='fa fa-warning'></i> In use");
				}
				else if(msg=="avail"){
					$("#a").addClass("text-success").removeClass("text-danger text-warning").html("<i class='fa fa-check'></i> Available");				
					$("#family").load("form/hr-action.php","op=getData"+datanya);
				}
				else if(msg=="nodataperson"){
					$("#a").addClass("text-danger").removeClass("text-success text-warning").html("<i class='fa fa-warning'></i> No Data Person");
				}
				else if(msg=="nodatahr"){
					$("#a").addClass("text-danger").removeClass("text-success text-warning").html("<i class='fa fa-warning'></i> No Data HR");
				}
			}
		});
	});

	//save HR 1
	$("#save_hr1").click(function(){
		var file_no = $("#file_no").val(),
			report_date = $("#report_update").val(),
			location = $("#location").val(),
			ics = $("#ics").val(),
			reported = $("#reported").val();
		var datanya = "&file_no="+file_no+"&report_date="+report_date+"&location="+location+"&ics="+ics+"&reported="+reported+"&id_data="+id_data;
		if(file_no == ""){
			alert("Please insert File No");
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
		else if(report_date == ""){
			alert("Please insert Report Update");
			$("#report_update").focus();
		}
		else if(location == ""){
			alert("Please insert Location");
			$("#location").focus();
		}
		else if(reported == ""){
			alert("Please insert Reported by");
			$("#reported").focus();
		}
		else{
			$.ajax({url:"form/hr-action.php",data:"op=save_basic"+datanya,cache:false,success: function(msg){
				if(msg=="success"){
					alert("Data has been saved !!");
					$("#hr2a").trigger("click");
					$("#hr_1").focus();
				}else{alert("Data not saved !!");}
			}
			});
			$.ajax({url:"form/hr-action.php",data:"op=getID&file_no="+file_no,cache:false,success: function(msg){
				$("#hr_id").val(msg);
			}
			});
		}
	});
	
	
	$("#hr_1").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr1"+datanya,cache:false,
			beforeSend:function(){$("#thr_1").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_1").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});
	$("#hr_2").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr2"+datanya,cache:false,
			beforeSend:function(){$("#thr_2").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_2").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});
	$("#hr_3").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr3"+datanya,cache:false,
			beforeSend:function(){$("#thr_3").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_3").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});
	$("#hr_4").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr4"+datanya,cache:false,
			beforeSend:function(){$("#thr_4").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_4").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});
	$("#hr_5").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr5"+datanya,cache:false,
			beforeSend:function(){$("#thr_5").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_5").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});	
	$("#hr_6").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr6"+datanya,cache:false,
			beforeSend:function(){$("#thr_6").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_6").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});
	$("#hr_7").change(function(){
		var 	hr_id = $("#hr_id").val(),person_id = $("#family").val(),situation = $("#situation").val(),val = $(this).val();
		datanya = "&hr_id="+hr_id+"&person_id="+person_id+"&situation="+situation+"&val="+val+"&id_data="+id_data;
		$.ajax({url:"form/hr-action.php",data:"op=save_hr7"+datanya,cache:false,
			beforeSend:function(){$("#thr_7").text("Saving data...")},
			success: function(msg){
				if(msg=="success"){$("#thr_7").text("Data Saved!!");
				}else{alert("Data not saved !!");}
			}
		});
	});	

	//save HR 2
	$("#save_hr2").click(function(){
		var r = confirm("Add new Helath Report?");
		if (r == true) {window.location="?page=person-form";} 
		else {$("#file_no").val("").focus();}
	});

});
</script>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12"><h3 class="page-header">Health Report Form</h3></div>
	<div class="col-lg-12">
		<div class="panel-group" id="accordion">
			<!-- HR 1 -->
			<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#hr1">Basic</a>
				</h4>
			</div>
			<div id="hr1" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="col-lg-12 ">
					<label class="radio-inline"><input type="radio" name="id_data" value="0" <?php if(empty($_GET['a'])){echo "checked";}?> >New </label>
					<label class="radio-inline"><input type="radio" name="id_data" value="1" <?php if(isset($_GET['a'])){echo "checked";}?>>Reassesment </label>
					<input id="hr_id" value="<?php if($edit==1){echo $_GET['hr_id'];}?>">
			</div>
				<div class="col-lg-6">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
							<tr>
								<td width="200px"><label>File No: *</label>  <span id="a"></span></td>
								<td>
									<input  class="form-control" id="file_no" placeholder="File No / Name" <?php if($edit==1){echo 'value="'.$data['file_no'].'" disabled';} ?>>
								</td>
							</tr>
							<tr>
								<td><label>Report Date: *</label></td>
								<td>
									<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
										<input type="text" class="form-control" id="report_update"  placeholder="yyyy-mm-dd" <?php if($edit==1){echo 'value="'.$data['report_date'].'"';} ?> ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</td>
							</tr>
							<tr>
								<td><label>Location: *</label></td>
								<td><input class="form-control" id="location" value="<?php if($edit==1){echo $basic[0];} ?>"></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="table-responsive">
				       <table class="table ">
							<tbody>
								<tr>
									<td><label>IC’s Personal information:</label></td>
									<td><input class="form-control" id="ics" value="<?php if($edit==1){echo $basic[1];} ?>"></td>
								</tr>
								<tr>
									<td><label>Reported by: *</label></td>
									<td><input class="form-control" id="reported" value="<?php if($edit==1){echo $basic[2];} ?>"></td>
								</tr>
								<tr>
									<td colspan="2"><?php echo $button;?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			
	
			</div>
			</div>
			</div>
			
			<!-- HR 2 -->
			<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#hr2" id="hr2a">Health Report</a>
				</h4>
			</div>
			<div id="hr2" class="panel-collapse collapse ">
			<div class="panel-body">
				<div class="col-lg-6"><input type="text" id="hr_id" hidden>
				<label>Health Report for: </label>
				<select type="text" class="form-control" id="family">
				
				</select></div>
				<div class="col-lg-6"><label>Situation: </label><input class="form-control" id="situation"></div>
				
				<br><br><br><br><br>
				<ol>
					<li>
						<label>Chronology/ Situation reported:</label>
						<textarea rows="20" class="form-control" id="hr_1" ><?php if($edit==1){echo $data['hr1'];} ?></textarea><small id="thr_1"></small><br><br>
					</li>
					<li>
						<label>Action taken:</label>
						<textarea rows="10" class="form-control" id="hr_2" ><?php if($edit==1){echo $data['hr2'];} ?></textarea><small id="thr_2"></small><br><br>
					</li>
					<li>
						<label>Budget estimate:</label>
						<textarea rows="10" class="form-control" id="hr_3" ><?php if($edit==1){echo $data['hr3'];} ?></textarea><small id="thr_3"></small><br><br>
					</li>
					<li>
						<label>Risk happened when the recommended procedure is not conducted: </label>
						<textarea rows="10" class="form-control" id="hr_4" ><?php if($edit==1){echo $data['hr4'];} ?></textarea><small id="thr_4"></small><br><br>
					</li>
					<li>
						<label>Risk happened when the recommended procedure is not conducted: </label>
						<textarea rows="10" class="form-control" id="hr_4" ><?php if($edit==1){echo $data['hr4'];} ?></textarea><small id="thr_4"></small><br><br>
					</li>
					<li>
						<label>Concomitant illnesses that would affect treatment of the disease:</label>
						<textarea rows="10" class="form-control" id="hr_5" ><?php if($edit==1){echo $data['hr5'];} ?></textarea><small id="thr_5"></small><br><br>
					</li>
					<li>
						<label>How long the procedure will take: </label>
						<textarea rows="10" class="form-control" id="hr_6" ><?php if($edit==1){echo $data['hr6'];} ?></textarea><small id="thr_6"></small><br><br>
					</li>
					<li>
						<label>Suggestion: </label>
						<textarea rows="10" class="form-control" id="hr_7" ><?php if($edit==1){echo $data['hr7'];} ?></textarea><small id="thr_7"></small><br><br>
					</li>
				</ol>
				<button class="btn btn-success" id="save_hr2"><i class="fa fa-save"></i> Save</button>
			</div>
			</div>
			</div>
			
		</div>
	</div>
</div>
</div>
