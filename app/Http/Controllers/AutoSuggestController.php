<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\PropertyStatus;
use App\Building;
use App\Storey;
use App\Section;
use App\Category;
use App\SubCategory;
use App\PropModel;
use App\Classification;
use App\Group;


class AutoSuggestController extends Controller
{


	public function getBuilding(){

		$data  = Building::where('building_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('building_name','asc')
    		->get();

    	return $data;

	}


	public function getStorey(){

		$data  = Storey::where('storey_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('storey_name','asc')
    		->get();

    	return $data;

	}

	public function getSection(){

		$data  = Section::where('section_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('section_name','asc')
    		->get();

    	return $data;

	}

	public function getCategory(){

		$data  = Category::where('category_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('category_name','asc')
    		->get();

    	return $data;

	}


	public function getSubCategory(){

		$data  = SubCategory::where('subcat_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('subcat_name','asc')
    		->get();

    	return $data;

	}

	public function getModel(){

		$data  = Model::where('model_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('model_name','asc')
    		->get();

    	return $data;

	}

	public function getBrand(){

		$data  = Brand::where('brand_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('brand_name','asc')
    		->get();

    	return $data;

	}

	public function getClassification(){

		$data  = Classification::where('classification_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('classification_name','asc')
    		->get();

    	return $data;

	}

	public function getGroup(){

		$data  = Group::where('group_name', 'like', '%'.Request::input('inputVal').'%')
    		->take(5)
    		->orderby('group_name','asc')
    		->get();

    	return $data;

	}

    
}
