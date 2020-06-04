<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionBank;
use App\Post;
use App\PastPaper;
use DB;


class LiveSearch extends Controller
{
    function index()
    {
    }


    function action(Request $request)
    {

        $q = $request->input('search');
        $comments = DB::select("select commentable_id,count(*) as count  from comments group by commentable_id");

        $questions = QuestionBank::where('title', 'LIKE', '%' . $q . '%')->orWhere('subject', 'LIKE', '%' . $q . '%')->get();

        $data = array(

            'questions' => $questions->sortByDesc('id'),
            'comments' => $comments,
        );


        return view('questionbank.index', compact('data'));
    }

    function actionPapers(Request $request)
    {

        $q = $request->input('search');

        $PastPapers = PastPaper::where('year', 'LIKE', '%' . $q . '%')->orWhere('school', 'LIKE', '%' . $q . '%')->orWhere('subject', 'LIKE', '%' . $q . '%')->orWhere('grade', 'LIKE', '%' . $q . '%')->orWhere('term', 'LIKE', '%' . $q . '%')->orWhere('medium', 'LIKE', '%' . $q . '%')->get();




        $data = array(

            'PastPapers' =>  $PastPapers->sortByDesc('id'),

        );


        return view('PastPapers.index', compact('data'));
    }
}