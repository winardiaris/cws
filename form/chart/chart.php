<?php 
$LOCATION="Chart";
setHistory($_SESSION['user_id'],$LOCATION,"Open Chart",$NOW);
include("form/navigasi.php") ;
?>
<script>
	$(document).ready(function(){
		$("#placeholder").load("form/chart/0.php");
		$("#chartselect").change(function(){
			var a = $(this).val(),
				place=$("#placeholder");
		
				place.load("form/chart/"+a+".php");
		});
		
	});
</script>
<div id="page-wrapper">
<div class="row" >
	<div class="col-lg-12"><h3 class="page-header">Chart </h3></div>
	<div class="col-lg-3">
		<label>Filter</label>
		<select id="chartselect" class="form-control">
			<option value="0">All</option>
			<option value="1">Gender</option>
			<option value="2">Marital Status</option>
			<option value="3">Personal Age</option>
			<option value="13">Status</option>
			<option value="coo">Country of Origin</option>
			<option value="edu">Education</option>
			<option value="4">Mapping Province</option>
			<option value="5">Mapping DKI Jakarta</option>
			<option value="6">Mapping Jakarta Pusat</option>
			<option value="7">Mapping Jakarta Utara</option>
			<option value="8">Mapping Jakarta Batar</option>
			<option value="9">Mapping Jakarta Timur</option>
			<option value="10">Mapping Jakarta Selatan</option>
			<option value="11">Mapping Jawa Barat</option>
			<option value="12">Mapping Banten</option>
		</select>
		<small>Last Update<span class="text-primary">
			<?php 
				$qry = mysql_query("SELECT MAX(`last_change`) AS `last_change`, MAX(`created`) AS `created` FROM `person` ")or die(mysql_error());
				$data = mysql_fetch_array($qry);
				if( $data['last_change'] > $data['created'] ){echo $data['last_change'];}
				else{echo $data['created'];}
			?>
			</span>
		</small>
		<br><br><br>
	</div>
	<div class="col-lg-12">
	<div id="placeholder"></div>
</div>
</div>

</div>

