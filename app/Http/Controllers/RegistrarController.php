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
use App\DtAssignSubject;
use App\KronosEmployee;
use App\StudentSchedule;
use App\Students;
use App\HandleSubjects;
use App\Schedule;
use App\Weekdays;
use DB;
class RegistrarController extends Controller
{
    //


	public function saveGradeLevel(StoreGradeLevel $request){

		$return = new rrdReturn();
		


		if($request['grade_level_id'] != ""){
        	return $this->updateGradeLevel();
        }

		$checkGradeLevel = new RfGradeLevel(); 
        $checkGradeLevel = $checkGradeLevel
                        ->where('grade_level',$request['grade_level'])
                        ->where('grade_type_id',$request['grade_type'])
                        ->get();

        if(count($checkGradeLevel) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Grade level you specified under certain grade type already exist. Specify another one.')
                      ->show();
        }

		
		$grade = new RfGradeLevel;
		$grade->grade_level = $request['grade_level'];
		$grade->grade_type_id 	= $request['grade_type'];
		$grade->save();
		
		return $return->status(true)
	                      ->message("Grade level has been created! .")
	                      ->show();
	    
	}

	public function updateGradeLevel(){

		$request = Request::all();

		$checkGradeLevel = new RfGradeLevel(); 
        $checkGradeLevel = $checkGradeLevel
                        ->where('grade_level',$request['grade_level'])
                        ->where('grade_type_id',$request['grade_type'])
                        ->where('grade_level_id','<>',$request['grade_level_id'])
                        ->get();

        if(count($checkGradeLevel) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Grade level you specified under certain grade type already exist. Specify another one.')
                      ->show();
        }

		$grade = RfGradeLevel::find($request['grade_level_id']);
		$grade->grade_level = $request['grade_level'];
		$grade->grade_type_id 	= $request['grade_type'];
		$grade->save();

		$return = new rrdReturn();
        return $return->status(true)
                  ->message('Grade level has been updated!.')
                  ->show();
	}

	public function getGrade(){

		$grade = RfGradeLevel::with("getGradeType")->get();

		$datatableFormat = new DatatableFormat();
  		return $datatableFormat->format($grade);

	}



	public function saveSchoolYear(){

		$request = Request::all();


		if($request['school_year_id'] != ""){
        	return $this->updateSchoolYear();
        }

		$checkRfSchoolYear = new RfSchoolYear(); 
        $checkRfSchoolYear = $checkRfSchoolYear
                        ->where('sy_from',$request['syFrom'])
                        ->where('sy_to',$request['syTo'])
                        ->get();

        if(count($checkRfSchoolYear) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('School year already exists, specify another one.')
                      ->show();
        }

        

		$schoolYear = new RfSchoolYear;
		$schoolYear->sy_from = $request['syFrom'];
		$schoolYear->sy_status_id = '1';
		$schoolYear->sy_to 	= $request['syTo'];
		$schoolYear->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! User has been Created!.")
	                      ->show();
	}

	public function updateSchoolYear(){

		$request = Request::all();


		$checkRfSchoolYear = new RfSchoolYear(); 
        $checkRfSchoolYear = $checkRfSchoolYear
                        ->where('sy_from',$request['syFrom'])
                        ->where('sy_to',$request['syTo'])
                        ->where('school_year_id','<>',$request['school_year_id'])
                        ->get();

        if(count($checkRfSchoolYear) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('School year already exists, specify another one.')
                      ->show();
        }

		$schoolYear = RfSchoolYear::find($request['school_year_id']);
		$schoolYear->sy_from = $request['syFrom'];
		$schoolYear->sy_to 	= $request['syTo'];
		$schoolYear->save();


		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("School Year has been updated!.")
	                      ->show();
	}

	public function getYear(){

		$schoolYear = RfSchoolYear::with('getSchoolYear')->get();

		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($schoolYear);

	}

	public function saveSubject(){

		$request = Request::all();


		if($request['subject_id'] != ""){
			return $this->updateSubject();
		}

		$checkSubject = new RfSubjects;
        $checkSubject = $checkSubject
                        ->where('subject_name',$request['subjectName'])
                        ->get();

        if(count($checkSubject) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Section on a specific grade level already exists, specify another one maybe?.')
                      ->show();
        }

        $subjects = new RfSubjects;
		$subjects->subject_name = $request['subjectName'];
		$subjects->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! New subject has been created!.")
	                      ->show();
	}

