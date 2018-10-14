@extends('layout.master_layout')


@section('content')
<div class="col-sm-8 blog-main">
	<form method="POST" action="/posts">
		@csrf
		<div class="form-group">
			<label for="exampleInputEmail1">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Body</label>
			<textarea class="form-control" id="body" name="body" required></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Publish</button>
		</div>

		@include('layout.errors')
	</form>
</div>
@endsection('content')