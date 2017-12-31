<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Service;
use App\Specialization;

class ServiceController extends Controller
{
    function list() {
        $allClinics = Clinic::all();
        $allServices = Service::all();
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
		$allSpecialization = Specialization::all();
		return view('admin.management.service.add',['allSpecialization'=>$allSpecialization]);
	}

	function add(Request $req){
		$service = new Service;
		$content = $_POST['content'];
		$allSpecialization = Specialization::all();
		$service->specializationId = $req->user;
		$service->name = $req->name;
		$service->serviceCode = $req->serviceCode;
		$service->content = $content;
		$service->price = $req->price;
		$service->clinicId = 1;
		$service->save();
		if($service->save())
		{
			\Session::flash('flash_message','Thêm dịch vụ thành công');
			
		}else{
			\Session::flash('flash_fail','Thêm dịch vụ thất bại');
		}

		return view('admin.management.service.add',['allSpecialization'=>$allSpecialization]);
	}

	function getService($id){
		$service = Service::find($id);
		$allSpecialization = Specialization::all();
		return view('admin.management.service.edit',['service'=>$service,'allSpecialization'=>$allSpecialization]);
		var_dump($id);
	}

	function postService(Request $req){
		$service = Service::find($req->id);
		$service->specializationId = $req->user;
		$content = $_POST['content'];
		$service->name = $req->name;
		$service->content = $content;
		$service->price = $req->price;
		$service->clinicId = 1;
		$service->save();
		if ($service->save()) {
			return redirect()->route('getService');
		}
	}
}
