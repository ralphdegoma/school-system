<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $table = 'dt_parents';

    public function Parents(){
    	return $this->belongsTo('App\Parents','parent_id','parent_id');
    }
}
