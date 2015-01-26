<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart7">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jakarta Utara </div>
<div class="panel-body">
<div id="chart_jkt_utara" style="height: 450px;"></div>
</div>
</div>
</div>

	
	
	
	
	
<script>

// Jakarta Utara
$(function() {
	<?php
	$qjktu = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31.72%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($djktu = mysql_fetch_array($qjktu)){
		$ajktu = $ajktu."SUM( IF( `address` LIKE'".$djktu['kode']."%',  1 , 0 ) ) AS `".$djktu['kode']."`,";
		$bjktu = substr($ajktu,0,strlen($ajktu)-1);
		
		$qryjktu = mysql_query("SELECT ".$bjktu." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datajktu=mysql_fetch_array($qryjktu);
		
		$xjktu = $xjktu."{label: '".$djktu['nama']." [".$datajktu[$djktu['kode']]."] ', data:".$datajktu[$djktu['kode']]."},";
		$zjktu = substr($xjktu,0,strlen($xjktu)-1);
	}
	echo "var data = [".$zjktu."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jkt_utara"), data, {
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
