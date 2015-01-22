<?php 
$file_id = 12;
include("form/navigasi.php");
?>
<script>
$(document).ready(function(){
	$("#save_group").click(function(){
		var group_name = $("#group_name").val();
			for(i=1;i<=12;i++){
				r= $("#R"+i+":checked").length;
				w= $("#W"+i+":checked").length;
				if(r==0 && w==0){x=0;z=0;}
				else if(r==0 && w==1){x=0;z= $("#W"+i+":checked").val();}
				else if(r==1 && w==0){x= $("#R"+i+":checked").val();z=0;}
				else if(r==1 && w==1 ){x= $("#R"+i+":checked").val();z= $("#W"+i+":checked").val();}
			
				var aa = aa+";"+x+";"+z;
			}
		var aa;var pnjg = aa.length;var potong = aa.split(";");var ambil = potong[0].length+1;var value = aa.substr(ambil,pnjg);
		var datanya = "&group_name="+group_name+"&value="+value;

		
		$.ajax({url:"form/user-action.php",data:"op=saveusergroup"+datanya,cache:false,success: function(msg){
			if(msg=="success"){
				alert("Data has been saved !!");
				window.location="?page=user-group";
			}else{alert("Data not saved !!");}}
		});
	});
	$("#update_group").click(function(){
		var group_id = $("#group_id").val(),
			group_name = $("#group_name").val();
			
			for(i=1;i<=12;i++){
				r= $("#R"+i+":checked").length;
				w= $("#W"+i+":checked").length;
				if(r==0 && w==0){x=0;z=0;}
				else if(r==0 && w==1){x=0;z= $("#W"+i+":checked").val();}
				else if(r==1 && w==0){x= $("#R"+i+":checked").val();z=0;}
				else if(r==1 && w==1 ){x= $("#R"+i+":checked").val();z= $("#W"+i+":checked").val();}
			
				var aa = aa+";"+x+";"+z;
			}
		var aa;var pnjg = aa.length;var potong = aa.split(";");var ambil = potong[0].length+1;var value = aa.substr(ambil,pnjg);
		var datanya = "&group_id="+group_id+"&group_name="+group_name+"&value="+value;

		
		$.ajax({url:"form/user-action.php",data:"op=updateusergroup"+datanya,cache:false,success: function(msg){
			if(msg=="success"){
				alert("Data has been saved !!");
				window.location="?page=user-group";
			}else{alert("Data not saved !!");}}
		});
	});
	
	//check uncheck all
	$("#R0").click(function() {
		var c = this.checked;
		for(i=0;i<=13;i++){
			$("#R"+i+":checkbox").prop("checked",c);
		}
	});
	$("#W0").click(function() {
		var c = this.checked;
		for(i=1;i<=12;i++){
			$("#W"+i+":checkbox").prop("checked",c);			
		}		
	});
	
	//test
	$("#asd").click(function(){
		
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
					<th>R <input type="checkbox"  id="R0" ></th>
					<th>W <input type="checkbox"  id="W0" ></th>
				</tr>
				</thead>
				<tbody id="tbody">
				<tr>
					<td width="10px" align="right">1.</td>
					<td>Dashboard</td>
					<td width="10px"><input type="checkbox"  id="R1" value="R1" checked></td>
					<td width="10px"><input type="checkbox"  id="W1" value="W1"checked></td>
				</tr>
				<tr>
					<td width="10px" align="right">2.</td>
					<td>Personal Form</td>
					<td width="10px"><input type="checkbox"  id="R2" value="R2" <?php if($edit==1){if($access[2]=="R2"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W2" value="W2" <?php if($edit==1){if($access[3]=="W2"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">3.</td>
					<td>Personal Data</td>
					<td width="10px"><input type="checkbox"  id="R3" value="R3" <?php if($edit==1){if($access[4]=="R3"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W3" value="W3" <?php if($edit==1){if($access[5]=="W3"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">4.</td>
					<td>IA Form</td>
					<td width="10px"><input type="checkbox"  id="R4" value="R4" <?php if($edit==1){if($access[6]=="R4"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W4" value="W4" <?php if($edit==1){if($access[7]=="W4"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">5.</td>
					<td>IA Data</td>
					<td width="10px"><input type="checkbox"  id="R5" value="R5" <?php if($edit==1){if($access[8]=="R5"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W5" value="W5" <?php if($edit==1){if($access[9]=="W5"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">6.</td>
					<td>SE Form</td>
					<td width="10px"><input type="checkbox"  id="R6" value="R6" <?php if($edit==1){if($access[10]=="R6"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W6" value="W6" <?php if($edit==1){if($access[11]=="W6"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">7.</td>
					<td>SE Data</td>
					<td width="10px"><input type="checkbox"  id="R7" value="R7" <?php if($edit==1){if($access[12]=="R7"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W7" value="W7" <?php if($edit==1){if($access[13]=="W7"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">8.</td>
					<td>BIA Form</td>
					<td width="10px"><input type="checkbox"  id="R8" value="R8" <?php if($edit==1){if($access[14]=="R8"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W8" value="W8" <?php if($edit==1){if($access[15]=="W8"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">9.</td>
					<td>BIA Data</td>
					<td width="10px"><input type="checkbox"  id="R9" value="R9" <?php if($edit==1){if($access[16]=="R9"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W9" value="W9" <?php if($edit==1){if($access[17]=="W9"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">10.</td>
					<td>HR Form</td>
					<td width="10px"><input type="checkbox"  id="R10" value="R10" <?php if($edit==1){if($access[18]=="R10"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W10" value="W10" <?php if($edit==1){if($access[19]=="W10"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">11.</td>
					<td>HR Data</td>
					<td width="10px"><input type="checkbox"  id="R11" value="R11" <?php if($edit==1){if($access[20]=="R11"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W11" value="W11" <?php if($edit==1){if($access[21]=="W11"){echo "checked";}}?>></td>
				</tr>
				<tr>
					<td width="10px" align="right">12.</td>
					<td>User</td>
					<td width="10px"><input type="checkbox"  id="R12" value="R12" <?php if($edit==1){if($access[22]=="R12"){echo "checked";}}?>></td>
					<td width="10px"><input type="checkbox"  id="W12" value="W12" <?php if($edit==1){if($access[23]=="W12"){echo "checked";}}?>></td>
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
