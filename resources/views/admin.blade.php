@extends('layouts.adminapp')

@section('content')

<hr>


<div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <div class="card border-white">
                    <div class="card-body text-center border-white">
                        
                       

                        @if(Auth::guard('admin')->user()->ProfileImage)

                        <img class="rounded-circle img-fluid" src="/storage/ProfileImage{{ Auth::guard('admin')->user()->ProfileImage }}" style="padding: 20px;">

                        @else
    
                        <img class="rounded-circle img-fluid border d-flex mx-auto" data-bs-hover-animate="pulse" src="/storage/ProfileImage/noimage.jpg" width="150px" height="150px">
    
                        @endif

                        <p class="card-text" style="font-size: 14px;">Senura Vihan Jaydeva</p><a class="card-link" href="#" style="font-size: 14px;">Edit</a><a class="card-link" href="#" style="font-size: 14px;">Delete</a></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 text-center align-self-center">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-xl-flex align-self-center" style="padding: 10px;">
                        <div class="card"><img class="card-img w-100 d-block" src="/storage/assets/img/users.png">
                            <div class="card-img-overlay"><a href=""><button class="btn btn-info" type="button">Manage Users</button></a></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 align-self-center" style="padding: 10px;">
                        <div class="card"><img class="img-fluid card-img w-100 d-block" src="/storage/assets/img/wait.png">
                            <div class="card-img-overlay"><a href=""><button class="btn btn-info" type="button">Manage Tuition Advertisements</button></a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 align-self-center">
                        <div class="card"><img class="card-img w-100 d-block" src="/storage/assets/img/questionqa.png">
                            <div class="card-img-overlay"><a href=""><button class="btn btn-info" type="button">Manage Question Bank</button></a></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6" style="padding: 10px;">
                        <div class="card"><img class="card-img w-100 d-block" src="/storage/assets/img/papers.png">
                            <div class="card-img-overlay"><a href=""><button class="btn btn-info" type="button">Manage Past Papers</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection