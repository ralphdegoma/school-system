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
        <i class="fa fa-gift"></i> School Year Month Template
      </div>
      <div class="tools">
         <div class="pull-right" style="margin-top:-5px;">
              <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-fees"><i class="fa fa-plus"></i> New Template</button>
         </div>
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
           <table id="" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                      <th>Reciept Account</th>
                      <th>Fees Name</th>
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
                </tr>
          
                </tbody>
          </table>
        </div>
         
     </div>
   
   
  </div>
</div>
<!-- END Portlet PORTLET-->
<div class="modal fade draggable-modal mo-z drag-me" id="add-fees" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">SY Month Template</h4>
      </div>
      <div class="modal-body">
        <form id="setupSubject">
        <div class="row">
            <div class="col-md-12">
             <div class="table-responsive">
               <table id="" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>Month</th>
                          <th class="text-center">Check/Uncheck</th>
                          <th class="text-center">Month Rankings</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    <tr>
                      <td>January</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                      <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>February</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>March</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>April</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>May</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>June</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>August</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>September</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>October</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>November</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>December</td>
                      <td class="text-center">
                        <input type="checkbox" name="">
                      </td>
                       <td>
                        <div class="form-group">
                          <select class="form-control input-sm">
                            <option>1</option>
                            <option>2</option>
                          </select>
                        </div>
                      </td>
                    </tr>
              
                    </tbody>
              </table>
              </div>
              <div class="form-group">
               <label>Status</label>
                <select class="form-control input-sm">
                  <option>Default</option>
                  <option>For Current School Year</option>
                </select>
              </div>
          </div>
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
     $('#academicsMenu').addClass('active');
     $('#Schedule').addClass('active');




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