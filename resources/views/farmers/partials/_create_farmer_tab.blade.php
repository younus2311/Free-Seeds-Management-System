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

		<form action="{{ route('farmers.store') }}" method="POST" id="create-farmer-form">
		{{ csrf_field() }}
		<div class="input-group">
			<span class="input-group-addon" id="areaId"><i class="fa fa-map-marker" aria-hidden="true"></i></span>

			<select name="areaId" class="form-control" aria-label="areaId" aria-describedby="areaId" required>
				<option value="">Select Storage...</option>
				@if($areas->isEmpty())
					<option value="">No area exists</option>
				@else
					@foreach($areas as $area)
						<option value="{{ $area->id }}">{{ $area->district }} - {{ $area->area }} (D: {{ $area->distributor->name }})</option>
					@endforeach
				@endif
			</select>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="name"><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type="text" name="name" class="form-control" placeholder="Name" aria-label="name" aria-describedby="name" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="nid"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
			<input type="number" name="nid" class="form-control" placeholder="Farmer's NID" aria-label="nid" aria-describedby="nid" required>
		</div>
		<br>
		<hr>
		<button type="submit" class="btn btn-primary btn-block" id="create-farmer-btn">Create</button>
		</form>
	</div>
</div>