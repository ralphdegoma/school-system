<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents_Students extends Model
{
    
    protected $table = 'dt_parents_students';


    public function Parents(){
    	return $this->belongsTo('App\Parents','parent_id','parent_id');
    }

    public function Relationships(){
    	return $this->belongsTo('App\Relationships','relationship_id','relationship_id');
    }
}
