<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'dt_students';
    protected $primaryKey = 'student_id';
}
