@extends('layouts.app')

@section('content')

<section>


    <div class="row" style="margin: 10px 0px;">

        <div class="col-md-2"></div>


        <div class="col-md-8">

                  <!--For display error message or success messages-->

                  @include('inc.messages')

            @foreach($data['question'] as $post)

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color: rgb(76,73,73);margin: 0px ;padding: 0px;">{{$post->title}}</h4>
                    <p style="font-size: 12px;">Asked&nbsp; {{$post->created_at}} by {{$post->name}}  </p>
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

            @endforeach

        </div>


        <div class="col-md-2"></div>

    </div>


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h6>Your Answer</h6>

                    {!! Form::open(['action' => 'QuestionBankController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}


                        <div class="form-group">
                
                            <strong> 
                                {{ Form::label('body','Body') }}
                            </strong>
                            {{ Form::textarea('body','',['id'=>'summary-ckeditor','class' => 'form-control']) }}
                
                            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor', {
                                    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                    filebrowserUploadMethod: 'form'
                                });
                            </script>
                            
                        
                        </div>
                      
                        <div class="form-row">

                            <div class="col-md-12 content-right">
                                
                                {{Form::submit('ADD YOUR ANSWER',['class' => 'btn btn-primary form-btn'] )}}
                
                                <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
                            
                            </div>
                
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <section>
                <hr>
                <p>Answers</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link" href="#">Edit</a><a class="card-link"
                                    href="#">Delete</a>
                                <p>Answered&nbsp;8 hours ago by Senura Vihan<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col"></div>
        <div class="col-md-2"></div>
    </div>
</section>

@endsection