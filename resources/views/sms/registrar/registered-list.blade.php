@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
@stop

@section('content')

<div class="col-md-12">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> REGISTERED LIST</h3>
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
        <table id="student-table-list" class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
          <tr>
              <th>More</th>
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Age</th>
              <th>Home Address</th>
              <th>Cel. Number</th>
              <th>Tel. Number</th>
              <th class="center">Action</th>
              <th class="center">Action</th>
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
@include('admin.jslinks.js_datatables')
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


    $(document).ready(function(){
        studentTable();
    });


    
    function studentTable(){
      
      $('#student-table-list').dataTable().fnClearTable();
      $("#student-table-list").dataTable().fnDestroy();

          studentTableData = $('#student-table-list').DataTable({
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
                     
          "sAjaxSource": "/sms/registrar/get-students",
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
              { "mData": "student_id", sDefaultContent: ""},
              { "mData": "full_name", sDefaultContent: ""},
              { "mData": "home_address", sDefaultContent: ""},
              { "mData": "cp_no", sDefaultContent: ""},
              { "mData": "tel_no", sDefaultContent: ""},
              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<button data-url="/sms/registrar/remove-section/'+oData.seminar_id+'" class="btn btn-danger btn-block btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                }
              },  

              { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="/bis/seminar-edit/'+oData.seminar_id+'" class="btn btn-info btn-block btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                }
              },  
          ]
      });

    }

    $('#student-table-list tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = studentTableData.row( tr );
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
    
    


    function format (row_id) {
              console.log(studentTableData[row_id]);
              return false;
               return '<div class="sliderHolder"><div class="slider" style="">'+
                '<div class="list-group" style="margin-top:20px;background-color:#FFFFFF;">'+
                  '<a href="#" class="list-group-item active" style="text-align:left">DETAILED INFORMATION</a>'+
                  '<a href="#" class="list-group-item "><b>Full Name </b>: '+removeNull(studentTableData[row_id].student_id)+ " "+ removeNull(farmer_data[row_id].first_name)+", "+removeNull(farmer_data[row_id].middle_name)+'</a>'+
                  '<a href="#" class="list-group-item "><b>Age </b>: '+ removeNull(studentTableData[row_id].age) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Gender </b>: '+ removeNull(studentTableData[row_id].gender) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Religion </b>: '+ removeNull(studentTableData[row_id].religion_name) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Spouse(if any) </b>: '+ removeNull(studentTableData[row_id].spouse) +'</a>'+
                  '<a href="#" class="list-group-item "><b>Organization </b>: '+ removeNull(studentTableData[row_id].organization_name) +'</a>'+
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
</script>

@stop