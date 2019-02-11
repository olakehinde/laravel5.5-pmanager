@extends('layouts.app')

@section('content')
	<div class="row col-md-9 col-lg-9 col-sm-9" style="padding-top: 5px;">
		<div class="row col-sm-12 col-md-12 col-lg-12" style="margin: 3px;">

			<form method="post" action="{{ route('projects.store') }}" class="col-sm-12" style="margin: 3px;">
				{{ csrf_field() }}

				<h1 style="padding-top: 10px; padding-bottom: 5px; color: white;"><i class="fa fa-plus"></i> Create new Project</h1><br>

				<div class="form-group">
					<label for="project-name" style="padding-bottom: 5px;color: white;">Name <span class="required">*</span></span></label>
					<input 
						type="text" 
						name="name" 
						id="project-name"
						class="form-control"
						required="true"
						spellcheck="false" 
						placeholder="Enter project name"
					>
				</div>

				<input type="hidden" name="company_id" value="{{ $company_id }}" >

				@if($companies != null)
				<div class="form-group">
					<label for="company_id" style="padding-bottom: 5px; color: white;">Select a Company</span></label>
					<select name="company_id" class="form-control">
						<option value="" selected="true">Select</option>
						@foreach($companies as $company)
							<option value="{{$company->id}}" style="background-color: white;">{{$company->name}}</option>
						@endforeach
					</select>
				</div>
				@endif

				<div class="form-group">
					<label for="project-description" style="padding-bottom: 5px; color: white;">Description</span></label>
					<textarea
						name="description"
						id="project-description"
						rows="5"
						spellcheck="false"
						style="resize: vertical"
						class="form-control autosize-target text-left"
						placeholder="Describe the project">
					</textarea> 
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Save">
				</div>
			</form>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px">
					<a href="/projects" class="btn btn-primary"><i class="fa fa-list"></i> My project</a>
				</li>
				
			</ol>
		</div>

	</div>
@endsection 