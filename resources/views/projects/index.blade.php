@extends('layouts.app')
@section('content')
	{{--<div class="col-md-6-offset-3 col-lg-6 col-lg-offest-3 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading panel-primary">Project <a class="btn btn-success pull-right btn-sm" href="/projects/create">Add new Project</a></div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($projects as $project)
					<li class="list-group-item"><a href="/projects/{{$project->id}}">{{ $project->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>--}}

	<div class="container mt-5">
		<div class="row pb-1">
			<div class="col">My Projects</div>
			<div class="col"><a class="btn btn-success pull-right btn-sm" href="/projects/create"><i class="fa fa-plus"></i> Add new Project</a></div>
		</div>
        @if(!$projects)
        	<p>You have no Projects yet.</p>
        @endif

        
        <div class="card-deck">
        	@foreach($projects as $project)
            <div class="card mx-1">
            	<a href="/projects/{{$project->id}}">
                <div class="card-body px-2">
                    <h1 class="card-title" style="font-weight: bold; font-size: 15px;">{{ $project->name }}</h1>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text"><span style="font-weight: bold">Start date:</span> {{ $project->created_at }}</p>
                    <p class="card-text"><span style="font-weight: bold">Duration:</span>
                    	@if(!$project->days)
                    		Not available.
                    	@else
                    		{{ $project->days }} days.
                    	@endif
                    </p>
                </div></a>
            </div>
        	@endforeach
        </div>
    </div>
@endsection