	public function getListSubjects(){

		$request = Request::all();


		$DtAssignSubject = DtAssignSubject::with('getSubjects')->where('grade_level_id',$request['grade_level_id'])
										  ->where('section_type_id',$request['section_type_id'])->get();
	
		return view('sms.setup.assigned-subject-list')->with('DtAssignSubject',$DtAssignSubject);							  
	}

	public function getListSubjectsEdit(){
		
		$request = Request::all();
		$DtAssignSubject = DtAssignSubject::with('getSubjects')->where('grade_level_id',$request['grade_level_id'])
										  ->where('section_type_id',$request['section_type_id'])->get();
		
		foreach($DtAssignSubject as $subjects){
			$sub[] = $subjects->getSubjects->subject_id;
		}

		return $sub;
	}

	public function updateSubject(){

		$request = Request::all();

		$checkSubject = new RfSubjects;
        $checkSubject = $checkSubject
                        ->where('subject_name',$request['subjectName'])
                        ->where('subject_id',$request['subject_id'])
                        ->get();

        if(count($checkSubject) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Subject already exists, specify another one maybe?.')
                      ->show();
        }

        $subjects = RfSubjects::find($request['subject_id']);
		$subjects->subject_name = $request['subjectName'];
		$subjects->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! subject has been updated!.")
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

	public function Remove($remove,$id){
	
	$return = new rrdReturn();
	try{
		if($remove == 'section'){
			RfSection::where('section_id',$id)->delete();
		}
		elseif($remove == 'grade-level'){
			RfGradeLevel::where('grade_level_id',$id)->delete();
		}
		elseif($remove == 'year'){
			RfSchoolYear::where('school_year_id',$id)->delete();
		}
		elseif($remove == 'subject'){
			RfSubjects::where('subject_id',$id)->delete();
		}
		elseif($remove == 'assign-subject'){
			DtAssignSubject::where('assign_subject_id',$id)->delete();
		}
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

	public function Edit($id){
		$editGrade = RfGradeLevel::where('grade_level_id',$id)->get();

		return $editGrade;

	}

	public function saveSection(){

		$request = Request::all();

		if($request['section_id'] != ""){
			return $this->updateSection();
		}

		$checkSection = new RfSection(); 
        $checkSection = $checkSection
                        ->where('section_name',$request['section_name'])
                        ->where('grade_level_id',$request['grade_level'])
                        ->where('section_type_id',$request['sectionType'])
                        ->get();

        if(count($checkSection) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Section on a specific grade level already exists, specify another one maybe?.')
                      ->show();
        }

		
		$section = new RfSection;
		$section->section_name 		= $request['section_name'];
		$section->grade_level_id 	= $request['grade_level'];
		$section->section_type_id	= $request['sectionType'];
		$section->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("New section has been created!.")
	                      ->show();
	}

	public function updateSection(){

		$request = Request::all();

		$checkSection = new RfSection(); 
        $checkSection = $checkSection
                        ->where('section_name',$request['section_name'])
                        ->where('grade_level_id',$request['grade_level'])
                        ->where('section_type_id',$request['sectionType'])
                        ->where('section_id','<>',$request['section_id'])
                        ->get();

        if(count($checkSection) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Section on a specific grade level already exists, specify another one maybe?.')
                      ->show();
        }

		$section = RfSection::find($request['section_id']);
		$section->section_name 		= $request['section_name'];
		$section->grade_level_id 	= $request['grade_level'];
		$section->section_type_id	= $request['sectionType'];
		$section->save();

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("Section has been updated!.")
	                      ->show();
	}

	public function gradeLevel(){

		$gradeType = RfGradeType::with('getGradeLevel')
					->where('grade_type_id',Request::input('grade_type_id'))
					->get();

		return $gradeType;

	}
	public function assignSubject(){

		$request = Request::all();

		if($request['grade_level_id'] != ""){
			return $this->updateAssignSubjects();
		}

		$checkAssignSub = new DtAssignSubject;
		$checkAssignSub = $checkAssignSub
                    ->where('section_type_id',$request['section_type'])
                    ->where('grade_level_id',$request['grade_level'])
                    ->get();

        if(count($checkAssignSub) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Specific Grade Level with corresponding section type already have an assigned subject. Kindly
                      			check the list of tables and try again.')
                      ->show();
        }

        if($request['section_type'] != "all"){

			foreach ($request['gradeSubject'] as $subject) {
				$assign                  = new DtAssignSubject;
				$assign->subject_id      = $subject;
				$assign->section_type_id = $request['section_type'];
				$assign->grade_level_id  = $request['grade_level'];
				$assign->save();
			}

		}else{

			foreach ($request['gradeSubject'] as $subject) {

				$assign                  = new DtAssignSubject;
				$assign->subject_id      = $subject;
				$assign->section_type_id = '2';
				$assign->grade_level_id  = $request['grade_level'];
				$assign->save();

				$assign                  = new DtAssignSubject;
				$assign->subject_id      = $subject;
				$assign->section_type_id = '3';
				$assign->grade_level_id  = $request['grade_level'];
				$assign->save();
			}
		}


		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! subject assigning has been successfull!.")
	                      ->show();
	}

	public function updateAssignSubjects(){
	
		$request = Request::all();

		/*DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
						->where('section_type_id',Request::input('section_type_id'))
						->delete();*/

		$checkAssignSub = new DtAssignSubject;
		$checkAssignSub = $checkAssignSub
                    ->where('section_type_id',$request['section_type'])
                    ->where('grade_level_id',$request['grade_level'])
                    ->where('grade_level_id','<>',$request['grade_level_id'])
                    ->where('section_type_id','<>',$request['section_type_id'])
                    ->get();

        if(count($checkAssignSub) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Specific Grade Level with corresponding section type already have an assigned subject. Kindly
                      			check the list of tables and try again.')
                      ->show();
        }



        //GET ALL SUBJECT ID COMPARE IT FROM USER DELETE IT IF NOT MATCH
        $existingSubjects = new DtAssignSubject;
		$existingSubjects = $existingSubjects
                ->where('grade_level_id','=',$request['grade_level_id'])
                ->where('section_type_id','=',$request['section_type_id'])
                ->get();


        $deleteArray = [];



        foreach ($existingSubjects as $subjectsExisting) {

        	$arrCount = 0;

        	foreach ($request['gradeSubject'] as $checkSubject) {

        		if($subjectsExisting->subject_id == $checkSubject){
        			$arrCount++;
        		}
        	}

        	if($arrCount == 0){
        		$deleteArray[] = $subjectsExisting->subject_id;
        	}


        }


		foreach ($request['gradeSubject'] as $subject) {



			if($request['section_type'] != "all"){

				/* NOW WE HAVE TO DELETE SUBJECTS NOT PRESENT IN CLIENT */
		        foreach ($deleteArray as $subjectToDelete) {
		        	
			        DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
									->where('section_type_id',Request::input('section_type_id'))
									->where('subject_id',$subjectToDelete)
									->delete();


					$assignedSub = DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
									->where('section_type_id',Request::input('section_type_id'))
									->where('subject_id',$subjectToDelete)
									->first();				

					$assignedSub->find($assignedSub->assign_subject_id);
					$assignedSub->HandleSubjects->delete();

				
				}

				$checkSub = DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
							->where('section_type_id',Request::input('section_type_id'))
							->where('subject_id',$subject)
							->get();

				if(count($checkSub) == 0){

					$assign                  = new DtAssignSubject;
					$assign->subject_id      = $subject;
					$assign->section_type_id = $request['section_type'];
					$assign->grade_level_id  = $request['grade_level'];
					$assign->save();
				}

			}else{

				/* NOW WE HAVE TO DELETE SUBJECTS NOT PRESENT IN CLIENT */
		        foreach ($deleteArray as $subjectToDelete) {
		        	
			        DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
									->where('section_type_id','2')
									->where('section_type_id','3')
									->where('subject_id',$subjectToDelete)
									->delete();
				}


				$checkSub2 = DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
							->where('section_type_id','2')
							->where('subject_id',$subject)
							->get();

				if(count($checkSub2) == 0){

					$assign                 = new DtAssignSubject;
					$assign->subject_id 	= $subject;
					$assign->section_type_id = '2';
					$assign->grade_level_id = $request['grade_level'];
					$assign->save();
				}

				$checkSub3 = DtAssignSubject::where('grade_level_id' , Request::input('grade_level_id'))
							->where('section_type_id','3')
							->where('subject_id',$subject)
							->get();

				if(count($checkSub3) == 0){

					$assign 				= new DtAssignSubject;
					$assign->subject_id 	= $subject;
					$assign->section_type_id = '3';
					$assign->grade_level_id = $request['grade_level'];
					$assign->save();

				}

			}


		}

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message("That is amazing! subject assigning has been updated!.")
	                      ->show();


	}


	public function getAssignSubject(){

		//$assign = DtAssignSubject::with('getSubjects','getGradeLevel','getSectionType')->get();
		
		$assign  = DB::table('rf_grade_level')
					->select('dt_assign_subject.section_type_id',
						'dt_assign_subject.subject_id',
						'rf_grade_level.grade_type_id',
						'dt_assign_subject.grade_level_id',
						'grade_level','section_type')
					->leftjoin('dt_assign_subject','dt_assign_subject.grade_level_id','=','rf_grade_level.grade_level_id')
					->leftjoin('rf_section_type','rf_section_type.section_type_id','=','dt_assign_subject.section_type_id')
					->leftjoin('rf_section','rf_section.section_type_id','=','rf_section_type.section_type_id')
					->where('dt_assign_subject.assign_subject_id','<>' ,null)
					->groupby('dt_assign_subject.grade_level_id')
					->groupby('dt_assign_subject.section_type_id')
					->whereNull('dt_assign_subject.deleted_at')
					->get();

		$datatableFormat = new DatatableFormat();
      	return $datatableFormat->format($assign);

	}

	public function getSubjectsWithFilters(){


		if(Request::input('sectionName') == "" or Request::input('gradelevel') == ""){
			return null;
		}

		$KronosEmployee =  KronosEmployee::get();
		$section = RfSection::where('section_id',Request::input('sectionName'))->first();
		$section_subjects = DtAssignSubject::with('getSubjects')
								->where('grade_level_id',Request::input('gradelevel'))
								->where('section_type_id',$section->section_type_id)->get();
		$weekdays = Weekdays::all();


		return view('sms.setup.section-subjects')->with('section_subjects',$section_subjects)
						->with('KronosEmployee',$KronosEmployee)
						->with('weekdays',$weekdays);
	}

	public function enrollStudent(){

		$StudentSchedule              = new StudentSchedule;
		$StudentSchedule->schedule_id = Request::input('schedule_id');
		$StudentSchedule->student_id  = Request::input('student_id');
		$StudentSchedule->save();

		$student = Students::find(Request::input('student_id'));

		$return = new rrdReturn();
		return $return->status(true)
	                      ->message($student->first_name. " " .$student->last_name." has been enrolled!. Thank you!.")
	                      ->show();
	}

	public function getListSchedules(){

		$KronosEmployee =  KronosEmployee::get();

		$schedule =  Schedule::find(Request::input('schedule_id'));						
		$section = RfSection::where('section_id',$schedule->section_id)->first();


		/*$weekdays = Weekdays::with('HandleSubjects.Schedule','HandleSubjects.DtAssignSubject','HandleSubjects.DtAssignSubject.getSubjects','HandleSubjects.DtAssignSubject.getGradeLevel','HandleSubjects.DtAssignSubject.getSectionType')
								->whereHas('HandleSubjects', function ($query) {
								    $query->orwhere('schedule_id', Request::input('schedule_id'));

								     })
								
								->get();*/

		$weekdays = weekdays::whereHas('HandleSubjects', function ($query) {
							    $query->orwhere('schedule_id', Request::input('schedule_id'))
							    	  ->groupby('assign_subject_id');
							     })
								->get();

								
		$defaultSubjects = DtAssignSubject::with('getSubjects')
								->where('grade_level_id',Request::input('gradelevel'))
								->where('section_type_id',$section->section_type_id)->get();
	
		$schedule = Schedule::find(Request::input('schedule_id'));

		return view('sms.setup.section-subjects-readonly')
						->with('update',Request::input('update'))
						->with('defaultSubjects',$defaultSubjects)
						->with('schedule',$schedule)
						->with('weekdays',$weekdays)
						->with('KronosEmployee',$KronosEmployee);						
	}
	
}
