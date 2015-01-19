<?php 
//move_uploaded_file($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']); 

if(isset($_POST['upload'])){
	$file_no=$_POST['file_no'];
	if(isset($file_no)){
		if(isset($_FILES['userfile']['tmp_name'])){
			$folder="photo/";
			$file_type=$_FILES['userfile']['type'];
				if($file_type=="image/jpeg" || $file_type=="image/jpg" || $file_type=="image/gif"  || $file_type=="image/png"){
					if($_FILES['userfile']['size'] < 1024000){
						$name_file = $file_no;
						$photo = $folder.$name_file.".".end(explode(".",$_FILES['userfile']['name']));
						move_uploaded_file($_FILES['userfile']['tmp_name'],$photo);
						
						echo '<script>parent.document.getElementById("upload").innerHTML="<input class=\"form-control\" id=\"photo\" value=\"'.$photo.'\" disabled><br><small class=\"text-success\">Upload success !!</small> "</script>';
						
					}
					else{echo "<script type='text/javascript'> alert('File size too big. ');</script>";	return false;}
				}
				else{echo "<script type='text/javascript'> alert('Wrong Filetype [.jpg .gif .png]');</script>";return false;}
			}
			else{
				$photo="photo/default.png";
				echo '<script>parent.document.getElementById("upload").innerHTML="<input class=\"form-control\" id=\"photo\" value=\"'.$photo.'\" disabled><br><small class=\"text-success\">Upload failed !!. Photo setup to default</small> "</script>';
			}
	}
}	
		



?>



