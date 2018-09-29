@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="well-lg">
			<h1>{{$project->name}}</h1>
			<p class="lead">{{$project->description}}</p>
			<!-- <p><a class="btn btn-lg btn-success" href="#" role="button">view details</a></p> -->
		</div>

		<div class="row col-sm-12 col-md-12 col-lg-12" style="background-color: white; margin: 3px;">
			<a href="/projects/create" class="btn btn-success btn-sm pull-right">Add Project</a>
			<br>

			<div class="row container-fluid">
				<form method="post" action="{{ route('comments.store') }}">
					{{ csrf_field() }}

					<h1>Comment</h1>

					<input type="hidden" name="commentable_type" value="Project" >
					<input type="hidden" name="commentable_id" value="{{$project->id}}" >

					<div class="form-group">
						<label for="comment-body">Comment</span></label>
						<textarea
							name="body"
							id="comment-body"
							rows="3"
							spellcheck="false"
							style="resize: vertical"
							class="form-control autosize-target text-left"
							placeholder="Enter your comments">
						</textarea> 
					</div>

					<div class="form-group">
						<label for="comment-url">Proof of Work done (Url/Photo)</span></label>
						<textarea
							name="url"
							id="comment-url"
							rows="2"
							spellcheck="false"
							style="resize: vertical"
							class="form-control autosize-target text-left"
							placeholder="Enter the Proof of work done">
						</textarea> 
					</div>

					

					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Add comment">
					</div>
				</form>	
			</div>
			

			{{-- @foreach($project->projects as $project)
			<div class="col-lg-4">
				<h2>{{ $project->name }}</h2>
				<p class="text-danger">{{ $project->description }}</p>
				<p><a href="/projects/{{ $project->id }}" class=" btn btn-primary">View Details</a></p>
			</div>
			@endforeach --}}
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<a href="/projects" class="btn btn-info">View My Projects</a>
			<br><hr>
			<h4>Manage Project</h4>
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">Edit</a></li>

				@if($project->user_id == Auth::user()->id)
				<li style="padding-bottom: 3px">
					<a href="#" class="btn btn-danger"
						onclick="
						var result = confirm('Are you sure you want to delete Project?');
						if (result) {
							event.preventDefault();
							document.getElementById('delete-form').submit();
						}
						">
						Delete
					</a>
				</li>
				@endif

				<li style="padding-bottom: 3px"><a href="/projects/create" class="btn btn-success">Add new Project</a></li>



				<form id="delete-form" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post" style="display: none;">
					<input type="hidden" name="_method" value="delete">
					{{ csrf_field() }}
				</form>

				<!-- <li style="padding-bottom: 3px"><a href="#" class="btn btn-success">Add new Member</a></li> -->
			</ol>
		</div>

		<!-- <div class="sidebar-module">
			<h4>Members</h4>
			<ol class="list-unstyled">
				<li><a href="#">January 2018</a></li>
				<li><a href="#">February 2018</a></li>
				<li><a href="#">March 2018</a></li>
				<li><a href="#">April 2018</a></li>
				<li><a href="#">May 2018</a></li>
				<li><a href="#">June 2018</a></li>
				<li><a href="#">July 2018</a></li>
				<li><a href="#">August 2018</a></li>
				<li><a href="#">September 2018</a></li>
				<li><a href="#">October 2018</a></li>
				<li><a href="#">November 2018</a></li>
				<li><a href="#">December 2018</a></li>
			</ol>
		</div>
		<div class="sidebar-module">
			<h4>Social Media</h4>
			<ol class="list-unstyled">
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Instagram</a></li>
			</ol>
		</div> -->
	</div>
@endsection