<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Parents;
use App\Parents_Students;
use App\Religion;
use App\Nationality;
use App\Occupation;

class AutoSuggestController extends Controller
{


	public function getBuilding(){

		$data  = Building::where('building_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('building_name','asc')
    		->get();

    	return $data;

	}

    public function getFather(){

        $data = Parents::whereHas('Parents_Students', function($q){

            $q->where('parental_type_id', '=', '2');

        })->where('parents_name', 'like', '%'.Request::input('inputVal').'%')->get();

        return $data;

    } 

    public function getMother(){

        $data = Parents::whereHas('Parents_Students', function($q){

            $q->where('parental_type_id', '=', '1');

        })->where('parents_name', 'like', '%'.Request::input('inputVal').'%')->get();

        return $data;

    } 

    public function getReligiion(){

        $data = Religion::where('religion_name', 'like', '%'.Request::input('inputVal').'%')->get();

        return $data;

    }    

    public function getNationality(){

        $data = Nationality::where('nationality_name', 'like', '%'.Request::input('inputVal').'%')->get();
        return $data;

    } 

    public function getOccupation(){

        $data = Occupation::where('designation_name', 'like', '%'.Request::input('inputVal').'%')->get();
        return $data;

    }     

    
}
