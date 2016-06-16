@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
 <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

@stop

@section('content')

<div class="col-md-8">
  <div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-user"></i>ENROLLED STUDENT'S
    </div>
    <div class="tools">
    
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label>School Year</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
     </div>
   
    <div class="col-md-12">
    <div style="height: 425px;overflow-y: scroll;">
     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
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
            <td class="center">X</td>
        </tr>
        <tr class="gradeC">
            <td>Trident</td>
            <td>Internet
                Explorer 5.0
            </td>
            <td>Win 95+</td>
            <td class="center">5</td>
            <td class="center">C</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>Internet
                Explorer 5.5
            </td>
            <td>Win 95+</td>
            <td class="center">5.5</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>Internet
                Explorer 6
            </td>
            <td>Win 98+</td>
            <td class="center">6</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>Internet Explorer 7</td>
            <td>Win XP SP2+</td>
            <td class="center">7</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Trident</td>
            <td>AOL browser (AOL desktop)</td>
            <td>Win XP</td>
            <td class="center">6</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 1.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.7</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 1.5</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 2.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
        </tr>
        </tbody>
        </table>
      </div>
      </div>
      </div>
      <div class="col-md-12">
       <div class="pull-right" style="padding-right:10px;padding-top:10px;">
        <button class="btn btn-info"><i class="fa fa-reply"></i> Recall Previous SY Account's</button>
       </div>
      </div>
   </div>
  </div>
 </div>
</div>

<div class="col-md-4">
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-info"></i> Grade Fee's Information
    </div>
    <div class="tools">
      
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
    <div class="col-md-12">
      <div class="form-group">
          <b><label>School Year: 2016 - 2017</label></b>
      </div>
      <div class="form-group">
       <label>Grade Type</label>
        <select class="form-control input-sm">
         
        </select>
      </div>
      <div class="form-group">
         <label>Grade Level</label>
           <select class="form-control input-sm">
           
           </select>
         </div>
       <div class="form-group">
        <label>Fees</label>
          <select class="form-control input-sm" id="feesSelect">
          <option></option>
          <option value="add-fees">+ Add Fees</option>
        </select>
        </div>
       <div class="form-group">
         <label>Amount</label>
           <input type="text" class="form-control input-sm" name="">
       </div>
       </div>  
      <div class="col-md-12">
      <button class="btn btn-info btn-block"><i class="fa fa-reply"></i> Setup Fee</button>
      </div>
   </div>
  </div>
 </div>
</div>



<div class="modal fade draggable-modal mo-z drag-me" id="add-fees" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Fees</h4>
      </div>
      <div class="modal-body">
        <form id="setupSubject">
         <div class="form-group">
           <label>Reciept Account</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
            <small>
              Note: If you want to add new Charts of Account. Please proceed to Pythagoras Accounting Management System. or click this icon <a href="{{substr_replace(Request::root(), "", -2)}}84" target="_blank"><i class="fa fa-mail-forward"></i></a>
            </small>
          </div>
           <div class="form-group">
           <label>Fee Categories</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
          </div>
          <div class="form-group">
           <label>Fees Name</label>
             <input type="text" class="form-control input-sm" name="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/registrar/save-subject" data-form="setupSubject" data-target="#wyredSaveModal">Save Fees</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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


    $('#setupMenu').addClass('active');
    $('#billingMenu').addClass('active');
    $('#gradelevelfeeMenu').addClass('active');



    $('#summer-div').hide();
    $('#summer-div-request').hide();

    $(".drag-me").draggable({
       handle: ".modal-header"
    });

    $('#year').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#feesSelect').change(function () {
        if ($(this).val() == "add-fees") {
             $('#add-fees').modal({
                show: true
            }); 
        }
         this.value = "";
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