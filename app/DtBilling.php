<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DtBilling extends Model
{
    //
    protected $table = 'dt_billing';
    protected $primaryKey = 'billing_id';

    use SoftDeletes;
    public function getFees(){
    	return $this->belongsTo('App\RfFees','fees_id','fees_id');
    }
    public function getGrade(){
    	return $this->belongsTo('App\RfGradeLevel','grade_level_id','grade_level_id');
    }
}
