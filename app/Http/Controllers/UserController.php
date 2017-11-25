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

class UserController extends Controller
{
    function index(){
        $specialization = Specialization::all();
        return view('admin.management.user.add',['specialization'=>$specialization]);
    }

    function post(Request $req){
        $specialization =  Specialization::all();
        $user = new User;
		if($req->active!=1)
		{
			$req->active=0;
		}
		$user->DOB= $req->DOB;
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
        $user->save();
        if($user->save())
		{
			\Session::flash('flash_message','Thêm thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm thất bại');
        }
        
        return view('admin.management.user.add',['specialization'=>$specialization]);
    }

    function list() {
        $allUsers = User::paginate(10);
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
		return view('admin.management.user.edit',['user'=>$user,'specialization'=>$specialization]);
	}

	function postEdit(Request $req){
		$specialization =  Specialization::all();
        $user = User::find($req->id);
		if($req->active!=1)
		{
			$req->active=0;
		}
		$user->DOB= Carbon::createFromFormat('d-m-Y',$req->DOB)->toDateTimeString();
		$user->fullname = $req->fullname;
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
		$user->password = $req->password;
		$user->address = $req->address;
		$user->username = $req->username;
        $user->save();
		$allUsers = User::paginate(10);
		// if($user->save())
		// {
		// 	\Session::flash('flash_message','Sửa thành công');
			

		// }else{
		// 	\Session::flash('flash_fail','Sửa thất bại');
        // }
        
        // return view('admin.management.user.edit',['speciality'=>$speciality]);

		// }else{
		// 	\Session::flash('flash_fail','Sửa thất bai');
        // }
        
        return view('admin.management.user.list',['allUsers'=>$allUsers]);
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
