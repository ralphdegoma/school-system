@extends('sms.main.index')

@section('css_filtered')

@include('admin.csslinks.css_crud')
<link href="/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/assets/css/plugins/switchery/switchery.css" rel="stylesheet">

@stop

@section('content')
<form role="form" id="studentRegistrationForm"  enctype="multipart/form-data">
<div class="col-md-8">
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-user"></i>Registration
    </div>
    <div class="tools">
    
    </div>
  </div>
  <div class="portlet-body">
  <div class="row">
    <div class="col-md-12">
          <!--    <div class="form-group form-md-line-input col-md-12">
     <label>STUDENT ID</label> -->
      <input type="hidden"  class="form-control input-sm" value="{{$student->student_id or ""}}"  name="student_id_old" >
    <!--   <input type="text"  class="form-control input-sm" value="{{$student->student_id or ""}}"  name="student_id" required>
    </div> -->
    <div class="col-md-6">
      <div class="form-group form-md-line-input ">
        <input type="text"  class="form-control input-sm" value="{{$student->first_name or ""}}" name="first_name" placeholder="Enter First Name" required>
        <label>FIRST NAME</label>
        <!-- <span class="help-block">Some help goes here...</span> -->
      </div>
       <div class="form-group form-md-line-input">
        <input type="text"  class="form-control input-sm" value="{{$student->middle_name or ""}}" name="middle_name" required>
        <label >MIDDLE NAME</label>
      </div>
      <div class="form-group form-md-line-input">
        <input type="text"  class="form-control input-sm" value="{{$student->last_name or ""}}" name="last_name" required>
        <label>LAST NAME</label>
      </div>
       <div class="form-group form-md-line-input">
        <input type="text"  class="form-control input-sm" value="{{$student->name_extension or ""}}" name="name_extension" >
        <label>NAME EXTENSION</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group form-md-line-input">
          <input type="text"  class="form-control input-sm" value="{{$student->nick_name or ""}}" name="nick_name" >
         <label>NICK NAME</label>
        </div>
      <div class="form-group form-md-line-input">
        <select class="form-control input-sm" name="gender"  required>
          <option >Male</option>
          <option>Female</option>
        </select>
       <label>GENDER</label>
      </div>
      <div class="form-group form-md-line-input bday">
        <div class="input-group date">
          <span class="input-group-addon">
           <i class="fa fa-calendar"></i>
          </span>
          <input type="text" class="form-control input-sm" value="{{$student->birthday or ""}}"   name="birthday" required>
        <label>BIRTHDAY</label>
        </div>
     </div>
   </div>
   <div class="col-md-12">
      <div class="form-group form-md-line-input">
        <textarea class="form-control input-sm" rows="2" value="" name="birthplace" required>{{$student->birthplace or ""}}</textarea>
      <label>BIRTHPLACE</label>
      </div>
      <div class="form-group form-md-line-input col-md-12">
        <textarea class="form-control input-sm" rows="2" name="home_address" value="" required>{{$student->home_address or ""}}</textarea>    
       <label>HOME ADDRESS</label>
      </div>
    </div>
      <div class="form-group form-md-line-input col-md-6">
      <div class="input-group date">
        <span class="input-group-addon">
         <i class="fa fa-mobile"></i>
        </span>
        <input type="text" class="form-control input-sm" value="{{$student->cp_no or ""}}" name="cp_no" >      
      <label>CELLPHONE NO</label>
      </div>
  </div>
    <div class="form-group form-md-line-input col-md-6">
      <div class="input-group date">
        <span class="input-group-addon">
         <i class="fa fa-phone"></i>
        </span>
        <input type="text" class="form-control input-sm" value="{{$student->tel_no or ""}}" name="tel_no" >
        <label>TEL. NO. LANDLINE</label>
      </div>
  </div>




    <div class="col-md-12">
      <div class="form-group form-md-radios">
        <label>Parents Options</label>
          <div class="form-group">
            <input type="radio" id="default" value="default" name="parental" checked class="radio-primary">
            <label for="radio1">
            Default </label>
          </div>
          <div class="form-group">
            <input type="radio" id="checkParents" value="checkParents" name="parental" class="md-radiobtn">
            <label for="radio">
            Both Parents Already Exist </label>
          </div>
            <div class="form-group">
            <input type="radio" id="with-out-father" value="with-out-father" name="parental" class="md-radiobtn">
            <label for="radio">
            Only Mother Already Exist </label>
          </div>
          <div class="form-group">
            <input type="radio" id="with-out-mother" value="with-out-mother" name="parental" class="md-radiobtn">
            <label for="radio">
            Only Father Already Exist </label>
          </div>


      </div>

    </div>




