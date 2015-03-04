<?php
include ("../inc/conf.php");
include ("header.php");

if(isset($_GET['op'])){
	$op = $_GET['op'];
	if($op=="edit"){
		$user_id = $_GET['user_id'];
		
		$qry = mysql_query("SELECT * FROM `user` WHERE `user_id`='$user_id'") or die(mysql_error());
		$data = mysql_fetch_array($qry);
		
		//data
		$group_id = $data['group_id'];
		$user_name = $data['user_name'];
		$oldpassword = $data['user_password'];
		$user_real_name = $data['user_real_name'];
		$user_mail = $data['user_mail'];
		$user_info = $data['user_info'];
		
		$edit=1;
	}
}

?>
<script>
$(document).ready(function(){
	$("#old_password").keyup(function(){
		var old1 = $("#old_password2").val();
		var old2 = $.md5($(this).val());
		
		if(old2 == old1){
			var a = "<i class='fa fa-check'></i> Match "
			$("#same").html(a).addClass("text-success").removeClass("text-danger");
		}
		else{
			var a = "<i class='fa fa-close'></i> Not Match !!"
			$("#same").html(a).addClass("text-danger").removeClass("text-success");
		}
	});
	
	$("#user_password").keyup(function(){
		var x = $(this).val().length;
		if(x <=3){
			var a = "Strong Password : Low";
			$("#same1").html(a).addClass("text-danger").removeClass("text-success").removeClass("text-warning");
		}
		else if(x <=6){
			var a = "Strong Password :  Medium";
			$("#same1").html(a).addClass("text-warning").removeClass("text-success").removeClass("text-danger");
		}
		else if(x >=8){
			var a = "Strong Password :  Strong";
			$("#same1").html(a).addClass("text-success").removeClass("text-danger").removeClass("text-warning");
		}
	});
	$("#retype_password").keyup(function(){
		var x = $("#user_password").val(),
			y = $(this).val();
			
		if(y==x){
			var a = "<i class='fa fa-check'></i> Match "
			$("#same2").html(a).addClass("text-success").removeClass("text-danger");
		}
		else{
			var a = "<i class='fa fa-close'></i> Not Match !!"
			$("#same2").html(a).addClass("text-danger").removeClass("text-success");
		}
		
	});
	
	$("#user_update").click(function(){
		var user_id = $("#user_id").val(),
			name = $("#user_name").val(),
			real_name = $("#user_real_name").val(),
			oldpassword = $("#old_password").val(),
			oldmd5 = $.md5(oldpassword),
			oldpassword2 = $("#old_password2").val(),
			password = $("#user_password").val(),
			rpassword = $("#retype_password").val(),
			info = $("#user_info").val(),
			datanya="&user_id="+user_id+"&name="+name+"&real_name="+real_name+"&password="+password+"&info="+info;
			
			
		if(name==""){
			alert("Please insert username");
			$("#user_name").focus();
		}
		else if(real_name==""){
			alert("Please insert Real Name");
			$("#user_real_name").focus();
		}
		else if(oldpassword !=""){
			if(oldmd5 != oldpassword2){
				alert("Old password failure");
				$("#old_password").val("").focus();
			}
			else if(password != rpassword){
				alert("Password not same");
				$("#retype_password").focus();
			}
			else if(password=="" || rpassword==""){
				alert("Pleasr insert new password ");
				$("#user_password").focus();
			}
			else{
				$.ajax({url:"user-action.php",data:"op=updateusersetting"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("body").trigger("click");
					}else{alert("Data not saved !!");}}
				});
			}
		}
		else{
			
			$.ajax({url:"user-action.php",data:"op=updateusersetting"+datanya,cache:false,success: function(msg){
				if(msg=="success"){
					alert("Data has been saved !!");
					$("body").trigger("click");
				}else{alert("Data not saved !!");}}
			});
		}
	});
});
</script>
<div id="asd" >
<div class="col-lg-12" ><h3 class="page-header">User Setting</h3></div>
<div class="row col-lg-12">
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label>Username: *</label>  <span id="a"></span>
			<input type="hidden" id="user_id" value="<?php if($edit==1){ echo $user_id;}?>">
			<input class="form-control" id="user_name" value="<?php if($edit==1){echo $user_name;} ?>">
		</div>
		<div class="form-group">
			<label>User Real Name: *</label>
			<input class="form-control" id="user_real_name" value="<?php if($edit==1){echo $user_real_name;} ?>">
		</div>
		<div class="form-group">
			<label>Old  Password: *</label>
			<input class="form-control" id="old_password" type="password"><span id="same"></span>
			<input class="form-control" id="old_password2" type="hidden" value="<?php echo $oldpassword;?>">
		</div>
		<div class="form-group">
			<label>New Password: *</label>
			<input class="form-control" id="user_password" type="password"><span id="same1"></span>
		</div>
		<div class="form-group">
			<label>Retype Password *</label>
			<input class="form-control" id="retype_password" type="password"><span id="same2"></span>
			<br><small>* Required</small>
		</div>	
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="form-group">
			<label>User Info: *</label>
			<textarea class="form-control" id="user_info" rows="5"><?php if($edit==1){echo $user_info;} ?></textarea>
		</div>
		<button  id="user_update" class="btn btn-success"><i class="fa fa-refresh"></i> Update</button>
	</div>
	
</div>
<div class="col-lg-12">
	<table class="table table-striped table-bordered table-hover" id="dataTables">
		<thead>
		<tr>
			<th>No</th>
			<th>History</th>
			<th>Time</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$no=1;
			$qry = mysql_query("SELECT * FROM `system_log` WHERE `user_id`='$user_id' ORDER BY `log_time` DESC")or die(mysql_error());
			while($data=mysql_fetch_array($qry)){
				echo'
				<tr>
					<td align="right">'.$no++.'.</td>
					<td>'.$data['log_message'].'</td>
					<td>'.$data['log_time'].'</td>
				</tr>
				';
			}
		?>
		</tbody>
	</table>
</div>
</div>

<?php include ("footer.php");?>
