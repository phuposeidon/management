<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Province;
use App\District;

class ClinicController extends Controller
{
    function list() {
        $allClinics = Clinic::paginate(10);
        $allProvinces = Province::all();
        $allDistricts = District::all();
        return view('admin.management.clinic.list', ['allClinics' => $allClinics, 'allProvinces' => $allProvinces, 'allDistricts' => $allDistricts]);
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
