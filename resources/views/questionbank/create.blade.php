
@extends('layouts.app')

@section('content')

<hr>

<div class="contact-clean" style="padding: 20px">
   
    {!! Form::open(['action' => 'QuestionBankController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        <h2 class="text-center"><br>Ask a question<br><br></h2>
        
        <div class="form-group">
            <label style="font-size: 12px;"> ඔබගේ ප්‍රශ්නයට අදාලව පැහැදිලි මාතෘකාවක් යොදන්න Include a clear topic related to your question<br></label> <br>               
            <strong> 
                {{ Form::label('Title','Title') }}
            </strong>
            {{ Form::text('title','',['class' => 'form-control']) }}
            
        </div>

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
                    
                    {{ Form::radio('level', 'Ordinary Level',false,['onclick' => 'checkfunc(1)']) }}
                    <strong> 
                        {{ Form::label('level','Ordinary Level') }}
                    </strong>
                
                </div>
            </div>
        </div>

        <div class="form-group">
            
                       
            
            <div class="col-md-6" id="olsubblock" style="display: none" >

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
                
                ], null,['id' => 'olsub','class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}
            
            </div>

            <div class="col-md-6" id="alsubblock" style="display: none" >

                <strong> 
                    {{ Form::label('subject','Subject') }}
                </strong>   

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
                    
                    ], null,['id' => 'alsub','disabled'=>'true','class' => 'form-control' , 'placeholder' => 'Pick a subject...']) }}
                
                </div>
        
        </div>

           <label style="font-size: 12px;">
           
            ඔබේ ප්‍රශ්නයට පිළිතුරු දීමට යමෙකුට අවශ්‍ය සියලු තොරතුරු ඇතුළත් කරන්න Include all the information someone would need to answer your question<br></label>

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
                    
                    {{Form::submit('POST YOUR QUESTION',['class' => 'btn btn-primary form-btn'] )}}
    
                    <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
                
                </div>
    
            </div>

    
    {!! Form::close() !!}

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