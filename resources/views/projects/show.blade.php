@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="well-lg">
			<h1>{{$project->name}}</h1>
			<p class="lead">{{$project->description}}</p>
		</div>

		@include('partials.comments')

		<div class="row col-sm-12 col-md-12 col-lg-12" style="background-color: white; margin: 3px; border-radius: 5px;">
			<div class="row container-fluid">
				<form class="col-sm-12" method="post" action="{{ route('comments.store') }}">
					{{ csrf_field() }}

					<input type="hidden" name="commentable_type" value="App\Models\Project" >
					<input type="hidden" name="commentable_id" value="{{$project->id}}" >

					<div class="form-group" style="padding-top: 2px; padding-bottom: 2px;">
						<label for="comment-body" style="padding-top: 3px;">Comment</span></label>
						<textarea
							name="body"
							id="comment-body"
							spellcheck="false"
							style="resize: horizontal; width: 100%;"
							class="form-control autosize-target text-left"
							placeholder="Enter your comments">
						</textarea> 
					</div>

					<div class="form-group" style="margin-top: 5px">
						<label for="comment-url">Proof of Work done (Url/Photo)</span></label>
						<textarea
							name="url"
							id="comment-url"
							spellcheck="false"
							style="resize: horizontal;"
							class="form-control autosize-target text-left"
							placeholder="Enter the Proof of work done">
						</textarea> 
					</div>

					

					<div class="form-group"> 
						<input type="submit" class="btn btn-primary" value="Add comment">
					</div>
				</form>	
			</div>
			
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<a href="/projects" class="btn btn-info"><i class="fa fa-list"></i> View My Projects</a>
			<br><hr>
			<h4 style="padding-bottom: 5px;">Manage Project</h4>
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/projects/{{ $project->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></li>

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
						<i class="fa fa-trash"></i> Delete
					</a>
				</li>
				@endif

				<li style="padding-bottom: 3px"><a href="/projects/create" class="btn btn-success"><i class="fa fa-plus"></i> Add new Project</a></li>

				<form id="delete-form" action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="post" style="display: none;">
					<input type="hidden" name="_method" value="delete">
					{{ csrf_field() }}
				</form>
			</ol>
		</div>

		<!-- add users to project -->
		<hr>
		<h4><i class="fa fa-plus"></i> Add Team Member</h4>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<form id="add-user" action="{{ route('projects.adduser', ['project' => $project->id]) }}" method="post">
					<div class="input-group">
						<input type="text" class="form-control" name="email" placeholder="Enter Email">
						<input type="hidden" name="project_id" value="{{ $project->id }}">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add</button>
						</span>
					{{ csrf_field() }}
					</div>
				</form>
			</div>
		</div>

		<br>

		<h4>Team Members</h4>
		<ol class="list-unstyled">
			@foreach($project->users as $user)
				<li><a href="#">{{ $user->email }}</a></li>
			@endforeach
		</ol>
	</div>
@endsection

