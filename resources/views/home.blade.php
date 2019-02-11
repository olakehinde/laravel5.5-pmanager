@extends('layouts.app')

@section('content')
 <div class="register-full">
        <div class="register-left">
            <div class="register">
                <p>Collaborate on Projects that matter to you</p>
                <h1>PManager</h1>
                <h2>Best and most Intuitive Project Management App</h2>
                <p>Your Projects are now closer to you more than ever before. You can now manage all your Projects in one place</p>
                <div class="content3">
                    <ul>
                        <li><a href="{{ route('companies.create') }}">Register a Company</a></li>
                        <li><a class="read" href="{{ route('projects.create')}}">Create Project</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="register-right">
            @guest
                <div class="register-in">
                    <a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#register">register here »</a>
                </div>
                <div class="register-in">
                    <a class="book popup-with-zoom-anim button-isi zoomIn animated" data-wow-delay=".5s" href="#login">login here »</a>
                </div>
                <div class="clear"> </div>
            @else
                <div class="register-in">
                    <a class="book"href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidde n="true"></i> My Companies</a>
                </div>
                <div class="register-in middle">
                    <a class="book" href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Projects</a>
                </div>
                <div class="register-in">
                    <a class="book" href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a>
                </div> 

                <!-- check if signed-in user is an admin -->
                @if(Auth::user()->role_id === 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre><i class="fa fa-user" aria-hidden="true"></i> 
                            Admin
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
                            <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i> Companies</a></li>
                            <li><a href="{{ route('projects.index') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> Projects</a></li>
                            <li><a href="{{ route('tasks.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a></li>
                            <li><a href="{{ route('roles.index') }}"><i class="fa fa-role" aria-hidden="true"></i> Roles</a></li>
                        </ul>
                    </li>
                @endif
            @endguest
        </div>
    <div class="clear"> </div>
    </div>
@endsection





{{--
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}