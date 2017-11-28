<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Clinic;
use App\Patient;
use App\User;

class OrderController extends Controller
{
    function list() {
        $allOrders = Order::all();
        return view('admin.management.order.list', ['allOrders' => $allOrders]);
    }

    function delete(Request $request) {
		$id = $request->id;
		Order::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Order::find($id)->delete();
		}
	}
}
