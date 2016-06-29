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
        <i class="fa fa-desktop"></i> Assessment Details
      </div>
      <div class="tools">
         
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       
        <div class="col-md-6">
       <!--   <div class="form-group">
           <label>Student Status</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
          </div> -->
           <div class="form-group">
           <label>Student Name</label>
            <select class="form-control input-sm student">
              <option></option>
              @foreach($students as $student)
                    <option value="{{$student->student_id}}">{{$student->last_name}}, {{$student->first_name}} {{$student->middle_name}} </option>
              @endforeach
            </select>
          </div>
         <!--   <div class="form-group">
           <label>Payment Option</label>
            
          </div> -->
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
          </address>
        </div>
       
       </div>
       <div class="col-md-12 asssessment-table">
           <table id="" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                      <th>Fees</th>
                      <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                 
                <tr contenteditable="true">
                        <td></td>
                        <td></td>
                </tr>
          
                </tbody>
          </table>
          <a href="#" class="btn blue-madison" data-toggle="modal" data-target="#new-payment"> [ Shift + A ] Generate Assessment <i class="fa fa-cube"></i></a>
        </div>
         
     </div>
   
   
  </div>
</div>
<!-- END Portlet PORTLET-->
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
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Clock picker -->
<script src="/assets/js/plugins/clockpicker/clockpicker.js"></script>
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>


<script>

    $('.student').change(function(){
          var student_id = this.value;
          displayAssessment(student_id);
    }); 


    function displayAssessment(student_id){

        $.get( "/sms/get-assessments", function( data ) {
            $( ".asssessment-table" ).html( data );
        });

    }
</script>

    
@stop