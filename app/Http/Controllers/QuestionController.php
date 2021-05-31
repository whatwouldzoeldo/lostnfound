<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function addQuestion(Request $req)
    {
        $question = new Question;
        $question->question1 = $req->input('question1');
        $question->question2 = $req->input('question2');
        $question->question3 = $req->input('question3');
        $question->save();
        return $question;
    }
}
