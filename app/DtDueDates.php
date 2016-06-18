<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtDueDates extends Model
{
    //
    protected $table = "dt_due_dates";
    protected $primaryKey = "due_dates_id";

    public function setdueDatesAttribute($value) {
        $due = date("Y/m/d", strtotime($value));
        $this->attributes['due_dates'] = strtolower($due);
    }
}
