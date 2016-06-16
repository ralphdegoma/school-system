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

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
use Schema;

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

    public function updatedAt(){

        $tables = DB::select('SHOW TABLES');
        
        foreach($tables as $table){

            try {
                
                    Schema::table($table->Tables_in_sms, function ($table) {
                        $table->date('updated_at');
                    });

            } catch (\Illuminate\Database\QueryException $e) {
                    
                    echo "duplicate bai!";
            }

        }

        
    }
}
