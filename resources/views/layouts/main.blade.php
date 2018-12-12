<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._meta')
	<title>@yield('title')</title>

	@include('partials._css')

	@include('partials._js')
</head>

@if(Auth::check())
<body id="background1">
@else
<body id="background2">
@endif
	@include('partials._nav')
	
	<br>
	<div class="container">
		@yield('body')
	</div>
	
	{{-- Custom JS --}}
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>