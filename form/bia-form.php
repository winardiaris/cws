<?php 
include("form/navigasi.php");
?>
<script>
$(document).ready(function(){
	var	file_no = $("#file_no").val(),
		aa = $("#col9aa"),ab = $("#col9ab"),
		ba = $("#col9ba"),bb = $("#col9bb"),
		ca = $("#col9ca"),cb = $("#col9cb"),
		da = $("#col9da"),db = $("#col9db"),
		ea = $("#col9ea"),eb = $("#col9eb");
		
		ab.slideUp();bb.slideUp();cb.slideUp(),db.slideUp();eb.slideUp();
		
		$(aa).click(function(){
			if (ab.is(':visible')) {ab.slideUp(100);}
			else {window.location="#col9aa";ab.slideDown();bb.slideUp();cb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(ba).click(function(){
			if (bb.is(':visible')) {bb.slideUp(100);}
			else {window.location="#col9ba";bb.slideDown();ab.slideUp();cb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(ca).click(function(){
			if (cb.is(':visible')) {cb.slideUp(100);}
			else {window.location="#col9ca";cb.slideDown();ab.slideUp();bb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(da).click(function(){
			if (db.is(':visible')) {db.slideUp(100);}
			else {window.location="#col9da";db.slideDown();ab.slideUp();bb.slideUp();cb.slideUp();eb.slideUp();}
		});
		$(ea).click(function(){
			if (eb.is(':visible')) {eb.slideUp(100);}
			else {window.location="#col9ea";eb.slideDown();ab.slideUp();bb.slideUp();cb.slideUp();db.slideUp();}
		});
		
		//check available
		$("#file_no").change(function(){
			var datanya = "&file_no="+$(this).val();
			
			$.ajax({url: "form/bia-action.php",data: "op=check"+datanya,cache: false,
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
		
		//Date of Assessment
		$("#save_1").click(function(){
			var	file_no = $("#file_no").val();
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
			else{	
				var	doa = $("#date_assessment").val(),
					location = $("#location_assessment").val(),
					cworker = $("#case_worker").val(),
					org = $("#org").val(),
					inorg = $("#inorg").val(),
					ioc = $('input:radio[name=ioc]:checked').val();
					
					if(ioc == "other"){
						var others = $("#others").val();
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc+";"+others;
					}
					
					else{
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc;
					}
					$.ajax({url:"form/bia-action.php",data:"op=saveassessment"+datanya,cache:false,success: function(msg){
							if(msg=="success"){
								alert("Data has been saved !!");
								$("#collapseDate").removeClass("in");
								$("#collapsePersonal").addClass("in");
								if(file_no !=""){
									$("#file_no").attr("disabled", true);
								}
								}else{alert("Data not saved !!");}}
					});
			}
		})
		//Personal history
		$("#save_2").click(function(){
			var	file_no = $("#file_no").val(),
				person1 = $("#person1").val(),
				person2 = $("#person2").val(),
				person3 = $("#person3").val(),
				datanya = "&file_no="+file_no+"&value="+person1+";"+person2+";"+person3;
				$.ajax({url:"form/bia-action.php",data:"op=savehistory"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapsePersonal").removeClass("in");
						$("#collapseIdentified").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//save Types of identified vulnerabilities
		$("#save_3").click(function(){
			var	file_no = $("#file_no").val(),
				toiv1a = $("#toiv1a:checked").length, toiv1b = $("#toiv1b:checked").length, toiv1c = $("#toiv1c:checked").length, toiv1d = $("#toiv1d").val(), toiv2a = $("#toiv2a:checked").length, toiv2b = $("#toiv2b:checked").length, toiv2c = $("#toiv2c:checked").length, toiv2d = $("#toiv2d").val(), toiv3a = $("#toiv3a:checked").length, toiv3b = $("#toiv3b:checked").length, toiv3c = $("#toiv3c:checked").length, toiv3d = $("#toiv3d").val(), toiv4a = $("#toiv4a:checked").length, toiv4b = $("#toiv4b:checked").length, toiv4c = $("#toiv4c:checked").length, toiv4d = $("#toiv4d").val(), toiv5a = $("#toiv5a:checked").length, toiv5b = $("#toiv5b:checked").length, toiv5c = $("#toiv5c:checked").length, toiv5d = $("#toiv5d").val(), toiv6a = $("#toiv6a:checked").length, toiv6b = $("#toiv6b:checked").length, toiv6c = $("#toiv6c:checked").length, toiv6d = $("#toiv6d").val(), toiv7a = $("#toiv7a:checked").length, toiv7b = $("#toiv7b:checked").length, toiv7c = $("#toiv7c:checked").length, toiv7d = $("#toiv7d").val(), toiv8a = $("#toiv8a:checked").length, toiv8b = $("#toiv8b:checked").length, toiv8c = $("#toiv8c:checked").length, toiv8d = $("#toiv8d").val(), toiv9a = $("#toiv9a:checked").length, toiv9b = $("#toiv9b:checked").length, toiv9c = $("#toiv9c:checked").length, toiv9d = $("#toiv9d").val(), toiv10a = $("#toiv10a:checked").length, toiv10b = $("#toiv10b:checked").length, toiv10c = $("#toiv10c:checked").length, toiv10d = $("#toiv10d").val(), toiv11a = $("#toiv11a:checked").length, toiv11b = $("#toiv11b:checked").length, toiv11c = $("#toiv11c:checked").length, toiv11d = $("#toiv11d").val(), toiv12a = $("#toiv12a:checked").length, toiv12b = $("#toiv12b:checked").length, toiv12c = $("#toiv12c:checked").length, toiv12d = $("#toiv12d").val(), toiv13a = $("#toiv13a:checked").length, toiv13b = $("#toiv13b:checked").length, toiv13c = $("#toiv13c:checked").length, toiv13d = $("#toiv13d").val(), toiv14a = $("#toiv14a:checked").length, toiv14b = $("#toiv14b:checked").length, toiv14c = $("#toiv14c:checked").length, toiv14d = $("#toiv14d").val(), toiv15a = $("#toiv15a:checked").length, toiv15b = $("#toiv15b:checked").length, toiv15c = $("#toiv15c:checked").length, toiv15d = $("#toiv15d").val(), toiv16a = $("#toiv16a:checked").length, toiv16b = $("#toiv16b:checked").length, toiv16c = $("#toiv16c:checked").length, toiv16d = $("#toiv16d").val(), toiv17a = $("#toiv17a:checked").length, toiv17b = $("#toiv17b:checked").length, toiv17c = $("#toiv17c:checked").length, toiv17d = $("#toiv17d").val(), toiv18a = $("#toiv18a:checked").length, toiv18b = $("#toiv18b:checked").length, toiv18c = $("#toiv18c:checked").length, toiv18d = $("#toiv18d").val(), toiv19a = $("#toiv19a:checked").length, toiv19b = $("#toiv19b:checked").length, toiv19c = $("#toiv19c:checked").length, toiv19d = $("#toiv19d").val(), toiv20a = $("#toiv20a:checked").length, toiv20b = $("#toiv20b:checked").length, toiv20c = $("#toiv20c:checked").length, toiv20d = $("#toiv20d").val(), toiv21a = $("#toiv21a:checked").length, toiv21b = $("#toiv21b:checked").length, toiv21c = $("#toiv21c:checked").length, toiv21d = $("#toiv21d").val(), toiv22a = $("#toiv22a:checked").length, toiv22b = $("#toiv22b:checked").length, toiv22c = $("#toiv22c:checked").length, toiv22d = $("#toiv22d").val(), toiv23a = $("#toiv23a:checked").length, toiv23b = $("#toiv23b:checked").length, toiv23c = $("#toiv23c:checked").length, toiv23d = $("#toiv23d").val(), toiv24a = $("#toiv24a:checked").length, toiv24b = $("#toiv24b:checked").length, toiv24c = $("#toiv24c:checked").length, toiv24d = $("#toiv24d").val(), toiv25a = $("#toiv25a:checked").length, toiv25b = $("#toiv25b:checked").length, toiv25c = $("#toiv25c:checked").length, toiv25d = $("#toiv25d").val(), toiv26a = $("#toiv26a:checked").length, toiv26b = $("#toiv26b:checked").length, toiv26c = $("#toiv26c:checked").length, toiv26d = $("#toiv26d").val(), toiv27a = $("#toiv27a:checked").length, toiv27b = $("#toiv27b:checked").length, toiv27c = $("#toiv27c:checked").length, toiv27d = $("#toiv27d").val(), toiv28a = $("#toiv28a:checked").length, toiv28b = $("#toiv28b:checked").length, toiv28c = $("#toiv28c:checked").length, toiv28d = $("#toiv28d").val(), toiv29a = $("#toiv29a:checked").length, toiv29b = $("#toiv29b:checked").length, toiv29c = $("#toiv29c:checked").length, toiv29d = $("#toiv29d").val();
				
			var datanya = "&file_no="+file_no+"&value="+toiv1a+";"+toiv1b+";"+toiv1c+";"+toiv1d+";"+toiv2a+";"+toiv2b+";"+toiv2c+";"+toiv2d+";"+toiv3a+";"+toiv3b+";"+toiv3c+";"+toiv3d+";"+toiv4a+";"+toiv4b+";"+toiv4c+";"+toiv4d+";"+toiv5a+";"+toiv5b+";"+toiv5c+";"+toiv5d+";"+toiv6a+";"+toiv6b+";"+toiv6c+";"+toiv6d+";"+toiv7a+";"+toiv7b+";"+toiv7c+";"+toiv7d+";"+toiv8a+";"+toiv8b+";"+toiv8c+";"+toiv8d+";"+toiv9a+";"+toiv9b+";"+toiv9c+";"+toiv9d+";"+toiv10a+";"+toiv10b+";"+toiv10c+";"+toiv10d+";"+toiv11a+";"+toiv11b+";"+toiv11c+";"+toiv11d+";"+toiv12a+";"+toiv12b+";"+toiv12c+";"+toiv12d+";"+toiv13a+";"+toiv13b+";"+toiv13c+";"+toiv13d+";"+toiv14a+";"+toiv14b+";"+toiv14c+";"+toiv14d+";"+toiv15a+";"+toiv15b+";"+toiv15c+";"+toiv15d+";"+toiv16a+";"+toiv16b+";"+toiv16c+";"+toiv16d+";"+toiv17a+";"+toiv17b+";"+toiv17c+";"+toiv17d+";"+toiv18a+";"+toiv18b+";"+toiv18c+";"+toiv18d+";"+toiv19a+";"+toiv19b+";"+toiv19c+";"+toiv19d+";"+toiv20a+";"+toiv20b+";"+toiv20c+";"+toiv20d+";"+toiv21a+";"+toiv21b+";"+toiv21c+";"+toiv21d+";"+toiv22a+";"+toiv22b+";"+toiv22c+";"+toiv22d+";"+toiv23a+";"+toiv23b+";"+toiv23c+";"+toiv23d+";"+toiv24a+";"+toiv24b+";"+toiv24c+";"+toiv24d+";"+toiv25a+";"+toiv25b+";"+toiv25c+";"+toiv25d+";"+toiv26a+";"+toiv26b+";"+toiv26c+";"+toiv26d+";"+toiv27a+";"+toiv27b+";"+toiv27c+";"+toiv27d+";"+toiv28a+";"+toiv28b+";"+toiv28c+";"+toiv28d+";"+toiv29a+";"+toiv29b+";"+toiv29c+";"+toiv29d;
			
				$.ajax({url:"form/bia-action.php",data:"op=savetoiv"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseIdentified").removeClass("in");
						$("#collapseEdu").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//save education
		$("#save_4").click(function(){
			var	file_no = $("#file_no").val(),
				edu1 = $("#edu1").val(),edu2 = $("#edu2").val(),edu3 = $("#edu3").val(),edu4 = $("#edu4").val(),
				edu5 = $("#edu5").val(),edu6 = $("#edu6").val(),edu7 = $("#edu7").val();
			var datanya = "&file_no="+file_no+"&value="+edu1+";"+edu2+";"+edu3+";"+edu4+";"+edu5+";"+edu6+";"+edu7;
				$.ajax({url:"form/bia-action.php",data:"op=saveedu"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseEdu").removeClass("in");
						$("#collapseHealth").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//save health
		$("#save_5").click(function(){
			var	file_no = $("#file_no").val(),
				health1 = $("#health1").val(),
				health2 = $("#health2").val(),
				health3 = $('input:radio[name=health3]:checked').val(),
				health4 = $("#health4").val(),
				health5a = $("#health5a:checked").length, health5b = $("#health5b:checked").length,health5c = $("#health5c:checked").length,health5d = $("#health5d").val(),health6a = $("#health6a:checked").length, health6b = $("#health6b:checked").length,health6c = $("#health6c:checked").length,health6d = $("#health6d").val(),health7a = $("#health7a:checked").length, health7b = $("#health7b:checked").length,health7c = $("#health7c:checked").length,health7d = $("#health7d").val(),health8a = $("#health8a:checked").length, health8b = $("#health8b:checked").length,health8c = $("#health8c:checked").length,health8d = $("#health8d").val(),health9a = $("#health9a:checked").length, health9b = $("#health9b:checked").length,health9c = $("#health9c:checked").length,health9d = $("#health9d").val();
			
			var datanya = "&file_no="+file_no+"&value="+health1+";"+health2+";"+health3+";"+health4+";"+health5a+";"+health5b+";"+health5c+";"+health5d+";"+health6a+";"+health6b+";"+health6c+";"+health6d+";"+health7a+";"+health7b+";"+health7c+";"+health7d+";"+health8a+";"+health8b+";"+health8c+";"+health8d+";"+health9a+";"+health9b+";"+health9c+";"+health9d;
				
				$.ajax({url:"form/bia-action.php",data:"op=savehealth"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseHealth").removeClass("in");
						$("#collapsePsy").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//Psychosocial
		$("#save_6").click(function(){
			var	file_no = $("#file_no").val(),
				psy1 = $("#psy1").val(),psy2 = $("#psy2").val(),psy3 = $("#psy3").val(),psy4 = $("#psy4").val(),psy5 = $("#psy5").val(),psy6 = $("#psy6").val(),psy7 = $("#psy7").val(),
				psy8a = $('input:radio[name=psy8a]:checked').val(),psy8b = $("#psy8b").val(),psy9a = $('input:radio[name=psy9a]:checked').val(),psy9b = $("#psy9b").val(),psy10a = $('input:radio[name=psy10a]:checked').val(),psy10b = $("#psy10b").val(),psy11a = $('input:radio[name=psy11a]:checked').val(),psy11b = $("#psy11b").val(),psy12a = $('input:radio[name=psy12a]:checked').val(),psy12b = $("#psy12b").val(),psy13a = $('input:radio[name=psy13a]:checked').val(),psy13b = $("#psy13b").val(),psy14a = $('input:radio[name=psy14a]:checked').val(),psy14b = $("#psy14b").val(),psy15a = $('input:radio[name=psy15a]:checked').val(),psy15b = $("#psy15b").val(),psy16a = $('input:radio[name=psy16a]:checked').val(),psy16b = $("#psy16b").val(),psy17a = $('input:radio[name=psy17a]:checked').val(),psy17b = $("#psy17b").val(),psy18a = $('input:radio[name=psy18a]:checked').val(),psy18b = $("#psy18b").val();
			var datanya = "&file_no="+file_no+"&value="+psy1+";"+psy2+";"+psy3+";"+psy4+";"+psy5+";"+psy6+";"+psy7+";"+psy8a+";"+psy8b+";"+psy8a+";"+psy8b+";"+psy9a+";"+psy9b+";"+psy10a+";"+psy10b+";"+psy11a+";"+psy11b+";"+psy12a+";"+psy12b+";"+psy13a+";"+psy13b+";"+psy14a+";"+psy14b+";"+psy15a+";"+psy15b+";"+psy16a+";"+psy16b+";"+psy17a+";"+psy17b+";"+psy18a+";"+psy18b;
			
				$.ajax({url:"form/bia-action.php",data:"op=savepsy"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapsePsy").removeClass("in");
						$("#collapseInteraction").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//interaction
		$("#save_7").click(function(){
			var	file_no = $("#file_no").val(),
				interaction = $("#interaction").val();
				datanya ="&file_no="+file_no+"&value="+interaction;
			
				$.ajax({url:"form/bia-action.php",data:"op=saveinter"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseInteraction").removeClass("in");
						$("#collapseLiving").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		
});
</script>


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
					<input class="form-control" id="file_no">
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of Assessment: </label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="date_assessment" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Location</label>
					<input class="form-control" id="location_assessment">
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
					<label class="radio-inline"><input type="radio" name="ioc"  value="other" id="other" >Other</label>
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
					<textarea class="form-control" id="person1"></textarea>
				</li>
				<li>
					<label>During the flight</label>
					<textarea class="form-control" rows="15" id="person2"></textarea>
				</li>
				<li>
					<label>In the country of Asylum</label>
					<textarea class="form-control" id="person3"></textarea>
				</li>
			</ol>
			<br><button class="btn btn-success" id="save_2"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Types of identified vulnerabilities -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseIdentified">Types of identified vulnerabilities</a>
			</h4>
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
				<table class="table table-bordered table-hover">
					<tr>
						<td width="300px"><label>Child at risk of deportation</label></td>
						<td width="200px">
							<label><input type="checkbox" name="toiv1a"> CoO</label>
							<label><input type="checkbox" name="toiv1b"> During flight </label>
							<label><input type="checkbox" name="toiv1c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv1d"></textarea></td>
					</tr>
					<tr>
						<td><label>Child without legal documentation</label></td>
						<td>
							<label><input type="checkbox" name="toiv2a"> CoO</label>
							<label><input type="checkbox" name="toiv2b"> During flight </label>
							<label><input type="checkbox" name="toiv2c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv2d"></textarea></td>
					</tr>
					<tr>
						<td><label>Street Children</label></td>
						<td>
							<label><input type="checkbox" name="toiv3a"> CoO</label>
							<label><input type="checkbox" name="toiv3b"> During flight </label>
							<label><input type="checkbox" name="toiv3c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv3d"></textarea></td>
					</tr>
					<tr>
						<td><label>Medical Case</label></td>
						<td>
							<label><input type="checkbox" name="toiv4a"> CoO</label>
							<label><input type="checkbox" name="toiv4b"> During flight </label>
							<label><input type="checkbox" name="toiv4c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv4d"></textarea></td>
					</tr>
					<tr>
						<td><label>Disabled child</label></td>
						<td>
							<label><input type="checkbox" name="toiv5a"> CoO</label>
							<label><input type="checkbox" name="toiv5b"> During flight </label>
							<label><input type="checkbox" name="toiv5c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv5d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of violence</label></td>
						<td>
							<label><input type="checkbox" name="toiv6a"> CoO</label>
							<label><input type="checkbox" name="toiv6b"> During flight </label>
							<label><input type="checkbox" name="toiv6c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv6d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of sexual violence</label></td>
						<td>
							<label><input type="checkbox" name="toiv7a"> CoO</label>
							<label><input type="checkbox" name="toiv7b"> During flight </label>
							<label><input type="checkbox" name="toiv7c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv7d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of trafficking</label></td>
						<td>
							<label><input type="checkbox" name="toiv8a"> CoO</label>
							<label><input type="checkbox" name="toiv8b"> During flight </label>
							<label><input type="checkbox" name="toiv8c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv8d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of Child Labour</label></td>
						<td>
							<label><input type="checkbox" name="toiv9a"> CoO</label>
							<label><input type="checkbox" name="toiv9b"> During flight </label>
							<label><input type="checkbox" name="toiv9c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv9d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of forced Labour</label></td>
						<td>
							<label><input type="checkbox" name="toiv10a"> CoO</label>
							<label><input type="checkbox" name="toiv10b"> During flight </label>
							<label><input type="checkbox" name="toiv10c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv10d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of exploitation</label></td>
						<td>
							<label><input type="checkbox" name="toiv11a"> CoO</label>
							<label><input type="checkbox" name="toiv11b"> During flight </label>
							<label><input type="checkbox" name="toiv11c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv11d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of prostitution</label></td>
						<td>
							<label><input type="checkbox" name="toiv12a"> CoO</label>
							<label><input type="checkbox" name="toiv12b"> During flight </label>
							<label><input type="checkbox" name="toiv12c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv12d"></textarea></td>
					</tr>
					<tr>
						<td><label>Minor victim used or recruited by smugglers</label></td>
						<td>
							<label><input type="checkbox" name="toiv13a"> CoO</label>
							<label><input type="checkbox" name="toiv13b"> During flight </label>
							<label><input type="checkbox" name="toiv13c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv13d"></textarea></td>
					</tr>
					<tr>
						<td><label>Minor in conflict with the Law</label></td>
						<td>
							<label><input type="checkbox" name="toiv14a"> CoO</label>
							<label><input type="checkbox" name="toiv14b"> During flight </label>
							<label><input type="checkbox" name="toiv14c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv14d"></textarea></td>
					</tr>
					<tr>
						<td><label>In hiding <small>(e.g. fear of being identified or found)</small></label></td>
						<td>
							<label><input type="checkbox" name="toiv15a"> CoO</label>
							<label><input type="checkbox" name="toiv15b"> During flight </label>
							<label><input type="checkbox" name="toiv15c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv15d"></textarea></td>
					</tr>
					<tr>
						<td><label>Experiencing rejection by community</label></td>
						<td>
							<label><input type="checkbox" name="toiv16a"> CoO</label>
							<label><input type="checkbox" name="toiv16b"> During flight </label>
							<label><input type="checkbox" name="toiv16c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv16d"></textarea></td>
					</tr>
					<tr>
						<td><label>Bodily injured</label></td>
						<td>
							<label><input type="checkbox" name="toiv17a"> CoO</label>
							<label><input type="checkbox" name="toiv17b"> During flight </label>
							<label><input type="checkbox" name="toiv17c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv17d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of severe beatings</label></td>
						<td>
							<label><input type="checkbox" name="toiv18a"> CoO</label>
							<label><input type="checkbox" name="toiv18b"> During flight </label>
							<label><input type="checkbox" name="toiv18c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv18d"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of basic needs <small>(food, water, shelter)</small></label></td>
						<td>
							<label><input type="checkbox" name="toiv19a"> CoO</label>
							<label><input type="checkbox" name="toiv19b"> During flight </label>
							<label><input type="checkbox" name="toiv19c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv19d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" name="toiv20a"> CoO</label>
							<label><input type="checkbox" name="toiv20b"> During flight </label>
							<label><input type="checkbox" name="toiv20c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv20d"></textarea></td>
					</tr>
					<tr>
						<td><label>Unsafe in community <br><small>(a.g. abuse by family or community, domestic violence)</small></label></td>
						<td>
							<label><input type="checkbox" name="toiv21a"> CoO</label>
							<label><input type="checkbox" name="toiv21b"> During flight </label>
							<label><input type="checkbox" name="toiv21c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv21d"></textarea></td>
					</tr>
					<tr>
						<td><label>Other <small>(explain)</small></label></td>
						<td>
							<label><input type="checkbox" name="toiv22a"> CoO</label>
							<label><input type="checkbox" name="toiv22b"> During flight </label>
							<label><input type="checkbox" name="toiv22c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv22d"></textarea></td>
					</tr>
					<tr>
						<td colspan="3" class="info" ><p>Special attention: Girls at risk <small>(can be cumulated with previous section)</small></p></td>
					</tr>
					<tr>
						<td><label>Girl without protection</label></td>
						<td>
							<label><input type="checkbox" name="toiv23a"> CoO</label>
							<label><input type="checkbox" name="toiv23b"> During flight </label>
							<label><input type="checkbox" name="toiv23c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv23d"></textarea></td>
					</tr>
					<tr>
						<td><label>Pregnant girl</label></td>
						<td>
							<label><input type="checkbox" name="toiv24a"> CoO</label>
							<label><input type="checkbox" name="toiv24b"> During flight </label>
							<label><input type="checkbox" name="toiv24c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv24d"></textarea></td>
					</tr>
					<tr>
						<td><label>Adolescent parent</label></td>
						<td>
							<label><input type="checkbox" name="toiv25a"> CoO</label>
							<label><input type="checkbox" name="toiv25b"> During flight </label>
							<label><input type="checkbox" name="toiv25c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv25d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of rape / sexual abuses</label></td>
						<td>
							<label><input type="checkbox" name="toiv26a"> CoO</label>
							<label><input type="checkbox" name="toiv26b"> During flight </label>
							<label><input type="checkbox" name="toiv26c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv26d"></textarea></td>
					</tr>
					<tr>
						<td><label>Engaging in survival sex</label></td>
						<td>
							<label><input type="checkbox" name="toiv27a"> CoO</label>
							<label><input type="checkbox" name="toiv27b"> During flight </label>
							<label><input type="checkbox" name="toiv27c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv27d"></textarea></td>
					</tr>
					<tr>
						<td><label>Other forms of GBVs</label></td>
						<td>
							<label><input type="checkbox" name="toiv28a"> CoO</label>
							<label><input type="checkbox" name="toiv28b"> During flight </label>
							<label><input type="checkbox" name="toiv28c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv28d"></textarea></td>
					</tr>
					<tr>
						<td><label>Victim of forced marriage</label></td>
						<td>
							<label><input type="checkbox" name="toiv29a"> CoO</label>
							<label><input type="checkbox" name="toiv29b"> During flight </label>
							<label><input type="checkbox" name="toiv29c"> CoA</label>
						</td>
						<td><label>Observations:</label>
							<textarea class="form-control" id="toiv29d"></textarea></td>
					</tr>
					
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
							<textarea class="form-control" id="edu1"></textarea>
							<br>
							<label>	*Do you like to go to school?</label>
							<textarea class="form-control" id="edu2"></textarea>
							<br>
							<label>	*How do you spend your time? What do you like to do? <small>(Language, Computer, etc.)</small> </label>
							<textarea class="form-control" id="edu3"></textarea>
							<br>
							<label>	Observations</label>
							<textarea class="form-control" id="edu4"></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Level of education / grade</label></td>
						<td><textarea class="form-control" id="edu5"></textarea></td>
					</tr>
					<tr>
						<td><label>Skills & Occupation</label></td>
						<td><textarea class="form-control" id="edu6"></textarea></td>
					</tr>
					<tr>
						<td><label>Previous occupation, if any</label></td>
						<td><textarea class="form-control" id="edu7"></textarea></td>
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
							<textarea class="form-control" id="health1"></textarea>
							<label>Observation:</label>
							<textarea class="form-control" id="health2"></textarea>
						</td>
					</tr>
					<tr>
						<td width="300px">
							<Label>Whether medical attention is being</Label><br>
							<label class="checkbox-inline"><input type="radio" value="0" name="health3"> Received</label>
							<label class="checkbox-inline"><input type="radio" value="1" name="health3"> Required</label>
						</td>
						<td colspan="2">
							<label>Observation:</label>
							<textarea class="form-control" id="health4"></textarea>
						</td>
					</tr>
					<tr>
						<td><label>Physical Health problems</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health5a"> Past history </label><br>
							<label><input type="checkbox" id="health5b"> During flight </label><br>
							<label><input type="checkbox" id="health5c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health5d"></textarea></td>
					</tr>
					<tr>
						<td><label>Child with HIV/AIDS</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health6a"> Past history </label><br>
							<label><input type="checkbox" id="health6b"> During flight </label><br>
							<label><input type="checkbox" id="health6c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health6d"></textarea></td>
							
					</tr>
					<tr>
						<td><label>Addictions <i>(Drugs, alcohol, etc.)</i></label></td>
						<td width="200px">
							<label><input type="checkbox" id="health7a"> Past history </label><br>
							<label><input type="checkbox" id="health7b"> During flight </label><br>
							<label><input type="checkbox" id="health7c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health7d"></textarea></td>
					</tr>
					<tr>
						<td><label>Hearing impairment</label></td>
						<td width="200px">
							<label><input type="checkbox" id="health8a"> Past history </label><br>
							<label><input type="checkbox" id="health8b"> During flight </label><br>
							<label><input type="checkbox" id="health8c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health8d"></textarea></td>
					</tr>
					<tr>
						<td><label>Mental disability</label></td>
						<td style="max-width:200px;">
							<label><input type="checkbox" id="health9a"> Past history </label><br>
							<label><input type="checkbox" id="health9b"> During flight </label><br>
							<label><input type="checkbox" id="health9c"> At present</label><br>
						</td>
						<td>
							<label>Observation:</label>
							<textarea class="form-control" id="health9d"></textarea></td>
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
					<input type="text" class="form-control" id="psy1" value="" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-12"></div><br>
			<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<td width="200px" rowspan="4"><br><br><br><b>SOCIAL RESOURCES</b></td>
						<td width="300px"><label>Is the Child able to form and maintain relationships with family/friends?</label></td>
						<td><textarea class="form-control" id="psy2"></textarea></td>
					</tr>
					<tr>
						<td><label>What are the Child’s favorite activities?</label></td>
						<td><textarea class="form-control" id="psy3"></textarea></td>
					</tr>
					<tr>
						<td><label>Hobbies & interests</label></td>
						<td><textarea class="form-control" id="psy4"></textarea></td>
					</tr>
					<tr>
						<td><label>Daily Activities - How child occupy himself daily?</label></td>
						<td><textarea class="form-control" id="psy5"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you feel healthy?</label><br><i> If not, please, explain type of sickness/how you feel physically.</i> </td>
						<td><textarea class="form-control" id="psy6"></textarea></td>
					</tr>
					<tr>
						<td colspan="2"><label>*Do you have access to medical care?</label><br><i>If not, explain why?</i> </td>
						<td><textarea class="form-control" id="psy7"></textarea></td>
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
							<label class="radio-inline"><input type="radio" name="psy8a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy8a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy8b"></textarea></td>
					</tr>
					<tr>
						<td><label>Depressed</label><br><p><i>(a person experiences deep, unshakable sadness and diminished interest in nearly all activities)</i></p></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy9a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy9a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy9b"></textarea></td>
					</tr>
					<tr>
						<td><label>Sleeping disturbance</label><br><i>(Any condition that interferes with sleep)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy10a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy10a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy10b"></textarea></td>
					</tr>
					<tr>
						<td><label>Easily get angry</label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy11a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy11a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy11b"></textarea></td>
					</tr>
					<tr>
						<td><label>Confused </label><br><i>(disoriented mentally; being unable to think with clarity or act with understanding and intelligence)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy12a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy12a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy12b"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of concentration </label><br><i>(inability to direct one's thinking in whatever direction one would intend))</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy13a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy13a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy13b"></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling hopeless</label><br><i>(without hope; despairing)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy14a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy14a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy14b"></textarea></td>
					</tr>
					<tr>
						<td><label>Feeling unworthy </label><br><i>(his/her sense of meaning is undermined)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy15a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy15a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy15b"></textarea></td>
					</tr>
					<tr>
						<td><label>Lack of trust to others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy16a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy16a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy16b"></textarea></td>
					</tr>
					<tr>
						<td><label>Deprived from community/others </label></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy17a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy17a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy17b"></textarea></td>
					</tr>
					<tr>
						<td><label>Coping Mechanism </label><br><i>(an adaptation to environmental stress that is based on conscious or unconscious choice and that enhances control over behaviour or gives psychological comfort)</i></td>
						<td>
							<div class="form-group">
							<label class="radio-inline"><input type="radio" name="psy18a" value="1"> Yes</label><br>
							<label class="radio-inline"><input type="radio" name="psy18a" value="0" checked> No</label>
							</div>
						</td>
						<td><textarea class="form-control" id="psy18b"></textarea></td>
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
		<div id="collapseInteraction" class="panel-collapse collapse in ">
		<div class="panel-body">
			<label>INTERACTION <small>with the person during the interview</small></label><br>
			<i>Simple Description of the Child AS or refugee as he appears - (describe what you see; highlight the positive, not just the negative; Avoid labels.)</i><br><br><br>
			<div class="form-group">
				<label>Mood, attitude, appearance, speech, affect, thought consent</label>
				<textarea class="form-control" id="interaction" rows="5">
				
				</textarea>
			</div>
			
			<br><button class="btn btn-success" id="save_7"><i class="fa fa-save"></i> Save</button>	
			
		</div>
		</div>
		</div>
		<!-- Living conditions in place of residence -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseLiving"> Living conditions in place of residence</a>
			</h4>
		</div>
		<div id="collapseLiving" class="panel-collapse collapse">
		<div class="panel-body">
			
			<!-- a). Suggested Questions: -->
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col9aa" >a). Suggested Questions:</span></div>
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
					<div class="col-lg-6">
						<div class="table-responsive checkbox">
							<table class="table table-bordered">
								<tr>
									<td><label><input type="checkbox" id="9c01a">Fan</label></td>
									<td><label><input type="checkbox" id="9c01b">Private</label>
										<label><input type="checkbox" id="9c01c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c03a">TV set</label></td>
									<td><label><input type="checkbox" id="9c03b">Private</label>
										<label><input type="checkbox" id="9c03c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c05a">Telephone (mobile)</label></td>
									<td><label><input type="checkbox" id="9c05b">Private</label>
										<label><input type="checkbox" id="9c05c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c07a">Radio</label></td>
									<td><label><input type="checkbox" id="9c07b">Private</label>
										<label><input type="checkbox" id="9c07c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c09a">Furniture</label></td>
									<td><label><input type="checkbox" id="9c09b">Private</label>
										<label><input type="checkbox" id="9c09c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c11a">Refrigerator</label></td>
									<td><label><input type="checkbox" id="9c11b">Private</label>
										<label><input type="checkbox" id="9c11c">House owner</label>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive checkbox">
							<table class="table table-bordered">
								<tr>
									<td><label><input type="checkbox" id="9c02a">Satellite/Cable TV</label></td>
									<td><label><input type="checkbox" id="9c02b">Private</label>
										<label><input type="checkbox" id="9c02c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c04a">Washing machine</label></td>
									<td><label><input type="checkbox" id="9c04b">Private</label>
										<label><input type="checkbox" id="9c04c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c06a">Computer</label></td>
									<td><label><input type="checkbox" id="9c06b">Private</label>
										<label><input type="checkbox" id="9c06c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c08a">Internet connection</label></td>
									<td><label><input type="checkbox" id="9c08b">Private</label>
										<label><input type="checkbox" id="9c08c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c10a">Kitchen Utensils</label></td>
									<td><label><input type="checkbox" id="9c10b">Private</label>
										<label><input type="checkbox" id="9c10c">House owner</label>
									</td>
								</tr>
								<tr>
									<td><label><input type="checkbox" id="9c12a">Other</label></td>
									<td><label><input type="checkbox" id="9c12b">Private</label>
										<label><input type="checkbox" id="9c12c">House owner</label>
									</td>
								</tr>
							</table>
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
						<label><input type="checkbox" id="9d01">Fenced Accommodation</label><br>
						<label><input type="checkbox" id="9d02">Secured Gate(s)</label><br>
						<label><input type="checkbox" id="9d03">Health Facilities </label><br>
						<label><input type="checkbox" id="9d04">Police station access</label><br>
						<label><input type="checkbox" id="9d05">Secured Doors & Windows</label><br>
						<label><input type="checkbox" id="9d06">Multiple Entry/Exit points in the building</label><br>
						<label><input type="checkbox" id="9d07">Fire Extinguisher</label>
					</div>
					<div class="col-lg-7">
						<div class="form-group">
							<Label>Remarks:</Label>
							<textarea class="form-control" id="9d08"></textarea>
						</div>
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
							<textarea class="form-control" id="9e01" rows="5"></textarea>
						</div>
						<div class="checkbox">
						<label><input type="checkbox" id="9e02">Registered to neighbourhood/local authorities </label><br>
						<label><input type="checkbox" id="9e03">Attestation Letter</label><br>
						<label><input type="checkbox" id="9e04">Valid Passports and/or other recognized travel documents</label>
						</div>
						<br><br>
						<div class="form-group">
							<Label>Remarks:</Label>
							<textarea class="form-control" id="9d08"></textarea>
						</div>
					</div>
				</div>
			</div>
			<br><button class="btn btn-success" id="save_9"><i class="fa fa-save"></i> Save</button>
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
				<textarea class="form-control" id="101"></textarea>
			</div>
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>Expenses </h4><br>
					<label>Amount (weekly in IDR)</label>
					<input type="number" class="form-control" id="102"><br><br>
					<label>Remarks</label>
					<textarea class="form-control" id="103"></textarea>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="well well-sm">
					<h4>Resources  </h4>
					<small>Please Tick (<input type="checkbox" checked>) as appropriate</small>
					<br><br>
					<label>Source</label>
					<div class="checkbox">
						<label><input type="checkbox" id="104a"> Personal income</label><br> 
						<label><input type="checkbox" id="104b"> CWS</label><br> 
						<label><input type="checkbox" id="104c"> Employment Situationr</label><br> 
						<label><input type="checkbox" id="104d"> Family abroad (where?)</label><br> 
						<label><input type="checkbox" id="104e"> Assistance received (from?)</label><br> 
						<label><input type="checkbox" id="104f"> Government</label><br> 
						<label><input type="checkbox" id="104g"> Other</label><br> 
					</div>
					<label>Amount (weekly in IDR)</label>
					<input type="number" class="form-control" id="105"><br><br>
					<label>Remarks</label>
					<textarea class="form-control" id="106"></textarea>
				</div>
			</div>
			<br><button class="btn btn-success" id="save_10"><i class="fa fa-save"></i> Save</button>
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
		<div id="collapseCWS" class="panel-collapse collapse ">
		<div class="panel-body">
			<label>Children at risk : Risk rating </label>
			<div class="well well-sm">
				<label>Instructions</label>
				<p>
					<b>Risk rating box:</b> After completing each risk category, staff will be asked to indicate whether the person of concern is believed to be at high (H), medium (M), or low (L) risk as defined below:
					<ul>
						<li><b>High:</b> reflects a need for immediate intervention by UNHCR or a partner agency. Staff should immediately refer the individual to the appropriate service provider, and follow up with the provider on a weekly basis until they confirm that they have taken action in connection with the individual at heightened risk. This will ensure that the individual’s situation is adequately addressed, and that the referral system is functioning efficiently. (FEW DAYS)</li><br>
						<li><b>Medium:</b> indicates that intervention should be scheduled and occur, but that immediate intervention is not necessary. Note that cases placed in the medium risk category can move into the high-risk category if intervention does not take place. Therefore, staff should implement a structured monitoring system to ensure adequate and timely follow up. </li><br>
						<li><b>Low:</b> denotes that the regular referral system applies. Additionally, staff should review the situation of individuals at low risk at regular intervals or implement another structured monitoring and follow-up mechanism to ensure that the case is handled adequately.</li>
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
						<th width="250px">Risk rate</th>
						<th>Needs</th>
					</tr>
					<tr>
						<td>Boy at risk</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws1a">LOW</label>
								<label><input type="checkbox" id="cws1b">MEDIUM</label>
								<label><input type="checkbox" id="cws1c">HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws1d"></textarea></td>
					</tr>
					<tr>
						<td>Girl at risk</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws2a" >LOW</label>
								<label><input type="checkbox" id="cws2b" >MEDIUM</label>
								<label><input type="checkbox" id="cws2c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws2d"></textarea></td>
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
								<label><input type="checkbox" id="cws3a">LOW</label>
								<label><input type="checkbox" id="cws3b">MEDIUM</label>
								<label><input type="checkbox" id="cws3c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws3d"></textarea></td>
					</tr>
					<tr>
						<td>RSD </td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws4a">LOW</label>
								<label><input type="checkbox" id="cws4b">MEDIUM</label>
								<label><input type="checkbox" id="cws4c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws4d"></textarea></td>
					</tr>
					<tr>
						<td>Basic needs <br><small>(food, water)</small> </td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws5a">LOW</label>
								<label><input type="checkbox" id="cws5b">MEDIUM</label>
								<label><input type="checkbox" id="cws5c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws5d"></textarea></td>
					</tr>
					<tr>
						<td>Education</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws6a">LOW</label>
								<label><input type="checkbox" id="cws6b">MEDIUM</label>
								<label><input type="checkbox" id="cws6c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws6d"></textarea></td>
					</tr>
					<tr>
						<td>SGBVs</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws7a">LOW</label>
								<label><input type="checkbox" id="cws7b">MEDIUM</label>
								<label><input type="checkbox" id="cws7c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws7d"></textarea></td>
					</tr>
					<tr>
						<td>Medical assitance</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws8a">LOW</label>
								<label><input type="checkbox" id="cws8b">MEDIUM</label>
								<label><input type="checkbox" id="cws8c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws8d"></textarea></td>
					</tr>
					<tr>
						<td>Psychosocial</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws9a">LOW</label>
								<label><input type="checkbox" id="cws9b">MEDIUM</label>
								<label><input type="checkbox" id="cws9c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws9d"></textarea></td>
					</tr>
					<tr>
						<td>Material assitance <br><small>(shelter, NFI, financial)</small></td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws10a">LOW</label>
								<label><input type="checkbox" id="cws10b">MEDIUM</label>
								<label><input type="checkbox" id="cws10c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws10d"></textarea></td>
					</tr>
					<tr>
						<td>Recreational activities / Community activities</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws11a">LOW</label>
								<label><input type="checkbox" id="cws11b">MEDIUM</label>
								<label><input type="checkbox" id="cws11c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws11d"></textarea></td>
					</tr>
					<tr>
						<td>Regular Home visits</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws12a">LOW</label>
								<label><input type="checkbox" id="cws12b">MEDIUM</label>
								<label><input type="checkbox" id="cws12c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cs12d"></textarea></td>
					</tr>
					<tr>
						<td>Family tracing</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws13a">LOW</label>
								<label><input type="checkbox" id="cws13b">MEDIUM</label>
								<label><input type="checkbox" id="cws13c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws13d"></textarea></td>
					</tr>
					<tr>
						<td>Durable solution</td>
						<td>
							<div class="checkbox">
								<label><input type="checkbox" id="cws14a">LOW</label>
								<label><input type="checkbox" id="cws14b">MEDIUM</label>
								<label><input type="checkbox" id="cws14c" >HIGH</label>
							</div>
						</td>
						<td><textarea class="form-control" id="cws14d"></textarea></td>
					</tr>
					<tr>
						<td>Caseworker signature & date</td>
						<td colspan="2"><textarea class="form-control" id="cws15"></textarea></td>
					</tr>
					
				</table>
			</div>
			<br><button class="btn btn-success" id="save_10"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- UNHCR Child Protection officer or Community Services -  Follow up & Conclusions -->
		<div class="panel panel-danger">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseUNHCR">UNHCR Child Protection officer or Community Services -  Follow up & Conclusions</a>
			</h4>
		</div>
		<div id="collapseUNHCR" class="panel-collapse collapse ">
		<div class="panel-body">
			<label>Conclusions </label>
			<textarea class="form-control" id="unhcr1"></textarea><br>
			<label>CSO or CP signature & date</label>
			<textarea class="form-control" id="unhcr2"></textarea><br>
			<button class="btn btn-success" id="save_unhcr"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
		<!-- Panel conclusion (Optional –for complicated cases, only if necessary) -->
		<div class="panel panel-danger">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseopt">Panel conclusion (Optional –for complicated cases, only if necessary)</a>
			</h4>
		</div>
		<div id="collapseopt" class="panel-collapse collapse in ">
		<div class="panel-body">
			<label>Final conclusions</label>
			<textarea class="form-control" id="opt1"></textarea><br>
			<label>CSO or CP signature & date</label>
			<textarea class="form-control" id="opt2"></textarea>
			<br><button class="btn btn-success" id="save_opt"><i class="fa fa-save"></i> Save</button>
		</div>
		</div>
		</div>
	</div>
	
</div>
</div><!-- row -->
</div><!-- page-wrapper -->
