<?php 
$R="R5";$W="W5";
$LOCATION = "ia_data";
setHistory($_SESSION['user_id'],$LOCATION,"Open IA Data",$NOW);

include("form/navigasi.php") ?>

<script>
	$(document).ready(function(){
		$(".delete").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			
			
			if (r == true) {
				$.ajax({url:"form/ia-action.php",data:"op=del"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
	});

</script>
<div id="page-wrapper"><!-- page-wrapper -->
	<div class="row">
		<div class="col-lg-12"><h3 class="page-header">Initial Assessment Data</h3></div>
		<div class="col-lg-12">
			<div class="">
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
				<tr>
					<th ></th>
					<th>No.</th>
					<th>File No.</th>
					<th>Name</th>
					<th>Date Assessment</th>
					<th>Location Assessment</th>
					<th>Assessment by</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$qry = 	mysql_query("
								SELECT `ia`.`file_no`,`person`.`name`,`ia`.`assessment` FROM `ia`
								INNER JOIN `person` ON `ia`.`file_no`=`person`.`file_no` WHERE `ia`.`status`='1';
								") or die(mysql_error());
						while ($data = mysql_fetch_array($qry)){
							$no++;
							$assessment = explode(";",$data['assessment']);
							echo'
							<tr>
								<td width="10px">
									<div class="dropdown">
									  <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
									    <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="form/view/view.php?op=ia&file_no='.$data['file_no'].'"  title="View '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-eye"></i> View</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" href="?page=ia-form&op=edit&file_no='.$data['file_no'].'"><i class="fa fa-edit"></i> Edit</a></li>
									    <li role="presentation"><a role="menuitem" tabindex="-1" class="delete text-danger" href="" id="'.$data['file_no'].'"><i class="fa fa-trash"></i> Delete</a></li>
									  </ul>
									</div>
								</td>
								<td align="right" width="40px">'.$no.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td width="150px" align="center">'.$assessment[0].'</td>
								<td>'.$assessment[1].'</td>
								<td>'.$assessment[2].'</td>
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
