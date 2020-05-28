@extends('layouts.app')

@section('content')

<div>
<div class="container">
<div class="row">
    <div class="col-md-2 d-xl-flex align-items-xl-start">
        <section>
            <div class="row">
                <div class="col-md-12 justify-content-between align-items-center align-self-center">
                    
                    @if(Auth::user()->ProfileImage)

                    <img class="rounded-circle img-fluid border d-flex mx-auto" data-bs-hover-animate="pulse" src="/storage/ProfileImage/{{ Auth::user()->ProfileImage }}" width="200px" height="200px">

                    @else

                    <img class="rounded-circle img-fluid border d-flex mx-auto" data-bs-hover-animate="pulse" src="/storage/ProfileImage/noimage.jpg" width="200px" height="200px">

                    @endif
                
                </div>
                <div class="col-md-12">
                    <div class="card border-white">
                        <div class="card-body">
                            <h6 class="text-center card-title">{{ Auth::user()->name }}</h6>
                            <h6 class="text-center text-muted card-subtitle mb-2" style="font-size: 12px;">{{ Auth::user()->email }}</h6>
                            <p class="card-text"></p>

                            <center>

                            <a href="user/{{ Auth::user()->id }}/edit"><button class="btn btn-info btn-sm">Edit Account</button></a><br><br>

                            
                            {!!Form::open(['action' => ['UserController@destroy',Auth::user()->id], 'method' => 'POST' ]) !!}

                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Remove',['class' => 'btn btn-danger','style' => 'margin:5px'])}}
                        
                            {!!Form::close() !!}
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-8">
        <section>
            <div class="row justify-content-center" style="background-color: #ffffff;">
                <div class="col-md-11" style="margin: 10px 0px 5px 0px;background-color: #ffffff;">
                   
    

                  
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                 
                    

                                     <div class="card-body justify-content-center">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <center>
                                        <div class="row">

                                            <div class="col-md-6" style="padding: 10px">
                                                You are logged in!
                                            </div>



                                            <div class="col-md-6" style="padding: 10px">
                                                <a href="/posts/create" class="btn btn-success">Create a Post</a>
                                            </div>

                                        </div>
                                        </center>
                              
                                    </div>
                                </div>
                            </div>
                        </div>
                   


                </div>


                <!--****************************************************
                            User Posts
                ******************************************************-->
            @if(count($data['userPosts']) > 0)
                @foreach($data['userPosts']  as $post)

                <div class="col-md-12" data-aos="slide-up" style="margin: 10px 0 px;">
                    <div class="border rounded-0 border-info shadow" style="background-color: #ffffff;padding: 10px; margin: 10px;">
                        <div class="row">

                            

                            <div class="col-md-4 d-xl-flex flex-fill align-self-center justify-content-xl-center align-items-xl-center">
                            <img class="img-fluid" data-bs-hover-animate="pulse" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>

                            <div class="col-md-8">
                                <div class="card border-white">
                                    <div class="card-body border-white">
                                        <div class="dropdown d-flex d-xl-flex justify-content-end justify-content-xl-end">


                                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="font-size: 12px;">
                                                <i class="fa fa-gear"></i>
                                            </button>

                                            <div class="dropdown-menu" role="menu">

                                            <a class="dropdown-item btn btn-info btn-sm" role="presentation" href="/posts/{{$post->id}}/edit"><button class="btn btn-info btn-sm">Edit</button></a>

                                                <a class="dropdown-item" role="presentation" href="#">
                                                    
                                                    {!!Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST' ]) !!}

                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm'])}}
                
                                                    {!!Form::close() !!}
                                                </a>
                                              
                                            </div>
                                        </div>

                                        <p class="card-text">
                                            {{$post->created_at->diffForHumans()}}
                                        </p>

                                        <h5 class="d-xl-flex justify-content-xl-start card-title" style="color: rgb(98,98,98);padding: 0px;font-size: 22px;">
                                            {{$post->subject}}
                                        </h5> 

                                        <h6 class="text-muted card-subtitle mb-2">{{$post->fullName}}</h6>

                                     
                                        <a href="/posts/{{$post->id}}"><button class="btn btn-primary btn-sm" type="button">View</button></a>
                                    
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @else 
                
                <div class="col-md-12" data-aos="slide-up" style="margin: 10px 0 px;">
                <center>
                <h3>There are no Posts</h3>
                <img width="300px" src="/storage/assets/img/wait.png" />
                </center>
                </div>
                @endif

                <!--****************************************************
                            End of User Posts
                ******************************************************-->

            </div>
        </section>
    </div>
    <div class="col"></div>
</div>
</div>
</div>
</div>
</div>




@endsection
