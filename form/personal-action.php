<?php
$LOCATION = "person_form";
include ("../inc/conf.php");
include ("function.php");


$op = $_GET['op'];
if($op == "saveperson"){
	$file_no = $_GET['file_no'];$name = $_GET['name'];$coo = $_GET['coo'];$cob=$_GET['cob'];$dob=$_GET['dob'];$age=$_GET['age'];$sex = $_GET['sex'];
	$marital = $_GET['marital'];$address = $_GET['address'];$phone = $_GET['phone']; $status = $_GET['status'];
	$arrival = $_GET['arrival'];$date_arrival = $_GET['date_arrival'];$arrival2 = $arrival.",".$date_arrival;
	$education = $_GET['education'];$skill=$_GET['skill'];$mot=$_GET['mot'];$known_language = $_GET['known_language'];
	$previous_occupation = $_GET['previous_occupation'];$volunteer=$_GET['volunteer'];
	$status_active=$_GET['status_active'];

	$photo=$_GET['photo'];

	$save = mysql_query("INSERT INTO `person`
	VALUES('$file_no','$name','$coo','$cob','$dob','$age','$sex','$marital','$address','$phone','$photo','$status','$arrival2','$education','$skill','$mot','$known_language','$previous_occupation','$volunteer','$status_active','$NOW','','');") or die(mysql_error());

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],$LOCATION,"Add person [$file_no]",$NOW);
	}
  else{
    /* echo "error"; */
    echo mysql_error();
  }
}
elseif($op == "updateperson"){
	$file_no = $_GET['file_no'];$name = $_GET['name'];$coo = $_GET['coo'];$cob=$_GET['cob'];$dob=$_GET['dob'];$age=$_GET['age'];$sex = $_GET['sex'];
	$marital = $_GET['marital'];$address = $_GET['address'];$phone = $_GET['phone']; $status = $_GET['status'];
	$arrival = $_GET['arrival'];$date_arrival = $_GET['date_arrival'];$arrival2 = $arrival.",".$date_arrival;
	$education = $_GET['education'];$skill=$_GET['skill'];$mot=$_GET['mot'];$known_language = $_GET['known_language'];
	$previous_occupation = $_GET['previous_occupation'];$volunteer=$_GET['volunteer'];
	$status_active=$_GET['status_active'];
	$photo=$_GET['photo'];

	$update = mysql_query("UPDATE  `person` SET
	`name`='$name',
	`coo`='$coo',
	`cob`='$cob',
	`dob`='$dob',
	`age`='$age',
	`sex`='$sex',
	`marital`='$marital',
	`address`='$address',
	`phone`='$phone',
	`photo`='$photo',
	`status`='$status',
	`arrival`='$arrival2',
	`education`='$education',
	`skill`='$skill',
	`mot`='$mot',
	`known_language`='$known_language',
	`previous_occupation`='$previous_occupation',
	`volunteer`='$volunteer',
	`active`='$status_active',
	`last_change`='$NOW'
	WHERE `file_no`='$file_no';") or die(mysql_error());

	if($update){
		echo "success";
		setHistory($_SESSION['user_id'],$LOCATION,"Update person [$file_no]",$NOW);
	}
	else{echo mysql_error();}

}
elseif($op == "addfamily"){
	$file_no = $_GET['file_no'];$name = $_GET['name'];$coo = $_GET['coo'];$cob=$_GET['cob'];$dob=$_GET['dob'];$age=$_GET['age'];$sex = $_GET['sex'];
	$marital = $_GET['marital'];$address = $_GET['address'];$phone = $_GET['phone']; $status = $_GET['status'];
	$arrival = $_GET['arrival'];$date_arrival = $_GET['date_arrival'];$arrival2 = $arrival.",".$date_arrival;
	$education = $_GET['education'];$skill=$_GET['skill'];$mot=$_GET['mot'];$known_language = $_GET['known_language'];
	$previous_occupation = $_GET['previous_occupation'];$volunteer=$_GET['volunteer'];
	$status_active=$_GET['status_active'];

	$photo="";

	$save = mysql_query("INSERT INTO `reported_family`
	VALUES('','$file_no','$name','$coo','$cob','$dob','$age','$sex','$marital','$address','$phone','$photo','$status','$arrival2','$education','$skill','$mot','$known_language','$previous_occupation','$volunteer','$status_active','$NOW','','');") or die(mysql_error());

	if($save){
		echo "success";
		setHistory($_SESSION['user_id'],$LOCATION,"Add person family for [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op == "deletefamily"){
	$id = $_GET['id'];
	$file_no = $_GET['file_no'];
	$del = mysql_query("DELETE FROM `reported_family` WHERE id='".$id."' AND file_no='".$file_no."' ;")or die(mysql_error());
	if($del){
		echo "success";
		setHistory($_SESSION['user_id'],$LOCATION,"Del person family for [$file_no]",$NOW);
	}
	else{echo "error";}
}
elseif($op=="getfamily"){
  $file_no=$_GET['file_no'];
  $id=$_GET['id'];
  $family = mysql_query("select * from `reported_family` where `id`='$id' and `file_no`='$file_no'") or die(mysql_error());
  $data = mysql_fetch_object($family);
  echo json_encode($data);
}

?>
