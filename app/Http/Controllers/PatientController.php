<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\District;
use App\Patient;
use App\Insurrance;

class PatientController extends Controller
{
	function show(){
		$provinces = Province::all();
		$districts = District::all();
		return view('admin.management.patient.add',['provinces'=>$provinces,'districts'=>$districts]);
	}

    function index(Request $req){
		$provinces = Province::all();
		$districts = District::all();
		$insurrance = new Insurrance;
		$patient = new Patient;
		if($req->active!=1)
		{
			$req->active=0;
		}
		$patient->fullname = $req->fullname;
		$patient->districtId = $req->district;
		$patient->email = $req->email;
		$patient->gender = $req->gender;
		$patient->phonenumber = $req->phonenumber;
		$patient->password = $req->password;
		$patient->passport = $req->passport;
		$patient->allergic = $req->allergic;
		$patient->bloodgroup = $req->bloodgroup;
		$patient->pet = $req->pet;
		$patient->phonepet = $req->petphonenumber;
		$patient->provinceId = $req->province;
		$patient->active = $req->active;
		$patient->save();
		$insurrance->todate = $req->todate;
		$insurrance->fromdate = $req->fromdate;
		$insurrance->cardId = $req->cardId;
		$insurrance->placeCheck = $req->placecheck;
		$insurrance->patientId = $patient->id;
		$insurrance->save();
		if($patient->save() && $insurrance->save())
		{
			\Session::flash('flash_message','Thêm bệnh nhân thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm bệnh nhân thất bai');
		}

		return view('admin.management.patient.add',['provinces'=>$provinces,'districts'=>$districts]);
	}
	
	function list() {
		$allPatients = Patient::paginate(10);
		return view('admin.management.patient.list', ['allPatients' => $allPatients]); 
	}
}
