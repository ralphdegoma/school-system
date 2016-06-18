<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekdays extends Model
{
    protected $table = 'rf_weekdays';
    protected $primaryKey = 'weekdays_id';
    

    public function HandleSubjects(){
    	return $this->hasMany('App\HandleSubjects');
    }
}
