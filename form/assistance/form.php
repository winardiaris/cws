<?php 
// form/assistance/form.php 
include("form/navigasi.php");
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Assistance Form</h3>
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
            <div class="panel-footer"><button class="btn btn-success" id="save_personalinformation"><i class="fa fa-save"></i> Save</button></div>
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
                      <th align="center" width="100px">Amount</th>
                      <th align="center">Type</th>
                      <th align="center" width="100px">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-hof"> Head of Family (IDR 1.235.000)</label></td>
                      <td><input class="form-control" name="FA-in-hof" id="FA-in-hof"></td>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-lm"> Lactating Mother (IDR 125.000)</label></td>
                      <td><input class="form-control" name="FA-in-lm" id="FA-in-lm"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-s"> Single (IDR 1.295.000)</label></td>
                      <td><input class="form-control" name="FA-in-s" id="FA-in-s"></td>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-cu5"> Children under 5 years old (IDR 125.000)</label></td>
                      <td><input class="form-control" name="FA-in-cu5" id="FA-in-cu5"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-s50"> Single 50% (IDR 650.000)</label></td>
                      <td><input class="form-control" name="FA-in-s50" id="FA-in-s50"></td>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-p"> Pregnant (IDR 125.000)</label></td>
                      <td><input class="form-control" name="FA-in-p" id="FA-in-p"></td>
                    </tr>
                    <tr>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-d"> Dependent(IDR 630.000)</label></td>
                      <td><input class="form-control" name="FA-in-d" id="FA-in-d"></td>
                      <td><label class="radio-inline"> <input type="checkbox" value=="1" id="FA-ch-e"> Elderly (IDR 125.000)</label></td>
                      <td><input class="form-control" name="FA-in-e" id="FA-in-e"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="center-block">
                  <b>Unaccompanied Minor (UAM)</b><br>
                    <label class="radio-inline"><input  type="checkbox" value=="1" name="FA-ch-uam-lc" id="FA-ch-uam-lc"> Lodging Cost (IDR 300.000)</label><br>
                    <label class="radio-inline"><input  type="checkbox" value=="1" name="FA-ch-uam-wa" id="FA-ch-uam-wa"> Weekly Allowance (IDR 800.000 - 4 weeks)</label><br>
                    <label class="radio-inline"><input  type="checkbox" value=="1" name="FA-ch-uam-wad" id="FA-ch-uam-wad"> Weekly Allowance Dependent (IDR 400.000 - 4 weeks)</label>
                </div>
              </div>
            </div><!-- .panel-body -->
            <div class="panel-footer"><button class="btn btn-success" id="save_financeassistance"><i class="fa fa-save"></i> Save</button></div>
          </div><!-- #financeassistance -->
        </div><!-- .panel panel-default -->


      </div><!-- #accordion -->
    </div> <!-- .col-lg-12 -->
  </div><!-- .row -->
</div> <!-- .page-wrapper ->
