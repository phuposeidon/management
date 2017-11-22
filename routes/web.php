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

Route::get('/', function () {
    return view('admin.clinic');
});

Route::get('/user', 'UserController@list');
Route::get('/user/{id}','UserController@getEdit');
Route::post('/user/edit','UserController@postEdit')->name('postEdit');
Route::post('/user-delete','UserController@delete');
Route::post('/user-multidelete', 'UserController@deleteAll');
Route::get('/add-user','UserController@index');
Route::post('/add-user}','UserController@post')->name('postUser');


Route::get('/add-appointment',function(){
    return view('admin.management.appointment.add');
});

Route::get('/appointment', 'AppointmentController@list');
Route::post('/appointment-delete','AppointmentController@delete');
Route::post('/appointment-multidelete', 'AppointmentController@deleteAll');


Route::get('/clinic', 'ClinicController@list');
Route::get('/add-clinic',function(){
    return view('admin.management.clinic.add');
});
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

Route::get('/medicine', 'MedicineController@list');
Route::get('/add-medicine',function(){
    return view('admin.management.medicine.add');
});
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
Route::get('/patient/{id}','PatientController@getEdit');
Route::post('/patient/edit','PatientController@postEdit');
Route::get('/add-patient','PatientController@show')->name('showPatient');
Route::post('/add-patient','PatientController@index')->name('addPatient');
Route::post('/patient-delete', 'PatientController@delete');
Route::post('/patient-multidelete', 'PatientController@deleteAll');

Route::get('/province', function() {
    return view('admin.management.province.list');
});

Route::get('/service','ServiceController@list');
Route::post('/service-delete', 'ServiceController@delete');
Route::post('/service-multidelete', 'ServiceController@deleteAll');


Route::get('/specialization', 'SpecializationController@list');
Route::post('/specialization-delete', 'SpecializationController@delete');
Route::post('/specialization-multidelete', 'SpecializationController@deleteAll');

Route::get('/test', 'TestController@list');
Route::post('/test-delete', 'TestController@delete');
Route::post('/test-multidelete', 'TestController@deleteAll');


Route::get('/testresult', function() {
    return view('admin.management.testresult.list');
});

Route::get('/transaction','TransactionController@list');
Route::post('/transaction-delete', 'TransactionController@delete');
Route::post('/transaction-multidelete', 'TransactionController@deleteAll');

Route::get('/index', function() {
    return view('client.layouts.index');
});
Route::get('plogin', 'PatientController@getLogin');
Route::post('plogin', 'PatientController@postLogin');
Route::get('plogout', 'PatientController@getLogout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/appointment-login',['as' => 'appoint-login' ,function() {
    return view('client.page.appointment-login');
}]);
Route::get('/appointments', function() {
    return view('client.page.appointment');
});
Route::get('/hours', function() {
    return view('client.page.hours');
});
Route::get('/user-info', function() {
    return view('client.page.user-info');
});
Route::get('/signup', function() {
    return view('client.page.register');
});
Route::post('/signup', 'PatientController@signUp');