@if(!empty($student))
  @foreach($student->parents_students as $parents)
      @if($parents->parental_type_id == '2')<!-- FATHER -->
            <div class="col-md-6">
            <div class="form-group form-md-line-input" id="father-select">
                <select class="form-control input-sm select2 father_id"  data-url="/select-binder/get-father" data-id="parent_id" data-name='parents_name' name="father_id">
                  <option></option>
                </select>
                <label>FATHER NAME</label>
              </div>
              <div id="father-div">
             <div class="form-group form-md-line-input">
                  <input type="hidden" value="{{$parents->parents->parent_id or ""}}" class="form-control input-sm"  name="father_parent_id" >
                  <input type="text"  value="{{$parents->parents->parents_name or ""}}" class="form-control input-sm father_input" name="fathers_name" required>
                 <label>FATHER NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" value="{{$parents->parents->dob or ""}}" class="form-control input-sm" name="fathers_dob">
                   <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="{{$parents->parents->religion->religion_name or ""}}" name="fathers_religion" required>
                  <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="fathers_nationality" required>
                  <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="fathers_occupation" >
                  <label>OCCUPATION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}" name="fathers_firm">
                  <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="fathers_residence_tel">
                   <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->office_tel or ""}}" name="fathers_office_tel">
                  <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2"  name="fathers_home_address" >{{$parents->parents->home_address or ""}}</textarea>
                 <label>HOME ADDRESS</label>
              </div>
            </div>
          </div>
    @endif
  @endforeach

  @else<!-- BLANK TEMPLATE -->
      <div class="col-md-6">
            <div class="form-group form-md-line-input" id="father-select">
                <select class="form-control input-sm select2 father_id" required  name="father_id">
                  <option></option>
                </select>
                <label>FATHER NAME</label>
              </div>

              <div id="father-div">
             <div class="form-group form-md-line-input">
                  <input type="text" value="{{$parents->parents->parents_name or ""}}" class="form-control input-sm father_input"  data-display='parents_name' name="fathers_name" required name="fathers_name" required="">
                  <label>FATHER NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" value="{{$parents->parents->dob or ""}}" class="form-control input-sm" name="fathers_dob">
                  <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input"  value="{{$parents->parents->religion->religion_name or ""}}" name="fathers_religion" required>
                 <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="fathers_nationality" required>                
                 <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="fathers_occupation" >
                <label>OCCUPATION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}" name="fathers_firm">
                <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="fathers_residence_tel">
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->office_tel or ""}}" name="fathers_office_tel">
                  <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2"  name="fathers_home_address" >{{$parents->parents->home_address or ""}}</textarea>
                <label>HOME ADDRESS</label>
              </div>
            </div>
          </div>
@endif




