@extends('layouts.app')

@section('content')

<div class="highlight-blue" style="margin: 0px 0px 10px 0px;">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">SLTUTOR</h2>
            <p class="text-center"><br><br>It is important to know that when you tutor a child, you are preparing him or her for the life ahead of them. Everything you teach them is critical to the person they become.<br><br></p>
        </div>
        <div class="buttons"><a class="btn btn-info active" role="button" href="https://www.facebook.com/SLtutorcom-424551631428759" target="_blank"><i class="fa fa-facebook-square" style="font-size: 16px;"></i>&nbsp;Connect with facebook</a></div>
    </div>
</div>
<hr class="d-xl-flex align-self-center mx-auto" style="height: 1px;background-color: #4a4747;width: 75%;">

<a class="btn btn-default d-flex d-xl-flex justify-content-center justify-content-xl-center" href="/pastpapers" style="margin:5px; padding: 10px; border:none; ouline:none;">Go Back</a>

<div class="row justify-content-center">

<div class="col-sm-12 col-md-2">
    <section>


        <div class="row">


            <div class="col-md-12" style="margin: 5px 0px;padding: 0px;">
                <div class="card text-center">
                    <div class="card-body text-center" style="margin: 0px 10px;padding: 20px;">
                       
   
        
                        <span  style="font-size:13px" class="d-xl-flex justify-content-xl-start ">Recent Past Papers</span>
                        

                       
                        <div class="float-left float-md-right mt-5 mt-md-0 search-area"></div>
                        @foreach($data['papers'] as $papers)
                        <hr>
                        <a href="/pastpapers/{{$papers->id}}">
                        <h6 class="text-muted" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif; text-align:left;" >{{$papers->school}} {{$papers->subject}}</h6>

                        <h6 class="text-muted " style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif; text-align:left;"> {{$papers->year}} {{$papers->grade}} {{$papers->term}} Test Paper <i class="far fa-eye"></i> {{$papers->viewCount}} </h6>
    

                        <h6 class="text-muted d-xl-flex justify-content-xl-start card-subtitle mb-2" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;"> {{$papers->created_at}}  </h6>

                        </a>
                       
                        @endforeach
                 
                    </div>
                </div>
            </div>


        </div>


    </section>
</div>

<div class="col-sm-12 col-md-6">

<section>
    <div class="row justify-content-center">

       
       
        @foreach($data['paper'] as $post)
            
      

        <div class="col-sm-12 col-md-12">
            <center>
            <img class="img-fluid d-flex d-md-flex pulse animated" src="/storage/cover_images/{{$post->cover_image}}" >
            </center>
        </div>
        
        <div class="row">

        <div class="col-md-1">
            <!--Empty-->
        </div>

        <div class="col-md-12">
            <div class="card border-white">
                <div class="card-body">
                <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">{{$post->created_at}} |  <i class="far fa-eye"></i> {{$post->viewCount}} <br></p>
                
                <hr>
                
                <h4 class="card-title" style="color: rgb(39,39,39);padding: 0px;">{{$post->subject}}</h4><br>
                
                    <h6 class="text-muted card-subtitle mb-2" style="font-family: ABeeZee, sans-serif;">{{$post->school}} <br></h6>
                  
                    <p class="card-text" style="font-family: ABeeZee, sans-serif;color: rgb(136,137,137);margin: 5px 0px;">   {{$post->year}}     {{$post->grade}} {{$post->term}} Test Paper<br></p>
                   
                    <a  href="{{$post->link}}" target="_blank"><button class="btn btn-info btn-sm" data-bs-hover-animate="pulse" type="button">Download</button></a>

  


                </div>
            </div>
        </div>

        <div class="col-md-1">
         <!--Empty-->
        </div>

        </div>

        @endforeach


   
      

    </div>
</section>

</div>

<div class="col-sm-12 col-md-2">

    <section>


        <div class="row">


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
                        <h6 class="text-muted" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;  text-align:left;">{{$question->subject}}</h6>

                        <h6 class="text-muted" style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;  text-align:left;">{{$question->title}}  </h6>

                        <!-- Count no of comments for each Question-->
                        <?php $countComments = 0 ?>
                        @foreach($data['comments'] as $comments)

                        @if( $comments->commentable_id ==  $question->id)
       
                        <?php $countComments = $countComments + 1 ?> 
        
                        @endif

                        @endforeach

                        <h6 class="text-muted " style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;  text-align:left;"><?php echo $countComments; ?>  answers |    <i class="far fa-eye"></i>  {{$question->viewCount}}</h6>
                        <!-- End of Count no of comments for each Question-->

                        <h6 class="text-muted " style="padding: 2px 2px 0px 2px;font-family: ABeeZee, sans-serif;  text-align:left;"> {{$question->created_at}}  </h6>

                        </a>
                       
                        @endforeach
                 
                    </div>
                </div>
            </div>


        </div>


    </section>


</div>

</div>

@endsection