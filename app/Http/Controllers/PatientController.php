<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Province;
use App\District;
use App\Patient;
use App\Insurrance;

class PatientController extends Controller
{
	use AuthenticatesUsers;
	protected $guard = "patient" ;
	
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
		$patient->username = $req->username;
		$patient->password = bcrypt($req->password);
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

	function delete(Request $request) {
		$id = $request->id;
		Patient::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Patient::find($id)->delete();
		}
	}

	public function getLogin() {
		return view('client.page.loginpage');
	}
	public function postLogin(Request $request) {
		$this->validate($request,[
			'username' => 'required',
			'password' => 'required'
		],[
			'username.required' => 'Bạn chưa nhập username',
			'password.required' => 'Bạn chưa nhập password'
		]);
			
		if(Auth::guard('patient')->attempt(['username' => $request->username, 'password' => $request->password])) //Ktra đăng nhập
		{	
			$thongbao = 'Chào mừng '.Auth::guard('patient')->user()->name.' đã đăng nhập thành công.';
			return redirect()->back()->with('thongbao', $thongbao);
		}
		else {
			return redirect()->back()->with('thongbao', 'Tên tài khoản hoặc mật khẩu không chính xác.');
		}
	}
	public function getLogout(){
        Auth::guard('patient')->logout();
        return redirect()->back()->with('thongbao', 'Bạn đã đăng xuất thành công');
	}
	public function signUp(Request $request) {
		$patient = new Patient;
		$patient->fullname = $request->fullname;
		$patient->email = $request->email;
		$patient->gender = $request->gender;
		$patient->phonenumber = $request->phonenumber;
		$patient->username = $request->username;
		$patient->password = bcrypt($request->password);
		// $patient->passport = $request->passport;
		// $patient->allergic = $request->allergic;
		$patient->bloodgroup = $request->bloodgroup;
		// $patient->pet = $request->pet;
		// $patient->phonepet = $request->petphonenumber;
		// $patient->provinceId = $request->province;
		// $patient->active = $request->active;
		$patient->save();

		return view('client.layouts.index');
	}

	function getEdit($id){
		$patient = Patient::find($id);
		$insurrance = $patient->Insurrance()->get();
		foreach($insurrance as $a)
		{
			return view('admin.management.patient.edit',['patient'=>$patient,'insurrance'=>$a]);
			dd($a['cardId']);
		}
		
		
	}
}
