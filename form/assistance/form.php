<?php
// form/assistance/form.php
include("form/navigasi.php");
if(isset($_REQUEST['op'])){
  if(isset($_REQUEST['file_no'])){
    $file_no=$_REQUEST['file_no'];
    $edit=1;

    $qry = mysql_query("SELECT * FROM `assistance` WHERE `file_no`='$file_no' and `status`='1' limit 1") or die(mysql_error());
    $data = mysql_fetch_array($qry);

    $rfa = $data['rfa'];
    $fa_day = $data['fa_day'];
    $fa_type_value_amount = $data['fa_type_value_amount'];
    $uam = $data['uam'];
    $ha_note = $data['ha_note'];
    $ea_class = $data['ea_class'];
    $ea_note = $data['ea_note'];
    $pc_note = $data['pc_note'];
    $last_change = $data['last_change'];
  }
}
else{
  $edit=0;
}
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
    <h3 class="page-header">Assistance Form <span class="edit"></span> </h3>
    </div>
    <div class="col-lg-12">
      <div class="panel-group" id="accordion">
      <!-- panel 1 -->
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#personalinformation">Personal Information</a>
            </h4>
          </div><!-- .panel-heading -->
          <div id="personalinformation" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="col-lg-4">
                <div class="form-group">
                  <label> UNHCR Case Number <span id="a"></span></label>
                  <input class="form-control" id="unhcr">
                </div>
              </div>
              <div class="col-lg-4">
                <label>Receive Finance Assistance</label><br>
                <label class="radio-inline"><input type="radio" name="rfa" value="1"> Day 1</label>
                <label class="radio-inline"><input type="radio" name="rfa" value="2"> Day 2</label>
                <label class="radio-inline"><input type="radio" name="rfa" value="0" checked> None</label>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer"><button class="btn btn-success save" id="save_personalinformation"><i class="fa fa-save"></i> Save</button></div>
          </div><!-- #personalinformation -->
        </div><!-- .panel panel-default -->

      <!-- panel 2 -->
       <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#financeassistance">Finance Assistance </a>
            </h4>
          </div><!-- .panel-heading -->
          <div id="financeassistance" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="col-lg-12">
                    <label class="radio-inline"><input name="FA-day" type="radio" value="1" checked> Day 1</label> /
                    <label class="radio-inline"><input name="FA-day" type="radio" value='2'> Day 2</label>
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                      <th align="center">Type</th>
                      <th align="center">Value</th>
                      <th align="center" width="100px">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-hof"> Head of Family</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-hof" id="FA-value-hof" value="1235000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-hof" id="FA-amount-hof"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-s"> Single</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-s" id="FA-value-s" value="1295000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-s" id="FA-amount-s"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-s50"> Single 50%</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-s50" id="FA-value-s50" value="650000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-s50" id="FA-amount-s50"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-d"> Dependent</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-d" id="FA-value-d" value="630000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-d" id="FA-amount-d"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-lm"> Lactating Mother</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-lm" id="FA-value-lm" value="125000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-lm" id="FA-amount-lm"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-cu5"> Children under 5 years old</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-cu5" id="FA-value-cu5" value="125000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-cu5" id="FA-amount-cu5"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-p"> Pregnant</label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-p" id="FA-value-p" value="125000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-p" id="FA-amount-p"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value="1" class="FA-ch" id="FA-ch-e"> Elderly </label></td>
                      <td><input class="form-control FA-value" type="number" size="10" name="FA-value-e" id="FA-value-e" value="125000"></td>
                      <td><input class="form-control FA-amount" type="number" value=1 name="FA-amount-e" id="FA-amount-e"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="center-block">
                  <b>Unaccompanied Minor (UAM)</b><br>
                    <table class="table">
                      <tr>
                        <td>
                          <label class="radio-inline"><input  type="radio" value="1" name="UAM" id="UAM-radio-lc"> Lodging Cost</label><br>
                        </td>
                        <td>
                          <input class="form-control UAM-value" type="number" name="UAM"  id="UAM-value-lc" value="300000">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="radio-inline"><input  type="radio" value="2" name="UAM" id="UAM-radio-wa"> Weekly Allowance (4 weeks)</label><br>
                        </td>
                        <td>
                          <input class="form-control UAM-value" type="number" name="UAM-value-wa"  id="UAM-value-wa" value="800000">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="radio-inline"><input  type="radio" value="3" name="UAM" id="UAM-radio-wad"> Weekly Allowance Dependent (4 weeks)</label>
                        </td>
                        <td>
                          <input class="form-control UAM-value" type="number" name="UAM-value-wad"  id="UAM-value-wad" value="400000">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="radio-inline"><input  type="radio" value="0" name="UAM" id="UAM-radio-no">No</label>
                        </td>
                        <td>
                          <input class="form-control UAM-value" type="number" name="UAM-value-no"  id="UAM-value-no" value="0">
                        </td>
                      </tr>
                    </table>
                </div>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer">
                <input id="fa_type_value_amount" type="hidden">
                <input id="uam" type="hidden">
                <button class="btn btn-success" id="save_financeassistance"><i class="fa fa-save"></i> Save</button>
                <div class="pull-right" id="total-finance"><span class="rp"> </span> IDR</div>
            </div>
          </div><!-- #financeassistance -->
        </div><!-- .panel panel-default -->

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#healthassistance">Health Assistance </a>
            </h4>
          </div><!-- .panel-heading -->
          <div id="healthassistance" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="col-lg-12">
                <label>Notes:</label>
                <textarea class="form-control" name="HA-in-notes" id="HA-in-notes" ></textarea>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer">
              <button class="btn btn-success" id="save_healthassistance"><i class="fa fa-save"></i> Save</button>
            </div>
          </div><!-- .healthassistance -->
        </div> <!-- .panel panel-default -->

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#educationaccess">Education Access </a>
            </h4>
          </div><!-- .panel-heading -->
          <div id="educationaccess" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="col-lg-12">
                <label class="radio-inline"><input type="radio" name="EA" value="MC"> Class in Manggarai Centre</label>
                <label class="radio-inline"><input type="radio" name="EA" value="CCC"> Class in Ciputat Community Centre</label>
                <label class="radio-inline"><input type="radio" name="EA" value="S1"> Class in Shelter 1</label>
                <label class="radio-inline"><input type="radio" name="EA" value="S2"> Class in Shelter 2</label>
<br>

                <label>Notes:</label>
                <textarea class="form-control" name="EA-in-notes" id="EA-in-notes" ></textarea>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer">
              <button class="btn btn-success" id="save_educationaccess"><i class="fa fa-save"></i> Save</button>
            </div>
          </div><!-- .educationaccess -->
        </div> <!-- .panel panel-default -->

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#psychologicalcounselling">Psychological Conselling </a>
            </h4>
          </div><!-- .panel-heading -->
          <div id="psychologicalcounselling" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="col-lg-12">
                <label>Notes:</label>
                <textarea class="form-control" name="PC-in-notes" id="PC-in-notes" ></textarea>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer">
              <button class="btn btn-success" id="save_psychologicalcounselling"><i class="fa fa-save"></i> Save</button>
            </div>
          </div><!-- .psychologicalcounselling -->
        </div> <!-- .panel panel-default -->
      </div><!-- #accordion -->
    </div> <!-- .col-lg-12 -->
  </div><!-- .row -->
</div> <!-- .page-wrapper -->
<?php
include("js.php");
?>
