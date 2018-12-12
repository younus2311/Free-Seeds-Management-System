@if(Session::has('createDistributorSuccess'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! Session::get('createDistributorSuccess') !!}
	</div>
@endif

@if(Session::has('dodSuccess'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! Session::get('dodSuccess') !!}
	</div>
@endif

@if($distributors->isEmpty())
	<div class="alert alert-warning" role="alert">
		No distributor yet!
	</div>
@else
	<div class="list-group">
		@foreach($distributors as $distributor)
			<li class="list-group-item list-group-item-action flex-column align-items-start">
				<p class="mb-1">{{ $distributor->name }}</p>
				<small class="text-muted">Email: {{ $distributor->email }}</small>
				&nbsp;&nbsp;<small class="text-muted">||</small>&nbsp;&nbsp;
				<small class="text-muted">NID: {{ $distributor->nid }}</small>
				<br>
				<small class="text-muted">
					<button type="button" class="btn btn-outline-secondary btn-xs set-dealers" data-toggle="modal" data-target="#distributor{{ $distributor->id }}">See Dealers</button>
				</small>
			</li>

			<!-- Modal -->
			<div class="modal" id="distributor{{ $distributor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="exampleModalLabel">Set Dealers for {{ $distributor->name }}</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
								<form action="{{ route('dod.store') }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="distributorId" value="{{ $distributor->id }}">
									<select name="dod[]" class="set-dealers-field form-control" multiple="multiple" id="distributor{{ $distributor->id }}select" style="width: 100%">
										@php($temp=[])
										@foreach($dealers as $dealer)
											@foreach($assignedDealers as $assignedDealer)
												@if($dealer->id==$assignedDealer->dealer->id)
													@php($temp=[$dealer->id])

													@if($distributor->id==$assignedDealer->distributor->id)
													<option selected="selected" value="{{ $dealer->id }}">{{ $dealer->name }}</option>
													@else
													<option disabled value="{{ $dealer->id }}">{{ $dealer->name }}</option>
													@endif
												@endif
											@endforeach

											@if($temp!=NULL)
												@foreach($temp as $tmp)
													@if($dealer->id!=$tmp)
														<option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
													@endif
												@endforeach
											@else
												<option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
											@endif
										@endforeach
									</select>
									<hr>
									<button type="submit" class="btn btn-primary btn-sm">Set Dealers</button>
								</form>
								</div>

								<div class="col-md-6">
									@if($assignedDealers->isEmpty())
										<span style="text-align: center; color: red">No dealer assigned!</span>
									@else
										<ul class="list-group">
											@php($dealerFound=false)
											@foreach($assignedDealers as $assignedDealer)
												@if($distributor->id==$assignedDealer->distributor->id)
													@php($dealerFound=true)
													<li class="list-group-item"><small>{{ $assignedDealer->dealer->name }}</small></li>
												@endif
											@endforeach

											@if(!$dealerFound)
												<span style="text-align: center; color: red">No dealer assigned!</span>
											@endif
										</ul>
									@endif
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endif