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

    Route::get('dashboard', function () {
        return view('admin.layouts.master');
    });

Route::get('/user', 'UserController@list')->name('listUser');
Route::get('/user/add','UserController@index')->name('addUser');
Route::post('/user/add','UserController@post')->name('createUser');
Route::get('/user/{id}','UserController@getEdit')->name('getUser');
Route::post('/user/{id}','UserController@postEdit')->name('postUser');
Route::post('/user-delete','UserController@delete');
Route::post('/user-multidelete', 'UserController@deleteAll');

Route::get('user-login','UserController@getLogin');
    Route::get('/user', 'UserController@list')->name('listUser');
    Route::get('/user/{id}','UserController@getEdit');
    Route::post('/user/edit','UserController@postEdit')->name('postEdit');
    Route::post('/user-delete','UserController@delete');
    Route::post('/user-multidelete', 'UserController@deleteAll');
    Route::get('/add-user','UserController@index')->name('addUser');
    Route::post('/add-user}','UserController@post')->name('postUser');
    
    
    Route::get('/add-appointment',function(){
        return view('admin.management.appointment.add');
    });

    Route::get('/appointment', 'AppointmentController@list');
    Route::post('/appointment-delete','AppointmentController@delete');
    Route::post('/appointment-multidelete', 'AppointmentController@deleteAll');


    Route::get('/clinic', 'ClinicController@list')->name('list');
    Route::get('/add-clinic','ClinicController@index')->name('add');
    Route::post('/clinic','ClinicController@add')->name('addClinic');
    Route::get('/clinic/edit/{id}','ClinicController@getEdit');
    Route::post('/clinic/edit/{id}','ClinicController@edit')->name('editClinic');

    Route::post('/clinic-delete','ClinicController@delete');
    Route::post('/clinic-multidelete', 'ClinicController@deleteAll');

    Route::get('/district', function() {
        return view('admin.management.district.list');
    });

    Route::get('/insurrance', function() {
        return view('admin.management.insurrance.list');
    });

    Route::get('/medicalrecord', function() {
        return view('admin.management.medicalrecord.list');
    });

    Route::get('/medicine', 'MedicineController@list')->name('getlist');
    Route::get('/medicine/add','MedicineController@index');
    Route::post('/medicine/add','MedicineController@add')->name('addMedicine');
    Route::post('/medicine-delete', 'MedicineController@delete');
    Route::post('/medicine-multidelete', 'MedicineController@deleteAll');



Route::get('/medicine', 'MedicineController@list')->name('getlist');
Route::get('/medicine/add','MedicineController@index');
Route::post('/medicine/add','MedicineController@add')->name('addMedicine');
Route::get('/medicine/{id}','MedicineController@getEdit')->name('editMedicine');
Route::post('/medicine/{id}','MedicineController@postMedicine')->name('postMedicine');
Route::post('/medicine-delete', 'MedicineController@delete');
Route::post('/medicine-multidelete', 'MedicineController@deleteAll');
    Route::get('/order', 'OrderController@list');
    Route::post('/order-delete', 'OrderController@delete');
    Route::post('/order-multidelete', 'OrderController@deleteAll');



    Route::get('/orderitem', function() {
        return view('admin.management.orderitem.list');
    });

    Route::get('/ordermedicine', function() {
        return view('admin.management.ordermedicine.list');
    });

    // PATIENT
    Route::get('/patient', 'PatientController@list')->name('patient');
    Route::get('/patient/{id}','PatientController@getEdit')->name('edit');
    Route::post('/patient/{id}','PatientController@postEdit')->name('editPatient');
    Route::get('/add-patient','PatientController@show')->name('showPatient');
    Route::post('/add-patient','PatientController@index')->name('addPatient');
    Route::post('/patient-delete', 'PatientController@delete');
    Route::post('/patient-multidelete', 'PatientController@deleteAll');

    Route::get('/province', function() {
        return view('admin.management.province.list');
    });


// PATIENT
Route::get('/patient', 'PatientController@list')->name('patient');
Route::get('/patient/{id}','PatientController@getEdit')->name('edit');
Route::post('/patient/{id}','PatientController@postEdit')->name('editPatient');
Route::get('/patient/add','PatientController@show')->name('showPatient');
Route::post('/patient/add','PatientController@index')->name('addPatient');
Route::post('/patient-delete', 'PatientController@delete');
Route::post('/patient-multidelete', 'PatientController@deleteAll');

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

    Route::get('/transaction','TransactionController@list');
    Route::post('/transaction-delete', 'TransactionController@delete');
    Route::post('/transaction-multidelete', 'TransactionController@deleteAll');
});

Route::get('/index', function() {
    return view('client.layouts.index');
});
Route::get('plogin', 'PatientController@getLogin');
Route::post('plogin', 'PatientController@postLogin');
Route::get('plogout', 'PatientController@getLogout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/appointment-login', 'PageController@showAppointmentLogin');
Route::post('/appointments', 'PageController@showAppointment');
Route::post('/hours', 'PageController@showHour');
Route::post('/post-appointment', 'PageController@postAppointment');
Route::get('/user-info','PageController@showUserInfo');
Route::get('/signup', 'PageController@getSignUp');
Route::post('/signup', 'PageController@postSignUp');

Route::get('/wait-list','MedicalRecordController@list');
Route::get('/diagnosis','MedicalRecordController@waitList');