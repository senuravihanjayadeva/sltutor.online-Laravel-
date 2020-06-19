
@extends('layouts.adminapp')

@section('content')

<hr>

<div class="contact-clean" style="padding: 20px">
   
    {!! Form::open(['action' => ['AdminQuestionBankController@update',$question->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        <h2 class="text-center"><br>Edit  Question<br><br></h2>

        {{ Form::text('ProfileImage',$question->ProfileImage,['class' => 'form-control','readonly']) }}

        <div class="form-group">
                       
            <strong> 
                {{ Form::label('User ID','User ID') }}
            </strong>
            {{ Form::text('user_id',$question->user_id,['class' => 'form-control','readonly']) }}
            
        </div>

        <div class="form-group">
                       
            <strong> 
                {{ Form::label('User Name','User Name') }}
            </strong>
            {{ Form::text('name',$question->name,['class' => 'form-control','readonly']) }}
            
        </div>


        <div class="form-group">
            <label style="font-size: 12px;">Be specific and imagine you’re asking a question to another personn<br></label> <br>               
            <strong> 
                {{ Form::label('Title','Title') }}
            </strong>
            {{ Form::text('title',$question->title,['class' => 'form-control']) }}
            
        </div>

        @if( $question->level == 'Advanced Level' )

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
                    
                    ], $question->subject,['class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}
                
                
    



           <label style="font-size: 12px;">Include all the information someone would need to answer your question<br></label>

           <div class="form-group">
                
            <strong> 
                {{ Form::label('body','Body') }}
            </strong>
            {{ Form::textarea('body',$question->body,['id'=>'summary-ckeditor','class' => 'form-control']) }}

            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace( 'summary-ckeditor', {
                    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form'
                });
            </script>
            
        
            </div>
            
            {{Form::hidden('_method', 'PUT')}}

            <div class="form-row">

                <div class="col-md-12 content-right">
                    
                    {{Form::submit('Edit',['class' => 'btn btn-primary form-btn'] )}}
    
                    <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
                
                </div>
    
            </div>

    
    {!! Form::close() !!}

</div>



    

@endsection