@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="jumbotron">
			<h1>{{$company->name}}</h1>
			<p class="lead">{{$company->description}}</p>
		</div>

		<div class="row" style="margin: 3px;">
			<div class="col-md-2">
				<a href="/projects/create/{{$company->id}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create Project</a>
			</div>
			

			@if(count($company->projects) < 1)
				<div class="col-md-10">
					<p class="text-white mx-5">{{$company->name}} has no Project yet.</p>
				</div>
			@endif

			@foreach($company->projects as $project)
			<div class="col-md-9 mx-3">
				<h2 class="text-white">Project title: {{ $project->name }}</h2>
				<p class="text-white">Description: {{ $project->description }}</p>
				<a href="/projects/{{ $project->id }}" class=" btn btn-primary btn-sm pull-right"><i class="fa fa-eye"></i> View Details</a>
			</div>
			@endforeach
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 pull-right blog-sidebar">
		<div class="sidebar-module">
			<a href="/companies" class="btn btn-info"><i class="fa fa-eye"></i> View Companies</a>
			<br><hr>
			<h4 class="text-white" style="margin-bottom: 5px;"><i class="fa fa-list"></i> Manage</h4>
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/companies/{{ $company->id }}/edit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a></li>

				<li style="padding-bottom: 3px">
					<a href="#" class="btn btn-danger"
						onclick="
						var result = confirm('Are you sure you want to delete Company?');
						if (result) {
							event.preventDefault();
							document.getElementById('delete-form').submit();
						}
						">
						<i class="fa fa-trash"></i> Delete
					</a>
				</li>

				<li style="padding-bottom: 3px"><a href="/projects/create/{{ $company->id }}" class="btn btn-success"><i class="fa fa-plus"></i> Add new Project</a></li>
				<li style="padding-bottom: 3px"><a href="/companies/create" class="btn btn-success"><i class="fa fa-plus"></i> Add new Company</a></li>



				<form id="delete-form" action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="post" style="display: none;">
					<input type="hidden" name="_method" value="delete">
					{{ csrf_field() }}
				</form>

				<!-- <li style="padding-bottom: 3px"><a href="#" class="btn btn-success">Add new Member</a></li> -->
			</ol>
		</div>
	</div>
@endsection