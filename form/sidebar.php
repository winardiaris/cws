<!-- sidebar -->

<script>
$(document).ready(function(){
	<?php
		$group_id=$_SESSION['group_id'];
		if(isset($group_id)){
			$a = "R1;W1;R2;W2;R3;W3;R4;W4;R5;W5;R6;W6;R7;W7;R8;W8;R9;W9;R10;W10;R11;W11;R12;W12;R13;W13;R14;W14";
			$b = explode(";",$a);
			$c = count($z);
			
			$qry = mysql_query("SELECT `group_access` FROM `usergroup` WHERE `group_id`='$group_id'")or die(mysql_error());
			$x = mysql_fetch_array($qry);
			$z=explode(";",$x['group_access']);
			
			for($i=1;$i<=14;$i++){
				$k = $i+($i-1);
				$j = $k-1;
				
				if($b[$j] == $z[$j] AND $b[$k] == $z[$k] ){
					echo "$('#M".$i."').show();";
				}
				elseif($b[$j] == $z[$j] AND $b[$k] != $z[$k] ){
					echo "$('#M".$i."').show();";
				}
				elseif($b[$j] != $z[$j] AND $b[$k] == $z[$k] ){
					echo "$('#M".$i."').hide();";
				}
				else{
					echo "$('#M".$i."').hide();";
				}

	
			}
		}
	?>

	

});
</script>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li id="M1"><a href="?page=dashboard" <?php if($_GET['page']=="dashboard" OR $_GET['page']=="chart" ) echo " class='active'"; ?>><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
			<li id="M23" <?php if($_GET['page']=="person-form" OR $_GET['page']=="person-data") echo " class='active'"; ?>>
				<a href="#" title="Personal Information"><i class="fa fa-user fa-fw" ></i> Person<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M2"><a href="?page=person-form" <?php if($_GET['page']=="person-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li id="M3"><a href="?page=person-data" <?php if($_GET['page']=="person-data") echo " class='active'"; ?>><i class="fa fa-table"></i>  Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li id="M45" <?php if($_GET['page']=="ia-form" OR $_GET['page']=="ia-data") echo " class='active'"; ?>>
				<a href="#" title="Initial Assessment Form for Unaccompanied Minors"><i class="fa fa-user fa-fw" ></i> IA<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M4"><a href="?page=ia-form" <?php if($_GET['page']=="ia-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li id="M5"><a href="?page=ia-data" <?php if($_GET['page']=="ia-data") echo " class='active'"; ?>><i class="fa fa-table"></i>  Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li id="M67" <?php if($_GET['page']=="se-form" OR $_GET['page']=="se-data") echo " class='active'"; ?>>
				<a href="#" title="Socio Eeconomic Assessment Report"><i class="fa fa-user fa-fw" ></i> SE<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M6"><a href="?page=se-form" <?php if($_GET['page']=="se-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li id="M7"><a href="?page=se-data" <?php if($_GET['page']=="se-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li id="M89" <?php if($_GET['page']=="bia-form" OR $_GET['page']=="bia-data") echo " class='active'"; ?>>
				<a href="#" title="Best Interest Assessment Report for Temporary Care"><i class="fa fa-user fa-fw" ></i> BIA<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M8"><a href="?page=bia-form" <?php if($_GET['page']=="bia-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li id="M9"><a href="?page=bia-data" <?php if($_GET['page']=="bia-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li id="M1011" <?php if($_GET['page']=="hr-form" OR $_GET['page']=="hr-data") echo " class='active'"; ?>>
				<a href="#" title="Health Report"><i class="fa fa-medkit fa-fw" ></i> HR<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M10"><a href="?page=hr-form" <?php if($_GET['page']=="hr-form") echo " class='active'"; ?>><i class="fa fa-list-alt"></i> Form</a></li>
					<li id="M11"><a href="?page=hr-data" <?php if($_GET['page']=="hr-data") echo " class='active'"; ?>><i class="fa fa-table"></i> Data</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			<li id="M121314" <?php if($_GET['page']=="user" OR $_GET['page']=="deleted" OR $_GET['page']=="history") echo " class='active'"; ?>>
				<a href="#" title="Administrator"><i class="fa fa-gear fa-fw" ></i> Administrator<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li id="M12"><a href="?page=user" <?php if($_GET['page']=="user") echo " class='active'"; ?>><i class="fa fa-user"></i> User</a></li>
					<li id="M13"><a href="?page=deleted" <?php if($_GET['page']=="deleted") echo " class='active'"; ?>><i class="fa fa-trash"></i> Deleted Data</a></li>
					<li id="M14"><a href="?page=history" <?php if($_GET['page']=="history") echo " class='active'"; ?>><i class="fa fa-history"></i> History</a></li>
				</ul><!-- /.nav-second-level -->
			</li>
			
		
		</ul>
	</div><!-- /.sidebar-collapse -->
</div><!-- /.navbar-static-side -->
