<?php 
$LOCATION = "dashboard";
setHistory($_SESSION['user_id'],$LOCATION,"Open Dasboard",$NOW);
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
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Person Gender (Active)</div>
		<div class="panel-body">
			<div id="chart_sex" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Person Marital Status (Active)</div>
		<div class="panel-body">
			<div id="chart_marital_status_a" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Personal Age (Active)</div>
		<div class="panel-body">
			<div id="chart_age" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-pie-chart"></i> Mapping Propinsi </div>
		<div class="panel-body">
			<div id="chart_propinsi" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-12 well" ><a href="?page=chart" ><i class="fa fa-pie-chart"></i> View All Chart >></a></div>
	
	
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
//AGE
$(function chartage() {
	<?php

	$qage = mysql_query("
			SELECT
			SUM(IF(`age`<='4',1,0)) AS `age_4`,
			SUM(IF(`age`<='11',1,0)) AS `age_11`,
			SUM(IF(`age`<='17',1,0)) AS `age_17`,
			SUM(IF(`age`<='59',1,0)) AS `age_59`,
			SUM(IF(`age`>'60',1,0)) AS `age_60_plus`
			FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \' 0-4 ['.$mage['age_4'].'] \', data:'.$mage['age_4'].'},
	{label: \' 5-11 ['.$mage['age_11'].']\', data:'.$mage['age_11'].'},
	{label: \' 12-17  ['.$mage['age_17'].']\', data:'.$mage['age_17'].'},
	{label: \' 18-59  ['.$mage['age_59'].']\', data:'.$mage['age_59'].'},
	{label: \' 60+ ['.$mage['age_60_plus'].']\', data:'.$mage['age_60_plus'].'}
	];';
	?>
    var plotObj = $.plot($("#chart_age"), data, {
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
</script>
