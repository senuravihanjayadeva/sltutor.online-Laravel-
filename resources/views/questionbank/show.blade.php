@extends('layouts.app')

@section('content')

<hr>




<section>


    <div class="row" style="margin: 10px 0px;">

        <div class="col-md-2"></div>


        <div class="col-md-8">

            <div class="col-md-12" style="padding: 10px;">
                                                
                <a href="/questionbank/create" class="btn btn-info btn-sm">Ask Questions</a>
            
            </div>

                  <!--For display error message or success messages-->

                  @include('inc.messages')

      

            <div class="card">
                <div id="questionPost" class="card-body">
                    <h4 class="card-title" style="color: rgb(76,73,73);margin: 0px ;padding: 0px;">{{$post->title}}</h4>
                    <p style="font-size: 12px;">Asked on &nbsp; {{$post->created_at}} by {{$post->name}}  </p>
                    <hr>
                    <p class="card-text">
                        {!!$post->body!!}
                    </p>
                    <a class="card-link" href="#">{{$post->subject}}</a>
                    <a class="card-link" href="#">{{$post->level}}</a>
                
                    <hr>


                    @if(!Auth::guest())

                    @if(Auth::user()->id == $post->user_id)

                    <a class="card-link" href="/questionbank/{{$post->id}}/edit"><button class="btn btn-info btn-sm">Edit</button></a>


                 
                    {!!Form::open(['action' => ['QuestionBankController@destroy',$post->id], 'method' => 'POST' ]) !!}

                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Remove',['class' => 'btn btn-danger btn-sm', 'style' => 'margin:5px 0px;'])}}
                
                    {!!Form::close() !!}

                    @endif

                    @endif
                  
                
                
                </div>

                    <br>

                    
            </div>

            


        </div>


        <div class="col-md-2"></div>

    </div>


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card" style="border: white">
                <div class="card-body">

                    <hr> 

                    <h6>Answers</h6>


                    @comments(['model' => $post])

                    {!! Form::open(['action' => 'QuestionBankController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
         
                            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor', {
                                    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                    filebrowserUploadMethod: 'form'
                                });
                            </script>
                            
                        
            
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

</section>

@endsection