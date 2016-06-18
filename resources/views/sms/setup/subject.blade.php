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
        <i class="fa fa-gift"></i> Subject List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-subject"><i class="fa fa-plus"></i> ADD NEW SUBJECT</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
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
<!-- END Portlet PORTLET-->


<div class="modal fade draggable-modal mo-z drag-me" id="add-subject" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Subject</h4>
      </div>
      <div class="modal-body">
        <form id="addSubject">
          <div class="form-group">
             <label>SUBJECT NAME</label>
              <input type="hidden" class="form-control input-sm"  id="subject_id" name="subject_id">
              <input type="text" class="form-control input-sm" id="subjectName" name="subjectName">
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



@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
@include('admin.jslinks.js_datatables')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/clockpicker/clockpicker.js"></script>
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
       $('#setupMenu').addClass('active');
       $('#academicsMenu').addClass('active');
       $('#subjectMenu').addClass('active');

        subjectTableFunc();
    });

    $('#add-subject, #wyredDeleteModal').on('hidden.bs.modal',function(){
        subjectTableFunc();
        $('#subject_id').val('');
    });

    function editSubject(row_id){

      $('#subject_id').val(subjectTableData[row_id].subject_id);
      $('#subjectName').val(subjectTableData[row_id].subject_name);
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
                subjectTableData = data;
                console.log(subjectTableData);
                fnCallback(subjectTableData);           
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
                      $(nTd).html('<a href="#" onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.subject_id+'" data-url="/softdelete/deleteSubject" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" data-target="#add-subject" onclick="editSubject('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }

</script>


    
@stop