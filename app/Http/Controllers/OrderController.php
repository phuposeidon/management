<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Clinic;
use App\Patient;
use App\User;
use App\OrderService;
use App\OrderMedicine;

class OrderController extends Controller
{
    function list() {
        $allOrders = Order::all();
        return view('admin.management.order.list', ['allOrders' => $allOrders]);
	}
	
	public function getEdit($id) {
		$getOrderById = Order::find($id);
		$services = OrderService::where('orderId', $getOrderById->id)->get();
		$medicines = OrderMedicine::where('orderId', $getOrderById->id)->get();
		return view('admin.management.order.edit', ['getOrderById' => $getOrderById, 'services' => $services, 'medicines' => $medicines]);
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
