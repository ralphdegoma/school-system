<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'ref_person';
    protected $primaryKey = 'person_id';
    protected $fillable = array('first_name','middle_name','last_name','gender','date_of_birth',
    							'email_address','pic_path','cs_id','nationality_id','sch_attainment_id');



    public function PersonAddress(){

    	return $this->hasOne('App\PersonAddress','person_id');

    }

    public function Employee(){

    	return $this->hasOne('App\Employee','person_id');

    }

   

    





}
