<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use App\Parents;
use App\Parents_Students;
use App\HandleSubjects;
use App\DtAssignSubject;
use App\Schedule;
use App\StudentSchedule;

use DB;

class MiscController extends Controller
{
    public function truncate(){
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	Students::truncate();
    	Schedule::truncate();
    	StudentSchedule::truncate();
    	HandleSubjects::truncate();
    	Parents::truncate();
    	Parents_Students::truncate();
    	DtAssignSubject::truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
