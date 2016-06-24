@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')

<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<link href="/assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

<style>
.popover.bottom {
    margin-top: 10px;
    z-index: 999999;
}
.w-b {
  height:30px!important;
}

#subjectTable td {
  text-transform:uppercase;
}
#gradeTable td {
  text-transform:uppercase;
}
.class-schedule {
    background: #E6E6E6!important;
    height: auto;
    width: 100%;
    padding: 20px 20px 20px 20px;
}
</style>
@stop

@section('content')

<div class="col-md-12">
<div class="portlet box red">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-cogs"></i>Modal Dialogs
              </div>
              <div class="tools">

              </div>
            </div>
            <div class="portlet-body">
              <div class="row" >
              <div class="col-md-12">
         <div class="tabs-container">

        <div class="tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#gradeLevel"> GRADE LEVEL</a></li>
                <li class=""><a data-toggle="tab" href="#section"> SECTION</a></li>
                <li class=""><a data-toggle="tab" href="#schoolYear"> SCHOOL YEAR</a></li>
                <li class=""><a data-toggle="tab" href="#subject"> SUBJECT</a></li>
                <li class=""><a data-toggle="tab" href="#assign-subject"> ASSIGN SUBJECT</a></li>
                <li class=""><a data-toggle="tab" href="#schedule"> SCHEDULE</a></li>
            </ul>
            <div class="tab-content ">
                <div id="gradeLevel" class="tab-pane active">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#add-grade-level"><i class="fa fa-plus"></i> ADD NEW GRADE LEVEL</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="gradeTable" class="table table-striped table-bordered table-hover" >
                              <thead>
                                <tr>
                                    <th>GRADE CODE</th>
                                    <th>GRADE LEVEL</th>
                                    <th>GRADE TYPE</th>
                                    <th>ACTION</th>
                                    <th>ACTION</th>
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
                <div id="section" class="tab-pane">
                    <div class="panel-body">
                      <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-section"><i class="fa fa-plus"></i> ADD NEW SECTION</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="sectionTable" class="table table-striped table-bordered table-hover dataTables-example" >
                              <thead>
                                <tr>
                                    <th>SECTION CODE</th>
                                    <th>GRADE LEVEL</th>
                                    <th>SECTION NAME</th>
                                    <th>SECTION TYPE</th>
                                    <th class="text-center">ACTION</th>
                                    <th></th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr class="gradeX">
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="center"></td>
                                  <td class="center"></td>
                              </tr>
                              </tbody>
                              </table>
                            </div>
                          </div>
                    </div>
                </div>
                <div id="schoolYear" class="tab-pane">
                    <div class="panel-body">
                      <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-school-year"><i class="fa fa-plus"></i>ADD NEW SCHOOL YEAR</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="schoolYearTable" class="table table-striped table-bordered table-hover" >
                              <thead>
                                <tr>
                                    <th>YEAR CODE</th>
                                    <th>FROM</th>
                                    <th>TO</th>
                                    <th>ACTION</th>
                                    <th>ACTION</th>
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
                <div id="subject" class="tab-pane">
                    <div class="panel-body">
                      <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-subject"><i class="fa fa-plus"></i> ADD NEW SUBJECT</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="subjectTable" class="table table-striped table-bordered table-hover " >
                              <thead>
                                <tr>
                                    <th>SUBJECT CODE</th>
                                    <th>SUBJECT NAME</th>
                                    <th>ACTION</th>
                                    <th>ACTION</th>
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
                            </div>
                          </div>
                    </div>
                </div>
                <div id="assign-subject" class="tab-pane" >
                    <div class="panel-body">
                      <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-assignsubject"><i class="fa fa-plus"></i> ASSIGN NEW SUBJECT</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="assignTable" class="table table-striped table-bordered table-hover " >
                              <thead>
                                <tr>
                                    <th>SUBJECT CODE</th>
                                    <th>SUBJECT</th>
                                    <th>GRADE LEVEL</th>
                                    <th>SECTION TYPE</th>
                                    <th>ACTION</th>
                                    <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr>
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
                 <div id="schedule" class="tab-pane">
                    <div class="panel-body">
                      <div class="col-md-12">
                           <div class="wyred-box-header-2">
                              <div class="pull-right pull-bottom">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-schedule"><i class="fa fa-plus"></i> ADD NEW SCHEDULE</button>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover dataTables-example" >
                              <thead>
                                <tr>
                                <th></th>
                                    <th>SCHEDULE CODE</th>
                                    <th>GRADE LEVEL</th>
                                    <th>SECTION NAME</th>
                                    <th>SCHOOL YEAR</th>
                                    <th class="text-center" colspan="2">ACTION</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr class="gradeX">
                              <td></td>
                                  <td>Trident</td>
                                   <td>Trident</td>
                                    <td>Trident</td>
                                  <td>Internet
                                      Explorer 4.0
                                  </td>
                                  <td class="center">
                                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#enrolled-student"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>
                                  </td>
                                  <td class="center">
                                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#enrolled-student"><b class="pull-left"><i class="fa fa-pencil"></i></b> <b class="pull-right">EDIT</b></button>
                                  </td>
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
     
  </div>
            </div>
          </div>
