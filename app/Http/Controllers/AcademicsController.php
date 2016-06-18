<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;


use App\Http\Controllers\controller_retrieve;
use App\Http\Controllers\Controller;
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
use App\Schedule;
use App\DtAssignSubject;
use App\HandleSubjects;
use DatatableFormat;

class AcademicsController extends Controller
{
    
    public function subjectAssigningSections(){


        if(Request::input('schedule_id') != ""){
            return $this->updateSubjectAssigningSections();
        }

        $Schedule                 = new Schedule();
        $Schedule->section_id     = Request::input('section_id');
        $Schedule->employee_id    = Request::input('adviser');
        $Schedule->slot           = Request::input('slot');
        $Schedule->start_time     = Request::input('section_start_time').":00 ".Request::input('section_start_time_type');
        $Schedule->end_time       = Request::input('section_end_time').":00 ".Request::input('section_end_time_type');
        $Schedule->class_type_id  = Request::input('class_type_id');
        $Schedule->school_year_id = Request::input('school_year_id');
        $Schedule->save();

        $ScheduleId = $Schedule->max('schedule_id');


        $count  = 0;

        for($h = 0; $h <= count(Request::input('weekdays'))-1 ; $h++){

            for($i = 0; $i <= count(Request::input('assign_subject_id'.Request::input('weekdays')[$h]))-1 ; $i++){
                
                $weekdays_id = Request::input('weekdays')[$h];
                $assignSubjectId = Request::input('assign_subject_id'.$weekdays_id)[$i];
                $uniqueCombo = $weekdays_id.$assignSubjectId;
                $checkId = "check".$weekdays_id.$assignSubjectId;
                $employee_id = Request::input('employee_id'.$uniqueCombo);
                $start_time_type = Request::input('start_time_type'.$uniqueCombo);
                $start_time = Request::input('start_time'.$uniqueCombo).":00 ".$start_time_type;
                $end_time_type = Request::input('end_time_type'.$uniqueCombo);
                $end_time = Request::input('end_time'.$uniqueCombo).":00 ".$end_time_type;


                if(Request::input($checkId) == "true"){

                    $count++; 
                    $HandleSubjects                    = new HandleSubjects();
                    $HandleSubjects->assign_subject_id = $assignSubjectId;
                    $HandleSubjects->start_time        = $start_time;
                    $HandleSubjects->end_time          = $end_time;
                    $HandleSubjects->schedule_id       = $ScheduleId;
                    $HandleSubjects->weekdays_id       = $weekdays_id;
                    $HandleSubjects->employee_id       = $employee_id;
                    $HandleSubjects->save();

                }

                
            }
        }

        $return = new rrdReturn();
        return $return->status(true)
                      ->message("Subjects has been successfully assigned!".$count)
                      ->show();
    }

    public function updateSubjectAssigningSections(){


        $Schedule                 = Schedule::find(Request::input('schedule_id'));
        $Schedule->section_id     = Request::input('section_id');
        $Schedule->employee_id    = Request::input('adviser');
        $Schedule->slot           = Request::input('slot');
        $Schedule->start_time     = Request::input('section_start_time').":00 ".Request::input('section_start_time_type');
        $Schedule->end_time       = Request::input('section_end_time').":00 ".Request::input('section_end_time_type');
        $Schedule->class_type_id  = Request::input('class_type_id');
        $Schedule->school_year_id = Request::input('school_year_id');
        $Schedule->save();

        $ScheduleId = Request::input('schedule_id');
        
        HandleSubjects::where('schedule_id',$ScheduleId)->delete();

        $count  = 0;

        for($h = 0; $h <= count(Request::input('weekdays'))-1 ; $h++){

            for($i = 0; $i <= count(Request::input('assign_subject_id'.Request::input('weekdays')[$h]))-1 ; $i++){
                
                $weekdays_id = Request::input('weekdays')[$h];
                $assignSubjectId = Request::input('assign_subject_id'.$weekdays_id)[$i];
                $uniqueCombo = $weekdays_id.$assignSubjectId;
                $checkId = "check".$weekdays_id.$assignSubjectId;
                $employee_id = Request::input('employee_id'.$uniqueCombo);
                $start_time_type = Request::input('start_time_type'.$uniqueCombo);
                $start_time = Request::input('start_time'.$uniqueCombo).":00 ".$start_time_type;
                $end_time_type = Request::input('end_time_type'.$uniqueCombo);
                $end_time = Request::input('end_time'.$uniqueCombo).":00 ".$end_time_type;


                if(Request::input($checkId) == "true"){

                    $count++; 
                    $HandleSubjects                    = new HandleSubjects();
                    $HandleSubjects->assign_subject_id = $assignSubjectId;
                    $HandleSubjects->start_time        = $start_time;
                    $HandleSubjects->end_time          = $end_time;
                    $HandleSubjects->schedule_id       = $ScheduleId;
                    $HandleSubjects->weekdays_id       = $weekdays_id;
                    $HandleSubjects->employee_id       = $employee_id;
                    $HandleSubjects->save();

                }

                
            }
        }

        $return = new rrdReturn();
        return $return->status(true)
                      ->message("Section Subjects has been successfully updated!")
                      ->show();
    }

    public function getSchedules(){

        $data = Schedule::with('RfSection','RfSection.getGradeLevel','RfSchoolYear')->get();

        $datatableFormat = new DatatableFormat();
        return $datatableFormat->format($data);
    }
            


}
