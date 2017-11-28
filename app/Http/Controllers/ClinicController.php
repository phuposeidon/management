<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;

class ClinicController extends Controller
{
    function list() {
        $allClinics = Clinic::all();
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
		$clinic->website = $req->domain;
		$clinic->name = $req->name;
		$clinic->phone = $req->phonenumber;
		$clinic->taxcode = $req->taxcode;
		$clinic->address =$req->address;
		$clinic->email =$req->email;
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
		$clinic = Clinic::find($req->id);
		$clinic->website = $req->domain;
		$clinic->name = $req->name;
		$clinic->email = $req->email;
		$clinic->phone = $req->phonenumber;
		$clinic->taxcode = $req->taxcode;
		$clinic->address = $req->address;
		$clinic->save();
		$allClinics = Clinic::paginate(10);
		return view('admin.management.clinic.list', ['allClinics' => $allClinics]);

	}


}
