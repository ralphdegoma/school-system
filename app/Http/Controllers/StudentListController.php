<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;

class StudentListController extends Controller
{
    public function registeredList(){

    	$students = Students::with('Parents_Students','Parents_Students.Parents')->get();

      	return view('sms.registrar.registered-list')->with('students',$students);
    }

    public function getStudents(Request $request){

	    

    }
}
