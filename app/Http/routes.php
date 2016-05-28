<?php

/*
|--------------------------------------------------------------------------
| SMS
|--------------------------------------------------------------------------
|
|	BACKEND : Ralph Reigh Degoma
|	DATABASE: Aldwin Cafe Filoteo
| 	
*/




Route::get('/','MainloaderController@home');




Route::post('editable', function(){
	return Request::input('value');
});



//SELECT BINDER
Route::get('/select-binder/get-father','SelectBinderController@getFather');
Route::get('/select-binder/get-mother','SelectBinderController@getMother');
Route::get('/select-binder/get-gradeLevel','SelectBinderController@getGradeLevel');
Route::get('/select-binder/get-guardian','SelectBinderController@getGuardian');





//R E G I S T R A R
Route::get('/sms/registrar/student-registration','MainloaderController@studentRegistration');
Route::post('/admin/new-student/registration','StudentController@newStudentSave');
Route::get('/admin/student/{student_id}/edit','StudentController@editStudent');




//R E G I S T E R E D | L I S T
Route::get('/sms/registrar/registered-list','StudentListController@registeredList');
Route::get('/sms/registrar/get-students','StudentListController@getStudents');



//E N R O L L M E NT
Route::get('/sms/registrar/enrollment','MainloaderController@enrollment');

//E N R O L L E D | S T U D E N T
Route::get('/sms/registrar/enrolled-student','MainloaderController@enrolledStudent');

//B I L L I N G
Route::get('/sms/billing/student-bill','MainloaderController@studentBill');
Route::get('/sms/setup/grade-level-fees','MainloaderController@levelFees');

//S E T U P
Route::get('sms/registrar/getgrade','RegistrarController@getGrade');
Route::get('sms/registrar/year','RegistrarController@getYear');
Route::get('sms/registrar/subject','RegistrarController@getSubject');
Route::get('sms/registrar/get-section','RegistrarController@getSection');

Route::post('/sms/registrar/save-grade-level','RegistrarController@saveGradeLevel');
Route::post('/sms/registrar/save-school-year','RegistrarController@saveSchoolYear');
Route::post('/sms/registrar/save-subject','RegistrarController@saveSubject');
Route::get('/sms/registrar/grade','RegistrarController@gradeLevel');

Route::post('/sms/registrar/remove-grade/{id}', 'RegistrarController@removeGrade');
Route::post('/sms/registrar/save-section','RegistrarController@saveSection');



// S E L E C T   B I N D E R
Route::post('/sms/select-binder/','RegistrarController@saveSubject');






//A C A D E M I C S
Route::get('/sms/setup/academics','MainloaderController@academicsSetup');



/*  S E C U R I T Y  */
		
//AUTHENTICATION
Route::get('admin/security/login/Authentication','Auth\AuthController@Authenticate');
Route::get('admin/security/security-menu','WyredController@securityMenu');
Route::get('admin/security/security-permissions','WyredController@securityPermissions');



Route::post('admin/security/login/Authentication','Auth\AuthController@postLogin');
Route::get('admin/security/logout','Auth\AuthController@logout');
		

//ACCOUNT MANAGEMENT
Route::get('/admin/security/create-account','WyredController@createAccount');
Route::post('/admin/save/account','WyredController@makeProfile');


//PASSWORD
Route::get('/forgot-password','WyredController@forgotPassword');
Route::get('/request-verification-code','WyredController@requestVerificationCode');
Route::post('/send-verification-code','WyredController@sendVerificationCode');
Route::post('/password-reset','WyredController@passwordReset');


//facebook
Route::get('auth/facebook', 'Auth\AuthFacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthFacebookController@handleProviderCallback');




//MISC
Route::get('truncate', 'MiscController@truncate');

