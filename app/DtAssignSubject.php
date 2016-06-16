<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DtAssignSubject extends Model
{
    //


    use SoftDeletes;

    protected $table = 'dt_assign_subject';

    public function getSubjects(){
    	return $this->belongsTo('App\RfSubjects','subject_id','subject_id');
    }
    public function getGradeLevel(){
    	return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
    public function getSectionType(){
    	return $this->belongsTo('App\RfSectionType','section_type_id','section_type_id');
    }





    
    
}
