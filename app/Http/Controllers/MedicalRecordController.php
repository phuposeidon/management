<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalRecord;
use App\Appointment;
use Carbon\Carbon;
use App\Patient;
use App\PatientMedical;
use App\FamiMedical;
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
        $patient_medicals = PatientMedical::where('patientId','=',$id)->get();
        $fami_medicals = FamiMedical::where('patientId','=',$id)->get();
    	return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals]);
    }

    function addRecord(Request $req)
    {
        $medicalrecord = new MedicalRecord;
        $medicalrecord->patientId = $req->id;
        $medicalrecord->doctorId = 1;
        $medicalrecord->clinicId = 1;
        $medicalrecord->diagnosis = $req->diagnosis;
        $medicalrecord->conclusion = $req->ckeditor;
        $medicalrecord->appoimentDate = Carbon::createFromFormat('d-m-Y',$req->meeting)->format('Y-m-d 00:00:00');

        $medicalrecord->save();
        if ( $medicalrecord->save()) {
            echo '200';
        }
    }
    
}
