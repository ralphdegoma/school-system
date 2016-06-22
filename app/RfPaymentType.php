<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DtPaymentTypeSched;
class RfPaymentType extends Model
{
    //
	protected $table = 'rf_payment_type';
	protected $primaryKey = 'payment_type_id';


	public function getChecked($type,$month){
		$check = DtPaymentTypeSched::where('payment_type_id',$type)->where('month_id',$month)->count();
		return $check;
	}

}
