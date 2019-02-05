<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading bg-info">
				<h3 class="panel-title">
					<span class="fa fa-comment"></span>
					Recent comment
				</h3>
			</div>
			<div class="panel-body">
				@if(!$comments)
					<h2>No comments yet.</h2>
				@endif

				<ul class="media-list">
					@foreach($comments as $comment)
					<li class="media">
						<div class="media-left">
							<img src="#" class="img-circle">
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<small>
									<a href="users/{{ $comment->user->id}}">{{ $comment->user->first_name }}{{ $comment->user->last_name }} - {{ $comment->user->email }}</a> <br>

									Commented on {{ $comment->created_at }}
								</small>
							</h4>
							<p>{{ $comment->body }}</p>
							<p>Proof: <small>
								@if(!$comment->url)
									Not available
								@endif
								{{ $comment->url}}</small></p>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>