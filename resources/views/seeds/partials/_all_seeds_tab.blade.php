@if(Session::has('createSeedSuccess'))
	<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! Session::get('createSeedSuccess') !!}
	</div>
@endif

@if($seeds->isEmpty())
	<div class="alert alert-warning" role="alert">
		No Seeds yet!
	</div>
@else
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Storage</th>
				<th>Distributor</th>
				<th>Seed</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			@php($count=0)
			@foreach($seeds as $seed)
				@php($count++)
				<tr>
					<td>{{ $count }}</td>
					<td>{{ $seed->storage->name }}</td>
					<td>{{ $seed->storage->distributor->name }}</td>
					<td>{{ $seed->seed }}</td>
					<td>{{ $seed->quantity }}kg</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif