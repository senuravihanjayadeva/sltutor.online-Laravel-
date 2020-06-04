@extends('layouts.app')

@section('content')

<div class="highlight-phone">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="intro">
                    <h2>SLTUTOR</h2>
                    <p><br>Students are unique. They may go to the same school and be in the same grade as other students, but they do not think or learn alike. Be willing to change the way you teach sometimes so the student can learn in the best way
                        for him<br><br></p><a class="btn btn-primary" role="button" href="#">Join with us</a></div>
            </div>
            <div class="col-sm-4">
                <div class="d-none d-md-block iphone-mockup"><img class="d-xl-flex device" src="/storage/assets/img/undraw_teaching_f1cm.svg"></div>
            </div>
        </div>
    </div>
</div>

<br>
<!--For display error message or success messages-->
<div class="container">

@include('inc.messages');

</div>


<div class="container profile profile-view" id="profile">
    <div class="row">
        <div class="col-md-12 alert-col relative">
            <div class="alert alert-info absolue center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span>Profile save with success</span></div>
        </div>
    </div>

    <!--**************************************************************************************
                                 Form
        ***********************************************************************************-->
    
  

    {!! Form::open(['action' => ['UserController@update',$profileDetails->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        <div class="form-row profile-row">
            <div class="col-md-4 relative">
                <div class="avatar">
                    <div class="center">

                        <img  width="300px" src="/storage/assets/img/wait.png"/>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h1>Edit User Profile</h1>
                <hr>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                            
                            <strong> 
                                {{ Form::label('name','Full Name') }}
                            </strong>
                            {{ Form::text('name',$profileDetails->name,['class' => 'form-control']) }}
                            
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            
                            <strong> 
                                {{ Form::label('email','Email') }}
                            </strong>
                            {{ Form::text('email',$profileDetails->email,['class' => 'form-control']) }}
                        
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            
                            <strong>
                                {{ Form::label('password','Reset Password') }}
                            </strong>
                            {{ Form::text('password','',['class' => 'form-control','placeholder' => 'Enter New Password']) }}
                        
                        
                        </div>
                    </div>
             
                </div>



          

        <div class="form-group">
            
            <strong> 
                {{ Form::label('ProfileImage','Profile Image( max -2mb )') }}
            </strong> 
            {{ Form::file('ProfileImage') }} 
        
        </div>


        {{Form::hidden('_method','PUT')}}

        <div class="form-row">

            <div class="col-md-12 content-right">
                
                {{Form::submit('EDIT',['class' => 'btn btn-primary form-btn'] )}}

                <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
            
            </div>

        </div>
</div>
</div>

{!! Form::close() !!}



 <!--**************************************************************************************
                                End of Form
    ***********************************************************************************-->
</div>


@endsection