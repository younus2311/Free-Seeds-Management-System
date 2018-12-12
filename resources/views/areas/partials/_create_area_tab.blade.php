<div class="row justify-content-md-center">
	<div class="col-md-10">
		@if(count($errors)>0)
			<div class="text-center">
			@foreach($errors->all() as $error)
				<li style="list-style: none; color: red">{{ $error }}</li>
			@endforeach
			</div>
			<br>
		@endif

		<form action="{{ route('areas.store') }}" method="POST" id="create-area-form">
		{{ csrf_field() }}
		<div class="input-group">
			<span class="input-group-addon" id="district"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
			<input type="text" name="district" class="form-control" placeholder="District" aria-label="district" aria-describedby="district" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="area"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
			<input type="text" name="area" class="form-control" placeholder="Area of district" aria-label="area" aria-describedby="area" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="distributorId"><i class="fa fa-user" aria-hidden="true"></i></span>

			<select name="distributorId" class="form-control" aria-label="distributorId" aria-describedby="distributorId" required>
				<option value="">Select distributor...</option>
				@if($distributors->isEmpty())
					<option value="">No distributor exists</option>
				@else
					@foreach($distributors as $distributor)
						<option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
					@endforeach
				@endif
			</select>
		</div>
		<br>
		<hr>
		<button type="submit" class="btn btn-primary btn-block" id="create-area-btn">Create</button>
		</form>
	</div>
</div>