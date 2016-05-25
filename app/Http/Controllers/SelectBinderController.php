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
}
