<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HandleSubjects extends Model
{
    use SoftDeletes;

    protected $table = 'dt_handle_subject';
    protected $primaryKey = 'handle_subject_id';


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

    public function getstartTimeTypeAttribute() {

        $startTimeType = date('A', strtotime($this->attributes['start_time']));
        return $startTimeType;
    }

    public function getendTimeTypeAttribute() {

        $endTimeType = date('A', strtotime($this->attributes['end_time']));
        return $endTimeType;
    }


    public function getendTimeAttribute($value) {
        $endTime = date('g:i', strtotime($value));
        return $endTime;
    }

    



    public function DtAssignSubject(){
        return $this->belongsTo('App\DtAssignSubject','assign_subject_id','assign_subject_id');
    }

    public function Schedule(){
        return $this->belongsTo('App\Schedule','schedule_id','schedule_id');
    }

    public function Weekdays(){
        return $this->belongsTo('App\Weekdays','weekdays_id','weekdays_id');
    }


}
