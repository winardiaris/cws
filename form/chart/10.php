<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart10">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jakarta Timur </div>
<div class="panel-body">
<div id="chart_jkt_timur" style="height: 450px;"></div>
</div>
</div>
</div>

	
	
	
	
	
	<script>
	// Jakarta Timur
$(function() {
	<?php
	$qjktt = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31.75%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($djktt = mysql_fetch_array($qjktt)){
		$ajktt = $ajktt."SUM( IF( `address` LIKE'".$djktt['kode']."%',  1 , 0 ) ) AS `".$djktt['kode']."`,";
		$bjktt = substr($ajktt,0,strlen($ajktt)-1);
		
		$qryjktt = mysql_query("SELECT ".$bjktt." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datajktt=mysql_fetch_array($qryjktt);
		
		$xjktt = $xjktt."{label: '".$djktt['nama']." [".$datajktt[$djktt['kode']]."] ', data:".$datajktt[$djktt['kode']]."},";
		$zjktt = substr($xjktt,0,strlen($xjktt)-1);
	}
	echo "var data = [".$zjktt."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jkt_timur"), data, {
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
