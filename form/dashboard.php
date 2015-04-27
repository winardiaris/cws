<?php 
$LOCATION = "dashboard";
setHistory($_SESSION['user_id'],$LOCATION,"Open Dashboard",$NOW);
$R="R1";$W="W1";
//cek login
include("form/navigasi.php") 
?>
<div id="page-wrapper"><!-- page-wrapper -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<div class="col-lg-4">
		<div class="well-sm bg-primary">
			<label>Welcome  </label>
			<p>You login as <i><?php echo  $_SESSION['user_real_name']; ?></i>	
			</p>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-user fa-5x"></i></div>
					<div class="col-xs-9 text-right"><div class="huge">
					<?php
						$qry =mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `created` LIKE '%$TODAY%' AND `active`='1';") or die(mysql_error());
						$data = mysql_fetch_array($qry);
						echo $data['ada'];
					?>
					</div><div>New People!</div></div>
				</div>
			</div>
			<a href="?page=person-data">
				<div class="panel-footer ">
					<span class="pull-left text-success">View Details</span>
					<span class="pull-right text-success"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-user fa-5x"></i></div>
					<div class="col-xs-9 text-right"><div class="huge">
					<?php
						$qry =mysql_query("SELECT COUNT(*) AS `ada` FROM `person` WHERE `created` LIKE '%$TODAY%' AND `active`='2';") or die(mysql_error());
						$data = mysql_fetch_array($qry);
						echo $data['ada'];
					?>
					</div><div>People Terminated</div></div>
				</div>
			</div>
			<a href="?page=person-data&active=2">
				<div class="panel-footer ">
					<span class="pull-left text-warning">View Details</span>
					<span class="pull-right text-warning"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
<!--
	chart
-->
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Status </div>
		<div class="panel-body">
			<div id="chart_status" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Province</div>
		<div class="panel-body">
			<div id="chart_province" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Gender </div>
		<div class="panel-body">
			<div id="chart_gender" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Country of Origin</div>
		<div class="panel-body">
			<div id="chart_coo" style="height: 300px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-12" ><a href="?page=chart" ><i class="fa fa-pie-chart"></i> View All Chart >></a></div>
<!--
	//history
-->
	<div class="col-lg-12">
		<h3>Your History</h3>
		<hr>
	<table class="table table-striped table-bordered table-hover" id="dataTables">
		<thead>
		<tr>
			<th>No</th>
			<th>History</th>
			<th>Time</th>
		</tr>
		</thead>
		<tbody>
		<?php
			$user_id=$_SESSION['user_id'];
			$no=1;
			$qry = mysql_query("SELECT * FROM `system_log` WHERE `user_id`='$user_id' ORDER BY `log_time` DESC")or die(mysql_error());
			while($data=mysql_fetch_array($qry)){
				echo'
				<tr>
					<td align="right">'.$no++.'.</td>
					<td>'.$data['log_message'].'</td>
					<td align="center" width="150px">'.$data['log_time'].'</td>
				</tr>
				';
			}
		?>
		</tbody>
	</table>
</div>
	
</div>
</div><!-- page-wrapper -->
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
    var plotObj = $.plot($("#chart_gender"), data, {
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
$(function() {
	<?php

	$qage = mysql_query("
			SELECT
			SUM(IF(`status`='Refugee',1,0)) AS `Ref`,
			SUM(IF(`status`<='Asylum Seeker',1,0)) AS `Asy`
			FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \' Refugee ['.$mage['Ref'].'] \', data:'.$mage['Ref'].'},
	{label: \' Asylum Seeker ['.$mage['Asy'].']\', data:'.$mage['Asy'].'}
	];';
	?>
    var plotObj = $.plot($("#chart_status"), data, {
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
    var plotObj = $.plot($("#chart_province"), data, {
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
        tooltipOpts: {content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {x: 20,y: 0},
            defaultTheme: false
        }
    });

});
$(function () {
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
     $.plot($("#chart_coo"), dataset, options);

   
});

</script>
