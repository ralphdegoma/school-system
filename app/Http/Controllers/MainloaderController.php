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
use App\RfAccount;
use App\RfFeeCategories;
use App\RfFees;
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


    // A C A D E M I C S

    public function academicsSetup(){
      $classType    = RfClassType::all();
      $gradeType    = RfGradeType::all();
      $sectionType  = RfSectionType::all();
      $schoolYear   = RfSchoolYear::all();
      $subject      = RfSubjects::all();
      $gradeLevel   = RfGradeLevel::all();
      
      return view('sms.setup.academics', compact('classType','gradeType','sectionType','schoolYear','subject','gradeLevel'));
    }

    public function schoolYear(){
      return view('sms.setup.school-year');
    }

    public function symonthTemplate(){
      return view('sms.setup.sy-month-template');
    }

    public function gradeLevel(){

      $gradeType    = RfGradeType::all();
      return view('sms.setup.grade-level',compact('gradeType'));
    }

    public function section(){

      $gradeType    = RfGradeType::all();
      $sectionType  = RfSectionType::all();
      return view('sms.setup.section',compact('gradeType','sectionType'));
    }

    public function subject(){
      return view('sms.setup.subject');
    }

    public function assignSubject(){
      $gradeType    = RfGradeType::all();
      $sectionType  = RfSectionType::all();
      $subject      = RfSubjects::all();
      return view('sms.setup.assign-subject',compact('subject','gradeType','sectionType'));
    }

    public function schedule(){
      $classType    = RfClassType::all();
      $gradeType    = RfGradeType::all();
      $schoolYear   = RfSchoolYear::all();
      return view('sms.setup.schedule',compact('gradeType','schoolYear','classType'));
    }

    //B I L L I N G and F E E S

    public function studentAssessment(){
      return view('sms.billing.assessment');
    }
    public function assignFees(){
      return view('sms.billing.assign-fees');
    }
    public function studentBill(){
      return view('sms.billing.student-bill');
    }




    // S E T U P - B I L L I N G


    public function categoryFee(){
      return view('sms.setup.fee-category');
    }

    public function setupFees(){

      $categories = RfFeeCategories::all();
      $accounts    = RfAccount::all();
      return view('sms.setup.fees',compact('categories','accounts'));
    }

    public function levelFees(){
        $gradeType    = RfGradeType::all();
        $fees = RfFees::all();
      return view('sms.setup.grade-level-fees',compact('gradeType','fees'));
    }

    public function paymentTypeSchedules(){
      return view('sms.setup.payment-type-schedule');
    }

    public function tuitionReference(){
      return view('sms.setup.tuition-reference');
    }

    public function dueDates(){
      return view('sms.setup.due-dates');
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
