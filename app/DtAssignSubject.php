<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
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



    public function HandleSubjects(){
        return $this->hasMany('App\HandleSubjects','assign_subject_id','assign_subject_id');
    }

    
    public function scopegetUnassignedSubject($query,$weekdays_id,$schedule_id){
            

            $schedule =  Schedule::find($schedule_id);                     
            $section = RfSection::where('section_id',$schedule->section_id)->first();

            return $query->whereNotIn('assign_subject_id', function($q) use ($weekdays_id,$schedule_id){
                                          $q->select('assign_subject_id')
                                            ->where('schedule_id',$schedule_id)
                                            ->where('weekdays_id',$weekdays_id)
                                            ->whereNull('deleted_at')
                                            ->from('dt_handle_subject');
                                            // more where conditions
                                     })
                                    ->where('grade_level_id',$section->grade_level_id);
    }
}
