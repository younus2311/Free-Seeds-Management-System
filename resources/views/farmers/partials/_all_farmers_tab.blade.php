@if(Session::has('createFarmerSuccess'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{!! Session::get('createFarmerSuccess') !!}
	</div>
@endif

@if($farmers->isEmpty())
	<div class="alert alert-warning" role="alert">
		No farmer yet!
	</div>
@else
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>District</th>
				<th>Area</th>
				<th>Distributor</th>
				<th>Farmer</th>
				<th>Farmer's NID</th>
			</tr>
		</thead>
		<tbody>
			@php($count=0)
			@foreach($farmers as $farmer)
				@php($count++)
				<tr>
					<td>{{ $count }}</td>
					<td>{{ $farmer->area->district }}</td>
					<td>{{ $farmer->area->area }}</td>
					<td>{{ $farmer->area->distributor->name }}</td>
					<td>{{ $farmer->name }}</td>
					<td>{{ $farmer->nid }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif