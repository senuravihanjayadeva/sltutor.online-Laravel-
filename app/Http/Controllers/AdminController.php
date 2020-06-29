<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravelista\Comments\Comment; //Comment Class
use App\User;
use App\Post;
use App\QuestionBank;
use App\Admin;
use App\PastPaper;
use DB;
use Illuminate\Support\Facades\Auth; //FOR Auth Class



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check for admin
        if (!(Auth::guard('admin')->user())) {

            return redirect('/login')->with('error', 'Unauthorized Page');
        }

        $users = User::all();
        $advertisements = Post::all();
        $questionBanks = QuestionBank::all();
        $pastpapers = PastPaper::all();
        $comments =  Comment::all();

        $data = array(
            'users' => $users->sortByDesc('id'),
            'advertisements' => $advertisements->sortByDesc('id'),
            'questionBanks' => $questionBanks->sortByDesc('id'),
            'pastpapers' => $pastpapers->sortByDesc('id'),
            'comments' =>  $comments->sortByDesc('id'),
        );

        return view('admin', compact('data'));
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