<?php $LOCATION = "personal_form";?>
<div class="table-responsive">
<table class="table  table-bordered table-hover" location="<?php echo $LOCATION;?>">
<thead>
	<tr>
	<th width="10px">No</th>
	<th>Name</th>
	<th>Age</th>
	<th>Sex</th>
	<th>Current location</th>
	<th>Options</th>
	</tr>
</thead>
<tbody >
	<?php
	include ("../inc/conf.php");
	include ("function.php");
	$file_no=$_GET['file_no'];
	$option=mysql_query("SELECT * FROM `reported_family` WHERE `file_no`='$file_no' ");
	$no=0;
	
	while($data=mysql_fetch_array($option)){
    $no ++;	
    $id=$data['id'];
		echo 
		"<tr>
			<td align='right' width'10px'>".$no.".</td>
			<td>".$data['name']."</td>
			<td width='20px'>".$data['age']."</td>
			<td width='20px'>".$data['sex']."</td>
			<td >".getAddress($data['address'])."</td>
      <td align='left' width='70px'>
        <button type='button' value='".$id."' class='btn btn-xs btn-primary update' Title='update'><i class='fa fa-edit'></i></button>
        <button type='button' value='".$id."' class='btn btn-xs btn-danger delete' title='Delete ".$data['name']."' ><i class='fa fa-close'></i></button>
      </td>
		</tr>";
	}
	
	?>
</tbody>
</table></div>
<script>
$(document).ready(function(){
	$(".delete").click(function(){
		var fam_id=$(this).val(),file_no=$("#file_no").val(),location=$(".table").attr("location");
		var datanya="&id="+fam_id+"&file_no="+file_no+"&location="+location;
		$.ajax({url: "form/personal-action.php",data: "op=deletefamily"+datanya,cache: false,
			success: function(msg){
				if(msg=="success"){alert("berhasil menghapus");$("#family").load("form/personal-family-data.php?file_no="+file_no);}
				else{alert("gagal");}
			}
		});
  });

  $(".update").click(function(){
    var fam_id=$(this).val(),file_no=$("#file_no").val();
    var datanya="?op=getfamily&id="+fam_id+"&file_no="+file_no;
    $.getJSON("form/personal-action.php"+datanya,function(data){
      $.each(data,function(key,val){
        if(key=="sex"){
          $("input:radio[name=family_sex][value="+val+"]").attr('checked',"");
        }
        else if(key=="address"){
          var address=val.split(";");
          var address2=address[0].split(".");
          var prov=address2[0];
          var kota=address2[0]+"."+address2[1];
          var kel=address[0];
          var detail=address[1];
          
          console.log(val);
          console.log(prov);
          console.log(kota);
          console.log(kel);
          console.log(detail);
          $("#family_provinsi").load("form/general-action.php","op=getprov&kode="+prov);
          $("#family_kota").load("form/general-action.php","op=getkab&prov="+prov+"&kode="+kota);
          $("#family_kelurahan").load("form/general-action.php","op=getkec&kab="+kota+"&kode="+kel);

          $("#family_detail").val(detail);
        }
        else if(key=="arrival"){
          var arrival = val.split(",");
          $("#family_date_arrival").val(arrival[1]);
          $("#family_arrival").val(arrival[0]);
        }
        else{
         $("#family_"+key).val(val);
        }

        });
    });
    $("#family_name").focus();
  });
});

</script>
