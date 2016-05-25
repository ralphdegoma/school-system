<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfSubjects extends Model
{
    //
    protected $table = 'rf_subject';


    public function getSubjects(){
    	return $this->hasMany('App\RfSubjects','subject_id','subject_id');
    }
}
