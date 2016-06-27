@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<style type="text/css">
      
      .grid_space{
          margin-top:6px;
          margin-bottom: 3px;
      }
      .student-panel{
          margin-top: 10px;
      }
      

      .profile-pic{
          cursor: pointer;
          border: 10px solid #fff;
          border-bottom: 45px solid #fff;
          -webkit-box-shadow: 3px 3px 3px #777;
             -moz-box-shadow: 3px 3px 3px #777;
                  box-shadow: 3px 3px 3px #777;
      }


</style>
@stop

@section('content')





    <div class="row">
      <div class="col-md-12">

          <div class="panel panel-default">
              <div class="panel-body">

                <div class="col-xs-12">
                    <div class="col-xs-12"><h3>Student List Filter</h3></div>
                   <div class="col-xs-6">
                       <form id="formFilter">
                        <div class="form-group">
                            <label for="sy">School Year:</label>
                            <select class="form-control" name="schoolYear" id="schoolYear">
                                <option value="All">All</option>
                                @foreach($sy as $year)
                                    <option value="{{$year->school_year_id}}">{{$year->sy_from}}-{{$year->sy_to}}</option>
                                @endforeach
                            </select>
                        </div>
                       <div class="form-group">
                           <label for="sy">Grade Type:</label>
                           <select class="form-control gradeType"  name="gradeType" id="gradeType">
                               <option value="All">All</option>
                               @foreach($gradeType as $type)
                                   <option value="{{$type->grade_type_id}}">{{$type->grade_type}}</option>
                                @endforeach
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="sy">Grade Level:</label>
                           <select class="form-control input-sm gradelevel" name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" required>
                               <option >All</option>
                           </select>
                       </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Section:</label>
                            <select class="form-control input-sm sectionName edit_section_id" name="sectionName"  data-id="section_id" data-name="section_name" data-url="/select-binder/get-sectionName" required>
                                <option >All</option>
                            </select>
                        </div>

                        </form>
                        <div class="form-group">
                            <button class="btn btn-primary pull-right" onclick="submitFormFilter()">Submit</button>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12"><h3>Student List</h3></div>
                  <table id="studentlist" class="table table-striped table-bordered table-hover" >
                      <thead>
                      <tr>
                          <th class="text-center">ID Number</th>
                          <th class="text-center">Last Name</th>
                          <th class="text-center">First Name</th>
                          <th class="text-center">Middle Name</th>
                          <th class="text-center">Gender</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Standing</th>
                          <th class="text-center">Action</th>
                          <th class="text-center">Action</th>
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


@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>



    
<script>
    $('.gradeType').change(function(){
        var selValue = $(this).val();
        $('.gradelevel').select_binder(selValue);
        $('.gradelevel').append('<option value="All">All</option>');
    });

    $('.gradelevel').change(function(){
        var selValue = $(this).val();
      $('.sectionName').select_binder(selValue);
        $('.sectionName').append('<option value="All">All</option>');
    });


//    $('.sectionType').change(function(){
//        var secType = $(this).val();
//        var gradeLevel = $('.gradelevel').val();
//        var selValue = secType+'-'+gradeLevel;
//        $('.sectionName').select_binder(selValue);
//        $('.sectionName').append('<option value="All">All</option>');
//    });

    $(document).ready(function() {
        studentTable();

    });

    function submitFormFilter(){
        var Formdata = $("form").serialize();

       studentTable(Formdata);
    }

    
    function studentTable(Formdata){
      
      $('#studentlist').dataTable().fnClearTable();
      $("#studentlist").dataTable().fnDestroy();

          studentTableData = $('#studentlist').DataTable({
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
                studentList = data;
                console.log(studentList);
                fnCallback(studentList);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/registrar/get-students?"+Formdata,
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,
          "columns": [
             


              { "mData": "student_id", sDefaultContent: ""},
              { "mData": "last_name", sDefaultContent: ""},
              { "mData": "first_name", sDefaultContent: ""},
              { "mData": "middle_name", sDefaultContent: ""},
              { "mData": "gender", sDefaultContent: ""},
              { "mData": "", sDefaultContent: ""},
              { "mData": "", sDefaultContent: ""},
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





</script>




@stop