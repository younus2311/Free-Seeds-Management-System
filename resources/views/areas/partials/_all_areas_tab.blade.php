@if(Session::has('createAreaSuccess'))
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! Session::get('createAreaSuccess') !!}
	</div>
@endif

@if($areas->isEmpty())
	<div class="alert alert-warning" role="alert">
		No Area yet!
	</div>
@else
	<div class="list-group">
		@foreach($areas as $area)
			<li class="list-group-item list-group-item-action flex-column align-items-start">
				<p class="mb-1">{{ $area->district }}</p>
				<p class="mb-2">{{ $area->area }}</p>
				<small class="text-muted">Assigned Distributor: <span style="color: green">{{ $area->distributor->name }}</span></small>
				{{-- <small class="text-muted">Email: {{ $dealer->email }}</small>
				&nbsp;&nbsp;<small class="text-muted">||</small>&nbsp;&nbsp;
				<small class="text-muted">NID: {{ $dealer->nid }}</small>
				&nbsp;&nbsp;<small class="text-muted">||</small>&nbsp;&nbsp;

				@if($assignedDealers->isEmpty())
					<small style="color: red">No distributor assigned!</small>
				@else
					@php($temp=[])
					@foreach($assignedDealers as $assignedDealer)
						@if($dealer->id==$assignedDealer->dealer->id)
							<small class="text-muted">Assigned for: <span style="color: green">{{ $assignedDealer->distributor->name }}</span></small>
							@php($temp=[$dealer->id])
						@endif
					@endforeach
				@endif

				@if($temp==NULL)
					<small style="color: red">No distributor assigned!</small>
				@endif --}}
			</li>
		@endforeach
	</div>
@endif