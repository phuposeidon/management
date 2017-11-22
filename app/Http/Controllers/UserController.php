<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;
use App\District;
use App\User;
use App\Speciality;

class UserController extends Controller
{
    function index(){
        $speciality = Speciality::all();
        return view('admin.management.user.add',['speciality'=>$speciality]);
    }

    function post(Request $req){
        $speciality = Speciality::all();
        $provinces = Province::all();
        $districts = District::all();
        $user = new User;
		if($req->active!=1)
		{
			$req->active=0;
		}
		$user->birthday = $req->birthday;
		$user->fullname = $req->fullname;
		$user->usertype = $req->userType;
		$user->districtId = 1;
		$user->email = $req->email;
		$user->gender = $req->gender;
		$user->phonenumber = $req->phonenumber;
		$user->password = $req->password;
        $user->passport = $req->passport;
        $user->degree = $req->degree;
        $user->note = $req->note;
        $user->specialityId = $req->speciality;
        $user->certificate = $req->certificate;
		$user->provinceId = 1;
		$user->active = $req->active;
        $user->save();
        if($user->save())
		{
			\Session::flash('flash_message','Thêm bác sĩ thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm bác sĩ thất bại');
        }
        
        return view('admin.management.user.add',['speciality'=>$speciality]);
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
		$speciality = Speciality::all();
		$user = User::find($id);
		return view('admin.management.user.edit',['user'=>$user,'speciality'=>$speciality]);
	}

	function postEdit(Request $req){
		$speciality = Speciality::all();
        $provinces = Province::all();
        $districts = District::all();
        $user = User::find($req->id);
		if($req->active!=1)
		{
			$req->active=0;
		}
		$user->fullname = $req->fullname;
		$user->districtId = 1;
		$user->email = $req->email;
		$user->gender = $req->gender;
		$user->phonenumber = $req->phonenumber;
        $user->passport = $req->passport;
        $user->degree = $req->degree;
        $user->note = $req->note;
        $user->specialityId = $req->speciality;
		$user->provinceId = 1;
		$user->active = $req->active;
		$user->save();
		$allUsers = User::paginate(10);
		// if($user->save())
		// {
		// 	\Session::flash('flash_message','Sửa thành công');
			
<<<<<<< HEAD
		}else{
			\Session::flash('flash_fail','Sửa thất bại');
        }
        
        return view('admin.management.user.edit',['speciality'=>$speciality]);
=======
		// }else{
		// 	\Session::flash('flash_fail','Sửa thất bai');
        // }
        
        return view('admin.management.user.list',['allUsers'=>$allUsers]);
>>>>>>> 2910ae3bf58cbe70d4b0a2784adb7297e8522ee6
	}
}
