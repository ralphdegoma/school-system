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
        <i class="fa fa-gift"></i> Tuition Reference
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-fees"><i class="fa fa-reply"></i> Recal Previous SY Tuition Reference</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
           <table id="" class="table table-striped table-bordered table-hover" >
               
                <!--   <tr>
                      <th colspan="2"></th>
                      <th colspan="2">CASH</th>
                      <th rowspan="2">SEMI-ANNUAL</th>
                      <tr>
                        <td>CASH</td>
                      </tr>
                  </tr> -->
              
               
                 
              <!--   <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr> -->
          
              <thead>
                <tr>
                <th class="text-center" rowspan="2">GRADE LEVEL</th>
                <th class="">CASH</th>
                <th class="text-center" colspan="2">SEMI-ANNUAL</th>
                <th class="text-center" colspan="2">QUARTERLY</th>
                <th class="text-center" colspan="2">MONTHLY</th>
                 
                </tr>

              <tr>
                <td class="tg-yw4l">CASH</td>
                <td class="tg-yw4l">Upon Enrollment</td>
                <td class="tg-yw4l">Installment</td>
                <td class="tg-yw4l">Upon Enrollment</td>
                <td class="tg-yw4l">Installment</td>
                <td class="tg-yw4l">Upon Enrollment</td>
                <td class="tg-yw4l">Installment</td>
              </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>Grade 1</td>
                    <td contenteditable="true">20,000</td>
                    <td contenteditable="true">10,500</td>
                    <td contenteditable="true">10,500</td>
                    <td contenteditable="true">6,000</td>
                    <td contenteditable="true">6,000</td>
                    <td contenteditable="true">2,000</td>
                    <td contenteditable="true">2,000</td>
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
        <form id="setupSubject">
         <div class="form-group">
           <label>Reciept Account</label>
            <select class="form-control input-sm">
              <option></option>
              <option></option>
            </select>
          </div>
          <div class="form-group">
           <label>Fees Name</label>
             <input type="text" class="form-control input-sm" name="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
        <button class="btn btn-info wyredModalCallback" data-toggle="modal" data-url="/sms/registrar/save-subject" data-form="setupSubject" data-target="#wyredSaveModal">Save Fees</button>
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
</script>

    
@stop