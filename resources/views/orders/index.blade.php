@extends('layouts.main')

@section('title', 'Orders')

@section('body')
	<div class="row">
		<div class="col-md-12 card">
			<div class="card-body">
				<br>
				@if(Session::has('orderConfirmed'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{!! Session::get('orderConfirmed') !!}
					</div>
				@endif

				
				@if(empty($orders))
					<li style="text-align: center; color: red">No order notice!</li>
				@else
					@foreach($orders as $order)
						<form action="{{ route('orders.store') }}" method="POST">
						<div class="row">
							{{ csrf_field() }}
							<input type="hidden" name="orderId" value="{{ $order->orderId }}">
							<input type="hidden" name="distributionId" value="{{ $order->distributionId }}">
							<input type="hidden" name="requiredQuantity" value="{{ $order->requiredQuantity }}">

							<div class="col-md-4">
								<input type="text" class="form-control" value="{{ 'To:  '.$order->name }}" readonly>
							</div>

							<div class="col-md-3">
								<input type="text" class="form-control" value="{{ 'Seed:  '.$order->seed }}" readonly>
							</div>

							<div class="col-md-3">
								<input type="text" class="form-control" value="{{ 'Qty:  '.$order->requiredQuantity.'kg' }}" readonly>
							</div>

							<div class="col-md-2">
								@if($order->status==0)
								<button type="submit" class="btn btn-primary">Confirm Order</button>
								@else
								<button type="submit" class="btn btn-success" disabled>Confirmed</button>
								@endif
							</div>
						</div>
						</form>
						<br>
					@endforeach
				@endif
			</div>
		</div>
	</div>
	<br>
@endsection