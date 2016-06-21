<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use DB;
use DatatableFormat;
use App\PropertyStatus;
use App\Type;
use App\Person;
use App\Group;
use App\Parents;
use App\Parents_Students;
use App\RfGradeType;
use App\RfGradeLevel;
use App\RfSection;
use App\KronosEmployee;
use App\Students;
use App\Schedule;


class SelectBinderController extends Controller
{
   
    public function getFather(){

            $Parents_Students  =  Parents::whereHas('Parents_Students', function($q){
			    $q->where('parental_type_id', '=', '2');//FATHER
			})->where('parents_name', '<>', '')->groupBy('parents_name')->get();


        	return $Parents_Students;
    }

    public function getMother(){

    		$Parents_Students  =  Parents::whereHas('Parents_Students', function($q){
			    $q->where('parental_type_id', '=', '1');//MOTHER
			})->where('parents_name', '<>', '')->groupBy('parents_name')->get();


        	return $Parents_Students;

    }

    public function getGuardian(){

            $Parents_Students  =  Parents::where('parents_name', '<>', '')->groupBy('parents_name')->get();


            return $Parents_Students;

    }
    public function getGradeLevel(){


            $RfGradeLevel =  RfGradeLevel::where('grade_type_id',Request::input('filter_id'))
                    ->get();

            return $RfGradeLevel;
    }

    public function getSectionName(){

            $RfSection =  RfSection::where('grade_level_id',Request::input('filter_id'))
                    ->get();

            return $RfSection;
    }

    public function KronosEmployee(){

            $KronosEmployee =  KronosEmployee::all();

            return $KronosEmployee;
    }

    public function getStudents(){

        $data = Students::select(DB::raw("CONCAT( last_name,', ',first_name,' ',middle_name) AS full_name, student_id"))->get();
        return $data;
    }

    public function getSectionTime(){

        $data = RfSection::select(DB::raw("CONCAT( dt_schedule.start_time,'-',dt_schedule.end_time) AS time"))
                ->leftjoin('dt_schedule','dt_schedule.section_id','=','rf_section.section_id')
                ->where('dt_schedule.schedule_id',"<>",null)
                ->where('rf_section.grade_level_id',Request::input('filter_id'))
                ->groupBy('dt_schedule.start_time')
                ->groupBy('dt_schedule.end_time')
                ->get();

        return $data;
    }

    public function getSection(){

        $time = explode("-", Request::input('filter_id'));

        $data = Schedule::where('start_time',$time[0])
                        ->where('end_time',$time[1])
                        ->leftjoin('rf_section','rf_section.section_id','=','dt_schedule.section_id')
                        ->groupBy('dt_schedule.section_id')
                        ->get();

        return $data;
    }

    
}
