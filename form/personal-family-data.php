<?php $file_id = 2;?>;
<div class="table-responsive">
<table class="table  table-bordered table-hover">
<thead>
	<tr>
	<th width="10px">No</th>
	<th>Name</th>
	<th>Age</th>
	<th>Sex</th>
	<th>Relation</th>
	<th>Current location</th>
	<th>Remarks</th>
	<th>Last Contact</th>
	<th>Del</th>
	</tr>
</thead>
<tbody >
	<?php
	include ("../inc/conf.php");
	$file_no=$_GET['file_no'];
	$option=mysql_query("SELECT * FROM `reported_family` WHERE `file_no`='$file_no' ");
	$no=0;
	
	while($data=mysql_fetch_array($option)){
		$no ++;	$id=$data['id'];$value=$data['value'];$split=explode(";",$value);
		$name=$split[0];$age=$split[1];	$sex=$split[2]; $relation=$split[3]; $location=$split[4];$remarks =	$split[5];$contact=$split[6];
		echo 
		"<tr>
			<td align='right' width'10px'>".$no.".</td>
			<td>".$name."</td>
			<td width='20px'>".$age."</td>
			<td width='20px'>".$sex."</td>
			<td >".$relation."</td>
			<td >".$location."</td>
			<td >".$remarks."</td>
			<td >".$contact."</td>
			<td align='center' width='10px'><button type='button' value='".$id."' class='btn btn-xs btn-danger delete' title='Delete ".$name."' ><i class='fa fa-close'></i></button></td>
		</tr>";
	}
	
	?>

</tbody>
</table></div>
<script>
$(document).ready(function(){
	$(".delete").click(function(){
		var fam_id=$(this).val(),file_no=$("#file_no").val();
		var datanya="&id="+fam_id+"&file_no="+file_no;
		$.ajax({url: "form/personal-action.php",data: "op=deletefamily"+datanya,cache: false,
			success: function(msg){
				if(msg=="success"){alert("berhasil menghapus");$("#family").load("form/personal-family-data.php?file_no="+file_no);}
				else{alert("gagal");}
			}
		});
	});
});

</script>
