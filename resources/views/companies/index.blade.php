@extends('layouts.app')
@section('content')
	{{-- <div class="col-md-6-offset-3 col-lg-6 col-lg-offest-3 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading panel-primary">Company <a class="btn btn-success pull-right btn-sm" href="/companies/create">Add new Company</a></div>
			<div class="panel-body">
				<ul class="list-group">
					@foreach($companies as $company)
					<li class="list-group-item"><a href="/companies/{{$company->id}}">{{ $company->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div> --}}

<div class="container mt-5">
	<div class="row pb-1">
		<div class="col text-white">My Company</div>
		<div class="col"><a class="btn btn-success pull-right btn-sm" href="/companies/create"><i class="fa fa-plus"></i> Add new Company</a></div>
	</div>
    @if(!$companies)
    	<p>You have not created any Company.</p>
    @endif

    <div class="card-deck">
    	@foreach($companies as $company)
        <div class="card mx-1">
        	<a href="/companies/{{$company->id}}">
	            <div class="card-body px-2">
	                <h6 class="card-title">{{ $company->name }}</h6>
	                <p class="card-text" style="font-size:15px">{{ $company->description }}</p>
	            </div>
        	</a>
        </div>
        @endforeach
    </div>
</div>
@endsection