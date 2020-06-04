<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\QuestionBank;
use App\Post;
use DB;

class QuestionBankController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTest()
    {

        $comments = DB::select("select commentable_id,count(*) as count from comments group by commentable_id");

        $questions =  QuestionBank::orderBy('id', 'desc')->paginate(50); //add pagination

        $data = array(

            'comments' =>  $comments,
            '$questions' => $questions,
        );


        return view('questionbank.index', compact('data'));

        //return view('questionbank.index')->with('questions', $questions);
    }

    //////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $comments = DB::select("select * from comments");

        $questions = QuestionBank::all();

        $data = array(

            'questions' => $questions->sortByDesc('id'),
            'comments' => $comments,
        );


        return view('questionbank.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionbank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'level' => 'required',
            'subject' => 'required',
            'body' => 'required',


        ]);

        //Create Post
        $question = new QuestionBank;
        $question->title = $request->input('title');
        $question->level = $request->input('level');
        $question->subject = $request->input('subject');
        $question->body = $request->input('body');
        $question->user_id = auth()->user()->id;
        $question->name = auth()->user()->name;
        $question->ProfileImage = auth()->user()->ProfileImage;
        $question->save();

        return redirect('/questionbank')->with('success', 'Question Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $question = DB::select("select * from question_banks where id = '$id' ");

        // return view('questionbank.show')->with('post', $question);

        $count = QuestionBank::find($id);
        $count->viewCount = $count->viewCount + 1;
        $count->save();


        $post = QuestionBank::find($id);

        return view('questionbank.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = QuestionBank::find($id);

        //check for correct user
        if (auth()->user()->id != $question->user_id) {

            return redirect('/questionbank')->with('error', 'Unauthorized Page');
        }


        return view('questionbank.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'title' => 'required',
            'level' => 'required',
            'subject' => 'required',
            'body' => 'required',


        ]);

        //update question
        $question =  QuestionBank::find($id);
        $question->title = $request->input('title');
        $question->level = $request->input('level');
        $question->subject = $request->input('subject');
        $question->body = $request->input('body');
        $question->user_id = auth()->user()->id;
        $question->name = auth()->user()->name;
        $question->ProfileImage = auth()->user()->ProfileImage;
        $question->save();

        return redirect('/questionbank/' . $id)->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $question = QuestionBank::find($id);

        //check for correct user
        if (auth()->user()->id != $question->user_id) {

            return redirect('/questionbank')->with('error', 'Unauthorized Page');
        }

        $question->delete();
        return redirect('/questionbank')->with('success', 'Post Deleted');
    }


    public function search()
    {
        $comments = DB::select("select commentable_id,count(*) as count  from comments group by commentable_id");

        $questions =  DB::table('question_banks')->where('subject', 'Biology');



        $data = array(

            'questions' => $questions,
            'comments' => $comments,
        );


        return view('questionbank.index', compact('data'));
    }
}