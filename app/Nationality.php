<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = 'rf_nationality';
    protected $fillable = ['nationality_name'];
}
