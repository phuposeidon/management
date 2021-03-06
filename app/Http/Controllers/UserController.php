<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use App\User;
use App\Specialization;
use App\Salary;
use App\MedicalRecord;
use App\Order;
use App\Transaction;

class UserController extends Controller
{
    function index(){
        $specialization = Specialization::all();
        return view('admin.management.user.add',['specialization'=>$specialization]);
    }

    function post(Request $req){
		
		$this->validate($req, [
            'username' => 'required|unique:user,username',
            'email' => 'required|unique:user,email',
            'fullname' => 'required',
            'password' => 'required',
            'DOB' => 'required',
        ], [
            'username.required' => 'Vui lòng nhập username',
            'username.unique' => 'Username đã tồn tại, vui lòng nhập username khác',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'fullname.required' => 'Vui lòng nhập tên nhân viên',
            'password.required' => 'Vui lòng nhập password',
            'DOB.required' => 'Vui lòng nhập ngày sinh',
		]);
		
		//dd($req->avatar);

        $specialization =  Specialization::all();
        $user = new User;
		if($req->active!=1)
		{
			$req->active=0;
		}
		$user->DOB= Carbon::createFromFormat('d-m-Y',$req->DOB)->format('Y-m-d 00:00:00');
		$user->fullname = $req->fullname;
		$user->usertype = $req->userType;
		$user->email = $req->email;
		$user->gender = $req->gender;
		$user->phone= $req->phone;
		$user->password = $req->password;
        $user->passport = $req->passport;
        $user->note = $req->note;
        $user->specializationId = $req->speciality;
		$user->active = $req->active;
		$user->password = bcrypt($req->password);
		$user->address = $req->address;
		$user->username = $req->username;
		if($req->avatar) {
			$destinationPath = 'img/user/';
			$file = $req->avatar;
			$file_extension = $file->getClientOriginalExtension(); //Get file original name
			$file_name =  "user_".str_random(4). "." . $file_extension;
			$file->move($destinationPath , $file_name); 
			$user->avatar = $file_name;
		}
		else {
			$user->avatar = 'user-default.png';
		}
		$user->save();

		$salary = new Salary;
		$salary->userId = $user->id;
		$salary->level = $req->level;
		$salary->coefficient = $req->coefficient;
		$salary->basicWage = str_replace(',','',$req->basicWage);
		$salary->save();
		
        if($user->save())
		{
			\Session::flash('flash_message','Thêm thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm thất bại');
        }
        
        return view('admin.management.user.add',['specialization'=>$specialization]);
    }

    function list() {
        $allUsers = User::all();
        return view('admin.management.user.list', ['allUsers' => $allUsers]);
    }

    function delete(Request $request) {
		$id = $request->id;
		User::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			User::find($id)->delete();
		}
	}

	function getEdit($id){
		$specialization =  Specialization::all();
		$user = User::find($id);
		$salary = Salary::where('userId', $id)->first();

		//Salary in month
		$today = Carbon::now();
		$getMonth = $today->month;
		$firstday = Carbon::today();
		$firstday->day = 1;

		$getMRs = MedicalRecord::select('id')->where('doctorId', $id)->whereBetween('createdAt', array($firstday,$today))->get();
		$getOrders = Order::select('id')->whereIn('medicalRecordId', $getMRs)->get();
		$getOrdersPaid = Transaction::select(DB::raw('SUM(totalAmount) as total'))->whereIn('orderId', $getOrders)->first()->toArray();
		$extraSalary = intval($getOrdersPaid['total']);

		return view('admin.management.user.edit',['user'=>$user,'specialization'=>$specialization , 'salary' => $salary, 'extraSalary' => $extraSalary]);
	}

	function postEdit(Request $req){

		$this->validate($req, [
			'email' => ['required',Rule::unique('user')->ignore($req->id, 'id')],
			'passport' => ['required',Rule::unique('user')->ignore($req->id, 'id')],
            'DOB' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email',
			'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
			'passport.required' => 'Vui lòng nhập CMND',
            'passport.unique' => 'CMND đã tồn tại, vui lòng nhập CMND khác',
            'DOB.required' => 'Vui lòng nhập ngày sinh',
		]);

		$specialization =  Specialization::all();
		$salary = Salary::where('userId', $req->id)->first();
		
        $user = User::find($req->id);
		if($req->active!=1)
		{
			$req->active=0;
		}
		//dd($req->avatar);
		//$user->DOB= Carbon::parse($req->DOB)->format('Y-m-d');
		$user->DOB= Carbon::createFromFormat('d-m-Y',$req->DOB)->format('Y-m-d 00:00:00');

		$user->usertype = $req->userType;
		$user->email = $req->email;
		$user->gender = $req->gender;
		$user->phone= $req->phone;
		if($req->password != '') {
			$user->password = bcrypt($req->password);
		}		
        $user->passport = $req->passport;
        $user->note = $req->note;
        $user->specializationId = $req->speciality;
		$user->active = $req->active;
		$user->address = $req->address;
		if($req->avatar) {
			$destinationPath = 'img/user/';
			$file = $req->avatar;
			$file_extension = $file->getClientOriginalExtension(); //Get file original name
			$file_name =  "user_".str_random(4). "." . $file_extension;
			$file->move($destinationPath , $file_name); 
			$user->avatar = $file_name;
		}
		$user->save();
		if(count($salary) > 0) 
		{
			$salary->level = $req->level;
			$salary->coefficient = $req->coefficient;
			$salary->basicWage = str_replace(',','',$req->basicWage);
			$salary->save();
		}
		else 
		{
			$salary = new Salary;
			$salary->userId = $req->id;
			$salary->level = $req->level;
			$salary->coefficient = $req->coefficient;
			$salary->basicWage = str_replace(',','',$req->basicWage);
			$salary->save();
		}
		
		\Session::flash('flash_message','Sửa thành công');
		return redirect('user');
	}

	public function getLogin() {
		return view('admin.layouts.login-page');
	}

	public function postLogin(Request $request) {
		$this->validate($request,[
			'username' => 'required',
			'password' => 'required'
		],[
			'username.required' => 'Bạn chưa nhập username',
			'password.required' => 'Bạn chưa nhập password'
		]);
			
		if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) //Ktra đăng nhập
		{	
			$thongbao = 'Chào mừng '.Auth::user()->fullname.' đã đăng nhập thành công.';
			return redirect('dashboard')->with('thongbao', $thongbao);
		}
		else {
			return redirect()->back()->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác.');
		}
	}
	public function getLogout(){
        Auth::logout();
        return redirect('user-login')->with('thongbao1', 'Bạn đã đăng xuất thành công');
	}

}
