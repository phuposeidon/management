<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderMedicine;
use App\Order;
use App\Medicine;
use App\Insurance;
class OrderMedicineController extends Controller
{
    function add(Request $req){
        $order = Order::find($req->orderId);
    	$id = $req->id ? $req->id :'';
        $medicine = $req->medicine ?$req->medicine:'';
        $amount = $req->amount ? $req->amount :0 ;
        $morning = $req->morning ? $req->morning:0 ;
        $afternoon = $req->afternoon ? $req->afternoon:0;
        $evening = $req->evening ? $req->evening :0;
        $night = $req->night ?  $req->night : 0;
        $expireDay = $req->expireDay ? $req->expireDay:0;
        $using_med = $req->using_med ? $req->using_med :'';
        $note = $req->note ?  $req->note :'';
        $dosage = $req->dosage ?  $req->dosage : 0;

        $insurance = Insurance::where('patientId','=',$order->patientId)->get();
        if(isset($insurance->cardCode)){
            $s = Medicine::find($medicine); 
            dd($s->price);
            $total = ($amount*$s->price)+ $order->totalAmount;
            $order->totalAmount = $total/0.2;
            $order->save();
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
             $order_medicine->dosage = $dosage;
            $order_medicine->totalPrice = ($s->price) * $amount;

            $order_medicine->save();
        }else{
            $s = Medicine::find($medicine); 
            $total = ($amount*$s->price)+ $order->totalAmount;
            $order->totalAmount = $total;
            $order->save();
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
            $order_medicine->dosage = $dosage;
            $order_medicine->totalPrice = $s->price*$amount;

            $order_medicine->save();
        }

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
