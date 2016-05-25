@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
@stop

@section('content')

<div class="col-md-12">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> ENROLLED STUDENT'S</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">
    <div class="col-md-12">
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
    </div>
    <div class="col-md-12">
     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
          <tr>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Grade Level</th>
              <th>Section</th>
              <th class="center">Action</th>
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
                <button class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#enrolled-student"><b class="pull-left"><i class="fa fa-pencil"></i></b> <b class="pull-right">EDIT</b></button>
            </td>
        </tr>
        </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
<div class="wyred-box-footer">
 
</div>
</div>


<div class="modal inmodal fade" id="enrolled-student" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


              <div class="wyred-box-header" style="margin-top:-10px;">
                <h3 class="wyred-box-title"><i class="fa fa-calendar"></i> STUDENT SCHEDULE</h3>
              </div>
              <div class="wyred-box-body">
              <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>STUDENT NAME</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="gradeX">
                        <td>RALPH DEGOMA</td>
                    </tr>
                    </tbody>
                    </table>
                  </div>
             <div class="form-group">
                 <label>CLASS TYPE</label>
                  <select class="form-control input-sm" id="classTypeR">
                    <option value="REGULAR CLASS">Regular Class</option>
                    <option value="SUMMER CLASS">Summer Class</option>
                  </select>
                </div>
                <div class="form-group">
                 <label>GRADE TYPE</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                 <div id="summer-div-request">
                 <div class="form-group">
                 <label class="text-red">SUBJECT</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                </div>
                 <div class="form-group">
                 <label>TIME</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                 <div class="form-group" id="section-div-request">
                 <label>SECTION</label>
                  <select class="form-control input-sm">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
             </div>
             </div>
             <div class="wyred-box-footer">
                <div class="wyred-button col-md-12">
                    <button class="btn btn-info btn-block">UPDATE ENROLLEE</button>
                </div>
            </div>
 
        </div>
    </div>
</div>

@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')

<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

    
<script>
$(document).ready(function(){
    $('#summer-div').hide();

    $('#year').datepicker( {
        format: " yyyy", // Notice the Extra space at the beginning
        viewMode: "years", 
        minViewMode: "years"
    });
   
     $('#classType').change(function(){
      if(this.value == 'SUMMER CLASS'){
        $('#summer-div').show();
        $('#section-div').hide();
      }else if(this.value == 'REGULAR CLASS'){
        $('#summer-div').hide();
         $('#section-div').show();
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