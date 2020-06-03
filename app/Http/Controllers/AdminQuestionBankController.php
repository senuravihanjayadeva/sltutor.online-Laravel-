<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\QuestionBank;
use App\Post;
use DB;


class AdminQuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('adminQuestionBank.edit')->with('question', $question);
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
        $question->user_id = $request->input('user_id');
        $question->name = $request->input('name');
        $question->ProfileImage =  $request->input('ProfileImage');;
        $question->save();

        return redirect('admin')->with('success', 'Question Updated');
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

        $question->delete();
        return redirect('/admin')->with('success', 'Question Deleted');
    }
}