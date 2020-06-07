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

<a class="btn btn-default d-flex d-xl-flex justify-content-center justify-content-xl-center" href="/pastpapers" style="margin:5px; padding: 10px; border:none; ouline:none;">Go Back</a>

<section>
    <div class="row justify-content-center">

       
       
        @foreach($data['paper'] as $post)
            
      

        <div class="col-sm-12 col-md-4">
            <center>
            <img class="img-fluid d-flex d-md-flex pulse animated" src="/storage/cover_images/{{$post->cover_image}}" >
            </center>
        </div>
        
        <div class="col-md-6">
            <div class="card border-white">
                <div class="card-body">
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->created_at}} |  <i class="far fa-eye"></i> {{$post->viewCount}} <br></p>
                
                <hr>
                
                <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->subject}}</h4><br>
                
                    <h6 class="text-muted card-subtitle mb-2" style="font-family: ABeeZee, sans-serif;">{{$post->school}} <br></h6>
                  
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">   {{$post->year}}     {{$post->grade}} {{$post->term}} Test Paper<br></p>
                   
                    <a  href="{{$post->link}}" target="_blank"><button class="btn btn-info btn-sm" data-bs-hover-animate="pulse" type="button">Download</button></a>

  


                </div>
            </div>
        </div>

        @endforeach


   
      

    </div>
</section>





@endsection