@if(!empty($student))
    @foreach($student->parents_students as $parents)
      @if($parents->parental_type_id == '1')<!-- MOTHER -->
            <div class="col-md-6">
            <div class="form-group form-md-line-input" id="mother-select">
                <select class="form-control input-sm select2 mothers_id" name="mothers_id" name="mothers_name" data-url="/select-binder/get-mother" data-id="parent_id" data-name='parents_name' required>
                  <option></option>
                </select>
                 <label>MOTHER NAME</label>
              </div>
              <div id="mother-div">
             <div class="form-group form-md-line-input">
                  <input type="hidden" value="{{$parents->parents->parent_id or ""}}" class="form-control input-sm"  name="mother_parent_id" >
                  <input type="text" class="form-control input-sm mother_input" value="{{$parents->parents->parents_name or ""}}" name="mothers_name"  required>
                <label>MOTHER NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->dob or ""}}" name="mothers_dob" >
                  <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="{{$parents->parents->religion->religion_name or ""}}" name="mothers_religion" required>
                <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="mothers_nationality" required>
                  <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="mothers_occupation" >
                <label>OCCUPATION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}" name="mothers_firm">
                <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="mothers_residence_tel" >
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->office_tel or ""}}" name="mothers_office_tel" >
                  <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2" name="mothers_home_address" >{{$parents->parents->home_address or ""}}</textarea>
              <label>HOME ADDRESS</label>
              </div>
            </div>
            </div>
        @endif
    @endforeach

    @else<!-- BLANK TEMPLATE -->
         <div class="col-md-6">
            <div class="form-group form-md-line-input" id="mother-select">
                <select class="form-control input-sm select2 mothers_id" name="mothers_id" name="mothers_name" data-url="/select-binder/get-mother" data-id="parent_id" data-name='parents_name' required>
                  <option></option>
                </select>
                <label>MOTHER NAME</label>
              </div>
              <div id="mother-div">
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm mother_input" value="{{$parents->parents->parents_name or ""}}" name="mothers_name"  required>
                 <label>MOTHER NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->dob or ""}}" name="mothers_dob" >
                <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="{{$parents->parents->religion->religion_name or ""}}" name="mothers_religion" required>
                <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="mothers_nationality" required>
                  <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="mothers_occupation" >
                   <label>OCCUPATION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}" name="mothers_firm">
                  <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="mothers_residence_tel" >
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->office_tel or ""}}" name="mothers_office_tel" >
                   <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2" name="mothers_home_address" >{{$parents->parents->home_address or ""}}</textarea>
                <label>HOME ADDRESS</label>
              </div>
            </div>
            </div>

@endif



  <div class="col-md-12">
   <div class="hr-line-dashed"></div>
    <h3><i class="fa fa-info-circle"></i> IF NOT LIVING WITH PARENTS</h3>
  </div>

  <div class="col-md-12">
      
      <div class="checkbox checkbox-primary">
          <input type="checkbox" checked id="guardian_check" name="guardian_check" >
          <label for="guardian_check">GUARDIAN NAME ALREADY EXIST</label>
      </div>
  </div>




