<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Clinic;
use App\Patient;
use App\User;
use App\OrderService;
use App\OrderMedicine;
use Carbon\Carbon;
use Excel;
use Dompdf\Dompdf;

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

	public function exportOrder($id){
		$order = Order::find($id)->toArray();
		//dd($data);
		$fileName = $order['orderCode'].'_'.date('d-m-Y H:i:s');

		$patient = Patient::find($order['patientId'])->first()->toArray();

		$orderServices = OrderService::where('orderId', $order['id'])->get();
		$orderMedicines = OrderMedicine::where('orderId', $order['id'])->get();

		$today = Carbon::today();
		$age = date_diff(date_create($patient['DOB']), date_create($today))->format('%y');
		$data = [
			'name' => $patient['fullname'],
			'orderCode' => $order['orderCode'],
			'address' => $patient['address'],
			'age' => $age,
			'gender' => $patient['gender'],
			'totalAmount' => $order['totalAmount']
		];
		//dd($data['orderService']);
		return Excel::create($fileName, function($excel) use ($data, $orderServices, $orderMedicines) {
		 $excel->sheet('mySheet', function($sheet) use ($data, $orderServices, $orderMedicines)
		 {
			$sheet->loadView('admin.management.order.excel', [
				'data' => $data, 
				'orderServices' => $orderServices,
				'orderMedicines' => $orderMedicines
			]);
			$sheet->setStyle(array(
				'font' => array(
					'name'      =>  'Calibri',
					'size'      =>  14,
				)
			));
			$sheet->cells('A6:I6', function($cells) {
				$cells->setFontWeight('bold');
				$cells->setAlignment('center');
				$cells->setValignment('center');
				$cells->setFontSize(18);
			});
			$sheet->cells('A3:I3', function($cells) {
				$cells->setFontWeight('bold');
				$cells->setFontSize(18);
			});
			$sheet->setWidth('A', 5);
			$sheet->setFontBold(false);
			
		 });
		})->download("xlsx");
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
