<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart6">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jakarta Pusat </div>
<div class="panel-body">
<div id="chart_jkt_pusat" style="height: 450px;"></div>
</div>
</div>
</div>

	
	
	
	
	
<script>

// Jakarta Pusat
$(function() {
	<?php
	$qjktp = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31.71%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($djktp = mysql_fetch_array($qjktp)){
		$ajktp = $ajktp."SUM( IF( `address` LIKE'".$djktp['kode']."%',  1 , 0 ) ) AS `".$djktp['kode']."`,";
		$bjktp = substr($ajktp,0,strlen($ajktp)-1);
		
		$qryjktp = mysql_query("SELECT ".$bjktp." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datajktp=mysql_fetch_array($qryjktp);
		
		$xjktp = $xjktp."{label: '".$djktp['nama']." [".$datajktp[$djktp['kode']]."] ', data:".$datajktp[$djktp['kode']]."},";
		$zjktp = substr($xjktp,0,strlen($xjktp)-1);
	}
	echo "var data = [".$zjktp."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jkt_pusat"), data, {
        series: {pie: {show: true}},
        grid: {hoverable: true},
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {x: 20,y: 0},
            defaultTheme: false
        }
    });

});
</script>
