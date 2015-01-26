<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart2">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Person Marital Status (Active)</div>
<div class="panel-body">
<div id="chart_marital_status_a" style="height: 450px;"></div>
</div>
</div>
</div>
<script>

//marital
$(function() {
	<?php
	$ms = mysql_query("SELECT * FROM `marital_status`");
	while($m=mysql_fetch_array($ms)){
		$marital = $marital."SUM( IF( `marital`='".$m['marital_id']."',  1 , 0 ) ) AS `".$m['marital_id']."`,";
	}
	$ma = substr($marital,0,strlen($marital)-1);
	$qmar = mysql_query("SELECT ".$ma." FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mar=mysql_fetch_array($qmar);
	echo'
	var data = [
	{label: \'Single ['.$mar['SI'].'] \', data:'.$mar['SI'].'},
	{label: \'Married ['.$mar['MA'].']\', data:'.$mar['MA'].'},
	{label: \'Engaged ['.$mar['EN'].']\', data:'.$mar['EN'].'},
	{label: \'Widower ['.$mar['WR'].']\', data:'.$mar['WR'].'},
	{label: \'Widow ['.$mar['WW'].']\', data:'.$mar['WW'].'}
	];';
	
	?>
    var plotObj = $.plot($("#chart_marital_status_a"), data, {
        series: {
            pie: {
                show: true
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
