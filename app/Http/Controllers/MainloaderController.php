<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\controller_retrieve;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


//=====data=====

use Auth;
use DB;
use Session;
use Mail;


use App\RfClassType;
use App\RfGradeType;
use App\RfSectionType;
use App\RfSchoolYear;
use App\RfSubjects;
use App\RfGradeLevel;

class MainloaderController extends Controller
{
    //

  	

    public function view(){

    	return view('sms.main.index');
    }
    

    
    public function home(){

      return view('sms.main.index');
    }

    public function studentRegistration(){
      
      return view('sms.registrar.student-registration');
    }

    

    public function enrollment(){
      $classType  = RfClassType::all();
      $gradeType  = RfGradeType::all();
      $subject    = RfSubjects::all();
      return view('sms.registrar.enrollment', compact('classType','gradeType','subject'));
    }

    public function enrolledStudent(){
      return view('sms.registrar.enrolled-student');
    }


    //B I L L I N G and F E E S

    public function studentBill(){
      return view('sms.billing.student-bill');
    }

    public function levelFees(){
      return view('sms.setup.grade-level-fees');
    }


    // S E T U P

    public function academicsSetup(){
      $classType    = RfClassType::all();
      $gradeType    = RfGradeType::all();
      $sectionType  = RfSectionType::all();
      $schoolYear   = RfSchoolYear::all();
      $subject      = RfSubjects::all();
      $gradeLevel   = RfGradeLevel::all();
      
      return view('sms.setup.academics', compact('classType','gradeType','sectionType','schoolYear','subject','gradeLevel'));
    }

    // K R O N O S

    public function timeAttendance(){
      return view('sms.kronos.time-attendance');
    }

    public function schedulling(){
      return view('sms.kronos.schedulling');
    }

   public function hr(){
      return view('sms.kronos.human-resource');
    }

}
