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

		<form action="{{ route('storages.store') }}" method="POST" id="create-storage-form">
		{{ csrf_field() }}
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
		<div class="input-group">
			<span class="input-group-addon" id="name"><i class="fa fa-archive" aria-hidden="true"></i></span>
			<input type="text" name="name" class="form-control" placeholder="Storage name" aria-label="name" aria-describedby="name" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="description"><i class="fa fa-archive" aria-hidden="true"></i></span>
			<textarea name="description" class="form-control" placeholder="Write storage description" aria-label="description" aria-describedby="description" cols="30" rows="5" required></textarea>
		</div>
		<br>
		<hr>
		<button type="submit" class="btn btn-primary btn-block" id="create-storage-btn">Create</button>
		</form>
	</div>
</div>