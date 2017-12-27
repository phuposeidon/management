<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\MedicalRecord;
use App\Appointment;
use Carbon\Carbon;
use App\Patient;
use App\PatientMedical;
use App\FamiMedical;
use App\Order;
use App\Medicine;
use App\OrderMedicine;
use App\OrderService;
use App\GeneralIndex;
use App\Specialization;
use App\Service;
use App\Insurance;
use App\Record;
use App\CDHAImage;
use App\CDHA;

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
                    <td>".$history_medicine->expireDay."</td>
                   <td>".$history_medicine->using_med."</td>
                   <td>".$history_medicine->note."</td>
                </tr>";
        }
    }

    function waitList($id){
        $userId = Auth::id();
        $user = User::find($userId);
		$services= Service::where('serviceCode','=','BT')->get();
        $service_cdha = Service::where('serviceCode','=','CDHA')->get();
		$patient = Patient::find($id);
        $medicines = Medicine::all();
        $patient_medicals = PatientMedical::where('patientId','=',$id)->get();
        $fami_medicals = FamiMedical::where('patientId','=',$id)->get();
        $record = MedicalRecord::where('patientId',$id)->first();
        $orders = Order::where('patientId','=',$id)->get();
        $records = Record::all();

            return view('admin.management.medicalrecord.wait-list',['id'=>$id,'allergic'=>$patient->allergic,'diff_allergic'=>$patient->diff_allergic,'patient_medicals'=>$patient_medicals,'patient'=>$patient,'fami_medicals'=>$fami_medicals,'medicines'=>$medicines,'services'=>$services,'orders'=>$orders,'records'=>$records,'service_cdha'=>$service_cdha,'user'=>$user]);
    }

    function addRecord(Request $req)
    {
        if(!isset($req->serviceId)){
            return  response()->json(["success"=>false,"message"=>"Vui lòng chọn dịch vụ"]);
        }else{
            $service = Service::find($req->serviceId);
        $order = new Order;
        $medicalrecord = new MedicalRecord;
        $medicalrecord->patientId = $req->id;
        $medicalrecord->doctorId = $req->doctorId;
        $medicalrecord->clinicId = 1;
        $medicalrecord->diagnosis = $req->diagnosis?$req->diagnosis : '';
        $medicalrecord->conclusion = $req->ckeditor ?$req->ckeditor:'';
       
        if (isset($req->meeting)) {
             $meeting = $req->meeting ;
            $medicalrecord->appoimentDate = Carbon::createFromFormat('d-m-Y',$meeting)->format('Y-m-d 00:00:00');
        }else{
            $medicalrecord->appoimentDate =null;
        }
       

        $medicalrecord->save();
        if ( $medicalrecord->save()) {

            $insurrance = Insurance::where('patientId',$req->id)->get();
            if(isset($insurrance[0]['cardCode'])){
                $order->totalAmount = ($service->price)/0.2;
                $order->medicalRecordId = $medicalrecord->id;
                $order->patientId = $req->id;
                $order->orderCode = "HD".rand(10,1000);
                $order->createdAt = Carbon::now();
                $order->updatedAt = Carbon::now();
                $order->totalAmount = $service->price;
                $order->save();
                $orderService = new OrderService;
                $orderService->orderId = $order->id;
                $orderService->serviceId = $req->serviceId;
                $orderService->save();
            }else{
                 $order->medicalRecordId = $medicalrecord->id;
                 $order->patientId = $req->id;
                $order->orderCode = "HD-".rand(10,1000);
                $order->createdAt = Carbon::now();
                $order->updatedAt = Carbon::now();
                 $order->totalAmount = $service->price;
                $order->save();

                $orderService = new OrderService;
                $orderService->orderId = $order->id;
                $orderService->serviceId = $req->serviceId;
                $orderService->save();
            }
           

            return  response()->json(["success"=>200,"orderId"=>$order->id]);
                 }
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
    //Upload image CDHA
    function getCDHA(Request $req){
        $content = Service::find($req->id);
        echo $content->content;
    }

    function upload(Request $req){
       $input=$req->all();
       $cdha_image = new CDHAImage;
       $content = htmlspecialchars($_POST['content']);
       $cdha = new CDHA;
       $cdha->serviceId = $req->mau_cdha_id;
       $cdha->result = $content;
       $cdha->patientId = $req->patient_id;
       $cdha->save();
  
       if($cdha->save())
       {
            $images=array();
             $picture =[];
        if($files=$req->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $picture[] = [
                    'url' =>'image/'.$name,
                    'cdhaId' => $cdha->id
                ];
                $images[]=$name;
            }
           CDHAImage::insert($picture );
           return back()->with('cdha',"Lưu Chẩn đoán hình ảnh thành công");
        }
       }
        
        // echo htmlspecialchars($_POST['content']);
    }
    //End cdha

    function search(Request $req){
        $term = $req->term;
        $queries = DB::table('medicine')
        ->where('name', 'LIKE', '%'.$term.'%')
        ->orWhere('price', 'LIKE', '%'.$term.'%')
        ->take(5)->get();

        foreach ($queries as $query)
    {
        $results[] = [ 'id' => $query->id, 'value' => $query->name,'price'=>$query->price];
    }
    return Response::json($results);
    }
}
