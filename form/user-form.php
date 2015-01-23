<?php
$file_id = 99;
include("form/navigasi.php");

if(isset($_GET['op'])){
	$op = $_GET['op'];
	if($op=="edit"){
		$user_id = $_GET['user_id'];
		$header = "Edit User";
		$button = '<button  id="user_update" class="btn btn-success"><i class="fa fa-refresh"></i> Update</button>';
		
		$qry = mysql_query("SELECT * FROM `user` WHERE `user_id`='$user_id'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
		
		//data
		$group_id = $data['group_id'];
		$user_name = $data['user_name'];
		$user_real_name = $data['user_real_name'];
		$user_mail = $data['user_mail'];
		$user_info = $data['user_info'];
		
		$edit=1;
	}
}
else{
		$header = "User Add";
		$button = '<button  id="user_save" class="btn btn-success"><i class="fa fa-save"></i> Save</button>';
		$edit=0;
}


?>
<script>
$(document).ready(function(){
	$("#user_name").change(function(){
		var datanya = "&user_name="+$(this).val();
			
			$.ajax({url: "form/user-action.php",data: "op=check"+datanya,cache: false,
				success: function(msg){
					if(msg=="inuse"){
						$("#a").addClass("text-warning").removeClass("text-success text-danger").html("<i class='fa fa-warning'></i> In use");
					}
					else if(msg=="avail"){
						$("#a").addClass("text-success").removeClass("text-danger text-warning").html("<i class='fa fa-check'></i> Available");
					}
				}
			});
	});	
	$("#user_save").click(function(){
		var group_id = $("#group_id").val(),
			name = $("#user_name").val(),
			real_name = $("#user_real_name").val(),
			password = $("#user_password").val(),
			rpassword = $("#retype_password").val(),
			info = $("#user_info").val(),
			datanya="&group_id="+group_id+"&name="+name+"&real_name="+real_name+"&password="+password+"&info="+info;
			
			if(group_id == "0"){
				alert("Please Select Group id");
				$("#group_id").focus();
			}
			else if(name == ""){
				alert("Please insert Username");
				$("#user_name").empty().focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("Username in use");
				$("#file_no").val("").focus();
			}
			else if(password == "" || rpassword == "" ){
				alert("Please insert password");
				$("#user_password").empty().focus();
			}
			else if(password != rpassword ){
				alert("Password not same");
				$("#retype_password").empty().focus();
			}
			else{
				$.ajax({url:"form/user-action.php",data:"op=saveuser"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						window.location="?page=user";
					}else{alert("Data not saved !!");}}
				});
			}
	});
	$("#user_update").click(function(){
		var user_id = $("#user_id").val(),
			group_id = $("#group_id").val(),
			name = $("#user_name").val(),
			real_name = $("#user_real_name").val(),
			password = $("#user_password").val(),
			rpassword = $("#retype_password").val(),
			info = $("#user_info").val(),
			datanya="&user_id="+user_id+"&group_id="+group_id+"&name="+name+"&real_name="+real_name+"&password="+password+"&info="+info;
			
			$.ajax({url:"form/user-action.php",data:"op=updateuser"+datanya,cache:false,success: function(msg){
				if(msg=="success"){
					alert("Data has been saved !!");
					window.location="?page=user";
				}else{alert("Data not saved !!");}}
			});
	});
});
</script>
<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
<div class="col-lg-12"><h3 class="page-header"><?php echo $header ?></h3></div>
<div class="row col-lg-12">

	<div class="col-lg-6 col-sm-6">
		<div class="form-group">
			<label>Group ID</label>
			<select class="form-control" id="group_id">
				<option value="0">-- select --</option>
				<?php
				$qry2 = mysql_query("SELECT * FROM `usergroup` order by `group_id` ASC") or die(mysql_error());
				while($data2 = mysql_fetch_array($qry2)){
					echo'
					<option value="'.$data2['group_id'].'"';
						if($group_id == $data2['group_id']){
							echo "selected";
						}					
					echo'
					>'.$data2['group_name'].'</option>
					';
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Username</label>  <span id="a"></span>
			<input type="hidden" id="user_id" value="<?php if($edit==1){ echo $user_id;}?>">
			<input class="form-control" id="user_name" value="<?php if($edit==1){echo $user_name;} ?>">
		</div>
		<div class="form-group">
			<label>User Real Name</label>
			<input class="form-control" id="user_real_name" value="<?php if($edit==1){echo $user_real_name;} ?>">
		</div>
		<div class="form-group">
			<label>User Password</label>
			<input class="form-control" id="user_password" type="password">
		</div>
		<div class="form-group">
			<label>Retype Password</label>
			<input class="form-control" id="retype_password" type="password">
		</div>		
	</div>
	<div class="col-lg-6 col-sm-6">
		<div class="form-group">
			<label>User Info</label>
			<textarea class="form-control" id="user_info" rows="15"><?php if($edit==1){echo $user_info;} ?></textarea>
		</div>
		<?php echo $button ?>
	</div>
</div>
</div>
</div>
