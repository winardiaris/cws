<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart3">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Personal Age (Active)</div>
<div class="panel-body">
<div id="chart_age" style="height: 600px;"></div>
</div>
</div>
</div>
<script>
//AGE
$(function chartage() {
	<?php

	$qage = mysql_query("
			SELECT
			SUM(IF(`age`<='4',1,0)) AS `age_4`,
			SUM(IF(`age`<='11',1,0)) AS `age_11`,
			SUM(IF(`age`<='17',1,0)) AS `age_17`,
			SUM(IF(`age`<='59',1,0)) AS `age_59`,
			SUM(IF(`age`>'60',1,0)) AS `age_60_plus`
			FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \' 0-4 ['.$mage['age_4'].'] \', data:'.$mage['age_4'].'},
	{label: \' 5-11 ['.$mage['age_11'].']\', data:'.$mage['age_11'].'},
	{label: \' 12-17  ['.$mage['age_17'].']\', data:'.$mage['age_17'].'},
	{label: \' 18-59  ['.$mage['age_59'].']\', data:'.$mage['age_59'].'},
	{label: \' 60+ ['.$mage['age_60_plus'].']\', data:'.$mage['age_60_plus'].'}
	];';
	?>
    var plotObj = $.plot($("#chart_age"), data, {
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
