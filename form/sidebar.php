<!-- sidebar -->
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li><a href="?page=dashboard" <?php if($_GET['page']=="dashboard" OR $_GET['page']=="chart" ) echo " class='active'"; ?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
			<li <?php if($_GET['page']=="person-form" OR $_GET['page']=="person-data") echo " class='active'"; ?>>
				<a href="#" title="Personal Information"><i class="fa fa-user fa-fw" ></i> Person<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=person-form" <?php if($_GET['page']=="person-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li><a href="?page=person-data" <?php if($_GET['page']=="person-data") echo " class='active'"; ?>><i class="fa fa-table"></i>  Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li <?php if($_GET['page']=="ia-form" OR $_GET['page']=="ia-data") echo " class='active'"; ?>>
				<a href="#" title="Initial Assessment Form for Unaccompanied Minors"><i class="fa fa-user fa-fw" ></i> IA<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=ia-form" <?php if($_GET['page']=="ia-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li><a href="?page=ia-data" <?php if($_GET['page']=="ia-data") echo " class='active'"; ?>><i class="fa fa-table"></i>  Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li <?php if($_GET['page']=="se-form" OR $_GET['page']=="se-data") echo " class='active'"; ?>>
				<a href="#" title="Socio Eeconomic Assessment Report"><i class="fa fa-user fa-fw" ></i> SE<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=se-form" <?php if($_GET['page']=="se-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li><a href="?page=se-data" <?php if($_GET['page']=="se-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li <?php if($_GET['page']=="bia-form" OR $_GET['page']=="bia-data") echo " class='active'"; ?>>
				<a href="#" title="Best Interest Assessment Report for Temporary Care"><i class="fa fa-user fa-fw" ></i> BIA<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=bia-form" <?php if($_GET['page']=="bia-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li><a href="?page=bia-data" <?php if($_GET['page']=="bia-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li <?php if($_GET['page']=="hr-form" OR $_GET['page']=="hr-data") echo " class='active'"; ?>>
				<a href="#" title="Health Report"><i class="fa fa-medkit fa-fw" ></i> HR<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=hr-form" <?php if($_GET['page']=="hr-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li><a href="?page=hr-data" <?php if($_GET['page']=="hr-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li <?php if($_GET['page']=="user") echo " class='active'"; ?>>
				<a href="#" title="Administrator"><i class="fa fa-gear fa-fw" ></i> Administrator<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="?page=user" <?php if($_GET['page']=="user") echo " class='active'"; ?>><i class="fa fa-user"></i> User</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			
		
		</ul>
	</div><!-- /.sidebar-collapse -->
</div><!-- /.navbar-static-side -->
