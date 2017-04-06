<?php
$R="R13";$W="W13";
include("form/navigasi.php");
setHistory($_SESSION['user_id'],"deleted_data","Open Deleted data ",$NOW);
?>
<script>
	$(document).ready(function(){
		//delete person
		$(".tperson .text-danger").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
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
		//restore person
		$(".tperson .text-success").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
			var r = confirm("Restore ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=resperson"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been restored !!");
						location.reload();
					}else{alert("Cannot restore !!");}}
				});
			}
		});
		//delete IA
		$(".tia .text-danger").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
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
		//restore IA
		$(".tia .text-success").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
			var r = confirm("Restore ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=resia"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been restored !!");
						location.reload();
					}else{alert("Cannot restore !!");}}
				});
			}
		});
		//delete SE
		$(".tse .text-danger").click(function(){
			var 	file_no = $(this).attr("data"),
					se_id = $(this).attr("id"),
					datanya="&file_no="+file_no+"&se_id="+se_id;
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
		//restore SE
		$(".tse .text-success").click(function(){
			var 	file_no = $(this).attr("data"),
					se_id = $(this).attr("id"),
					datanya="&file_no="+file_no+"&se_id="+se_id;
			var r = confirm("Restore ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=resse"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been Restore !!");
						location.reload();
					}else{alert("Cannot Restore !!");}}
				});
			}
		});
		//delete SE
		$(".tbia .text-danger").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
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
		//restore SE
		$(".tbia .text-success").click(function(){
			var file_no = $(this).attr("data"),datanya="&file_no="+file_no;
			var r = confirm("Restore ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=resbia"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been restored !!");
						location.reload();
					}else{alert("Cannot restore !!");}}
				});
			}
		});
		//delete HR
		$(".thr .text-danger").click(function(){
			var 	file_no = $(this).attr("data"),
					hr_id = $(this).attr("id"),
					datanya="&file_no="+file_no+"&hr_id="+hr_id;
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
		//restore HR
		$(".thr .text-success").click(function(){
			var 	file_no = $(this).attr("data"),
					hr_id = $(this).attr("id"),
					datanya="&file_no="+file_no+"&hr_id="+hr_id;
			var r = confirm("Restore ["+file_no+"]? ");
			if (r == true) {
				$.ajax({url:"form/deleted-action.php",data:"op=reshr"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been Restore !!");
						location.reload();
					}else{alert("Cannot Restore !!");}}
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
							<tr>
							<th width="10px"></th>
							<th width="80px">No.</th>
							<th>UNHCR Case Number.</th>
							<th>Name</th>
							<th>Coo</th>
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
								<td>
									<div class="dropdown">
										<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation">
												<a href="#" class="text-success" data="'.$data['file_no'].'"><i class="fa fa-refresh"></i> Restore</a>
											</li>
											<li role="presentation">
											   <a href="#" class="text-danger" data="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i> Delete</a>
											</li>
										</ul>
								</td>
								<td align="right">'.$no++.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['country_name'].'</td>
							</tr>';
						}
						echo'</tbody>';
					}
					elseif($a=="ia"){
						echo
						'<thead>
							<tr>
							<th width="10px"></th>
							<th width="80px">No.</th>
							<th>UNHCR Case Number.</th>
							<th>Name</th>
							<th>Date Assessment</th>
							<th>Location Assessment</th>
							<th>Assessment by</th>
							</tr>
						</thead>
						<tbody class="tia" >';
						$qry=mysql_query("SELECT `ia`.`file_no`,`person`.`name`,`ia`.`assessment` FROM `ia`
								INNER JOIN `person` ON `ia`.`file_no`=`person`.`file_no` WHERE `ia`.`status`='0'; ")or die(mysql_error());
						while($data=mysql_fetch_array($qry)){
							$assessment = explode(";",$data['assessment']);
							echo '
							<tr>
								<td>
									<div class="dropdown">
										<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation">
												<a href="#" class="text-success" data="'.$data['file_no'].'"><i class="fa fa-refresh"></i> Restore</a>
											</li>
											<li role="presentation">
											   <a href="#" class="text-danger" data="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i> Delete</a>
											</li>
										</ul>
								</td>
								<td align="right">'.$no++.'.</td>
								<td >'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td width="150px" align="center">'.$assessment[0].'</td>
								<td>'.$assessment[1].'</td>
								<td>'.$assessment[2].'</td>
							</tr>';
						}
						echo'</tbody>';
					}
					elseif($a=="se"){
						echo'
						<thead>
						<tr>
							<th width="10px"> </th>
							<th>No.</th>
							<th>UNHCR Case Number.</th>
							<th>Name </th>
							<th>Date of Assessment</th>
							<th>Interviewer</th>
							<th>Location</th>
							<th>Verified by</th>
							<th>Verified Date</th>
						</tr>
						</thead>
						<tbody class="tse">
						';
						$no = 0;
						$qry = mysql_query("SELECT
											`se`.`se_id`, `se`.`file_no`, `person`.`name`, `se`.`doa`, `se`.`assessment_data`, `se`.`verification`
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
								<td>
									<div class="dropdown">
										<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation">
												<a href="#" class="text-success" data="'.$data['file_no'].'" id="'.$data['se_id'].'"><i class="fa fa-refresh"></i> Restore</a>
											</li>
											<li role="presentation">
											   <a href="#" class="text-danger" data="'.$data['file_no'].'" id="'.$data['se_id'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i> Delete</a>
											</li>
										</ul>
								</td>
								<td align="right">'.$no.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['doa'].'</td>
								<td>'.$interviewer.'</td>
								<td>'.$location.'</td>
								<td>'.$verified_by.'</td>
								<td>'.$verified_date.'</td>
							</tr>';
						}
						echo'</tbody>';
					}
					elseif($a=="bia"){
						echo'
						<thead>
						<tr>
							<th width="10px"></th>
							<th>No</th>
							<th>UNHCR Case Number</th>
							<th>Name</th>
							<th>Date Assessment</th>
							<th>Location</th>
							<th>Case Worker</th>
							<th>Organization</th>
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
								<td>
									<div class="dropdown">
										<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation">
												<a href="#" class="text-success" data="'.$data['file_no'].'"><i class="fa fa-refresh"></i> Restore</a>
											</li>
											<li role="presentation">
											   <a href="#" class="text-danger" data="'.$data['file_no'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i> Delete</a>
											</li>
										</ul>
								</td>
								<td align="right">'.$no.'.</td>
								<td>'.$data['file_no'].'</td>
								<td>'.$data['name'].'</td>
								<td>'.$data['doa'].'</td>
								<td>'.$assessment[0].'</td>
								<td>'.$assessment[1].'</td>
								<td>'.$assessment[2].'</td>
							</tr>
							';
						}
						echo'</tbody>';
					}
					elseif($a=="hr"){
						echo'
						<thead>
						<tr>
							<th width="10px"></th>
							<th >No.</th>
							<th>UNHCR Case Number</th>
							<th>Name</th>
							<th>Report Date</th>
							<th>Reported</th>
							<th>Location</th>
						</tr>
						</thead>
						<tbody class="thr">
						';
						$no = 0;
						$qry = mysql_query("SELECT `hr`.`hr_id`, `hr`.`file_no`, `person`.`name`,`hr`.`report_date`,
											`hr`.`location`,`hr`.`reported` FROM `hr`
											INNER JOIN `person` ON `hr`.`file_no` = `person`.`file_no` WHERE `hr`.`status`='0'") or die(mysql_error());
						while($data=mysql_fetch_array($qry)){
							$no++;
							$basic=explode(";",$data['basic']);
							echo'
							<tr>
								<td>
									<div class="dropdown">
										<button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
											<li role="presentation">
												<a href="#" class="text-success" data="'.$data['file_no'].'" id="'.$data['hr_id'].'"><i class="fa fa-refresh"></i> Restore</a>
											</li>
											<li role="presentation">
											   <a href="#" class="text-danger" data="'.$data['file_no'].'" id="'.$data['hr_id'].'" title="Delete '.$data['name'].'"><i class="fa fa-trash"></i> Delete</a>
											</li>
										</ul>
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
						echo'</tbody>';
					}
				}
				?>
			</table>
		</div>
		</div>
	</div>
</div><!-- page-wrapper -->
