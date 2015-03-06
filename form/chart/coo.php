<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart1">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Country of Origin (Active)</div>
<div class="panel-body">
<div id="chart" style="height: 600px;"></div>
</div>
<div class="panel-footer">
</div>
</div>
</div>


<script>
$(document).ready(function () {
<?php
	$qry =  mysql_query("SELECT DISTINCT `person`.`coo` , `master_country`.`country_name` AS `name` FROM `person` inner join `master_country` ON `person`.`coo`=`master_country`.`country_id` ORDER BY `master_country`.`country_name`  ;") or die(mysql_error());
		$ccoo = mysql_num_rows($qry);
      $as = 1;
		while($coo=mysql_fetch_array($qry)){
			$str .=", SUM(IF(`coo`='".$coo['coo']."',1,0)) AS `".$as++."` ";
			$name .=",".$coo['name'];
		}
		$str1 =  substr($str,1,strlen($str));
		$name1 =  explode(",",substr($name,1,strlen($name)));
		//echo $str1;
		$qry2 = mysql_query("SELECT $str1 FROM `person` WHERE `person`.`active`='1'")or die(mysql_error());
		$c = mysql_num_fields($qry2);	
		$data = mysql_fetch_array($qry2);
		for($i=0;$i<$c;$i++){
			$data2 .=",\n\t\t [".$i.",".$data[$i]."]";
			$label .=",\n\t\t[".$i.",'".$name1[$i]."']";	
		}
		print( "var data = [".substr($data2,1,strlen($data2))."\n];\n\n");
		print( "var ticks = [".substr($label,1,strlen($label))."\n];\n\n");
?>
		var dataset = [{ label: "People by Country Origin", data: data, color: "#00C3D1" }];
		var options = {
            series: {
                bars: {
                    show: true
                }
            },
            bars: {
                align: "center",
                barWidth: 0.7
            },
            xaxis: {
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
                ticks: ticks
            }
        };
     $.plot($("#chart"), dataset, options);

   
});



</script>
