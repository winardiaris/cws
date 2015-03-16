<?php
$R="R10";$W="W10";
include("form/navigasi.php") ;

if(isset($_GET['op'])){
    $op = $_GET['op'];
	if($op=="edit"){
		$file_no = $_GET['file_no'];
		$hr_id = $_GET['hr_id'];
		$qry=mysql_query("SELECT * FROM `hr` WHERE `file_no`='$file_no' AND `status`='1' AND `hr_id`='$hr_id'") or die(mysql_error());
		$hr=mysql_fetch_array($qry);
		
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
					$("#a").addClass("text-warning").removeClass("text-success text-danger nodataperson nodata").html("<i class='fa fa-warning'></i> In use");
				}
				else if(msg=="avail"){
					$("#a").addClass("text-success").removeClass("text-danger text-warning nodataperson nodata").html("<i class='fa fa-check'></i> Available");				
					$("#family").load("form/hr-action.php","op=getData"+datanya);
				}
				else if(msg=="nodataperson"){
					$("#a").addClass("text-danger nodataperson").removeClass("text-success text-warning nodata").html("<i class='fa fa-warning'></i> No Data Person");
				}
				else if(msg=="nodatahr"){
					$("#a").addClass("text-danger nodata").removeClass("text-success text-warning nodataperson").html("<i class='fa fa-warning'></i> No Data HR");
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
		else if($("#a").hasClass("nodataperson")){
			var r = confirm("No Data Person for ["+file_no+"], Add new Data?");
			if (r == true) {window.location="?page=person-form";} 
			else {$("#file_no").val("").focus();}
		}
		else if($("#a").hasClass("nodata")){
			var r = confirm("No Data for ["+file_no+"], Add new Data?");
			if (r == true) {window.location="?page=hr-form";} 
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
					$("#family").focus();
					$("#file_no").attr("disabled",true);
					$("#report_update").attr("disabled",true);
					$("#location").attr("disabled",true);
					$("#ics").attr("disabled",true);
					$("#reported").attr("disabled",true);
					$("#save_hr1").attr("disabled",true);
				}else{alert("Data not saved !!");}
			}
			});
			$.ajax({url:"form/hr-action.php",data:"op=getID&file_no="+file_no,cache:false,success: function(msg){
				$("#hr_id").val(msg);
			}
			});
		}
	});
	
	//update HR 1
	$("#update_hr1").click(function(){
		 var file_no = $("#file_no").val(),
			report_date = $("#report_update").val(),
			location = $("#location").val(),
			ics = $("#ics").val(),
			reported = $("#reported").val(),
			hr_id = $("#hr_id").val();
		var datanya = "&file_no="+file_no+"&report_date="+report_date+"&location="+location+"&ics="+ics+"&reported="+reported+"&id_data="+id_data+"&hr_id="+hr_id;
		if(file_no == ""){
			alert("Please insert File No");
			$("#file_no").val("").focus();
		}
		else if($("#a").hasClass("text-warning")){
			alert("File Number in use");
			$("#file_no").val("").focus();
		}
		else if($("#a").hasClass("nodataperson")){
			var r = confirm("No Data Person for ["+file_no+"], Add new Data?");
			if (r == true) {window.location="?page=person-form";} 
			else {$("#file_no").val("").focus();}
		}
		else if($("#a").hasClass("nodata")){
			var r = confirm("No Data for ["+file_no+"], Add new Data?");
			if (r == true) {window.location="?page=hr-form";} 
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
			$.ajax({url:"form/hr-action.php",data:"op=update_basic"+datanya,cache:false,success: function(msg){
				if(msg=="success"){
					alert("Data has been updated !!");
					$("#hr2a").trigger("click");
					$("#family").focus();
					$("#file_no").attr("disabled",true);
					$("#report_update").attr("disabled",true);
					$("#location").attr("disabled",true);
					$("#ics").attr("disabled",true);
					$("#reported").attr("disabled",true);
					$("#update_hr1").attr("disabled",true);
				}else{alert("Data not saved !!");}
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
				}else{$("#thr_1").text("Data Not Saved!!");}
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
				}else{$("#thr_2").text("Data Not Saved!!");}
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
				}else{$("#thr_3").text("Data Not Saved!!");}
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
				}else{$("#thr_4").text("Data Not Saved!!");}
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
				}else{$("#thr_5").text("Data Not Saved!!");}
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
				}else{$("#thr_6").text("Data Not Saved!!");}
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
				}else{$("#thr_7").text("Data Not Saved!!");}
			}
		});
	});	

	//save HR 2
	$("#save_hr2").click(function(){
		var r = confirm("Add new or Edit  Health Report for other name?");
		if (r == true) {
			$("#hr_1").val('');
			$("#hr_2").val('');
			$("#hr_3").val('');
			$("#hr_4").val('');
			$("#hr_5").val('');
			$("#hr_6").val('');
			$("#hr_7").val('');
			$("#situation").val('');
			$("#family").focus();
			
		} 
		else {
			$("#hr1").removeClass("in");
			$("#hr2").removeClass("in");
		}
	});

});
</script>

