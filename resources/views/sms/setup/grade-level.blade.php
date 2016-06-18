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
        <i class="fa fa-gift"></i> Grade Level List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
            <button class="btn btn-default btn-sm"  data-toggle="modal" data-target="#add-grade-level"><i class="fa fa-plus"></i> ADD NEW GRADE LEVEL</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
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
</div>
<!-- END Portlet PORTLET-->




<!-- modal -->

<div class="modal fade draggable-modal mo-z drag-me" id="add-grade-level" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Grade Level</h4>
      </div>
      <div class="modal-body">
        <form id="setupGradeLevel">
         <div class="form-group">
                 <label>GRADE TYPE</label>
                  <input type="hidden" class="form-control input-sm" name="grade_level_id" id="grade_level_id">
                  <select class="form-control input-sm" id="grade_type" name="grade_type">
                    @foreach($gradeType as $keyVal)
                      <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                    @endforeach
                  </select>
                </div>
               <div class="form-group">
                 <label>GRADE LEVEL</label>
                  <input type="text" class="form-control input-sm" id="grade_level" name="grade_level" required>
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
     $('#gradelevelMenu').addClass('active');
      gradeTableFunc();
    });


  
</script>


<script>



    $('#add-grade-level ,#wyredSaveModal').on('hidden.bs.modal',function(){
        gradeTableFunc();
        $('#grade_level_id').val('');
    });

    function editGradeLevel(row_id){
        $('#grade_level_id').val(gradelevel_data[row_id].grade_level_id);
        $('#grade_type').val(gradelevel_data[row_id].get_grade_type.grade_type_id);
        $('#grade_level').val(gradelevel_data[row_id].grade_level);

    }

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
                gradelevel_data = data;
                console.log(gradelevel_data);
                fnCallback(gradelevel_data);           
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
                      $(nTd).html('<button onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.grade_level_id+'" data-url="/softdelete/deleteGradeLevel" class="btn btn-danger btn-sm w-b laddaRemove" data-grade-level-id="'+oData.grade_level_id+'"data-toggle="modal" data-target="#wyredSaveModal" id="ladda"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></button>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#"  data-toggle="modal" data-target="#add-grade-level" onclick="editGradeLevel('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
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


    
</script>

    
@stop