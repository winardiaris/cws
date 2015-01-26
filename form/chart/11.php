<?php include("../../inc/conf.php") ;?>
<div class="col-lg-6" id="chart11">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Jawa Barat </div>
<div class="panel-body">
<div id="chart_jabar" style="height: 450px;"></div>
</div>
</div>
</div>

	
	
	
	
	
<script>


//Jabar
$(function() {
	<?php
	$qj = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '32%' AND LENGTH(`kode`)>2 AND LENGTH(`kode`)<=5 ORDER BY `kode` ASC; ") or die(mysql_error());
	while($dj = mysql_fetch_array($qj)){
		$aj = $aj."SUM( IF( `address` LIKE'".$dj['kode']."%',  1 , 0 ) ) AS `".$dj['kode']."`,";
		$bj = substr($aj,0,strlen($aj)-1);
		
		$qryj = mysql_query("SELECT ".$bj." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$dataj=mysql_fetch_array($qryj);
		
		$xj = $xj."{label: '".$dj['nama']." [".$dataj[$dj['kode']]."]', data:".$dataj[$dj['kode']]."},";
		$zj = substr($xj,0,strlen($xj)-1);
	}
	echo "var data = [".$zj."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_jabar"), data, {
        series: {pie: {show: true}},
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
