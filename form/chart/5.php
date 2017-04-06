<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart5">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping DKI Jakarta </div>
<div class="panel-body">
<div id="chart_dki" style="height: 600px;"></div>
</div>
</div>
</div>






<script>

//DKI Jakarta
$(function() {
<?php
  $a="";$x="";
	$q = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '31%' AND LENGTH(`kode`)>2 AND LENGTH(`kode`)<=5 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($d = mysql_fetch_array($q)){
		$a = $a."SUM( IF( `address` LIKE'".$d['kode']."%',  1 , 0 ) ) AS `".$d['kode']."`,";
		$b = substr($a,0,strlen($a)-1);

		$qry = mysql_query("SELECT ".$b." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$data=mysql_fetch_array($qry);

		$x = $x."{label: '".$d['nama']." [".$data[$d['kode']]."] ', data:".$data[$d['kode']]."},";
		$z = substr($x,0,strlen($x)-1);
	}
	echo "var data = [".$z."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_dki"), data, {
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
