<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/menu', 'MenuController');
Route::get('/addMenu', 'MenuController@create');
Route::resource('/expense', 'ExpenseController');
Route::get('/assets', 'ExpenseController@assets');
Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');
Route::get('employeeDetails/{id}', 'EmployeeController@employeeDetails')->name('employeeDetails');
Route::get('deleteEmployee/{id}', 'EmployeeController@deleteEmployee')->name('deleteEmployee');
Route::get('/contacts', 'EmployeeController@contacts');
Route::resource('/revenue', 'RevenueController');
Route::resource('/balance', 'BalanceController');

// CRUD Users Routes
Route::get('/delete/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/edit-records','UserUpdateController@index');
Route::get('/edit/{id}','UserUpdateController@show');
Route::post('/edit/{id}','UserUpdateController@edit');

Route::get('profile', 'UserProfileController@profile')->name('profile');
Route::post('updateNameUser', 'UserProfileController@updateNameUser')->name('updateNameUser');
Route::post('updateUserImage', 'UserProfileController@updateUserImage')->name('updateUserImage');
Route::post('updateUserPass', 'UserProfileController@updateUserPass')->name('updateUserPass');

Route::get('revenues/{from?}/{to?}', 'RevenueController@revenues')->name('revenues');
Route::get('expenses/{from?}/{to?}', 'ExpenseController@expenses')->name('expenses');
Route::get('blancess/{from?}/{to?}', 'BalanceController@blancess')->name('blancess');


// fisal rahimi.
// teacher
Route::get('addTeacher', 'TeacherController@addTeacher')->name('addTeacher');
Route::post('saveTeacher', 'TeacherController@saveTeacher')->name('saveTeacher');
Route::get('teacherList', 'TeacherController@teacherList')->name('teacherList');
Route::get('editTeacher/{id}', 'TeacherController@editTeacher')->name('editTeacher');
Route::post('updateTeacher', 'TeacherController@updateTeacher')->name('updateTeacher');
Route::get('deleteTeacher/{id}', 'TeacherController@deleteTeacher')->name('deleteTeacher');
// studetn.
Route::get('addStudent', 'StudentController@addStudent')->name('addStudent');
Route::post('saveStudent', 'StudentController@saveStudent')->name('saveStudent');
Route::get('studentList', 'StudentController@studentList')->name('studentList');
Route::get('deleteStudent/{id}', 'StudentController@deleteStudent')->name('deleteStudent');
Route::get('studentDetails/{id}', 'StudentController@studentDetails')->name('studentDetails');
Route::get('editStudent/{id}', 'StudentController@editStudent')->name('editStudent');
Route::post('updateStudent', 'StudentController@updateStudent')->name('updateStudent');
// subject.
Route::get('addSubject', 'SubjectController@addSubject')->name('addSubject');
Route::post('saveSubject', 'SubjectController@saveSubject')->name('saveSubject');
Route::get('editSubjectCategory/{id}', 'SubjectCategoryController@editSubjectCategory')->name('editSubjectCategory');
Route::post('updateSubjectCat', 'SubjectCategoryController@updateSubjectCat')->name('updateSubjectCat');
Route::get('editSubject/{id}', 'SubjectController@editSubject')->name('editSubject');
Route::post('updateSubject', 'SubjectController@updateSubject')->name('updateSubject');
Route::get('subjectDetails/{id}', 'SubjectController@subjectDetails')->name('subjectDetails');
Route::get('addSubCat', 'SubjectCategoryController@addSubCat')->name('addSubCat');
Route::get('subjectList', 'SubjectController@subjectList')->name('subjectList');
Route::get('deleteSubject/{id}', 'SubjectController@deleteSubject')->name('deleteSubject');
Route::post('saveSubjectCat', 'SubjectCategoryController@saveSubjectCat')->name('saveSubjectCat');
Route::get('deleteSubCat/{id}', 'SubjectCategoryController@deleteSubCat')->name('deleteSubCat');
// class.
Route::get('addClas', 'ClasController@addClas')->name('addClas');
Route::post('saveClas', 'ClasController@saveClas')->name('saveClas');
Route::get('clases/{y?}/{m?}', 'ClasController@clases')->name('clases');
Route::get('deleteClas/{id}', 'ClasController@deleteClas')->name('deleteClas');
Route::get('editClass/{id}', 'ClasController@editClass')->name('editClass');
Route::post('updateClas', 'ClasController@updateClas')->name('updateClas');
Route::get('clasDetails/{id}', 'ClasController@clasDetails')->name('clasDetails');
Route::post('addStudentToClas', 'ClassInfoController@addStudentToClas')->name('addStudentToClas');
Route::post('updateStudentInfo', 'ClassInfoController@updateStudentInfo')->name('updateStudentInfo');
Route::get('deleteStudentFromClass/{id}', 'ClassInfoController@deleteStudentFromClass')->name('deleteStudentFromClass');

// course fee section routes
Route::get('/fee', 'FeeController@index')->name('fee');
Route::post('/addFee', 'FeeController@store')->name('addFee');
Route::get('/deleteFee/{id}','FeeController@destroy')->name('deleteFee/{id}');
Route::get('/editFee/{id}','FeeController@show')->name('editFee/{id}');
Route::post('/editFee/{id}','FeeController@edit')->name('editFee/{id}');
Route::get('/printFee/{id}','FeeController@printFee')->name('printFee/{id}');
Route::get('fees/{from?}/{to?}', 'FeeController@fees')->name('fees');
Route::get('/notPaid', 'FeeController@notPaid')->name('notPaid');