</div>
</div>



<div class="modal fade draggable-modal mo-z drag-me" id="add-grade-level" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Request Slot</h4>
      </div>
      <div class="modal-body">
        <form id="setupGradeLevel">
         <div class="form-group">
                 <label>GRADE TYPE</label>
                  <select class="form-control input-sm" name="class_type">
                    @foreach($gradeType as $keyVal)
                      <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                    @endforeach
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <input type="text" class="form-control input-sm" name="grade_level" required>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal"  data-url="/sms/registrar/save-grade-level" data-form="setupGradeLevel" data-target="#wyredSaveModal" id="gradeTableFunc()">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade draggable-modal mo-z drag-me" id="add-section" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Request Slot</h4>
      </div>
      <div class="modal-body">
        <form id="addSection">
         <div class="form-group">
                <label>GRADE TYPE</label>
               <select class="form-control input-sm" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                <option></option>
                   @foreach($gradeType as $keyVal)
                    <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                   @endforeach
                </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm" name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevels" required>
                </select>
                </div>
               <div class="form-group">
                 <label>SECTION TYPE</label>
                 <select class="form-control input-sm" name="sectionType">
                    @foreach($sectionType as $keyVal)
                      <option value="{{$keyVal->section_type_id}}">{{$keyVal->section_type}}</option>
                     @endforeach
                  </select>
              </div>
               <div class="form-group">
                 <label>SECTION NAME</label>
                  <input type="text" class="form-control input-sm" name="section_name" required>
                </div>
               </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal"  data-url="/sms/registrar/save-section" data-form="addSection" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade draggable-modal mo-z drag-me" id="add-school-year" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">School Year</h4>
      </div>
      <div class="modal-body">
        <form id="setupSchoolYear">
           <div class="form-group">
                  <label>FROM</label>
                  <div class="input-group date">
                    <span class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control input-sm" name="syFrom" id="syFrom" maxlength="4" required="">
                  </div>
              </div>
               <div class="form-group">
                  <label>TO</label>
                  <div class="input-group date">
                    <span class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control input-sm" name="syTo" id="syTo" maxlength="4" required="">
                  </div>
              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal"  data-url="/sms/registrar/save-school-year" data-form="setupSchoolYear" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade draggable-modal mo-z drag-me" id="add-subject" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Subect</h4>
      </div>
      <div class="modal-body">
        <form id="addSubject">
          <div class="form-group">
             <label>SUBJECT NAME</label>
              <input type="text" class="form-control input-sm" name="subjectName">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal"  data-url="/sms/registrar/save-subject" data-form="addSubject" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




<div class="modal fade draggable-modal mo-z drag-me" id="add-assignsubject"  role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Assign Subject</h4>
      </div>
      <div class="modal-body">
          <form id="setupSubject">
          <div class="form-group">
               <label>GRADE TYPE</label>
               <select class="form-control input-sm" name="gradeTypeSubject" onchange="changeGradeLevelSubject()" id="gradeTypeSubject" required>
                <option></option>
                   @foreach($gradeType as $keyVal)
                    <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                   @endforeach
                </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm" name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevelSubject" required>
                </select>
                </div>
                <div class="form-group">
                 <label>Section Type</label>
                  <select class="form-control input-sm" name="section_type" required>
                        <option value="all">All except Summer</option>
                    @foreach($sectionType as $section)
                        <option value="{{$section->section_type_id}}">{{$section->section_type}}</option>
                    @endforeach
                </select>
                </div>
                 <div class="form-group">
                 <label>SUBJECT</label>
                  <select class="form-control input-sm select2" multiple="multiple" name="gradeSubject[]" id="gradeLevel" required>
                  @foreach($subject as $subjects)
                    <option value="{{$subjects->subject_id}}">{{$subjects->subject_name}}</option>
                  @endforeach
                  </select>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
       <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/registrar/assign-subject" data-form="setupSubject" data-target="#wyredSaveModal">SAVE</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>







<div class="modal fade draggable-modal mo-z drag-me" id="add-schedule" tabindex="-1" role="basic" aria-hidden="true">
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
               <div class="class-schedule">
                <div class="form-group">
                 <label>Start Time</label>
                   <label>
                    <input type="radio" checked class="clockpicker" value="AM" name="section_start_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" class="clockpicker" value="PM" name="section_start_time_type" >
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
                    <input type="radio"  class="clockpicker" value="AM" name="section_end_time_type">
                    AM 
                  </label>
                  <label>
                    <input type="radio" checked class="clockpicker" value="PM" name="section_end_time_type">
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

               <div class="col-md-12" id="section_subjects" style="margin-top:20px;">
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






@stop
@section('js_filtered')
@include('admin.jslinks.js_datatables')
@include('admin.jslinks.js_crud')

<!-- Date range picker -->
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>
<!-- Clock picker -->
<script src="/assets/js/plugins/clockpicker/clockpicker.js"></script>
    
<script>
$(document).ready(function(){

    $('.kronosEmployees').select_binder();
    $('#summer-div').hide();
    $('#sec-div-sub').hide();


    //TABLE FUNCTIONS
    gradeTableFunc();
    schoolYearFunc();
    
    subjectTableFunc();
    sectionTableFunc();
    assignTableFunc();

    $('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
    });
   
    $('#syFrom').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#syTo').datepicker( {
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
    $('#available-sub').change(function(){
      if(this.checked == true){
          $('#sec-div-sub').hide();
      }else {
         $('#sec-div-sub').show();
      }
    });

    $("#syFrom").keydown(function (e) {
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
    $("#syTo").keydown(function (e) {
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

     $("#slot").keydown(function (e) {
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

      

      $('#add-grade-level').on('hidden.bs.modal',function(){
        gradeTableFunc();
      });

      $('#add-school-year').on('hidden.bs.modal',function(){
        schoolYearFunc();
      });

       $('#add-section').on('hidden.bs.modal',function(){
        sectionTableFunc();
      });

      $('#add-subject').on('hidden.bs.modal',function(){
        subjectTableFunc();
      });

    function gradeTableFunc(){
      
      $('#gradeTable').dataTable().fnClearTable();
      $("#gradeTable").dataTable().fnDestroy();

          var farmer_table = $('#gradeTable').DataTable({
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
                farmer_data = data;
                console.log(farmer_data);
                fnCallback(farmer_data);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/getgrade",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "grade_level_id", sDefaultContent: ""},

               { "mData": "grade_level", sDefaultContent: ""},
                { "mData": "get_grade_type.grade_type", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove/grade-level/'+oData.grade_level_id+'" class="btn btn-danger btn-sm w-b laddaRemove" data-grade-level-id="'+oData.grade_level_id+'"data-toggle="modal" data-target="#wyredSaveModal" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

        $('#farmerList tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = farmer_table.row( tr );
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
                  //ref_serial(prop_id_name);
              }

          } );
    
    }

    function schoolYearFunc(){
      
      $('#schoolYearTable').dataTable().fnClearTable();
      $("#schoolYearTable").dataTable().fnDestroy();

          var schoolYearTable = $('#schoolYearTable').DataTable({
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
                schoolYearTable = data;
                console.log(schoolYearTable);
                fnCallback(schoolYearTable);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/year",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "school_year_id", sDefaultContent: ""},

               { "mData": "sy_from", sDefaultContent: ""},
                { "mData": "sy_to", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-renove/'+oData.seminar_id+'" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }
     function schoolYearFunc(){
      
      $('#schoolYearTable').dataTable().fnClearTable();
      $("#schoolYearTable").dataTable().fnDestroy();

          var schoolYearTable = $('#schoolYearTable').DataTable({
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
                schoolYearTable = data;
                console.log(schoolYearTable);
                fnCallback(schoolYearTable);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/year",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "school_year_id", sDefaultContent: ""},

               { "mData": "sy_from", sDefaultContent: ""},
                { "mData": "sy_to", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-renove/'+oData.seminar_id+'" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }


     function sectionTableFunc(){
      
      $('#sectionTable').dataTable().fnClearTable();
      $("#sectionTable").dataTable().fnDestroy();

          var subjectTable = $('#sectionTable').DataTable({
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
                subjectTable = data;
                console.log(subjectTable);
                fnCallback(subjectTable);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/get-section",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "section_id", sDefaultContent: ""},

               { "mData": "get_grade_level.grade_level", sDefaultContent: ""},

               { "mData": "section_name", sDefaultContent: ""},

               { "mData": "get_section_type.section_type", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove-section/'+oData.seminar_id+'" class="btn btn-danger btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }

    function assignTableFunc(){
      
      $('#assignTable').dataTable().fnClearTable();
      $("#assignTable").dataTable().fnDestroy();

          var subjectTable = $('#assignTable').DataTable({
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
                subjectTable = data;
                console.log(subjectTable);
                fnCallback(subjectTable);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/get-assign-subject",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "get_subjects.subject_id", sDefaultContent: ""},

               { "mData": "get_subjects.subject_name", sDefaultContent: ""},

               { "mData": "get_grade_level.grade_level", sDefaultContent: ""},

               { "mData": "get_section_type.section_type", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove-section/'+oData.seminar_id+'" class="btn btn-danger btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }

    function format (row_id) {

               return '<div class="sliderHolder"><div class="slider" style="">'+
                '<div class="list-group" style="margin-top:20px;background-color:#FFFFFF;">'+
                  '<a href="#" class="list-group-item active" style="text-align:left">DETAILED INFORMATION</a>'+
                  '<a href="#" class="list-group-item "><b>Full Name </b>: '+removeNull(farmer_data[row_id].last_name)+ " "+ removeNull(farmer_data[row_id].first_name)+", "+removeNull(farmer_data[row_id].middle_name)+'</a>'+
                  '<a href="#" class="list-group-item "><b>Age </b>: '+ removeNull(farmer_data[row_id].age) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Gender </b>: '+ removeNull(farmer_data[row_id].gender) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Religion </b>: '+ removeNull(farmer_data[row_id].religion_name) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Spouse(if any) </b>: '+ removeNull(farmer_data[row_id].spouse) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Organization </b>: '+ removeNull(farmer_data[row_id].organization_name) +'</a>'+
                '</div>'+
              '</div></div>';  
      // return '<ul  class=" table table-bordered table-stripes">'+
      //         '<li>TVET Provider Address</li>'+
      //         '<li>Region:'+ ' ' +ref_provider_table[row_id].region_name+'</li>'+
      //         '<li>Province:'+ ' ' +ref_provider_table[row_id].province_name+'</li>'+
      //         '<li>District:'+ ' ' +ref_provider_table[row_id].district_name+'</li>'+
      //         '<li>Municipality:'+ ' ' +ref_provider_table[row_id].munipality_name+'</li>'+
      //         '<li>Address:'+ ' ' +ref_provider_table[row_id].address+'</li>'+
      //       '</ul>';
    }


    
  $(function() {


       $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
        });

            $(document).on('click','.laddaRemove',function(e){
              e.preventDefault();
              
              
              var button    = $(this);
              var url       = $(this).attr('data-url');
              var form      = $(this).parents('form:first');
              var data_id        = $(this).attr('data-grade-level-id');
              console.log(button);

              $('#loading').show();

              $.ajax( {

              url: url,
              type: 'POST',
              processData: false,
              contentType: false,
              success:function(data){
               
                  
                  if(data[0] == true){
                    success('alert_message',data[1]);
                    $(button).parents('tr').fadeOut("slow");
                    //$(form)[0].reset();
                  }else if(data[0] == false){

                    fail('alert_message',data[1]);

                  }

                  var oldVal = $(button).val();
                  $(button).val("Processing Please wait");
                  $(button).addClass("disabled");


                  setTimeout(function(){
                    
                  $(button).val(oldVal);
                  $(button).removeClass("disabled");

            }, 3000)

   
            },
              error: function (error) {
             
                $('#error').show();
                $('#loading').hide();
              return false;
              }

            });

          });
        });

function removeNull(Val){
  if(Val == null){
    return "";
  }else{
    return Val;
  }
} 

function changeGradeLevel(){

      var selValue = $('#gradeType').val();
      $('#gradeLevels').select_binder(selValue);
}

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
            async: false,
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

  function orgBinder(reference,selVal){

          $.ajax( {
            url: "/sms/registrar/grade?grade_type_id="+selVal,
            type: 'GET',
            async: false,
            success:function(data){
                
                data = $.parseJSON(data);
                console.log(data);

                var select = $(reference), options = '';
                select.empty();      

                for(var i=0;i <data.length; i++)
                  {

                   options += "<option value='"+data[i]["grade_level_id"]+"'>"+data[i]["grade_level"]+"</option>";              
                  }
              
                select.append(options);

                


            }

          });
  }
    function subjectTableFunc(){
      
      $('#subjectTable').dataTable().fnClearTable();
      $("#subjectTable").dataTable().fnDestroy();

          var subjectTable = $('#subjectTable').DataTable({
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
                subjectTable = data;
                console.log(subjectTable);
                fnCallback(subjectTable);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/subject",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

              { "mData": "subject_id", sDefaultContent: ""},

               { "mData": "subject_name", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/sms/registrar/remove-grade/'+oData.seminar_id+'" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }



</script>


@stop