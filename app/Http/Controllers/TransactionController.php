<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\User;
use App\Province;
use App\Transaction;

class TransactionController extends Controller
{
    function list() {
        $allTransactions = Transaction::paginate(10);
        return view('admin.management.transaction.list', ['allTransactions' => $allTransactions]);
	}
	
	public static function getUser($id) {
		$getUserById = User::where('id', $id)->select('fullname')->get();
		return $getUserById[0]['fullname'];
	}

    function delete(Request $request) {
		$id = $request->id;
		Transaction::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Transaction::find($id)->delete();
		}
	}
}
