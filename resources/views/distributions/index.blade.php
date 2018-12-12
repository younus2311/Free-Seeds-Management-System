@extends('layouts.main')

@section('title', 'Distributions')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Distribute seeds to farmers</div>
				<div class="card-body">
					<br>
					@if(Session::has('distSuccess'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							{!! Session::get('distSuccess') !!}
						</div>
					@endif
					@if(count($errors)>0)
						<div class="text-center">
						@foreach($errors->all() as $error)
							<li style="list-style: none; color: red">{{ $error }}</li>
						@endforeach
						</div>
						<br>
					@endif

					@if(empty($farmers))
					@else
						@foreach($farmers as $farmer)
							<form action="{{ route('distributions.index') }}" method="POST">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-3">
									<input name="farmerId" type="hidden" value="{{ $farmer->farmerId }}">
									<input type="text" class="form-control" value="{{ $farmer->farmer }}" readonly>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control" value="{{ $farmer->storage }}" readonly>
								</div>
								<div class="col-md-3">
									<select name="seedId" class="form-control" required>
										<option value="">Select seed...</option>
										@if(!$seeds->isEmpty())
											@foreach($seeds as $seed)
												@if($seed->storageId==$farmer->storageId)
													<option value="{{ $seed->id }}">{{ $seed->seed }} ({{ $seed->quantity }}kg)</option>
												@endif
											@endforeach
										@endif
									</select>
								</div>

								<div class="col-md-2">
									<input name="requiredQuantity" type="number" class="form-control" placeholder="Quantity(kg)" required>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-primary">Distribute</button>
								</div>
							</div>
							</form>
							<br>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection