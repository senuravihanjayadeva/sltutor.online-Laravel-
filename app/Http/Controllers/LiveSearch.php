<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionBank;
use App\Post;
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
}