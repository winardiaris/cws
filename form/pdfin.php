<?php
//ob_start();
include("../inc/conf.php");

$link = $_POST['link'];
$file = $_POST['file'];

define('PATH','../mpdf/'); //mpdf directory
include(PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document

$content = file_get_contents($link); //content 
$stylesheet = file_get_contents('../css/pdfin.css');   //css

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();

//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($content);
$mpdf->Output($file.".pdf" ,'D');
exit;
?>
