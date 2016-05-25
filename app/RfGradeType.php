<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfGradeType extends Model
{
    //
    protected $table = 'rf_grade_type';


    public function getGradeLevel(){
    	return $this->hasMany('App\RfGradeLevel','grade_type_id','grade_type_id');
    }
}
