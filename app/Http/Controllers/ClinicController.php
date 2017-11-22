<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;

class ClinicController extends Controller
{
    function list() {
        $allClinics = Clinic::paginate(10);
        return view('admin.management.clinic.list', ['allClinics' => $allClinics]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Clinic::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Clinic::find($id)->delete();
		}
	}
}
