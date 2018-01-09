<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientFeedback;
use App\Specialization;
use App\User;
use App\Patient;
use App\Hours;
use App\Appointment;
use App\Question;
use App\QuestionImage;
use App\Answer;
use App\Like;
use App\Post;
use App\Feedback;
use App\Category;
use App\MedicalRecord;
use App\Order;
use App\OrderMedicine;
use App\OrderService;
use App\Transaction;
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
    public function index() {
        $topDoctors = User::rightJoin('feedback', 'user.id','=','feedback.doctorId')
        ->selectRaw('user.userType, user.specializationId, avatar, fullname, user.id , AVG(point) as avgPoint')
        ->groupBy('doctorId', 'user.id', 'fullname', 'specializationId', 'userType', 'avatar')
        ->orderBy('avgPoint','DESC')
        ->take(4)->get();

        $newPosts = Post::orderBy('createdAt', 'desc')->take(3)->get()->toArray();
        $newestPost = array_slice($newPosts,0,1);
        $newerPosts = array_slice($newPosts,1,2);
        //dd($newestPost);

        return view('client.layouts.index', ['topDoctors' => $topDoctors, 'newestPost' => $newestPost, 'newerPosts' => $newerPosts]);
    }
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

        // $appointmentDate = $request->appointmentDate;
        $doctorId = $request->doctorId;
        $allHours = Hours::all();

        //$allAppointments = Appointment::select('id','appointmentDate')->where('doctorId', $doctorId)->get();
        
        //get all appointment in selected date
        // $selectedDates = [];
        // foreach($allAppointments as $appointment)
        // {
        //     $appo = Carbon::Parse($appointment['appointmentDate'])->format('d-m-Y');
        //     if($appo == $appointmentDate) {
        //         $selectedDates[] = array(
        //             'id' => $appointment['id'],
        //             'hour' => Carbon::Parse($appointment['appointmentDate'])->format('H:i:s'),
        //         );
        //     }
        // }
        //$selectedDates = Appointment::whereIn('id', $date_array)->get();
        if(isset($request->patientId))
        {
            $getPatientId = $request->patientId;
        }
        else $getPatientId = Auth::guard('patient')->user()->id;

        return view('client.page.hours', [
            // 'appointmentDate' => $appointmentDate, 
            // 'allHours' => $allHours, 
            // 'selectedDates' => $selectedDates, 
            'getPatientId' => $getPatientId, 
            'doctorId' => $doctorId]);
    }
    public function getHours(Request $request){
        //dd($request->all());
        $data = [];
        $appointmentDate = $request->appointmentDate;
        $doctorId = $request->doctorId;
        $allHours = Hours::all();

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
        for($i = 0; $i < count($allHours); $i++) {
            $data[$i]['hour'] = substr($allHours[$i]['hour'],0,5);
            $data[$i]['seat'] = "Còn chỗ";
            foreach($selectedDates as $appointment)
            {
                if($appointment['hour'] != $allHours[$i]['hour'] )
                    $data[$i]['seat'] = "Còn chỗ";
                else
                {
                    $data[$i]['seat'] = "Hết chỗ";
                    break;
                }
            }
        }
        // echo "<pre>";
        // var_dump($selectedDates);
        return json_encode($data);
    }
    public function postAppointment(Request $request) {
        
        $appointment = new Appointment;
        $appointment->clinicId = 1;
        $appointment->doctorId = $request->doctorId;
        $appointment->patientId = $request->patientId;
        $appointment->appointmentDate = Carbon::createFromFormat('d-m-Y H:i:s',$request->appointmentDate)->toDateTimeString();
        $appointment->save();

        $request->appointmentDate = Carbon::createFromFormat('d-m-Y H:i:s',$request->appointmentDate)->format('d-m-Y');
        $array = $this->getHours($request);
        
        return $array;
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
            'password' => 'required|min:6',
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
            'password.min' => 'Mật khẩu ít nhất phải gồm 6 ký tự',
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
		$patient->active = 1;
		$patient->save();

		return view('client.layouts.index')->with('thongbao', 'Bạn đã đăng ký tài khoản thành công');
    }
    
    public function showUserInfo() {
        $id = Auth::guard('patient')->user()->id;
        $getPatientById = Patient::find($id);
        $getOrders = Order::where('patientId', $id)->orderBy('createdAt','desc')->paginate(10);
        return view('client.page.user-info', [
            'getPatientById' => $getPatientById,
            'getOrders' => $getOrders,
            ]);
    }

    public function doctorFeedback($id) {
        $doctor = User::find($id);
        $allFeedbacks = Feedback::where('doctorId', $id)->orderBy('createdAt','desc')->paginate(5);
        $pointAvg = $allFeedbacks->avg('point');
        return view('client.page.feedback',['doctor' => $doctor, 'allFeedbacks' => $allFeedbacks, 'pointAvg'=>$pointAvg]);
    }

    public function postFeedback(Request $request) {
        // /dd($request->all());
        $feedback = new Feedback;
        $feedback->doctorId = $request->doctorId;
        $feedback->patientId = $request->patientId;
        $feedback->title = $request->subject;
        $feedback->point = $request->point;
        $feedback->anonymous = $request->anonymous;
        $feedback->content = $request->content;
        $feedback->save();

        $pointAvg = Feedback::where('doctorId', $request->doctorId)->avg('point');
        $pointAvg = round($pointAvg, 2);

        $date_created = Carbon::Parse($feedback->crearedAt)->format('d-m-Y H:i');

        $data = [
            'title' => $feedback->title,
            'point' => $feedback->point,
            'content' => $feedback->content,
            'patient' => $feedback->Patient->fullname,
            'createdAt' => $date_created,
            'anonymous' => $feedback->anonymous,
            'pointAvg' => $pointAvg
        ];
        return json_encode($data);
    }

    public function postEditInfo(Request $request){
        $this->validate($request, [
			//'email' => 'required|unique:patient,email',
			//'passport' => 'required|unique:patient,passport',
            //'password' => 'required|min:8',
            'DOB' => 'required',
        ], [
            //'email.required' => 'Vui lòng nhập email',
			//'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
			//'passport.required' => 'Vui lòng nhập CMND',
			//'passport.unique' => 'CMND đã tồn tại, vui lòng kiểm tra và nhập CMND khác',
            //'password.required' => 'Vui lòng nhập mật khẩu',
            //'password.min' => 'Mật khẩu ít nhất phải gồm 8 ký tự',
            'DOB.required' => 'Vui lòng nhập ngày sinh',
        ]);
		$patient = Patient::find($request->id);
		$patient->email = $request->email;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->address = $request->address;
		$patient->username = $request->username;
		$patient->password = bcrypt($request->password);
		$patient->passport = $request->passport;
		$patient->DOB = Carbon::createFromFormat('d-m-Y',$request->DOB)->format('Y-m-d 00:00:00');
		$patient->bloodgroup = $request->bloodgroup;
		$patient->active = 1;
		$patient->save();
        if( $patient->save())
		{
			
			\Session::flash('flash_message','Bạn đã cập nhật thông tin thành công');
			
		}else{
			\Session::flash('flash_fail','Bạn đã cập nhật thông tin thất bại');
		}
		return view('client.page.user-info');
    }
    public function getBlog(Request $request) {
        $specializations = Specialization::all();
        $query = Question::query();
        $speId = count($specializations);
        for($i = 1; $i <= $speId; $i++) {
            if($request->specializationId == $i)
                $query->where('specializationId', $request->specializationId)->get();
        }
        $questions = $query->orderBy('createdAt', 'desc')->paginate(10);
        //$questions = Question::orderBy('createdAt', 'desc')->get();
        return view('client.page.blog', ['specializations' => $specializations, 'questions' => $questions]);
    }
    public function postBlog(Request $request) {
        //dd($request->all());
        $question = new Question;
        $question->patientId = $request->patientId;
        $question->specializationId = $request->specializationId;
        if(isset($request->anonymous)) $question->anonymous = 1;
        $question->content = $request->content;
        $question->save();

        //$questionImg = new QuestionImage;
        $picture =[];
        if ($request->file('image')) {
            $destinationPath = 'img/questionimage/'.$question->id.'/';
            $files = $request->file('image'); // will get all files
            
            
            foreach ($files as $file) {//this statement will loop through all files.
                $file_extension = $file->getClientOriginalExtension(); //Get file original name
                $file_name =  "qt_".$question->id."_".str_random(4). "." . $file_extension;
                $file->move($destinationPath , $file_name); // move files to destination folder
                $picture[] = [
                    'url' =>$file_name,
                    'questionId' => $question->id
                ];
            }
        }
        
        QuestionImage::insert($picture);
        \Session::flash('flash_message','Đã gửi câu hỏi thành công.'); 
        return redirect('blog#service')->with('questionId',$question->id );
    }



    public function postAnswer(Request $request) {
        //dd($request->all());
        $answer = new Answer;
        $answer->patientId = $request->patientId;
        $answer->questionId = $request->questionId;
        $answer->content = $request->content;
        $answer->save();
        $patient = Patient::find($request->patientId);
        $date_created = Carbon::Parse($answer->crearedAt)->format('d-m-Y H:i');

        $data = [
            'questionId' => $answer->questionId,
            'content' => $answer->content,
            'patient' => $answer->Patient->fullname,
            'doctor'=>'',
            'patient_avatar'=>$patient->avatar,
            'user_avatar'=>'',
            'createdAt' => $date_created
        ];
        return json_encode($data);
    }

    public function postLike(Request $request) {
        $like = new Like;
        $like->patientId = $request->patientId;
        $like->questionId = $request->questionId;
        $like->save();
    }

    public function getQuestion($id) {
        $specializations = Specialization::all();
        $question = Question::find($id);

        return view('client.page.question', [
            'question' => $question,
            'specializations' => $specializations
        ]);
    }

    public function getListPost() {
        $allCategories = Category::all();

        $newPost = Post::orderBy('createdAt', 'desc')->first();
        $allPosts = Post::where('id', '!=', $newPost->id)->orderBy('createdAt', 'desc')->take(4)->get();
        return view('client.page.posts', ['allPosts'=>$allPosts,  'newPost' => $newPost, 'allCategories' => $allCategories]);
    }
    
    public function getPost($id) {
        $allCategories = Category::all();
        $post = Post::find($id);
        $post->views += 1;
        $post->save();

        $recomendPosts = Post::where('categoryId', $post->categoryId)->where('id', '!=', $post->id)->orderBy('createdAt', 'desc')->take(5)->get();
        $topPosts = Post::orderBy('views', 'desc')->take(4)->get();
        return view('client.page.post', ['post' => $post, 'recomendPosts' => $recomendPosts, 'allCategories' => $allCategories, 'topPosts' => $topPosts]);
    }

    public function getCate($id) {
        $category = Category::find($id);
        $allCategories = Category::all();
        $newPost = Post::where('categoryId', $id)->orderBy('createdAt', 'desc')->first();
        // /dd($newPost);
        if($newPost != '') {
            $allPosts = Post::where('categoryId', $id)->where('id', '!=', $newPost->id)->orderBy('createdAt', 'desc')->paginate(10);
            return view('client.page.category', ['category' => $category,'allPosts'=>$allPosts,  'newPost' => $newPost, 'allCategories' => $allCategories]); 
        }
        else {
            $allPosts = '';
            return view('client.page.category', ['category' => $category,'allPosts'=>$allPosts, 'allCategories' => $allCategories]); 
        }
        
    }

    public function getDoctors($id) {
        $specializations = Specialization::all();
        $specialization = Specialization::find($id);
        $doctors = User::where('userType', 'Bác sĩ')->get();
        $topDoctors = User::where('specializationId', $id)->rightJoin('feedback', 'user.id','=','feedback.doctorId')
                ->selectRaw('user.userType, user.specializationId, avatar, fullname, user.id , AVG(point) as avgPoint')
                ->groupBy('doctorId', 'user.id', 'fullname', 'specializationId', 'userType', 'avatar')
                ->orderBy('avgPoint','DESC')
                ->paginate(12);
        return view('client.page.list-doctor', [
            'specializations' => $specializations, 
            'topDoctors' => $topDoctors,
            'specialization' => $specialization
            ]);
    }

    // public function postPatientFeedback() {
    //     $data = ['hoten' => 'Khương'];
    //     $patient = Auth::guard('patient')->user();
    //     Mail::to($patient)->send(new PatientFeedback($patient));
    // }

}
