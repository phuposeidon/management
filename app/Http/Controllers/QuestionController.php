<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Carbon\Carbon;

class QuestionController extends Controller
{
    public function showList() {
        $questions = Question::orderBy('createdAt', 'desc')->get();
        return view('admin.management.question.list', ['questions' => $questions]);
    }

    public function getAnswer($id) {
        $getQuestionById = Question::find($id);
        $answers = Answer::where('questionId', $id)->get();
        return view('admin.management.question.answer', ['answers' => $answers, 'getQuestionById' => $getQuestionById]);
    }

    public function postAnswer(Request $request) {
        $answer = new Answer;
        $answer->doctorId = $request->doctorId;
        $answer->questionId = $request->questionId;
        $answer->content = $request->content;
        $answer->save();

        //$date_created = Carbon::Parse($answer->createdAt)->format('d-m-Y H:i');
        $old= Carbon::Parse($answer->createdAt)->format('d-m-Y H:i');
        $hour= Carbon::Parse($answer->createdAt)->format('H');
        $date_created = substr_replace($old, $hour + 7 , 11, 2);

        $data = [
            'content' => $answer->content,
            'doctor' => $answer->User->fullname,
            'createdAt' => $date_created,
        ];
        //dd($data);
        return json_encode($data);
    }
}
