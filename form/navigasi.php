<?php include ("inc/access.php"); ?>
<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
		<!-- /.navbar-header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle btn-circle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
<!--
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
-->
			</button>
			<a href="?page=dashboard">
			<img src="img/logo.svg" class="navbar-logo">
			<span class="navbar-brand" ><?php echo $NAME ?></span></a>
			<p class="navbar-text">Database System Protecting Urban Refugees Through Empowerment</p> 
		</div>
		<!-- /.navbar-header -->
		<ul class="nav navbar-top-links navbar-right">
			<?php include("notif.php");?>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?php echo $_SESSION['user_real_name'];?> <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
				<li><a href="<?php echo $URL; ?>form/user-setting.php?op=edit&user_id=<?php echo $_SESSION['user_id'];?>"  title="User setting" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-gear fa-fw"></i> User Settings</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo $URL; ?>?page=login&log=out" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
				</ul><!-- /.dropdown-user -->
			</li><!-- /.dropdown -->
		</ul><!-- /.navbar-top-links -->
		
		
		<?php  include("sidebar.php"); ?>
	</nav>
	<div class="col-lg-12" id="fix-atas"></div>
