<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart4">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Propinsi </div>
<div class="panel-body">
<div id="chart_propinsi" style="height: 450px;"></div>
</div>
</div>
</div>

	
	
	
	
	
<script>
//Propinsi
$(function() {
	<?php
	$qry = mysql_query("SELECT SUM(IF(`address` LIKE '31%',1,0)) AS `dki`,SUM(IF(`address` LIKE '32%',1,0)) AS `jabar`,SUM(IF(`address` LIKE '36%',1,0)) AS `banten` FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$data=mysql_fetch_array($qry);
	echo'
	var data = [
	{label: \'DKI Jakarta ['.$data['dki'].'] \', data:'.$data['dki'].'},
	{label: \'Jawa Barat ['.$data['jabar'].']\', data:'.$data['jabar'].'},
	{label: \'Banten  ['.$data['banten'].']\', data:'.$data['banten'].'}
	];';
	
	?>
    var plotObj = $.plot($("#chart_propinsi"), data, {
        series: {pie: {show: true}},
        grid: {hoverable: true},
        tooltip: true,
        tooltipOpts: {content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {x: 20,y: 0},
            defaultTheme: false
        }
    });

});
</script>
