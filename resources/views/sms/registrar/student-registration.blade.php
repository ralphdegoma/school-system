@extends('sms.main.index')

@section('css_filtered')

@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/assets/css/plugins/switchery/switchery.css" rel="stylesheet">
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
@stop

@section('content')
<form id="studentRegistrationForm"  enctype="multipart/form-data">
<div class="col-md-8">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-user"></i> Registration</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row" >
   <div class="form-group col-md-12">
     <label>STUDENT ID</label>
      <input type="text"  class="form-control input-sm"  name="student_id" required>
    </div>
    <div class="form-group col-md-6">
     <label>FIRST NAME</label>
      <input type="text"  class="form-control input-sm"  name="first_name" required>
    </div>
     <div class="form-group col-md-6">
     <label>MIDDLE NAME</label>
      <input type="text"  class="form-control input-sm" name="middle_name" required>
    </div>
    <div class="form-group col-md-6">
     <label>LAST NAME</label>
      <input type="text"  class="form-control input-sm" name="last_name" required>
    </div>
     <div class="form-group col-md-6">
     <label>NAME EXTENSION</label>
      <input type="text"  class="form-control input-sm" name="name_extension" >
    </div>
    <div class="form-group col-md-6">
     <label>NICK NAME</label>
      <input type="text"  class="form-control input-sm" name="nick_name" >
    </div>
    <div class="form-group col-md-6">
     <label>GENDER</label>
      <select class="form-control input-sm" name="gender"  required>
      	<option>Male</option>
      	<option>Female</option>
      </select>
    </div>
    <div class="form-group col-md-6 bday">
	    <label>BIRTHDAY</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="birthday" required>
	    </div>
	</div>
	 <div class="form-group col-md-12">
     <label>BIRTHPLACE</label>
      <textarea class="form-control input-sm" rows="2" name="birthplace" required></textarea>
    </div>
	 <div class="form-group col-md-12">
     <label>HOME ADDRESS</label>
      <textarea class="form-control input-sm" rows="2" name="home_address" required></textarea>
    </div>
      <div class="form-group col-md-6">
	    <label>CELLPHONE NO</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="cp_no" >
	    </div>
	</div>
	  <div class="form-group col-md-6">
	    <label>TEL. NO. LANDLINE</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="tel_no" >
	    </div>
	</div>





  <div class="row" style="margin-bottom: 20px">
    <div class="col-xs-12">
      <br>
      <div class="btn-group btn-group-vertical" data-toggle="buttons">
        <label class="btn active">
          <input type="radio" id="default" value="default" name="parental" checked=""><i class="fa fa-circle-o fa-1x"></i><i class="fa fa-check-circle-o fa-2x"></i> <span>  Default</span>
        </label>
        <label class="btn">
          <input type="radio" id="checkParents" value="checkParents" name="parental"><i class="fa fa-circle-o fa-1x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Both Parents Already Exist</span>
        </label>
        <label class="btn">
          <input type="radio" id="with-out-father" value="with-out-father" name="parental"><i class="fa fa-circle-o fa-1x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Only Mother Already Exist</span>
        </label>
        <label class="btn">
          <input type="radio" id="with-out-mother" value="with-out-mother" name="parental"><i class="fa fa-circle-o fa-1x"></i><i class="fa fa-check-circle-o fa-2x"></i><span> Only Father Already Exist</span>
        </label>
         
      </div>
    </div>
  </div>




  <div class="col-md-6">
  <div class="form-group" id="father-select">
     <label>FATHER NAME</label>
      <select class="form-control input-sm select2 father_id" required data-url="/select-binder/get-father" data-id="parent_id" data-name='parents_name' name="father_id">
        <option></option>
      </select>
    </div>

    <div id="father-div">
	 <div class="form-group">
	     <label>FATHER NAME</label>
	      <input type="text" class="form-control input-sm" required name="fathers_name" required="">
     </div>
     <div class="form-group bday">
	    <label>BIRTHDAY</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="fathers_dob">
	    </div>
	</div>
	 <div class="form-group">
	     <label>RELIGION</label>
	      <input type="text" class="form-control input-sm" name="fathers_religion" required>
     </div>
      <div class="form-group">
	     <label>NATIONALITY</label>
	      <input type="text" class="form-control input-sm" name="fathers_nationality" required>
     </div>
      <div class="form-group">
	     <label>OCCUPATION</label>
	      <input type="text" class="form-control input-sm" name="fathers_occupation" >
     </div>
      <div class="form-group">
	     <label>NAME OF FIRM OR EMPLOYER</label>
	      <input type="text" class="form-control input-sm" name="fathers_firm">
     </div>
     <div class="form-group">
	    <label>TEL. NO. (RESIDENCE)</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="fathers_residence_tel">
	    </div>
	</div>
	<div class="form-group">
	    <label>TEL. NO. (OFFICE)</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="fathers_office_tel">
	    </div>
	</div>
   <div class="form-group">
     <label>HOME ADDRESS</label>
      <textarea class="form-control input-sm" rows="2" name="fathers_home_address" ></textarea>
    </div>
  </div>
