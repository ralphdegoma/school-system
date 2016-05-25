<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfSection extends Model
{
    //

    protected $table = 'rf_section';

    public function getGradeLevel(){
    	return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
    public function getSectionType(){
    	return $this->belongsTo('App\RfSectionType','section_type_id','section_type_id');
    }
}
