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
class MedicalRecordController extends Controller
{
    function list(){
    	$currentDate = Carbon::now()->toDateTimeString();
    	$waiters = Appointment::whereDate('appointmentDate', '=', Carbon::today()->toDateString())->orderBy('appointmentDate','desc')->paginate(10);
    	$i=1;
    	return view('admin.management.waitlist.list',['waiters'=>$waiters,'i'=>$waiters->count()]);
    }

    function waitList($id){
		
		$patient = Patient::find($id);
        $medicines = Medicine::all();
        $patient_medicals = PatientMedical::where('patientId','=',$id)->get();
        $fami_medicals = FamiMedical::where('patientId','=',$id)->get();
        $record = MedicalRecord::where('patientId',$id)->first();

        if($record!=null)
        {
            $order = Order::where('medicalRecordId','=',$record->id)->get();

            $medicine_history = OrderMedicine::where('orderId','=',$order[0]->id)->get();
            $b =[];
            // for($i=0;$i<count($medicine_history);$i++){
            //     $b[] = Medicine::where('id','=',$medicine_history[$i]->medicineId)->get();
            // }
            foreach($medicine_history as  $value) {
                $a = Medicine::where('id','=',$value->medicineId)->select('name')->get()->toArray();
                $b[] = $a[0];
            }
            // foreach ($medicine_history as $value) {

                
                
            // }
            return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines,'medicine_history'=>$medicine_history,'b'=>$b]);
        }else{
            return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines]);
        }
        // return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines]);
    	
    }

    function addRecord(Request $req)
    {

        $order = new Order;
        $medicalrecord = new MedicalRecord;
        $medicalrecord->patientId = $req->id;
        $medicalrecord->doctorId = 1;
        $medicalrecord->clinicId = 1;
        $medicalrecord->diagnosis = $req->diagnosis;
        $medicalrecord->conclusion = $req->ckeditor;
        $medicalrecord->appoimentDate = Carbon::createFromFormat('d-m-Y',$req->meeting)->format('Y-m-d 00:00:00');

        $medicalrecord->save();
        if ( $medicalrecord->save()) {
            $order->medicalRecordId = $medicalrecord->id;
            $order->orderCode = "HM-004";
            $order->createdAt = Carbon::now();
            $order->updatedAt = Carbon::now();
             $order->totalAmount = 0;
            $order->save();

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
