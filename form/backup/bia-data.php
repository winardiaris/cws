<?php
$R="R9";$W="W9";
setHistory($_SESSION['user_id'],"bia_data","Open BIA Data",$NOW);
include("form/navigasi.php") ;

?>
<script>
	$(document).ready(function(){
		$("button.btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			
			if (r == true) {
				$.ajax({url:"form/bia-action.php",data:"op=del"+datanya,cache:false,success: function(msg){
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
	<div class="col-lg-12"><div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables">
		<thead>
		<tr>
			<th>No</th>
			<th>File No</th>
			<th>Name</th>
			<th>Date Assessment</th>
			<th>Location</th>
			<th>Case Worker</th>
			<th>Organization</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			$qry = mysql_query("SELECT `bia`.`file_no`,`bia`.`doa`,`bia`.`assessment`,`person`.`name` FROM `bia` INNER JOIN `person` ON `bia`.`file_no`=`person`.`file_no` WHERE `bia`.`status`='1' ") or die(mysql_error());
			while($data=mysql_fetch_array($qry)){
				$no++;
				$assessment = explode(";",$data['assessment']);
				echo'
				<tr>
					<td align="right">'.$no.'.</td>
					<td>'.$data['file_no'].'</td>
					<td>'.$data['name'].'</td>
					<td>'.$data['doa'].'</td>
					<td>'.$assessment[0].'</td>
					<td>'.$assessment[1].'</td>
					<td>'.$assessment[2].'</td>
					<td align="center">
						<a  href="?page=bia-form&op=edit&file_no='.$data['file_no'].'" class="btn  btn-sm btn-primary btn-sm"  title="Edit '.$data['name'].'"><i class="fa fa-edit"></i></a>
						<button class="btn btn-sm btn-danger btn-sm" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i></button>
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