<?php if($edit==1){?>
<script>
	$(document).ready(function(){
	var 	file_no = $("#file_no").val(),
			id_data =$("#id_data").val();
			datanya = "&file_no="+file_no+"&id_data="+id_data;
			$("#family").load("form/hr-action.php","op=getData"+datanya);
	
		$("#family").change(function(){
			var hr_id = $("#hr_id").val(),
			     person_id=$(this).val(),
			     datanya = "&hr_id="+hr_id+"&person_id="+person_id;
			
			$.ajax({url:"form/hr-action.php",data:"op=getHRData"+datanya,cache:false,
			beforeSend:function(){$("#loading_data").text("Loading...")},
			success: function(msg){
				var hr = msg.split("|||");
				$("#hr_1").val(hr[1]);
				$("#hr_2").val(hr[2]);
				$("#hr_3").val(hr[3]);
				$("#hr_4").val(hr[4]);
				$("#hr_5").val(hr[5]);
				$("#hr_6").val(hr[6]);
				$("#hr_7").val(hr[7]);
				$("#situation").val(hr[0]);
				$("#loading_data").text("Loaded");
				
			}
		});
		});
		//comment
		$("#comment").change(function(){
			var	file_no = $("#file_no").val(),comments = $(this).val(),hr_id=$("#hr_id").val();
			var 	datanya = "&file_no="+file_no+"&comment="+comments+"&hr_id="+hr_id;
			$.ajax({url: "form/general-action.php",data: "op=hr_comment"+datanya,cache: false,
				beforeSend:function(){$("#t").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#t").text("Data saved");}
					else{$("#t").text("Data not saved !!");}
				}
			});
		});
		

	});
	
	
	
	
</script>
<?php }?>
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
				<div class="col-lg-12 hidden">
					<label class="radio-inline"><input type="radio" name="id_data" value="0" <?php if(empty($_GET['a'])){echo "checked";}?> >New </label>
					<label class="radio-inline"><input type="radio" name="id_data" value="1" <?php if(isset($_GET['a'])){echo "checked";}?>>Reassesment </label>
					<input id="hr_id" value="<?php if($edit==1){echo $_GET['hr_id'];}?>">
			</div>
				<div class="col-lg-6">
					<div class="">
						<table class="table table-hover">
							<tbody>
							<tr>
								<td width="200px"><label>File No: *</label>  <span id="a"></span></td>
								<td>
									<input  class="form-control" id="file_no" placeholder="File No / Name" <?php if($edit==1){echo 'value="'.$hr['file_no'].'" disabled';} ?>>
								</td>
							</tr>
							<tr>
								<td><label>Report Date: *</label></td>
								<td>
									<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
										<input type="text" class="form-control" id="report_update"  placeholder="yyyy-mm-dd" <?php if($edit==1){echo 'value="'.$hr['report_date'].'"';} ?> ><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
								</td>
							</tr>
							<tr>
								<td><label>Location: *</label></td>
								<td><input class="form-control" id="location" value="<?php if($edit==1){echo Balikin($hr['location']);} ?>"></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="">
				       <table class="table ">
							<tbody>
								<tr>
									<td><label>IC’s Personal information:</label></td>
									<td><input class="form-control" id="ics" value="<?php if($edit==1){echo Balikin($hr['ics']);} ?>"></td>
								</tr>
								<tr>
									<td><label>Reported by: *</label></td>
									<td><input class="form-control" id="reported" value="<?php if($edit==1){echo Balikin($hr['reported']);} ?>"></td>
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
				<div class="col-lg-6">
<!--
					<input type="text" id="hr_id" hidden>
-->
				<label>Health Report for: </label>
				<select type="text" class="form-control" id="family">
				
				</select>
				<small id="loading_data"></small>
				</div>
				<div class="col-lg-6"><label>Situation: </label><input class="form-control" id="situation"></div>
				
				<br><br><br><br><br>
				<ol>
					<li>
						<label>Chronology/ Situation reported:</label>
						<textarea rows="20" class="form-control" id="hr_1" ><?php if($edit==1){echo $hr['hr1'];} ?></textarea><small id="thr_1"></small><br><br>
					</li>
					<li>
						<label>Action taken:</label>
						<textarea rows="10" class="form-control" id="hr_2" ><?php if($edit==1){echo $hr['hr2'];} ?></textarea><small id="thr_2"></small><br><br>
					</li>
					<li>
						<label>Budget estimate:</label>
						<textarea rows="10" class="form-control" id="hr_3" ><?php if($edit==1){echo $hr['hr3'];} ?></textarea><small id="thr_3"></small><br><br>
					</li>
					<li>
						<label>Risk happened when the recommended procedure is not conducted: </label>
						<textarea rows="10" class="form-control" id="hr_4" ><?php if($edit==1){echo $hr['hr4'];} ?></textarea><small id="thr_4"></small><br><br>
					</li>
					<li>
						<label>Concomitant illnesses that would affect treatment of the disease:</label>
						<textarea rows="10" class="form-control" id="hr_5" ><?php if($edit==1){echo $hr['hr5'];} ?></textarea><small id="thr_5"></small><br><br>
					</li>
					<li>
						<label>How long the procedure will take: </label>
						<textarea rows="10" class="form-control" id="hr_6" ><?php if($edit==1){echo $hr['hr6'];} ?></textarea><small id="thr_6"></small><br><br>
					</li>
					<li>
						<label>Suggestion: </label>
						<textarea rows="10" class="form-control" id="hr_7" ><?php if($edit==1){echo $hr['hr7'];} ?></textarea><small id="thr_7"></small><br><br>
					</li>
				</ol>
				<button class="btn btn-success" id="save_hr2"><i class="fa fa-save"></i> Save</button>
			</div>
			</div>
			</div>
			
		</div>
	</div>
<?php
// comment 
if($edit==1 AND $_SESSION['group_id']==1){
echo '<div class="col-lg-12" ><label>Comment:</label><textarea class="form-control" id="comment">'; echo Balikin($hr['comment']); echo'</textarea><br><small id="t"></small></div> ';
}
?>
</div>
</div>
