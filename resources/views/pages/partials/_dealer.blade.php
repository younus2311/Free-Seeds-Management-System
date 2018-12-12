<div class="row justify-content-md-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Personal Information</div>
			<div class="card-body">
				<ul class="list-group">
					<li class="list-group-item">{{ Auth::user()->name }}</li>
					<li class="list-group-item">Email: {{ Auth::user()->email }}</li>
					<li class="list-group-item">NID: {{ Auth::user()->nid }}</li>

					@if($asdst->isEmpty())
						<li class="list-group-item">Assigned Distributor: <span style="color: red">No Distributor</span></li>
					@else
						@foreach($asdst as $adst)
							<li class="list-group-item">Assigned Distributor: <span style="color: green">{{ $adst->distributor->name }}</span></li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>