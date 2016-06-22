<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfSection extends Model
{
    //

    protected $table = 'rf_section';
    protected $primaryKey = 'section_id';

	use SoftDeletes;

    public function getGradeLevel(){
    	return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
    public function getSectionType(){
    	return $this->belongsTo('App\RfSectionType','section_type_id','section_type_id');
    }

    public function Schedule(){
        return $this->hasMany('App\Schedule','section_id','section_id');
    }

    public function scopegetEnrollees($query,$schedule_id){
        
            return $query->whereHas('Schedule', function($q) use ($schedule_id){
                                $q->where('schedule_id',$schedule_id)
                                  ->where('is_current','1');
                            });
    }
}
