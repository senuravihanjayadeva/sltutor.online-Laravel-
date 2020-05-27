@extends('layouts.app')

@section('content')

<div class="highlight-blue" style="margin: 0px 0px 10px 0px;">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">SLTUTOR</h2>
            <p class="text-center"><br><br>It is important to know that when you tutor a child, you are preparing him or her for the life ahead of them. Everything you teach them is critical to the person they become.<br><br></p>
        </div>
        <div class="buttons"><a class="btn btn-info active" role="button" href="https://www.facebook.com/SLtutorcom-424551631428759" target="_blank"><i class="fa fa-facebook-square" style="font-size: 16px;"></i>&nbsp;Connect with facebook</a></div>
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
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->created_at}}<br></p>
                    <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->subject}}</h4>
                    <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->fullName}}<br></h4>
                    <h6 class="text-muted card-subtitle mb-2" style="font-family: ABeeZee, sans-serif;">Sinhala Medium,English Medium<br></h6>
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">Private(Individual) Class,Group Class<br></p>
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">District -&gt;&nbsp;{{$post->district}}<br></p>
                <p class="card-text" style="font-family: Aclonica, sans-serif;color: rgb(49,50,50);font-size: 20px;margin: 5px 0px;">Rs.{{$post->price}}<br></p>
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;"><br>{!! $post->description !!}<br><br></p>

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

<section  style="padding: 20px;">

    <div class="row">
        <div class="col" style="padding: 25px;">
            <hr>
            <h1 class="text-center" style="color: rgb(74,79,84);font-family: ABeeZee, sans-serif;">Related Teachers</h1>
            <p class="text-center" style="color: rgb(7,67,81);">A good teacher can inspire hope, ignite the imagination, and instill a love of learning. Brad Henry<br></p>
        </div>
    </div>

    <div class="row" style="padding: 10px;">

         <!--************************************************************************
                                        Posts
           *************************************************************************-->

           @if(count($data['posts']) > 0)
           
           @foreach($data['posts'] as $post)
                  
            <a href="/posts/{{$post->id}}">
                <div class="col-md-3 text-justify d-xl-flex justify-content-xl-center align-items-xl-start" style="padding: 5px;">
                <div  id="teacherPostDiv" class="card" style="overflow: hidden;">


                <div class="card border-white" data-bs-hover-animate="pulse" style="background-color: rgb(255,255,255);/*overflow: hidden;*/">

                <img id="post_Image_Show" class="img-fluid card-img w-100 d-block " src="/storage/cover_images/{{$post->cover_image}}" style="overflow: hidden;">
                                            
                <div class="card-img-overlay" style="padding: 0px;">
                 <h4 class="d-xl-flex justify-content-xl-start align-items-xl-start" style="margin: 0px;background-color: rgba(34,119,94,0.78);padding: 5px;font-size: 15px;color: rgb(235,235,235);">{{$post->subject}}</h4>

                </div>

                </div>

                <div class="card-body text-center" style="padding: 10px;">

                    <a class="card-link status" href="/posts/{{$post->id}}">
                    <div class="overlay"></div>
                    </a>

                    <h5 class="card-title" style="margin: 0px 0px 2px 0px;font-size: 14px;">{{$post->fullName}}</h5>

                    <h6 id="postPrice" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 5px 0px 2px 0px;">{{$post->price}} LKR</h6>

                    <h6 id="postDistrict" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 2px 0px 2px 0px;">{{$post->district}}</h6>

                                       

                    <hr>

                                            
                    <a id="viewButton"  href="/posts/{{$post->id}}"><button class="btn btn-info btn-sm" data-bs-hover-animate="pulse" type="button">View</button></a>
                                          

                    <h6 id="viewTimeago" class="text-muted card-subtitle mb-2" style="font-size: 10px;margin: 2px 0px 2px 0px;">{{$post->created_at->diffForHumans()}}</h6>

                                       

                     </div>
                </div>
             </div>
          </a>
                            
        @endforeach
       @endif

         <!--************************************************************************
                         End of Posts
             *************************************************************************-->

    </div>
</section>



@endsection