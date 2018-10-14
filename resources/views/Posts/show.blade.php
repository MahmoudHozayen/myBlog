@extends('layout.master_layout')


@section('content')
<div class="col-sm-8 blog-main">

	<div class="blog-post">
		<h2 class="blog-post-title"> {{ $post->title }} </h2>
			<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}<a href="#">{{ $post->user->name }}</a></p>
			<p>{{ $post->body }}</p>
		<small>Last Updated At : {{ $post->updated_at->toDayDateTimeString() }}</small>
	</div><!-- /.blog-post -->

	<hr>

	<div class="card">
		<div class="card-block">
			    @if (! auth()->check())
			     <a  href="/register">register</a> Or
			     <a  href="/login">login</a> To Add Comments
			    @endif

			    @if (auth()->check())

					<form method="POST" action="/posts/{{ $post->id }}/comments">
						@csrf

						<div class="form-group">
							<label for="exampleInputPassword1">Add Comment</label>
							<textarea class="form-control" id="body" name="body" required></textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Add Comment</button>
						</div>

						@include('layout.errors')
					</form>
			    @endif					
		</div>
	</div>

	<hr>
	@if (auth()->check())

		@if(count($post->comments))
			<div class="comments"> Comments :
				<ul class="list-group">
					@foreach($post->comments as $comment)
						<li class="list-group-item comment">
							<span class="display-block">{{ $comment->user->name }} : </span><br>
							<div class="comment-body">{{ $comment->body}}</div>
							<hr>
							<small><strong>{{ $comment->created_at->diffForHumans() }}</strong></small>
						</li>
					@endforeach
				</ul>
			</div>
		@endif
	@endif

	
</div>
  @include('layout.blog_sidebar')

@endsection('content')