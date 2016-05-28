<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use App\Parents;
use App\Parents_Students;
use DB;

class MiscController extends Controller
{
    public function truncate(){
    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	Students::truncate();
    	Parents::truncate();
    	Parents_Students::truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
