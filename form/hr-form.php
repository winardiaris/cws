<?php
	include("form/navigasi.php") ;
if(isset($_GET['op'])){
	if(isset($_GET['file_no'])){
		$qry = mysql_query("SELECT * FROM `hr` WHERE `file_no`='".$_GET['file_no']."' AND `status`='1'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
		$basic = explode(";",$data['basic']);
		
		$file_no = $_GET['file_no'];
		$qry2=mysql_query("	SELECT  `person`.`name`,`master_country`.`country_name` AS `coo` ,`person`.`phone`,`person`.`dob`,`person`.`sex`,`person`.`status`
						FROM `person`
						INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id`	 WHERE `person`.`file_no`='$file_no'") or die(mysql_error());
		$data2=mysql_fetch_array($qry2);
		
		
		
		
		
		$button = '<button class="btn btn-primary" id="update_hr1"><i class="fa fa-refresh"></i> Update</button>';
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
		$("#file_no_list").load("form/hr-action.php","op=find&find="+$(this).val());
		
		$("#file_no").keyup(function(){
			$("#value").load("form/hr-action.php","op=getdata&file_no="+$(this).val());
		})	
		.change(function() {
			$("#value").load("form/hr-action.php","op=getdata&file_no="+$(this).val());
			
			var datanya = "&file_no="+$(this).val();
			$.ajax({url: "form/hr-action.php",data: "op=check"+datanya,cache: false,
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
		$("#find").click(function(){
			var vtext = $("#value").text();
			vsplit = vtext.split(",");				
			$("#name").text(vsplit[0]);
			$("#coo").text(vsplit[1]);
			$("#phone").text(vsplit[2]);
			$("#adob").text(vsplit[3]);
			$("#sex").text(vsplit[4]);
			$("#status").text(vsplit[5]);
		})
		
		//save HR 1
		$("#save_hr1").click(function(){
			var file_no = $("#file_no").val(),
				report_date = $("#report_update").val(),
				location = $("#location").val(),
				ics = $("#ics").val(),
				reported = $("#reported").val(),
				situation = $("#situation").val();
			var datanya = "&file_no="+file_no+"&report_date="+report_date+"&value="+location+";"+ics+";"+reported+";"+situation;
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
				$.ajax({url:"form/hr-action.php",data:"op=savehr1"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#hr2a").trigger("click");
						$("#hr_1").focus();
					}else{alert("Data not saved !!");}}
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
				situation = $("#situation").val();
			var datanya = "&file_no="+file_no+"&report_date="+report_date+"&value="+location+";"+ics+";"+reported+";"+situation;
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
				$.ajax({url:"form/hr-action.php",data:"op=updatehr1"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#hr2a").trigger("click");
						$("#hr_1").focus();
					}else{alert("Data not saved !!");}}
				});
			}
		});
		
		$("#save_hr2").click(function(){
			var file_no=$("#file_no").val(),hr1=$("#hr_1").val(),hr2=$("#hr_2").val(),hr3=$("#hr_3").val(),hr4=$("#hr_4").val(),hr5=$("#hr_5").val(),hr6=$("#hr_6").val(),hr7=$("#hr_7").val(),
				datanya = "&file_no="+file_no+"&hr1="+hr1+"&hr2="+hr2+"&hr3="+hr3+"&hr4="+hr4+"&hr5="+hr5+"&hr6="+hr6+"&hr7="+hr7;
				$.ajax({url:"form/hr-action.php",data:"op=savehr2"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#hr2a").trigger("click");
					}else{alert("Data not saved !!");}}
				});
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
				<div class="col-lg-6">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
							<tr>
								<td width="200px"><label>File No: *</label>  <span id="a"></span></td>
								<td>
									<div class="input-group" >
										<input list="file_no_list" class="form-control" id="file_no" placeholder="File No / Name" <?php if($edit==1){echo 'value="'.$data['file_no'].'" disabled';} ?>>
										<datalist id="file_no_list"></datalist>
										<span class="input-group-btn"><button class="btn btn-primary" id="find" title="Get data" <?php if($edit==1){echo"disabled";}?>><i class="fa fa-arrow-right"></i></button></span>
									</div>
									
								</td>
							</tr>
							<tr>
								<td><label>Report Update: *</label></td>
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
							<tr>
								<td><label>IC’s Personal information:</label></td>
								<td><input class="form-control" id="ics" value="<?php if($edit==1){echo $basic[1];} ?>"></td>
							</tr>
							<tr>
								<td><label>Reported by: *</label></td>
								<td><input class="form-control" id="reported" value="<?php if($edit==1){echo $basic[2];} ?>"></td>
							</tr>
							</tbody>
							<tfoot>
								<tr>
								<td colspan="2"><small>* required</small></td></tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>
							<tr>
								<td align="right"><label>1.</label></td>
								<td><label>Name:</label></td>
								<td>
									<label id="name"><?php if($edit==1){echo $data2['name'];}?></label>
									<span id="value" class="hidden" ></span><!-- autoload -->
								</td>
							</tr>
							<tr>
								<td align="right"><label>2.</label></td>
								<td><label>Country of Origin:</label></td>
								<td><label  id="coo" ><?php if($edit==1){echo $data2['coo'];}?></label></td>
							</tr>
							<tr>
								<td align="right"><label>3.</label></td>
								<td><label>Phone:</label></td>
								<td><label id="phone" ><?php if($edit==1){echo $data2['phone'];}?></label></td>
							</tr>
							<tr>
								<td align="right"><label>4.</label></td>
								<td><label>DoB:</label></td>
								<td><label id="adob" ><?php if($edit==1){echo $data2['dob'];}?></label></td>
							</tr>
							<tr>
								<td align="right"><label>5.</label></td>
								<td><label>Sex:</label></td>
								<td><label id="sex" ><?php if($edit==1){echo $data2['sex'];}?></label></td>
							</tr>
							<tr>
								<td align="right"><label>6.</label></td>
								<td><label>Status:</label></td>
								<td><label id="status" ><?php if($edit==1){echo $data2['status'];}?></label></td>
							</tr>
							<tr>
								<td align="right"><label>7.</label></td>
								<td><label>Situation:</label></td>
								<td><input class="form-control" id="situation" value="<?php if($edit==1){echo $basic[3];} ?>"></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-6"><?php echo $button;?></div>
	
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
				<label>Chronology/ Situation reported:</label>
				<textarea rows="20" class="form-control" id="hr_1" ><?php if($edit==1){echo $data['hr1'];} ?></textarea><br>
				<label>Action taken:</label>
				<textarea rows="10" class="form-control" id="hr_2" ><?php if($edit==1){echo $data['hr2'];} ?></textarea><br>
				<label>Budget estimate:</label>
				<textarea rows="10" class="form-control" id="hr_3" ><?php if($edit==1){echo $data['hr3'];} ?></textarea><br>
				<label>Risk happened when the recommended procedure is not conducted: </label>
				<textarea rows="10" class="form-control" id="hr_4" ><?php if($edit==1){echo $data['hr4'];} ?></textarea><br>
				<label>Concomitant illnesses that would affect treatment of the disease:</label>
				<textarea rows="10" class="form-control" id="hr_5" ><?php if($edit==1){echo $data['hr5'];} ?></textarea><br>
				<label>How long the procedure will take: </label>
				<textarea rows="10" class="form-control" id="hr_6" ><?php if($edit==1){echo $data['hr6'];} ?></textarea><br>
				<label>Suggestion: </label>
				<textarea rows="10" class="form-control" id="hr_7" ><?php if($edit==1){echo $data['hr7'];} ?></textarea><br>
				<button class="btn btn-success" id="save_hr2"><i class="fa fa-save"></i> Save</button>
			</div>
			</div>
			</div>
			
		</div>
	</div>
</div>
</div>
