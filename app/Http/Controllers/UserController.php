<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
		$user->password = $req->password;
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
}
