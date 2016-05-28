<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'dt_parents';
    protected $primaryKey = 'parent_id';

    public function Parents_Students(){
    	return $this->hasMany('App\Parents_Students','parent_id','parent_id');
    }
    public function Nationality(){
    	return $this->belongsTo('App\Nationality','nationality_id','nationality_id');
    }

    public function Occupation(){
    	return $this->belongsTo('App\Occupation','occupation_id','occupation_id');
    }
    public function Religion(){
    	return $this->belongsTo('App\Religion','religion_id','religion_id');
    }

    

    public function getbirthdayAttribute($value) {
        $value = $value;
        $birthday = date("m/d/Y", strtotime($value));
        return $birthday;
    }

    public function setdobAttribute($value) {
        $value = $value;
        $birthday = date("Y/m/d", strtotime($value));
        $this->attributes['dob'] = strtolower($birthday);
    }

}
