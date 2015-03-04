<?php 
$LOCATION = "login";
include ("inc/conf.php");
if(isset($_POST['login'])){
	$name = $_POST['user_name'];
	$password = $_POST['user_password'];
	
	
	if(!empty($name) AND !empty($password)){
		$user_password = md5($password);
		$user_name 	= mysql_real_escape_string($name);
		$user_password 	= mysql_real_escape_string($user_password);
		
		$qry = mysql_query("SELECT * FROM `user` WHERE `user_name`='$user_name' AND `user_password`='$user_password' ") or die(mysql_error());
		$istrue = mysql_num_rows($qry);
		
		if($istrue > 0){
			echo '
				<div class="alert alert-success alert-dismissable alerts" >
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Success 
				</div>;
			';
			$data = mysql_fetch_array($qry);
			
			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['group_id'] = $data['group_id'];
			$_SESSION['user_real_name'] = $data['user_real_name'];
			$_SESSION['timein'] = time();
			$_SESSION['timeout'] = $_SESSION['timein'] + $TIMEOUT;
			$_SESSION['login'] = 1;
			
			//update last_login
			mysql_query("UPDATE `user` SET `last_login`='$NOW' WHERE `user_id`='".$data['user_id']."'") or die(mysql_error());
			
			//make log 
			setHistory($data['user_id'],$LOCATION,"Login Succes",$NOW);
		
			sleep(1);
			
			header("location:?page=dashboard");
			
		}
		else{
		echo '
			<div class="alert alert-danger alert-dismissable alerts" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Username or Password Invalid !!
			</div>;
		';
		}
	}
	else{
		echo '
			<div class="alert alert-danger alert-dismissable alerts" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Username or Password Invalid !!
			</div>;
		';
	}
	
}
elseif(isset($_GET['log'])){
	if($_GET['log']=="out"){
		echo '
			<div class="alert alert-success alert-dismissable alerts" >
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			You has been logout
			</div>;
		';
		//make log 
		setHistory($_SESSION['user_id'],$LOCATION,"Logout Succes",$NOW);
		session_destroy();
	}
		
}



?>

<!-- ---------------------------------------- -->
<div id="page-login">
<div class="col-md-4 col-md-offset-4 col-lg-4">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Please Sign In</h3>
		</div>
		<div class="panel-body">
			<form role="form" action="?page=login" method="POST">
				<fieldset>
					<div class="form-group">
						<input class="form-control" placeholder="Username" name="user_name" type="text" autofocus>
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Password" name="user_password" type="password" value="">
					</div>
					<!-- Change this to a button or input when using this as a form -->
					<button type="submit" name="login" class="btn btn-lg btn-success btn-block">Login</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<div id="#alert">
</div>	
</div>
