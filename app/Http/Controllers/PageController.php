<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Specialization;
use App\User;
use App\Patient;
use App\Hours;
use App\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function showAppointmentLogin() {
        return view('client.page.appointment-login');
    }

    public function showAppointment(Request $request) {
        $getNewPatientId = '';
        if(isset($request->fullname))
        {
            $this->validate($request, [
                'email' => 'required|unique:patient,email',
            ], [
                'email.required' => 'Vui lòng nhập email',
                'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            ]);
            $newPatient = new Patient;
            $newPatient->fullname = $request->fullname;
            $newPatient->email = $request->email;
            $newPatient->phone = $request->phone;
            $newPatient->gender = $request->gender;
            $newPatient->save();
            $getNewPatientId = $newPatient->id;
        }
        $specializations = Specialization::all();
        $doctors = User::where('userType','Bác sĩ')->get();
        return view('client.page.appointment', ['specializations' => $specializations, 'doctors' => $doctors, 'getNewPatientId' => $getNewPatientId]);
    }

    public function getDoctor($specializationId) {  //ajax load doctor
        $doctor = User::where('specializationId', $specializationId)->get();
        foreach ($doctor as $doc) {
            echo '<option value="'.$doc->id.'">'.$doc->fullname.'</option>';
        }
    }

    public function showHour(Request $request) {
        $appointmentDate = $request->appointmentDate;
        $doctorId = $request->doctorId;
        $allHours = Hours::all();

        //$allAppointments = Appointment::select('appointmentDate')->get();
        $allAppointments = Appointment::select('id','appointmentDate')->where('doctorId', $doctorId)->get();
        
        //get all appointment in selected date
        $selectedDates = [];
        foreach($allAppointments as $appointment)
        {
            $appo = Carbon::Parse($appointment['appointmentDate'])->format('d-m-Y');
            if($appo == $appointmentDate) {
                $selectedDates[] = array(
                    'id' => $appointment['id'],
                    'hour' => Carbon::Parse($appointment['appointmentDate'])->format('H:i:s'),
                );
            }
        }
        //$selectedDates = Appointment::whereIn('id', $date_array)->get();
        if(isset($request->patientId))
        {
            $getPatientId = $request->patientId;
        }
        else $getPatientId = Auth::guard('patient')->user()->id;

        return view('client.page.hours', ['appointmentDate' => $appointmentDate, 'allHours' => $allHours, 'selectedDates' => $selectedDates, 'getPatientId' => $getPatientId, 'doctorId' => $doctorId]);
    }
    public function postAppointment(Request $request) {
        $appointment = new Appointment;
        $appointment->clinicId = 1;
        $appointment->doctorId = $request->doctorId;
        $appointment->patientId = $request->patientId;
        $appointment->appointmentDate = $request->appointmentDate;
        $appointment->save();

        return view('client.layouts.index', ['thongbao' => 'Bạn đã đặt lịch khám thành công.']);
    }

    public function showUserInfo() {
        if(isset(Auth::guard('patient')->user()->id)){
            $id = Auth::guard('patient')->user()->id;
            $getPatientById = Patient::find($id);
            return view('client.page.user-info', ['getPatientById' => $getPatientById]);
        }
        else return view('client.layouts.index');
    }

    public function getSignUp() {
        return view('client.page.register');
    }
    public function postSignUp(Request $request) {
		$this->validate($request, [
            'username' => 'required|unique:patient,username',
			'email' => 'required|unique:patient,email',
			'passport' => 'required|unique:patient,passport',
            'fullname' => 'required',
            'password' => 'required|min:8',
            'DOB' => 'required',
        ], [
            'username.required' => 'Vui lòng nhập username',
            'username.unique' => 'Username đã tồn tại, vui lòng nhập username khác',
            'email.required' => 'Vui lòng nhập email',
			'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
			'passport.required' => 'Vui lòng nhập CMND',
			'passport.unique' => 'CMND đã tồn tại, vui lòng kiểm tra và nhập CMND khác',
            'fullname.required' => 'Vui lòng nhập họ tên',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất phải gồm 8 ký tự',
            'DOB.required' => 'Vui lòng nhập ngày sinh',
        ]);
		$patient = new Patient;
		$patient->fullname = $request->fullname;
		$patient->email = $request->email;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->address = $request->address;
		$patient->username = $request->username;
		$patient->password = bcrypt($request->password);
		$patient->passport = $request->passport;
		$patient->DOB = Carbon::createFromFormat('d-m-Y',$request->DOB)->format('Y-m-d 00:00:00');
		$patient->bloodgroup = $request->bloodgroup;
		// $patient->pet = $request->pet;
		// $patient->phonepet = $request->petphonenumber;
		$patient->active = 1;
		$patient->save();

		return view('client.layouts.index')->with('thongbao', 'Bạn đã đăng ký tài khoản thành công');
	}
}
