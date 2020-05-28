<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Storage; //connect with storage
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $profileDetails = User::find($id);

        //check for correct user
        if ((auth()->user()->id) != $id) {

            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('user.edituserprofile')->with('profileDetails', $profileDetails);
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

            'name' => 'required',
            'email' => 'required',
            'ProfileImage' => 'image|nullable',

        ]);

        //Handel file Upload

        //handle the file upload
        if ($request->hasFile('ProfileImage')) {

            //get file name with extensions
            $filenameWithExt = $request->file('ProfileImage')->getClientOriginalName();
            //get just File Name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //GET the ext
            $extension = $request->file('ProfileImage')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('ProfileImage')->storeAs('public/ProfileImage', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post
        $user =  User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('ProfileImage')) {
            $user->ProfileImage = $fileNameToStore;
        }

        $user->save();

        return redirect('/home')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        //check for correct user
        if (auth()->user()->id != $id) {

            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if ($user->ProfileImage != null) {

            Storage::delete('public/ProfileImage/' . $user->ProfileImage);
        }

        $user->delete();
        return redirect('/posts')->with('success', 'User Deleted');
    }
}