<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<i class="fa fa-bell fa-fw"></i>
		<i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu dropdown-alerts">
	<?php
	$MONTH = date("Y-m");
	$qse = mysql_query("SELECT * FROM `se` WHERE `nextassessment` like '%$MONTH%' ")or die(mysql_error());
	$count = mysql_num_rows($qse);
	$i=0;
		while($se=mysql_fetch_array($qse)){
			$i++;
			$date1 = new DateTime($TODAY);
		   $date2 = new DateTime($se['nextassessment']);
		   $difference = $date1->diff($date2);
		   $day =  $difference->days;
		   if($date1 <= $date2){
				$t ="-";
				if(intval($day)>=21 AND intval($day)<=30){
					$class = "text-primary";
				}
				elseif(intval($day)>=8 AND intval($day)<=20){
					$class = "text-warning";
				}
				elseif(intval($day)<=7){
					$class = "text-danger";
				}
			}
			else{
				$t ="+";
				$class = "text-danger";
			}

			echo '
			<li>
				<a class="'.$class.'" href="form/view/view.php?op=se&file_no='.$se['file_no'].'&id='.$se['se_id'].'" target="framepopup"  onClick="setdisplay(divpopup,1)" >
				<div >
					<i class="fa fa-warning fa-fw"></i> Re-Assessment SE ['.$se['file_no'].']
					<span class="pull-right  small">'.$t.$day.'</span> 
				
				</div>
				</a>
			</li>';
			if($i<$count){
				echo '<li class="divider"></li>';
			}
		}	
	?>
	</ul>
</li>