@if(!empty($student))

  @if(empty($student->parents_students))
    @foreach($student->parents_students as $parents)
        @if($parents->parental_type_id == '3')<!-- guardian -->
            <div class="col-md-6">
            <div class="form-group form-md-line-input" id="guardian-select">
                <select class="form-control input-sm select2 guardian_id" name="guardian_id" name="guardian_id" data-url="/select-binder/get-guardian" data-id="parent_id" data-name='parents_name' >
                  <option></option>
                </select>
                <label>GUARDIAN NAME</label>
              </div>

            <div class="form-group form-md-line-input">
                <input type="text" class="form-control input-sm" value="{{$parents->relationships->relationship_name or ""}}" name="relationship_name" >
                <label>RELATIONSHIP</label>
             </div>
            <div class="guardian-div">
             <div class="form-group form-md-line-input">
                  <input type="hidden" value="{{$parents->parents->parent_id or ""}}" class="form-control input-sm"  name="guardian_parent_id" >
                  <input type="text" class="form-control input-sm" name="guardian_name" value="{{$parents->parents->parents_name or ""}}" >
                 <label>GUARDIAN NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_birthday" value="{{$parents->parents->dob or ""}}">
                  <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="{{$parents->parents->religion->religion_name or ""}}" name="guardian_religion" >
                 <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="guardian_nationality" >
                   <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="guardian_occupation" >
                   <label>OCCUPATION</label>
               </div>
              </div>
               </div>


               <div class="col-md-6">
                <div class="guardian-div">
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}"  name="guardian_firm">
                   <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="guardian_residence_tel" >
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_office_tel" value="{{$parents->parents->office_tel or ""}}">
                  <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>



                <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2" name="guardian_home_address" >{{$parents->parents->home_address or ""}}</textarea>
                <label>HOME ADDRESS</label>
              </div>
            </div>
            </div>
       
    @endif
  @endforeach
  @else

            <div class="col-md-6">
            <div class="form-group form-md-line-input" id="guardian-select">
                <select class="form-control input-sm select2 guardian_id" name="guardian_id" name="guardian_id" data-url="/select-binder/get-guardian" data-id="parent_id" data-name='parents_name' >
                  <option></option>
                </select>
                <label>GUARDIAN NAME</label>
              </div>

            <div class="form-group form-md-line-input">
                <input type="text" class="form-control input-sm" value="" name="relationship_name" >
               <label>RELATIONSHIP</label>
             </div>
            <div class="guardian-div">
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" name="guardian_name" value="" >
                 <label>GUARDIAN NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_birthday" value="">
                   <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="" name="guardian_religion" >
                  <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input"  value="" name="guardian_nationality" >
                    <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="" name="guardian_occupation" >                 
                 <label>OCCUPATION</label>
               </div>
              </div>
               </div>

               <div class="col-md-6">
                <div class="guardian-div">
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value=""  name="guardian_firm">
                  <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="" name="guardian_residence_tel" >
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_office_tel" value="">
                   <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>



                <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2" name="guardian_home_address" ></textarea>
                 <label>HOME ADDRESS</label>
              </div>
            </div>
            </div>

  @endif
@else
          <div class="col-md-6">
            <div class="form-group form-md-line-input" id="guardian-select">
                <select class="form-control input-sm select2 guardian_id" name="guardian_id" name="guardian_id" data-url="/select-binder/get-guardian" data-id="parent_id" data-name='parents_name' >
                  <option></option>
                </select>
                <label>GUARDIAN NAME</label>
              </div>

            <div class="form-group form-md-line-input">
                <input type="text" class="form-control input-sm" value="{{$parents->parents->relationships->relationship_name or ""}}" name="relationship_name" >
               <label>RELATIONSHIP</label>
             </div>
            <div class="guardian-div">
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" name="guardian_name" value="{{$parents->parents->parents_name or ""}}" >
                 <label>GUARDIAN NAME</label>
               </div>
               <div class="form-group form-md-line-input bday">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_birthday" value="{{$parents->parents->dob or ""}}">
                   <label>BIRTHDAY</label>
                </div>
            </div>
             <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm religion_input" value="{{$parents->parents->religion->religion_name or ""}}" name="guardian_religion" >
                  <label>RELIGION</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm nationality_input" value="{{$parents->parents->nationality->nationality_name or ""}}" name="guardian_nationality" >
                    <label>NATIONALITY</label>
               </div>
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm occupation_input" value="{{$parents->parents->occupation->designation_name or ""}}" name="guardian_occupation" >                 
                 <label>OCCUPATION</label>
               </div>
              </div>
               </div>

               <div class="col-md-6">
                <div class="guardian-div">
                <div class="form-group form-md-line-input">
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->firm_employer_name or ""}}"  name="guardian_firm">
                  <label>NAME OF FIRM OR EMPLOYER</label>
               </div>
               <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" value="{{$parents->parents->residence_tel or ""}}" name="guardian_residence_tel" >
                  <label>TEL. NO. (RESIDENCE)</label>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <div class="input-group date">
                  <span class="input-group-addon">
                   <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" class="form-control input-sm" name="guardian_office_tel" value="{{$parents->parents->office_tel or ""}}">
                   <label>TEL. NO. (OFFICE)</label>
                </div>
            </div>



                <div class="form-group form-md-line-input">
                <textarea class="form-control input-sm" rows="2" name="guardian_home_address" >{{$parents->parents->home_address or ""}}</textarea>
                 <label>HOME ADDRESS</label>
              </div>
            </div>
            </div>
            
