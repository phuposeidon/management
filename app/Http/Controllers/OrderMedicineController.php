<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderMedicine;
use App\Order;
use App\Medicine;

class OrderMedicineController extends Controller
{
    function add(Request $req){
    	$id = $req->id ? $req->id :'';
        $medicine = $req->medicine ?$req->medicine:'';
        $amount = $req->amount ? $req->amount :'' ;
        $morning = $req->morning ? $req->morning:'';
        $afternoon = $req->afternoon ? $req->afternoon:'';
        $evening = $req->evening ? $req->evening :'';
        $night = $req->night ?  $req->night : '';
        $expireDay = $req->expireDay ? $req->expireDay:'';
        $using_med = $req->using_med ? $req->using_med :'';
        $note = $req->note ?  $req->note :'';

        $s = Medicine::find($medicine); 

        $order_medicine = new OrderMedicine;
        $order_medicine->orderId = $id;
        $order_medicine->medicineId =$medicine;
        $order_medicine->amount = $amount;
        $order_medicine->morning = $morning;
        $order_medicine->afternoon =$afternoon;
        $order_medicine->evening = $evening;
        $order_medicine->night = $night;
        $order_medicine->using_med = $using_med;
        $order_medicine->note = $note;
        $order_medicine->totalPrice = $s->price;
        $order_medicine->save();

        if($order_medicine->save())
        {
        	$success = OrderMedicine::where('orderId',$req->id)->get();
        	foreach ($success as  $value) {
        		echo '<tr ng-repeat="item in selectedMeds" class="ng-scope">
                                                <td width="15%"  >
                                                    '.Medicine::find($value->medicineId)->name.'
                                                    <!-- ngIf: item.ingredientObjs -->
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>
                                                </td>
                                                <td width="8%">
                                                    <span  >Viên</span>

                                                </td>


                                                <td width="3%">
                                                    <span  >'.$value->morning.'</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >'.$value->afternoon.'</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >'.$value->evening.'</span>

                                                </td>
                                                <td width="3%">
                                                    <span  >'.$value->night.'</span>

                                                </td>


                                                <td width="5%">
                                                    <span  >'.$value->amount.'</span>
                                                </td>

                                                <td width="15%">
                                                    <span  >'.$value->using_med.'</span>

                                                </td>
                                                <td width="15%">
                                                    <span  >'.$value->note.'</span>

                                                </td>
                                                <!-- ngIf: !isDiagnosisHistoryForm -->
                                                <td ng-if="!isDiagnosisHistoryForm" width="5%" class="ng-scope">
                                                    <button type="button" class="btn btn-xs btn-danger" id="add_medicine">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                                <!-- end ngIf: !isDiagnosisHistoryForm -->
                                            </tr>';
        	}
        	
        } 


    }
}
