<?php
include("form/navigasi.php") ;

?>
<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12"><h3 class="page-header">Data BIA</h3></div>
	<div class="col-lg-12"><div class="table-responsive">
	<table class="table table-striped table-bordered table-hover" id="dataTables">
		<thead>
		<tr>
			<th>No</th>
			<th>nama</th>
		</tr>
		</thead>
		<tbody>
			<?php
			for($i=1;$i<=100;$i++){
				echo'
				<tr>
					<td>'.$i.'</td>
					<td>nama '.$i.'</td>
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
<script>$(document).ready(function() {$('#dataTables').dataTable();});</script>
