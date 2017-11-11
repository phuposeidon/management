<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Speciality;

class SpecialityController extends Controller
{
    function list() {
        $allSpecialitys = Speciality::paginate(10);
        $allClinics = Clinic::all();
        return view('admin.management.speciality.list', ['allClinics' => $allClinics, 'allSpecialitys' => $allSpecialitys]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Speciality::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Speciality::find($id)->delete();
		}
	}
}
