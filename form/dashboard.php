<?php 
$R="R1";$W="W1";
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
		<div class="col-lg-4">
			<div class="panel panel-success">
				<div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-user fa-5x"></i></div>
                                <div class="col-xs-9 text-right"><div class="huge">
                                <?php
									$qry =mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `created` LIKE '%$TODAY%' AND `active`='1';") or die(mysql_error());
									$data = mysql_fetch_array($qry);
									echo $data['ada'];
                                ?>
                                </div><div>New People!</div></div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer ">
                                <span class="pull-left text-success">View Details</span>
                                <span class="pull-right text-success"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
				
			</div>
		</div>
		
	</div>
</div><!-- page-wrapper -->
