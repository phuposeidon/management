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
}
