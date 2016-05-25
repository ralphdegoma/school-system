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
use App\Relationship;
use Image;
use File;
use Storage;



class StudentController extends Controller
{
    
    public function newStudentSave(){

        $Students                    = new Students(); 
        $check = $Students->find(Request::input('student_id'));

        if(count($check) > 0){

            $return = new rrdReturn();
            return $return->status(false)
                      ->message('Student ID already exist, please specify another one.')
                      ->show();
        }

        $Students->student_id        = Request::input('student_id');
        $Students->student_status_id = '1';
        $Students->first_name        = Request::input('first_name');
        $Students->middle_name       = Request::input('middle_name');
        $Students->last_name         = Request::input('last_name');
        $Students->name_extension    = Request::input('name_extension');
        $Students->gender            = Request::input('gender');
        $Students->birthday          = Request::input('birthday');
        $Students->birthplace        = Request::input('birthplace');
        $Students->home_address      = Request::input('home_address');
        $Students->cp_no             = Request::input('cp_no');
        $Students->tel_no            = Request::input('tel_no');
        $Students->save();

        $StudentsId = Request::input('student_id');

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

        if(Request::input('image_upload') != ""){
           $this->saveImage($StudentsId); 
        }
        

        $return = new rrdReturn();
        return $return->status(true)
                      ->message("New Property Type has been saved!")
                      ->show();
    }

    public function saveImage($StudentsId){

        $storagePath = public_path("assets/people/students/".$StudentsId."/images");

        if(!File::exists($storagePath)) {

            File::makeDirectory($storagePath, 0755, true);

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

    public function assignGuardian(){

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = Request::input('guardian_id');
        $Parents_Students->relationship_id  = "3";
        $Parents_Students->save();
    }

    public function saveNewGuardian($StudentsId){

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('mothers_nationality')]);
        $Nationality->save(['nationality_name' => Request::input('mothers_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('mothers_nationality'))->first();

        $Relationship = Relationship::firstOrNew(['relationship_name' => Request::input('relationship_name')]);
        $Relationship->save(['relationship_name' => Request::input('relationship_name')]);
        $RelationshipData = Relationship::where('relationship_name', '=', Request::input('relationship_name'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('mothers_religion')]);
        $Religion->save(['religion_name' => Request::input('mothers_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('mothers_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('mothers_occupation')]);
        $Occupation->save([Request::input('designation_name') => 'mothers_occupation']);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('mothers_occupation'))->first();
 
        $Guardian                     = new Parents; 
        $Guardian->parents_name       = Request::input('guardian_name');
        $Guardian->dob                = Request::input('guardian_birthday');
        $Guardian->firm_employer_name = Request::input('guardian_firm');
        $Guardian->residence_tel      = Request::input('guardian_residence_tel');
        $Guardian->office_tel         = Request::input('guardian_office_tel');
        $Guardian->nationality_id     = $NationalityData->nationality_id;
        $Guardian->religion_id        = $ReligionData->religion_id;
        $Guardian->occupation_id      = $OccupationData->occupation_id;
        $Guardian->save();

        $ParentsId = Parents::max('parent_id');
    
        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $ParentsId;
        $Parents_Students->relationship_id  = $ReligionData->relationship_id;
        $Parents_Students->parental_type_id = '3';
        $Parents_Students->save();
    }

    public function saveNewMother($StudentsId){

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('mothers_nationality')]);
        $Nationality->save(['nationality_name' => Request::input('mothers_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('mothers_nationality'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('mothers_religion')]);
        $Religion->save(['religion_name' => Request::input('mothers_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('mothers_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('mothers_occupation')]);
        $Occupation->save([Request::input('designation_name') => 'mothers_occupation']);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('mothers_occupation'))->first();

        $Mother                     = new Parents; 
        $Mother->parents_name       = Request::input('mothers_name');
        $Mother->dob                = Request::input('mothers_dob');
        $Mother->firm_employer_name = Request::input('mothers_firm');
        $Mother->residence_tel      = Request::input('mothers_residence_tel');
        $Mother->office_tel         = Request::input('mothers_office_tel');
        $Mother->nationality_id     = $NationalityData->nationality_id;
        $Mother->religion_id        = $ReligionData->religion_id;
        $Mother->occupation_id      = $OccupationData->occupation_id;
        $Mother->save();

        $ParentsId = Parents::max('parent_id');
    
        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $ParentsId;
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->parental_type_id = '1';
        $Parents_Students->save();
    }

    public function saveNewFather($StudentsId){

        $Nationality = Nationality::firstOrNew(['nationality_name' => Request::input('fathers_nationality')]);
            
        $Nationality->save(['nationality_name' => Request::input('fathers_nationality')]);
        $NationalityData = Nationality::where('nationality_name', '=', Request::input('fathers_nationality'))->first();

        $Religion = Religion::firstOrNew(['religion_name' => Request::input('fathers_religion')]);
        $Religion->save(['religion_name' => Request::input('fathers_religion')]);
        $ReligionData = Religion::where('religion_name', '=', Request::input('fathers_religion'))->first();

        $Occupation = Occupation::firstOrNew(['designation_name' => Request::input('fathers_occupation')]);
        $Occupation->save([Request::input('designation_name') => 'fathers_occupation']);
        $OccupationData = Occupation::where('designation_name', '=', Request::input('fathers_occupation'))->first();

        $Father                     = new Parents; 
        $Father->parents_name       = Request::input('fathers_name');
        $Father->dob                = Request::input('fathers_dob');
        $Father->firm_employer_name = Request::input('fathers_firm');
        $Father->residence_tel      = Request::input('fathers_residence_tel');
        $Father->office_tel         = Request::input('fathers_office_tel');
        $Father->nationality_id     = $NationalityData->nationality_id;
        $Father->religion_id        = $ReligionData->religion_id;
        $Father->occupation_id      = $OccupationData->occupation_id;
        $Father->save();

        $ParentsId = Parents::max('parent_id');

        $Parents_Students = new Parents_Students;
        $Parents_Students->student_id       = $StudentsId;
        $Parents_Students->parent_id        = $ParentsId;
        $Parents_Students->parental_type_id = '2';
        $Parents_Students->relationship_id  = "1";
        $Parents_Students->save();

    }

    
}
