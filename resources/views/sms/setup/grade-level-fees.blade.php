@extends('sms.main.index')

@section('css_filtered')
@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
 <link href="/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

@stop

@section('content')

<div class="col-md-8">
  <div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-user"></i>Grade Level Fees List
    </div>
    <div class="tools">
    
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
     <div class="col-md-4">
      <div class="form-group">
       <label>School Year</label>
        <select class="form-control input-sm">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
     </div>
   
    <div class="col-md-12">
    <div style="height: 425px;overflow-y: scroll;">
     <div class="table-responsive">
       
           <table id="gradeFeesTable" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                      <th>Grade Level</th>
                      <th>Fees</th>
                      <th>Amount</th>
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
                </tr>
          
                </tbody>
          </table>
      
      </div>
      </div>
      </div>
      <div class="col-md-12">
       <div class="pull-right" style="padding-right:10px;padding-top:10px;">
        <button class="btn btn-info"><i class="fa fa-reply"></i> Recall Previous SY Account's</button>
       </div>
      </div>
   </div>
  </div>
 </div>
</div>

<div class="col-md-4">
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-info"></i> Grade Fee's Information
    </div>
    <div class="tools">
      
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
    <div class="col-md-12">
    <form id="addGradeFees">
      <div class="form-group">
          <b><label>School Year: {{$sy->sy_from}} - {{$sy->sy_to}}</label></b>
      </div>
      <div class="form-group">
       <label>Grade Type</label>
       <input type="hidden" name="billing_id" id="billing_id">
         <select class="form-control input-sm" id="gradeType" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                <option></option>
                   @foreach($gradeType as $keyVal)
                    <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                   @endforeach
        </select>
      </div>
      <div class="form-group">
         <label>Grade Level</label>
           <select class="form-control input-sm"  name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevels" required>
                </select>
         </div>
       <div class="form-group">
        <label>Fees</label>
          <select class="form-control input-sm" name="fees" id="fee">
          <option></option>
          @foreach($fees as $fee)
              <option value="{{$fee->fees_id}}">{{$fee->title}}</option>
          @endforeach
          <option value="add-fees">+ Add Fees</option>
        </select>
        </div>
       <div class="form-group">
         <label>Amount</label>
           <input type="text" class="form-control input-sm" id="amount_fee" name="amount">
       </div>
       </form>
       </div>  
      <div class="col-md-12">
      <button class="btn btn-info btn-block wyredModalCallback" data-toggle="modal"  data-url="/sms/setup/billing/save-grade-fees" data-form="addGradeFees" data-target="#wyredSaveModal"><i class="fa fa-reply"></i> Setup Fee</button>
      </div>
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


<!-- END Portlet PORTLET-->


@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
@include('admin.jslinks.js_datatables')
<!-- Date range picker -->
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>

    
<script>
$(document).ready(function(){


    $('#setupMenu').addClass('active');
    $('#billingMenu').addClass('active');
    $('#gradelevelfeeMenu').addClass('active');

      gradeFeesTableFunc();

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

    $('#fee').change(function () {
        if ($(this).val() == "add-fees") {
             $('#add-fees').modal({
                show: true
            });
            this.value = ""; 
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
function editFees(row_id){
        $('#amount_fee').val(subjectTableData[row_id].amount);
        $('#billing_id').val(subjectTableData[row_id].billing_id);
        $('#gradeType').val(subjectTableData[row_id].get_grade.get_grade_type.grade_type_id);
          changeGradeLevel();
        $('#gradeLevels').val(subjectTableData[row_id].get_grade.grade_level_id);
        $('#fee').val(subjectTableData[row_id].get_fees.fees_id)
}
function changeGradeLevel(){

      var selValue = $('#gradeType').val();
      $('#gradeLevels').select_binder(selValue);
}
$('#wyredSaveModal, #wyredDeleteModal').on('hidden.bs.modal',function(){
        gradeFeesTableFunc();
          $('#amount_fee').val('');
        $('#billing_id').val('');
        $('#gradeType').val('');
          changeGradeLevel();
        $('#gradeLevels').val('');
        $('#fee').val('')
  });
 function gradeFeesTableFunc(){
      
      $('#gradeFeesTable').dataTable().fnClearTable();
      $("#gradeFeesTable").dataTable().fnDestroy();

          var subjectTable = $('#gradeFeesTable').DataTable({
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
                     
          "sAjaxSource": "/sms/setup/billing/get-grade-fees",
          "sAjaxDataProp": "",
          "iDisplayLength": 10,
          "scrollCollapse": false,
          "paging":         true,
          "searching": true,

          "columns": [
             

               { "mData": "get_grade.grade_level", sDefaultContent: ""},
               { "mData": "get_fees.title", sDefaultContent: ""},
               { "mData": "amount", sDefaultContent: ""},

                { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" onclick="softDeleteCallback(this)" data-toggle="modal" data-target="#wyredDeleteModal" data-id="'+oData.billing_id+'" data-url="/softdelete/delete-billing" class="btn btn-danger btn-sm w-b"><b class="pull-left"><i class="fa fa-trash"></i></b> <b class="pull-right">REMOVE</b></a>');
                  }
                },  

               { sDefaultContent: "" ,
                  "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                      $(nTd).html('<a href="#" data-toggle="modal" onclick="editFees('+oData.row_id+')" class="btn btn-info btn-sm w-b"><b class="pull-left"><i class="fa fa-pencil-square"></i></b> <b class="pull-right">EDIT</b></a>');
                  }
                },  
          ]
      });

    }
</script>


@stop