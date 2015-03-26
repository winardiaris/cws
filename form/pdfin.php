<?php
//ob_start();
include("../inc/conf.php");

	$link = $_POST['link'];
	$file = $_POST['file'];
	$css = '<style>'.file_get_contents('../css/pdfin.css').'</style>'; /// here call you external css file 
	$content = file_get_contents($link);
   $files = (string)$URL.'pdf/'.$file.'.pdf';
    // convert in PDF
    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        //$html2pdf->setDefaultFont('Arial');
        //$html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($css.$content, isset($_GET['vuehtml']));
        $html2pdf->Output($files,'D');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
