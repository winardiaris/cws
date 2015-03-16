<?php
$R="R11";$W="W11";
include("form/navigasi.php") ;
?>
<script>
	$(document).ready(function(){
		$("a.delete").click(function(){
			var 	hr_id = $(this).attr("id"),
					file_no = $(this).attr("data"),
					datanya="&hr_id="+hr_id;	
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
	<div class="col-lg-12"><h3 class="page-header">Data Health Report</h3></div>
	<div class="col-lg-12">
		<div class="navbar">
			<div class="btn-group">
				<a href="?page=hr-data&a=1"  class="btn btn-sm btn-primary <?php if($_GET['a']==1){ echo "active";}?> "> First Assessment</a>
				<a href="?page=hr-data&a=2"  class="btn btn-sm btn-primary <?php if($_GET['a']==2){ echo "active";}?>"> Re-Assessment</a>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="">
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
				<tr>
               <th></th>
					<th >No.</th>
					<th>File No</th>
					<th>Name</th>
					<th>Report Date </th>
					<th>Reported</th>
					<th>Location</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 0;
					if($_GET['a']==1){
						$qry = mysql_query("
							SELECT `hr`.`hr_id`,`hr`.`file_no`, `person`.`name`,`hr`.`report_date`, `hr`.`location` ,`hr`.`reported` 
							FROM `hr`
							INNER JOIN `person` ON `hr`.`file_no` = `person`.`file_no` WHERE `hr`.`status`='1' AND `hr`.`id_data`='0'") or die(mysql_error());
					}
					elseif($_GET['a']==2){
						 $qry = mysql_query("
							SELECT `hr`.`hr_id`,`hr`.`file_no`, `person`.`name`,`hr`.`report_date`, `hr`.`location` ,`hr`.`reported` 
							FROM `hr`
							INNER JOIN `person` ON `hr`.`file_no` = `person`.`file_no` WHERE `hr`.`status`='1' AND `hr`.`id_data`='1'") or die(mysql_error());
					}
					else{
						header("location:?page=hr-data&a=1");
					}
					while($data=mysql_fetch_array($qry)){
						$no++;
						echo'
						<tr>
							<td width="10px">
								<div class="dropdown">
								  <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								   <li role="presentation">
										<a role="menuitem" tabindex="-1" href="form/view/view.php?op=hr&file_no='.$data['file_no'].'&id='.$data['hr_id'].'"  title="View '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-eye"></i> View this</a></li>';
									if($_GET['a']==1){
										echo '<li role="presentation">
										<a role="menuitem" tabindex="-1" href="form/view/view.php?op=hr&file_no='.$data['file_no'].'&a=all"  title="View '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-eye"></i> View all</a></li>';
										
									}
								  echo' <li role="presentation">
										<a role="menuitem" tabindex="-1" href="?page=hr-form&op=edit&file_no='.$data['file_no'].'&hr_id='.$data['hr_id'].'"><i class="fa fa-edit"></i> Edit</a></li>
								   <li role="presentation">
										<a role="menuitem" tabindex="-1" class="delete text-danger" href="" id="'.$data['hr_id'].'" data="'.$data['file_no'].'"><i class="fa fa-trash"></i> Delete</a>
									</li>
								  </ul>
								</div>
							</td>
							<td width="50px" align="right">'.$no.'.</td>
							<td>'.$data['file_no'].'</td>
							<td>'.$data['name'].'</td>
							<td>'.$data['report_date'].'</td>
							<td>'.Balikin($data['reported']).'</td>
							<td>'.Balikin($data['location']).'</td>						
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
