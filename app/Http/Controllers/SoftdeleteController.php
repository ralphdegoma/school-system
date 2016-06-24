<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Students;
use App\RfSchoolYear;
use App\RfGradeLevel;
use App\RfSection;
use App\RfSubjects;
use App\DtAssignSubject;
use DB;
use App\RfFeeCategories;
use App\RfFees;
use App\DtBilling;
class SoftdeleteController extends Controller
{
    public function deleteSchoolYear(){
        

        RfSchoolYear::destroy(Request::input('id'));

        $return = new rrdReturn();
        return $return->status(true)
                          ->message("School years has been temporarily removed from the system!.")
                          ->show();
    }

    public function deleteGradeLevel(){

    	  RfGradeLevel::destroy(Request::input('id'));

        $return = new rrdReturn();
        return $return->status(true)
                          ->message("Grade Level has been temporarily removed from the system!.")
                          ->show();
    }

    public function deleteSection(){

    	  RfSection::destroy(Request::input('id'));

        $return = new rrdReturn();
        return $return->status(true)
                          ->message("Section has been temporarily removed from the system!.")
                          ->show();
    }

    public function deleteSubject(){

        RfSubjects::destroy(Request::input('id'));

        $return = new rrdReturn();
        return $return->status(true)
                          ->message("Subject has been temporarily removed from the system!.")
                          ->show();
    }


    public function deleteAssignSubject(){

        DtAssignSubject::where('grade_level_id',Request::input('grade_level_id'))
                  ->where('section_type_id',Request::input('section_type_id'))
                  ->delete();

        $return = new rrdReturn();
        return $return->status(true)
                          ->message("Grade Level with specific section type has been successfully deleted!.")
                          ->show();
    }

    public function deleteFeeCategories(){
      RfFeeCategories::destroy(Request::input('id'));
       $return = new rrdReturn();
        return $return->status(true)
                          ->message("Fee Category has been temporarily removed from the system!.")
                          ->show();

    }
     public function deleteFees(){
      RfFees::destroy(Request::input('id'));
       $return = new rrdReturn();
        return $return->status(true)
                          ->message("Fee has been temporarily removed from the system!.")
                          ->show();

    }
    public function deleteBilling(){
      DtBilling::destroy(Request::input('id'));
      $return = new rrdReturn();
        return $return->status(true)
                          ->message("Grade Fee has been temporarily removed from the system!.")
                          ->show();
    }
}
