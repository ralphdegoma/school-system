<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'rf_religion';
    protected $fillable = ['religion_name'];
}
