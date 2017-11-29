<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Patient;
use App\Insurance;

class PatientController extends Controller
{
	use AuthenticatesUsers;
	protected $guard = "patient" ;
	
	function show(){
		return view('admin.management.patient.add');
	}

    function index(Request $req){
		$insurrance = new Insurance;
		$patient = new Patient;
		if($req->active!=1)
		{
			$req->active=0;
		}
		$patient->fullname = $req->fullname;
		$patient->email = $req->email;
		$patient->gender = $req->gender;
		$patient->DOB = Carbon::createFromFormat('d-m-Y',$req->DOB)->format('Y-m-d 00:00:00');
		$patient->country = $req->country;
		$patient->religion = $req->religion;
		$patient->phone = $req->phone;
		$patient->username = $req->username;
		$patient->password = bcrypt($req->password);
		$patient->passport = $req->passport;
		$patient->allergic = $req->allergic;
		$patient->bloodgroup = $req->bloodgroup;
		$patient->active = $req->active;
		$patient->address = $req->address;
		
		$patient->save();
		$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
		$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
		$insurrance->cardCode = $req->cardCode;
		$insurrance->placeCheck = $req->placecheck;
		$insurrance->patientId = $patient->id;
		$insurrance->save();
		
		if( $insurrance->save())
		{
			
			\Session::flash('flash_message','Thêm bệnh nhân thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm bệnh nhân thất bai');
		}

		return view('admin.management.patient.add');
	}
	
	function list() {
		$allPatients = Patient::all();
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
			$thongbao = 'Chào mừng '.Auth::guard('patient')->user()->fullname.' đã đăng nhập thành công.';
			if($_SERVER['HTTP_REFERER'] == "http://localhost/management/public/appointment-login")
				return redirect()->back()->with('thongbao', $thongbao);
			else 
				return redirect('/index')->with('thongbao', $thongbao);
		}
		else {
			return redirect()->back()->with('thongbao', 'Tên tài khoản hoặc mật khẩu không chính xác.');
		}
	}
	public function getLogout(){
        Auth::guard('patient')->logout();
        return redirect()->back()->with('thongbao', 'Bạn đã đăng xuất thành công');
	}
	

	function getEdit($id){
		$patient = Patient::find($id);
		$insurance = Insurance::where('patientId',$id)->get();
		return view('admin.management.patient.edit',['patient'=>$patient,'insurance'=>$insurance]);
			
	}

	function postEdit(Request $req){
		$patient = Patient::find($req->id);
		$insurrance = Insurance::where('patientId', $req->id)->first();
		if($req->active!=1)
		{
			$req->active=0;
		}
		$patient->fullname = $req->fullname;
		$patient->email = $req->email;
		$patient->DOB =Carbon::createFromFormat('d-m-Y',$req->birthday)->format('Y-m-d 00:00:00');;
		$patient->gender = $req->gender;
		$patient->phone = $req->phone;
		$patient->username = $req->username;
		$patient->password = bcrypt($req->password);
		$patient->passport = $req->passport;
		$patient->allergic = $req->allergic;
		$patient->bloodgroup = $req->bloodgroup;
		$patient->active = $req->active;
		
		if($insurrance == '')
		{
			$insurrance = new Insurance;
			$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
			$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
			$insurrance->cardCode = $req->cardCode;
			$insurrance->placeCheck = $req->placeCheck;
			$insurrance->patientId = $req->id;
			$insurrance->save();
		}
		else {
			$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
			$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
			$insurrance->cardCode = $req->cardCode;
			$insurrance->placeCheck = $req->placeCheck;
			$insurrance->save();
		}
		$allPatients = Patient::paginate(10);
		
		if($insurrance->save())
		{
			$patient->save();
			\Session::flash('flash_message','Sửa thông tin bệnh nhân thành công');
			return redirect()->route('patient', ['allPatients' => $allPatients]);
		}else{
			\Session::flash('flash_fail','Sửa thông tin bệnh nhân thất bại');
		}
		
		
	}
}
