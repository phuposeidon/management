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

	function index(){
		$allUnits = Unit::all();
		return view('admin.management.medicine.add',['allUnits' => $allUnits]);
	}

	function add(Request $req){
		$medicine = new Medicine;
		$allUnits = Unit::all();
		$medicine->name = $req->name;
		$medicine->unitId = $req->unit;
		$medicine->clinicId = 1;
		$medicine->madeIn = $req->madeIn;
		$medicine->price = $req->price;
		$medicine->expectancy = $req->expectancy;
		$medicine->concentration = $req->concentration;
		$medicine->note = $req->note;
		$medicine->standard = $req->standard;
		$medicine->save();
		if($medicine->save())
		{
			\Session::flash('flash_message','Thêm bệnh nhân thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm bệnh nhân thất bai');
		}

		return view('admin.management.medicine.add',['allUnits' => $allUnits]);
	}
}
