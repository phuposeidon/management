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

	function index(){
		$clinic = Clinic::all();
		return view('admin.management.clinic.add');
	}

	function add(Request $req){
		$clinic = new Clinic;
		$clinic->domain = $req->domain;
		$clinic->name = $req->name;
		$clinic->shortName = $req->shortName;
		$clinic->phonenumber = $req->phonenumber;
		$clinic->license = $req->liencse;
		$clinic->tuyenCs = $req->tuyenCS;
		$clinic->fax = $req->fax;
		$clinic->taxcode = $req->taxcode;
		$clinic->country = $req->country;
		$clinic->note = $req->note;
		$clinic->districtId = 1;
		$clinic->provinceId = 1;
		$clinic->address = "TPHCM";
		if($clinic->save())
		{
			\Session::flash('flash_message','Thêm bệnh nhân thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm bệnh nhân thất bai');
		}

		return view('admin.management.clinic.add');
	}

	function getEdit(Request $req){
		$clinic = Clinic::find($req->id);
		return view('admin.management.clinic.edit',['clinic'=>$clinic]);
	}

	function edit(Request $req){
		$allProvinces = Province::all();
        $allDistricts = District::all();
		$clinic = Clinic::find($req->id);
		$clinic->domain = $req->domain;
		$clinic->name = $req->name;
		$clinic->shortName = $req->shortName;
		$clinic->phonenumber = $req->phonenumber;
		$clinic->license = $req->liencse;
		$clinic->tuyenCs = $req->tuyenCS;
		$clinic->fax = $req->fax;
		$clinic->taxcode = $req->taxcode;
		$clinic->country = $req->country;
		$clinic->note = $req->note;
		$clinic->districtId = 1;
		$clinic->provinceId = 1;
		$clinic->address = "TPHCM";
		$clinic->save();
		$allClinics = Clinic::paginate(10);
		return view('admin.management.clinic.list', ['allClinics' => $allClinics, 'allProvinces' => $allProvinces, 'allDistricts' => $allDistricts]);

	}


}
