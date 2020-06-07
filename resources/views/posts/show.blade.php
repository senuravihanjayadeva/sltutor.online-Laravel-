@extends('layouts.app')

@section('content')

<div class="highlight-blue" style="margin: 0px 0px 10px 0px;">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">SLTUTOR</h2>
            <p class="text-center"><br><br>It is important to know that when you tutor a child, you are preparing him or her for the life ahead of them. Everything you teach them is critical to the person they become.<br><br></p>
        </div>
        <div class="buttons"><a class="btn btn-info active" role="button" href="https://www.facebook.com/SLtutorcom-424551631428759" target="_blank">Connect with facebook</a></div>
    </div>
</div>
<hr class="d-xl-flex align-self-center mx-auto" style="height: 1px;background-color: #4a4747;width: 75%;">

<a class="btn btn-default d-flex d-xl-flex justify-content-center justify-content-xl-center" href="/posts" style="margin:5px; padding: 10px; border:none; ouline:none;">Go Back</a>

<section>
    <div class="row justify-content-center">

       
       
        @foreach($data['userPost'] as $post)
            
      

        <div class="col-sm-12 col-md-4">
            
            <img class="img-fluid d-flex d-md-flex pulse animated" src="/storage/cover_images/{{$post->cover_image}}" >
        
        </div>
        
        <div class="col-md-6">
            <div class="card border-white">
                <div class="card-body">
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->created_at}} |  <i class="far fa-eye"></i> {{$post->viewCount}}<br></p>
                    <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->subject}}</h4>
                    <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->fullName}}<br></h4>
                    <h6 class="text-muted card-subtitle mb-2" style="font-family: ABeeZee, sans-serif;">{{$post->medium}}<br></h6>
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->tutiontype}}<br></p>
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->district}} -&gt;&nbsp;{{$post->town}}<br></p>
                <p class="card-text" style="font-family: Aclonica, sans-serif;color: rgb(49,50,50);font-size: 20px;margin: 5px 0px;">Rs.{{$post->price}}</p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{!! $post->description !!}</p>

                <!--**********************************-->

                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(50,54,54);margin: 5px 0px;">Qualifications : {{$post->Qualification}}<br></p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(50,54,54);margin: 5px 0px;">Occupation : {{$post->Occupation}}<br></p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(50,54,54);margin: 5px 0px;">Age : {{$post->age}}<br></p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(50,54,54);margin: 5px 0px;">Contact : {{$post->mobile}}<br></p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(50,54,54);margin: 5px 0px;">Email : {{$post->email}}<br></p>

                @if(!Auth::guest())

                @if(Auth::user()->id == $post->user_id)
                <div class="btn-group" role="group">
                <a href="/posts/{{$post->id}}/edit" style="margin: 5px"><button class="btn btn-info" type="button">Edit</button></a>
                
                {!!Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST' ]) !!}

                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Remove',['class' => 'btn btn-danger','style' => 'margin:5px'])}}
            
                {!!Form::close() !!}
                </div>

                @endif

                @endif


                </div>
            </div>
        </div>

        @endforeach
   
      

    </div>
</section>





@endsection