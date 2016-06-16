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
        <i class="fa fa-gift"></i> Fees List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-section"><i class="fa fa-plus"></i> ADD NEW SECTION</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
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
</div>
<!-- END Portlet PORTLET-->


<!-- MODAL -->


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
              <input type="hidden" class="form-control input-sm" id="section_id" name="section_id" >
               <select class="form-control input-sm" id="gradeType" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                <option></option>
                   @foreach($gradeType as $keyVal)
                    <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                   @endforeach
                </select>
                </div>
                <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <select class="form-control input-sm"  name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevels" required>
                </select>
                </div>
               <div class="form-group">
                 <label>SECTION TYPE</label>
                 <select class="form-control input-sm" id="sectionType" name="sectionType">
                    @foreach($sectionType as $keyVal)
                      <option value="{{$keyVal->section_type_id}}">{{$keyVal->section_type}}</option>
                     @endforeach
                  </select>
              </div>
               <div class="form-group">
                 <label>SECTION NAME</label>
                  <input type="text" class="form-control input-sm" id="section_name" name="section_name" required>
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
     $('#setupMenu').addClass('active');
     $('#academicsMenu').addClass('active');
     $('#scheduleMenu').addClass('active');
     
    sectionTableFunc();

 });

  $('#add-section, #wyredDeleteModal').on('hidden.bs.modal',function(){
        sectionTableFunc();
        $('#section_id').val('');
  });

function changeGradeLevel(){

      var selValue = $('#gradeType').val();
      $('#gradeLevels').select_binder(selValue);
}

function editSection(row_id){

      $('#section_id').val(sectionTableData[row_id].section_id);
      $('#gradeType').val(sectionTableData[row_id].get_grade_level.grade_type_id).change();
      $('#gradeLevels').val(sectionTableData[row_id].grade_level_id);
      $('#sectionType').val(sectionTableData[row_id].get_section_type.section_type_id);
      $('#section_name').val(sectionTableData[row_id].section_name);
}

 function sectionTableFunc(){
      
      $('#sectionTable').dataTable().fnClearTable();
      $("#sectionTable").dataTable().fnDestroy();

          var sectionTable = $('#sectionTable').DataTable({
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
                sectionTableData = data;
                console.log(sectionTableData);
                fnCallback(sectionTableData);           
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
                      $(nTd).html('<button onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.section_id+'" data-url="/softdelete/deleteSection" class="btn btn-danger btn-sm w-b laddaRemove" data-seminar-id="'+oData.seminar_id+'" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#"  data-toggle="modal" data-target="#add-section" onclick="editSection('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }
</script>

    
@stop