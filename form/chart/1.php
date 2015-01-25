<?php include("form/navigasi.php") ;?>

<div id="page-wrapper">
<div class="row" >
	<div class="col-lg-12"><h3 class="page-header">Chart Person </h3></div>
	<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Person Sex (Active)</div>
		<div class="panel-body">
			<div id="chart_sex" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Person Marital Status (Active)</div>
		<div class="panel-body">
			<div id="chart_marital_status_a" style="height: 250px;"><?php echo $ma;?></div>
		</div>
	</div>
	</div>

	

</div>
</div>
<script>
new Morris.Donut({
  // ID of the element in which to draw the chart.
  element: 'chart_sex',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
	<?php
	$qsex = mysql_query("SELECT SUM( IF( `sex`='M',  1 , 0 ) ) AS  `M`, SUM( IF( `sex`='F',  1 , 0 ) ) AS  `F` FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$sex=mysql_fetch_array($qsex);
	
	
	echo "{ label: 'Male', value:".$sex['M']."},";
	echo "{ label: 'Female', value:".$sex['F']."}";
	
	?>
    //{ year: '2008', value: 20 },
    //{ year: '2009', value: 10 },
    //{ year: '2010', value: 5 },
    //{ year: '2011', value: 5 },
    //{ year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'sex',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});


//Flot Pie Chart
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

