@extends('layouts.app')

@section('content')

        <section id="carousel">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item">
                        <div class="jumbotron pulse animated hero-nature carousel-hero">
                            <h1 class="hero-title">SLTUTOR</h1>
                            <p class="hero-subtitle">Education is the passport to the future</p>
                            <p><a class="btn btn-primary hero-button plat" role="button" href="/questionbank">Learn more</a></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="jumbotron pulse animated hero-photography carousel-hero">
                            <h1 class="hero-title">SLTUTOR</h1>
                            <p class="hero-subtitle">An investment in knowledge pays the best interest</p>
                            <p><a class="btn btn-primary hero-button plat" role="button" href="/questionbank">Learn more</a></p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="jumbotron pulse animated hero-technology carousel-hero">
                            <h1 class="hero-title">SLTUTOR</h1>
                            <p class="hero-subtitle">FIND THE BEST TUTOR FOR YOUR LEARNING GOALS</p>
                            <p><a class="btn btn-primary hero-button plat" role="button" href="/questionbank">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
                <ol
                    class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
                    </ol>
            </div>
        </section>
        <br>
        <div style="margin: 5px;">
            <div class="container text-center" style="background-color: #ffffff;">
                <div class="row text-left justify-content-around">

                    <div class="col-md-8 offset-md-1 text-left" style="margin: 5px 0px 0px 10px;padding: 0px;">
                        <div class="card text-left d-xl-flex justify-content-xl-start m-auto" style="max-width: 850px;margin: 0px;">
                            <div class="card-body" style="font-size: 10px;padding: 0px;margin: 5px;">
                                
                                {{-- <!--search bar-->
                                <form action="/searchpapers" method="POST" role="search" class="d-flex align-items-center" style="font-size: 10px;">
                                    {{ csrf_field() }}
                                    <i class="fas fa-search shadow-sm d-none d-sm-block h4 text-body m-0" style="font-size: 20px;"></i>
                                    
                                    <input name="search" class="form-control form-control-lg flex-shrink-1 form-control-borderless" type="search" placeholder="Search keywords ( year, grade, school )" style="font-size: 15px;">
                                        
                                        <button class="btn btn-success btn-lg" type="submit" style="font-size: 15px;">Search</button>
                                    </form>
                                    <!--end of search bar--> --}}

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
              
                <form action="/searchpapers" method="POST" role="search">
                  {{ csrf_field() }}
                  <div class="input-group">
                      
                  <select name="subject" style="margin: 5px; font-size:14px; padding:5px;">
                  <option selected value="Select Subject" disabled>Select Subject</option>
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
                         
                     
               <select name="grade" style="margin: 5px; font-size:14px; padding:5px;">
                <option selected value="Select Subject" disabled>Select Grade</option>
                <option value="Grade 12">Grade 12</option>
                <option value="Grade 13">Grade 13</option>
               </select>

               <select name="term" style="margin: 5px; font-size:14px; padding:5px;">
                <option selected value="Select Subject" disabled>Select Term</option>
                <option value="1st Term">1st Term</option>
                <option value="2nd Term">2nd Term</option>
                <option value="3rd Term">3rd Term</option>
               </select>
    
                 
                  <button type="submit" class="btn btn-sm btn-outline-info text-center" style="margin: auto; font-size:14px;">
                        <span class="glyphicon glyphicon-search ">Search</span>
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
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                 <!--For display error message or success messages-->

                 @include('inc.messages');

                <div class="row justify-content-center">
                    <div class="col-auto col-md-8 pulse animated">
                        

                        <section>
                           <div class="row d-flex justify-content-start">

                            <!--************************************************************************
                                        Posts
                                *************************************************************************-->

                                @if(count($data['PastPapers']) > 0)

                                @foreach($data['PastPapers'] as $PastPaper)
                                <a href="/pastpapers/{{$PastPaper->id}}">
                                <div class="col-md-4 text-justify d-xl-flex justify-content-xl-center align-items-xl-start" style="padding: 5px;">
                                    <div  id="teacherPostDiv" class="card" style="overflow: hidden;">


                                        <div class="card border-white" data-bs-hover-animate="pulse" style="background-color: rgb(255,255,255);/*overflow: hidden;*/">

                                        <img id="post_Image" class="img-fluid card-img w-100 d-block " src="/storage/cover_images/{{$PastPaper->cover_image}}" style="overflow: hidden;">
                                            
                                            <div class="card-img-overlay" style="padding: 0px;">
                                                <h4 class="d-xl-flex justify-content-xl-start align-items-xl-start" style="margin: 0px;background-color: rgba(34,119,94,0.78);padding: 5px;font-size: 15px;color: rgb(235,235,235);">{{$PastPaper->subject}}</h4>

                                            </div>

                                        </div>

                                        <div class="card-body text-center" style="padding: 10px;">

                                            <a class="card-link status" href="/pastpapers/{{$PastPaper->id}}">
                                                <div class="overlay"></div>
                                            </a>

                                            <h5 class="card-title" style="margin: 0px 0px 2px 0px;font-size: 14px;">{{$PastPaper->school}}</h5>

                                            <h6 id="postPrice" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 5px 0px 2px 0px;">{{$PastPaper->year}} {{$PastPaper->grade}} {{$PastPaper->term}}</h6>

                                            <h6 id="postPrice" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 5px 0px 2px 0px;">{{$PastPaper->medium}}</h6>

                                            <hr>

                                            
                                            <a id="viewButton"  href="/pastpapers/{{$PastPaper->id}}" ><button class="btn btn-info btn-sm" data-bs-hover-animate="pulse" type="button">View</button></a>
                                          

                                            <h6 id="viewTimeago" class="text-muted card-subtitle mb-2" style="font-size: 10px;margin: 2px 0px 2px 0px;">{{$PastPaper->created_at->diffForHumans()}} |  <i class="far fa-eye"></i> {{$PastPaper->viewCount}}</h6>

                                       

                                        </div>
                                    </div>
                                </div>
                                </a>
                                @endforeach  

                                @else 
                                <!--if there are no posts-->
                                
                                   <div class="row">
                                    
                                        <div class="col-md-12">
                                        <center>
                                        <h4 style="color: black" class="text-center">No Papers Yet</h4>
                                        <img width="300px" src="/storage/assets/img/wait.png">
                                        </center>
                                        </div>
                                    
                                   </div>
                                
                                @endif

                                <!--************************************************************************
                                       End of Posts
                                *************************************************************************-->

                            </div>
                        </section>

                        <!--***********************************************************
                                    Pagination
                            ***********************************************************-->

                        <div class="row">
                            <div class="col-md-12 d-xl-flex justify-content-xl-center">
                                
                            </div>
                        </div>
                        
                        <!--***********************************************************
                                    End of Pagination
                        ***********************************************************-->
                 
                    </div>

                    <div class="col-auto col-md-4 pulse animated">

                        <!--Count Number of Papers Section-->
                        <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                            <div class="card text-center">
                                <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                                   
                                       
                        
                                        <!-- Number of ALL Papers-->
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">{{count($data['PastPapersCount'])}} Papers</h6>
                                         <!-- Number of ALL Papers-->

                                        <!-- Number of AL Papers-->
                                        <?php $countALPapers = 0 ?>
                                        @foreach($data['PastPapersCount'] as $AdvencedLevelPapers)

                                            @if($AdvencedLevelPapers->level == 'Advanced Level' )

                                            <?php  $countALPapers = $countALPapers + 1; ?>

                                            @endif

                                        @endforeach

                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"> 
                                        <?php echo $countALPapers ?> Advanced Level Papers
                                        </h6>
                                       <!--End of  Number of AL Papers-->

                                       <!-- Number of AL Papers-->
                                       <?php $countOLPapers = 0 ?>
                                       @foreach($data['PastPapersCount'] as $OrdinaryLevelPapers)
                
                                            @if($OrdinaryLevelPapers->level == 'Ordinary Level' )
                                                <?php  $countOLPapers = $countOLPapers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countOLPapers ?> Ordinary Level Papers 
                                        </h6>
                                        <!--End of  Number of AL Papers-->
                             
                                         <!-- Number of Combined Maths Papers-->
                                       <?php $countCombinedMathsPapers = 0 ?>
                                       @foreach($data['PastPapersCount'] as $CombinedMaths)
                
                                            @if($CombinedMaths->subject == 'Combined Maths' )
                                                <?php  $countCombinedMathsPapers = $countCombinedMathsPapers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countCombinedMathsPapers ?> Combined Maths
                                        </h6>
                                        <!--End of  Number of  Combined Maths Papers-->

                                        <!-- Number of Biology Papers-->
                                       <?php $countBiologyPapers = 0 ?>
                                       @foreach($data['PastPapersCount'] as $Biology)
                
                                            @if($Biology->subject == 'Biology' )
                                                <?php  $countBiologyPapers = $countBiologyPapers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countBiologyPapers ?> Biology
                                        </h6>
                                        <!--End of  Number of Biology Papers-->

                                        <!-- Number of Physics Papers-->
                                       <?php $countPhysicsPapers = 0 ?>
                                       @foreach($data['PastPapersCount'] as $Physics)
                
                                            @if($Physics->subject == 'Physics' )
                                                <?php  $countPhysicsPapers = $countPhysicsPapers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countPhysicsPapers ?> Physics
                                        </h6>
                                        <!--End of  Number of Physics Papers-->

                                        <!-- Number of Chemistry Papers-->
                                       <?php $countChemistryPapers = 0 ?>
                                       @foreach($data['PastPapersCount'] as $Chemistry)
                
                                            @if($Chemistry->subject == 'Chemistry' )
                                                <?php  $countChemistryPapers = $countChemistryPapers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countChemistryPapers ?> Chemistry
                                        </h6>
                                        <!--End of  Number of Chemistry Papers-->


                                </div>
                            </div>
                        </div>
                        <!--End Count Number of Papers Section-->

                        <!-- Recent Question Section-->
                        <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                            <div class="card text-center">
                                <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                                   
                                       
                                  
                                            
                                    <a href="/questionbank/create" class="btn btn-info btn-sm">Ask Questions</a>
                                    
                                  <hr>
                              
                                    <h5 class="d-xl-flex justify-content-xl-start card-title" style="font-family: Baloo, cursive;">Question Bank  <br></h5> 

                                    <span  style="font-size:13px" class="d-xl-flex justify-content-xl-start ">Recent questions</span>

                                   
                                    <div class="float-left float-md-right mt-5 mt-md-0 search-area"></div>
                                    @foreach($data['questions'] as $question)
                                    <hr>
                                    <a href="/questionbank/{{$question->id}}">
                                    <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">{{$question->subject}}</h6>

                                    <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">{{$question->title}}  </h6>

                                    <!-- Count no of comments for each Question-->
                                    <?php $countComments = 0 ?>
                                    @foreach($data['comments'] as $comments)

                                    @if( $comments->commentable_id ==  $question->id)
                   
                                    <?php $countComments = $countComments + 1 ?> 
                    
                                    @endif

                                    @endforeach

                                    <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"><?php echo $countComments; ?>  answers |     <i class="fas fa-eye shadow-sm  d-sm-block h4 text-body m-0" style="padding:2px;font-size: 15px; background-color:none"></i> {{$question->viewCount}}</h6>
                                    <!-- End of Count no of comments for each Question-->

                                    <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"> {{$question->created_at}}  </h6>

                                    </a>
                                   
                                    @endforeach
                             
                                </div>
                            </div>
                        </div>
                        <!--End of Recent Question Section-->


                        <!--Facebook Page-->
                        <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                            <div class="card text-center">
                                <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                                    
                                    
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSLtutorcom-424551631428759&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

                                </div>
                            </div>
                        </div>
                        <!--End of Facebook Page-->


                    </div>

        


                </div>
            </div>
        </div>


@endsection