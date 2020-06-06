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


        $subject = $request->input('subject');
        $grade = $request->input('grade');
        $term = $request->input('term');

        if ($subject == null && $grade != null && $term != null) {

            $PastPapers = PastPaper::where('grade', 'LIKE', '%' . $grade . '%')->where('term', 'LIKE', '%' . $term . '%')->get();
        }
        if ($grade == null && $subject != null && $term != null) {

            $PastPapers = PastPaper::where('subject', 'LIKE', '%' . $subject . '%')->where('term', 'LIKE', '%' . $term . '%')->get();
        }
        if ($term == null && $subject != null && $grade != null) {

            $PastPapers = PastPaper::where('subject', 'LIKE', '%' . $subject . '%')->where('grade', 'LIKE', '%' . $grade . '%')->get();
        }

        if ($term == null && $grade == null && $subject != null) {

            $PastPapers = PastPaper::where('subject', 'LIKE', '%' . $subject . '%')->where('grade', 'LIKE', '%' . $grade . '%')->get();
        }
        if ($subject == null && $grade == null && $term != null) {

            $PastPapers = PastPaper::where('term', 'LIKE', '%' . $term . '%')->get();
        }
        if ($subject == null && $term == null && $grade != null) {

            $PastPapers = PastPaper::where('grade', 'LIKE', '%' . $grade . '%')->get();
        }
        if ($grade == null && $term == null && $subject != null) {

            $PastPapers = PastPaper::where('subject', 'LIKE', '%' . $subject . '%')->get();
        }
        if ($subject != null && $grade != null && $term != null) {

            $PastPapers = PastPaper::where('subject', 'LIKE', '%' . $subject . '%')->where('grade', 'LIKE', '%' . $grade . '%')->where('term', 'LIKE', '%' . $term . '%')->get();
        }
        if ($subject == null && $grade == null && $term == null) {

            $PastPapers = PastPaper::all();
        }



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
            ->orWhere('fullName', 'LIKE', '%' . $q . '%')->orderBy('id', 'desc')->paginate(50);

        $postCount =  Post::all();

        $limit = 10;
        $questions =  DB::select("select *  from question_banks order by id desc limit $limit");

        $comments = DB::select("select * from comments");

        $data = array(

            'posts' =>  $posts,
            'questions' => $questions,
            'comments' => $comments,
            'postCount' => $postCount,
        );


        return view('posts.index', compact('data'));
    }
}