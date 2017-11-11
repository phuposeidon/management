<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Test;

class TestController extends Controller
{
    function list() {
        $allTests = Test::paginate(10);
        return view('admin.management.test.list', ['allTests' => $allTests]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Test::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Test::find($id)->delete();
		}
	}
}
