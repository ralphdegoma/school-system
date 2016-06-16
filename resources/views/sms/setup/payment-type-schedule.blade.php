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
           <table id="" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                      <th>MONTH</th>
                      <th class="text-center">SEMI-ANNUAL</th>
                      <th class="text-center">QUARTERLY</th>
                      <th class="text-center">MONTHLY</th>
                  </tr>
                </thead>
                <tbody>
                 
                <tr>
                      <td>January</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>February</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>March</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>April</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>May</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>June</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>August</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>September</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>October</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>November</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                    <tr>
                      <td>December</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="" checked="" disabled="">
                      </td>
                    </tr>
                </tbody>
          </table>
        </div>
        <div class="col-md-12">
          <div class="pull-right">
           <button class="btn btn-primary"> Save Payment Schedule</button>
          </div>
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