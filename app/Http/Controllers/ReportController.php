<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Validator;
use Pdf;
use App\RfSchoolYear;
use App\RfGradeLevel;
use App\RfGradeType;
use App\RfSection;
use App\StudentSchedule;
class ReportController extends Controller
{

    public function enrolledStudents(){
        $sy = RfSchoolYear::find(2);

        $populations = RfGradeType::with('getGradeLevel.getSection.Schedule.StudentSchedule.Students')
            ->wherehas('getGradeLevel.getSection.Schedule', function($q){
                $q->where('school_year_id','2');
            })
        ->where('grade_type','!=','All')
        ->get();
 
           $pdf = Pdf::loadView('sms.reports.enrolled-students',compact('populations','sy'));
        
           return $pdf->setPaper('letter')->setOrientation('portrait')
                       ->setOption('margin-bottom', 2)
                       ->setOption('margin-left', 1)
                       ->setOption('margin-right', 1)
                       ->setOption('margin-top', 2)
                       ->stream('report.pdf');
    }
    
    public function generateMasterlist(){
            $request = Request::all();
            $grade_type = $request['gradeType'];
            $grade_level = $request['grade_level'];
            $section = $request['section_name'];

            if($section == 'All'){
                return $this->generateGradeList($grade_type,$grade_level);
            }
            $grade = RfGradeLevel::find($grade_level);
            $sec = RfSection::find($section);
                $populations = RfSection::with('Schedule.StudentSchedule.Students')
                        ->where('section_id',$section)
                        ->get();
                   

          $pdf = Pdf::loadView('sms.reports.masterlist-generate',compact('grade_type','grade_level','section','grade','sec','populations'));
        
            return $pdf->setPaper('letter')->setOrientation('portrait')
                        ->setOption('margin-bottom', 2)
                        ->setOption('margin-left', 1)
                        ->setOption('margin-right', 1)
                       ->setOption('margin-top', 2)
                        ->stream('report.pdf');
    }

    public function generateGradeList($grade_type, $grade_level ){


            $grade = RfGradeLevel::find($grade_level);
                $populations = RfGradeLevel::with('getSection.Schedule.StudentSchedule.Students')
                        ->where('grade_level_id',$grade_level)
                        ->get();
                   

          $pdf = Pdf::loadView('sms.reports.gradelevel-masterlist',compact('grade_type','grade_level','grade','sec','populations'));
        
            return $pdf->setPaper('letter')->setOrientation('portrait')
                        ->setOption('margin-bottom', 2)
                        ->setOption('margin-left', 1)
                        ->setOption('margin-right', 1)
                       ->setOption('margin-top', 2)
                        ->stream('report.pdf');
    }

}

