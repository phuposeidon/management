<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Patient;
use App\User;
use App\Speciality;
use App\Appointment;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    function list(Request $request) {
		$query = Appointment::query();
		$keyword = $request->keyword;
		var_dump($keyword);
		if($request->searchDate != ''){
			$date = Carbon::createFromFormat('d-m-Y',$request->searchDate)->toDateString();
			$query->whereDate('appointmentDate', '=' ,$date)->get();
		}else{
			// $date = Carbon::createFromFormat('d-m-Y',Carbon::now())->toDateString();
			$query->whereDate('appointmentDate', '=' ,Carbon::now()->toDateString())->get();
		}
		
		$allAppointments = $query->orderBy('appointmentDate','desc')->paginate(5);
		
        return view('admin.management.appointment.list', ['allAppointments' => $allAppointments, 'searchDate' => $request->searchDate,'keyword'=>$keyword]);
    }

    function search(Request $req)
    {
    	$query = Appointment::query();
    	if($req->keyword!='')
    	{
    		$idPatient = [];
    		$idUser = [];
    		$patient = Patient::where("fullname", "like", "%". trim($req->keyword). "%")->get();
    		$users = User::where("fullname", "like", "%". trim($req->keyword). "%")->get();
    		foreach ($patient as $value) {
    			$idPatient[]= $value->id;
    		}

    		foreach ($users as $user) {
    			$idUser[]= $user->id;
    		}

    		if(count($idPatient)>0){
    			$allAppointments = $query->whereIn('patientId',$idPatient)->paginate(5);
    			$req->searchDate = $req->searchDate ? $req->searchDate :'';
    		return view('admin.management.appointment.list', ['allAppointments' => $allAppointments, 'searchDate' => $req->searchDate]);
    		}else{
    			$allAppointments = $query->whereIn('doctorId',$idUser)->paginate(5);
    			$req->searchDate = $req->searchDate ? $req->searchDate :'';
    		return view('admin.management.appointment.list', ['allAppointments' => $allAppointments, 'searchDate' => $req->searchDate]);
    		}
    		
    		
    	}else{
    		$allAppointments = $query->paginate(5);
    		$req->searchDate = $req->searchDate ? $req->searchDate :'';
    		return view('admin.management.appointment.list', ['allAppointments' => $allAppointments, 'searchDate' => $req->searchDate]);
    	}
    }

    function delete(Request $request) {
		$id = $request->id;
		Appointment::find($id)->delete();
	}

	function deleteAll(Request $request) {
		$ids = $request->id;
		foreach($ids as $id) {
			Appointment::find($id)->delete();
		}
	}

	function changeStatus(Request $req){
		$appointmentStatus = Appointment::find($req->id);
		$appointmentStatus->status = "confirmed";
		$appointmentStatus->save();
		if($appointmentStatus->save())
		{
			echo '<span style="margin-left: 20px;" class="label label-warning">Đã tiếp nhận</span>';
		}else{
			echo '<span style="margin-left: 20px;" class="label label-danger">Bị lỗi</span>';
		}
	}

	function cancel(Request $req){
		$appointmentStatus = Appointment::find($req->id);
		$appointmentStatus->status = "cancel";
		$appointmentStatus->save();
		if($appointmentStatus->save())
		{
			echo '<span style="margin-left: 20px;" class="label label-danger">Đã hủy</span>';
		}else{
			echo '<span style="margin-left: 20px;" class="label label-danger">Bị lỗi</span>';
		}
	}
}
