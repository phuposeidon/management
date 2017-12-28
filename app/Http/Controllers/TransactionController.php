<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\User;
use App\Order;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

class TransactionController extends Controller
{
    function list() {
        $orders = Order::orderBy('createdAt', 'desc')->paginate(5);
        return view('admin.management.transaction.list', ['orders' => $orders]);
	}
	
	// public static function getUser($id) {
	// 	$getUserById = Patient::where('id', $id)->select('fullname')->get();
	// 	dd($getUserById);
	// 	return $getUserById[0]['fullname'];
	// }

    function payment(Request $req)
    {
    	$userId = Auth::id();
    	$order = Order::find($req->id);
    	$order->status = "confirm";
    	$order->save();
    	$transaction = new Transaction;
    	$transaction->orderId = $order->id;
    	$transaction->totalAmount = $order->totalAmount;
    	$transaction->createdById = $userId;
    	$transaction->save();
    	if ($transaction->save()) {
    		 $orders = Order::all();
        	echo '<span style="margin-left: 20px;" class="label label-success">Đã thanh toán</span>';
    	}

    }
    //Hủy
     function cancel(Request $req)
    {
    	$order = Order::find($req->id);
    	$order->status = "cancel";
    	$order->save();
    	if ($order->save()) {
    		 $orders = Order::all();
        	echo '<span style="margin-left: 20px;" class="label label-danger">Đã hủy</span>';
    	}

    }

    //Search

    function search(Request $req)
    {
        if(isset($req->fromDate))
        {
            $fromDate = Carbon::createFromFormat('d-m-Y', $req->fromDate)->toDateTimeString();
        }else{
            $fromDate =Carbon::now()->toDateTimeString();
        }
        
        if ($req->toDate) {
             $toDate = Carbon::createFromFormat('d-m-Y', $req->toDate)->toDateTimeString();
        }else{
             $toDate=Carbon::now()->toDateTimeString();
        }
       
        $query = Order::query();

        var_dump($fromDate);
        if( isset($fromDate) && isset($toDate))
            $query->whereBetween("createdAt", [$fromDate, $toDate])->get();

        // if($fromDate != "" && $toDate == "")
        //     $query::whereDate('createdAt', '=', $fromDate)->get();

        // if($fromDate == "" && $toDate != "")
        //     $query::whereDate('createdAt', '=', $toDate)->get();
        $query->orderBy("createdAt", 'desc')->get();
        $orders =   $query->paginate(5);
        return view('admin.management.transaction.list',['orders'=>$orders]);
    }
}
