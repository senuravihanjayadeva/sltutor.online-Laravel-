@extends('layouts.app')

@section('content')

<div class="highlight-phone">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="intro">
                    <h2>SLTUTOR</h2>
                    <p><br>Students are unique. They may go to the same school and be in the same grade as other students, but they do not think or learn alike. Be willing to change the way you teach sometimes so the student can learn in the best way
                        for him<br><br></p><a class="btn btn-primary" role="button" href="/questionbank">Join with us</a></div>
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

    
@include('inc.messages')

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
    
  

    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        <div class="form-row profile-row">
            <div class="col-md-4 relative">

                <div class="avatar">
                    <div class="center"><img width="300px" src="/storage/assets/img/wait.png" /></div>
                </div>
                
            </div>
            <div class="col-md-8">
                <h1>Create Your Advertisement</h1>
                <hr>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                            
                            <strong> 
                                {{ Form::label('fullName','Full Name') }}
                            </strong>
                            <span style="color: red">
                                *required
                            </span>
                            {{ Form::text('fullName','',['class' => 'form-control']) }}
                            
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            
                            <strong> 
                                {{ Form::label('Occupation','Occupation') }}
                            </strong>
                            <span style="color: red">
                                *required
                            </span>
                            {{ Form::text('Occupation','',['class' => 'form-control']) }}
                        
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            
                            <strong>
                                {{ Form::label('Qualification','Qualification') }}
                            </strong>
                            <span style="color: red">
                                *required
                            </span>
                            {{ Form::text('Qualification','',['class' => 'form-control']) }}
                        
                        
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            
                            <strong> 
                                {{ Form::label('age','Age') }}
                            </strong>
                            <span style="color: red">
                                *required
                            </span>
                            {{ Form::number('age','',['class' => 'form-control']) }}
                        
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                    <span style="color: red">
                        *required
                    </span>
                    </div>
                 
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
                            
                            {{ Form::radio('level', 'Ordinary Level',false,['onclick' => 'checkfunc(1)']) }}
                            <strong> 
                                {{ Form::label('level','Ordinary Level') }}
                            </strong>
                           
                        
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    
                               
                    
                    <div class="col-md-6">

                    <strong> 
                        {{ Form::label('subject','Subject') }}
                    </strong>  
                    <span style="color: red">
                        *required
                    </span> 

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
    
                            ], null,['id' => 'alsub','class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}
                        
                        </div>
                
                </div>

                <div class="form-group">
                    
                    <strong> 
                        {{ Form::label('gender','Gender') }}
                    </strong>
                    <span style="color: red">
                        *required
                    </span>
               
                    {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female' ], null,['class' => 'form-control' , 'placeholder' => 'Pick Gender...']) }}
                
                </div>

            <div class="form-group">
                
                <strong> 
                    {{ Form::label('description','Description') }}
                </strong>
       
                <label style="font-size: 12px;">
           
                
                   <span style="font-size: 14px; color:red; font-weight: bold">Image upload කිරීමට  <i class="fas fa-image" style="font-size: 20px;"></i> icon -> upload -> choose file -> send it to the server ->  ok </span>
                   </label>

                {{ Form::textarea('description','',['id'=>'summary-ckeditor','class' => 'form-control']) }}

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
                    {{ Form::email('email','',['class' => 'form-control']) }}
                
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group">

                    <strong> 
                        {{ Form::label('mobile','Mobile') }}
                    </strong>
                    {{ Form::tel('mobile','',['class' => 'form-control']) }}
                
                </div>
            </div>
        </div>
       
        <div class="form-row">
            <div class="col-sm-12 col-md-6">

                <div class="form-group">
                    
                    <strong> 
                        {{ Form::label('district','District') }}
                    </strong>                 
                    <span style="color: red">
                        *required
                    </span>
                    
                    {{ Form::select('district', [

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
                    
                    
                    ], null,['class' => 'form-control' , 'placeholder' => 'Pick Your District...']) }}
                
                </div>

            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    
                    <strong> 
                        {{ Form::label('town','Town') }}
                    </strong>
                    <span style="color: red">
                        *required
                    </span>
                    {{ Form::text('town','',['class' => 'form-control']) }}
                
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-sm-12 col-md-6">

            <div class="form-group">
            
                <strong> 
                    {{ Form::label('medium','Language') }}
                </strong>
                <span style="color: red">
                    *required
                </span>
                 <br>  

            {{ Form::checkbox('medium[]', 'Sinhala Medium') }}
           
                {{ Form::label('medium','Sinhala Medium') }}
            <br>

            {{ Form::checkbox('medium[]', 'English Medium') }}
            
                {{ Form::label('medium','English Medium') }}
            <br>

            {{ Form::checkbox('medium[]', 'Tamil Medium') }}
            
                {{ Form::label('medium','Tamil Medium') }}
            <br>
                
            </div>

         </div>

         <div class="col-sm-12 col-md-6">

        <div class="form-group">
            
            <strong> 
                {{ Form::label('tuitiontype','Tuition Type') }}
            </strong>  <span style="color: red">
                *required
            </span>
              <br>

            {{ Form::checkbox('tutiontype[]', 'Individual') }}
           
                {{ Form::label('tutiontype','Individual') }}
            <br>

            {{ Form::checkbox('tutiontype[]', 'Group') }}
          
                {{ Form::label('tutiontype','Group') }}
          <br>

            {{ Form::checkbox('tutiontype[]', 'Other') }}
           
                {{ Form::label('tutiontype','Other') }}
           <br>

        </div>

        </div>
        </div>

        <div class="form-group">
            
            <strong> 
                {{ Form::label('price','Tuition Fee') }}
            </strong> 
            <span style="color: red">
                *required
            </span>
            {{ Form::number('price','',['class' => 'form-control']) }} LKR
        
        </div>

        <div class="form-group">
            
            <strong> 
                {{ Form::label('cover_image','Cover Image( Optional | max - 2MB )') }}
            </strong> 
            {{ Form::file('cover_image') }} 
        
        </div>

        <div class="form-row">

            <div class="col-md-12 content-right">
                
                {{Form::submit('CREATE',['class' => 'btn btn-primary form-btn'] )}}

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