<?php 
$A = "U";
//cek login
include("form/navigasi.php");
?>
<div id="page-wrapper"><!-- page-wrapper -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">User</h3>
		</div>
		<div class="col-lg-12">
			<div class="navbar">
			<div class="btn-group">
				<a href="form/user-form.php?a=add" target="framepopup"  onClick="setdisplay(divpopup,1)" class="btn btn-sm btn-primary"><i class="fa fa-plus" ></i> Add new</a>
				<a href="" target="framepopup"  onClick="setdisplay(divpopup,1)" class="btn btn-sm btn-primary"><i class="fa fa-user" ></i> User Group</a>
<!--
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="modalbtn">Launch Demo Modal</button>
				<script>
					$("#modal").ready(function(){
						$("#modal").load("form/user-form.php?a=add");
					});
				</script>
-->
			</div>
			</div>
		
			
		<div class="table-responsive">
			<form role="form" name="form-users">
			<table class="table table-hover table-bordered table-striped">	
				<thead>
					<tr>
						<th width="10px">No</th>
						<th >User ID</th>
						<th >Group ID</th>
						<th >User Name</th>
						<th>User Real Name</th>
						<th>User Mail</th>
						<th>User Info</th>
						<th>Last Login</th>
						<th>Last Changed</th>
						<th colspan="2" >Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$qry = mysql_query("SELECT * FROM `user` ORDER BY `group_id` ASC") or die(mysql_error());
						$no = 0;
						while($data = mysql_fetch_array($qry)){
							$no++;
							echo '
							<tr>
								<td align="right">'.$no.'.</td>
								<td>'.$data['user_id'].'</td>
								<td>'.$data['group_id'].'</td>
								<td>'.$data['user_name'].'</td>
								<td>'.$data['user_real_name'].'</td>
								<td>'.$data['user_mail'].'</td>
								<td>'.$data['user_info'].'</td>
								<td>'.$data['last_login'].'</td>
								<td>'.$data['last_change'].'</td>
								
								<td align="center" ><a href="form/user-form.php?a=edit&user_id='.$data['user_id'].'" class="btn btn-sm btn-primary" title="edit" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-edit"></i></a> <a href="form/user-action.php?a=del&user_id='.$data['user_id'].'" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-close"></i></a></td>
							</tr>
							
							';
						}
					
					?>
				</tbody>
			</table>
			</form>
		</div>
		</div>
		
	</div>
</div><!-- page-wrapper -->
