<?php 
$R="R3";$W="W3";
	include("form/navigasi.php") ;
	include("form/function.php") ;

	if(isset($_GET['active'])){
		$active = $_GET['active'];
		if($active == "1"){$header = "(Active)";}
		elseif($active == "2"){$header = "(Terminated)";}
		elseif($active == "3"){$header = "(Deleted)";}
		elseif($active == "4"){$header = "(Inactive)";}
		
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
				<a href="?page=person-data&active=4"  class="btn btn-sm btn-primary <?php if($_GET['active']==4){ echo "active";}?>"> Inactive</a>
			
		</div>
	</div>
	
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="dataTables">
			<thead>
				<tr>
				<th>No.</th>
				<th>File No.</th>
				<th>Name</th>
				<th>CoO</th>
				<th>Sex</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Data</th>
				<th></th>
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
						$file_no = $data['file_no'];


						echo'
							<tr >
								<td width="10px" align="right">'.$no.'.</td>
								<td><a href="form/view/?file_no='.$file_no.'"  title="Viwe '.$file_no.'" target="framepopup"  onClick="setdisplay(divpopup,1)">'.$file_no.'</a></td>
								<td>'.$data['name'].'</td>
								<td>'.$data['country_name'].'</td>
								<td>'.$data['sex'].'</td>
								<td>'.getAddress($data['address']).'. </td>
								<td>'.$data['phone'].'</td>
								<td>'.getData($file_no).'</td>
								<td  width="30px" align="center">
									<a href="?page=person-form&op=edit&file_no='.$file_no.'" class="btn btn-primary btn-sm" title="Edit '.$file_no.'"><i class="fa fa-edit"></i></a>
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
