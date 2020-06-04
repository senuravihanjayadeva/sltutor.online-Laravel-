
@extends('layouts.app')

@section('content')
<hr>
<div class="row">
    <div class="col-md-2 d-xl-flex align-items-xl-start" style="margin: 25px 15px 0px ;">


      <section>
        <div class="row">

          <!--********************************
                      Coloum one
          *************************************-->
          <div class="col-md-12 text-center" style="margin: 15px;">

            <form action="/search" method="POST" role="search">
              {{ csrf_field() }}
              <div class="input-group">

              <input type="text" style = "width:100%" class="form-control" name="search"
                placeholder="Search By Title"> <span class="input-group-btn">

             <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
              </button>
              </span>
              </div>
          </form>


          </div>

          <!--********************************
                      Coloum two
          *************************************-->

          <div class="col-md-12 text-center" style="margin: 15px;">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">QUESTION BANK</h5>
                <p class="card-text">Main objective of SLTUTOR is to discuss your subject(A-Level, O-Level, Other ) related issues & find solutions to them</p>
              
              </div>
            </div>


          </div>

        </div>
      </section>


    </div>






  <div class="col-md-8">
      <section>

           <!--For display error message or success messages-->

            @include('inc.messages')


         <div class="row">
           
          <div
            class="col-md-6 d-xl-flex justify-content-xl-center align-items-xl-center"
          >
            <div class="card"></div>
            <center>
            <h3 style="margin: 5px 0px 2px 0px">Question Bank</h3>
          </center>
          </div>
       
          <div class="col-md-6">
            <div class="card border-white">
              <div class="card-body text-center">
                <a href="/questionbank/create">
                <button class="btn btn-primary btn-sm" type="button">
                  Ask&nbsp; Question
                </button>
                </a>
              </div>
            </div>
          </div>

        </div>

               <!--*
          **
          **
          ** Search Form
          **
          **
          **----->
        
          <div class="row" style="margin: 10px; padding:5px;">
          
            <div class="col-md-12 d-xl-flex justify-content-xl-center align-items-xl-center">
              <center>
                <form action="/search" method="POST" role="search">
                  {{ csrf_field() }}
                  <div class="input-group">
                      
                  <select name="search">
                  <option selected value="Select Subject">Select Subject</option>
                  <option disabled>---A/L Subject---</option>
                  <option value="Combined Maths">Combined Maths</option>
                  <option value="Biology">Biology</option>
                  <option value="Agriculture">Agriculture</option>
                  <option value="Physics">Physics</option>
                  <option value="Chemistry">Chemistry</option>
                  <option value="A/L ICT">A/L ICT</option> 
                  <option value="Business Studies">Business Studies</option>
                  <option value="Economics">Economics</option>
                  <option value="Accounting">Accounting</option>
                  <option value="A/L Sinhala">Sinhala</option>
                  <option value="Political Science">Political Science</option>
                  <option value="Buddist Civilization">Buddist Civilization</option>
                  <option value="A/L Geography">A/L Geography</option>
                  <option value="Engineering Technology">Engineering Technology</option>  
                  <option value="Bio Systems Technology">Bio Systems Technology</option>
                  <option value="Science for Technology">Science for Technology</option>
                  <option value="General English">General English</option>
                  <option value="Logic">Logic</option>
                      
                  <option disabled>---O/L Subjects---</option>
                  <option value="Maths">Maths</option>
                  <option value="Science">Science</option>
                  <option value="History">History</option>
                  <option value="Sinhala">Sinhala</option>
                  <option value="English">English</option>
                  <option value="Buddhism">Buddhism</option>
                  <option value="Information & Communication Technology">Information & Communication Technology</option>
                  <option value="Geography">Geography</option>
                  <option value="Music">Music</option>
                  <option value="Art">Art</option>
                  <option value="Dancing">Dancing</option>
                  <option value="Health & Physical Education">Health & Physical Education</option>
               </select>
                         
                     
    
    
    
                  <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search">Search</span>
                  </button>
                  </span>
                  </div>
              </form>
    
            </center>
            </div>
          
            </div>
          
    
              <!--*
              **
              **
              ** End of Search Form
              **
              **
              **----->


        <div class="row justify-content-center" style="background-color: #ffffff;">
          <div class="col-md-12"  style="margin: 10px 0 px; padding: -3px;">

        <!--****************************** Question Bank Grid****************************-->

        
        @if(count($data['questions']) > 0)

        <hr>
           
        @foreach($data['questions'] as $question)

          
            <div class="border rounded-0 border-info shadow" style="background-color: #ffffff; padding: 0px;">
       
           
              <div class="row">

                <div class="col-sm-12 col-md-3 d-md-flex d-lg-flex d-xl-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" >


                  <div class="row d-xl-flex align-items-center align-content-center align-self-center justify-content-xl-center align-items-xl-center" style="padding: 5px;">

                    <div class="col text-center">

                

                      @foreach($data['comments'] as $comments)

                        @if( $comments->commentable_id ==  $question->id)
                       
                        <h1 id="commentCount" style="font-size: 15px;">{{$comments->count}}</h1> 
                        
                        @endif

                      @endforeach

                      <p style="font-size: 12px;">answers</p>
                 
                      
                    </div>
                    <div class="col text-center">
                      <h1 style="font-size: 15px;">{{$question->viewCount}}</h1>
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
                        href="/questionbank/{{$question->id}}"
                        style="
                          margin: 2px 0px;
                          padding: 5px 0px;
                          font-size: 20px;
                        "
                        >{{$question->title}}</a
                      >
                      <h6
                        class="text-muted card-subtitle mb-2"
                        style="
                          font-size: 14px;
                          padding: 2px 0px;
                          margin: 2px 0px;
                        "
                      >
                      {{$question->subject}}
                      </h6>
                      <h6
                        class="text-muted d-xl-flex card-subtitle mb-2"
                        style="font-size: 13px;"
                      >
                      {{$question->level}}
                      </h6>
                      <p style="font-size: 12px;">{{$question->created_at->diffForHumans()}}</p>
                    </div>
                  </div>

                </div>
            
              </div>

            </div>

            @endforeach

            <!--If there are no questions-->
            @else 

            <div>
                      <center>
                      <hr>
                      <h4 style="color: black">No Questions Yet</h4>
                      <img width="300px" src="/storage/assets/img/wait.png">
                      </center>
            </div>

         @endif
         

            <!--******************************End of Question Bank Grid****************************-->

            <!--******************************Test Live Search*************************************-->
                  
            <!--******************************End of tesst Live Search*******************************-->
           
          </div>
        </div>
      </section>
    </div>
    <div class="col"></div>
  </div>
</div>
</div>

@endsection


