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
                        <div class="card text-left d-xl-flex justify-content-xl-start m-auto" style="max-width: 850px;margin: 0px; border:0px solid white">
                            <div class="card-body" style="font-size: 10px;padding: 0px;margin: 5px;">

                               
                                {{-- <form action="/searchposts" method="POST" role="search" class="d-flex align-items-center" style="font-size: 10px;">
                                    {{ csrf_field() }}

                                   
                                
                                    <i class="fas fa-search shadow-sm d-none d-sm-block h4 text-body m-0" style="font-size: 20px;"></i>
                                    <input  id="tags" class="form-control form-control-lg flex-shrink-1 form-control-borderless" type="search"
                                     placeholder="Search topics or keywords" name="search" style="font-size: 15px;">

                                  
                                   
                                    <button class="btn btn-success btn-lg" type="submit" style="font-size: 15px;">Search</button>

                                </form> --}}

                                <!--Make sure the form has the autocomplete function switched off:-->
                                <form autocomplete="off" action="/searchposts" method="POST" class="d-flex align-items-center">

                                {{ csrf_field() }}

                                <div class="autocomplete" style="width:100%;">
                                    
                                
                                <input id="myInput" type="text" class="form-control form-control-lg flex-shrink-1 form-control" name="search" placeholder="Search topics or keywords" style="font-size: 15px;">
                                </div>

                                <button class="btn btn-success btn-lg" type="submit" style="font-size: 15px; background:rgba(11, 138, 131, 0.78);">Search</button>
                                </form>

                           
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

                                @if(count($data['posts']) > 0)

                                @foreach($data['posts'] as $post)
                                <a href="/posts/{{$post->id}}">
                                <div class="col-lg-4 col-md-6 text-justify d-xl-flex justify-content-xl-center align-items-xl-start" style="padding: 5px;">
                                    <div  id="teacherPostDiv" class="card" style="overflow: hidden;">


                                        <div class="card border-white" data-bs-hover-animate="pulse" style="background-color: rgb(255,255,255);/*overflow: hidden;*/">

                                        <img id="post_Image" class="img-fluid card-img w-100 d-block " src="/storage/cover_images/{{$post->cover_image}}" style="overflow: hidden;">
                                            
                                            <div class="card-img-overlay" style="padding: 0px;">
                                                <h4 class="d-xl-flex justify-content-xl-start align-items-xl-start" style="margin: 0px;background-color: rgba(34,119,94,0.78);padding: 5px;font-size: 15px;color: rgb(235,235,235);">{{$post->subject}}</h4>

                                            </div>

                                        </div>

                                        <div class="card-body text-center" style="padding: 10px;">

                                            <a class="card-link status" href="/posts/{{$post->id}}">
                                                <div class="overlay"></div>
                                            </a>

                                            <h5 class="card-title" style="margin: 0px 0px 2px 0px;font-size: 14px;">{{$post->fullName}}</h5>

                                            <h6 id="postPrice" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 5px 0px 2px 0px;">{{$post->price}} LKR</h6>

                                            <h6 id="postDistrict" class="text-muted card-subtitle mb-2" style="font-size: 12px;margin: 2px 0px 2px 0px;">{{$post->district}}</h6>

                                       

                                            <hr>

                                            
                                            <a id="viewButton"  href="/posts/{{$post->id}}"><button class="btn btn-info btn-sm" data-bs-hover-animate="pulse" type="button">View</button></a>
                                          

                                            <h6 id="viewTimeago" class="text-muted card-subtitle mb-2" style="font-size: 10px;margin: 2px 0px 2px 0px;">{{$post->created_at->diffForHumans()}}</h6>

                                       

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
                                        <h4 style="color: black" class="text-center">No posts Yet</h4>
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
                            
                                  {{ $data['posts']->links() }} 
                               
                                </div>
                            </div>

                        <!--***********************************************************
                                    End of Pagination
                        ***********************************************************-->

      
                 
                    </div>

                    <div class="col-auto col-md-4">
                        <div class="row">

                            <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                                <div class="card text-center">
                                    <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
       
                                        <!-- Number of ALL teacher-->
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">{{count($data['postCount'])}} Teachers</h6>
                                         <!-- Number of ALL teacher-->

                                        <!-- Number of AL teacher-->
                                        <?php $countALTeachers = 0 ?>
                                        @foreach($data['postCount'] as $AdvencedLevelTeachers)

                                            @if($AdvencedLevelTeachers->level == 'Advanced Level' )

                                            <?php  $countALTeachers = $countALTeachers + 1; ?>

                                            @endif

                                        @endforeach

                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"> 
                                        <?php echo $countALTeachers ?> Advanced Level Teachers 
                                        </h6>
                                       <!--End of  Number of AL teacher-->

                                       <!-- Number of AL teacher-->
                                       <?php $countOLTeachers = 0 ?>
                                       @foreach($data['postCount'] as $OrdinaryLevelTeachers)
                
                                            @if($OrdinaryLevelTeachers->level == 'Ordinary Level' )
                                                <?php  $countOLTeachers = $countOLTeachers + 1; ?>
                                            @endif

                                        @endforeach
                
                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;">
                                        
                                            <?php echo $countOLTeachers ?> Ordinary Level Teachers 
                                        </h6>
                                        <!--End of  Number of AL teacher-->
                                   
                                 
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                                <div class="card text-center">
                                    <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                                       
                                           
                                      
                                                
                                        <a href="/questionbank/create" class="btn btn-info btn-sm">Ask Questions</a>
                                        
                                      <hr>
                                  
                                        <h5 class="d-xl-flex justify-content-xl-start card-title" style="font-family: Baloo, cursive;">
                                            Question Bank  <br>
                                        
                                        </h5> 
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

                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"><?php echo $countComments; ?>  answers |&nbsp<i class="far fa-eye"></i>&nbsp{{$question->viewCount}}</h6>
                                        <!-- End of Count no of comments for each Question-->

                                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"> {{$question->created_at}}  </h6>

                                        </a>
                                       
                                        @endforeach
                                 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                                <div class="card text-center">
                                    <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                                        
                                        
                                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSLtutorcom-424551631428759&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>


        


                </div>
            </div>
        </div>

<!-- Auto Complete -->
<script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }
    
    /*An array containing all the country names in the world:*/
    var countries = [
        
                'Maths', 
                'Science', 
                'History', 
                'Sinhala', 
                'English', 
                'Buddhism', 
                'Information & Communication Technology', 
                'Geography',
                'Music', 
                'Art', 
                'Dancing', 
                'Health & Physical Education',   
                'Combined Maths', 
                'Biology', 
                'Physics', 
                'Chemistry',
                'Agriculture', 
                'A/L ICT', 
                'Business Studies', 
                'Economics', 
                'Accounting',
                'A/L Sinhala', 
                'Political Science',
                'Buddist Civilization', 
                'A/L Geography', 
                'Engineering Technology',
                'Bio Systems Technology', 
                'Science for Technology', 
                'General English',
                'Logic',
        
        ];
    
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);
    </script>

@endsection