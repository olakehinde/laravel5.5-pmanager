@extends('layouts.app')

@section('content')
	<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="row col-sm-12 col-md-12 col-lg-12" style="background-color: white; margin: 3px;">

			<form method="post" action="{{ route('projects.update', [$project->id]) }}" class="col-sm-12">
				{{ csrf_field() }}


				<div class="form-group" style="padding-top: 2px; padding-bottom: 2px;">
					<label for="project-name">Name <span class="required">*</span></span></label>
					<input 
						type="text" 
						name="name" 
						id="project-name"
						required="true"
						spellcheck="false" 
						placeholder="Enter project name"
						value="{{ $project->name }}" 
					>
				</div>

				<div class="form-group">
					<label for="project-description">Description</span></label>
					<textarea
						name="description"
						id="project-description"
						rows="5"
						spellcheck="false"
						style="resize: vertical"
						class="form-control autosize-target text-left"
						placeholder="Describe the project">
						{{$project->description }}
					</textarea> 
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Save">
					<a href="/projects/{{$project->id}}" class="btn btn-danger">Cancel</a>
				</div>
				<input type="hidden" name="_method" value="put">
			</form>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<h4>Action</h4>
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/projects/{{ $project->id }}" class="btn btn-primary">View Project</a></li>
				<li style="padding-bottom: 3px"><a href="/projects" class="btn btn-danger">View all Projects</a></li>
				
			</ol>
		</div>

	</div>
@endsection 