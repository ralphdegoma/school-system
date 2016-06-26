<?php

namespace App\Http\Controllers;

use App\RfGradeLevel;
use App\RfSchoolYear;
use App\RfSection;
use App\RfSectionType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Students;
use DatatableFormat;
use App\RfGradeType;
use Illuminate\Support\Facades\DB;
class StudentListController extends Controller
{
    public function registeredList(){

    	$students = Students::with('Parents_Students','Parents_Students.Parents')->get();
        $gradeType = RfGradeType::where('grade_type','!=','All')->get();
        $sy         = RfSchoolYear::all();
        $sectionType = RfSectionType::all();
      	return view('sms.registrar.registered-list',compact('gradeType','sectionType','sy'))->with('students',$students);
    }

    public function getStudents(Request $request){
         $sy          = $request['schoolYear'];
         $gradeType   = $request['gradeType'];
         $grade_level = $request['grade_level'];
//         $sectionType = $request['sectionType'];
         $sectionName = $request['sectionName'];
        if($sy != 'All'){
            $sy_ids = RfSchoolYear::findorFail($sy);
            $sy_id = $sy_ids->school_year_id;
        }
        if($sy == 'All' && $gradeType == 'All'){
            $students = DB::table('dt_students')->get();
        }
        elseif($sy!='All' && $gradeType == 'All' ){
            $students = DB::table('dt_students')
                        ->leftjoin('dt_students_schedule','dt_students.student_id','=','dt_students_schedule.student_id')
                        ->leftjoin('dt_schedule','dt_students_schedule.schedule_id','=','dt_schedule.schedule_id')
                        ->where('dt_schedule.school_year_id',$sy_id)
                        ->get();
        }
        elseif($sy!='All' && $gradeType!='All' && ($grade_level == 'All' || $grade_level == '' ) ){
            $grade_type_ids = RfGradeType::find($gradeType);
            $grade_type_id = $grade_type_ids->grade_type_id;
            $students = DB::table('dt_students')
                ->join('dt_students_schedule','dt_students.student_id','=','dt_students_schedule.student_id')
                ->join('dt_schedule','dt_students_schedule.schedule_id','=','dt_schedule.schedule_id')
                ->join('rf_section','dt_schedule.section_id','=','rf_section.section_id')
                ->join('rf_grade_level','rf_section.grade_level_id','=','rf_grade_level.grade_level_id')
                ->where('dt_schedule.school_year_id',$sy_id)
                ->where('rf_grade_level.grade_type_id',$grade_type_id)
                ->get();

        }
        elseif($sy!='All' && $gradeType!='All' && $grade_level != 'All' && ($sectionName == 'All' || $sectionName == '')){
            $grade_level_ids = RfGradeLevel::find($grade_level);
            $grade_level_id = $grade_level_ids->grade_level_id;
            $students = DB::table('dt_students')
                ->join('dt_students_schedule','dt_students.student_id','=','dt_students_schedule.student_id')
                ->join('dt_schedule','dt_students_schedule.schedule_id','=','dt_schedule.schedule_id')
                ->join('rf_section','dt_schedule.section_id','=','rf_section.section_id')
                ->where('dt_schedule.school_year_id',$sy_id)
                ->where('rf_section.grade_level_id',$grade_level_id)
                ->get();

        }
        elseif($sy!='All' && $gradeType!='All' && $grade_level != 'All' && $sectionName != 'All'){
            $section_ids = RfSection::find($sectionName);
            $section_id = '';
            if($section_ids != ''){ $section_id = $section_ids->section_id; }

            $students = DB::table('dt_students')
                ->join('dt_students_schedule','dt_students.student_id','=','dt_students_schedule.student_id')
                ->join('dt_schedule','dt_students_schedule.schedule_id','=','dt_schedule.schedule_id')
                ->join('rf_section','dt_schedule.section_id','=','rf_section.section_id')
                ->where('dt_schedule.school_year_id',$sy_id)
                ->where('rf_section.section_id',$section_id)
                ->get();

        }



        $datatableFormat = new DatatableFormat();
        return $datatableFormat->format($students);
	    

    }
}
