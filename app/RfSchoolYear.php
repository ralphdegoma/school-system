<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RfSchoolYear extends Model
{
    //

    use SoftDeletes;

    protected $table = 'rf_school_year';
    protected $primaryKey = 'school_year_id';

    public function getSchoolYear(){
    	return $this->hasMany('App\RfSchoolYear','school_year_id','school_year_id');
    }

    public function getSchoolYearAttribute(){
    	return $this->sy_from . " - " . $this->sy_to;
	}
    public function getSchedule(){
        return $this->hasMany('App\Schedule','school_year_id','school_year_id');
    }
}
