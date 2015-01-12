<?php
include ("../inc/conf.php");


$op = $_GET['op'];
if($op == "saveperson"){
	$file_no = $_GET['file_no'];$name = $_GET['name'];$coo = $_GET['coo'];$dob=$_GET['dob'];$sex = $_GET['sex'];
	$marital = $_GET['marital'];$address = $_GET['address'];$phone = $_GET['phone']; $status = $_GET['status'];
	$arrival = $_GET['arrival'];$date_arrival = $_GET['date_arrival'];$arrival2 = $arrival.",".$date_arrival;
	$education = $_GET['education'];$skill=$_GET['skill'];$mot=$_GET['mot'];$known_language = $_GET['known_language'];
	$previous_occupation = $_GET['previous_occupation'];$volunteer=$_GET['volunteer'];
	$date_recognition=$_GET['date_recognition'];$status_active=$_GET['status_active'];
	
	$photo=$_GET['photo'];
	
	$save = mysql_query("INSERT INTO `person` VALUES('$file_no','$name','$coo','$dob','$sex','$marital','$address','$phone','$photo','$status','$arrival2','$education','$skill','$mot','$known_language','$previous_occupation','$volunteer','$date_recognition','$status_active','$NOW','');") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "savepersonphoto"){
	if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'photo/' . $_FILES['file']['name']);
        //$file_no = $_POST['file_no'];
        
        //if(!empty($_FILES["file"]["tmp_name"])){
		//$folder="photo/";
		//$file_type=$_FILES['photo']['type'];
			//if($file_type=="image/jpeg" || $file_type=="image/jpg" || $file_type=="image/gif"  || $file_type=="image/png"){
				//if($_FILES["photo"]["size"] < 512000){
					//$name_file = md5($file_no);
					//$photo = $folder.$name_file.".".end(explode(".",$_FILES["photo"]["name"]));
					//move_uploaded_file($_FILES["photo"]["tmp_name"],$photo);
				//}
				//else{echo "<script type='text/javascript'> alert('ukuran gambar terlalu besar');history.back();</script>";	return false;}
			//}
			//else{echo "<script type='text/javascript'> alert('jenis Gambar yang anda kirim salah. Harus .jpg .gif .png');history.back();</script>";return false;}
		//}
		//else{$photo="photo/default.png";}
		
		//$qry = mysql_query("UPDATE `person` SET `photo`='$photo' WHERE `file_no`='$file_no' ") or die(mysql_error());
        
    }
}
elseif($op == "updateperson"){
	$file_no = $_GET['file_no'];$name = $_GET['name'];$coo = $_GET['coo'];$dob=$_GET['dob'];$sex = $_GET['sex'];
	$marital = $_GET['marital'];$address = $_GET['address'];$phone = $_GET['phone']; $status = $_GET['status'];
	$arrival = $_GET['arrival'];$date_arrival = $_GET['date_arrival'];$arrival2 = $arrival.",".$date_arrival;
	$education = $_GET['education'];$skill=$_GET['skill'];$mot=$_GET['mot'];$known_language = $_GET['known_language'];
	$previous_occupation = $_GET['previous_occupation'];$volunteer=$_GET['volunteer'];
	$date_recognition=$_GET['date_recognition'];$status_active=$_GET['status_active'];
	
	$photo=$_GET['photo'];
	
	$update = mysql_query("UPDATE  `person` SET 
	`name`='$name',
	`coo`='$coo',
	`dob`='$dob',
	`sex`='$sex',
	`marital`='$marital',
	`address`='$address',
	`phone`='$phone',
	`status`='$status',
	`arrival`='$arrival2',
	`education`='$education',
	`skill`='$skill',
	`mot`='$mot',
	`known_language`='$known_language',
	`previous_occupation`='$previous_occupation',
	`volunteer`='$volunteer',
	`date_recognition`='$date_recognition',
	`active`='$status_active',
	`last_change`='$NOW'
	WHERE `file_no`='$file_no';") or die(mysql_error());
	
	if($update){echo "success";}
	else{echo "error";}
	
}
elseif($op == "addfamily"){
	$file_no = $_GET['file_no'];
	$value = htmlspecialchars($_GET['value']);
	$save = mysql_query("INSERT INTO `reported_family` VALUES('','$file_no','$value','$NOW') ;") or die(mysql_error());
	
	if($save){echo "success";}
	else{echo "error";}
}
elseif($op == "deletefamily"){
	$id = $_GET['id'];
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `reported_family` WHERE id='".$id."' AND file_no='".$file_no."' ;")or die(mysql_error());
	if($del){echo "success";}
	else{echo "error";}
}

?>
