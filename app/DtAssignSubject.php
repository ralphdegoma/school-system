<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtAssignSubject extends Model
{
    //

    protected $table = 'dt_assign_subject';

    public function getSubjects(){
    	return $this->belongsTo('App\RfSubjects','subject_id','subject_id');
    }
    public function getGradeLevel(){
    	return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
    
}
