<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Clinic;
use App\Medicine;

class MedicineController extends Controller
{
    function list() {
        $allMedicines = Medicine::paginate(10);
        $allUnits = Unit::all();
        return view('admin.management.medicine.list', ['allMedicines' => $allMedicines, 'allUnits' => $allUnits]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Medicine::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Medicine::find($id)->delete();
		}
	}
}
