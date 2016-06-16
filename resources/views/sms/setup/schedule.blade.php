@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
@include('admin.csslinks.datatables_css')

<link href="/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<style type="text/css">
  
  .popover.bottom {
    margin-top: 10px;
    z-index: 999999;
}

</style>

@stop

@section('content')



<div class="col-md-12">
  <div class="portlet box red">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i> Fees List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-schedule"><i class="fa fa-plus"></i> ADD NEW SCHEDULE</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
            <div class="table-responsive">
              <table id="schedule_table" class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <tr>
                    <th>More</th>
                    <th>GRADE LEVEL</th>
                    <th>SECTION NAME</th>
                    <th>SCHOOL YEAR</th>
                    <th>REMOVE</th>
                    <th>EDIT</th>
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




<div class="modal fade draggable-modal mo-z drag-me" id="add-schedule" role="basic"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Request Slot</h4>
      </div>
      <div class="modal-body">
        <form id="subject_saving_with_section">
         <div class="row">
          <div class="col-md-6">
               <div class="form-group">
                 <label>SCHOOL YEAR</label>
                  <select class="form-control input-sm" name="school_year_id">
                   @foreach($schoolYear as $keyVal)
                    <option value="{{$keyVal->school_year_id}}">{{$keyVal->sy_from}} - {{$keyVal->sy_to}}</option>
                   @endforeach
                  </select>
              </div>
               <div class="form-group">
                 <label>CLASS TYPE</label>
                  <select class="form-control input-sm" name="class_type_id" id="classType">
                    @foreach($classType as $keyVal)
                      <option value="{{$keyVal->class_type_id}}">{{$keyVal->class_type}}</option>
                     @endforeach
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE TYPE</label>
                  <select class="form-control input-sm gradeType" >
                     @foreach($gradeType as $keyVal)
                      <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                     @endforeach
                  </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm gradelevel" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel">
                    <option ></option>
                  </select>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>SECTION NAME</label>
                  <select class="form-control input-sm sectionName" name="section_id" data-id="section_id" data-name="section_name" data-url="/select-binder/get-sectionName"> 
                    <option ></option>
                  </select>
               </div>
               <div class="form-group">
                 <label>CLASS ADVISER</label>
                  <select class="form-control input-sm kronosEmployees" name="adviser" data-id="employee_id" data-name="first_name" data-url="/select-binder/get-KronosEmployee">
                    <option ></option>
                  </select>
               </div>
                <div class="form-group">
                 <label>SLOT</label>
                  <input type="number" class="form-control input-sm"  name="slot" id="slot">
                </div>
              
              </div>

              <div class="col-md-12">
                     <div class="class-schedule" style="z-index: 99999">
                <div class="form-group">
                 <label>Start Time</label>
                   <label>
                    <input type="radio" checked  value="AM" name="section_start_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio"  value="PM" name="section_start_time_type" >
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="09:30" name="section_start_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                 <div class="form-group">
                 <label>End Time</label>
                   <label>
                    <input type="radio"   value="AM" name="section_end_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" checked  value="PM" name="section_end_time_type">
                    PM 
                  </label>
                  <div class="input-group clockpicker" data-autoclose="true">
                      <input type="text" class="form-control" value="09:30" name="section_end_time">
                      <span class="input-group-addon">
                          <span class="fa fa-clock-o"></span>
                      </span>
                  </div>
                </div>
                </div>
              </div>
               <div class="col-md-12" id="section_subjects" style="margin-top:20px;max-height: 500px; overflow-y:scroll;background-color: #FAFAFA ">
               </div> 

          </form>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/academics/assign-subjects/to-sections" data-form="subject_saving_with_section" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>








<div class="modal fade draggable-modal mo-z drag-me" id="edit-schedule" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Request Slot</h4>
      </div>
      <div class="modal-body">
        <form id="subject_updating_with_section">
         <div class="row">
          <div class="col-md-6">
               <div class="form-group">
                  <input type="hidden" class="form-control input-sm "   name="schedule_id" id="edit_schedule_id">
                  <input type="hidden" class="form-control input-sm edit_section_id"   name="section_id" >
                 <label>SCHOOL YEAR</label>
                  <select class="form-control input-sm"  name="school_year_id" id="edit_school_year_id">
                   @foreach($schoolYear as $keyVal)
                    <option value="{{$keyVal->school_year_id}}">{{$keyVal->sy_from}} - {{$keyVal->sy_to}}</option>
                   @endforeach
                  </select>
              </div>
               <div class="form-group">
                 <label>CLASS TYPE</label>
                  <select class="form-control input-sm"  name="class_type_id" id="edit_class_type">
                    @foreach($classType as $keyVal)
                      <option value="{{$keyVal->class_type_id}}">{{$keyVal->class_type}}</option>
                     @endforeach
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE TYPE</label>
                  <select class="form-control input-sm gradeType"   id="edit_grade_type">
                     @foreach($gradeType as $keyVal)
                      <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                     @endforeach
                  </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm gradelevel"  id="edit_grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel">
                    <option ></option>
                  </select>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                 <label>SECTION NAME</label>
                  <select class="form-control input-sm sectionName edit_section_id"  data-id="section_id" data-name="section_name" data-url="/select-binder/get-sectionName"> 
                    <option ></option>
                  </select>
               </div>
               <div class="form-group">
                 <label>CLASS ADVISER</label>
                  <select class="form-control input-sm kronosEmployees"  id="edit_adviser" name="adviser" data-id="employee_id" data-name="first_name" data-url="/select-binder/get-KronosEmployee">
                    <option ></option>
                  </select>
               </div>
                <div class="form-group">
                 <label>SLOT</label>
                  <input type="number" class="form-control input-sm"  name="slot" id="edit_slot">
                </div>
               

              </div>

               <div class="col-md-12" id="edit_section_subjects" style="margin-top:20px;">
               </div> 

          </form>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/academics/assign-subjects/to-sections" data-form="subject_updating_with_section" data-target="#wyredSaveModal">SAVE</button>
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

    scheduleDataTable();
    $('#setupMenu').addClass('active');
    $('#academicsMenu').addClass('active');
    $('#scheduleMenu').addClass('active');
    $('.kronosEmployees').select_binder();

});

