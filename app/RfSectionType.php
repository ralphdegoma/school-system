<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RfSectionType extends Model
{
    //
    protected $table = 'rf_section_type';

    public function getSectionType(){
    	return $this->hasMany('App\RfSection','section_type_id','section_type_id');
    }
}
