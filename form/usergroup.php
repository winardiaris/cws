<?php 
$file_id = 99;
include("form/navigasi.php");
?>
<script>
$(document).ready(function(){
	$("#save_group").click(function(){
		var group_name = $("#group_name").val(),
			R1 = $("#R1:checked").length, W1 = $("#W1:checked").length,R2 = $("#R2:checked").length, W2 = $("#W2:checked").length,R3 = $("#R3:checked").length, W3 = $("#W3:checked").length,R4 = $("#R4:checked").length, W4 = $("#W4:checked").length,R5 = $("#R5:checked").length, W5 = $("#W5:checked").length,R6 = $("#R6:checked").length, W6 = $("#W6:checked").length,R7 = $("#R7:checked").length, W7 = $("#W7:checked").length,R8 = $("#R8:checked").length, W8 = $("#W8:checked").length,R9 = $("#R9:checked").length, W9 = $("#W9:checked").length,R10 = $("#R10:checked").length, W10 = $("#W10:checked").length,R11 = $("#R11:checked").length, W11 = $("#W11:checked").length,R99 = $("#R99:checked").length, W99 = $("#9W9:checked").length,
		datanya = "&group_name="+group_name+"&value="+R1+";"+W1+";"+R2+";"+W2+";"+R3+";"+W3+";"+R4+";"+W4+";"+R5+";"+W5+";"+R6+";"+W6+";"+R7+";"+W7+";"+R8+";"+W8+";"+R9+";"+W9+";"+R10+";"+W10+";"+R11+";"+W11+";"+R99+";"+W99;

		$.ajax({url:"form/user-action.php",data:"op=saveusergroup"+datanya,cache:false,success: function(msg){
			if(msg=="success"){
				alert("Data has been saved !!");
				window.location="?page=user-group";
			}else{alert("Data not saved !!");}}
		});
	});
	$("#update_group").click(function(){
		var group_id = $("#group_id").val(),
			group_name = $("#group_name").val(),
			R1 = $("#R1:checked").length, W1 = $("#W1:checked").length,R2 = $("#R2:checked").length, W2 = $("#W2:checked").length,R3 = $("#R3:checked").length, W3 = $("#W3:checked").length,R4 = $("#R4:checked").length, W4 = $("#W4:checked").length,R5 = $("#R5:checked").length, W5 = $("#W5:checked").length,R6 = $("#R6:checked").length, W6 = $("#W6:checked").length,R7 = $("#R7:checked").length, W7 = $("#W7:checked").length,R8 = $("#R8:checked").length, W8 = $("#W8:checked").length,R9 = $("#R9:checked").length, W9 = $("#W9:checked").length,R10 = $("#R10:checked").length, W10 = $("#W10:checked").length,R11 = $("#R11:checked").length, W11 = $("#W11:checked").length,R99 = $("#R99:checked").length, W99 = $("#9W9:checked").length,
		datanya = "&group_id="+group_id+"&group_name="+group_name+"&value="+R1+";"+W1+";"+R2+";"+W2+";"+R3+";"+W3+";"+R4+";"+W4+";"+R5+";"+W5+";"+R6+";"+W6+";"+R7+";"+W7+";"+R8+";"+W8+";"+R9+";"+W9+";"+R10+";"+W10+";"+R11+";"+W11+";"+R99+";"+W99;

		$.ajax({url:"form/user-action.php",data:"op=updateusergroup"+datanya,cache:false,success: function(msg){
			if(msg=="success"){
				alert("Data has been saved !!");
				window.location="?page=user-group";
			}else{alert("Data not saved !!");}}
		});
	});
	
});
</script>

<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
	<div class="col-lg-12"><h3 class="page-header">User Group</h3></div>
	
