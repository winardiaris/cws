<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart1">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Person Sex (Active)</div>
<div class="panel-body">
<div id="chart_sex" style="height: 600px;"></div>
</div>
</div>
</div>


<script>
$(function() {
	<?php
	$qsex = mysql_query("SELECT SUM( IF( `sex`='M',  1 , 0 ) ) AS  `M`, SUM( IF( `sex`='F',  1 , 0 ) ) AS  `F` FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$sex=mysql_fetch_array($qsex);
	echo'
	var data = [
	{label: \'Male ['.$sex['M'].'] \', data:'.$sex['M'].'},
	{label: \'Female ['.$sex['F'].'] \', data:'.$sex['F'].'}
	];';
	
	?>
    var plotObj = $.plot($("#chart_sex"), data, {
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
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

</script>
