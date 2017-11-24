<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Specialization;

class SpecializationController extends Controller
{
    function list() {
        $allSpecialitys = Specialization::paginate(10);
        $allClinics = Clinic::all();
        return view('admin.management.specialization.list', ['allClinics' => $allClinics, 'allSpecialitys' => $allSpecialitys]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Specialization::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Specialization::find($id)->delete();
		}
	}

	function add(Request $req){
		$specialization = new Specialization;
		$specialization->clinicId=1;
		$specialization->name = $req->specialization;
		$specialization->active=$req->active;
		$specialization->save();
		if($specialization->save()){
			echo true;
		}else{
			echo false;
		}
	}

	function ajax($id){
		$specialization = Specialization::find($id);
		return $specialization->toJson();

	}

	function post(Request $req){
		$specialization = Specialization::find($req->id);
		$specialization->name = $req->specialization;
		$specialization->save();
		if($specialization->save()){
			echo true;
		}else{
			echo false;
		}
	}
}
