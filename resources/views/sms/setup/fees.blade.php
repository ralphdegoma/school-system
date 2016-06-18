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
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-fees"><i class="fa fa-plus"></i> New Fee</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
           <table id="feesTable" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                      <th>Reciept Account</th>
                      <th>Fees Name</th>
                      <th>Categories</th>
                      <th>Description</th>
                      <th>Action</th>
                      <th>Action</th>
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
<!-- END Portlet PORTLET-->
<div class="modal fade draggable-modal mo-z drag-me" id="add-fees" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Fees</h4>
      </div>
      <div class="modal-body">
        <form id="setupFee">
         <div class="form-group">
           <label>Reciept Account</label>
           <input type="hidden" name="fee_id" id="fee_id">
            <select class="form-control input-sm" id="account" name="account">
              @foreach($accounts as $account)
                <option value="{{$account->account_code}}">{{$account->account_desc}}</option>
              @endforeach 
            </select>
            <small>
              Note: If you want to add new Charts of Account. Please proceed to Pythagoras Accounting Management System. or click this icon <a href="{{substr_replace(Request::root(), "", -2)}}84" target="_blank"><i class="fa fa-mail-forward"></i></a>
            </small>
          </div>
          <div class="form-group">
           <label>Fee Categories</label>
            <select class="form-control input-sm" id="category" name="category">
               @foreach($categories as $category)
                <option value="{{$category->fee_categories_id}}">{{$category->title}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
           <label>Fee Title</label>
             <input type="text" class="form-control input-sm" id="title" name="title">
          </div>
          <div class="form-group">
           <label>Fee Description</label>
             <input type="text" class="form-control input-sm" id="description" name="description">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/setup/billing/save-fees" data-form="setupFee" data-target="#wyredSaveModal">Save Fees</button>
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
     $('#billingMenu').addClass('active');
     $('#feesMenu').addClass('active');

     feesTableFunc();


     $(".drag-me").draggable({
       handle: ".modal-header"
      });

    $('#customizeSched').hide();
    $('#setEmpFlexySched').hide();

    $('#fixedOption').change(function(){
      if(this.checked == true){
         $('#customizeSched').hide();
         $('#fixedSched').show();
      }else {
         $('#customizeSched').show();
         $('#fixedSched').hide();
      }
    });

     $('#customizeOption').change(function(){
      if(this.checked == true){
         $('#customizeSched').show();
         $('#fixedSched').hide();
      }else {
         $('#customizeSched').hide();
         $('#fixedSched').show();
      }
    });

    $('#schedType').change(function(){
      if(this.value == '1'){
         $('#setEmpFlexySched').show();
      }else if(this.value == '2'){
        $('#setEmpFlexySched').hide();
      }
    });

      $('.clockpicker').clockpicker({
        defaultTime: 'value',
        minuteStep: 1,
        disableFocus: true,
        template: 'dropdown',
        showMeridian:false
    });

    $('.customize .input-group.date').datepicker({
      startView: 2,
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true
    });

    $('.default .input-group.date').datepicker({
    format: "mm/dd"
    });
  

 });
 $('#add-fees').on('hidden.bs.modal',function(){
        feesTableFunc();
  });
 function editFee(row_id){
        $('#account').val(feeTableData[row_id].get_account.account_code);
        $('#category').val(feeTableData[row_id].get_category.fee_categories_id);
        $('#title').val(feeTableData[row_id].title);
        $('#description').val(feeTableData[row_id].description);
        $('#fee_id').val(feeTableData[row_id].fees_id);
    }
  function feesTableFunc(){
      
      $('#feesTable').dataTable().fnClearTable();
      $("#feesTable").dataTable().fnDestroy();

          var feeTable = $('#feesTable').DataTable({
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
                feeTableData = data;
                console.log(feeTableData);
                fnCallback(feeTableData);           
              }
            });
          },
                     
          "sAjaxSource": "/sms/setup/billing/get-fees",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

               { "mData": "get_account.account_desc", sDefaultContent: ""},
               { "mData": "get_category.title", sDefaultContent: ""},
               { "mData": "title", sDefaultContent: ""},
               { "mData": "description", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.subject_id+'" data-url="/softdelete/deleteSubject" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" data-target="#add-fees" onclick="editFee('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }
</script>

    
@stop