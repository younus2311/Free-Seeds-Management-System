@extends('layouts.main')

@section('title', 'Home')

@section('body')
	@if(Auth::check())
		@if(Auth::user()->type=='admin')
			@include('pages.partials._admin')
		@elseif(Auth::user()->type=='distributor')
			@include('pages.partials._distributor')
		@else
			@include('pages.partials._dealer')
		@endif
	@else
		@include('pages.partials._no_user_logged')
	@endif
@endsection