<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-comment"></span>
					Recent comment
				</h3>
			</div>
			<div class="panel-body">
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

									Commented on {{ $comment->created_at}}
								</small>
							</h4>
							<p>{{ $comment->body }}</p>
							Proof: <p>{{ $comment->url}}</p>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>