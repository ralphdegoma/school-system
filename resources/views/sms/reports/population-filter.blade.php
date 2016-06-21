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

        <i class="fa fa-gift"></i> Population Filter

      </div>
      <div class="tools">
      
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-12">
          
          
        </div>
     </div> 
  </div>
</div>


@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')
<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Clock picker -->
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>
