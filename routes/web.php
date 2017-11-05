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
Route::get('/add-clinic',function(){
    return view('admin.management.clinic.add');
});

Route::get('/user', function() {
    return view('admin.management.user.list');
});

Route::get('/add-appointment',function(){
    return view('admin.management.appointment.add');
});

Route::get('/add-user',function(){
    return view('admin.management.user.add');
});

Route::get('/appointment', function() {
    return view('admin.management.appointment.list');
});

Route::get('/clinic', function() {
    return view('admin.management.clinic.list');
});

Route::get('/district', function() {
    return view('admin.management.district.list');
});

Route::get('/insurrance', function() {
    return view('admin.management.insurrance.list');
});

Route::get('/medicalrecord', function() {
    return view('admin.management.medicalrecord.list');
});

Route::get('/medicine', function() {
    return view('admin.management.medicine.list');
});

Route::get('/add-medicine',function(){
    return view('admin.management.medicine.add');
});


Route::get('/order', function() {
    return view('admin.management.order.list');
});

Route::get('/orderitem', function() {
    return view('admin.management.orderitem.list');
});

Route::get('/ordermedicine', function() {
    return view('admin.management.ordermedicine.list');
});

// PATIENT
Route::get('/patient', function() { 
    return view('admin.management.patient.list');
});

Route::get('/add-patient','PatientController@show')->name('showPatient');
Route::post('/add-patient','PatientController@index')->name('addPatient');

Route::get('/province', function() {
    return view('admin.management.province.list');
});

Route::get('/service', function() {
    return view('admin.management.service.list');
});

Route::get('/speciality', function() {
    return view('admin.management.speciality.list');
});

Route::get('/test', function() {
    return view('admin.management.test.list');
});

Route::get('/testresult', function() {
    return view('admin.management.testresult.list');
});

Route::get('/transaction', function() {
    return view('admin.management.transaction.list');
});

Route::get('/index', function() {
    return view('client.layouts.index');
});