<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'rf_occupation';
    protected $fillable = ['designation_name'];
}
