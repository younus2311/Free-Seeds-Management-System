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

		<form action="{{ route('seeds.store') }}" method="POST" id="create-seed-form">
		{{ csrf_field() }}
		<div class="input-group">
			<span class="input-group-addon" id="storageId"><i class="fa fa-archive" aria-hidden="true"></i></span>

			<select name="storageId" class="form-control" aria-label="storageId" aria-describedby="storageId" required>
				<option value="">Select Storage...</option>
				@if($storages->isEmpty())
					<option value="">No storage exists</option>
				@else
					@foreach($storages as $storage)
						<option value="{{ $storage->id }}">{{ $storage->name }} (D: {{ $storage->distributor->name }})</option>
					@endforeach
				@endif
			</select>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="seed"><i class="fa fa-product-hunt" aria-hidden="true"></i></span>
			<input type="text" name="seed" class="form-control" placeholder="Seed name" aria-label="seed" aria-describedby="seed" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="quantity"><i class="fa fa-product-hunt" aria-hidden="true"></i></span>
			<input type="number" name="quantity" class="form-control" placeholder="Seed Amount(Kg's)" aria-label="quantity" aria-describedby="quantity" required>
		</div>
		<small class="text-muted">Amount is based on Kilograms(Kg's)</small>
		<br>
		<hr>
		<button type="submit" class="btn btn-primary btn-block" id="create-seed-btn">Create</button>
		</form>
	</div>
</div>