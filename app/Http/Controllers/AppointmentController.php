<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Patient;
use App\User;
use App\Speciality;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    function list(Request $request) {
		$query = Appointment::query();

		if($request->searchDate != ''){
			$date = Carbon::createFromFormat('d-m-Y',$request->searchDate)->toDateString();
			$query->whereDate('appointmentDate', '=' ,$date)->get();
		}
		
		$allAppointments = $query->orderBy('appointmentDate','desc')->get();
		
        return view('admin.management.appointment.list', ['allAppointments' => $allAppointments, 'searchDate' => $request->searchDate]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Appointment::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Appointment::find($id)->delete();
		}
	}
}
