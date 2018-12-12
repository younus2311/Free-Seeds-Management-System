<div class="row justify-content-md-center">
	<div class="col-md-8">
		<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Personal Information</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item">{{ Auth::user()->name }}</li>
						<li class="list-group-item">Email: {{ Auth::user()->email }}</li>
						<li class="list-group-item">NID: {{ Auth::user()->nid }}</li>
						@if($storage->isEmpty())
							<li class="list-group-item">Assigned Storage: <span style="color: red">No Storage</span></li>
						@else
							@foreach($storage as $stg)
								<li class="list-group-item">Assigned Storage: <span style="color: green">{{ $stg->name }}</span></li>
							@endforeach
						@endif

						@if(empty($asd))
							<li class="list-group-item">Assigned Dealers: <span style="color: red">No Dealer</span></li>
						@else
							<li class="list-group-item">Assigned Dealers({{ count($asd) }}): 
							@foreach($asd as $ad)
								<span style="color: green">{{ $ad->dealer->name }}, </span>
							@endforeach
							</li>
						@endif

						@if($area->isEmpty())
							<li class="list-group-item">Assigned Area: <span style="color: red">No area</span></li>
						@else
							@foreach($area as $ar)
								<li class="list-group-item">Assigned Area: <span style="color: green">{{ $ar->district }} ({{ $ar->area }})</span></li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="list-group">
				<li class="list-group-item list-group-item-action flex-column align-items-start active">
					Farmers
				</li>

				@if(empty($asf))
					<li class="list-group-item" style="color: red">No Farmer</li>
				@else
					@foreach($asf as $af)
						<li class="list-group-item list-group-item-action flex-column align-items-start">
							<h6 class="mb-1">{{ $af->name }}</h6>
							<small>NID: {{ $af->nid }}</small>
						</li>
					@endforeach
				@endif
			</div>
		</div>
		</div>
	</div>
</div>