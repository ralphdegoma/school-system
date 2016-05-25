<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfClassType extends Model
{
    //

    protected $table = 'rf_class_type';

    public function getClassType(){
    	return $this->hasMany('App\RfClassType','class_type_id','class_type_id');
    }
    
}
