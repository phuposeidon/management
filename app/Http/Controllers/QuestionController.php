<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionImage;
use App\Answer;
use App\Post;
use App\Like;
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

    public function searchUrl(Request $request) {
        $urls = Post::where('name', "like", "%". trim($request->searchUrl). "%")->take(3)->get();
        $data = [];
        foreach($urls as $url) {
            $data[] = [
                'name' => $url->name,
                'id' => $url->id,
            ];
        }
        if($request->searchUrl == '') $data = '';
        return json_encode($data);
    }

    public function delete(Request $request) {
        $id = $request->id;
        QuestionImage::where('questionId', $id)->delete();
        Like::where('questionId', $id)->delete();
        Answer::where('questionId', $id)->delete();
		Question::find($id)->delete();
	}

}
