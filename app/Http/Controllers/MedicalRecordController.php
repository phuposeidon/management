<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalRecord;
use App\Appointment;
use Carbon\Carbon;
use App\Patient;
class MedicalRecordController extends Controller
{
    function list(){
    	$currentDate = Carbon::now()->toDateTimeString();
    	$waiters = Appointment::whereDate('appointmentDate', '=', Carbon::today()->toDateString())->orderBy('appointmentDate','desc')->paginate(10);
    	$i=1;
    	return view('admin.management.waitlist.list',['waiters'=>$waiters,'i'=>$waiters->count()]);
    }

    function waitList(){
    	return view('admin.management.medicalrecord.wait-list');
    }
    
}
