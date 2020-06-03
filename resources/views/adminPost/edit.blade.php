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
    
  

    {!! Form::open(['action' => ['AdminPostsController@update',$post->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

    <div class="form-row profile-row">
        <div class="col-md-4 relative">

            <div class="avatar">
                <div class="center"><img width="300px" src="/storage/assets/img/wait.png" /></div>
            </div>
            
        </div>
        <div class="col-md-8">
            <h1>Edit User Post</h1>
            <hr>
            <div class="form-row">

                <strong> 
                {{ Form::label('user_id','User ID') }}
                </strong>
                {{ Form::text('user_id',$post->user_id,['class' => 'form-control','readonly']) }}


                <div class="col-sm-12 col-md-6">

                    <div class="form-group">
                        
                        <strong> 
                            {{ Form::label('fullName','Full Name') }}
                        </strong>
                        {{ Form::text('fullName',$post->fullName,['class' => 'form-control']) }}
                        
                    </div>

                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        <strong> 
                            {{ Form::label('Occupation','Occupation') }}
                        </strong>
                        {{ Form::text('Occupation',$post->Occupation,['class' => 'form-control']) }}
                    
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        <strong>
                            {{ Form::label('Qualification','Qualification') }}
                        </strong>
                        {{ Form::text('Qualification',$post->Qualification,['class' => 'form-control']) }}
                    
                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        <strong> 
                            {{ Form::label('age','Age') }}
                        </strong>
                        {{ Form::text('age',$post->age,['class' => 'form-control']) }}
                    
                    </div>
                </div>
            </div>

            @if($post->level == 'Advanced Level' )

            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('level', 'Advanced Level',true,['onclick' => 'checkfunc(0)']) }}
                        <strong> 
                            {{ Form::label('level','Advanced Level') }}
                        </strong>
                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('level', 'Ordinary Level',false,['onclick' => 'checkfunc(1)']) }}
                        <strong> 
                            {{ Form::label('level','Ordinary Level') }}
                        </strong>
                    
                    </div>
                </div>
            </div>

            @else

            <div class="form-row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('level', 'Advanced Level',false,['onclick' => 'checkfunc(0)']) }}
                        <strong> 
                            {{ Form::label('level','Advanced Level') }}
                        </strong>
                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        
                        {{ Form::radio('level', 'Ordinary Level',true,['onclick' => 'checkfunc(1)']) }}
                        <strong> 
                            {{ Form::label('level','Ordinary Level') }}
                        </strong>
                    
                    </div>
                </div>
            </div>

            @endif

            <div class="form-group">

                <strong> 
                    {{ Form::label('subject','Subject') }}
                </strong>  
            
            
            <div class="col-md-12" id="olsubblock">

            {{ Form::select('subject', [

                'Maths' => 'Maths', 
                'Science' => 'Science', 
                'History' => 'History', 
                'Sinhala' => 'Sinhala', 
                'English' => 'English', 
                'Buddhism' => 'Buddhism', 
                'Information & Communication Technology' => 'Information & Communication Technology', 
                'Geography' => 'Geography',
                'Music' => 'Music', 
                'Art' => 'Art', 
                'Dancing' => 'Dancing', 
                'Health & Physical Education' => 'Health & Physical Education',
                
                ], $post->subject ,['id' => 'olsub','class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}
              
            </div>

             
            
            <div class="col-md-12" id="alsubblock" style="display:none;">

            {{ Form::select('subject', [


                  
                'Combined Maths' => 'Combined Maths', 
                'Biology' => 'Biology', 
                'Physics' => 'Physics', 
                'Chemistry' => 'Chemistry',
                'Agriculture' => 'Agriculture', 
                'A/L ICT' => 'A/L ICT', 
                'Business Studies' => 'Business Studies', 
                'Economics' => 'Economics', 
                'Accounting' => 'Accounting',
                'A/L Sinhala' => 'A/L Sinhala', 
                'Political Science' => 'Political Science',
                'Buddist Civilization' => 'Buddist Civilization', 
                'A/L Geography' => 'A/L Geography', 
                'Engineering Technology' => 'Engineering Technology',
                'Bio Systems Technology' => 'Bio Systems Technology', 
                'Science for Technology' => 'Science for Technology', 
                'General English' => 'General English',
                'Logic' => 'Logic',
                
              

                ], $post->subject,['id' => 'alsub','disabled'=>'true','class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}

            </div>

           

       
            
            </div>

            <div class="form-group">
                
                <strong> 
                    {{ Form::label('gender','Gender') }}
                </strong>
           
                {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female' ], $post->gender,['class' => 'form-control' , 'placeholder' => 'Pick Gender...']) }}
            
            </div>

        <div class="form-group">
            
            <strong> 
                {{ Form::label('description','Description') }}
            </strong>
            {{ Form::textarea('description',$post->description,['id'=>'summary-ckeditor','class' => 'form-control']) }}

            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace( 'summary-ckeditor', {
                    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            </script>
            
        
        </div>

        <div class="form-row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                
                <strong> 
                    {{ Form::label('email','Email') }}
                </strong>
                {{ Form::text('email',$post->email,['class' => 'form-control']) }}
            
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">

                <strong> 
                    {{ Form::label('mobile','Mobile') }}
                </strong>
                {{ Form::text('mobile',$post->mobile,['class' => 'form-control']) }}
            
            </div>
        </div>
    </div>
    <hr>
    <div class="form-row">
        <div class="col-sm-12 col-md-6">

            <div class="form-group">
                
                <strong> 
                    {{ Form::label('district','District') }}
                </strong>                 
                
                
                {{ Form::select('district', 
                    
                [

                'Ampara' => 'Ampara', 
                'Anuradhapura' => 'Anuradhapura', 
                'Badulla' => 'Badulla',
                'Batticaloa' => 'Batticaloa', 
                'Colombo' => 'Colombo', 
                'Galle' => 'Galle',
                'Gampaha' => 'Gampaha', 
                'Hambantota' => 'Hambantota', 
                'Jaffna' => 'Jaffna',
                'Kalutara' => 'Kalutara',
                'Kandy' => 'Kandy', 
                'Kegalle' => 'Kegalle', 
                'Kilinochchi' => 'Kilinochchi',
                'Kurunegala' => 'Kurunegala',
                'Mannar' => 'Mannar', 
                'Matale' => 'Matale', 
                'Matara' => 'Matara',
                'Monaragala' => 'Monaragala', 
                'Mullaitivu' => 'Mullaitivu', 
                'Nuwara Eliya' => 'Nuwara Eliya',
                'Polonnaruwa' => 'Polonnaruwa', 
                'Puttalam' => 'Puttalam', 
                'Ratnapura' => 'Ratnapura',
                'Trincomalee' => 'Trincomalee',
                'Vavuniya' => 'Vavuniya'
                
                
                ], $post->district ,['class' => 'form-control' , 'placeholder' => 'Pick Your District...']) }}
            
            </div>

        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                
                <strong> 
                    {{ Form::label('town','Town') }}
                </strong>
                {{ Form::text('town',$post->town,['class' => 'form-control']) }}
            
            </div>
        </div>
    </div>

    <div class="form-group">
        
        <strong> 
            {{ Form::label('medium','Medium') }}
        </strong> 

        {{ Form::text('medium',$post->medium,['class' => 'form-control','placeholder' => 'Sinhala Medium , English Medium , Tamil Medium']) }} 
            
    </div>

    <div class="form-group">
        
        <strong> 
            {{ Form::label('tutiontype','Tuition Type') }}
        </strong> 

        {{ Form::text('tutiontype',$post->tutiontype,['class' => 'form-control','placeholder' => 'Individual , Group, Other']) }} 
            
    </div>

    <div class="form-group">
        
        <strong> 
            {{ Form::label('price','Price') }}
        </strong> 
        {{ Form::text('price',$post->price,['class' => 'form-control']) }} LKR
    
    </div>

    <div class="form-group">
        
        <strong> 
            {{ Form::label('cover_image','Cover Image') }}
        </strong> 
        {{ Form::file('cover_image') }} 
    
    </div>

    {{Form::hidden('_method', 'PUT')}}

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


<script>
    //java scipt for show and hide alsubject list and olsubject list
    function checkfunc(x)
    {
        if( x == 0)
        {
            document.getElementById("alsubblock").style.display = 'block';
            document.getElementById("olsubblock").style.display = 'none';
            document.getElementById("alsub").disabled= false;
            
        }
        if (x == 1)
        {
            document.getElementById("alsubblock").style.display = 'none';
            document.getElementById("olsubblock").style.display = 'block';
            document.getElementById("alsub").disabled= true;
      
        }
    }
    
    </script>


@endsection