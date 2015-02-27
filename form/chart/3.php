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
	$qage = mysql_query("SELECT SUM(IF(`age`<='17',1,0)) AS `age_17`, SUM(IF(`age`<='30',1,0)) AS `age_30`,SUM(IF(`age`<='40',1,0)) AS `age_40`,SUM(IF(`age`>'40',1,0)) AS `age_40_plus` FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \' <= 17 ['.$mage['age_17'].'] \', data:'.$mage['age_17'].'},
	{label: \' <= 30 ['.$mage['age_30'].']\', data:'.$mage['age_30'].'},
	{label: \' <= 40  ['.$mage['age_40'].']\', data:'.$mage['age_40'].'},
	{label: \' > 40 ['.$mage['age_40_plus'].']\', data:'.$mage['age_40_plus'].'}
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
