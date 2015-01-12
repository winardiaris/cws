<?php 
$A = "D";
//cek login
include("form/navigasi.php") 
?>
<div id="page-wrapper"><!-- page-wrapper -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
		<div class="col-lg-4">
			<div class="well well-sm">
				<label>Welcome  </label>
				<p>You login as <i><?php echo  $_SESSION['user_real_name']; ?></i>	</p>
			</div>
		</div>
		
	</div>
</div><!-- page-wrapper -->
