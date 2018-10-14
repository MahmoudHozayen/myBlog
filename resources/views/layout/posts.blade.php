<div class="blog-post">
  <h2 class="blog-post-title"><a href="posts/{{ $post->id }} "> {{ $post->title }} </a></h2>
  <p class="blog-post-meta">by <a href="#">{{ $post->user->name }}</a> On : {{ $post->created_at->toFormattedDateString() }}</p>
  <p>{{ $post->body }}</p>
  <small>Last Updated At : {{ $post->updated_at->diffForHumans() }}</small>
</div><!-- /.blog-post -->
