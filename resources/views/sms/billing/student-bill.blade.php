@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
@stop

@section('content')



<div class="col-md-12">
  <div class="portlet box red">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-desktop"></i> Enrollment Details
      </div>
      <div class="tools">
         
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       
        <div class="col-md-6">
         <div class="form-group">
           <label>Student Status</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
          </div>
           <div class="form-group">
           <label>Student Name</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
          </div>
       </div>
       <div class="col-md-6">
       <div class="well">
          <address>
          <strong>School Year: 2016 - 2017</strong><br>
          </address>
          <address>
          <strong>Student ID:</strong>
          Ralph Degoma<br>
          <strong>Full Name:</strong>
          Ralph Degoma<br>
          <strong>Grade Level:</strong>
          Grade 10<br>
          <strong>Section Name:</strong>
          Albert<br>
          <strong> Payment Type:</strong>
          Albert<br>
          </address>
        </div>
       
       </div>
       <div class="col-md-12">
           <table id="" class="table table-striped table-bordered" >
                <thead>
                  <tr>
                      <th>Fees</th>
                      <th>Amount</th>
                      <th>Discounts</th>
                      <th>Payments</th>
                      <th>Balances</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                 
                <tr>
                        <td></td>
                        <td></td>
                        <td contenteditable="true"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                </tbody>
          </table>
        </div>
        <div class="col-md-12">
           <div class="tabbable-line">
                  <ul class="nav nav-tabs ">
                    <li class="active">
                      <a href="#tab_15_1" data-toggle="tab">
                      Payments </a>
                    </li>
                    <li>
                      <a href="#tab_15_2" data-toggle="tab">
                      Promissories Record </a>
                    </li>
                   
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_15_1">
                       <h2>Payments</h2>
                       <table id="" class="table table-striped table-bordered" >
                            <thead>
                              <tr>
                                  <th>Date</th>
                                  <th>OR No</th>
                                  <th>Amount</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                             
                            <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
                            </tbody>
                      </table>

                      <h4>[ Item Options ]</h4>
                      <a href="#" class="btn blue-madison" data-toggle="modal" data-target="#new-payment"> [ Shift + N ] New Payments <i class="fa fa-cube"></i></a>
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#reset-products"> [ Shift + A ] Current Dues <i class="fa fa-calendar"></i></a>
                      <a href="#" class="btn purple-plum "> [ Shift + P ] Print OR No. Items <i class="fa fa-print"></i></a>
                    </div>
                    <div class="tab-pane" id="tab_15_2">
                         <h2>Promissories Record</h2>
                         <table id="" class="table table-striped table-bordered" >
                              <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Discounts</th>
                                    <th>Promised Date</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                              <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                              </tr>
                              </tbody>
                        </table>

                        <a class="btn green" href="ui_tabs_accordions_navs.html#tab_15_2" target="_blank">
                       Add New Promissory</a>
                      
                    </div>
                    
                  </div>
                </div>
      
   
     </div>
   
   
  </div>
</div>


<!-- END Portlet PORTLET-->
<div class="modal fade draggable-modal mo-z drag-me" id="new-payment" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Fees</h4>
      </div>
      <div class="modal-body">
        <form id="setupSubject">
        <div class="row">
          <div class="col-md-4">
              <div class="form-group">
               <label>OR No</label>
               <input type="text" class="form-control input-sm" name="">
              </div>
          </div>
           <div class="col-md-12">
           <table id="" class="table table-striped table-bordered" >
                <thead>
                  <tr>
                      <th>Fees</th>
                      <th>Amount</th>
                      <th>Balances</th>
                      <th>Amount Paid</th>
                  </tr>
                </thead>
                <tbody>
                 
                <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td contenteditable="true"></td>
                </tr>
                  <tr>
                    <td colspan="1" style="background:#FFFFFF;border: 1px solid #FFFFFF;"></td>
                    <td><b>OR TOTAL:</b></td>
                  </tr>
                </tbody>
          </table>
        </div>
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
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Clock picker -->
<script src="/assets/js/plugins/clockpicker/clockpicker.js"></script>
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>


<script>
 $(document).ready(function(){

     $(".drag-me").draggable({
       handle: ".modal-header"
      });

    $('#customizeSched').hide();
    $('#setEmpFlexySched').hide();

    $('#fixedOption').change(function(){
      if(this.checked == true){
         $('#customizeSched').hide();
         $('#fixedSched').show();
      }else {
         $('#customizeSched').show();
         $('#fixedSched').hide();
      }
    });

     $('#customizeOption').change(function(){
      if(this.checked == true){
         $('#customizeSched').show();
         $('#fixedSched').hide();
      }else {
         $('#customizeSched').hide();
         $('#fixedSched').show();
      }
    });

    $('#schedType').change(function(){
      if(this.value == '1'){
         $('#setEmpFlexySched').show();
      }else if(this.value == '2'){
        $('#setEmpFlexySched').hide();
      }
    });

      $('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
    });

    $('.customize .input-group.date').datepicker({
      startView: 2,
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true
    });

    $('.default .input-group.date').datepicker({
    format: "mm/dd"
    });
  

 });
</script>

    
@stop