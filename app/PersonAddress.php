<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonAddress extends Model
{
    protected $table = 'dat_person_address';
    protected $primaryKey = 'pa_id';
    protected $fillable = array('person_id','address','municipality_id','gender');
}
