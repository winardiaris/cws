<?php include("form/navigasi.php") ?>


<div id="page-wrapper"><!-- page-wrapper -->
	<div class="row">
		<div class="col-lg-12"><h3 class="page-header">INITIAL ASSESSMENT DATA</h3></div>
		<div class="col-lg-12">
			<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="dataTables-example">
				<thead>
				<tr>
					<th width="10px">No.</th>
					<th>File No.</th>
					<th>Name</th>
					<th>Date Assessment</th>
					<th>Location Assessment</th>
					<th>Assessment by</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$qry = 	mysql_query("
								SELECT `ia`.`file_no`,`person`.`name`,`ia`.`assessment` FROM `ia`
								INNER JOIN `person` ON `ia`.`file_no`=`person`.`file_no` 
								") or die(mysql_error());
						while ($data = mysql_fetch_array($qry)){
							$no++;
							$assessment = explode(";",$data['assessment']);
							echo'
							<tr>
								<td align="right">'.$no.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td width="150px" align="center">'.$assessment[0].'</td>
								<td>'.$assessment[1].'</td>
								<td>'.$assessment[2].'</td>
								<td width="10px">
									<a  href="?page=ia-form&op=edit&file_no='.$data['file_no'].'" class="btn btn-circle btn-primary btn-sm"  title="Edit '.$data['name'].'"><i class="fa fa-edit"></i></a>
								</td>
								<td width="10px">
									<button class="btn btn-circle btn-danger btn-sm" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-close"></i></button>
								</td>
							</tr>
							
							';
							
						}
					
					?>
				
				</tbody>
			</table>
			
			</div>
		</div>
		
		
	</div>
</div><!-- page-wrapper -->
