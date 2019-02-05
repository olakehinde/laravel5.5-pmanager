@extends('layouts.app')

@section('content')


    <div class="content3">
        <ul>
            <li><a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#login">login here »</a></li>
        </ul>
    </div>

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

{{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
