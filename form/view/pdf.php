<?php
include("../../inc/conf.php");
   // get the HTML
    $url = 'http://winardiaris.local/cws/form/view/view-se.php?file_no=121&id=1';
    
   // convert in PDF
    require_once('../../html2pdf/html2pdf.class.php');
    try
    {

		$html2pdf = new HTML2PDF('P', 'A4', 'fr');
		
		$html = file_get_contents($url);
		$html2pdf->writeHTML($html, isset($_GET['vuehtml']));
      //$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
      $html2pdf->Output('exemple01.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
