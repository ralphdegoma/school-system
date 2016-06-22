<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;
use App\RfSection;

class EnrollmentController extends Controller
{
    public function getEnrollees(Request $request){


    	$section = new RfSection();
    	$scheduleSection = $section->with('getGradeLevel','getSectionType','Schedule','Schedule.StudentSchedule','Schedule.StudentSchedule.Students')
    			->getEnrollees($request['schedule_id'])
    			->get();

    	dd($scheduleSection);		
		$datatableFormat = new DatatableFormat();
  		return $datatableFormat->format($scheduleSection);

    }
}
