<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'dt_students';
    protected $primaryKey = 'student_id';
    public $incrementing = false;

    public function getbirthdayAttribute($value) {
        $value = $value;
        $birthday = date("m/d/Y", strtotime($value));
        return $birthday;
    }

    

   	public function Father(){
    	return $this->belongsTo('App\Father','parent_id','parent_id');
    }

    public function Parents_Students(){
    	return $this->hasMany('App\Parents_Students','student_id','student_id');
    }

    public function setbirthdayAttribute($value) {
        $birthday = date("Y/m/d", strtotime($value));
        $this->attributes['birthday'] = strtolower($birthday);
    }

    public function getGender($gender = null){
        return  $this->where('gender',$gender)->count();
       
    }
}
