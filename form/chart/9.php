<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart9">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jakarta Selatan </div>
<div class="panel-body">
<div id="chart_jkt_selatan" style="height: 600px;"></div>
</div>
</div>
</div>

<script>
// Jakarta Selatan
$(function() {
	<?php
	$qjkts = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31.74%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($djkts = mysql_fetch_array($qjkts)){
		$ajkts = $ajkts."SUM( IF( `address` LIKE'".$djkts['kode']."%',  1 , 0 ) ) AS `".$djkts['kode']."`,";
		$bjkts = substr($ajkts,0,strlen($ajkts)-1);
		
		$qryjkts = mysql_query("SELECT ".$bjkts." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datajkts=mysql_fetch_array($qryjkts);
		
		$xjkts = $xjkts."{label: '".$djkts['nama']." [".$datajkts[$djkts['kode']]."] ', data:".$datajkts[$djkts['kode']]."},";
		$zjkts = substr($xjkts,0,strlen($xjkts)-1);
	}
	echo "var data = [".$zjkts."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jkt_selatan"), data, {
        series: {pie: {
                show: true,
                label: {
		            show:true,
		            radius: 0.8,
		            formatter: function (label, series) {                
		                return '<div class="label-chart">' +label + ' : ' +Math.round(series.percent) +'%</div>';
		            }
		        }
            }},
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
