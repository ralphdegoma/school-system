@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
@include('admin.csslinks.datatables_css')

<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
 <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

@stop

@section('content')

<div class="col-md-4">
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-info"></i>Enrollment Information
    </div>
    <div class="tools">
      
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
    <form id="enroll_form">
    <div class="col-md-12">
    <div class="form-group">
       <label>STUDENT</label>
        <select required name="student_id" class="form-control input-sm students" data-id="student_id" data-name="full_name" data-url="/select-binder/get-students">
          <option></option>
        </select>
      </div>
     <div class="form-group">
       <label>CLASS TYPE</label>
        <select class="form-control input-sm" id="classType" required name="class_type">
          @foreach($classType as $keyVal)
          <option value="{{$keyVal->class_type_id}}">{{$keyVal->class_type}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
       <label>GRADE TYPE</label>
        <select class="form-control input-sm gradeType" required name="grade_type">
          @foreach($gradeType as $keyVal)
          <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
         @endforeach
        </select>
      </div>
     <div class="form-group">
       <label>GRADE LEVEL</label>
        <select  class="form-control input-sm grade-level" name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" required>
          <option></option>
        </select>
      </div>
       <div class="form-group">
       <label>TIME</label>
        <select  class="form-control input-sm section-time" name="time" data-id="time" data-name="time" data-url="/select-binder/get-section-time" required>
          <option></option>
        </select>
      </div>
       <div class="form-group">
       <label>SECTION</label>
        <select  class="form-control input-sm section" id="schedule_id" name="schedule_id" data-id="schedule_id" onchange="enrollmentTable()" data-name="section_name" data-url="/select-binder/get-section" required> 
          <option></option>
        </select>
      </div>
<!--       <div class="form-group">
       <label>REQUIREMENTS</label>
        <select class="form-control input-sm">
          <option></option>
        </select>
      </div> -->
       </div>  
       </form>
      <div class="col-md-12">
      <button class="btn btn-info btn-block wyredModalCallback" data-toggle="modal"  data-url="/admin/sms/new-enroll" data-form="enroll_form" data-target="#wyredSaveModal"><i class="fa fa-child"></i> ENROLL STUDENT</button>
      </div>
   </div>
  </div>
 </div>
</div>





<div class="col-md-8">
  <div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-user"></i>ENROLLED STUDENT'S
    </div>
    <div class="tools">
    <a href="#" data-toggle="modal" data-target="#request-slot"><i class="fa fa-child" style="color:#FFFFFF"></i></a> SLOT 0/50
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
     <div class="col-md-4">
   <h5>Class Adviser: Hossana Mae Farsario</h5>
   </div>
   <div class="col-md-4">
   <h5>Section Name: Crack Section</h5>
   </div>
   <div class="col-md-4">
   <h5>Section Type: Crack Section</h5>
   </div>
    <div class="col-md-12">
    <div style="height: 425px;overflow-y: scroll;">
     <div class="table-responsive">
        <table id="enrollee-table" class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>ID NO</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Date Enrolled</th>
            <th>Remove</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX">
            <td></td>
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
 </div>
</div>


<div class="modal fade draggable-modal mo-z drag-me" id="request-slot" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Request Slot</h4>
      </div>
      <div class="modal-body">
        <form id="setupSubject">
          <div class="form-group">
           <label>SLOT</label>
           <input type="number" class="form-control input-sm" name="">
          </div>
          <div class="form-group">
           <label>NOTE</label>
           <textarea rows="2" class="form-control input-sm" placeholder="Specify Request"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/registrar/save-subject" data-form="setupSubject" data-target="#wyredSaveModal">Send Request</button>
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
<!-- Date range picker -->
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>

    
<script>

function enrollmentTable(){


    $('#enrollee-table').dataTable().fnClearTable();
    $("#enrollee-table").dataTable().fnDestroy();
    schedule_id = $('#schedule_id').val();

          EnrolleeTable = $('#enrollee-table').DataTable({
          responsive: true,
          bAutoWidth:false,

          "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            nRow.setAttribute('data-id',aData.row_id);
            nRow.setAttribute('class','ref_provider_info_class');
          },

          "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
            oSettings.jqXHR = $.ajax( {
              "dataType": 'json',
              "type": "GET",
              "url": sSource,
              "data": aoData,
              "success": function (data) {
                EnrolleeTableData = data;
                console.log(EnrolleeTableData);
                fnCallback(EnrolleeTableData);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/enrolled-students?schedule_id="+schedule_id,
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,
          "columns": [
             
    
              { "mData": "student_id", sDefaultContent: ""},
              { "mRender" : function ( data, type, full ) { 
                        console.log(full);
                        return full.schedule.student_schedule.students.last_name + ", " + full.schedule.student_schedule.students.first_name + " " +full.schedule.student_schedule.students.first_name + " " + full.schedule.student_schedule.students.name_extension; 
              }
              },

              { "mData": "schedule.student_schedule.students.gender", sDefaultContent: ""},
              { "mData": "schedule.created_at", sDefaultContent: ""},
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove-section/'+oData.seminar_id+'" class="btn btn-danger btn-block btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                }
              },  

              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/admin/student/'+oData.student_id+'/edit" class="btn btn-info btn-block btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                }
              },  
          ]
      });
}

$('.gradeType').change(function(){
      var selValue = $(this).val();
      $('.grade-level').select_binder(selValue);
});

$('.grade-level').change(function(){
      var selValue = $(this).val();
      $('.section-time').select_binder(selValue);
});

$('.section-time').change(function(){
      var selValue = $(this).val();
      $('.section').select_binder(selValue);
});

$(document).ready(function(){

    $('.students').select_binder();


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