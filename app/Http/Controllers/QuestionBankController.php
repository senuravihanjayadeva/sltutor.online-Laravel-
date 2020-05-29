<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\QuestionBank;
use DB;

class QuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions =  QuestionBank::orderBy('id', 'desc')->paginate(50); //add pagination
        return view('questionbank.index')->with('questions', $questions);
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
        $question = DB::select("select * from question_banks where id = '$id' ");

        $questions = QuestionBank::all()->take(4); //limit 4 posts 

        $data = array(

            'posts' => $questions->sortByDesc('id'),
            'question' => $question,
        );


        return view('questionbank.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}