<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{
    function list(){
    	$records = Record::all();
    	return view('admin.management.record.index',['records'=>$records]);
    }

    function add(Request $req)
    {
    	$record = new Record;
    	$record->name = $req->name;
    	$record->content = $req->content;
    	$record->save();
    	if($record->save())
    	{
    		return redirect()->route('viewrecord');
        }
    }

    function getRecord($id){
        $template_record = Record::find($id);
        echo $template_record->content;
    }
}
