<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RfSubjects extends Model
{
    //
    protected $table = 'rf_subject';
    protected $primaryKey = 'subject_id';
	use SoftDeletes;


    public function getSubjects(){
    	return $this->hasMany('App\RfSubjects','subject_id','subject_id');
    }
}
