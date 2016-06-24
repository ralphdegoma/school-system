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

        <i class="fa fa-gift"></i> Masterlist Filter

      </div>
      <div class="tools">
      
      </div>
    </div>
    <div class="portlet-body">
      <div class="row">
       <div class="col-md-5" style="margin-bottom:20px;">
            <form method="post" action="/sms/reports/generate-masterlist">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                <div class="form-group">
                  <label>Generate Masterlist:</label>
                </div>
                <div class="form-group">
                  <label>Grade Type</label>
                  <select class="form-control input-sm" id="gradeType" name="gradeType" onchange="changeGradeLevel()" id="gradeType" required>
                <option></option>
                   @foreach($gradeType as $keyVal)
                    <option value="{{$keyVal->grade_type_id}}">{{$keyVal->grade_type}}</option>
                   @endforeach
                </select>
                </div>
                <div class="form-group">
                   <label>Grade Level</label>
                       <select class="form-control input-sm gradelevel"  name="grade_level" data-id="grade_level_id" data-name="grade_level" data-url="/select-binder/get-gradeLevel" id="gradeLevels" required>
                </select>
                </div>
                 <div class="form-group">
                 <label>Section</label>
                  <select class="form-control input-sm sectionName edit_section_id" name="section_name"  data-id="section_id" data-name="section_name" data-url="/select-binder/get-sectionName"> 
                    <option ></option>
                  </select>
               </div>
               <div class="col-md-12">
                <button class="btn btn-info btn-block"><i class="fa fa-print"></i>  Generate</button>
                </div>
            </form>
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
<script type="text/javascript">
 function changeGradeLevel(){

      var selValue = $('#gradeType').val();
      $('#gradeLevels').select_binder(selValue);
} 
$('.gradelevel').change(function(){
      var selValue = $(this).val();
      $('.sectionName').select_binder(selValue);
      $('.sectionName').append('<option val="All">All</option>');
      getSubjectsWithFilters();//call change of subjects
});

</script>


@stop