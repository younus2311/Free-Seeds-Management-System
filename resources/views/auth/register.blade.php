@extends('layouts.main')

@section('title', 'Login')

@section('body')

<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Login</div>
			
			<form action="{{ route('postRegister') }}" method="POST">
			{{ csrf_field() }}
			
			
			
			<input type="text" name="name">
			<input type="email" name="email">
			<input type="text" name="type" value="admin">
			<input type="text" name="nid">
			<input type="password" name="password">
			<input type="password" name="password_confirmation">
			<button type="submit">Sign Up</button>
			
			
			</form>
		</div>
	</div>
</div>

@endsection