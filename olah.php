<?php 
//move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']); 
$file_no="88";

	if(!empty($_FILES["userfile"]["tmp_name"])){
		$folder="test/";
		$file_type=$_FILES['userfile']['type'];
			if($file_type=="image/jpeg" || $file_type=="image/jpg" || $file_type=="image/gif"  || $file_type=="image/png"){
				if($_FILES["userfile"]["size"] < 512000){
					$name_file = $file_no;
					$photo = $folder.$name_file.".".end(explode(".",$_FILES["userfile"]["name"]));
					move_uploaded_file($_FILES["userfile"]["tmp_name"],$photo);
					
					echo '<script>parent.document.getElementById("upload").innerHTML="Done !!!"</script>';
				}
				else{echo "<script type='text/javascript'> alert('ukuran gambar terlalu besar');</script>";	return false;}
			}
			else{echo "<script type='text/javascript'> alert('jenis Gambar yang anda kirim salah. Harus .jpg .gif .png');</script>";return false;}
		}
		else{$photo="photo/default.png";}
		
		echo $photo; 



?>



