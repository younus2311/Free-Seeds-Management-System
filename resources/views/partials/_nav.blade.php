<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="{{ route('home') }}">
			<img src="{{ asset('images/seed.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
			FSDM
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				@if(Auth::check())
				<li class="nav-item {{ Request::is('/') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('home') }}">Home</a>
				</li>

				@if(Auth::user()->type=='admin')
				<li class="nav-item {{ Request::is('distributors') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('distributors.index') }}">Distributors</a>
				</li>
				<li class="nav-item {{ Request::is('dealers') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('dealers.index') }}">Dealers</a>
				</li>
				<li class="nav-item {{ Request::is('storages') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('storages.index') }}">Storages</a>
				</li>
				<li class="nav-item {{ Request::is('seeds') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('seeds.index') }}">Seeds</a>
				</li>
				<li class="nav-item {{ Request::is('areas') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('areas.index') }}">Areas</a>
				</li>
				<li class="nav-item {{ Request::is('farmers') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('farmers.index') }}">Farmers</a>
				</li>
				<li class="nav-item {{ Request::is('distributions') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('distributions.index') }}">Distributions</a>
				</li>
				<li class="nav-item {{ Request::is('reports') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
				</li>

				@elseif(Auth::user()->type=='distributor')
				<li class="nav-item {{ Request::is('notices') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('notices.index') }}">Notices</a>
				</li>

				@else
				<li class="nav-item {{ Request::is('orders') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
				</li>
				@endif
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="{{ route('logout') }}">Logout&nbsp;&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a>
					</div>
				</li>
				@else
				<li class="nav-item {{ Request::is('/') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('home') }}">Home</a>
				</li>
				<li class="nav-item {{ Request::is('login') ? 'active':'' }}">
					<a class="nav-link" href="{{ route('login') }}">Login</a>
				</liorders>
				@endif
			</ul>
		</div>
	</div>
</nav>