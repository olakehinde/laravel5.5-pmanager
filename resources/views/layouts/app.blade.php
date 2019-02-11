<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Project Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<title>{{ config('app.name', 'PManager') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/fa-css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/webfonts/all.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <script type="text/javascript" src="https://use.fontawesome.com/874dbadbd7.js"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //custom-theme -->

<!-- Google fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- Google fonts -->

<!-- css files -->
<link href="{{asset('project/css/style.css')}}" type="text/css" rel="stylesheet" media="all">   
<!-- //css files -->

<link rel="stylesheet" href="{{asset('project/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->

<link href="{{asset('project/css/popup-box.css')}}" rel="stylesheet" type="text/css" media="all" /> <!-- popup box css -->

</head>

<!-- body starts -->
<body>
<!-- section -->
<section class="register">
    <div class="header">
        <div class="logo">
            <!-- <a href="/home">PManager</a> -->
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'PManager') }}
            </a>
        </div>
        <div class="social">
            @guest
            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre><i class="fa fa-user" aria-hidden="true"></i> 
                        {{ Auth::user()->name }} 
                    </a>

                    <ul class="dropdown-menu">
                        <li >
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div> 
        <div class="clear"></div>
    </div> 

   <div class="container">
        @include('partials.errors')
        @include('partials.success')
        <div class="row">
            @yield('content')
        </div>
    </div>
    
    <!-- copyright -->
    <p class="agile-copyright">Copyright &copy; <script>document.write(new Date().getFullYear());</script>. All Rights Reserved | Designed with <i class="fa fa-heart-o"></i> by <a href="https://github.com/olakehinde">Olamide</a></p>
    <!-- //copyright -->
</section>
<!-- //section -->



<!-- login form popup -->
<div class="pop-up"> 
    <div id="login" class="mfp-hide book-form">

        <div class="login-form login-form-left"> 
            <div class="agile-row">
                <h3>Login</h3>
                <span class="fa fa-lock"></span>
                <div class="clear"></div>
                <div class="login-agileits-top">    
                    <form action="{{ route('login') }}" method="POST"> 
                        {{ csrf_field() }}
                        <input type="text" class="email" name="email" Placeholder="Enter your E-mail" required="" autofocus="" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    
                        <input type="password" id="password" class="password" name="password" Placeholder="Enter your Password" required=""/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <input type="submit" value="Login">
                    </form>     
                </div> 
                <div class="login-agileits-bottom"> 
                    <h6><a href="{{ route('password.request') }}">Forgot password?</a></h6>
                </div> 
            </div>  
        </div> 
        
    </div>  
</div>
<!-- //login form popup-->

<!-- register form popup-->
<div class="pop-up"> 
    <div id="register" class="mfp-hide book-form">
    
        <div class="login-form login-form-left"> 
            <div class="agile-row">
                <h3>Register form</h3>
                <div class="login-agileits-top">    
                    <form action="{{ route('register') }}" method="post"> 
                        {{ csrf_field() }}
                        <input type="text" class="name" name="name" value="{{ old('name') }}" Placeholder="Full Name" required=""/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <input type="email" class="email" value="{{ old('email') }}" name="email" Placeholder="Email" required=""/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <input type="password" class="password" name="password" Placeholder="Password" required=""/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                        <input type="password" class="password" id="password-confirm" name="password_confirmation" Placeholder="Confirm Password" required=""/>

                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> I Accept to the <a href="#">Terms &amp; Conditions</a></label>
                        </div>
                        <input type="submit" value="Register"> 
                    </form>     
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- //register form popup-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- js -->
<script type="text/javascript" src="{{asset('project/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->

<!--popup-js-->
<script src="{{asset('project/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
 <script>
    $(document).ready(function() {
    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
                                                                    
    });
</script>
<!--//popup-js-->

</body> 
<!-- //body ends -->
</html>
