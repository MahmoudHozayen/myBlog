@extends('layout.master_layout')
	
	@section('content')
	  <div class="col-sm-8 blog-main">
	  	<h1>Login</h1>
		<form method="POST" action="/login">
			@csrf
			<div class="form-group">
				<label for="exampleInputEmail1">E-mail : </label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Password : </label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Login</button>
			</div>

			@include('layout.errors')

		</form>
	  </div>
	@endsection('content')