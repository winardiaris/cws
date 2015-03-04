<?php 
$R="R12";$W="W12";
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
				<a href="?page=user-form" class="btn btn-sm btn-primary"><i class="fa fa-plus" ></i> Add new</a>
				<a href="?page=user-group" class="btn btn-sm btn-primary"><i class="fa fa-user" ></i> User Group</a>
			</div>
			</div>
			
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
					<tr>
						<th>No</th>
						<th >User ID</th>
						<th >Group</th>
						<th >User Name</th>
						<th>User Real Name</th>
						<th>Last Login</th>
						<th>Last Changed</th>
						<th >Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$qry = mysql_query("SELECT `user`.`user_id`, `usergroup`.`group_name`, `user`.`user_name`, `user`.`user_real_name`, `user`.`last_login` , `user`.`last_change` FROM `user` 
						INNER JOIN `usergroup` on `user`.`group_id` = `usergroup`.`group_id` 
						
						ORDER BY `usergroup`.`group_id` ASC") or die(mysql_error());
						$no = 0;
						while($data = mysql_fetch_array($qry)){
							$no++;
							echo '
							<tr>
								<td align="right">'.$no.'.</td>
								<td>'.$data['user_id'].'</td>
								<td>'.$data['group_name'].'</td>
								<td>'.$data['user_name'].'</td>
								<td>'.$data['user_real_name'].'</td>
								<td>'.$data['last_login'].'</td>
								<td>'.$data['last_change'].'</td>
								
								<td align="center" >
								<a href="?page=user-form&op=edit&user_id='.$data['user_id'].'" class="btn btn-sm btn-primary" title="edit" ><i class="fa fa-edit"></i></a> <a href="?page=user-action&op=del&user_id='.$data['user_id'].'" class="btn btn-sm btn-danger" title="delete"><i class="fa fa-close"></i></a></td>
							</tr>
							
							';
						}
					
					?>
				</tbody>
			</table>
		</div>
		
	</div>
</div><!-- page-wrapper -->
