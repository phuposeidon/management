<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Clinic;
use App\Patient;
use App\PatientMedical;

class PatientMedicalController extends Controller
{
	function add(Request $req){
		$patient_medical = new PatientMedical;
		$id = $req->id;
		$name = $req->name ? $req->name : '';
		$note = $req->note ? $req->note : '';
		$patient_medical->disease = $name;
		$patient_medical->note = $note;
		$patient_medical->patientId = $id;
		$patient_medical->save();
		if ($patient_medical->save()) {
			$data = PatientMedical::where('patientId',$id)->get();
			foreach ($data as $key => $value) {
				echo "<tr id='".$value->id."'>
                    <td>".++$key."</td>
                    <td>".$value->disease."</td>
                    <td>".$value->note."</td>
                    <td>
                        <div id='deleteRow'>
                            <a  class='btn btn-xs red dropdown-toggle delete' data-id='".$value->id."'> <i class='fa fa-trash-o'></i></a>                             
                        </div>
                    </td>
                </tr>";
			}
			
		}
	}

	function delete(Request $request) {
		var_dump($request->id);
		$id = $request->id;
		PatientMedical::find($id)->delete();
	}


}
?>