</div>
  <div class="col-md-6">
  <div class="form-group" id="mother-select">
     <label>MOTHER NAME</label>
      <select class="form-control input-sm select2 mothers_id" name="mothers_id" name="mothers_name" data-url="/select-binder/get-mother" data-id="parent_id" data-name='parents_name' required>
        <option></option>
      </select>
    </div>
    <div id="mother-div">
	 <div class="form-group">
	     <label>MOTHER NAME</label>
	      <input type="text" class="form-control input-sm" name="mothers_name"  required>
     </div>
     <div class="form-group bday">
	    <label>BIRTHDAY</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="mothers_dob" >
	    </div>
	</div>
	 <div class="form-group">
	     <label>RELIGION</label>
	      <input type="text" class="form-control input-sm" name="mothers_religion" required>
     </div>
      <div class="form-group">
	     <label>NATIONALITY</label>
	      <input type="text" class="form-control input-sm" name="mothers_nationality" required>
     </div>
      <div class="form-group">
	     <label>OCCUPATION</label>
	      <input type="text" class="form-control input-sm" name="mothers_occupation" >
     </div>
      <div class="form-group">
	     <label>NAME OF FIRM OR EMPLOYER</label>
	      <input type="text" class="form-control input-sm" name="mothers_firm">
     </div>
     <div class="form-group">
	    <label>TEL. NO. (RESIDENCE)</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="mothers_residence_tel" >
	    </div>
	</div>
	<div class="form-group">
	    <label>TEL. NO. (OFFICE)</label>
	    <div class="input-group date">
        <span class="input-group-addon">
       	 <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="mothers_office_tel" >
	    </div>
	</div>
   <div class="form-group">
     <label>HOME ADDRESS</label>
      <textarea class="form-control input-sm" rows="2" name="mothers_home_address" ></textarea>
    </div>
  </div>
  </div>
  <div class="col-md-12">
   <div class="hr-line-dashed"></div>
    <h3><i class="fa fa-info-circle"></i> IF NOT LIVING WITH PARENTS</h3>
  </div>

  <div class="col-md-12">
      
      <div class="checkbox checkbox-primary">
          <input type="checkbox" id="guardian_check" name="guardian_check" checked>
          <label for="guardian_check">GUARDIAN NAME ALREADY EXIST</label>
      </div>
  </div>

  <div class="col-md-6">
    
  <div class="form-group" id="guardian-select">
     <label>GUARDIAN NAME</label>
      <select class="form-control input-sm select2 guardian_id" name="guardian_id" name="guardian_id" data-url="/select-binder/get-guardian" data-id="parent_id" data-name='parents_name' >
        <option></option>
      </select>
    </div>

  <div class="form-group">
     <label>RELATIONSHIP</label>
      <input type="text" class="form-control input-sm" name="relationship_name" >
   </div>
  <div class="guardian-div">
   <div class="form-group">
       <label>GUARDIAN NAME</label>
        <input type="text" class="form-control input-sm" name="guardian_name"  >
     </div>
     <div class="form-group bday">
      <label>BIRTHDAY</label>
      <div class="input-group date">
        <span class="input-group-addon">
         <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="guardian_birthday" >
      </div>
  </div>
   <div class="form-group">
       <label>RELIGION</label>
        <input type="text" class="form-control input-sm" name="guardian_religion" >
     </div>
      <div class="form-group">
       <label>NATIONALITY</label>
        <input type="text" class="form-control input-sm" name="guardian_nationality" >
     </div>
      <div class="form-group">
       <label>OCCUPATION</label>
        <input type="text" class="form-control input-sm" name="guardian_occupation" >
     </div>
    </div>
     </div>
     <div class="col-md-6">
      <div class="guardian-div">
      <div class="form-group">
       <label>NAME OF FIRM OR EMPLOYER</label>
        <input type="text" class="form-control input-sm" name="guardian_firm">
     </div>
     <div class="form-group">
      <label>TEL. NO. (RESIDENCE)</label>
      <div class="input-group date">
        <span class="input-group-addon">
         <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="guardian_residence_tel" >
      </div>
  </div>
  <div class="form-group">
      <label>TEL. NO. (OFFICE)</label>
      <div class="input-group date">
        <span class="input-group-addon">
         <i class="fa fa-calendar"></i>
        </span>
        <input type="text" class="form-control input-sm" name="guardian_office_tel" >
      </div>
  </div>



      <div class="form-group">
     <label>HOME ADDRESS</label>
      <textarea class="form-control input-sm" rows="2" name="guardian_home_address" ></textarea>
    </div>
  </div>
  </div>

  </div>

