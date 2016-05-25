@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
 <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<style>

</style>
@stop

@section('content')

<div class="col-md-8">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-file-text-o"></i> EXISTING FEES LIST</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row" >
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Advanced Filter Search</a>
                </h5>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                 <div class="col-md-6">
                    <div class="form-group">
                     <label>GENDER</label>
                      <select class="form-control input-sm">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                     <label>STUDENT STATUS</label>
                      <select class="form-control input-sm">
                        <option>New</option>
                        <option>Old</option>
                        <option>In-Active</option>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 380px;overflow-y: scroll;">
     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>GRADE LEVEL</th>
            <th>FEES</th>
            <th>AMOUNTS</th>
            <th>RECEIPTS ACCOUNTS</th>
            <th class="text-center">ACTION</th>
            <th class="text-center">ACTION</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX">
            <td>Trident</td>
            <td>Internet
                Explorer 4.0
            </td>
            <td>Win 95+</td>
            <td class="center">4</td>
             <td class="center">
            <button class="btn btn-danger btn-block btn-sm"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>
            </td>
            <td class="center">
            <button class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#edit-fees"><b class="pull-left"><i class="fa fa-pencil"></i></b> <b class="pull-right">EDIT</b></button>
            </td>
            
        </tr>
        </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
<div class="wyred-box-footer">
  <div class="pull-right wyred-button col-md-6 ">
    <button class="btn btn-info btn-block"><i class="fa fa-plus"></i> ADD PREVIOUS SCHOOL YEAR ACCOUNTS </button>
  </div>
</div>
</div>

<div class="col-md-4">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-money"></i> SETUP NEW FEE</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">
  <div class="col-md-12">
   <div class="form-group">
     <label>CLASS TYPE</label>
      <select class="form-control input-sm" id="classType">
      
      </select>
    </div>
    <div class="form-group">
     <label>GRADE TYPE</label>
      <select class="form-control input-sm">
       
      </select>
    </div>
   <div class="form-group">
     <label>GRADE LEVEL</label>
      <select class="form-control input-sm">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
     <div class="form-group" id="section-div">
     <label>FEES</label>
      <select class="form-control input-sm">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="form-group" id="section-div">
     <label>AMOUNT</label>
    <input type="text" class="form-control input-sm" name="">
    </div>
     <div class="form-group" id="section-div">
     <label>RECEIPTS ACCOUNTS</label>
      <select class="form-control input-sm">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <p class="text-red">
      Notes: Please add Tuition Fees for all levels.
    </p>
  </div>
 </div>
 </div>
 <div class="wyred-box-footer">
    <div class="wyred-button col-md-12">
        <button class="btn btn-info btn-block">ADD FEE</button>
    </div>
</div>
 </div>


<div class="modal inmodal fade" id="edit-fees" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


               <div class="wyred-box-header" style="margin-top:-10px;">
                  <h3 class="wyred-box-title"><i class="fa fa-pencil"></i> EDIT FEE</h3>
                </div>
                <div class="wyred-box-body">
                <div class="row">
                <div class="col-md-12">
                 <div class="form-group">
                   <label>CLASS TYPE</label>
                    <select class="form-control input-sm" id="classType">
                    
                    </select>
                  </div>
                  <div class="form-group">
                   <label>GRADE TYPE</label>
                    <select class="form-control input-sm">
                     
                    </select>
                  </div>
                 <div class="form-group">
                   <label>GRADE LEVEL</label>
                    <select class="form-control input-sm">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                   <div class="form-group" id="section-div">
                   <label>FEES</label>
                    <select class="form-control input-sm">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <div class="form-group" id="section-div">
                   <label>AMOUNT</label>
                  <input type="text" class="form-control input-sm" name="">
                  </div>
                   <div class="form-group" id="section-div">
                   <label>RECEIPTS ACCOUNTS</label>
                    <select class="form-control input-sm">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <p class="text-red">
                    Notes: Please add Tuition Fees for all levels.
                  </p>
                </div>
               </div>
               </div>
               <div class="wyred-box-footer">
                  <div class="wyred-button col-md-12">
                      <button class="btn btn-info btn-block">ADD FEE</button>
                  </div>
              </div>
 
        </div>
    </div>
</div>

@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')

<!-- Date range picker -->
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>

    
<script>
$(document).ready(function(){
    $('#summer-div').hide();
    $('#summer-div-request').hide();

    $('#year').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
   
     $('#classType').change(function(){
      if(this.value == '2'){
        $('#summer-div').show();
        $('#section-div').hide();
      }else if(this.value == '1'){
        $('#summer-div').hide();
         $('#section-div').show();
      }
    });

     $('#classTypeR').change(function(){
      if(this.value == 'SUMMER CLASS'){
        $('#summer-div-request').show();
        $('#section-div-request').hide();
      }else if(this.value == 'REGULAR CLASS'){
        $('#summer-div-request').hide();
         $('#section-div-request').show();
      }
    });

    $("#year").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>


@stop