<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfFees extends Model
{
    //
    protected $table = 'rf_fees';

    public function getAccount(){
    	return $this->belongsTo('App\RfAccount','account_code','account_code');
    }
}
