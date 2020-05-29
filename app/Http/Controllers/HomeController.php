<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $userPosts = $user->posts;
        $userQuestions = $user->questions;
        $SortPosts = $userPosts->sortByDesc('id');

        //all posts
        $posts = Post::all();

        $data = array(
            'userQuestions' => $userQuestions->sortByDesc('id'),
            'userPosts' => $userPosts->sortByDesc('id')
        );

        return view('home', compact('data'));
    }
}