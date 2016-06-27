<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;
use App\RfSection;
use App\StudentSchedule;
use App\Schedule;
use App\KronosEmployee;
class EnrollmentController extends Controller
{
    public function getEnrollees(Request $request){


    	$sched = StudentSchedule::with('Students')
    					->where('schedule_id',$request['schedule_id'])
    					->get();			

		$datatableFormat = new DatatableFormat();
  		return $datatableFormat->format($sched);

    }
	public function getAdviser(Request $request){
		$id = $request['schedule_id'];
		$adviser = Schedule::with('getAdviser','RfSection.getSectionType','StudentSchedule')->where('schedule_id',$id)->first();
		$slot = StudentSchedule::where('schedule_id',$id)->count();
		$adviser->enrolled = $slot;
//		print_r($adviser);
		return $adviser;
	}
}
