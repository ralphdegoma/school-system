<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;

use App\Type;


class PropertyTypeController extends Controller
{
    

    public function propertyTypeSave(){

      $Type                 = new Type;
      $Type->prop_type_name = Request::input('prop_type_name');
      $Type->save();

  		$return = new rrdReturn();
      return $return->status(true)
                            ->message("New Property Type has been saved!")
                            ->show();
    }


    public function getPropertyType(){

    	
    }
}
