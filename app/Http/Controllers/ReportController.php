<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Validator;
use Pdf;

class ReportController extends Controller
{

    public function farmerForm(){

        $pdf = Pdf::loadView('bis.reports.farmersprofile');

        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 2)
                    ->setOption('margin-left', 1)
                    ->setOption('margin-right', 1)
                    ->setOption('margin-top', 2)
                    ->stream('report.pdf');
    }
    public function test_pdf(){

    	$pdf = Pdf::loadView('bis.reports.reports');
        
        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 0)
                    ->setOption('margin-left', 0)
                    ->setOption('margin-top', 0)
                    ->stream('report.pdf');
    }

    public function bargraphGuiReport(){

    	$incomeGraph = db::table('tblviewgraph')
    			->where('person_id',Request::input('person_id'))
    			->where('year','>=',Request::input('start'))
    			->where('year','<=',Request::input('end'))
    			->orderby('year','asc')
    			->get();

    	return $incomeGraph;

    }

    public function getFarmersReports(){

    	$person = db::table('ref_person')
    		->get();

        $organization = db::table('ref_organization')
            ->where('organization_name','<>',"")
            ->get();

        $tribes = db::table('ref_tribe')
            ->where('tribe_name','<>',"")
            ->get();

        $federation = db::table('ref_federation')
            ->where('federation_name','<>',"")
            ->get();


        return view('bis.farmers.reports')
        		->with('person',$person)
                ->with('federation',$federation)
                ->with('organization',$organization)
                ->with('tribes',$tribes);
    }

    public function trackYears(){

        $return = new rrdReturn();

        $validator = Validator::make(
            [
                'sub_category'     => Request::input('sub_category'),
                'start'     => Request::input('start'),
                'end'     => Request::input('end')

            ],
            [
                'sub_category'        => 'required',
                'start'        => 'required',
                'end'        => 'required'
               
            ]
        );

        if ($validator->fails())
        {
            return "<label>".$validator->errors()->first()."</label>";

        }

   

        if(Request::input("sub_category") == "percentage"){

            return $this->percentageReport();

        }else{

            
            $income = db::table('tblviewreportincome')
                    ->where('person_id',Request::input('sub_category'))
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();

            $expenses = db::table('tblviewreportexpenses')
                    ->where('person_id',Request::input('sub_category'))
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();
        }


        if(count($income) == 0){
            return "nothing to show";
        }


        $person =  array();
        $av =  array();
        $year =  array();
        $tempYear = "";
        $personHolder = "";
        $finalData = array();

      
        

        foreach ($income as $key => $value) {
            
            if($tempYear == ""){
                $tempYear =  $value->year;
                $year[] = $value->year;
            }

            if($tempYear != $value->year){

                $tempYear =  $value->year;
                $year[] = $value->year;

            }

        }

        foreach($year as $yearValue){

            foreach($income as $dataValue){

                    if($yearValue == $dataValue->year){

                        $finalIncomeData[$yearValue][] = $dataValue;
                    }
                }
        }

    
        

        foreach($year as $yearValue){

            foreach($expenses as $dataValue){

                if($yearValue == $dataValue->year){

                    $finalExpensesData[$yearValue][] = $dataValue;
                }
            }

        }





        $sorter = Request::all();

        $pdf = Pdf::loadView('bis.reports.trackYears',['sorter'=> $sorter,'finalExpensesData' => $finalExpensesData,'finalIncomeData' => $finalIncomeData]);
        
     
        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');

    }

    public function reportFilter($table){

        if( Request::input('sub_category') == "All" and
            Request::input('selOrganization') == "All"
            ){

            return db::table($table)
                        ->where('year','>=',Request::input('start'))
                        ->where('year','<=',Request::input('end'))
                        ->orderby('year','asc')
                        ->get();

        }else if( Request::input('sub_category') != "All"){

            return db::table($table)
                        ->where('year','>=',Request::input('start'))
                        ->where('year','<=',Request::input('end'))
                        ->where('person_id','=',Request::input('sub_category'))
                        ->orderby('year','asc')
                        ->get();

        }
        else if( Request::input('sub_category') == "All" and
                  Request::input('selOrganization') != "All"
                ){

            return db::table($table)
                        ->where('year','>=',Request::input('start'))
                        ->where('year','<=',Request::input('end'))
                        ->where('organization_id','=',Request::input('selOrganization'))
                        ->orderby('year','asc')
                        ->get();

        }
        
       
        else if( Request::input('sub_category') == "All" and
                  Request::input('selOrganization') != "All"
                ){

            return db::table($table)
                        ->where('year','>=',Request::input('start'))
                        ->where('year','<=',Request::input('end'))
                        ->where('organization_id','=',Request::input('selOrganization'))
                        ->orderby('year','asc')
                        ->get();

        }
       

    }



    public function summarizedReport(){

        $return = new rrdReturn();



        $validator = Validator::make(
            [
                'sub_category'     => Request::input('sub_category'),
                'start'     => Request::input('start'),
                'end'     => Request::input('end')

            ],
            [
                'sub_category'        => 'required',
                'start'        => 'required',
                'end'        => 'required'
               
            ]
        );

        if ($validator->fails())
        {
            return "<label>".$validator->errors()->first()."</label>";

        }

        if (Request::input('report_type')  == "detailed"){

            return $this->detailedReport();

        }


        $income = $this->reportFilter('tblviewreportincome');

        
        $expenses = $this->reportFilter('tblviewreportexpenses');


        /*ORGANIZATION LOOPING*/
        $orgHolder = "";
        $organizationData = [];
        $finalIncomeData= [];
        $finalExpensesData= [];

        $incomeFiltred = [];
        $expensesFiltred = [];
        $personHolder = "";
        $person = [];

        foreach($income as $incomeValue){

            $finalIncomeData[$incomeValue->organization_name][$incomeValue->last_name.", ".$incomeValue->first_name. " " .$incomeValue->middle_name][$incomeValue->year][] = $incomeValue;
        }


        foreach($finalIncomeData as $mainKey =>  $finalIncomeFilt){

                foreach($finalIncomeFilt as $personkey => $personLevel){

                    foreach($personLevel as $yearKey => $yearLevel){

                        
                        foreach($yearLevel as $key_year => $dataLevel){

                            if(!isset($totalAverage)){
                                $totalAverage = 0;
                            }

                            if($dataLevel->income_start == "Above "){
                                $dataLevel->income_start = 7000;
                            }

                            $average = ($dataLevel->income_start + $dataLevel->income_end) /2;
                            $dataLevel->averageValue = $average;
                            $totalAverage += $dataLevel->averageValue; 
                            
                        }

                        foreach($yearLevel as $key_year => $dataLevel){

                            $dataLevel->totalValue = $totalAverage;
 
                        }

                        $average = 0;
                        $totalAverage = 0;

                        $incomeFiltred[$mainKey][$personkey][$yearKey] = $personLevel[$yearKey][0];
                        
                    }   
                }
        }
        

        foreach($expenses as $expensesValue){

            $finalExpensesData[$expensesValue->organization_name][$expensesValue->last_name.", ".$expensesValue->first_name. " " .$expensesValue->middle_name][$expensesValue->year][] = $expensesValue;
        }
        foreach($finalExpensesData as $mainKeyEx =>  $finalExpensesFilt){

                foreach($finalExpensesFilt as $personkeyEx => $personLevelEx){

                    foreach($personLevelEx as $yearKeyEx => $yearLevelEx){
                        
                        foreach($yearLevelEx as $key_yearEx => $dataLevelEx){

                            if(!isset($totalAverageEx)){
                                $totalAverageEx = 0;
                            }   



                            if($dataLevelEx->expenses_start == "Above "){
                                $dataLevelEx->expenses_start = 7000;
                            }

                            $averagex = ($dataLevelEx->expenses_start + $dataLevelEx->expenses_end) /2;
                            $dataLevelEx->averageValueEx = $averagex;
                            $totalAverageEx += $dataLevelEx->averageValueEx; 
                            
                        }

                        foreach($yearLevelEx as $key_yearEx => $dataLevelEx){

                            $dataLevelEx->totalValueEx = $totalAverageEx;
 
                        }

                        

                        $averagex = 0;
                        $totalAverageEx = 0;

                        $expensesFiltred[$mainKeyEx][$personkeyEx][$yearKeyEx] = $personLevelEx[$yearKeyEx][0];
                        
                    }   
                }
        }


        $sorter = Request::all();
        if(Request::input('selOrganization') != "All"){

            $data = db::table('ref_organization')
                    ->where('organization_id' , Request::input('selOrganization'))->first();
            
            $org = array('org' => $data);

        }else{

            $org = array('org' => Request::input('selOrganization'));

        }

        



        $pdf = Pdf::loadView('bis.reports.summarized',['org'=> $org,'sorter'=> $sorter,'finalExpensesData' => $expensesFiltred,'finalIncomeData' => $incomeFiltred]);
        
     
        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');

     

                    
    }

    public function detailedReport(){


        $return = new rrdReturn();

        $validator = Validator::make(
            [
                'sub_category'     => Request::input('sub_category'),
                'start'     => Request::input('start'),
                'end'     => Request::input('end')

            ],
            [
                'sub_category'        => 'required',
                'start'        => 'required',
                'end'        => 'required'
               
            ]
        );

        if ($validator->fails())
        {
            return "<label>".$validator->errors()->first()."</label>";

        }

        

        $income = db::table('tblviewreportincome')
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();


        $expenses = db::table('tblviewreportexpenses')
                ->where('year','>=',Request::input('start'))
                ->where('year','<=',Request::input('end'))
                ->orderby('year','asc')
                ->get();

        if(Request::input('selOrganization') != "All"){

            $data = db::table('ref_organization')
                    ->where('organization_id' , Request::input('selOrganization'))->first();
            
            $org = array('org' => $data);

        }else{

            $org = array('org' => Request::input('selOrganization'));

        }
        

        /*ORGANIZATION LOOPING*/
        $orgHolder = "";
        $organizationData = [];
        $finalIncomeData= [];
        $finalExpensesData= [];

        $incomeFiltred = [];
        $expensesFiltred = [];
        $personHolder = "";
        $person = [];

        foreach($income as $incomeValue){

            $finalIncomeData[$incomeValue->organization_name][$incomeValue->last_name.", ".$incomeValue->first_name. " " .$incomeValue->middle_name][$incomeValue->year][] = $incomeValue;
        }


        foreach($finalIncomeData as $mainKey =>  $finalIncomeFilt){

                foreach($finalIncomeFilt as $personkey => $personLevel){

                    foreach($personLevel as $yearKey => $yearLevel){

                        
                        foreach($yearLevel as $key_year => $dataLevel){

                            if(!isset($totalAverage)){
                                $totalAverage = 0;
                            }

                            if($dataLevel->income_start == "Above "){
                                $dataLevel->income_start = 7000;
                            }

                            $average = ($dataLevel->income_start + $dataLevel->income_end) /2;
                            $dataLevel->averageValue = $average;
                            $totalAverage += $dataLevel->averageValue; 
                            $incomeFiltred[$mainKey][$personkey][$yearKey][] = $dataLevel;
                        }


                        foreach($yearLevel as $key_year => $dataLevel){

                            $dataLevel->totalValue = $totalAverage;
                            
                        }

                        $average = 0;
                        $totalAverage = 0;

                        
                        
                    }   
                }
        }

        

        foreach($expenses as $expensesValue){

            $finalExpensesData[$expensesValue->organization_name][$expensesValue->last_name.", ".$expensesValue->first_name. " " .$expensesValue->middle_name][$expensesValue->year][] = $expensesValue;
        }

        foreach($finalExpensesData as $mainKeyEx =>  $finalExpensesFilt){

                foreach($finalExpensesFilt as $personkeyEx => $personLevelEx){

                    foreach($personLevelEx as $yearKeyEx => $yearLevelEx){
                        
                        foreach($yearLevelEx as $key_yearEx => $dataLevelEx){

                            if(!isset($totalAverageEx)){
                                $totalAverageEx = 0;
                            }   



                            if($dataLevelEx->expenses_start == "Above "){
                                $dataLevelEx->expenses_start = 7000;
                            }

                            $averagex = ($dataLevelEx->expenses_start + $dataLevelEx->expenses_end) /2;
                            $dataLevelEx->averageValueEx = $averagex;
                            $totalAverageEx += $dataLevelEx->averageValueEx; 
                            $expensesFiltred[$mainKeyEx][$personkeyEx][$yearKeyEx] = $dataLevelEx;
                        }

                        foreach($yearLevelEx as $key_yearEx => $dataLevelEx){

                            $dataLevelEx->totalValueEx = $totalAverageEx;
 
                        }

                        

                        $averagex = 0;
                        $totalAverageEx = 0;

                        
                        
                    }   
                }
        }


        $sorter = Request::all();

        $pdf = Pdf::loadView('bis.reports.detailedIncomeExpenses',['org'=> $org,'sorter'=> $sorter,'finalExpensesData' => $expensesFiltred,'finalIncomeData' => $incomeFiltred]);
        
     
        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');

        }
    

    public function allFarmerReport(){

        $income = db::table('tblviewreportincome')
                ->where('year','>=',Request::input('start'))
                ->where('year','<=',Request::input('end'))
                ->orderby('person_id','asc')
                ->orderby('year','asc')
                ->get();

        $expenses = db::table('tblviewreportexpenses')
                ->where('year','>=',Request::input('start'))
                ->where('year','<=',Request::input('end'))
                ->orderby('person_id','asc')
                ->orderby('year','asc')
                ->get();


        if(count($income) == 0){
            return "nothing to show";
        }


        $person =  array();
        $av =  array();
        $year =  array();
        $tempYear = "";
        $personHolder = "";
        $finalData = array();


         /*PERSON LOOPING*/

        foreach ($income as $key => $value) {
            
            if($personHolder == ""){
                $personHolder =  $value->person_id;
                $person[] = $value->person_id;
            }
            if($personHolder != $value->person_id){

                $personHolder =  $value->person_id;
                $person[] = $value->person_id;
            }
        }
        
        

         /*INCOME LOOPING*/
        
       
        $yearCount = 0;

        foreach ($income as $key => $value) {
            
            if($key == 0){
                $year[] = $tempYear;
            }


            foreach ($year as $keyYear => $yearVal) {

                if($value->year == $yearVal){
                    $yearCount++;
                }

            }
            if($yearCount == 0 ){
                    $year[] = $value->year;
            }

            $yearCount = 0;
            
        }   



        foreach($person as $personValue){

            foreach($income as $dataValue){
                
                if($personValue == $dataValue->person_id){

                    foreach($year as $yearValue){

                        if($yearValue == $dataValue->year){

                            $finalIncomeData[$personValue][$yearValue][] = $dataValue;
                        }
                    }
                }

            }
        }


        $year = [];
        /*EXPENSES LOOPING*/
        $yearCount = 0;

        foreach ($expenses as $key => $value) {
            
            if($key == 0){
                $year[] = $tempYear;
            }


            foreach ($year as $keyYear => $yearVal) {

                if($value->year == $yearVal){
                    $yearCount++;
                }

            }
            if($yearCount == 0 ){
                    $year[] = $value->year;
            }

            $yearCount = 0;
            
        }   


        foreach($person as $personValue){

            foreach($expenses as $dataValue){

                if($personValue == $dataValue->person_id){
                    
                    foreach($year as $yearValue){

                        if($yearValue == $dataValue->year){

                            $finalExpensesData[$personValue][$yearValue][] = $dataValue;
                        }
                    }
                }

            }
        }


        $sorter = Request::all();

       /* return view('bis.reports.trackYearsAllPeople')
                ->with('sorter', $sorter)
                ->with('finalExpensesData', $finalExpensesData)
                ->with('finalIncomeData', $finalIncomeData);*/



        $pdf = Pdf::loadView('bis.reports.trackYearsAllPeople',['sorter'=> $sorter,'finalExpensesData' => $finalExpensesData,'finalIncomeData' => $finalIncomeData]);
            

        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');
    }

    public function bargraph(){


        $return = new rrdReturn();/**/

        $validator = Validator::make(
            [
                'sub_category'     => Request::input('sub_category'),
                'start'     => Request::input('start'),
                'end'     => Request::input('end')

            ],
            [
                'sub_category'        => 'required',
                'start'        => 'required',
                'end'        => 'required'
               
            ]
        );

        if ($validator->fails())
        {
            return "<label>".$validator->errors()->first()."</label>";

        }

        if(Request::input("sub_category") == "All"){

            $income = db::table('tblviewreportincome')
                ->where('year','>=',Request::input('start'))
                ->where('year','<=',Request::input('end'))
                ->orderby('year','asc')
                ->get();

            $expenses = db::table('tblviewreportexpenses')
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();
        }else{

            
            $income = db::table('tblviewreportincome')
                    ->where('person_id',Request::input('sub_category'))
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();

            $expenses = db::table('tblviewreportexpenses')
                    ->where('person_id',Request::input('sub_category'))
                    ->where('year','>=',Request::input('start'))
                    ->where('year','<=',Request::input('end'))
                    ->orderby('year','asc')
                    ->get();
        }


        if(count($income) == 0){
            return "nothing to show";
        }


        $final =  array();
        $av =  array();
        $year =  array();
        $tempYear = "";


        $finalData = array();

        foreach ($income as $key => $value) {
            
            if($tempYear == ""){
                $tempYear =  $value->year;
                $final[][] = $value;
                $year[] = $value->year;
            }

            if($tempYear != $value->year){

                $tempYear =  $value->year;
                $final[][] = $value;
                $year[] = $value->year;

            }

        }


        foreach($year as $yearValue){

            foreach($income as $dataValue){

                if($yearValue == $dataValue->year){

                    $finalIncomeData[$yearValue][] = $dataValue;
                }
            }

        }




        foreach ($expenses as $key => $value) {
            
            if($tempYear == ""){
                $tempYear =  $value->year;
                $final[][] = $value;
                $year[] = $value->year;
            }

            if($tempYear != $value->year){

                $tempYear =  $value->year;
                $final[][] = $value;
                $year[] = $value->year;

            }

        }


        foreach($year as $yearValue){

            foreach($expenses as $dataValue){

                if($yearValue == $dataValue->year){

                    $finalExpensesData[$yearValue][] = $dataValue;
                }
            }

        }




        $sorter = Request::all();

        return view('bis.reports.bargraph')
                    ->with('finalExpensesData',$finalExpensesData)
                    ->with('sorter',$sorter)
                    ->with('finalIncomeData',$finalIncomeData);
                    
        if(Request::input("sub_category") == "All"){

            
             
            $pdf = Pdf::loadView('bis.reports.trackYearsAllPeople',['sorter'=> $sorter,'finalExpensesData' => $finalExpensesData,'finalIncomeData' => $finalIncomeData]);
        }else{
            $pdf = Pdf::loadView('bis.reports.trackYears',['sorter'=> $sorter,'finalExpensesData' => $finalExpensesData,'finalIncomeData' => $finalIncomeData]);
        }
       /* $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 12000);

        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);*/

        
    }
    public function trackInfo($id){

        

    }



    public function seminarReport(){
        return view('bis.reports.seminar-reports');
    }

    public function seminarReportB(){
        return view('bis.reports.seminar-reports-b');
    }

    public function seminarAttendance($id){




        $seminar = DB::table('ref_seminar')
                    ->where('ref_seminar.seminar_id',$id)
                    ->first();

        $seminar_id = $seminar->seminar_id;

        $farmers = DB::table('ref_person')
                        ->join('dat_seminar', 'ref_person.person_id', '=', 'dat_seminar.person_id')
                        ->join('ref_organization','ref_person.organization_id','=','ref_organization.organization_id')
                        ->where('dat_seminar.seminar_id',$seminar_id)
                        ->select('ref_person.first_name','ref_person.last_name','ref_organization.organization_name')
                        ->distinct()
                        ->orderby('last_name','asc')
                        ->get();

        $person    = array('person' => $farmers );
        $arrayName = array('uu'=> $seminar);


        $pdf = Pdf::loadView('bis.reports.seminar-attendance',$arrayName,$person);


        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');


    }

    public function listReport(){

            $lists   = input::all();
            $tech   = $lists['tech_applied'];
            $gender = $lists['gender'];
            $year   = $lists['year'];

            if($tech == 'All' && $gender == 'All' && $year == ''){

                $list = DB::table('ref_person')
                        ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                        ->select('ref_person.*','ref_organization.*')
                        ->distinct()
                        ->orderby('ref_person.last_name','asc')
                        ->get();
            }
            elseif($tech == 'All' && $gender == 'All' && $year !=''){
                 $list = DB::table('ref_person')
                    ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                    ->join('dat_tracking', 'ref_person.person_id','=','dat_tracking.person_id')
                    ->where('dat_tracking.year',$year)
                    ->select('ref_person.*','ref_organization.*')
                    ->distinct()
                    ->orderby('ref_person.last_name','asc')
                    ->get();

            }
            elseif($tech != 'All' && $gender == 'All' && $year == '' ){
                  $list = DB::table('ref_person')
                            ->join('tblviewtk','ref_person.person_id','=','tblviewtk.person_id')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->where('tblviewtk.technology_apply',$tech)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();

            }
            elseif($tech != 'All' && $gender != 'All' && $year == '' ){
                    $list = DB::table('ref_person')
                            ->join('tblviewtk','ref_person.person_id','=','tblviewtk.person_id')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->where('tblviewtk.technology_apply',$tech)
                            ->where('ref_person.gender',$gender)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();
            }
            elseif($tech != 'All' && $gender == 'All' && $year != '' ){
                    $list = DB::table('ref_person')
                            ->join('tblviewtk','ref_person.person_id','=','tblviewtk.person_id')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->join('dat_tracking', 'ref_person.person_id','=','dat_tracking.person_id')
                            ->where('dat_tracking.year',$year)
                            ->where('tblviewtk.technology_apply',$tech)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();
            }
            elseif($tech != 'All' && $gender != 'All' && $year != '' ){
                $list = DB::table('ref_person')
                            ->join('tblviewtk','ref_person.person_id','=','tblviewtk.person_id')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->join('dat_tracking', 'ref_person.person_id','=','dat_tracking.person_id')
                            ->where('dat_tracking.year',$year)
                            ->where('tblviewtk.technology_apply',$tech)
                            ->where('ref_person.gender',$gender)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();

            }
            elseif($tech == 'All' && $gender != 'All' && $year == '' ){
                 $list = DB::table('ref_person')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->where('ref_person.gender',$gender)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();

            }
            elseif($tech == 'All' && $gender != 'All' && $year != '' ){
                        $list = DB::table('ref_person')
                            ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                            ->join('dat_tracking', 'ref_person.person_id','=','dat_tracking.person_id')
                            ->where('dat_tracking.year',$year)
                            ->where('ref_person.gender',$gender)
                            ->select('ref_person.*','ref_organization.*')
                            ->distinct()
                            ->orderby('ref_person.last_name','asc')
                            ->get();
            }

             if($year=='') $year=='All';      

       $arrayName = array('li' => $list );     
            
        $pdf = Pdf::loadView('bis.reports.list-report',$arrayName, ['tech'=>$tech,'gender'=>$gender,'year'=>$year]);


        return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');


    }

    public function farmerSeminar($id){

            $farmer = DB::table('ref_person')
                        ->join('ref_organization', 'ref_person.organization_id','=','ref_organization.organization_id')
                        ->where('ref_person.person_id',$id)
                        ->first();

            $seminar = DB::table('ref_seminar')
                        ->join('dat_seminar','ref_seminar.seminar_id','=','dat_seminar.seminar_id')
                        ->where('dat_seminar.person_id',$id)
                        ->select('ref_seminar.*')
                        ->orderby('ref_seminar.date','desc')
                        ->distinct()
                        ->get();

                  $far = array('farmer' => $farmer ); 
                  $sem = array('seminar' => $seminar );           

         $pdf = Pdf::loadView('bis.reports.farmer-seminar-report',$far,$sem);

         return $pdf->setPaper('letter')->setOrientation('portrait')
                    ->setOption('margin-bottom', 10)
                    ->setOption('margin-left', 10)
                    ->setOption('margin-top', 10)
                    ->setOption('enable-javascript', true)
                    ->setOption('javascript-delay', 1000)
                    ->stream('reports.pdf');

    }

}

