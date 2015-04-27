<?php 
$LOCATION = "person_form";
setHistory($_SESSION['user_id'],$LOCATION,"Open Personal Form",$NOW);
$R="R2";$W="W2";
include("form/navigasi.php") ;
if(isset($_GET['op'])){
	if(isset($_GET['file_no'])){
		$qry = mysql_query("SELECT * FROM `person` WHERE `file_no`='".$_GET['file_no']."'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
	
		$split=explode(",",$data['arrival']);
		$edu=explode("|",$data['education']);
		$edu1=explode(",",$edu[0]);
		$edu2=explode(",",$edu[1]);
		$edu3=explode(",",$edu[2]);
		
		$date_recognition=explode("|",$data['date_recognition']);
		
		$address = explode(";",$data['address']);
		$wilayah = explode(".",$address[0]); $prov = $wilayah[0]; $kota = $prov.".".$wilayah[1]; $kec = $kota.".".$wilayah[2];
		$disable = "disabled";
		$button = '<button type="submit" id="person_update" class="btn btn-success"><i class="fa fa-refresh"></i> Update</button>';
		$prints = '<a href="form/personal-form-print.php?file_no='.$_GET['file_no'].'" class="btn btn-default" title="Print '.$_GET['file_no'].'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-print"></i> Print</a>';
		if($data['photo']!=""){$photo = $URL."form/".$data['photo'];}else{$photo = $URL.'form/photo/default.png';}
		
		$edit = 1;
	}
}
else{
	$button = '<button type="submit" id="person_save" class="btn btn-success"><i class="fa fa-save"></i> Save</button>';
	$photo = $URL.'form/photo/default.png';
	$edit = 0;
}

?>

<script>
(function($) {
	$(document).ready(function(){

		var file_no = $("#file_no").val();
		var country2 = $("#country2").val();
		var address = $("#address").val();
		var MA = $("#MA").val();
		
		$("#coo").load("form/general-action.php","op=getcountry&country="+country2);
		$("#marital").load("form/general-action.php","op=getmarital&status="+MA);
		$("#family-relation").load("form/general-action.php","op=getrelation");
		
		//address
	<?php  if($edit=="1"){ ?>
		$("#provinsi").load("form/general-action.php","op=getprov&kode=<?php echo $prov;?>");
		$("#kota").load("form/general-action.php","op=getkab&prov=<?php echo $prov.'&kode='.$kota; ?>");
		$("#kelurahan").load("form/general-action.php","op=getkec&kab=<?php echo $kota.'&kode='.$kec; ?>");
		$("#address").val("<?php echo $kec.";".$address[1];?>");

		
	<?php	}else{ ?>
			
		$("#provinsi").load("form/general-action.php","op=getprov");
	<?php } ?>
	
	
		$("#provinsi").change(function(){$("#kota").load("form/general-action.php","op=getkab&prov="+$(this).val());});
		$("#kota").change(function(){$("#kelurahan").load("form/general-action.php","op=getkec&kab="+$(this).val());});
		$("#kelurahan").change(function(){var kel = $(this).val();var detail = $("#detail").val();$("#address").val(kel+";"+detail);});
		$("#detail").blur(function(){
			var kelurahan = $("#kelurahan").val();
			var detail = $("#detail").val();
			$("#address").val(kelurahan+";"+detail);});
		
		if(file_no != ""){$("#family").load("form/personal-family-data.php?file_no="+file_no);}
		
		//check available
		$("#file_no").change(function(){
			var file_no = $(this).val();
			var datanya = "&file_no="+file_no;
			$.ajax({url: "form/general-action.php",data: "op=check"+datanya,cache: false,
				success: function(msg){
					if(msg=="inuse"){
						$("#a").addClass("text-warning").removeClass("text-success text-danger").html("<i class='fa fa-warning'></i> In use");
					}
					else if(msg=="avail"){
						$("#a").addClass("text-success").removeClass("text-danger text-warning").html("<i class='fa fa-check'></i> Available");
					}
				}
			});
			
			//for upload photo
			$("#file_no2").val(file_no);
		});
		
		//save person
		$("#person_save").click(function(){
			var file_no = $("#file_no").val();
			if(file_no == ""){
				alert("Please insert File No");
				$("#file_no").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#file_no").val("").focus();
			}
			else{
			
				var file_no = $("#file_no").val(), name = $("#name").val(), coo = $("#coo").val(), dob = $("#dob").val(),age = $("#age").val(), sex = $('input:radio[name=sex]:checked').val(), marital = $("#marital").val(), address = $("#address").val(), phone = $("#phone").val(), photo = $("#photo").val(), status = $("#status").val(), date_arrival = $("#date_arrival").val(),arrival = $("#arrival").val(), 
				
				education = $("#edu1a:checked").length+","+$("#edu1b:checked").length+","+$("#edu1c:checked").length+","+$("#edu1d:checked").length+","+$("#edu1e:checked").length+"|"+$("#edu2a:checked").length+","+$("#edu2b:checked").length+","+$("#edu2c:checked").length+","+$("#edu2d:checked").length+","+$("#edu2e:checked").length+"|"+$("#edu3a:checked").length+","+$("#edu3b:checked").length, 
				
				skill = $("#skill").val(), mot = $("#mot").val(), known_language = $("#known_language").val(), previous_occupation = $("#previous_occupation").val(), volunteer = $("#volunteer").val(), date_recognition = $("#date_recognition").val()+"|"+$("#date_recognition2").val(), status_active = $("#status_active").val();
				
				var datanya = "&file_no="+file_no+"&name="+name+"&coo="+coo+"&dob="+dob+"&age="+age+"&sex="+sex+"&marital="+marital+"&address="+address+"&phone="+phone+"&photo="+photo+"&status="+status+"&arrival="+arrival+"&date_arrival="+date_arrival+"&education="+education+"&skill="+skill+"&mot="+mot+"&known_language="+known_language+"&previous_occupation="+previous_occupation+"&volunteer="+volunteer+"&date_recognition="+date_recognition+"&status_active="+status_active;
				
				$.ajax({url:"form/personal-action.php",data:"op=saveperson"+datanya,cache:false,success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("#collapseOne").removeClass("in");
							$("#collapseTwo").addClass("in");
							if(file_no !=""){
								$("#file_no").attr("disabled", true);
							}
							}else{alert("Data not saved !!");}}
				});
			}
		});
		
		//update person
		$("#person_update").click(function(){
			var file_no = $("#file_no").val(), name = $("#name").val(), coo = $("#coo").val(), dob = $("#dob").val(),age = $("#age").val(), sex = $('input:radio[name=sex]:checked').val(), marital = $("#marital").val(), address = $("#address").val(), phone = $("#phone").val(), photo = $("#photo").val(), status = $("#status").val(), date_arrival = $("#date_arrival").val(),arrival = $("#arrival").val(), 
			
			education = $("#edu1a:checked").length+","+$("#edu1b:checked").length+","+$("#edu1c:checked").length+","+$("#edu1d:checked").length+","+$("#edu1e:checked").length+"|"+$("#edu2a:checked").length+","+$("#edu2b:checked").length+","+$("#edu2c:checked").length+","+$("#edu2d:checked").length+","+$("#edu2e:checked").length+"|"+$("#edu3a:checked").length+","+$("#edu3b:checked").length, 
			
			skill = $("#skill").val(), mot = $("#mot").val(), known_language = $("#known_language").val(), previous_occupation = $("#previous_occupation").val(), volunteer = $("#volunteer").val(), date_recognition = $("#date_recognition").val()+"|"+$("#date_recognition2").val(), status_active = $("#status_active").val();
				
			var datanya = "&file_no="+file_no+"&name="+name+"&coo="+coo+"&dob="+dob+"&age="+age+"&sex="+sex+"&marital="+marital+"&address="+address+"&phone="+phone+"&photo="+photo+"&status="+status+"&arrival="+arrival+"&date_arrival="+date_arrival+"&education="+education+"&skill="+skill+"&mot="+mot+"&known_language="+known_language+"&previous_occupation="+previous_occupation+"&volunteer="+volunteer+"&date_recognition="+date_recognition+"&status_active="+status_active;
			
			$.ajax({url:"form/personal-action.php",data:"op=updateperson"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !! update");
						//location.reload();
						$("#collapseOne").removeClass("in");
						$("#collapseTwo").addClass("in");
					}else{alert("Data not saved !!");}}});
		});
		
		//add family
		$("#add-family").click(function(){
			var name = $("#family-name").val(),age = $("#family-age").val(),sex = $('input:radio[name=family-sex]:checked').val(),location = $("#family-location").val(),relation = $("#family-relation").val(),remarks = $("#family-remarks").val(),contact = $("#family-contact").val(),file_no = $("#file_no").val();
			var datanya = "&file_no="+file_no+"&value="+name+";"+age+";"+sex+";"+relation+";"+location+";"+remarks+";"+contact;
			
			$.ajax({url: "form/personal-action.php",data: "op=addfamily"+datanya,cache: false,
				success: function(msg){if(msg=="success"){alert("Data has been saved !!");}else{alert("Data not saved !!");}
					$("#family").load("form/personal-family-data.php?file_no="+file_no);
					$(".family .form-control").val("");
					$(".family select").val("0");
				}
			});
		});
		
		
		//comment
		$("#comment").change(function(){
			var	file_no = $("#file_no").val(),comments = $(this).val();
			var 	datanya = "&file_no="+file_no+"&comment="+comments;
			$.ajax({url: "form/general-action.php",data: "op=person_comment"+datanya,cache: false,
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
	<div class="col-lg-10"><h3 class="page-header">Personal Information </h3></div>
	<div class="col-lg-2" ><div class="photo"><img src="<?php echo $photo; ?>"></div><!-- buat photo --></div>
	<div class="col-lg-4">
		<div class="form-group">
			<label>File No:</label> <span id="a"></span>
			<input class="form-control" name="file-no" id="file_no" <?php if($edit==1){echo 'value="'.$data['file_no'].'"'; echo $disable;}?>>
			<?php if($edit==1){
				echo getWhoLastChange("".$data['file_no']."","person_form");
			}?>
		</div>
	</div>	
	<div class="col-lg-8">
		<br>
		<?php if($edit==1){echo $prints;}?>
	</div>
<div class="col-lg-12">
	<div class="panel-group" id="accordion">
		<!-- A panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Reported Personal Information</a>
			</h4>
			</div>
		<div id="collapseOne" class="panel-collapse collapse in">
		<div class="panel-body">
		<!-- biodata -->
	<!-- form-biodata -->
		<div class="col-lg-6">
		<div class="table-responsive">
			<table class="table  table-hover" >
				<tbody>
					<tr>
						<td width="180px"><label>Name: *</label></td>
						<td>
							<input class="form-control" name="name" id="name" required value="<?php if($edit==1){ echo $data['name'];}?>"></td>
						<!-- --->
					</tr>
					<tr>
						<td ><label>Country of Origin: *</label></td>
						<td><input type="hidden" id="country2" value="<?php if($edit==1){ echo $data['coo'];}?>">
							<select class="form-control" name="country-origin" id="coo" placeholder="Country of Origin" required></select></td>
					</tr>
					<tr>
						<td ><label>Date of Birth: *</label></td>
						<td>
							<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control" name="birth" id="dob" placeholder="yyyy-mm-dd" onchange="CalAge(dob,age);" value="<?php if($edit==1){echo $data['dob'];}?>" required><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<label>Age</label> <input class="form-control" name="age" placeholder="Age" id="age" value="<?php if($edit==1){echo $data['age'];}?>">		
						</td>
					</tr>
					<tr>
						<td ><label>Sex: *</label></td>
						<td>
							<div class="form-group">
								<label class="radio-inline"><input type="radio" name="sex"  value="M" <?php if($edit==1){if($data['sex']=="M")echo "checked";} ?> >Male</label>
								<label class="radio-inline"><input type="radio" name="sex"  value="F" <?php if($edit==1){if($data['sex']=="F")echo "checked";}?>>Female</label>
							</div>
						</td>
					</tr>
					<tr>
						<td ><label>Marital status: *</label></td>
						<td><input type="hidden" id="MA" value="<?php echo $data['marital'];?>" >
							<select class="form-control" name="marital-status" id="marital" ></select></td>
					</tr>
					<tr>
						
						<td ><label>Address (in detail): *</label></td>
						<td><div class="form-group">
								<small>Province</small>
								<select name="provinsi" id="provinsi" class="form-control"></select>
								<small>Regency / City</small>
								<select name="kabupaten" id="kota" class="form-control" ></select>
								<small>Sub-district / Village</small>
								<select name="kecamatan" id="kelurahan" class="form-control" ></select>
								<small>In Detail</small>
								<textarea class="form-control" id="detail" placeholder="Detail"><?php  if($edit==1){echo $address[1];} ?></textarea>
							</div>
							<input id="address" type="hidden">
						</td>
					</tr>
					<tr>
						
						<td ><label>Phone No: *</label></td>
						<td><input class="form-control" name="phone" id="phone" value="<?php if($edit==1){echo $data['phone'];}?>" required></td>
					</tr>
					<tr>
						<td ><label>Photo: </label></td>
						<td>
							<span id="upload">
							<iframe name="iframe" width="0" height="0" style="display:none;width:0;height:0;"></iframe>
							<form enctype="multipart/form-data" action="form/upload.php" method="POST" target="iframe" id="uphoto">
								<input type="file" name="userfile">
								<input id="file_no2" name="file_no" type="hidden" <?php if($edit==1){echo 'value="'.$data['file_no'].'" ';}?>>
								<br><button type="submit" class="btn btn-sm btn-success" value="Upload" name="upload" id="btnupload" ><i class="fa fa-upload"></i> Upload</button>
								
									<?php if($edit==1){echo '<input type="hidden" class="form-control" id="photo" value="'.$data['photo'].'" ><br><small class="text-success"> ';}?>
							</form>
							</span>
							<input  type="hidden" name="photo" id="photo"></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
		<div class="col-lg-6">
		<div class="table-responsive">
			<table class="table  table-hover">
				<tbody>
					<tr>
						<td width="180px"><label>Status:</label></td>
						<td><select class="form-control" name="status" id="status">
							<option <?php if($edit==1){if($data['status']=="Refugee")echo"selected";}?>>Refugee</option>
							<option <?php if($edit==1){if($data['status']=="Asylum Seeker")echo"selected";}?>>Asylum Seeker</option>
						</select></td>
					</tr>
					<tr>					
						<td ><label>Date & port arrival: *</label></td>
						<td><div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control" name="date_arrival" id="date_arrival"  value="<?php if($edit==1){echo $split[1];}?>" placeholder="yyyy-mm-dd"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<input class="form-control" name="arrival" id="arrival" placeholder="Port Arrival" value="<?php if($edit==1){echo $split[0];}?>"></td>
					</tr>
					
					<tr>
						
						<td ><label>Education:</label></td>
						<td>
							<label>Formal:</label>
							<div class="checkbox">
								<label><input type="checkbox" id="edu1a" <?php if($edit==1){if($edu1[0]==1){echo "checked";}} ?>> Elementary School</label>
								<label><input type="checkbox" id="edu1b" <?php if($edit==1){if($edu1[1]==1){echo "checked";}} ?>> Junior High School</label>
								<label><input type="checkbox" id="edu1c" <?php if($edit==1){if($edu1[2]==1){echo "checked";}} ?>> Senior High School</label>
								<label><input type="checkbox" id="edu1d" <?php if($edit==1){if($edu1[3]==1){echo "checked";}} ?>> Vocational School</label>
								<label><input type="checkbox" id="edu1e" <?php if($edit==1){if($edu1[4]==1){echo "checked";}} ?>> Accelerated School</label>
							</div>
							<label>Informal:</label><br>
							<label>CWS:</label>
							<div class="checkbox">
								<label><input type="checkbox" id="edu2a" <?php if($edit==1){if($edu2[0]==1){echo "checked";}} ?>> English</label>
								<label><input type="checkbox" id="edu2b" <?php if($edit==1){if($edu2[1]==1){echo "checked";}} ?>> Bahasa Indonesia</label>
								<label><input type="checkbox" id="edu2c" <?php if($edit==1){if($edu2[2]==1){echo "checked";}} ?>> Computer</label>
								<label><input type="checkbox" id="edu2d" <?php if($edit==1){if($edu2[3]==1){echo "checked";}} ?>> Art</label>
								<label><input type="checkbox" id="edu2e" <?php if($edit==1){if($edu2[4]==1){echo "checked";}} ?>> Handicraft</label>
							</div>
							<label>Insitution:</label>
							<div class="checkbox">
								<label><input type="checkbox" id="edu3a" <?php if($edit==1){if($edu3[0]==1){echo "checked";}} ?>> English</label>
								<label><input type="checkbox" id="edu3b" <?php if($edit==1){if($edu3[1]==1){echo "checked";}} ?>> Art</label>
							</div>
							
						</td>
					</tr>
					<tr>
						
						<td ><label>Skills:</label></td>
						<td><textarea class="form-control" name="skill" id="skill" ><?php if($edit==1){echo $data['skill'];}?></textarea></td>
					</tr>
					<tr>
						
						<td ><label>Mother Tongue:</label></td>
						<td><input class="form-control" name="mother-tongue" id="mot" value="<?php if($edit==1){ echo $data['mot'];}?>"></td>
					</tr>
					<tr>
						
						<td ><label>Knowledge of other languages:</label></td>
						<td><input class="form-control" name="known-language" id="known_language" value="<?php if($edit==1){echo $data['known_language'];}?>"></td>
					</tr>
					<tr>
						
						<td ><label>Previous occupation:</label></td>
						<td><input class="form-control" name="previous-occupation" id="previous_occupation" value="<?php if($edit==1){echo $data['previous_occupation'];}?>"></td>
					</tr>
					<tr>
						
						<td ><label>Willingness to volunteer:</label></td>
						<td><input class="form-control" name="volunteer" id="volunteer" value="<?php if($edit==1){echo $data['volunteer'];}?>"></td>
					</tr>
					<tr>
						
						<td ><label>Date of recognition:</label></td>
						<td>
							<div class="row col-lg-6">
							   <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control" name="birth" id="date_recognition" placeholder="yyyy-mm-dd" value="<?php if($edit==1){ echo $date_recognition[0];}?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
							<div class="row col-lg-6">
							   <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control" name="birth" id="date_recognition2" placeholder="yyyy-mm-dd" value="<?php if($edit==1){ echo $date_recognition[1];}?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td ><label>Active?: </label></td>
						<td><select class="form-control" name="active" id="status_active" >
							<option value="1" <?php if($edit==1){if($data['active']=="1")echo"selected";}?>>Active</option>
							<option value="2" <?php if($edit==1){if($data['active']=="2")echo"selected";}?>>Terminated</option>
							<option value="3" <?php if($edit==1){if($data['active']=="3")echo"selected";}?>>Deleted</option>
							<option value="4" <?php if($edit==1){if($data['active']=="4")echo"selected";}?>>Inactive</option>
						</select></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php echo $button;?>
		</div>
		</div>
		</div>
		
		</div>
		<!-- B panel -->
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Reported family members</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse  ">
		<div class="panel-body">
			<div class="col-lg-6">
			<div class="table-responsive">
				<!-- <form role="form" name="form-family"> -->
					<table class="table  table-hover family ">
						<tbody>
							<tr>
								<td width="10px" align="right"><label>1.</label></td>
								<td width="120px"><label>Name</label></td>
								<td><input class="form-control" id="family-name" placeholder="Name"> </td>
							</tr>
							<tr>
								<td align="right"><label>2.</label></td>
								<td><label>Age</label></td>
								<td><input class="form-control" id="family-age" type="number" placeholder="Age"></td>
							</tr>
							<tr>
								<td align="right"><label>3.</label></td>
								<td><label>Sex</label></td>
								<td>
									<div class="form-group">
									<label class="radio-inline"><input type="radio" name="family-sex" id="family-sex"  value="M" checked>Male</label>
									<label class="radio-inline"><input type="radio" name="family-sex"  id="family-sex" value="F">Female</label>
									</div>
								</td>
							</tr>
							<tr>
								<td align="right"><label>4.</label></td>
								<td><label>Relation</label></td>
								<td><select class="form-control" name="family-relation" id="family-relation"></select>
								</td>
							</tr>
						</tbody>
					</table>
				<!-- </form> -->
			</div><!-- table-responsive -->	
			</div>
			<div class="col-lg-6">
			<div class="table-responsive">
				<table class="table table-hover family">
					<tbody>
					<tr>
						<td width="10px" align="right"><label>5.</label></td>
						<td width"120px"><label>Current location</label></td>
						<td><textarea class="form-control" id="family-location" placeholder="Locations"></textarea></td>
					</tr>
					<tr>
						<td align="right"><label>6.</label></td>
						<td><label>Remarks</label></td>
					<td><textarea class="form-control" id="family-remarks" placeholder="Remarks"></textarea></td>
					</tr>
					<tr>
						<td align="right"><label>7.</label></td>
						<td><label>Last Contact family?:</label></td>
						<td><textarea class="form-control" id="family-contact" placeholder="Type here"></textarea></td>
					</tr>
					</tbody>
					<tfoot>
					<tr>
						<td colspan="3"><button  class="btn btn-sm btn-success" id="add-family" title="Add family"><i class="fa fa-plus"></i> Add </button> </td>
					</tr>
					</tfoot>
				</table>
				
			</div>
			
			</div>
			<div class="col-lg-12" id="family"></div>
			
		</div>
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

</div><!-- row -->
</div><!-- page-wrapper -->


