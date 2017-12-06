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
		$this->validate($req, [
            'username' => 'required|unique:patient,username',
            'email' => 'required|unique:patient,email',
            'fullname' => 'required',
            'password' => 'required',
			'DOB' => 'required',
			'phone' => 'required',
        ], [
            'username.required' => 'Vui lòng nhập username',
            'username.unique' => 'Username đã tồn tại, vui lòng nhập username khác',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'fullname.required' => 'Vui lòng nhập tên nhân viên',
            'password.required' => 'Vui lòng nhập password',
			'DOB.required' => 'Vui lòng nhập ngày sinh',
			'phone.required' => 'Vui lòng nhập số điện thoại',
		]);

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
		if($req->avatar) {
			$destinationPath = 'img/patient/';
			$file = $req->avatar;
			$file_extension = $file->getClientOriginalExtension(); //Get file original name
			$file_name =  "pt_".str_random(4). "." . $file_extension;
			$file->move($destinationPath , $file_name); 
			$patient->avatar = $file_name;
		}
		else {
			$patient->avatar = 'img/patient/user-default.png';
		}
		
		$patient->save();
		if($req->todate && $req->fromdate && $req->cardCode && $req->placeCheck)
		{
			$insurrance = new Insurance;
			$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
			$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
			$insurrance->cardCode = $req->cardCode;
			$insurrance->placeCheck = $req->placeCheck;
			$insurrance->patientId = $req->id;
			$insurrance->save();
		}

		\Session::flash('flash_message','Thêm bệnh nhân thành công');
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
        return redirect('/index')->with('thongbao', 'Bạn đã đăng xuất thành công');
	}
	

	function getEdit($id){
		$patient = Patient::find($id);
		$insurance = Insurance::where('patientId',$id)->get();
		return view('admin.management.patient.edit',['patient'=>$patient,'insurance'=>$insurance]);
			
	}

	function postEdit(Request $req){

		$this->validate($req, [
			'email' => ['required',Rule::unique('patient')->ignore($req->id, 'id')],
			'passport' => ['required',Rule::unique('patient')->ignore($req->id, 'id')],
        ], [
            'email.required' => 'Vui lòng nhập email',
			'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
			'passport.required' => 'Vui lòng nhập CMND',
            'passport.unique' => 'CMND đã tồn tại, vui lòng nhập CMND khác',
		]);

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
		if($req->password){
			$patient->password = bcrypt($req->password);
		}
		$patient->passport = $req->passport;
		$patient->allergic = $req->allergic;
		$patient->bloodgroup = $req->bloodgroup;
		$patient->active = $req->active;
		if($req->avatar) {
			$destinationPath = 'img/patient/';
			$file = $req->avatar;
			$file_extension = $file->getClientOriginalExtension(); //Get file original name
			$file_name =  "pt_".str_random(4). "." . $file_extension;
			$file->move($destinationPath , $file_name); 
			$patient->avatar = $file_name;
		}
		$patient->save();
		
		if($insurrance == '' && $req->todate && $req->fromdate && $req->cardCode && $req->placeCheck)
		{
			$insurrance = new Insurance;
			$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
			$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
			$insurrance->cardCode = $req->cardCode;
			$insurrance->placeCheck = $req->placeCheck;
			$insurrance->patientId = $req->id;
			$insurrance->save();
		}
		elseif($req->todate && $req->fromdate && $req->cardCode && $req->placeCheck) {
			$insurrance->toDate = Carbon::createFromFormat('d-m-Y',$req->todate)->format('Y-m-d 00:00:00');
			$insurrance->fromDate = Carbon::createFromFormat('d-m-Y',$req->fromdate)->format('Y-m-d 00:00:00');
			$insurrance->cardCode = $req->cardCode;
			$insurrance->placeCheck = $req->placeCheck;
			$insurrance->save();
		}
		$allPatients = Patient::paginate(10);
		
		\Session::flash('flash_message','Sửa thông tin bệnh nhân thành công');
		return redirect()->route('patient', ['allPatients' => $allPatients]);
		
		
	}

	//postAllergic
	function postAllergic(Request $req){
		$patient = Patient::find($req->id);
		var_dump($req->allergic);
		if (isset($req->allergic)) {
			$patient->allergic = $req->allergic;
		}

		if (isset($req->diff_allergic)) {
			$patient->diff_allergic = $req->diff_allergic;
		}
		$patient->save();
		if ($patient->save()) {
			return redirect()->route('diagnosis',['id'=>$req->id]);
		}
	}
}
