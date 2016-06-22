<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
class Schedule extends Model
{
    protected $table = 'dt_schedule';
    protected $primaryKey = "schedule_id";

    public function setstartTimeAttribute($value) {
        $startTime = date('H:i:s', strtotime($value));
        $this->attributes['start_time'] = $startTime;
    }

    public function setendTimeAttribute($value) {
        $endTime = date('H:i:s', strtotime($value));
        $this->attributes['end_time'] = $endTime;
    }

    public function getstartTimeAttribute($value) {
        $startTime = date('g:i', strtotime($value));
        return $startTime;
    }

    public function getendTimeAttribute($value) {
        $endTime = date('g:i', strtotime($value));
        return $endTime;
    }

    public function getstartTimeTypeAttribute() {

        $startTimeType = date('A', strtotime($this->attributes['start_time']));
        return $startTimeType;
    }

    public function getendTimeTypeAttribute() {

        $endTimeType = date('A', strtotime($this->attributes['end_time']));
        return $endTimeType;
    }

    public function RfSection(){
        return $this->belongsTo('App\RfSection','section_id','section_id');
    }

    public function RfGradeLevel(){
        return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
    public function RfSchoolYear(){
        return $this->belongsTo('App\RfSchoolYear','school_year_id','school_year_id');
    }

    public function StudentSchedule(){
        return $this->hasMany('App\StudentSchedule','schedule_id','schedule_id');
    }
    
}