$('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
});
   
$('#edit-schedule, #add-schedule').on('hidden.bs.modal',function(){
        $('#edit_schedule_id').val('');
        $('.edit_section_id').val('');
        scheduleDataTable();
});


$('.gradeType').change(function(){
      var selValue = $(this).val();
      $('.gradelevel').select_binder(selValue);
});

$('.gradelevel').change(function(){
      var selValue = $(this).val();
      $('.sectionName').select_binder(selValue);
      getSubjectsWithFilters();//call change of subjects
});

$('.sectionName').change(function(){
      getSubjectsWithFilters();//call change of subjects
});


function getSubjectsWithFilters(){

      var gradelevel = $('.gradelevel').val();
      var sectionName = $('.sectionName').val();

      $.ajax({
            url: "/sms/get-subjects/with-filters?gradelevel="+gradelevel+"&sectionName="+sectionName,
            type: 'GET',
            async: true,
            success:function(data){
                
                var response = $(data).find('#section_subjects');
                console.log(response);
                $('#section_subjects').html(data);
                  
            }

      });
      
}


function changeGradeLevelSubject(){

      var selInst = $('#gradeLevelSubject');
      
      var selValue = $('#gradeTypeSubject').val();

      $('#gradeLevelSubject').select_binder(selValue);

      //orgBinder(selInst,selValue);
}


  function scheduleDataTable(){
      
      $('#schedule_table').dataTable().fnClearTable();
      $("#schedule_table").dataTable().fnDestroy();

          schedule_table_row = $('#schedule_table').DataTable({
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
                schedule_table_data = data;
                console.log(schedule_table_data);
                fnCallback(schedule_table_data);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/setup/academics/schedules",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             
              {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
              },
              { "mData": "rf_section.get_grade_level.grade_level", sDefaultContent: ""},
              { "mData": "rf_section.section_name", sDefaultContent: ""},
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html(oData.rf_school_year.sy_from+ " - "+oData.rf_school_year.sy_to);
              }
              },
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.school_year_id+'" data-url="/softdelete/deleteSchoolYear" class="btn btn-danger btn-sm w-b "><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
              }
              },  
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" data-target="#edit-schedule" onclick="editSchedule('+oData.row_id+')" class="btn btn-info btn-sm w-b "><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
              }
              },  
          ]
      });

    }

    $('#schedule_table tbody').on('click', 'td.details-control', function () {
      
      var tr = $(this).closest('tr');
      var row = schedule_table_row.row( tr );
      var row_id = $(tr).attr("data-id");
      
      if ( row.child.isShown() ) {
            
        $('div.slider', row.child()).slideUp( function () {
            row.child.hide();
            tr.removeClass('shown');
        } );
        }
        else {
            // Open this row
            var prop_id_name = $(tr).attr("data-id");
            row.child( format(row_id)).show();
            $('div.slider', row.child()).slideDown();
            tr.addClass('shown');

            console.log(schedule_table_data[row_id]);
            listOfSchedules(row_id);
            //ref_serial(prop_id_namse);
        }
    });

  function format (row_id) {

              return '<div class="sliderHolder"><div class="slider" id='+row_id+' >'+
                    
              '</div></div>';  

              
  } 

  function listOfSchedules(row_id){

      var schedule_id = schedule_table_data[row_id].schedule_id;

      $.ajax({
          url: '/sms/get-list-schedules?schedule_id='+schedule_id+"&update=false",
          type: 'GET',
          processData: false,
          contentType: false,
          success:function(data){

              $('#'+row_id).html(data);
        
          },
            error: function (error) {
            return false;
            }
      });

  }


  function editSchedule(row_id){

      $('#edit_schedule_id').val(schedule_table_data[row_id].schedule_id);
      $('#edit_school_year_id').val(schedule_table_data[row_id].school_year_id).change();
      $('#edit_class_type').val(schedule_table_data[row_id].class_type_id).change();
      $('#edit_grade_type').val(schedule_table_data[row_id].rf_section.get_grade_level.grade_type_id).change();
      $('#edit_grade_level').val(schedule_table_data[row_id].rf_section.grade_level_id).change();
      $('.edit_section_id').val(schedule_table_data[row_id].section_id).change();
      $('#edit_adviser').val(schedule_table_data[row_id].employee_id);
      $('#edit_slot').val(schedule_table_data[row_id].slot);
      


      getHandleSubjectList(row_id);
  }

  function getHandleSubjectList(row_id){

      var schedule_id = schedule_table_data[row_id].schedule_id;

      $.ajax({
          url: '/sms/get-list-schedules?schedule_id='+schedule_id+"&update=true",
          type: 'GET',
          processData: false,
          contentType: false,
          success:function(data){

              $('#edit_section_subjects').html(data);
        
          },
            error: function (error) {
            return false;
            }
      });
  }
</script>

    
@stop