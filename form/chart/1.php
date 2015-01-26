<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart1">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Person Sex (Active)</div>
<div class="panel-body">
<div id="chart_sex" style="height: 450px;"></div>
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
  ],
  xkey: 'sex',
  ykeys: ['value'],
  labels: ['Value']
});
</script>
