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
        <i class="fa fa-gift"></i> Setup Payment Types
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-fees"><i class="fa fa-plus"></i></button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
           <table id="" class="table table-striped table-bordered table-hover" >
            <form id="paymentSched">
                <thead>
                  <tr>
                      <th>MONTH</th>
                      @foreach($paymentTypes as $type)
                        <th class="text-center">{{$type->payment_type}}
                        </th>
                      @endforeach
                  </tr>
                </thead>
                <tbody>
                 @foreach($months as $month)
                    <tr>
                        <td>{{$month->month_name}}</td>
                      @foreach($paymentTypes as $type)
                        <td class="text-center">
                        <!-- <input type="hidden" name="payment_type[]" value="{{$type->payment_type_id}}"> -->
                        <input type="checkbox" name="month[]" value="{{$month->month_id}}/{{$type->payment_type_id}}">
                         </td>
                      @endforeach
                    </tr>
                 @endforeach
               
                </tbody>
                </form>
          </table>
        </div>
        <div class="col-md-12">
          <div class="pull-right">
           <button class="btn btn-primary wyredModalCallback" data-toggle="modal"  data-url="/sms/setup/billing/save-payment-sched" data-form="paymentSched" data-target="#wyredSaveModal"> Save Payment Schedule</button>
          </div>
        </div> 
     </div>
   
   
  </div>
</div>
</div>
<div class="col-xs-12">
<div class="portlet box red">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-gift"></i>Payment Types
      </div>
      <div class="tools">
      </div>
    </div>
  <div class="portlet-body">
      <div class="row">
        <table id="" class="table table-striped table-bordered table-hover" >
        <thead>
        </thead>
        <tbody>
          
        </tbody>
        </table>
      </div>
  </div>
</div>
</div>

<!-- END Portlet PORTLET-->


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