<?php
//form/assitance/data.php
include ('form/navigasi.php');
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Assistance Data</h3>
    </div>
    <div class="col-lg-12">

      <div class="">
        <table class="table table-striped table-bordered table-hover" id="dataTables">
          <thead>
              <tr>
                <th></th>
                <th>No.</th>
                <th>UNHCR Case Number.</th>
                <th>RFA Day</th>
                <th>Education Class</th>
              </tr>
          </thead>
          <tbody>
            <?php
                $no=0;
                $qry = mysql_query("SELECT `file_no`,`rfa`,`ea_class` FROM `assistance` WHERE `status`='1' ORDER BY `file_no` ASC ") or die(mysql_error());

                while($data = mysql_fetch_array($qry)){
                  $no++;
                  $file_no=$data['file_no'];
                  $rfa=$data['rfa'];
                  $ea_class=$data['ea_class'];
                  $class="";
                  if($ea_class=="MC"){
                    $class="Manggarai Centre";
                  }
                  elseif($ea_class=="CCC"){
                    $class="Ciputat Community Centre";
                  }
                  elseif($ea_class=="S1"){
                    $class="Shelter 1";
                  }
                  elseif($ea_class=="S2"){
                    $class="Shelter 2";
                  }

                  echo "<tr>
                    <td>
									<div class='dropdown'>
									  <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='dropdownMenu1' data-toggle='dropdown' aria-expanded='true'><span class='caret'></span></button>
									  <ul class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu1'>
									    <li role='presentation'><a role='menuitem' tabindex='-1' href=''  title='View ".$file_no."' target='framepopup'  onClick='setdisplay(divpopup,1)'><i class='fa fa-eye'></i> View</a></li>
                      <li role='presentation'><a role='menuitem' tabindex='-1' href='?page=assistance-form&op=edit&file_no=".$file_no."'><i class='fa fa-edit'></i> Edit</a></li>
									  </ul>
									</div>
                    </td>
                    <td>".$no."</td>
                    <td>".$file_no."</td>
                    <td>".$rfa."</td>
                    <td>".$class."</td>
                  </tr>";
                }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div> <!-- .row -->
</div> <!-- #page-wrapper -->
