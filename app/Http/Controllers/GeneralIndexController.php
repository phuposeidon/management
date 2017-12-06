<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalRecord;
use App\Appointment;
use Carbon\Carbon;
use App\Patient;
use App\PatientMedical;
use App\FamiMedical;
use App\GeneralIndex;
class GeneralIndexController extends Controller
{
	function add(Request $req)
	{
		$general = new GeneralIndex;
		$general->patientId = $req->id;
		$general->cell = $req->cell;
		$general->temperature = $req->temperature;
		$general->bloodpressure = $req->bloodpressure;
		$general->waist = $req->waist;
		$general->bloodsugar = $req->bloodsugar;
		$general->weight = $req->weight;
		$general->height = $req->height;
		$general->save();
		if ($general->save()) {
			return redirect('diagnosis/'.$req->id)->with('status', 'Success !');
		}else{
			return redirect('diagnosis/'.$req->id);
		}
	}

}

?>

