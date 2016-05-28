<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;

class StudentListController extends Controller
{
    public function registeredList(){
      	return view('sms.registrar.registered-list');
    }

    public function getStudents(Request $request){

	    $Students = Students::with('Parents_Students','Parents_Students.Parents')
	            ->get();

    	$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($Students);
    }
}
