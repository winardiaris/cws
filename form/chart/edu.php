<?php include("../../inc/conf.php") ;?>
<div class="col-lg-12 col-sm-6" id="chart1">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-pie-chart"></i> Education (Active)</div>
<div class="panel-body">
	<div class="col-lg-6 col-sm-12"><div id="edu1" style="height: 400px;"></div></div>
	<div class="col-lg-6 col-sm-12"><div id="edu2" style="height: 400px;"></div></div>
	<div class="col-lg-6 col-sm-12"><div id="edu3" style="height: 400px;"></div></div>
</div>
<div class="panel-footer">
</div>
</div>
</div>


<script>
$(document).ready(function () {
<?php
	$qry =  mysql_query("SELECT `education` FROM `person`   ;") or die(mysql_error());
	$c = mysql_num_rows($qry);
	while($data = mysql_fetch_array($qry)){
		$edu=explode("|",$data['education']);
		$edu1=explode(",",$edu[0]);
		$edu2=explode(",",$edu[1]);
		$edu3=explode(",",$edu[2]);

		$edu1a += $edu1[0];
		$edu1b += $edu1[1];
		$edu1c += $edu1[2];
		$edu1d += $edu1[3];
		$edu1e += $edu1[4];

		$edu2a += $edu2[0];
		$edu2b += $edu2[1];
		$edu2c += $edu2[2];
		$edu2d += $edu2[3];
		$edu2e += $edu2[4];

		$edu3a += $edu3[0];
		$edu3b += $edu3[1];
	}
		$dataedu1 = "[0,".$edu1a."],[1,".$edu1b."],[2,".$edu1c."],[3,".$edu1d."],[4,".$edu1e."]";
		$dataedu2 = "[0,".$edu2a."],[1,".$edu2b."],[2,".$edu2c."],[3,".$edu2d."],[4,".$edu2e."]";
		$dataedu3 = "[0,".$edu3a."],[1,".$edu3b."]";

		$tick1 = "[0,'Elementary School'],[1,'Junior High School'],[2,'Senior High School'],[3,'Vocational School'],[4,'Accelerated School']" ;
		$tick2 = "[0,'English'],[1,'Bahasa Indonesia'],[2,'Computer'],[3,'Art'],[4,'Handicraft']" ;
		$tick3 = "[0,'English'],[1,'Art']" ;




		print( "\tvar edu1 = [".$dataedu1."];\n");
		print( "\tvar edu2 = [".$dataedu2."];\n");
		print( "\tvar edu3 = [".$dataedu3."];\n");
		print( "\tvar ticks1 = [".$tick1."];\n");
		print( "\tvar ticks2 = [".$tick2."];\n");
		print( "\tvar ticks3 = [".$tick3."];\n");

?>
		var datasetedu1 = [{ label: "Formal Education", data: edu1, color: "#00C3D1" }];
		var optionsedu1 = {
            series: {bars: {show: true}},
            bars: {align: "center",barWidth: 0.4},
            xaxis: {
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
                ticks: ticks1
            }
        };
     $.plot($("#edu1"), datasetedu1, optionsedu1);

		var datasetedu2 = [{ label: "Informal Education : (CWS)", data: edu2, color: "#00C3D1" }];
		var optionsedu2 = {
            series: {bars: {show: true}},
            bars: {align: "center",barWidth: 0.4},
            xaxis: {
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
                ticks: ticks2
            }
        };
     $.plot($("#edu2"), datasetedu2, optionsedu2);

		var datasetedu3 = [{ label: "Informal Education : (Insitution) ", data: edu3, color: "#00C3D1" }];
		var optionsedu3 = {
            series: {bars: {show: true}},
            bars: {align: "center",barWidth: 0.4},
            xaxis: {
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
                ticks: ticks3
            }
        };
     $.plot($("#edu3"), datasetedu3, optionsedu3);


});



</script>
