<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RfFeeCategories extends Model
{
    //
    protected $table = "rf_fee_categories";
    protected $primaryKey = 'fee_categories_id';
use SoftDeletes;
    
}
