<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreGradeLevel;
use App\RfGradeLevel;
use Request;
use App\RfGradeType;
use App\RfSchoolYear;
use App\RfSubjects;
use DatatableFormat;
use Validator;
use Redirect;
use App\RfSection;

class RegistrarController extends Controller
{
    //


	public function saveGradeLevel(StoreGradeLevel $request){

		$return = new rrdReturn();
		 $validator = Validator::make($request->all(), [
            'grade_level' => 'required|unique:rf_grade_level',
        ]);

        if ($validator->fails()) {
            return $return->status(false)
	                      ->message("Grade Level Already exist!.")
	                      ->show();
        }
		else{
		
		$grade = new RfGradeLevel;
		$grade->grade_level = $request['grade_level'];
		$grade->grade_type_id 	= $request['class_type'];
		$grade->save();
		
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
	      }
	}

	public function getGrade(){

		$grade = RfGradeLevel::with("getGradeType")->get();

		
		 $datatableFormat = new DatatableFormat();
  		 	return $datatableFormat->format($grade);

	}



	public function saveSchoolYear(){

		$request = Request::all();

		$schoolYear = new RfSchoolYear;

		$schoolYear->sy_from = $request['syFrom'];
		$schoolYear->sy_to 	= $request['syTo'];
		
		$schoolYear->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
	}

	public function getYear(){

		$schoolYear = RfSchoolYear::with('getSchoolYear')->get();

		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($schoolYear);

	}

	public function saveSubject(){

		$request = Request::all();

		$subjects = new RfSubjects;

		$subjects->subject_name = $request['subjectName'];
		
		$subjects->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
	}

	public function getSubject(){

		$subjects = RfSubjects::with('getSubjects')->get();

		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($subjects);

	}
	public function getSection(){

		$sections = RfSection::with('getGradeLevel','getSectionType')->get();

		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($sections);

	}

	public function removeGrade($id){
	
	$return = new rrdReturn();
	try{
 		RfGradeLevel::where('grade_level_id',$id)->delete();
 		return $return->status(true)
	                      ->message("Successfully Deleted!.")
	                      ->show();
	} 
	catch(\Exception $e){
 		return $return->status(false)
	                      ->message("This Property is on Used.")
	                      ->show();
	}
		

	}

	public function saveSection(){

		$request = Request::all();
		$section = new RfSection;
		$section->section_name 		= $request['section_name'];
		$section->grade_level_id 	= $request['grade_level'];
		$section->section_type_id	= $request['sectionType'];
		$section->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
	}

	public function gradeLevel(){

		$gradeType = RfGradeType::with('getGradeLevel')
					->where('grade_type_id',Request::input('grade_type_id'))
					->get();

		return $gradeType;

	}

}
