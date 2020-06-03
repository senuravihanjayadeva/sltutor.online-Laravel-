
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="images" href="/storage/assets/img/logo.png">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="/storage/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
        <link rel="stylesheet" href="/storage/assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="/storage/assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="/storage/assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="/storage/assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="/storage/assets/css/Article-List.css">
        <link rel="stylesheet" href="/storage/assets/css/best-carousel-slide.css">
        <link rel="stylesheet" href="/storage/assets/css/Bold-BS4-CSS-Image-Slider.css">
        <link rel="stylesheet" href="/storage/assets/css/Bootstrap-Payment-Form.css">
        <link rel="stylesheet" href="/storage/assets/css/Features-Boxed.css">
        <link rel="stylesheet" href="/storage/assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="/storage/assets/css/Header-Blue.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
        <link rel="stylesheet" href="/storage/assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="/storage/assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="/storage/assets/css/Registration-Form-with-Photo.css">
        <link rel="stylesheet" href="/storage/assets/css/Search-Input-Responsive-with-Icon.css">
        <link rel="stylesheet" href="/storage/assets/css/Search-Input-responsive.css">
        <link rel="stylesheet" href="/storage/assets/css/Simple-Slider.css">
        <link rel="stylesheet" href="/storage/assets/css/Simple-Vertical-Navigation-Menu-v-10.css">
        <link rel="stylesheet" href="/storage/assets/css/styles.css">
        <link rel="stylesheet" href="/storage/assets/css/Team-Boxed.css">
        <link rel="stylesheet" href="/storage/assets/css/Header-Blue.css">
        <link rel="stylesheet" href="/storage/assets/css/Highlight-Blue.css">
        <link rel="stylesheet" href="/storage/assets/css/Highlight-Phone.css">
        <link rel="stylesheet" href="/storage/assets/css/Profile-Edit-Form-1.css">
        <link rel="stylesheet" href="/storage/assets/css/Profile-Edit-Form.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <title>{{config('app.name','SLTUTOR')}}</title>
 
    </head>
    <body>
      
        <div id="page-container">

        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="/">SLTUTOR</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">

                        @guest

                        <!--<li class="nav-item" role="presentation"><a class="nav-link" href="/home">Profile</a></li>-->

                        @else
                        
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/home">Profile</a></li>

                        @endguest
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/posts">Find Teachers</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/posts/create">Promote ur Tuition </a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/questionbank">Question Bank</a></li>
                       
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/pastpapers">PastPapers</a></li>
                         <!--
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#">Notes</a></li>
                        -->

                    </ul>
                    <span class="navbar-text actions"> 
                    <!-- Authentication Links -->
                    @guest
                    <a class="login" href="{{ route('login') }}">Log In</a>
                    @if (Route::has('register'))
                    <a class="btn btn-light action-button" role="button" href="{{ route('register') }}">Sign Up</a>
                    @endif
                    @else
                    <a class="login" href="/home"> {{ Auth::user()->name }} </a>
                    <a class="btn btn-light action-button" role="button" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                    </form>
                    @endguest
                    </span>
                </div>
            </div>
        </nav>

        <!--**
            **
            Content
                    **
                    **-->
                
                @yield('content');    
        
        <!--**
            **
            End of Content
                    **
                    **-->


        <div id="footer" class="footer-dark" >
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Services</h3>
                            <ul>
                                <li><a href="/posts">Find Teachers</a></li>
                                <li><a href="#">Find Past Papers</a></li>
                                <li><a href="#">Ask Questions</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li><a href="#">Company</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 item text">
                            <h3>HEXAGON DEVELOPERS</h3>
                            <p>Before software can be reusable it first has to be usable</p>
                        </div>
                        <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                    </div>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </footer>
        </div>

        <script src="/storage/assets/js/jquery.min.js"></script>
        <script src="/storage/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/storage/assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="/storage/assets/js/Simple-Slider.js"></script>
        <!--<script src="/storage/assets/js/Profile-Edit-Form.js"></script>-->
  
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>


        </div>
    </body>
</html>
