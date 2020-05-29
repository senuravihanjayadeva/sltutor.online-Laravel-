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
                                 
                                <!--For display error message or success messages-->

                                   

                                     <div class="card-body justify-content-center">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <center>

                                            

                                        <div class="row">

                                            @include('inc.messages')
                                            
                                            <div class="col-md-12" style="padding: 10px">
                                            <p>You are logged in!<p>
                                            </div>

                                            <div class="col-md-6" style="padding: 10px">
                                                
                                                <a href="/questionbank/create" class="btn btn-success">Ask Your Subject Question</a>

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

                <!--****************************************************************************
                    Radio Button
                    **************************************************************************-->
                
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('option', 'Question', true,['onclick' => 'checkfunc(0)']) }}
                        <strong> 
                            {{ Form::label('option','Question you Asked') }}
                        </strong>
                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('option', 'Advertisements',false,['onclick' => 'checkfunc(1)']) }}
                        <strong> 
                            {{ Form::label('option','Advertisements You Posted') }}
                        </strong>
                    
                    </div>
                </div>



           <!--***********************************************************************************--> 

            <div class="col-md-12" id="userQuestions" style="display: block">

            <!--****************************************************
                            User Questions
                ******************************************************-->
            @if(count($data['userQuestions']) > 0)
                @foreach($data['userQuestions']  as $userquestions)

                <div class="border col-md-12 rounded-0 border-info shadow" style="background-color: #ffffff; padding: 0px;">
       
           
                    <div class="row">
      
                      <div class="col-sm-12 col-md-3 d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" >
      
      
                        <div class="row d-xl-flex align-items-center align-content-center align-self-center justify-content-xl-center align-items-xl-center" style="padding: 5px;">
      
                          <div class="col text-center">
                            <h1 style="font-size: 15px;">20</h1>
                            <p style="font-size: 12px;">answers</p>
                          </div>
                          <div class="col text-center">
                            <h1 style="font-size: 15px;">10</h1>
                            <p style="font-size: 12px;">views</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-9">
                        <div class="card border-white">
                          <div
                            class="card-body border-white"
                            style="padding: 0px 20px;"
                          >
                            <a
                              class="card-link"
                              href="/questionbank/{{$userquestions->id}}"
                              style="
                                margin: 2px 0px;
                                padding: 5px 0px;
                                font-size: 20px;
                              "
                              >{{$userquestions->title}}</a
                            >
                            <h6
                              class="text-muted card-subtitle mb-2"
                              style="
                                font-size: 14px;
                                padding: 2px 0px;
                                margin: 2px 0px;
                              "
                            >
                            {{$userquestions->subject}}
                            </h6>
                            <h6
                              class="text-muted d-xl-flex card-subtitle mb-2"
                              style="font-size: 13px;"
                            >
                            {{$userquestions->level}}
                            </h6>
                            <p style="font-size: 12px;">{{$userquestions->created_at->diffForHumans()}}</p>
                          </div>
                        </div>
      
                      </div>
                  
                    </div>
      
                  </div>

                @endforeach
                @else 
                
                <div class="col-md-12" data-aos="slide-up" style="margin: 10px 0 px;">
                <center>
                <h3>There are no Questions</h3>
                <img width="300px" src="/storage/assets/img/wait.png" />
                </center>
                </div>
                @endif

                <!--****************************************************
                            End of User Questions
                ******************************************************-->

            </div>

            <!--***********************************************************************************--> 


            <div class="col-md-12" id="userAdvertisements" style="display: none;">
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

                                            <a class="dropdown-item btn btn-default btn-sm" role="presentation" href="/posts/{{$post->id}}/edit"><button class="btn btn-default btn-sm">Edit</button></a>

                                                <a class="dropdown-item" role="presentation" href="#">
                                                    
                                                    {!!Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST' ]) !!}

                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Remove',['class' => 'btn btn-default btn-sm'])}}
                
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

            <!--***********************************************************************************-->

            </div>
        </section>
    </div>
    <div class="col"></div>
</div>
</div>
</div>
</div>
</div>


<script>
    //java scipt for show and hide alsubject list and olsubject list
    function checkfunc(x)
    {
        if( x == 0)
        {
            document.getElementById("userQuestions").style.display = 'block';
            document.getElementById("userAdvertisements").style.display = 'none';
            document.getElementById("olsub").disabled= TRUE;
        }
        if (x == 1)
        {
            document.getElementById("userQuestions").style.display = 'none';
            document.getElementById("userAdvertisements").style.display = 'block';
      
        }
    }
    
    </script>



@endsection
