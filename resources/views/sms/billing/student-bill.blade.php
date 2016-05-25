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
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> STUDENT'S LIST</h3>
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
    <div style="height: 282px;overflow-y: scroll;">
     <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Nick Name</th>
            <th>Edit</th>
            <th>Enroll</th>
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
            <button class="btn btn-info btn-block btn-sm"><b class="pull-left"><i class="fa fa-pencil"></i></b> <b class="pull-right">EDIT</b></button>
            </td>
            <td class="text-center">
                 <input type="checkbox" name="">
             </td>
        </tr>
        </tbody>
        </table>
      </div>
      </div>
  </div>
</div>
<div class="wyred-box-footer">
  <div class="pull-right wyred-button col-md-4 ">
    <button class="btn btn-info btn-block">MOVE TO ENROLLMENT <i class="fa fa-chevron-right"></i></button>
  </div>
</div>
</div>

<div class="col-md-4">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-calendar"></i> STUDENT SCHEDULE</h3>
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
     <div id="summer-div">
     <div class="form-group">
     <label class="text-red">SUBJECT</label>
      <select class="form-control input-sm">
         
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
     <div class="form-group" id="section-div">
     <label>SECTION</label>
      <select class="form-control input-sm">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th colspan="2">STUDENT NAME</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX">
            <td>RALPH DEGOMA</td>
            <td class="text-center">
              <button class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>
            </td>
        </tr>
         <tr class="gradeX">
            <td>Aikeen Bridgett Lloren</td>
            <td class="text-center">
              <button class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button>
            </td>
        </tr>
        </tbody>
        </table>
      </div>
  </div>
 </div>
 </div>
 <div class="wyred-box-footer">
    <div class="wyred-button col-md-12">
        <button class="btn btn-info btn-block">ENROLL STUDENT</button>
    </div>
</div>
 </div>

<div class="col-md-12">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> ENROLLED STUDENT'S</h3>
    <h3 class="pull-right" style="margin-top:-28px;padding-right:20px;color:#FFFFFF;"><a href="#" data-toggle="modal" data-target="#request-slot"><i class="fa fa-child"></i></a> SLOT 0/50</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">
   <div class="col-md-4">
    <h3>Class Adviser: Hossana Mae Farsario</h3>
   </div>
   <div class="col-md-4">
   <h3>Section Name: Crack Section</h3>
   </div>
   <div class="col-md-4">
   <h3>Section Type: Crack Section</h3>
   </div>
    <div class="col-md-12">
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
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 3.0</td>
            <td>Win 2k+ / OSX.3+</td>
            <td class="center">1.9</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Camino 1.0</td>
            <td>OSX.2+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Camino 1.5</td>
            <td>OSX.3+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
        </tr>
        <tr class="gradeA">
            <td>Gecko</td>
            <td>Netscape 7.2</td>
            <td>Win 95+ / Mac OS 8.6-9.2</td>
            <td class="center">1.7</td>
            <td class="center">A</td>
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


<div class="modal inmodal fade" id="request-slot" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


              <div class="wyred-box-header" style="margin-top:-10px;">
                <h3 class="wyred-box-title"><i class="fa fa-child"></i> REQUEST SLOT</h3>
              </div>
              <div class="wyred-box-body">
              <div class="row">
              <div class="col-md-12">
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
                <div class="form-group">
                 <label>SLOT</label>
                 <input type="text" class="form-control input-sm" name="">
                </div>
                <div class="form-group">
                 <label>NOTE</label>
                 <textarea rows="2" class="form-control input-sm" placeholder="Specify Request"></textarea>
                </div>
              </div>
             </div>
             </div>
             <div class="wyred-box-footer">
                <div class="wyred-button col-md-12">
                    <button class="btn btn-info btn-block"><i class="fa fa-child"></i> REQUEST SLOT</button>
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