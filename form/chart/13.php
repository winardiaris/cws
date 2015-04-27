<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart3">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Personal Status (Active)</div>
<div class="panel-body">
<div id="chart_status" style="height: 600px;"></div>
</div>
</div>
</div>
<script>
//AGE
$(function() {
	<?php

	$qage = mysql_query("
			SELECT
			SUM(IF(`status`='Refugee',1,0)) AS `Ref`,
			SUM(IF(`status`<='Asylum Seeker',1,0)) AS `Asy`
			FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \' Refugee ['.$mage['Ref'].'] \', data:'.$mage['Ref'].'},
	{label: \' Asylum Seeker ['.$mage['Asy'].']\', data:'.$mage['Asy'].'}
	];';
	?>
    var plotObj = $.plot($("#chart_status"), data, {
        series: {
			pie: {
                show: true,
                label: {
		            show:true,
		            radius: 0.8,
		            formatter: function (label, series) {                
		                return '<div class="label-chart">' +label + ' : ' +Math.round(series.percent) +'%</div>';
		            }
		        }
            }
        },
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
