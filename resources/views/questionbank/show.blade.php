@extends('layouts.app')

@section('content')

<section>


    <div class="row" style="margin: 10px 0px;">

        <div class="col-md-2"></div>


        <div class="col-md-8">

            @foreach($data['question'] as $post)

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="color: rgb(76,73,73);margin: 0px ;padding: 0px;">{{$post->title}}</h4>
                    <p style="font-size: 12px;">Asked&nbsp; {{$post->created_at}}</p>
                    <hr>
                    <p class="card-text">
                        {!!$post->body!!}
                    </p>
                    <a class="card-link" href="#">{{$post->subject}}</a>
                    <a class="card-link" href="#">{{$post->level}}</a></div>
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
                    <form><textarea class="form-control" style="margin: 10px;"></textarea><button class="btn btn-primary" type="button">Button</button></form>
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