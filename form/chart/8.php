<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart8">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jakarta Barat </div>
<div class="panel-body">
<div id="chart_jkt_barat" style="height: 600px;"></div>
</div>
</div>
</div>







<script>

// Jakarta Barat
$(function() {
	<?php
	$qjktb = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31.73%' AND LENGTH(`kode`)>5 AND LENGTH(`kode`)<=8 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($djktb = mysql_fetch_array($qjktb)){
		$ajktb = $ajktb."SUM( IF( `address` LIKE'".$djktb['kode']."%',  1 , 0 ) ) AS `".$djktb['kode']."`,";
		$bjktb = substr($ajktb,0,strlen($ajktb)-1);

		$qryjktb = mysql_query("SELECT ".$bjktb." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datajktb=mysql_fetch_array($qryjktb);

		$xjktb = $xjktb."{label: '".$djktb['nama']." [".$datajktb[$djktb['kode']]."] ', data:".$datajktb[$djktb['kode']]."},";
		$zjktb = substr($xjktb,0,strlen($xjktb)-1);
	}
	echo "var data = [".$zjktb."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jkt_barat"), data, {
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
