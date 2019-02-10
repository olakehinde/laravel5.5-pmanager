@extends('layouts.app')
@section('content')
    <div class="container mt-5">
		<div class="row pb-1">
			<div class="col text-white"><i class="fa fa-list"></i> My Projects</div>
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