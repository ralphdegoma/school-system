<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfGradeLevel extends Model
{
    //
   
    protected $table = 'rf_grade_level';
    protected $primaryKey = 'grade_level_id';

	use SoftDeletes;

	public function getGradeType(){
    	return $this->belongsTo('App\RfGradeType','grade_type_id','grade_type_id');
    }

    public function DtAssignSubject(){
    	return $this->hasMany('App\DtAssignSubject','grade_level_id','grade_level_id');
    }

    public function getSection(){
        return $this->hasMany('App\RfSection','grade_level_id','grade_level_id');
    }


}
