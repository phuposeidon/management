<?php
Route::get('/index', function () {
    return view('client.layouts.index');
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/user-login','UserController@getLogin');
Route::post('/user-login', 'UserController@postLogin');
Route::get('user-logout', 'UserController@getLogout');

Route::group(['prefix' => '/', 'middleware' => 'loginAdmin'], function() {
    // Route::get('/', function () {
    //     return view('admin.clinic');
    // });

    Route::get('dashboard', 'HomeController@dashboard');

Route::get('/user', 'UserController@list')->name('listUser');
Route::get('/user/add','UserController@index')->name('addUser')->middleware(['can:admin']);
Route::post('/user/add','UserController@post')->name('createUser');
Route::get('/user/{id}','UserController@getEdit')->name('getUser');
Route::post('/user/{id}','UserController@postEdit')->name('postUser');
Route::post('/user-delete','UserController@delete')->middleware(['can:admin']);
Route::post('/user-multidelete', 'UserController@deleteAll')->middleware(['can:admin']);

    
    
    Route::get('/add-appointment',function(){
        return view('admin.management.appointment.add');
    });

    Route::get('/appointment', 'AppointmentController@list')->middleware(['can:receptionist']);
    Route::get('/appointment/search', 'AppointmentController@search')->middleware(['can:receptionist']);
    Route::post('/appointment-delete','AppointmentController@delete')->middleware(['can:receptionist']);
    Route::post('/appointment-multidelete', 'AppointmentController@deleteAll');
    Route::post('/appointment/change-status','AppointmentController@changeStatus')->name('changeStatus')->middleware(['can:receptionist']);
    Route::post('/appointment/cancel','AppointmentController@cancel')->middleware(['can:receptionist']);



    Route::get('/clinic', 'ClinicController@list')->name('list');
    Route::get('/add-clinic','ClinicController@index')->name('add')->middleware(['can:admin']);
    Route::post('/clinic','ClinicController@add')->name('addClinic');
    Route::get('/clinic/edit/{id}','ClinicController@getEdit')->middleware(['can:admin']);
    Route::post('/clinic/edit/{id}','ClinicController@edit')->name('editClinic');

    Route::post('/clinic-delete','ClinicController@delete')->middleware(['can:admin']);
    Route::post('/clinic-multidelete', 'ClinicController@deleteAll')->middleware(['can:admin']);

    Route::get('/medicalrecord', function() {
        return view('admin.management.medicalrecord.list');
    });


Route::get('/medicine', 'MedicineController@list')->name('getlist');
Route::get('/medicine/add','MedicineController@index')->middleware(['can:admin']);
Route::post('/medicine/add','MedicineController@add')->name('addMedicine');
Route::get('/medicine/{id}','MedicineController@getEdit')->name('editMedicine')->middleware(['can:admin']);;
Route::post('/medicine/{id}','MedicineController@postMedicine')->name('postMedicine');
Route::post('/medicine-delete', 'MedicineController@delete');
Route::post('/medicine-multidelete', 'MedicineController@deleteAll');
    Route::get('/order', 'OrderController@list');
    Route::get('/order/{id}', 'OrderController@getEdit');
    Route::post('/order-delete', 'OrderController@delete');
    Route::post('/order-multidelete', 'OrderController@deleteAll');

//Ordermedicine
    Route::post('/order-medicine','OrderMedicineController@add');

    Route::get('/orderitem', function() {
        return view('admin.management.orderitem.list');
    });

    Route::get('/ordermedicine', function() {
        return view('admin.management.ordermedicine.list');
    });

    // PATIENT
    Route::get('/patient', 'PatientController@list')->name('patient');
    Route::get('/patient/{id}','PatientController@getEdit')->name('edit')->middleware(['can:admin']);
    Route::post('/patient/{id}','PatientController@postEdit')->name('editPatient');
    Route::get('/add-patient','PatientController@show')->name('showPatient')->middleware(['can:admin']);
    Route::post('/add-patient','PatientController@index')->name('addPatient');
    Route::post('/patient-delete', 'PatientController@delete');
    Route::post('/patient-multidelete', 'PatientController@deleteAll');
    Route::post('/patient/{id}/allergic','PatientController@postAllergic')->name('postAllergic');

    // PatientMedical
    Route::get('/patient-medical','PatientMedicalController@index');
    Route::post('/patient-medical','PatientMedicalController@add');
    Route::post('/patient-medical/{id}','PatientMedicalController@delete')->name("deletePatientMedical");

    Route::get('/province', function() {
        return view('admin.management.province.list');
    });


    //FamiMedical
    Route::get('/fami-medical','FamimedicalController@index');
    Route::post('/fami-medical','FamimedicalController@add');
    Route::post('/fami-medical/{id}','FamimedicalController@delete')->name("deleteFami");

    //General Index
    Route::get('general-index','GeneralIndexController@index');
    Route::post('general-index','GeneralIndexController@add')->name('general');

// PATIENT
// Route::get('/patient', 'PatientController@list')->name('patient');
// Route::get('/patient/{id}','PatientController@getEdit')->name('edit');
// Route::post('/patient/{id}','PatientController@postEdit')->name('editPatient');
// Route::get('/patient/add','PatientController@show')->name('showPatient');
// Route::post('/patient/add','PatientController@index')->name('addPatient');
// Route::post('/patient-delete', 'PatientController@delete');
// Route::post('/patient-multidelete', 'PatientController@deleteAll');

Route::get('/province', function() {
    return view('admin.management.province.list');
});

    Route::get('/service','ServiceController@list')->name('getService');
    Route::post('/service-delete', 'ServiceController@delete');
    Route::post('/service-multidelete', 'ServiceController@deleteAll');

    Route::get('/service/add','ServiceController@index');
    Route::post('/service/add','ServiceController@add')->name('addService');



Route::get('/service/{id}','ServiceController@getService')->name('getEdit');
Route::post('/service/{id}','ServiceController@postService')->name('postService');

    Route::get('/specialization', 'SpecializationController@list');
    Route::post('/specialization/{id}', 'SpecializationController@post');
    Route::get('/specialization/{id}', 'SpecializationController@ajax');
    Route::post('/specialization-delete', 'SpecializationController@delete');
    Route::post('/specialization-multidelete', 'SpecializationController@deleteAll');


    Route::post('/specialization','SpecializationController@add' );


    Route::get('/test', 'TestController@list');
    Route::post('/test-delete', 'TestController@delete');
    Route::post('/test-multidelete', 'TestController@deleteAll');


    Route::get('/testresult', function() {
        return view('admin.management.testresult.list');
    });

    //Transaction
    Route::get('/transaction','TransactionController@list')->name('listTransaction');

    Route::post('/transaction/payment','TransactionController@payment')->name('transactionPayment');//->middleware(['can:cashier']);
    Route::post('/transaction/cancel','TransactionController@cancel')->name('transactionCancel');//->middleware(['can:cashier']);
    Route::post('/transaction/search','TransactionController@search')->name('transactionSearch');//->middleware(['can:cashier']);


    //Medical record
    Route::get('/wait-list','MedicalRecordController@list')->name('backWaitlist');

    Route::get('/diagnosis','MedicalRecordController@waitList');

    Route::get('/question','QuestionController@showList');
    Route::get('/question/{id}','QuestionController@getAnswer')->name('questionId');
    Route::post('ajax/question/post','QuestionController@postAnswer');
    Route::post('ajax/question/searchUrl','QuestionController@searchUrl');
    Route::post('ajax/question/addUrl','QuestionController@addUrl');
    Route::post('/question-delete', 'QuestionController@delete');

    Route::get('/diagnosis/{id}','MedicalRecordController@waitList')->name('diagnosis');
    Route::post('/medicalrecord','MedicalRecordController@addRecord');

    Route::get('/history/{id}','MedicalRecordController@history')->name('history');
    Route::get('/order-medicine/{id}','MedicalRecordController@chosen')->name('chosen');//toa thuốc cũ

    //Chọn thuốc
    Route::get('/search/autocomplete','MedicalRecordController@search')->name('autocomplete');

    //Chẩn đoán hình ảnh
     Route::get('/cdha/{id}','MedicalRecordController@getCDHA')->name('getCDHA');
    //record
    Route::get('/record',"RecordController@list")->name('viewrecord');
    Route::post('/record',"RecordController@add");
    Route::get('/medical-record/{id}',"RecordController@getRecord")->name('getRecord');
    //Upload CDHA
    Route::post('/cdha',"MedicalRecordController@upload")->name("upload_image");

    //Posts
    Route::get('/category', 'PostController@listCategory');
    Route::get('/category/{id}', 'PostController@listPost');
    Route::post('/category/add', 'PostController@addCategory');
    Route::get('/adminpost/add', 'PostController@getAdd');
    Route::post('/adminpost/add', 'PostController@postAdd');
    Route::get('/adminpost/{id}', 'PostController@getEdit');
    Route::post('/adminpost/edit', 'PostController@postEdit');
    Route::post('/post-delete', 'PostController@delete');

    //Export order
    Route::get('export-order/{id}','OrderController@exportOrder')->name('exportOrder');

    //403 error
    Route::get('403', function() {
        return view('errors.403');
    });

});
//CLOSE ADMIN PAGE

Route::get('/index', 'PageController@index');
Route::get('plogin', 'PatientController@getLogin');
Route::post('plogin', 'PatientController@postLogin');
Route::get('plogout', 'PatientController@getLogout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/signup', 'PageController@getSignUp');
Route::post('/signup', 'PageController@postSignUp');
Route::get('/appointment-login', 'PageController@showAppointmentLogin');
Route::post('/appointments', 'PageController@showAppointment');
Route::get('ajax/specialization/{idSpecialization}', 'PageController@getDoctor');
Route::post('/hours', 'PageController@showHour');
Route::post('ajax/get-hours', 'PageController@getHours');
Route::post('/post-appointment', 'PageController@postAppointment');

Route::get('/posts', 'PageController@getListPost');
Route::get('/post/{id}', 'PageController@getPost');
Route::get('/cate/{id}', 'PageController@getCate');

Route::post('/patient-feedback','PageController@postPatientFeedback');
Route::get('404', function() {
    return view('errors.404');
});

Route::group(['prefix' => '', 'middleware' => 'loginClient'], function() {
    
    Route::get('/user-info','PageController@showUserInfo');
    Route::post('/user-info','PageController@postEditInfo');
    Route::get('/feedback/{id}', 'PageController@doctorFeedback');
    Route::post('/ajax/feedback/patient-post', 'PageController@postFeedback');
    Route::get('/blog', 'PageController@getBlog');
    Route::post('/blog', 'PageController@postBlog');
    Route::get('/question2', 'PageController@getTest');
    Route::post('/like', 'PageController@postLike');
    Route::post('ajax/question/patient-post','PageController@postAnswer');
    Route::get('/doctors/{id}', 'PageController@getDoctors');
    Route::get('/qt/{id}', 'PageController@getQuestion');

});