@endif
       </div>  
    </div>
  </div>
  </div>
</div>

 

<div class="col-md-4">
<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-camera"></i>Picture
    </div>
    <div class="tools">
     
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12">
        <label class="control-label">UPLOAD PHOTO</label>
        <input id="input-1 pull-right" type="file" name="image_upload" class="fileInput image-upload  btn-sm" data-show-preview="true" data-show-upload="false" data-allowed-file-extensions='["jpg","png"]'>
      </div>
    </div>
    
  </div>
  </div>
 <!-- BEGIN SAMPLE FORM PORTLET-->
</div>

</form>

<div class="col-md-8" style="margin-top:-40px;">
   <div class="wyred-box-footer">
    <div class="pull-right wyred-button col-md-2 ">
      <button class="btn btn-info btn-block wyredModalCallback" data-toggle="modal"  data-url="/admin/new-student/registration" data-form="studentRegistrationForm" data-target="#wyredSaveModal">SAVE</button>
    </div>
  </div>
</div>




<!-- 
@include('admin.modal-forms.security')
 -->

@stop
@section('js_filtered')
@include('admin.jslinks.js_crud')

<script src ="/assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/js/plugins/iCheck/icheck.min.js"></script>
<script src="/assets/js/plugins/switchery/switchery.js"></script>

<script>

$(document).on('ready', function() {

    $('.religion_input').autosuggest({
          data_url :"/autosuggest/getReligiion",
          data_display : 'religion_name'
    });

    $('.father_input').autosuggest({
          data_url :"/autosuggest/getFather",
          data_display : 'parents_name'
    });

    $('.nationality_input').autosuggest({
          data_url :"/autosuggest/getNationality",
          data_display : 'nationality_name'
    });

    $('.occupation_input').autosuggest({
          data_url :"/autosuggest/getOccupation",
          data_display : 'designation_name'
    });

    $('.mother_input').autosuggest({
          data_url :"/autosuggest/getMother",
          data_display : 'parents_name'
    });

    @if(!empty($student))

        $('.guardian-div').show();
        $('#guardian-select').hide();
        
        var image_link = '<img src="/assets/people/students/{{$student_id}}/images/medium.jpg" alt="Your Avatar" style="width:160px">';
    @else
        var image_link = '<img src="/assets/img/default.png" alt="Your Avatar" style="width:160px">';    
    @endif

    var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
                  'onclick="alert(\'Call your custom code here.\')">' +
                  '<i class="glyphicon glyphicon-tag"></i>' +
                  '</button>'; 

    $(".fileInput").fileinput({

          overwriteInitial: true,
          maxFileSize: 1500,
          maxImageWidth: 200,
          maxImageHeight: 150,
          resizePreference: 'height',
          maxFileCount: 1,
          resizeImage: true,
          showClose: false,
          showCaption: false,
          browseLabel: '',
          removeLabel: '',
          browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
          removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
          removeTitle: 'Cancel or reset changes',
          elErrorContainer: '#kv-avatar-errors',
          msgErrorClass: 'alert alert-block alert-danger',
          defaultPreviewContent: image_link,
          allowedFileExtensions: ["jpg", "png", "gif"]
    });


    $('.father_id').select_binder();
    $('.mothers_id').select_binder();
    $('.guardian_id').select_binder();

    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, { color: '#1AB394' });

   

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