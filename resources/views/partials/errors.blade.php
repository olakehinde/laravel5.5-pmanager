@if (isset($errors) && count($errors) > 0)
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<strong>{!! $errors !!}</strong>
	</div>
@endif