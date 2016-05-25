<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfGradeLevel extends Model
{
    //
   
    protected $table = 'rf_grade_level';

public function getGradeType(){
    	return $this->belongsTo('App\RfGradeType','grade_type_id','grade_type_id');
    }

}
