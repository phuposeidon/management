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
    public function showAppointment() {
        $specializations = Specialization::all();
        $doctors = User::where('userType','Bác sĩ')->get();
        return view('client.page.appointment', ['specializations' => $specializations, 'doctors' => $doctors]);
    }

    public function showHour(Request $request) {
        $appointmentDate = $request->appointmentDate;
        $allHours = Hours::all();

        //$allAppointments = Appointment::select('appointmentDate')->get();
        $allAppointments = Appointment::select('id','appointmentDate')->get();
        
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

        return view('client.page.hours', ['appointmentDate' => $appointmentDate, 'allHours' => $allHours, 'selectedDates' => $selectedDates]);
    }
    public function postAppointment(Request $request) {
        dd($request->all());
    }

    public function showUserInfo() {
        if(isset(Auth::guard('patient')->user()->id)){
            $id = Auth::guard('patient')->user()->id;
            $getPatientById = Patient::find($id);
            return view('client.page.user-info', ['getPatientById' => $getPatientById]);
        }
        else return view('client.layouts.index');
    }

    public function showAppointmentLogin() {
        return view('client.page.appointment-login');
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
