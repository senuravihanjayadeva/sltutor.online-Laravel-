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

        $limit = 10;
        $questions =  DB::select("select *  from question_banks order by id desc limit $limit");

        $comments = DB::select("select * from comments");


        $data = array(

            'PastPapers' =>  $PastPapers->sortByDesc('id'),
            'questions' => $questions,
            'comments' => $comments,
        );


        return view('PastPapers.index', compact('data'));
    }

    function actionPosts(Request $request)
    {

        $q = $request->input('search');

        $posts =  Post::where('subject', 'LIKE', '%' . $q . '%')->orWhere('district', 'LIKE', '%' . $q . '%')->orWhere('town', 'LIKE', '%' . $q . '%')->orWhere('level', 'LIKE', '%' . $q . '%')->orWhere('tutiontype', 'LIKE', '%' . $q . '%')->orWhere('medium', 'LIKE', '%' . $q . '%')
            ->orWhere('price', 'LIKE', '%' . $q . '%')
            ->orWhere('fullName', 'LIKE', '%' . $q . '%')->paginate(20);

        $limit = 10;
        $questions =  DB::select("select *  from question_banks order by id desc limit $limit");

        $comments = DB::select("select * from comments");

        $data = array(

            'posts' =>  $posts,
            'questions' => $questions,
            'comments' => $comments,
        );


        return view('posts.index', compact('data'));
    }
}