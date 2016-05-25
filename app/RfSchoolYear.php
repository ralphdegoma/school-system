<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfSchoolYear extends Model
{
    //
    protected $table = 'rf_school_year';


    public function getSchoolYear(){
    	return $this->hasMany('App\RfSchoolYear','school_year_id','school_year_id');
    }
}
