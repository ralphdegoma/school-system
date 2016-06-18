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
          <strong>Payment Type:</strong>
          Albert<br>
          </address>
        </div>
       
       </div>
       <div class="col-md-12">
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#assign-fees"><i class="fa fa-plus"></i>Add Fees</button>
          <div class="col-md-12">
           <table id="" class="table table-striped table-bordered table-hover" style="margin-top:10px" >
                <thead>
                  <tr>
                      <th>Fees</th>
                      <th>Amount</th>
                      <th>Discounts</th>
                      <th>Total</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
          
                </tbody>
          </table>
        </div>
        </div>
         
     </div>
   
   
  </div>
</div>
<!-- END Portlet PORTLET-->
<div class="modal fade draggable-modal mo-z drag-me" id="assign-fees" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Fees</h4>
      </div>
      <div class="modal-body">
        <form id="setupSubject">
         <div class="form-group">
           <label>Grade Type</label>
             <select class="form-control input-sm" id="gradeType" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                
            </select>
          </div>
          <div class="form-group">
             <label>Grade Level</label>
               <select class="form-control input-sm"  name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevels" required>
                    </select>
             </div>
           <div class="form-group">
            <label>Fees</label>
              <select class="form-control input-sm" id="gradeType" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                 
            </select>
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