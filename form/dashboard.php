<?php 
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
			<div id="chart_marital_status_a" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Personal Age (Active)</div>
		<div class="panel-body">
			<div id="chart_age" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Mapping Propinsi </div>
		<div class="panel-body">
			<div id="chart_propinsi" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Mapping DKI Jakarta </div>
		<div class="panel-body">
			<div id="chart_dki" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Mapping Jawa Barat </div>
		<div class="panel-body">
			<div id="chart_jabar" style="height: 450px;"></div>
		</div>
	</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-heading"><i class="fa fa-bar-chart-o"></i> Mapping Banten</div>
		<div class="panel-body">
			<div id="chart_banten" style="height: 250px;"></div>
		</div>
	</div>
	</div>
	
</div>
</div><!-- page-wrapper -->
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

//AGE
$(function() {
	<?php
	
	$qage = mysql_query("SELECT SUM(IF(`age`<='17',1,0)) AS `age_17`, SUM(IF(`age`<='30',1,0)) AS `age_30`,SUM(IF(`age`<='40',1,0)) AS `age_40`,SUM(IF(`age`>'40',1,0)) AS `age_40_plus` FROM  `person` WHERE `active`='1'") or die( mysql_error());
	$mage=mysql_fetch_array($qage);
	echo'
	var data = [
	{label: \'<= 17 ['.$mage['age_17'].'] \', data:'.$mage['age_17'].'},
	{label: \'<= 30 ['.$mage['age_30'].']\', data:'.$mage['age_30'].'},
	{label: \'<= 40  ['.$mage['age_40'].']\', data:'.$mage['age_40'].'},
	{label: \'>40 ['.$mage['age_40_plus'].']\', data:'.$mage['age_40_plus'].'}
	];';
	
	?>
    var plotObj = $.plot($("#chart_age"), data, {
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
//DKI Jakarta
$(function() {
	<?php
	
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
//Banten
$(function() {
	<?php
	
	
	$qb = mysql_query("SELECT * FROM `data_wilayah` WHERE `kode` LIKE '36%' AND LENGTH(`kode`)>2 AND LENGTH(`kode`)<=5 ORDER BY `kode` ASC; ") or die(mysql_error());
	
	while($db = mysql_fetch_array($qb)){
		$ab = $ab."SUM( IF( `address` LIKE'".$db['kode']."%',  1 , 0 ) ) AS `".$db['kode']."`,";
		$bb = substr($ab,0,strlen($ab)-1);
		
		$qryb = mysql_query("SELECT ".$bb." FROM `person` WHERE `active`='1'") or die( mysql_error());
		$datab=mysql_fetch_array($qryb);
		
		
		$xb = $xb."{label: '".$db['nama']." [".$datab[$db['kode']]."]', data:".$datab[$db['kode']]."},";
		$zb = substr($xb,0,strlen($xb)-1);
	}
	echo "var data = [".$zb."];";
	print("\n\n");
	?>
    var plotObj = $.plot($("#chart_banten"), data, {
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
