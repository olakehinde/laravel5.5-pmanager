@extends('layouts.app')

@section('content')
	<div class="row col-md-9 col-lg-9 col-sm-9 pull-left">
		<div class="row col-sm-12 col-md-12 col-lg-12" style="background-color: white; margin: 3px;">

			<form method="post" action="{{ route('companies.update', [$company->id]) }}">
				{{ csrf_field() }}

				<input type="hidden" name="_method" value="put">

				<div class="form-group">
					<label for="company-name">Name <span class="required">*</span></span></label>
					<input 
						type="text" 
						name="name" 
						id="company-name"
						class="form-control"
						required="true"
						spellcheck="false" 
						placeholder="Enter company name"
						value="{{ $company->name }}" 
					>
				</div>

				<div class="form-group">
					<label for="company-description">Description</span></label>
					<textarea
						name="description"
						id="company-description"
						rows="5"
						spellcheck="false"
						style="resize: vertical"
						class="form-control autosize-target text-left"
						placeholder="Describe the company">
						{{$company->description }}
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
			<h4>Action</h4>
			<ol class="list-unstyled">
				<li style="padding-bottom: 3px"><a href="/companies/{{ $company->id }}" class="btn btn-primary">View company</a></li>
				<li style="padding-bottom: 3px"><a href="/companies" class="btn btn-danger">View all Companies</a></li>
				
			</ol>
		</div>

	</div>
@endsection 