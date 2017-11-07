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
		$user->fullname = $req->fullname;
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
			\Session::flash('flash_fail','Thêm bác sĩ thất bai');
        }
        
        return view('admin.management.user.add',['speciality'=>$speciality]);
    }
}