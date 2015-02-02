<?php 
$R="R3";$W="W3";
	include("form/navigasi.php") ;
	include("form/function.php") ;

	if(isset($_GET['active'])){
		$active = $_GET['active'];
		if($active == "1"){$header = "(Active)";}
		elseif($active == "2"){$header = "(Terminated)";}
		elseif($active == "3"){$header = "(Deleted)";}
		
	}
	else{
		header("location:?page=person-data&active=1");
	}
?>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12"><h3 class="page-header">Personal Data <?php echo $header;?></h3></div>
	<div class="col-lg-12">
		<div class="navbar">
			<div class="btn-group">
				<a href="?page=person-data&active=1"  class="btn btn-sm btn-primary <?php if($_GET['active']==1){ echo "active";}?> "> Active</a>
				<a href="?page=person-data&active=2"  class="btn btn-sm btn-primary <?php if($_GET['active']==2){ echo "active";}?>"> Terminated</a>
				<a href="?page=person-data&active=3"  class="btn btn-sm btn-primary <?php if($_GET['active']==3){ echo "active";}?>"> Deleted</a>
			
		</div>
	</div>
	
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables">
			<thead>
				<tr>
				<th width"10px">No.</th>
				<th width="100px">File No.</th>
				<th>Name</th>
				<th>CoO</th>
				<th>Sex</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no=0;
					$qry = mysql_query("
					SELECT `person`.`file_no`,`person`.`name`,`master_country`.`country_name` ,`person`.`sex`,`person`.`address`,`person`.`phone`,`person`.`active` FROM `person`
					INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id` 
					WHERE `person`.`active` = '$active' ORDER BY `file_no` ASC;
					
					") or die(mysql_error());
					while($data = mysql_fetch_array($qry)){
						$no++;
						if($data['active'] == "1"){
							$actives = "<p class='text-success'><i class='fa fa-check'></i>  Active</p>";
						}
						elseif($data['active'] == "2"){
							$actives = "<p class='text-warning'><i class='fa fa-warning'></i> Terminated</p>";
						}
						elseif($data['active'] == "3"){
							$actives = "<p class='text-danger'><i class='fa fa-close'></i> Deleted</p>";
						}
				
						echo'
							<tr >
								<td width="10px" align="right">'.$no.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['country_name'].'</td>
								<td>'.$data['sex'].'</td>
								<td>'.getAddress($data['address']).'. </td>
								<td>'.$data['phone'].'</td>
								<td>'.$actives.'</td>
								<td  width="90px" align="center">
									<a href="?page=person-form&op=edit&file_no='.$data['file_no'].'" class="btn btn-primary btn-sm" title="Edit '.$data['file_no'].'"><i class="fa fa-edit"></i></a>
									<a href="form/personal-form-print.php?file_no='.$data['file_no'].'" class="btn btn-default btn-sm" title="Print '.$data['file_no'].'" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-print"></i></a>
								</td>
							</tr>
						';
					}
				?>
			
			</tbody>
		</table>
		</div>
	
</div><!-- row -->
</div><!-- page-wrapper -->
