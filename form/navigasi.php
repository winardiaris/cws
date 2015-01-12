<!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">
		<!-- /.navbar-header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php">
			<img src="img/logo.svg" class="navbar-logo">
			<span class="navbar-brand" ><?php echo $NAME ?></span></a>
		</div>
		<!-- /.navbar-header -->
		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
				<ul class="dropdown-menu dropdown-alerts">
					<li>
						<a href="#"><div><i class="fa fa-comment fa-fw"></i> New Comment<span class="pull-right text-muted small">4 minutes ago</span></div></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#"><div><i class="fa fa-twitter fa-fw"></i> 3 New Followers<span class="pull-right text-muted small">12 minutes ago</span></div></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#"><div><i class="fa fa-envelope fa-fw"></i> Message Sent<span class="pull-right text-muted small">4 minutes ago</span></div></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#"><div><i class="fa fa-tasks fa-fw"></i> New Task<span class="pull-right text-muted small">4 minutes ago</span></div></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#"><div><i class="fa fa-upload fa-fw"></i> Server Rebooted<span class="pull-right text-muted small">4 minutes ago</span></div></a>
					</li>
					<li class="divider"></li>
					<li>
						<a class="text-center" href="#"><strong>See All Alerts</strong><i class="fa fa-angle-right"></i></a>
					</li>
				</ul><!-- /.dropdown-alerts -->
			</li><!-- /.dropdown -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
				<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
				<li><a href="form/user-form.php?a=edit&user_id=<?php echo $_SESSION['user_id'];?>"  title="User setting" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
				<li class="divider"></li>
				<li><a href="?page=login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
				</ul><!-- /.dropdown-user -->
			</li><!-- /.dropdown -->
		</ul><!-- /.navbar-top-links -->
		
		
		<?php  include("sidebar.php"); ?>
        </nav>
