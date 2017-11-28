<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Patient;
use App\User;
use App\Speciality;
use App\Appointment;

class AppointmentController extends Controller
{
    function list() {
        $allAppointments = Appointment::all();
        return view('admin.management.appointment.list', ['allAppointments' => $allAppointments]);
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
