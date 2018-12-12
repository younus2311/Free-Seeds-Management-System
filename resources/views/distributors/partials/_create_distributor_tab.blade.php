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

		<form action="{{ route('distributors.store') }}" method="POST" id="create-distributor-form">
		{{ csrf_field() }}
		<div class="input-group">
			<span class="input-group-addon" id="name"><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type="text" name="name" class="form-control" placeholder="Name" aria-label="name" aria-describedby="name" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="email"><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="type"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
			<input type="text" name="type" class="form-control" placeholder="Type" aria-label="type" aria-describedby="type" value="distributor" readonly>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="nid"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
			<input type="number" name="nid" class="form-control" placeholder="NID" aria-label="nid" aria-describedby="nid" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="password"><i class="fa fa-lock" aria-hidden="true"></i></span>
			<input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="password" required>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon" id="password_confirmation"><i class="fa fa-lock" aria-hidden="true"></i></span>
			<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" aria-label="password_confirmation" aria-describedby="password_confirmation" required>
		</div>
		<br>
		<hr>
		<button type="submit" class="btn btn-primary btn-block" id="create-distributor-btn">Create</button>
		</form>
	</div>
</div>