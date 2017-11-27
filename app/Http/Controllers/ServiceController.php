<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Service;
use App\User;

class ServiceController extends Controller
{
    function list() {
        $allClinics = Clinic::all();
        $allServices = Service::paginate(10);
        return view('admin.management.service.list', ['allClinics' => $allClinics, 'allServices' => $allServices]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Service::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Service::find($id)->delete();
		}
	}

	function index(){
		$allUser = User::all();
		return view('admin.management.service.add',['allUser'=>$allUser]);
	}

	function add(Request $req){
		$service = new Service;
		$allUser = User::all();
		$service->executedById = $req->user;
		$service->name = $req->name;
		$service->content = $req->note;
		$service->price = $req->price;
		$service->clinicId = 1;
		$service->save();
		if($service->save())
		{
			\Session::flash('flash_message','Thêm dịch vụ thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm dịch vụ thất bại');
		}

		return view('admin.management.service.add',['allUser'=>$allUser]);
	}

	function getService($id){
		$service = Service::find($id);
		$allUser = User::all();
		return view('admin.management.service.edit',['service'=>$service,'allUser'=>$allUser]);
		var_dump($id);
	}

	function postService(Request $req){
		$service = Service::find($req->id);
		$service->executedById = $req->user;
		$service->name = $req->name;
		$service->content = $req->note;
		$service->price = $req->price;
		$service->clinicId = 1;
		$service->save();
		if ($service->save()) {
			return redirect()->route('getService');
		}
	}
}
