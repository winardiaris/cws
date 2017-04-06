<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart12">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Banten</div>
<div class="panel-body">
<div id="chart_banten" style="height: 600px;"></div>
</div>
</div>
</div>






<script>


//Banten
$(function() {
	<?php
	$qb = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '36%' AND LENGTH(`kode`)>2 AND LENGTH(`kode`)<=5 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($db = mysql_fetch_array($qb)){
		$ab = $ab."SUM( IF( `address` LIKE'".$db['kode']."%',  1 , 0 ) ) AS `".$db['kode']."`,";
		$bb = substr($ab,0,strlen($ab)-1);

		$qryb = mysql_query("SELECT ".$bb." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datab=mysql_fetch_array($qryb);

		$xb = $xb."{label: '".$db['nama']." [".$datab[$db['kode']]."]', data:".$datab[$db['kode']]."},";
		$zb = substr($xb,0,strlen($xb)-1);
	}
	echo "var data = [".$zb."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_banten"), data, {
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

