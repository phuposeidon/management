<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalRecord;
use App\Appointment;
use Carbon\Carbon;
use App\Patient;
use App\PatientMedical;
use App\FamiMedical;
use App\Order;
use App\Medicine;
use App\OrderMedicine;
use App\GeneralIndex;
use App\Specialization;
use App\Service;
use App\Insurance;
use App\Record;
class MedicalRecordController extends Controller
{
    function list(){
    	$currentDate = Carbon::now()->toDateTimeString();
    	$waiters = Appointment::whereDate('appointmentDate', '=', Carbon::today()->toDateString())->orderBy('appointmentDate','desc')->paginate(10);
    	$i=1;
    	return view('admin.management.waitlist.list',['waiters'=>$waiters,'i'=>$waiters->count()]);
    }

    function chosen($id){
        $medicines = OrderMedicine::where('orderId','=',$id)->get();
        foreach ($medicines  as $history_medicine) {
            
            $medicine =  Medicine::find($history_medicine->medicineId);
            echo "<tr>
                    <td>".$medicine->name."</td>
                    <td>Viên</td>
                    <td>".$history_medicine->morning."</td>
                    <td>".$history_medicine->afternoon."</td>
                    <td>".$history_medicine->evening."</td>
                   <td>".$history_medicine->night."</td>
                   <td>".$history_medicine->evening."</td>
                    <td>".$history_medicine->amount."</td>
                   <td>".$history_medicine->using_med."</td>
                   <td>".$history_medicine->note."</td>
                </tr>";
        }
    }

    function waitList($id){
		$services= Service::all();
		$patient = Patient::find($id);
        $medicines = Medicine::all();
        $patient_medicals = PatientMedical::where('patientId','=',$id)->get();
        $fami_medicals = FamiMedical::where('patientId','=',$id)->get();
        $record = MedicalRecord::where('patientId',$id)->first();
        $orders = Order::where('patientId','=',$id)->get();
        $records = Record::all();

            return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines,'services'=>$services,'orders'=>$orders,'records'=>$records]);
    }

    function addRecord(Request $req)
    {
        $service = Service::find($req->serviceId);
        $order = new Order;
        $medicalrecord = new MedicalRecord;
        $medicalrecord->patientId = $req->id;
        $medicalrecord->doctorId = $req->doctorId;
        $medicalrecord->clinicId = 1;
        $medicalrecord->diagnosis = $req->diagnosis;
        $medicalrecord->conclusion = $req->ckeditor;
        $medicalrecord->appoimentDate = Carbon::createFromFormat('d-m-Y',$req->meeting)->format('Y-m-d 00:00:00');

        $medicalrecord->save();
        if ( $medicalrecord->save()) {
            $insurrance = Insurance::where('patientId',$req->id)->get();
            if(isset($insurrance[0]['cardCode'])){
                $order->totalAmount = ($service->price)/0.2;
                $order->medicalRecordId = $medicalrecord->id;
                $order->orderCode = "HD".rand(10,1000);
                $order->createdAt = Carbon::now();
                $order->updatedAt = Carbon::now();
                $order->save();
            }else{
                 $order->medicalRecordId = $medicalrecord->id;
                $order->orderCode = "HD".rand(10,1000);
                $order->createdAt = Carbon::now();
                $order->updatedAt = Carbon::now();
                 $order->totalAmount = $service->price;
                $order->save();
            }
           

            return  response()->json(["success"=>200,"orderId"=>$order->id]);
                 }
    }

    function history($id){
        $patient = Patient::find($id);
        $medicines = Medicine::all();
        $general = GeneralIndex::where('patientId','=',$id)->first();
        $patient_medicals = PatientMedical::where('patientId','=',$id)->get();
        $fami_medicals = FamiMedical::where('patientId','=',$id)->get();
        $record = MedicalRecord::where('patientId',$id)->first();
        return view('admin.management.medicalrecord.history',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines,'general'=>$general,"record"=>$record]);
    }
    
}
