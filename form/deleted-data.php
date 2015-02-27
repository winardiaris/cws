<?php 
$R="R13";$W="W13";
include("form/navigasi.php");
?>
<script>
	$(document).ready(function(){
		$(".tperson .btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=delperson"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
		$(".tia .btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=delia"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
		$(".tse .btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=delse"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
		$(".tbia .btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=delbia"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been removed !!");
						location.reload();
					}else{alert("Cannot remove !!");}}
				});
			} 
		});
		$(".thr .btn-danger").click(function(){
			var file_no = $(this).attr("id"),datanya="&file_no="+file_no;	
			var r = confirm("Remove ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=delhr"+datanya,cache:false,success: function(msg){
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
		<div class="col-lg-12">
			<h3 class="page-header">Deleted Data</h3>
		</div>
		<div class="col-lg-12">
			<div class="navbar">
			<div class="btn-group">
				<a href="?page=deleted&a=person" class="btn btn-sm btn-primary <?php if($_GET['a']=="person"){echo "active";}?>">Person</a>
				<a href="?page=deleted&a=ia" class="btn btn-sm btn-primary <?php if($_GET['a']=="ia"){echo "active";}?>">IA</a>
				<a href="?page=deleted&a=se" class="btn btn-sm btn-primary <?php if($_GET['a']=="se"){echo "active";}?>">SE</a>
				<a href="?page=deleted&a=bia" class="btn btn-sm btn-primary <?php if($_GET['a']=="bia"){echo "active";}?>">BIA</a>
				<a href="?page=deleted&a=hr" class="btn btn-sm btn-primary <?php if($_GET['a']=="hr"){echo "active";}?>">HR</a>
			</div>
			</div>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<?php
				$no=1;
				if(empty($_GET['a'])){
					header("location:?page=deleted&a=person");
				}
				elseif(isset($_GET['a'])){
					$a = $_GET['a'];
					if($a=="person"){
						echo 
						'<thead>
							<tr><th width="80px">No.</th>
							<th>File No.</th>
							<th>Name</th>
							<th>Coo</th>
							<th width="10px"></th>
							</tr>
						</thead>
						<tbody class="tperson" >';
						$qry=mysql_query("
							SELECT `person`.`file_no`,`person`.`name`,`master_country`.`country_name` FROM `person`
							INNER JOIN `master_country` ON `person`.`coo` = `master_country`.`country_id` 
							WHERE `person`.`active` = '3' ORDER BY `file_no` ASC; ")or die(mysql_error());
						while($data=mysql_fetch_array($qry)){
							echo '
							<tr>				
								<td align="right">'.$no++.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['country_name'].'</td>
								<td><button class="btn btn-sm btn-danger" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i></button></td>
							</tr>';
						}
						echo'</tbody>';
					}
					elseif($a=="ia"){
						echo 
						'<thead>
							<tr><th width="80px">No.</th>
							<th>File No.</th>
							<th>Name</th>
							<th>Date Assessment</th>
							<th>Location Assessment</th>
							<th>Assessment by</th>
							<th width="10px"></th>
							</tr>
						</thead>
						<tbody class="tia" >';
						$qry=mysql_query("SELECT `ia`.`file_no`,`person`.`name`,`ia`.`assessment` FROM `ia`
								INNER JOIN `person` ON `ia`.`file_no`=`person`.`file_no` WHERE `ia`.`status`='0'; ")or die(mysql_error());
						while($data=mysql_fetch_array($qry)){
							$assessment = explode(";",$data['assessment']);
							echo '
							<tr>				
								<td align="right">'.$no++.'.</td>
								<td >'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td width="150px" align="center">'.$assessment[0].'</td>
								<td>'.$assessment[1].'</td>
								<td>'.$assessment[2].'</td>
								<td><button class="btn btn-sm btn-danger" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i></button></td>
							</tr>';
						}
						echo'</tbody>';	
					}
					elseif($a=="se"){
						echo'
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
							<th ></th>
						</tr>
						</thead>
						<tbody class="tse">
						';
						$no = 0;
						$qry = mysql_query("SELECT `se`.`file_no`,`person`.`name`,`se`.`doa`,`se`.`assessment_data`,`se`.`verification` 
											FROM `se` INNER JOIN `person` ON `se`.`file_no`=`person`.`file_no` WHERE `se`.`status`='0';") or die(mysql_error());
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
								<td align="center">
								<button class="btn btn-sm btn-danger" id="'.$data['file_no'].'"  title="Delete '.$data['file_no'].'"><i class="fa fa-trash"></i></button></td>
							</tr>';
						}
						echo'</tbody>';
					}
					elseif($a=="bia"){
						echo'
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
						<tbody class="tbia">
						';
						$no=0;
						$qry = mysql_query("SELECT `bia`.`file_no`,`bia`.`doa`,`bia`.`assessment`,`person`.`name` FROM `bia` INNER JOIN `person` ON `bia`.`file_no`=`person`.`file_no` WHERE `bia`.`status`='0' ") or die(mysql_error());
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
									<button class="btn btn-sm btn-danger btn-sm" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							';
						}
						echo'</tbody>';
					}
					elseif($a=="hr"){
						echo'
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
						<tbody class="thr">
						';
						$no = 0;
						$qry = mysql_query("SELECT `hr`.`file_no`, `person`.`name`,`hr`.`report_date`, `hr`.`basic` FROM `hr`
											INNER JOIN `person` ON `hr`.`file_no` = `person`.`file_no` WHERE `hr`.`status`='0'") or die(mysql_error());
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
									<button class="btn btn-danger btn-sm" id="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							';
						}
						echo'</tbody>';
					}
					
				}
				
				?>
				
				
			</table>
		</div>
		</div>
		
	</div>
</div><!-- page-wrapper -->
