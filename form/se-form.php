<?php 
$R="R6";$W="W6";
setHistory($_SESSION['user_id'],"se_form","Open SE Form",$NOW);
include("form/navigasi.php");

if(isset($_GET['op'])){
	if(isset($_GET['file_no']) AND isset($_GET['se_id'])){
		$qry = mysql_query("SELECT * FROM `se` WHERE `file_no`='".$_GET['file_no']."' AND `se_id`='".$_GET['se_id']."'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
		$assessment = explode(";",$data['assessment_data']);
		$background = explode(";",$data['background_info']);
		$living_env = explode(";",$data['living_env']);
		$house=explode(",",$living_env[0]);
		$fur=explode(",",$living_env[1]);
		$living_cond = explode(";",$data['living_cond']);
		$sec_neigh=explode(";",$data['sec_neigh']);
		$sec=explode(",",$sec_neigh[0]);
		$neigh=explode(",",$sec_neigh[1]);
		$phnn = explode(";",$data['phnn']);
		$child_protect = explode(";",$data['child_protect']);
		$child = explode(",",$child_protect[0]);
		$support_system = explode(";",$data['support_system']);
		$household=explode(",",$support_system[0]);
		$expe=explode(",",$support_system[1]);
		$com=explode(",",$support_system[2]);
		$recommend=explode(";",$data['recommend']);
		$verification=explode(";",$data['verification']);
		
		//
		$disable = "disabled";
		$button = '<button type="submit" class="btn btn-success" id="update_assessment" ><i class="fa fa-refresh"></i> Update </button>';
		$edit = 1;
	}
}
else{
	$button = '<button type="submit" class="btn btn-success" id="save_assessment" ><i class="fa fa-save"></i> Save </button>';
	$edit = 0;
}
?>
<script>
(function($) {
	$(document).ready(function(){
		var	file_no = $("#file_no").val(),
			col1a = $("#col1a"),col1b = $("#col1b"),
			col2a = $("#col2a"),col2b = $("#col2b"),
			col3a = $("#col3a"),col3b = $("#col3b"),
			col4a = $("#col4a"),col4b = $("#col4b");
			
		$(col1b).slideUp();$(col2b).slideUp();$(col3b).slideUp();$(col4b).slideUp();
		$(col1a).click(function(){
			if (col1b.is(':visible')) {col1b.slideUp();}
			else {
				if(col2b.is(':visible')){col2b.slideUp();col1b.slideDown();window.location="#col1a";}
				else{col1b.slideDown();window.location="#col1a";}
			}
		});
		$(col2a).click(function(){
			if (col2b.is(':visible')) {col2b.slideUp();}
			else {
				if(col1b.is(':visible')){col1b.slideUp();col2b.slideDown();window.location="#col2a";}
				else{col2b.slideDown();window.location="#col2a";}
			}
		});	
		$(col3a).click(function(){
			if (col3b.is(':visible')) {col3b.slideUp();}
			else {
				if(col4b.is(':visible')){col4b.slideUp();col3b.slideDown();window.location="#col3a";}
				else{col3b.slideDown();window.location="#col3a";}
			}
		});
		$(col4a).click(function(){
			if (col4b.is(':visible')) {col4b.slideUp();}
			else {
				if(col3b.is(':visible')){col3b.slideUp();col4b.slideDown();window.location="#col4a";}
				else{col4b.slideDown();window.location="#col4a";}
			}
		});
		var file_no = $("#file_no").val(),
				 doa = $("#doa").val();	 
			$("#nextassessment").load("form/se-action.php?op=nextAssessment&file_no="+file_no+"&doa="+doa);
		

		//check available
		$("#file_no").change(function(){
			var  	file_no = $(this).val(),
					id_data = $("input:radio[name=id_data]:checked").val(),
					datanya = "&file_no="+file_no+"&id_data="+id_data;
			
         //last assessment
				$.ajax({url: "form/se-action.php",data: "op=lastAssessment"+datanya,cache: false,
					success: function(s){
						var d = s.split(";");
						$("#last_assessment").val(d[0]);
						$("#last_home_visit").val(d[1]);
					}
				});
			
			$.ajax({url: "form/se-action.php",data: "op=check"+datanya,cache: false,
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
				else if(msg=="nodatase"){
					$("#a").addClass("text-danger nodata").removeClass("text-success text-warning nodataperson").html("<i class='fa fa-warning'></i> No Data SE");
				}
			}
			});
		});
		//next assessment
		$("#doa").change(function(){
			var file_no = $("#file_no").val(),
				 doa = $(this).val();	 
			$("#nextassessment").load("form/se-action.php?op=nextAssessment&file_no="+file_no+"&doa="+doa);
		});
		
		//save  of assessment
		$("#save_assessment").click(function(){
			var file_no = $("#file_no").val();
			var a = $("input:radio[name=id_data]:checked").val();
			
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
				if (r == true) {window.location="?page=se-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{
				var doa = $("#doa").val(),dore=$("#dore").text(),by = $("#interviewer").val(),location = $("#location").val(),last = $("#last_assessment").val(),asst = $("#assistance").val(),inter = $("#interpreter").val(),home = $("#home_visit").val(),last_visit = $("#last_home_visit").val();
					
				var datanya = "&file_no="+file_no+"&a="+a+"&doa="+doa+"&dore="+dore+"&value="+by+";"+location+";"+last+";"+asst+";"+inter+";"+home+";"+last_visit;
				$.ajax({url: "form/se-action.php",data: "op=addassessment"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseDate").removeClass("in");
							$("#collapseOne").addClass("in");
							$("#file_no").attr("disabled",true);
							$("#a").html("");
						}
						else{alert("Data not saved !!");}
					}
				});
				$.ajax({url: "form/se-action.php",data: "op=getseid&file_no="+file_no,cache: false,
					success: function(a){
						$("#se_id").val(a);
					}
				});
			}
		});
		//update  of assessment
		$("#update_assessment").click(function(){
			var file_no = $("#file_no").val(),se_id = $("#se_id").val();
			
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
				if (r == true) {window.location="?page=se-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{
				var doa = $("#doa").val(),dore = $("#dore").text(),by = $("#interviewer").val(),location = $("#location").val(),last = $("#last_assessment").val(),asst = $("#assistance").val(),inter = $("#interpreter").val(),home = $("#home_visit").val(),last_visit = $("#last_home_visit").val();
					
				var datanya = "&se_id="+se_id+"&file_no="+file_no+"&doa="+doa+"&dore="+dore+"&value="+by+";"+location+";"+last+";"+asst+";"+inter+";"+home+";"+last_visit;
				$.ajax({url: "form/se-action.php",data: "op=updateassessment"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been update !!");
							$("#collapseDate").removeClass("in");
							$("#collapseOne").addClass("in");
							$("#file_no").attr("disabled",true);
							$("#a").html("");
						}
						else{alert("Data not update !!");}
					}
				});
			}
		});
		
		//save background information
		$("#save_back").click(function(){
				var file_no = $("#file_no").val(),
					se_id= $("#se_id").val(),
					back1 = $("#back1").val(),
					back2 = $("#back2").val();
					
				var datanya = "&se_id="+se_id+"&file_no="+file_no+"&value="+back1+";"+back2;
				$.ajax({url: "form/se-action.php",data: "op=saveback"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseOne").removeClass("in");
							$("#collapseTwo").addClass("in");
						}
						else{alert("Data not saved !!");}
					}
				});
		});
		
		//save living condition A. General
		$("#save_living_a").click(function(){
			var file_no = $("#file_no").val(),
				se_id= $("#se_id").val(),
				room_1 = $("#room_1:checked").length,room_2 = $("#room_2:checked").length,room_3 = $("#room_3:checked").length,room_4 = $("#room_4:checked").length,room_5 = $("#room_5:checked").length,room_6 = $("#room_6:checked").length,room_7 = $("#room_7:checked").length,room_8 = $("#room_8:checked").length,room_9 = $("#room_9:checked").length,room_10 = $("#room_10:checked").length,room_11 = $("#room_11:checked").length;
				
			var	furni_1=$("#furni_1:checked").length,furni_2=$("#furni_2:checked").length,furni_3=$("#furni_3:checked").length,furni_4=$("#furni_4:checked").length,furni_5=$("#furni_5:checked").length,furni_6=$("#furni_6:checked").length,furni_7=$("#furni_7:checked").length,furni_8=$("#furni_8:checked").length,furni_9=$("#furni_9:checked").length,furni_10=$("#furni_10:checked").length,furni_11=$("#furni_11:checked").length,furni_12=$("#furni_12:checked").length,furni_13=$("#furni_13:checked").length,furni_14=$("#furni_14:checked").length,furni_15=$("#furni_15:checked").length,furni_16=$("#furni_16:checked").length,furni_17=$("#furni_17:checked").length,furni_18=$("#furni_18:checked").length,furni_19=$("#furni_19:checked").length,furni_20=$("#furni_20:checked").length,furni_21=$("#furni_21:checked").length;
			
			var room=room_1+","+room_2+","+room_3+","+room_4+","+room_5+","+room_6+","+room_7+","+room_8+","+room_9+","+room_10+","+room_11;
			var	furni=furni_1+","+furni_2+","+furni_3+","+furni_4+","+furni_5+","+furni_6+","+furni_7+","+furni_8+","+furni_9+","+furni_10+","+furni_11+","+furni_12+","+furni_13+","+furni_14+","+furni_15+","+furni_16+","+furni_17+","+furni_18+","+furni_19+","+furni_20+","+furni_21;
			var living_env = room+";"+furni;
			var living_cond = $("#living_cond1").val()+";"+$("#living_cond2").val()+";"+$("#living_cond3").val()+";"+$("#notes").val();
			
			var sec_1=$("#sec_1:checked").length,
				sec_2=$("#sec_2:checked").length,
				sec_3=$("#sec_3:checked").length,
				sec_4=$("#sec_4:checked").length,
				sec_5=$("#sec_5:checked").length,
				neig_1=$("#neig_1:checked").length,
				neig_2=$("#neig_2:checked").length,
				neig_3=$("#neig_3:checked").length,
				neig_4=$("#neig_4:checked").length,
				neig_5=$("#neig_5:checked").length;
			var	sec = sec_1+","+sec_2+","+sec_3+","+sec_4+","+sec_5;
			var neig = neig_1+","+neig_2+","+neig_3+","+neig_4+","+neig_5;
			var sec_neigh = sec+";"+neig;
			
			var phnn = $("#police").val()+";"+$("#health").val()+";"+$("#notes2").val()+";"+$("#person_living").val();
			
			var datanya = "&se_id="+se_id+"&file_no="+file_no+"&living_env="+living_env+"&living_cond="+living_cond+"&sec_neigh="+sec_neigh+"&phnn="+phnn;
			
				$.ajax({url: "form/se-action.php",data: "op=savelivinga"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#col1b").slideUp();
							$("#col2b").slideDown().trigger("click");
						}
						else{alert("Data not saved !!");}
					}
				});
			
			
		});
		
		//save living condition B. PERSON WITH SPECIFIC NEEDS
		$("#save_living_b").click(function(){
			var file_no = $("#file_no").val(),
				se_id = $("#se_id").val(),
				vulne = $("#vulne").val(),
				u_minor = $('input:radio[name=unaccompanied_minors]:checked').val(),
				u_minor_text = $("#unaccompanied_minors_text").val(),
				separated = $('input:radio[name=separated_children]:checked').val(),
				separated_text = $("#separated_children_text").val(),
				remarks_child = $("#remarks_child").val(),
				child_1 = $("#child_1").val(),
				child_2 = $("#child_2").val(),
				child_3 = $("#child_3").val(),
				protect = $("#protect").val();
			var child = u_minor+","+u_minor_text+","+separated+","+separated_text+","+remarks_child+","+child_1+","+child_2+","+child_3;
			var child_protect = child+";"+protect;
			var datanya = "&se_id="+se_id+"&file_no="+file_no+"&vulne="+vulne+"&child_protect="+child_protect;
			
			
				$.ajax({url: "form/se-action.php",data: "op=savelivingb"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#col2b").slideUp();
							$("#collapseTwo").removeClass("in");
							$("#collapseThree").addClass("in");
							$("#col3b").slideDown().trigger("click");
							
							
						}
						else{alert("Data not saved !!");}
					}
				});
		});
		
		//Financial And Other Support System Available To The Person Of Concern
		//Support System
		$("#save_support").click(function(){
			var file_no = $("#file_no").val(),
				se_id = $("#se_id").val(),
				house_1 = $("#house_1").val(),
				house_2 = $("#house_2").val(),
				house_3 = $("#house_3").val(),
				house_4 = $("#house_4").val(),
				house = house_1+","+house_2+","+house_3+","+house_4,
				expe_1 = $("#expe_1").val(),
				expe_2 = $("#expe_2").val(),
				expe_3 = $("#expe_3").val(),
				expe_4 = $("#expe_4").val(),
				expe_5 = $("#expe_5").val(),
				expe= expe_1+","+expe_2+","+expe_3+","+expe_4+","+expe_5,
				com1 = $("#support_comment_1").val(),
				com2 = $("#support_comment_2").val(),
				com = com1+","+com2,
				datanya = "&se_id="+se_id+"&file_no="+file_no+"&support="+house+";"+expe+";"+com;
				
				$.ajax({url: "form/se-action.php",data: "op=savefinanciala"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#col3b").slideUp();
							$("#col4b").slideDown().trigger("click");
							
							
						}
						else{alert("Data not saved !!");}
					}
				});
		});
		//recommend
		$("#save_recommend").click(function(){
			var	file_no = $("#file_no").val(), se_id = $("#se_id").val(),
				ahr = $('input:radio[name=radioahr]:checked').val(),
				ar = $('input:radio[name=radioar]:checked').val(),
				anr = $('input:radio[name=radioanr]:checked').val(),
				final_remarks = $("#final_remarks").val(),
				datanya = "&se_id="+se_id+"&file_no="+file_no+"&recommend="+ahr+";"+ar+";"+anr+";"+final_remarks;
				
				$.ajax({url: "form/se-action.php",data: "op=savefinancialb"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#col4b").slideUp();
							$("#collapseThree").removeClass("in");
							$("#collapseFour").addClass("in");
						}
						else{alert("Data not saved !!");}
					}
				});
		});
		
		//verified
		$("#save_verification").click(function(){
			var	file_no = $("#file_no").val(), se_id = $("#se_id").val(),
				ver_name = $("#ver_name").val(),
				ver_sig = $("#ver_sig").val(),
				ver_date = $("#ver_date").val(),
				ver_remarks = $("#ver_remarks").val(),
				datanya = "&se_id="+se_id+"&file_no="+file_no+"&verification="+ver_name+";"+ver_sig+";"+ver_date+";"+ver_remarks;
				$.ajax({url: "form/se-action.php",data: "op=saveverification"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseFour").removeClass("in");
						}
						else{alert("Data not saved !!");}
					}
				});
				
				
		});
		
		//comment
		$("#comment").change(function(){
			var	file_no = $("#file_no").val(),comments = $(this).val(),se_id=$("#se_id").val();
			var 	datanya = "&file_no="+file_no+"&comment="+comments+"&se_id="+se_id;
			$.ajax({url: "form/general-action.php",data: "op=se_comment"+datanya,cache: false,
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

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12"><h3 class="page-header">Socio Economic <?php if(isset($_GET['a'])){echo "Re-Assessment";}else{echo "Assessment";} ?> Report  </h3></div>
<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<!-- date assessment -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseDate"><?php if(isset($_GET['a'])){echo "Re-Assessment";}else{echo "Assessment";} ?> Remaks</a>
			</h4>
		</div>
		<div id="collapseDate" class="panel-collapse collapse in">
		<div class="panel-body">
			<div class="col-lg-12 hidden">
					<label class="radio-inline"><input type="radio" name="id_data" value="0" <?php if(empty($_GET['a'])){echo "checked";}?> >New </label>
					<label class="radio-inline"><input type="radio" name="id_data" value="1" <?php if(isset($_GET['a'])){echo "checked";}?>>Reassesment </label>
					<input id="se_id" value="<?php if($edit==1){echo $_GET['se_id'];}?>">
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>File No: <span  id="a"></span></label>
					<input class="form-control" id="file_no" <?php if($edit==1){echo 'value="'.$data['file_no'].'" '.$disable;}?>>
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of Assessment: </label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="doa" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $data['doa'];}else{echo $TODAY;} ?>" ><span class="input-group-addon"><i class="fa fa-calendar" ></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interviewer:</label>
					<input class="form-control" id="interviewer" value="<?php if($edit==1){echo $assessment[0];} ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Location: </label>
					<input class="form-control" id="location" value="<?php if($edit==1){echo $assessment[1];} ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of last assessment:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="last_assessment" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $assessment[2];} ?>" <?php if(isset($_GET['a'])){echo "disabled";}?>><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Assistance receiving since <i>(if any)</i>:</label>
					<input class="form-control" id="assistance" value="<?php if($edit==1){echo $assessment[3];} ?>">
				</div>
			</div>			 
			<div class="col-lg-4">
				<div class="form-group">
					<label>Interpreter:</label>
					<input class="form-control" id="interpreter" value="<?php if($edit==1){echo $assessment[4];} ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<label># of home visit(s) and date:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="home_visit" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $assessment[5];}else{echo $TODAY;} ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-4">
				<label>Date of last home visit:</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
					<input type="text" class="form-control" id="last_home_visit" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $assessment[6];} ?>"<?php if(isset($_GET['a'])){echo "disabled";}?>><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<small id="nextassessment"></small>
					<br>
					<?php echo $button; ?>
					
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
				<textarea class="form-control" id="back1" rows="10"><?php if($edit==1){echo $background[0];} ?></textarea>
				</div>
			</li>
			<li>
				<div class="form-group">
				<label>Current Situation (Socio-economic):</label>
				<textarea class="form-control" id="back2" rows="10"><?php if($edit==1){echo $background[1];} ?></textarea><br>
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
							<label><input type="checkbox" id="room_1" value="1" <?php if($edit==1){if($house[0]==1){echo "checked";}} ?> > No repair</label><br>
							<label><input type="checkbox" id="room_2" value="1" <?php if($edit==1){if($house[1]==1){echo "checked";}} ?>> Medium repair</label><br>
							<label><input type="checkbox" id="room_3" value="1" <?php if($edit==1){if($house[2]==1){echo "checked";}} ?>> Leaking ceiling</label><br>
							<label><input type="checkbox" id="room_4" value="1" <?php if($edit==1){if($house[3]==1){echo "checked";}} ?>> Shared toilet/bathroom</label><br>
							<label><input type="checkbox" id="room_5" value="1" <?php if($edit==1){if($house[4]==1){echo "checked";}} ?>> No toilet/bathroom</label><br>
							<label><input type="checkbox" id="room_6" value="1" <?php if($edit==1){if($house[5]==1){echo "checked";}} ?>> Air ventilation (windows, etc)</label><br>
							<label><input type="checkbox" id="room_7" value="1" <?php if($edit==1){if($house[6]==1){echo "checked";}} ?>> No air ventilation</label><br>
							<label><input type="checkbox" id="room_8" value="1" <?php if($edit==1){if($house[7]==1){echo "checked";}} ?>> Shared kitchen</label><br>
							<label><input type="checkbox" id="room_9" value="1" <?php if($edit==1){if($house[8]==1){echo "checked";}} ?>> No kitchen</label><br>
							<label><input type="checkbox" id="room_10" value="1" <?php if($edit==1){if($house[9]==1){echo "checked";}} ?>> Dampness </label><br>
							<label><input type="checkbox" id="room_11" value="1" <?php if($edit==1){if($house[10]==1){echo "checked";}} ?>> Smell</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h4>Furniture / Equipment: <small>(tick as appropriate)</small></h4>
						<div class="checkbox">
							<label><input type="checkbox" id="furni_1" value="1"  <?php if($edit==1){if($fur[0]==1){echo "checked";}} ?>> Bed</label><br>
							<label><input type="checkbox" id="furni_2" value="1" <?php if($edit==1){if($fur[1]==1){echo "checked";}} ?>> Sofa</label><br>
							<label><input type="checkbox" id="furni_3" value="1" <?php if($edit==1){if($fur[2]==1){echo "checked";}} ?>> Wardrobe/Cupboard</label><br>
							<label><input type="checkbox" id="furni_4" value="1" <?php if($edit==1){if($fur[3]==1){echo "checked";}} ?>> Table</label><br>
							<label><input type="checkbox" id="furni_5" value="1" <?php if($edit==1){if($fur[4]==1){echo "checked";}} ?>> Chairs</label><br>
							<label><input type="checkbox" id="furni_6" value="1" <?php if($edit==1){if($fur[5]==1){echo "checked";}} ?>> Rice cooker</label><br>
							<label><input type="checkbox" id="furni_7" value="1" <?php if($edit==1){if($fur[6]==1){echo "checked";}} ?>> Refrigerator</label><br>
							<label><input type="checkbox" id="furni_8" value="1" <?php if($edit==1){if($fur[7]==1){echo "checked";}} ?>> Gas stove</label><br>
							<label><input type="checkbox" id="furni_9" value="1" <?php if($edit==1){if($fur[8]==1){echo "checked";}} ?>> Washing machine</label><br>
							<label><input type="checkbox" id="furni_10" value="1" <?php if($edit==1){if($fur[9]==1){echo "checked";}} ?>> TV set </label><br>
							<label><input type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[10]==1){echo "checked";}} ?>> Iron</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<div class="checkbox">
							<label><input type="checkbox" id="furni_12" value="1" <?php if($edit==1){if($fur[11]==1){echo "checked";}} ?>> Computer (laptop, tablet)</label><br>
							<label><input type="checkbox" id="furni_13" value="1" <?php if($edit==1){if($fur[12]==1){echo "checked";}} ?>> DVD player</label><br>
							<label><input type="checkbox" id="furni_14" value="1" <?php if($edit==1){if($fur[13]==1){echo "checked";}} ?>> AC</label><br>
							<label><input type="checkbox" id="furni_15" value="1" <?php if($edit==1){if($fur[14]==1){echo "checked";}} ?>> Fan</label><br>
							<label><input type="checkbox" id="furni_16" value="1" <?php if($edit==1){if($fur[15]==1){echo "checked";}} ?>> Internet Connection</label><br>
							<label><input type="checkbox" id="furni_17" value="1" <?php if($edit==1){if($fur[16]==1){echo "checked";}} ?>> TV Cable</label><br>
							<label><input type="checkbox" id="furni_18" value="1" <?php if($edit==1){if($fur[17]==1){echo "checked";}} ?>> Piped Clean & Safe Water</label><br>
							<label><input type="checkbox" id="furni_19" value="1" <?php if($edit==1){if($fur[18]==1){echo "checked";}} ?>> Motorcycle</label><br>
							<label><input type="checkbox" id="furni_20" value="1" <?php if($edit==1){if($fur[19]==1){echo "checked";}} ?>> Mobile phone</label><br>
							<label><input type="checkbox" id="furni_21" value="1" <?php if($edit==1){if($fur[20]==1){echo "checked";}} ?>> Others</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-12"></div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Number of rooms: </label>
						<input type="number" class="form-control" id="living_cond1" placeholder="type here" value="<?php if($edit==1){echo $living_cond[0];}?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Living space in M2:</label>
						<input class="form-control" id="living_cond2" placeholder="type here" value="<?php if($edit==1){echo $living_cond[1];}?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Monthly rent fee:</label>
						<input class="form-control" id="living_cond3" placeholder="type here" value="<?php if($edit==1){echo $living_cond[2];}?>">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Notes/comments on general condition: </label>
						<textarea class="form-control" rows="5" id="notes"><?php if($edit==1){echo $living_cond[3];}?></textarea>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="well well-sm">
						<h4>Security and Safety Measures:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="sec_1" value="1" <?php if($edit==1){if($sec[0]==1){echo "checked";}} ?>> Fenced accommodation</label><br>
							<label><input type="checkbox" id="sec_2" value="1" <?php if($edit==1){if($sec[1]==1){echo "checked";}} ?>> Secure gate</label><br>
							<label><input type="checkbox" id="sec_3" value="1" <?php if($edit==1){if($sec[2]==1){echo "checked";}} ?>> Secure doors & windows</label><br>
							<label><input type="checkbox" id="sec_4" value="1" <?php if($edit==1){if($sec[3]==1){echo "checked";}} ?>> Multiple Entry/Exit points in the building</label><br>
							<label><input type="checkbox" id="sec_5" value="1" <?php if($edit==1){if($sec[4]==1){echo "checked";}} ?>> Fire Extinguisher</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="well well-sm">
						<h4>Neighbourhood/Relationship with Around People:</h4>
						<div class="checkbox">
							<label><input type="checkbox" id="neig_1" value="1" <?php if($edit==1){if($neigh[0]==1){echo "checked";}} ?>> Clean & healthy area</label><br>
							<label><input type="checkbox" id="neig_2" value="1" <?php if($edit==1){if($neigh[1]==1){echo "checked";}} ?>> Dense populated area</label><br>
							<label><input type="checkbox" id="neig_3" value="1" <?php if($edit==1){if($neigh[2]==1){echo "checked";}} ?>> Slum area</label><br>
							<label><input type="checkbox" id="neig_4" value="1" <?php if($edit==1){if($neigh[3]==1){echo "checked";}} ?>> Trading area</label><br>
							<label><input type="checkbox" id="neig_5" value="1" <?php if($edit==1){if($neigh[4]==1){echo "checked";}} ?>> Others</label><br>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Police station:</label>
						<input class="form-control" id="police" value="<?php if($edit==1){echo $phnn[0];}?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Health facilities:</label>
						<input class="form-control" id="health" value="<?php if($edit==1){echo $phnn[1];}?>">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<label>Notes: </label>
						<textarea class="form-control" id="notes2"><?php if($edit==1){echo $phnn[2];}?></textarea>
					</div>
					<div class="form-group">
						<label>Number of person living in same house:  </label>
						<textarea class="form-control" id="person_living" rows="6"><?php if($edit==1){echo $phnn[3];}?></textarea>
						<br>
						<button id="save_living_a" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
						<br> <p id="test"></p>
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
					<textarea class="form-control" rows="15" id="vulne" ><?php if($edit==1){echo $data['vulnerabilities'];}; ?></textarea>
				</div>
				<label>1. CHILDREN </label>
				<div class="table-responsive">
					<table class="table table-bordered ">
						<tbody>
							<tr>
								<td width="300px">Unaccompanied minors:  </td>
								<td width="50px" align="left">
									<div class="form-group">
									<label class="radio-inline"><input type="radio" name="unaccompanied_minors"  value="1" <?php if($edit==1){if($child[0]==1){echo "checked"; }} ?>  >Yes</label><br>
									<label class="radio-inline"><input type="radio" name="unaccompanied_minors"  value="0" <?php if($edit==1){if($child[0]==0){echo "checked"; }} ?>>No</label>
								</div>
								</td>
								<td width="90px" align="center">
									<label>#</label><input class="form-control" id="unaccompanied_minors_text" value="<?php if($edit==1){echo $child[1];}?>" >
								</td>
								<!-- -->
								<td rowspan="2">
									<label>Remarks:</label>
									<textarea class="form-control" rows="5" id="remarks_child"><?php if($edit==1){echo $child[4];}?></textarea>
								</td>
							</tr>
							<tr>
								<td>Separated children:</td>
								<td width="20px">
									<div class="form-group">
									<label class="radio-inline"><input type="radio" name="separated_children"  value="1" <?php if($edit==1){if($child[2]==1){echo "checked"; }} ?>>Yes</label><br>
									<label class="radio-inline"><input type="radio" name="separated_children"  value="0" <?php if($edit==1){if($child[2]==0){echo "checked"; }} ?>>No</label>
								</div>
								</td>
								<td width="90px" align="center">
									<label>#</label><input class="form-control" id="separated_children_text" value="<?php if($edit==1){echo $child[3];}?>">
								</td>
							</tr>
							<tr>
								<td># of children attending school:</td>
								<td colspan="3"><textarea class="form-control"  id="child_1" placeholder="Comments"><?php if($edit==1){echo $child[5];}?></textarea></td>
							</tr>
							<tr>
								<td># of children not attending school:</td>
								<td colspan="3"><textarea class="form-control"  id="child_2" placeholder="Comments"><?php if($edit==1){echo $child[6];}?></textarea></td>
							</tr>
							<tr>
								<td># of children with specific education needs:</td>
								<td colspan="3"><textarea class="form-control"  id="child_3" placeholder="Comments"><?php if($edit==1){echo $child[7];}?></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				<br>
				<label>2. PROTECTION NEEDS:</label><br><small>[e. g. SGBV, spouse in detention, etc. Please describe if any]</small>
				<div class="form-cgroup">
					<textarea class="form-control" rows="5" id="protect"><?php if($edit==1){echo $child_protect[1];}?></textarea>
					<br>
					<button class="btn btn-success" id="save_living_b"><i class="fa fa-save"></i> Save</button>
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
		<div id="collapseThree" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="collapseme" id="col3a">Support System</span><br><small>(Financial and other supports)</small></div>
				<div class="panel-body" id="col3b">
					<div class="col-lg-6">
					<div class="well well-sm ">
						<h4>Approximate monthly household income</h4><br>
						<label>CWS/UNHCR cash assistance:</label><input class="form-control" id="house_1" value="<?php if($edit==1){echo $household[0];} ?>">
						<label>Non-CWS/UNHCR assistance:</label><input class="form-control" id="house_2" value="<?php if($edit==1){echo $household[1];} ?>">
						<label>Other sources of income: <small>(e.g. IOM/JRS, etc)</small></label><input class="form-control" id="house_3" value="<?php if($edit==1){echo $household[2];} ?>">
						<label>Other sources of income: <small>(e.g. from relative in CoO/CoA/Abroad, etc.)</small></label>
						<textarea class="form-control" rows="5" id="house_4"><?php if($edit==1){echo $household[3];} ?></textarea>
					</div>
					</div>
					
					<div class="col-lg-6">
					<div class="well well-sm ">
						<h4>Approximate monthly expenditure</h4><br>
						<label>Rent fee:</label><input class="form-control" id="expe_1" value="<?php if($edit==1){echo $expe[0];} ?>">
						<label>Food:</label><input class="form-control" id="expe_2" value="<?php if($edit==1){echo $expe[1];} ?>">
						<label>Clothes:</label><input class="form-control" id="expe_3" value="<?php if($edit==1){echo $expe[2];} ?>">
						<label>Transport:</label><input class="form-control" id="expe_4" value="<?php if($edit==1){echo $expe[3];} ?>">
						<label>Other:</label><input class="form-control" id="expe_5" value="<?php if($edit==1){echo $expe[4];} ?>">
					</div>
					</div>
					<br>
					<div class="col-lg-12">
						<div class="form-group">
							<label>Comments on available financial support system (cash): </label>
							<textarea class="form-control" id="support_comment_1"><?php if($edit==1){echo $com[0];} ?></textarea>
						</div>
						<div class="form-group">
							<label>Comments on available other support system (in kind): </label>
							<textarea class="form-control" id="support_comment_2" ><?php if($edit==1){echo $com[1];} ?></textarea><br>
							<button id="save_support"class="btn btn-success"><i class="fa fa-save"></i> Save</button>
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
									<label class="radio-inline"><input type="radio" name="radioahr" value="1" <?php if($edit==1){if($recommend[0]==1){echo "checked";}}?>> YES</label>
									<label class="radio-inline"><input type="radio" name="radioahr" value="0" <?php if($edit==1){if($recommend[0]==0){echo "checked";}}?>> NO</label>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Assistance Recommended:  </label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="radioar" value="1" <?php if($edit==1){if($recommend[1]==1){echo "checked";}}?>> YES</label>
									<label class="radio-inline"><input type="radio" name="radioar" value="0" <?php if($edit==1){if($recommend[1]==0){echo "checked";}}?>> NO</label>
								</div>
							</td>
						</tr>
						<tr>
							<td><label>Assistance Not Recommended:  </label></td>
							<td>
								<div class="form-group">
									<label class="radio-inline"><input type="radio" name="radioanr" value="1" <?php if($edit==1){if($recommend[2]==1){echo "checked";}}?>> YES</label>
									<label class="radio-inline"><input type="radio" name="radioanr" value="0" <?php if($edit==1){if($recommend[2]==0){echo "checked";}}?>> NO</label>
								</div>
							</td>
						</tr>
					</table>
					<br><br>
					<div class="form-group">
						<label>Final remarks, including recommendation on cash, non-cash or other form of assistance</label><br><small>(if applicable):</small>
						<textarea class="form-control" rows="20" id="final_remarks"><?php if($edit==1){echo $recommend[3];}?></textarea>
						<br>
						<button class="btn btn-success" id="save_recommend"><i class="fa fa-save" ></i> Save</button>
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
						<input class="form-control" id="ver_name" value="<?php if($edit==1){echo $verification[0];} ?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Signature:</label>
						<input class="form-control" id="ver_sig" value="<?php if($edit==1){echo $verification[1];} ?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<label>Date:</label>
						<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
							<input type="text" class="form-control" id="ver_date" placeholder="yyyy-mm-dd" value="<?php if($edit==1){echo $verification[2];} ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Remarks by reviewing officer: </label>
					<textarea class="form-control" rows="5" id="ver_remarks"><?php if($edit==1){echo $verification[3];} ?></textarea>
					<br>
					<button class="btn btn-success" id="save_verification"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</div>
		</div>
		
	</div><!-- panel-group -->
</div>

<?php
// comment 
if($edit==1 AND $_SESSION['group_id']==1){
echo '<div class="col-lg-12" ><label>Comment:</label><textarea class="form-control" id="comment">'; echo Balikin($data['comment']); echo'</textarea><br><small id="t"></small></div> ';
}
?>
</div><!-- row -->
</div><!-- page-wrapper -->
