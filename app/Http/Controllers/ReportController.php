<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Pdf;

class ReportController extends Controller
{

    public function enrolledStudents(){

        $pdf = Pdf::loadView('sms.reports.enrolled-students');
        
        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 2)
                    ->setOption('margin-left', 1)
                    ->setOption('margin-right', 1)
                    ->setOption('margin-top', 2)
                    ->stream('report.pdf');
    }
    
    public function getPopulation(){


    }

}

