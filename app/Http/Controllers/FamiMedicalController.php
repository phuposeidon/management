<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Clinic;
use App\Patient;
use App\FamiMedical;

class FamiMedicalController extends Controller
{

	function add(Request $req){
		$fami_medical = new FamiMedical;
		$patientId = $req->id;
		$relationship = $req->relationship ? $req->relationship : '';
		$disease = $req->disease ? $req->disease : '';
		$note = $req->note ? $req->note : '';
		$socialproblem = $req->socialproblem ? $req->socialproblem : '';

		$fami_medical->patientId = $patientId;
		$fami_medical->relationship = $relationship;
		$fami_medical->disease = $disease;
		$fami_medical->note = $note;
		$fami_medical->socialproblem = $socialproblem;

		$fami_medical->save();
		if ($fami_medical->save()) {
			$data = FamiMedical::where('patientId',$patientId)->get();
			foreach ($data as $key => $value) {
				echo "<tr id='".$value->id."'>
                    <td>".++$key."</td>
                    <td>".$value->relationship."</td>
                    <td>".$value->disease."</td>
                    <td>".$value->socialproblem."</td>
                    <td>".$value->note."</td>
                    <td>
                        <div>
                            <a href='' class='btn btn-xs red dropdown-toggle delete' data-id='".$value->id."'> Xóa</a>
                        </div>
                    </td>
                </tr>";
			}
			
		}

	}

	function delete(Request $req)
	{
		var_dump($req->id);
		$id = $req->id;
		FamiMedical::find($id)->delete();
	}

}

?>