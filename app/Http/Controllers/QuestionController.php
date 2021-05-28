<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function addQuestion (Request $req)
    {
        $question = new Question;
        $question->question1 = $req->input ('question 1');
        $question->question1 = $req->input ('question 2');
        $question->question1 = $req->input ('question 3');
        $question->save();
        return $question;
    }
}
