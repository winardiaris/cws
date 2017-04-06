<?php
$R="R14";$W="W14";
include("form/navigasi.php");
?>


<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">History</h3>
	</div>
	<div class="col-lg-12">
		<table  class="table table-bordered table-hover table-striped" id="dataTables">
			<thead>
			<tr>
				<th>No.</th>
				<th>User ID | Name</th>
				<th>Location</th>
				<th>Activity</th>
				<th>Time</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no=1;
				$qry = mysql_query("
							SELECT
							`system_log`.`user_id`,
							`system_log`.`log_location`,
							`system_log`.`log_message`,
							`system_log`.`log_time`,
							`user`.`user_real_name`
							FROM `system_log`
							INNER JOIN `user` ON `system_log`.`user_id`=`user`.`user_id`

							 ORDER BY `log_time` DESC;")OR DIE(mysql_error());
				while($data=mysql_fetch_array($qry)){
					echo'
					<tr>
						<td align="right" width="50px">'.$no++.'.</td>
						<td width="150px"><a href="?page=user-form&op=edit&user_id='.$data['user_id'].'">'.$data['user_id'].' | '.$data['user_real_name'].'</a></td>
						<td width="100px">'.$data['log_location'].'</td>
						<td>'.$data['log_message'].'</td>
						<td width="200px" align="center">'.$data['log_time'].'</td>
					</tr>
					';
				}
			?>
			</tbody>
		</table>

	</div>
</div>
</div>
