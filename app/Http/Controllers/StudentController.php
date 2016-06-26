<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Nationality;
use App\Parents;
use App\Religion;
use App\Occupation;
use App\Students;
use App\Student_Status;
use App\Parents_Students;
use App\Student_Images;
use App\Relationships;
use App\Batch;
use Image;
use File;
use Storage;
use App\RfSchoolYear;
use DB;
use Log;

class StudentController extends Controller
{
    
    public function newStudentSave(){

        $return = new rrdReturn();
        DB::beginTransaction();

                try {
                        if(Request::input('student_id_old') != ""){
                            $Students = Students::find(Request::input('student_id_old'));
                            Parents_Students::where('student_id' , Request::input('student_id_old'))->delete();
                        }else{
                            $Students = new Students(); 
                        }

                        $checkSchoolYear = new RfSchoolYear(); 
                        $checkSchoolYear = $checkSchoolYear->where('is_current','=',"1")->first();

                        if(count($checkSchoolYear) == 0){

                            $return = new rrdReturn();
                            return $return->status(false)
                                      ->message('Assign current school year first , cannot save student.')
                                      ->show();
                        }


                        $Students->batch_id          = substr($checkSchoolYear->sy_from, -2);
                        $Students->student_status_id = '1';
                        $Students->first_name        = Request::input('first_name');
                        $Students->middle_name       = Request::input('middle_name');
                        $Students->nick_name         = Request::input('nick_name');
                        $Students->last_name         = Request::input('last_name');
                        $Students->name_extension    = Request::input('name_extension');
                        $Students->gender            = Request::input('gender');
                        $Students->birthday          = Request::input('birthday');
                        $Students->birthplace        = Request::input('birthplace');
                        $Students->home_address      = Request::input('home_address');
                        $Students->cp_no             = Request::input('cp_no');
                        $Students->tel_no            = Request::input('tel_no');
                        $Students->save();

                        $StudentsId = $Students->max('student_id');

                        if(Request::input('parental') == "default"){

                            $this->saveNewFather($StudentsId);
                            $this->saveNewMother($StudentsId);
                        }
                        else if(Request::input('parental') == "checkParents"){  

                            $this->assignMother($StudentsId);
                            $this->assignFather($StudentsId);
                        }
                        else if(Request::input('parental') == "with-out-father"){  

                            $this->assignMother($StudentsId);
                            $this->saveNewFather($StudentsId);
                        }
                        else if(Request::input('parental') == "with-out-mother"){  
                            $this->saveNewMother($StudentsId);
                            $this->assignFather($StudentsId);
                        }


                        if(Request::input('guardian_check') != ""){

                            if(Request::input('guardian_id') != ""){
                                $this->assignGuardian($StudentsId);
                            }
                            
                        }else{
                            $this->saveNewGuardian($StudentsId);
                        }

                        if(Request::file('image_upload') != ""){
                           $this->saveImage($StudentsId); 
                        }
                        
                         DB::commit();

                }    

                catch (\Illuminate\Database\QueryException $e) {

                        Log::error($e->getMessage());
                        DB::rollback();
                        return $return->status(false)
                              ->message("An error has eccured, transactions immediately calls a database    rollback.
                                        This feature was designed by the software developer to prevent data loss and
                                        database uninttended data.".$e->getMessage() )
                              ->show();

                } 


                        
                        return $return->status(true)
                                      ->message("Awesome!, Student has been saved!")
                                      ->show();
    }

    public function saveImage($StudentsId){

        $storagePath = public_path("assets/people/students/".$StudentsId."/images");

        if(!File::exists($storagePath)) {

            if(Request::input('student_id_old') != ""){
                    Storage::deleteDirectory($storagePath);
                    File::makeDirectory($storagePath, 0755, true);
            }else{
                    File::makeDirectory($storagePath, 0755, true);
            }
        }
        
        $small  = Image::make(Request::file('image_upload'));
        $medium = Image::make(Request::file('image_upload'));
        $big    = Image::make(Request::file('image_upload'));

        $small->resize(50, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $medium->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $big->resize(700, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });


        $small->save($storagePath.'/small.jpg', 60);
        $medium->save($storagePath.'/medium.jpg', 60);
        $big->save($storagePath.'/big.jpg', 60);

    }

    public function assignMother($StudentsId){

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = Request::input('mothers_id');
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->parental_type_id = '1';
        $Parents_Students->save();
    }

    public function assignFather($StudentsId){

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = Request::input('father_id');
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->parental_type_id = '2';
        $Parents_Students->save();
    }

    public function assignGuardian($StudentsId){

        $Relationships = Relationships::firstOrNew(['relationship_name' => Request::input('relationship_name')]);
        $Relationships->save(['relationship_name' => Request::input('relationship_name')]);
        $RelationshipData = Relationships::where('relationship_name', '=', Request::input('relationship_name'))->first();


        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = Request::input('guardian_id');
        $Parents_Students->relationship_id  = $RelationshipData->relationship_id;
        $Parents_Students->parental_type_id = '3';
        $Parents_Students->save();
    }

    public function saveNewGuardian($StudentsId){

        $checkParents = new Parents(); 
        $checkParents = $checkParents
                        ->where('parents_name',Request::input('guardian_name'))
                        ->get();

        if(count($checkParents) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Person Already exists, Check it on the list and try again.')
                      ->show();
        }

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('guardian_nationality')]);
        $Nationality->save(['nationality_name' => Request::input('guardian_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('guardian_nationality'))->first();

        $Relationships = Relationships::firstOrNew(['relationship_name' => Request::input('relationship_name')]);
        $Relationships->save(['relationship_name' => Request::input('relationship_name')]);
        $RelationshipData = Relationships::where('relationship_name', '=', Request::input('relationship_name'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('guardian_religion')]);
        $Religion->save(['religion_name' => Request::input('guardian_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('guardian_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('guardian_occupation')]);
        $Occupation->save(['designation_name' => Request::input('guardian_occupation')]);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('guardian_occupation'))->first();
        

        if(Request::input('guardian_parent_id') != ""){
            $Guardian = Parents::find(Request::input('guardian_parent_id'));
        }else{
            $Guardian = new Parents();
        }

        $Guardian->parents_name       = Request::input('guardian_name');
        $Guardian->dob                = Request::input('guardian_birthday');
        $Guardian->firm_employer_name = Request::input('guardian_firm');
        $Guardian->residence_tel      = Request::input('guardian_residence_tel');
        $Guardian->office_tel         = Request::input('guardian_office_tel');
        $Guardian->home_address       = Request::input('guardian_home_address');
        $Guardian->nationality_id     = $NationalityData->nationality_id;
        $Guardian->religion_id        = $ReligionData->religion_id;
        $Guardian->occupation_id      = $OccupationData->occupation_id;
        $Guardian->save();

        if(Request::input('guardian_parent_id') != ""){
            $parent_id = Request::input('guardian_parent_id');
        }else{
            $parent_id = $Guardian->max('parent_id');
        }
    
        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $parent_id;
        $Parents_Students->relationship_id  = $RelationshipData->relationship_id;
        $Parents_Students->parental_type_id = '3';
        $Parents_Students->save();
    }

    public function saveNewMother($StudentsId){

        $checkParents = new Parents(); 
        $checkParents = $checkParents
                        ->where('parents_name',Request::input('mothers_name'))
                        ->get();

        if(count($checkParents) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('The person you specified as a mother already exists, Check it on the list and try again.')
                      ->show();
        }

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('mothers_nationality')]);
        $Nationality->save(['nationality_name' => Request::input('mothers_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('mothers_nationality'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('mothers_religion')]);
        $Religion->save(['religion_name' => Request::input('mothers_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('mothers_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('mothers_occupation')]);
        $Occupation->save(['designation_name' => Request::input('designation_name')]);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('mothers_occupation'))->first();

        

        if(Request::input('mother_parent_id') != ""){
            $Mother = Parents::find(Request::input('mother_parent_id'));
        }else{
            $Mother = new Parents; 
        }

        $Mother->parents_name       = Request::input('mothers_name');
        $Mother->dob                = Request::input('mothers_dob');
        $Mother->firm_employer_name = Request::input('mothers_firm');
        $Mother->residence_tel      = Request::input('mothers_residence_tel');
        $Mother->office_tel         = Request::input('mothers_office_tel');
        $Mother->home_address       = Request::input('mothers_home_address');
        $Mother->nationality_id     = $NationalityData->nationality_id;
        $Mother->religion_id        = $ReligionData->religion_id;
        $Mother->occupation_id      = $OccupationData->occupation_id;
        $Mother->save();


        if(Request::input('mother_parent_id') != ""){
            $parent_id = Request::input('mother_parent_id');
        }else{
            $parent_id = $Mother->max('parent_id');
        }

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $parent_id;
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->parental_type_id = '1';
        $Parents_Students->save();
    }

    public function saveNewFather($StudentsId){

        $checkParents = new Parents(); 
        $checkParents = $checkParents
                        ->where('parents_name',Request::input('fathers_name'))
                        ->get();

        if(count($checkParents) > 0){
            $return = new rrdReturn();
            return $return->status(false)
                      ->message('The person you specified as a father already exists, Check it on the list and try again.')
                      ->show();
        }

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('fathers_nationality')]);
            
        $Nationality->save(['nationality_name' => Request::input('fathers_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('fathers_nationality'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('fathers_religion')]);
        $Religion->save(['religion_name' => Request::input('fathers_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('fathers_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('fathers_occupation')]);
        $Occupation->save(['designation_name' => Request::input('fathers_occupation') ]);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('fathers_occupation'))->first();


        if(Request::input('father_parent_id') != ""){
            $Father = Parents::find(Request::input('father_parent_id'));
        }else{
            $Father = new Parents; 
        }

        $Father->parents_name       = Request::input('fathers_name');
        $Father->dob                = Request::input('fathers_dob');
        $Father->firm_employer_name = Request::input('fathers_firm');
        $Father->residence_tel      = Request::input('fathers_residence_tel');
        $Father->office_tel         = Request::input('fathers_office_tel');
        $Father->nationality_id     = $NationalityData->nationality_id;
        $Father->home_address       = Request::input('fathers_home_address');
        $Father->religion_id        = $ReligionData->religion_id;
        $Father->occupation_id      = $OccupationData->occupation_id;
        $Father->save();

        if(Request::input('father_parent_id') != ""){
            $parent_id = Request::input('father_parent_id');
        }else{
            $parent_id = $Father->max('parent_id');
        }

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $parent_id;
        $Parents_Students->parental_type_id = '2';
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->save();

    }


    public function editStudent($student_id){

        $student = Students::with('Parents_Students','Parents_Students.Parents',
                                  'Parents_Students.Parents.Nationality',
                                  'Parents_Students.Parents.Occupation',
                                  'Parents_Students.Parents.Religion',
                                  'Parents_Students.Relationships')
                        ->where('student_id',$student_id)
                        ->first();


        return view('sms/registrar/student-registration')
                ->with('student',$student)
                ->with('student_id',$student_id);
    }

    public function searchStudent(){


        $id  = substr(Request::input('searchInput'), 3);

        $students = Students::where('first_name', 'like','%'.Request::input('searchInput').'%')
                            ->orwhere('last_name', 'like','%'.Request::input('searchInput').'%')
                            ->orwhere('middle_name', 'like','%'.Request::input('searchInput').'%')
                            ->orwhere('student_id', '=',$id)
                        ->get();

        if(count($students) == 0){
            return "";
        }
        return view('sms.registrar.students-found')->with('students',$students);

    }

    public function searchStudentAlphabet(){


        $id  = substr(Request::input('searchInput'), 3);

        $students = Students::where('last_name', 'like',Request::input('searchInput').'%')->get();

        if(count($students) == 0){
            return "";
        }

        return view('sms.registrar.students-found')->with('students',$students);
    }

    
}
