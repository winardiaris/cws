<div class="table-responsive">
	<form role="form" name="form-data-with-who-living">
		<table class="table table-bordered  table-hover">
			<thead>
				<tr>
					<th width="10px">No.</th>
					<th>Name</th>
					<th>Case Number</th>
					<th>Country</th>
					<th>Date of Birth , Age</th>
					<th>Sex</th>
					<th>Phone Number</th>
					<th>Relationship</th>
					<th>When did you meet this person?</th>
					<th width="10px">Del</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include ("../inc/conf.php");
					$file_no=$_GET['file_no'];
					$no=0;

					$qry = mysql_query("SELECT * FROM `with_whom_living` WHERE `file_no`='$file_no'") or die(mysql_error());
					while($data=mysql_fetch_array($qry)){
						$no++;
						$id=$data['id'];$value=$data['value'];$split=explode(";",$value);
						echo'
						<tr>
							<td>'.$no.'</td>
							<td>'.$split[0].'</td>
							<td>'.$split[1].'</td>
							<td>'.$split[2].'</td>
							<td>'.$split[3].'</td>
							<td>'.$split[4].'</td>
							<td>'.$split[5].'</td>
							<td>'.$split[6].'</td>
							<td>'.$split[7].'</td>
							<td><button type="button" value="'.$id.'" class="btn btn-xs btn-danger delete" title="Delete '.$split[0].'" ><i class="fa fa-close"></i></button></td>
						</tr>';
					}
				?>
			</tbody>
		</table>
	</form>
</div>
<script>
$(document).ready(function(){
	$(".delete").click(function(){
		var _id=$(this).val(),file_no=$("#file_no").val();
		var datanya="&id="+_id+"&file_no="+file_no;
		$.ajax({
			url: "form/ia-action.php",data: "op=deletewhomliving"+datanya,cache: false,
			success: function(msg){
				if(msg=="success"){alert("berhasil menghapus");$("#whom_living").load("form/ia-whom-living.php?file_no="+file_no);	}
				else{alert("gagal");}
			}
		});
	});
});
</script>
