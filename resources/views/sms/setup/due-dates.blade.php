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

        <i class="fa fa-gift"></i> Due Dates

      </div>
      <div class="tools">
      
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
           <table id="" class="table table-striped table-bordered table-hover" >
           <form id="dueDates">
                <thead>
                  <tr>
                      <th>Month</th>
                      <th>Day</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($months as $month)
              <tr>
                    <td>{{$month->month_name}}</td>
                      <td class="text-center">
                         <div class="form-group">
                           <div class="input-group date">
                                <span class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                                </span>
                                <input type="hidden" name="month[]" value="{{$month->month_id}}">
                                <input type="text" class="form-control" name="dues[]" required>            
                              </div>
                           </div>
                      </td>
                    </tr>
                @endforeach      
                </tbody>
                </form>
          </table>
        </div>
        <div class="col-md-12">
          <div class="pull-right">
           <button class="btn btn-primary wyredModalCallback" data-toggle="modal"  data-url="/sms/setup/billing/save-due-date" data-form="dueDates" data-target="#wyredSaveModal"> Save Due Dates</button>
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

    $('.month').datepicker({
      startView: 2,
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true
    });

    $('.month').datepicker({
    format: "mm/dd"
    });
  

 });
</script>

    
@stop