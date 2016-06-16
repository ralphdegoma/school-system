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
Route::get('/select-binder/get-sectionName','SelectBinderController@getSectionName');
Route::get('/select-binder/get-KronosEmployee','SelectBinderController@KronosEmployee');
Route::get('/select-binder/get-students','SelectBinderController@getStudents');
Route::get('/select-binder/get-section-time','SelectBinderController@getSectionTime');
Route::get('/select-binder/get-section','SelectBinderController@getSection');



//AUTOSUGGESTS
Route::get('/autosuggest/getFather','AutoSuggestController@getFather');
Route::get('/autosuggest/getMother','AutoSuggestController@getMother');
Route::get('/autosuggest/getReligiion','AutoSuggestController@getReligiion');
Route::get('/autosuggest/getNationality','AutoSuggestController@getNationality');
Route::get('/autosuggest/getOccupation','AutoSuggestController@getOccupation');




//R E G I S T R A R
Route::get('/sms/registrar/student-registration','MainloaderController@studentRegistration');
Route::post('/admin/new-student/registration','StudentController@newStudentSave');
Route::get('/admin/student/{student_id}/edit','StudentController@editStudent');
Route::get('/sms/registrar/search-student','StudentController@searchStudent');
Route::get('/sms/registrar/search-student-alphabet','StudentController@searchStudentAlphabet');




//R E G I S T E R E D | L I S T
Route::get('/sms/registrar/registered-list','StudentListController@registeredList');
Route::get('/sms/registrar/get-students','StudentListController@getStudents');



//E N R O L L M E NT
Route::get('/sms/registrar/enrollment','MainloaderController@enrollment');
Route::post('/admin/sms/new-enroll','RegistrarController@enrollStudent');
Route::get('/sms/registrar/enrolled-student','MainloaderController@enrolledStudent');

//B I L L I N G
Route::get('/sms/billing/student-bill','MainloaderController@studentBill');
Route::get('/sms/setup/billing/fee-category','MainloaderController@categoryFee');
Route::get('/sms/setup/billing/fees','MainloaderController@setupFees');
Route::get('/sms/setup/billing/payment-type-schedule','MainloaderController@paymentTypeSchedules');
Route::get('/sms/setup/billing/grade-level-fees','MainloaderController@levelFees');
Route::get('/sms/setup/billing/tuition-reference','MainloaderController@tuitionReference');
Route::get('/sms/setup/billing/due-dates','MainloaderController@dueDates');



//A C A D E M E I C    S E T U P
Route::get('sms/registrar/getgrade','RegistrarController@getGrade');
Route::get('sms/registrar/year','RegistrarController@getYear');
Route::get('sms/registrar/subject','RegistrarController@getSubject');
Route::get('sms/registrar/get-section','RegistrarController@getSection');
Route::get('/sms/registrar/get-assign-subject','RegistrarController@getAssignSubject');
Route::post('sms/registrar/assign-subject','RegistrarController@assignSubject');
Route::post('/sms/registrar/save-grade-level','RegistrarController@saveGradeLevel');
Route::post('/sms/registrar/save-school-year','RegistrarController@saveSchoolYear');
Route::post('/sms/registrar/save-subject','RegistrarController@saveSubject');
Route::get('/sms/registrar/grade','RegistrarController@gradeLevel');
Route::post('/sms/registrar/remove/{remove}/{id}', 'RegistrarController@Remove');
Route::post('/sms/registrar/edit/grade/{id}', 'RegistrarController@Edit');
Route::post('/sms/registrar/save-section','RegistrarController@saveSection');
Route::get('/sms/get-subjects/with-filters','RegistrarController@getSubjectsWithFilters');
Route::get('/sms/get-list-subject','RegistrarController@getListSubjects');
Route::get('/sms/get-list-subject-edit','RegistrarController@getListSubjectsEdit');
Route::get('/sms/get-list-schedules','RegistrarController@getListSchedules');




// K R O N O S
Route::get('/sms/kronos/time-attendance','MainloaderController@timeAttendance');
Route::get('/sms/kronos/schedulling','MainloaderController@schedulling');



// S E L E C T   B I N D E R
Route::post('/sms/select-binder/','RegistrarController@saveSubject');






//A C A D E M I C S
Route::get('/sms/setup/academics','MainloaderController@academicsSetup');
Route::get('/sms/setup/academics/school-year','MainloaderController@schoolYear');
Route::get('/sms/setup/academics/sy-month-template','MainloaderController@symonthTemplate');
Route::get('/sms/setup/academics/grade-level','MainloaderController@gradeLevel');
Route::get('/sms/setup/academics/section','MainloaderController@section');
Route::get('/sms/setup/academics/subject','MainloaderController@subject');
Route::get('/sms/setup/academics/assign-subject','MainloaderController@assignSubject');
Route::get('/sms/setup/academics/schedule','MainloaderController@schedule');
Route::post('/sms/academics/assign-subjects/to-sections','AcademicsController@subjectAssigningSections');
Route::get('/sms/setup/academics/schedules','AcademicsController@getSchedules');






// S O F T D E L E T E 
Route::get('/softdelete/deleteSchoolYear','SoftdeleteController@deleteSchoolYear');
Route::get('/softdelete/deleteGradeLevel','SoftdeleteController@deleteGradeLevel');
Route::get('/softdelete/deleteSection','SoftdeleteController@deleteSection');
Route::get('/softdelete/deleteSubject','SoftdeleteController@deleteSubject');
Route::get('/softdelete/deleteAssignSubject','SoftdeleteController@deleteAssignSubject');











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

