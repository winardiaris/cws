<?php 
$R="R7";$W="W7";
include("form/navigasi.php") ;
?>
<script>
	$(document).ready(function(){
		$("a.delete").click(function(){
			var	file_no=$(this).attr("data"),
					se_id = $(this).attr("id"),
					datanya="&file_no="+file_no+"&se_id="+se_id;	
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
		<div class="navbar">
			<div class="btn-group">
				<a href="?page=se-data&a=1"  class="btn btn-sm btn-primary <?php if($_GET['a']==1){ echo "active";}?> "> First Assessment</a>
				<a href="?page=se-data&a=2"  class="btn btn-sm btn-primary <?php if($_GET['a']==2){ echo "active";}?>"> Re-Assessment</a>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="">
			<table class="table table-bordered table-hover table-striped" id="dataTables">
				<thead>
				<tr>
					<th></th>
					<th>No.</th>
					<th>File No.</th>
					<th>Name </th>
					<th>Date of <?php if($_GET['a']==2){echo "Re-Assessment";}else{echo "Assessment";} ?></th>
					<th>Interviewer</th>
					<th>Location</th>
					<th>Verified by</th>
					<th>Next Assessment</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 0;
					if($_GET['a']==1){
						setHistory($_SESSION['user_id'],"se_data","Open SE Data (First Assessment)",$NOW);
						$qry = mysql_query("SELECT `se`.`se_id`, `se`.`file_no`, `person`.`name`, `se`.`doa`, `se`.`assessment_data`, `se`.`nextassessment`,
										`se`.`verification` 
										FROM `se` INNER JOIN `person` ON `se`.`file_no`=`person`.`file_no` WHERE `se`.`status`='1' AND `se`.`id`='0';") or die(mysql_error());
					}
					elseif($_GET['a']==2){
						setHistory($_SESSION['user_id'],"se_data","Open SE Data (Re-assessment)",$NOW);
						$qry = mysql_query("SELECT `se`.`se_id`, `se`.`file_no`, `person`.`name`, `se`.`doa`, `se`.`assessment_data`, `se`.`nextassessment`,		`se`.`verification` 
										FROM `se` INNER JOIN `person` ON `se`.`file_no`=`person`.`file_no` WHERE `se`.`status`='1' AND `se`.`id`='1';") or die(mysql_error());
					}
					else{
						header("location:?page=se-data&a=1");
					}
					while($data=mysql_fetch_array($qry)){
						$no++;
						$assessment = explode(";",$data['assessment_data']);
						$interviewer = $assessment[0];
						$location = $assessment[1];
						$verification = explode(";",$data['verification']);
						$verified_by=$verification[0];
						
						
						echo'
						<tr>
							<td width="10px">
								<div class="dropdown">
								  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								   <li role="presentation">
										<a role="menuitem" tabindex="-1" href="form/view/view-se.php?file_no='.$data['file_no'].'&id='.$data['se_id'].'"  title="View '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-eye"></i> View this</a></li> ';
								   if($_GET['a']==1){
										echo '<li role="presentation">
										<a role="menuitem" tabindex="-1" href="form/view/view-se-all.php?file_no='.$data['file_no'].'&a=all"  title="View '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-eye"></i> View all</a></li>';
										
									}
								   echo'<li role="presentation">
										<a role="menuitem" tabindex="-1" href="?page=se-form&op=edit&file_no='.$data['file_no'].'&se_id='.$data['se_id'].'"><i class="fa fa-edit"></i> Edit</a></li>
								   <li role="presentation">
										<a role="menuitem" tabindex="-1" class="delete text-danger" href="" data="'.$data['file_no'].'" id="'.$data['se_id'].'"><i class="fa fa-trash"></i> Delete</a>
									</li>
								  </ul>
								</div>
							</td>
							<td align="right">'.$no.'.</td>
							<td>'.$data['file_no'].'</td>
							<td>'.$data['name'].'</td>
							<td>'.$data['doa'].'</td>
							<td>'.$interviewer.'</td>
							<td>'.$location.'</td>
							<td>'.$verified_by.'</td>
							<td>'.$data['nextassessment'].'</td>
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

