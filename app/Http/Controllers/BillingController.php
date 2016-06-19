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

        if($request['category_id'] != ""){
            $id=$request['category_id'];
            $title = $request['title'];
            return $this->updateCategory($id,$title);
        }

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
        if($request['fee_id'] != ""){
            $id=$request['fee_id'];
            $title = $request['title'];
            $description = $request['description'];
            $account_code = $request['account'];
            $category = $request['category'];
            return $this->updateFee($id,$title,$description,$account_code,$category);
        }
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
    		$category = RfFees::with('getAccount','getCategory')->get();

    		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($category);
    }
    public function getGradeFees(){
    		$category = DtBilling::with('getFees','getGrade')->get();

    		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($category);
    }

    public function updateCategory($id,$title){
        $return = new rrdReturn();
        $checker  = RfFeeCategories::where('title',$title)->count();
         if ($checker >0) {
                return $return->status(false)
                          ->message("Fee Already been Created!.")
                          ->show();
         }
         else{
            $categ = RfFeeCategories::where("fee_categories_id",$id)->update(['title'=> $title]);
           
            return $return->status(true)
                          ->message("Successfull Updated!.")
                          ->show();
         }

    }

    public function updateFee($id,$title,$description,$account_code,$category){
             $return = new rrdReturn();
            $checker = RfFees::where('title',$title)
                            ->where('description',$description)
                            ->where('fee_categories_id',$category)
                            ->where('account_code',$account_code)
                            ->count();

            if($checker > 0){
                return $return->status(false)
                          ->message("Fee Already been Created!.")
                          ->show();
            }
            else{
                $update = RfFees::where('fees_id',$id)
                        ->update(['title'=>$title,'description'=>$description,
                            'fee_categories_id'=> $category, 
                            'account_code'=> $account_code]);
                        return $return->status(true)
                          ->message("Successfull Updated!.")
                          ->show();
            }
    }

}
