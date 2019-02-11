@extends('layouts.app')

@section('content')
	<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="row col-sm-12 col-md-12 col-lg-12">

			<form method="post" action="{{ route('projects.update', [$project->id]) }}" class="col-sm-12" style="margin-top: 10px;">
				{{ csrf_field() }}


				<div class="form-group" style="padding-top: 2px; padding-bottom: 2px;">
					<label for="project-name" style="margin-bottom: 3px; color: white">Name <span class="required">*</span></label>
					<input 
						type="text" 
						name="name" 
						id="project-name"
						class="form-control" 
						required="true"
						spellcheck="false" 
						placeholder="Enter project name"
						value="{{ $project->name }}" 
					>
				</div>

				<div class="form-group">
					<label for="project-description" style="margin-bottom: 3px; color: white">Description</span></label>
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
				</div>
				<input type="hidden" name="_method" value="put">
			</form>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/projects/{{ $project->id }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Back</a></li>
				<li style="padding-bottom: 3px"><a href="/projects" class="btn btn-primary"><i class="fa fa-list"></i> View all Projects</a></li>
				
			</ol>
		</div>

	</div>
@endsection 