<?php
if(isset($_GET['op'])){
	if($_GET['op']=="edit"){
	
		$qry = mysql_query("SELECT * FROM `usergroup` WHERE `group_id`='".$_GET['group_id']."'") or die(mysql_error());
		$data=mysql_fetch_array($qry);
		$access=explode(";",$data['group_access']);
		
		$edit = 1;
		$button = '<button class="btn btn-primary" id="update_group"><i class="fa fa-refresh"></i> Update</button><br>';
	}else{
		$edit = 0;
		$button = '<button class="btn btn-success" id="save_group"><i class="fa fa-save"></i> Save</button><br>';
	}
	
	
	
?>	
	<div id="form-group" class="col-lg-8">
		<label>Group Name</label>
		<input type="hidden" id="group_id" value="<?php if($edit==1){echo $_GET['group_id'];} ?>">
		<input class="form-control" id="group_name" value="<?php if($edit==1){echo $data['group_name'];} ?>">
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No.</th>
					<th>Access File</th>
					<th>R</th>
					<th>W</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td width="10px" align="right">1.</td>
					<td>Dashboard</td>
					<td width="10px"><input type="checkbox"  id="R1" checked></td>
					<td width="10px"><input type="checkbox"  id="W1" checked></td>
				</tr>
				<tr>
					<td width="10px" align="right">2.</td>
					<td>Personal Form</td>
					<td width="10px"><input type="checkbox"  id="R2" <?php if($edit==1){if($access[2]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W2" <?php if($edit==1){if($access[3]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">3.</td>
					<td>Personal Data</td>
					<td width="10px"><input type="checkbox"  id="R3" <?php if($edit==1){if($access[4]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W3" <?php if($edit==1){if($access[5]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">4.</td>
					<td>IA Form</td>
					<td width="10px"><input type="checkbox"  id="R4" <?php if($edit==1){if($access[6]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W4" <?php if($edit==1){if($access[7]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">5.</td>
					<td>IA Data</td>
					<td width="10px"><input type="checkbox"  id="R5" <?php if($edit==1){if($access[8]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W5" <?php if($edit==1){if($access[9]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">6.</td>
					<td>SE Form</td>
					<td width="10px"><input type="checkbox"  id="R6" <?php if($edit==1){if($access[10]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W6" <?php if($edit==1){if($access[11]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">7.</td>
					<td>SE Data</td>
					<td width="10px"><input type="checkbox"  id="R7" <?php if($edit==1){if($access[12]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W7" <?php if($edit==1){if($access[13]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">8.</td>
					<td>BIA Form</td>
					<td width="10px"><input type="checkbox"  id="R8" <?php if($edit==1){if($access[14]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W8" <?php if($edit==1){if($access[15]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">9.</td>
					<td>BIA Data</td>
					<td width="10px"><input type="checkbox"  id="R9" <?php if($edit==1){if($access[16]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W9" <?php if($edit==1){if($access[17]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">10.</td>
					<td>HR Form</td>
					<td width="10px"><input type="checkbox"  id="R10" <?php if($edit==1){if($access[18]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W10" <?php if($edit==1){if($access[19]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">11.</td>
					<td>HR Data</td>
					<td width="10px"><input type="checkbox"  id="R11" <?php if($edit==1){if($access[20]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W11" <?php if($edit==1){if($access[21]=="1"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">12.</td>
					<td>User</td>
					<td width="10px"><input type="checkbox"  id="R99" <?php if($edit==1){if($access[22]=="1"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W99" <?php if($edit==1){if($access[23]=="1"){echo "checked";}}?>></td>
				</tr>
				</tbody>
			</table>
		</div>
		<?php echo $button;?>
	<br>
	<br>
	</div>
	
<?php
	
}
else{
?>
	<div class="col-lg-12">
		<a href="?page=user-group&op=add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User Group</a><br><br>
		<div class="table-responsive" id="data-group">
			<table class="table table-striped table-bordered table-hover" id="dataTables">
				<thead>
				<tr>
					<th>No.</th>
					<th>Group ID</th>
					<th>Group Name</th>
					<th>Group Access</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$qry = mysql_query("SELECT * FROM `usergroup`") or die(mysql_error());
				$no = 0;
				while($data=mysql_fetch_array($qry)){
					$no++;
				echo'
				<tr>
					<td align="right" width="50px">'.$no.'.</td>
					<td width="150px">'.$data['group_id'].'</td>
					<td>'.$data['group_name'].'</td>
					<td>'.$data['group_access'].'</td>
					<td width="100px" align="center">
						<a href="?page=user-group&op=edit&group_id='.$data['group_id'].'" class="btn btn-sm btn-primary btn-sm"  title="Edit '.$data['group_name'].'"><i class="fa fa-edit"></i></a>
						<button class="btn btn-sm btn-danger btn-sm" id="'.$data['group_id'].'" title="Delete '.$data['group_name'].'"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				';
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
<?php
}
?>
	

</div>
</div>
