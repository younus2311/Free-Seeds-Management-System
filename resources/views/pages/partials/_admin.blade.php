<div class="row">
	{{-- Distributors --}}
	<div class="col-md-4">
		<div class="list-group">
			<li class="list-group-item list-group-item-action flex-column align-items-start active">
				Distributors
			</li>

			@if($distributors->isEmpty())
				<li class="list-group-item" style="color: red">No Distributor</li>
			@else
				@foreach($distributors as $distributor)
					<li class="list-group-item list-group-item-action flex-column align-items-start">
						<h6 class="mb-1">{{ $distributor->name }}</h6>
						<small>Email: {{ $distributor->email }}</small>
						<br>
						<small>NID: {{ $distributor->nid }}</small>
					</li>
				@endforeach
			@endif
		</div>
	</div>
	{{-- Dealers --}}
	<div class="col-md-4">
		<div class="list-group">
			<li class="list-group-item list-group-item-action flex-column align-items-start active">
				Dealers
			</li>

			@if($dealers->isEmpty())
				<li class="list-group-item" style="color: red">No Dealer</li>
			@else
				@foreach($dealers as $dealer)
					<li class="list-group-item list-group-item-action flex-column align-items-start">
						<h6 class="mb-1">{{ $dealer->name }}</h6>
						<small>Email: {{ $dealer->email }}</small>
						<br>
						<small>NID: {{ $dealer->nid }}</small>
					</li>
				@endforeach
			@endif
		</div>
	</div>
	{{-- Storages --}}
	<div class="col-md-4">
		<div class="list-group">
			<li class="list-group-item list-group-item-action flex-column align-items-start active">
				Farmers
			</li>

			@if($farmers->isEmpty())
				<li class="list-group-item" style="color: red">No Farmer</li>
			@else
				@foreach($farmers as $farmer)
					<li class="list-group-item list-group-item-action flex-column align-items-start">
						<h6 class="mb-1">{{ $farmer->name }}</h6>
						<small>NID: {{ $farmer->nid }}</small>
						<br>
						<small>District: {{ $farmer->area->district }}  ||  Area: {{ $farmer->area->area }}</small>
					</li>
				@endforeach
			@endif
		</div>
	</div>
</div>
