@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
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
    <div class="col-md-12">
    <div class="form-group">
       <label>STUDENT</label>
        <select class="form-control input-sm">
          <option>Ralph Degoma</option>
          <option>Bridgett Lloren</option>
        </select>
      </div>
     <div class="form-group">
       <label>CLASS TYPE</label>
        <select class="form-control input-sm" id="classType">
          @foreach($classType as $keyVal)
          <option value="{{$keyVal->class_type_id}}">{{$keyVal->class_type}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
       <label>GRADE TYPE</label>
        <select class="form-control input-sm">
          @foreach($gradeType as $keyVal)
          <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
         @endforeach
        </select>
      </div>
     <div class="form-group">
       <label>GRADE LEVEL</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
       <div class="form-group">
       <label>TIME</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
       <div class="form-group">
       <label>SECTION</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="form-group">
       <label>REQUIREMENTS</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
       </div>  
      <div class="col-md-12">
      <button class="btn btn-info btn-block"><i class="fa fa-child"></i> ENROLL STUDENT</button>
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

<!-- Date range picker -->
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>

    
<script>
$(document).ready(function(){
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