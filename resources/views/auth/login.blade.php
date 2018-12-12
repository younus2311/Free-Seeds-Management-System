@extends('layouts.main')

@section('title', 'Login')

@section('body')

<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Login</div>
			
			<form action="{{ route('postLogin') }}" method="POST">
			{{ csrf_field() }}
			<div class="card-body">
				@if(count($errors)>0)
					<div class="text-center">
					@foreach($errors->all() as $error)
						<li style="list-style: none; color: red">{{ $error }}</li>
					@endforeach
					</div>
					<br>
				@endif
				
				<div class="input-group">
					<span class="input-group-addon" id="email"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email" required>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon" id="password"><i class="fa fa-lock" aria-hidden="true"></i></span>
					<input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="password" required>
				</div>
				<br>
				<label for="remember"><input type="checkbox" name="remember" class="" id="remember"> Remember me?</label>
			</div>

			<div class="card-footer text-right">
				<a href="#">Sign up for new account!</a>
				&nbsp;&nbsp;
				<button type="submit" class="btn btn-primary">Login&nbsp;<i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
			</form>
		</div>
	</div>
</div>

@endsection