<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; //FOR Auth Class
use App\PastPaper;
use App\Post;


use DB;

class PastPapersController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $PastPapers = PastPaper::all();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check for admin
        if (!(Auth::guard('admin')->user())) {

            return redirect('/login')->with('error', 'Unauthorized Page');
        }

        return view('PastPapers.create');
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

            'year' => 'required',
            'school' => 'required',
            'subject' => 'required',
            'grade' => 'required',
            'term' => 'required',
            'cover_image' => 'image|nullable',
            'link' => 'required',
            'medium' => 'required',
            'level' => 'required',


        ]);

        //Handel file Upload

        //handle the file upload
        if ($request->hasFile('cover_image')) {

            //get file name with extensions
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET the ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Create Post
        $paper = new PastPaper;

        $paper->year = $request->input('year');
        $paper->school = $request->input('school');
        $paper->subject = $request->input('subject');
        $paper->grade = $request->input('grade');
        $paper->term = $request->input('term');
        $paper->cover_image = $fileNameToStore;
        $paper->link = $request->input('link');
        $paper->medium = $request->input('medium');
        $paper->level = $request->input('level');
        $paper->save();

        return redirect('/admin')->with('success', 'Paper Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $count = PastPaper::find($id);
        $count->viewCount = $count->viewCount + 1;
        $count->save();


        $paper = DB::select("select * from past_papers where id = '$id' ");

        $papers = PastPaper::all()->take(4); //limit 4 posts 

        $data = array(

            'papers' => $papers->sortByDesc('id'),
            'paper' => $paper,
        );


        return view('PastPapers.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $papers = PastPaper::find($id);

        //check for admin
        if (!(Auth::guard('admin')->user())) {

            return redirect('/login')->with('error', 'Unauthorized Page');
        }


        return view('PastPapers.edit')->with('papers', $papers);
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

            'year' => 'required',
            'school' => 'required',
            'subject' => 'required',
            'grade' => 'required',
            'term' => 'required',
            'cover_image' => 'image|nullable',
            'link' => 'required',
            'medium' => 'required',
            'level' => 'required',


        ]);

        //Handel file Upload

        //handle the file upload
        if ($request->hasFile('cover_image')) {

            //get file name with extensions
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET the ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Update Post
        $paper = PastPaper::find($id);

        $paper->year = $request->input('year');
        $paper->school = $request->input('school');
        $paper->subject = $request->input('subject');
        $paper->grade = $request->input('grade');
        $paper->term = $request->input('term');

        if ($request->hasFile('cover_image')) {
            $paper->cover_image = $fileNameToStore;
        }

        $paper->link = $request->input('link');
        $paper->medium = $request->input('medium');
        $paper->level = $request->input('level');
        $paper->save();

        return redirect('/admin')->with('success', 'Paper Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check for admin
        if (!(Auth::guard('admin')->user())) {

            return redirect('/login')->with('error', 'Unauthorized Page');
        }


        $paper = PastPaper::find($id);

        if ($paper->cover_image != 'noimage.jpg') {

            Storage::delete('public/cover_images/' . $paper->cover_image);
        }

        $paper->delete();
        return redirect('/admin')->with('success', 'Paper Deleted');
    }
}