<?php
$R="R11";$W="W11";
include("form/navigasi.php") ;
?>
<script>
	$(document).ready(function(){
		$("button.btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			
			
			if (r == true) {
				$.ajax({url:"form/hr-action.php",data:"op=del"+datanya,cache:false,success: function(msg){
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
	<div class="col-lg-12"><h3 class="page-header">Data Best Interest Assessment Report for Temporary Care</h3></div>
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
				<tr>
					<th >No.</th>
					<th>File No</th>
					<th>Name</th>
					<th>Report Date</th>
					<th>Reported</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 0;
					$qry = mysql_query("SELECT `hr`.`file_no`, `person`.`name`,`hr`.`report_date`, `hr`.`basic` FROM `hr`
										INNER JOIN `person` ON `hr`.`file_no` = `person`.`file_no` WHERE `hr`.`status`='1'") or die(mysql_error());
					while($data=mysql_fetch_array($qry)){
						$no++;
						$basic=explode(";",$data['basic']);
						echo'
						<tr>
							<td width="50px" align="right">'.$no.'.</td>
							<td>'.$data['file_no'].'</td>
							<td>'.$data['name'].'</td>
							<td>'.$data['report_date'].'</td>
							<td>'.$basic[2].'</td>
							<td>'.$basic[0].'</td>
							<td width="80px" align="center">
								<a class="btn btn-primary btn-sm" href="?page=hr-form&op=edit&file_no='.$data['file_no'].'"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-sm" id="'.$data['file_no'].'"><i class="fa fa-trash"></i></button>
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
</div>
