<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DatatableFormat;
use App\Http\Requests;
use App\RfFeeCategories;
use Validator;
use App\RfFees;
use App\DtBilling;
class BillingController extends Controller
{
    //
    public function saveCategory(Request $request){

    	$return = new rrdReturn();
    	$validator = Validator::make($request->all(), [
            'title' => 'required|unique:rf_fee_categories',
        ]);
         if ($validator->fails()) {
				return $return->status(false)
	                      ->message("Title Already been Created!.")
	                      ->show();
         }
         else{
         	$title = new RfFeeCategories;
         	$title->title = $request['title'];
         	$title->save();
         }
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
    }

    public function saveFees(Request $request){
    	$return = new rrdReturn();
    	$checker = RfFees::where('title',$request['title'])
    						->where('description',$request['description'])
    						->where('fee_categories_id',$request['category'])
    						->where('account_code',$request['account'])
    						->count();

    		if($checker > 0){
    			return $return->status(false)
	                      ->message("Fee Already been Created!.")
	                      ->show();
    		}
    		else{
    			$new = new RfFees;
    			$new->title 	  = $request['title'];
    			$new->description = $request['description'];
    			$new->fee_categories_id = $request['category'];
    			$new->account_code = $request['account'];
    			$new->save();

    			return $return->status(true)
	                      ->message("Fee has been Created!.")
	                      ->show();
    		}				

    }

    public function saveGradeFees(Request $request){
    		$return = new rrdReturn();

    		$checker = DtBilling::where('fees_id',$request['fees'])
    								->where('grade_level_id',$request['grade_level'])
    								->count();
    		if($checker > 0){
    				return $return->status(false)
	                      ->message("Grade Level Fee Has Been Created!.")
	                      ->show();
    		}
    		else{
    			$new = new DtBilling;
    			$new->amount = $request['amount'];
    			$new->fees_id = $request['fees'];
    			$new->grade_level_id = $request['grade_level'];
    			$new->save();

    			return $return->status(true)
	                      ->message("Successfull!.")
	                      ->show();

    		}

    }

    public function getCategory(){
    		$category = RfFeeCategories::all();

    		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($category);
    }
      public function getFees(){
    		$category = RfFees::with('getAccount')->get();

    		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($category);
    }
    public function getGradeFees(){
    		$category = DtBilling::with('getFees','getGrade')->get();

    		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($category);
    }

}
