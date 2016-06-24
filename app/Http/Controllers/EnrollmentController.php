<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;
use App\RfSection;
use App\StudentSchedule;
class EnrollmentController extends Controller
{
    public function getEnrollees(Request $request){

    	$sched = StudentSchedule::with('Students')
    					->where('schedule_id',$request['schedule_id'])
    					->get();			
    		
		$datatableFormat = new DatatableFormat();
  		return $datatableFormat->format($sched);

    }
}
