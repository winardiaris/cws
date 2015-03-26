<?php 
$R="R12";$W="W12";
include("form/navigasi.php");
setHistory($_SESSION['user_id'],"user_data","Open User Data",$NOW);
?>
<script>
$(document).ready(function(){
	//test
	$(".delete").click(function(){
		var 	user_id = $(this).attr("id"),
				datanya = "&user_id="+user_id;
		
		$.ajax({url:"form/user-action.php",data:"op=deluser"+datanya,cache:false,success: function(msg){
			if(msg=="success"){
				alert("Data has been deleted !!");
				location.reload();
			}else{alert("Data not delete	 !!");}}
		});
	});
	
})
</script>
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
						<th></th>
						<th>No</th>
						<th >User ID</th>
						<th >Group</th>
						<th >User Name</th>
						<th>User Real Name</th>
						<th>Last Login</th>
						<th>Last Changed</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$qry = mysql_query("SELECT `user`.`user_id`, `usergroup`.`group_name`, `user`.`user_name`, `user`.`user_real_name`, `user`.`last_login` , `user`.`last_change` FROM `user` 
						INNER JOIN `usergroup` on `user`.`group_id` = `usergroup`.`group_id` 
						
						ORDER BY `user`.`user_id` ASC") or die(mysql_error());
						$no = 0;
						while($data = mysql_fetch_array($qry)){
							$no++;
							echo '
							<tr>
								<td width="30px">
									<div class="dropdown">
									  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"><span class="caret"></span></button>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									    <li role="presentation">
											<a role="menuitem" tabindex="-1" href="?page=user-form&op=edit&user_id='.$data['user_id'].'"><i class="fa fa-edit"></i> Edit</a>
									    </li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="?page=user-action&op=deluser&user_id='.$data['user_id'].'" class="text-danger delete"><i class="fa fa-trash"></i> Delete</a></li>
									  </ul>
									</div>
								</td>	
								<td align="right">'.$no.'.</td>
								<td>'.$data['user_id'].'</td>
								<td>'.$data['group_name'].'</td>
								<td>'.$data['user_name'].'</td>
								<td>'.$data['user_real_name'].'</td>
								<td>'.$data['last_login'].'</td>
								<td>'.$data['last_change'].'</td>
														
							';
						}
					
					?>
				</tbody>
			</table>
		</div>
		
	</div>
</div><!-- page-wrapper -->
