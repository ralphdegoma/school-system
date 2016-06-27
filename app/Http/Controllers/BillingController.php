<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DatatableFormat;
use App\Http\Requests;
use App\RfFeeCategories;
use Validator;
use App\RfFees;
use App\DtBilling;
use App\DtPaymentTypeSched;
use App\DtDueDates;
use App\RfSchoolYear;
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
    	$validator = RfFeeCategories::where('title',$request['title'])
                  ->where('deleted_at','0000-00-00')
                  ->count();
         if ($validator > 0) {
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
                ->where('deleted_at','=','0000-00-00')
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


        $sy = RfSchoolYear::where('is_current','1')->first();
        $sy_id = $sy->school_year_id;
         if($request['billing_id'] != ""){
          $id = $request['billing_id'];
          $grade_level = $request['grade_level'];
          $fees_id = $request['fees'];
          $amount = $request['amount'];
          return $this->updateGradeFees($id,$grade_level,$fees_id,$amount);
         }

    		$return = new rrdReturn();
    		$checker = DtBilling::where('fees_id',$request['fees'])
    								->where('grade_level_id',$request['grade_level'])
                    ->where('school_year_id',$sy_id)                      
    								->count();
    		if($checker > 0){
    				return $return->status(false)
	                      ->message("Grade Level Fee Has Already Been Created!.")
	                      ->show();
    		}
    		else{
    			$new = new DtBilling;
    			$new->amount = $request['amount'];
    			$new->fees_id = $request['fees'];
    			$new->grade_level_id = $request['grade_level'];
                $new->school_year_id = $sy_id;
    			$new->save();

    			return $return->status(true)
	                      ->message("Successfull!.")
	                      ->show();

    		}

    }
    public function updateGradeFees($id,$grade_level,$fees_id,$amount){
        $sy = RfSchoolYear::where('is_current','1')->first();
        $sy_id = $sy->school_year_id;
        $return = new rrdReturn();
          $checker = DtBilling::where('fees_id',$fees_id)
                    ->where('grade_level_id',$grade_level)
                    ->where('school_year_id',$sy_id) 
                    ->where('billing_id','!=',$id)
                    ->where('school_year_id',$sy_id)
                    ->count();
        if($checker > 0){
            return $return->status(false)
                        ->message("Grade Level Fee Has Already Been Created!.")
                        ->show();
        }
        else{
          $update = DtBilling::find($id);
          $update->amount = $amount;
          $update->fees_id = $fees_id;
          $update->grade_level_id = $grade_level;
          $update->save();

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
            $sy = RfSchoolYear::where('is_current','1')->first();
            $sy_id = $sy->school_year_id;
    		$category = DtBilling::with('getFees','getGrade.getGradeType')
                        ->where('school_year_id',$sy_id)
                        ->get();

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
    public function savePaymentSched(Request $request){
          $return = new rrdReturn();
          $delete = DtPaymentTypeSched::truncate();
          foreach ($request['month'] as $month) {
              $month = explode('/', $month);
              $new = new DtPaymentTypeSched;
              $new->month_id = $month[0];
              $new->payment_type_id = $month[1];
              $new->save();  
          }

         return $return->status(true)
                          ->message("Successfully Save!.")
                          ->show(); 

    }

  public function saveDueDates(Request $request){
       $return = new rrdReturn();
        $delete = DtDueDates::truncate();
       $month = $request['month'];
       $counter = 0;
       foreach ($request['dues'] as $dues) {
          $new = new DtDueDates;
          $new->month_id  = $month[$counter];
          $new->due_dates = $dues;
          $new->save();
          $counter++;
       }

        return $return->status(true)
                          ->message("Successfully Save!.")
                          ->show(); 

  }

}