</div>

</div>

<div class="col-md-4">
  <div class="wyred-box-header">
    <h3 class="wyred-box-title"><i class="fa fa-camera"></i> Picture</h3>
  </div>
  <div class="wyred-box-body">
  <div class="row">
        <label class="control-label">UPLOAD PHOTO</label>
        <input id="input-1" type="file" name="image_upload" class="fileInput image-upload  btn-sm" data-show-preview="true" data-show-upload="false" data-allowed-file-extensions='["jpg","png"]'>
  </div>
 </div>


 </div>
</form>

<div class="col-md-8">
  <div class="wyred-box-footer">
    <div class="pull-right wyred-button col-md-2 ">
      <button class="btn btn-info btn-block wyredModalCallback" data-toggle="modal"  data-url="/admin/new-student/registration" data-form="studentRegistrationForm" data-target="#wyredSaveModal">SAVE</button>
    </div>
  </div>
</div>




@include('admin.modal-forms.security')


@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')

<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/plugins/chartjs/Chart.min.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>
<script src="/assets/js/plugins/switchery/switchery.js"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>
<script>

$(document).on('ready', function() {

    $('.father_id').select_binder();
    $('.mothers_id').select_binder();
    $('.guardian_id').select_binder();

    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { color: '#1AB394' });

    $(".fileInput").fileinput();

    $('.fileInput').on('fileerror', function(event, data, msg) {
       
       var obj = this;

        swal({   
          title: "Uploading warning!",  
          text: "Sorry we require you to upload a jpg and png file only. Uploaded file will be removed in 2 secs.",
          timer: 5000
        });

        setTimeout(function(){

          console.log(obj);
          $(obj).fileinput('clear');

        }, 2000);

    });
});

$(document).ready(function(){


  $('#father-select').hide();
  $('#mother-select').hide();
  $('#guardian-select').hide();

	$('.bday .input-group.date').datepicker({
		startView: 2,
		todayBtn: "linked",
		keyboardNavigation: false,
		forceParse: false,
		autoclose: true
	});


  $('.guardian-div').hide();
  $('#guardian-select').show();

  $('#guardian_check').click(function(){

      if($(this).is(":checked")) {
          $('.guardian-div').hide();
          $('#guardian-select').show();

      }else{

          $('.guardian-div').show();
          $('#guardian-select').hide();
      }
  });


  $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
  });
});
//
   $('#default').change(function(){
    if(this.checked == true){
        $('#father-div').show();
        $('#mother-div').show();
    }else {
       $('#father-select').hide();
       $('#mother-select').hide();
    }

        $('#father-select').hide();
       $('#mother-select').hide();
    });

   $('#checkParents').change(function(){
    if(this.checked == true){
        $('#father-select').show();
        $('#mother-select').show();
        $('#father-div').hide();
        $('#mother-div').hide();
    }else {
       $('#father-select').hide();
       $('#mother-select').hide();
       $('#father-div').show();
       $('#mother-div').show();
    }
    });

    $('#with-out-father').change(function(){
    if(this.checked == true){
        $('#father-div').show();
        $('#mother-select').show();
        $('#father-select').hide();
        $('#mother-div').hide();
    }else {
       $('#father-select').hide();
       $('#mother-select').hide();
       $('#father-div').show();
       $('#mother-div').show();
    }
    });

    $('#with-out-mother').change(function(){checkParents
    if(this.checked == true){
        $('#mother-div').show();
        $('#father-select').show();
        $('#mother-select').hide();
        $('#father-div').hide();
    }else {
       $('#father-select').hide();
       $('#mother-select').hide();
       $('#father-div').show();
       $('#mother-div').show();
       
    }
    
  }); 

  
 

</script>


@stop