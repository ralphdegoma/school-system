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
        <i class="fa fa-gift"></i> School Year List
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-school-year"><i class="fa fa-plus"></i>ADD NEW SCHOOL YEAR</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
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
</div>
<!-- END Portlet PORTLET-->









<!-- MODALS -->

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
                    <input type="hidden" class="form-control input-sm" name="school_year_id" id="school_year_id">
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
              <div class="form-group">
                  <label>Check if this your current School Year</label>
                  <input type="checkbox" name="is_current" id="is_current" class="pull-right">
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
        schoolYearFunc();
         $('#setupMenu').addClass('active');
         $('#academicsMenu').addClass('active');
         $('#schoolyearMenu').addClass('active');
         


    });
    
    $('#syFrom').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
    });

    $('#syTo').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
    });

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
                schoolYearTableData = data;
                console.log(schoolYearTableData);
                fnCallback(schoolYearTableData);           
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
                      $(nTd).html('<a href="#" onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.school_year_id+'" data-url="/softdelete/deleteSchoolYear" class="btn btn-danger btn-sm w-b "><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" data-target="#add-school-year" onclick="editSchoolYear('+oData.row_id+')" class="btn btn-info btn-sm w-b "><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }

    $('#add-school-year, #wyredDeleteModal').on('hidden.bs.modal',function(){
        $('#school_year_id').val('');
        schoolYearFunc();
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



    function editSchoolYear(row_id){

        $('#school_year_id').val(schoolYearTableData[row_id].school_year_id);
        $('#syFrom').val(schoolYearTableData[row_id].sy_from);
        $('#syTo').val(schoolYearTableData[row_id].sy_to);
        $('#syTo').val(schoolYearTableData[row_id].sy_to);

        if(schoolYearTableData[row_id].is_current  == "1"){
            $( "#is_current" ).prop( "checked", true);
        }
        else{
            $( "#is_current" ).prop( "checked", false);
        }
    }
</script>

    
@stop