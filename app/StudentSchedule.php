<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSchedule extends Model
{
    protected $table = 'dt_students_schedule';
    protected $primaryKey = 'student_schedule_id';


    public function Students(){
        return $this->belongsTo('App\Students','student_id','student_id');
    }
}
