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
}
