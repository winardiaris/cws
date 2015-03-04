<?php
date_default_timezone_set("Asia/Jakarta");
$URL 	= "http://winardiaris.local/cws/";
$NAME 	= "CWS (Church World Service) Indonesia";
$TODAY 	= date("Y-m-d");
$NOW 	= date("Y-m-d H:i:s");
//login timeout in second
$TIMEOUT = "3600";

session_start();
ob_start();

//iframe
$iframe = '	<div id="divpopup" name="divpopup" class="wrapper" style="display:none" onClick="window.framepopup.location=\''.$URL.'loading.html\';setdisplay(divpopup,0); return false">
				<div class="col-lg-12">
				<a href=# onClick="window.framepopup.location=\''.$URL.'loading.html\';setdisplay(divpopup,0); return false"><button type="button" class="btn btn-default  btn-close"><i class="fa fa-close"></i></button></a>
				
				<iframe id="framepopup" name="framepopup"  src="loading.html"></iframe>
				</div>
			</div>';




//server configuration
$DBSERVER 	= 'localhost';
$DBUSER 	= 'simabes';
$DBPASSWORD = 'simabes';
$DBDATABASE = 'cws';
mysql_connect($DBSERVER,$DBUSER,$DBPASSWORD) or die(mysql_error());
mysql_select_db($DBDATABASE) or die(mysql_error());





?>
