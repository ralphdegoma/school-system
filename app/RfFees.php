<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RfFees extends Model
{
    //
    protected $table = 'rf_fees';
    protected $primaryKey = 'fees_id';

	use SoftDeletes;
    public function getAccount(){
    	return $this->belongsTo('App\RfAccount','account_code','account_code');
    }
    public function getCategory(){
    	return $this->belongsTo('App\RfFeeCategories','fee_categories_id','fee_categories_id');
    }
}
