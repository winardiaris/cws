<?php 
$R="R7";$W="W7";
	include("form/navigasi.php") ;
?>
<script>
	$(document).ready(function(){
		$("button.btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			
			
			if (r == true) {
				$.ajax({url:"form/se-action.php",data:"op=del"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
	});

</script>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12"><h3 class="page-header">Data Socio Economic</h3></div>
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-stiped" id="dataTables">
				<thead>
				<tr>
					<th>No.</th>
					<th>File No.</th>
					<th>Name </th>
					<th>Date of Assessment</th>
					<th>Interviewer</th>
					<th>Location</th>
					<th>Verified by</th>
					<th>Verified Date</th>
					<th >Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 0;
					$qry = mysql_query("SELECT `se`.`file_no`,`person`.`name`,`se`.`doa`,`se`.`assessment_data`,`se`.`verification` 
										FROM `se` INNER JOIN `person` ON `se`.`file_no`=`person`.`file_no` WHERE `se`.`status`='1';") or die(mysql_error());
					while($data=mysql_fetch_array($qry)){
						$no++;
						$assessment = explode(";",$data['assessment_data']);
						$interviewer = $assessment[0];
						$location = $assessment[1];
						$verification = explode(";",$data['verification']);
						$verified_by=$verification[0];
						$verified_date=$verification[2];
						
						echo'
						<tr>
							<td align="right">'.$no.'.</td>
							<td>'.$data['file_no'].'</td>
							<td>'.$data['name'].'</td>
							<td>'.$data['doa'].'</td>
							<td>'.$interviewer.'</td>
							<td>'.$location.'</td>
							<td>'.$verified_by.'</td>
							<td>'.$verified_date.'</td>
							<td align="center"><a href="?page=se-form&op=edit&file_no='.$data['file_no'].'" class="btn btn-sm btn-primary " title="Edit '.$data['file_no'].'"><i class="fa fa-edit"></i></a>
							<button class="btn btn-sm btn-danger" id="'.$data['file_no'].'"  title="Delete '.$data['file_no'].'"><i class="fa fa-trash"></i></button></td>
						</tr>
						
						';
					}
						
					
				
				
				?>
				</tbody>
			</table>
		</div>
	</div>
</div><!-- row -->
</div><!-- page-wrapper -->

