<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Province;
use App\Transaction;

class TransactionController extends Controller
{
    function list() {
        $allTransactions = Transaction::paginate(10);
        return view('admin.management.transaction.list', ['allTransactions' => $allTransactions]);
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
