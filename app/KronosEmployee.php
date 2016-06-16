<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KronosEmployee extends Model
{
    protected $table = 'dt_employee';
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    
    public function Nationality(){
    	return $this->belongsTo('App\Nationality','nationality_id','nationality_id');
    }

    public function Occupation(){
    	return $this->belongsTo('App\Occupation','occupation_id','occupation_id');
    }
    public function Religion(){
    	return $this->belongsTo('App\Religion','religion_id','religion_id');
    }
}
