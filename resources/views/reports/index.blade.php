@extends('layouts.main')

@section('title', 'Orders')

@section('body')
	<div class="row">
		<div class="col-md-12 card">
			<div class="card-body">
				<br>
				@if(empty($reports))
					<p style="color: red; text-align: center">No Report!</p>
				@else
					<table class="table table-striped table-bordered table-responsive">
						<thead>
							<tr>
								<th>#</th>
								<th>Distributor</th>
								<th>Storage</th>
								<th>Location</th>
								<th>Farmer</th>
								<th>Seed</th>
								<th>Quantity</th>
								<th>Delivered</th>
							</tr>
						</thead>
						<tbody>
							@php($count=0)
							@foreach($reports as $report)
								@php($count++)
								<tr>
									<td>{{ $count }}</td>
									<td>{{ $report->user }}</td>
									<td>{{ $report->storage }}</td>
									<td>{{ $report->district }} ({{ $report->area }})</td>
									<td>{{ $report->farmer }}</td>
									<td>{{ $report->seed }}</td>
									<td>{{ $report->requiredQuantity }}kg</td>

									@if($report->status==0)
									<td><button class="btn btn-danger btn-block" disabled>No</button></td>
									@else
									<td><button class="btn btn-success btn-block" disabled>Yes</button></td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
	<br>
@endsection