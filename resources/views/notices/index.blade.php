@extends('layouts.main')

@section('title', 'Notices')

@section('body')
	<div class="row">
		<div class="col-md-12 card">
			<div class="card-body">
				<br>
				@if(Session::has('orderSent'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						{!! Session::get('orderSent') !!}
					</div>
				@endif

				
				@if(empty($distributions))
					<li style="text-align: center; color: red">No distribution notice!</li>
				@else
					@foreach($distributions as $distribution)
						<form action="{{ route('notices.store') }}" method="POST">
						<div class="row">
							{{ csrf_field() }}
							<input type="hidden" name="distributionId" value="{{ $distribution->distributionId }}">

							<div class="col-md-3">
								<input type="text" class="form-control" value="{{ 'To:  '.$distribution->name }}" readonly>
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" value="{{ 'Seed:  '.$distribution->seed }}" readonly>
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" value="{{ 'Qty:  '.$distribution->requiredQuantity.'kg' }}" readonly>
							</div>

							<div class="col-md-3">
								@php($flag=false)
								@if(!$orders->isEmpty())
									@foreach($orders as $ord)
										@if($distribution->distributionId==$ord->distributionId)
											@php($flag=true)
										@endif
									@endforeach
								@endif

								@if(!$flag)
								<select name="dealerId" class="form-control" required>
									<option value="">Select dealer...</option>
									@if(!$asd->isEmpty())
										@foreach($asd as $ad)
											<option value="{{ $ad->dealerId }}">{{ $ad->dealer->name }}</option>
										@endforeach
									@endif
								</select>
								@else
								<select name="dealerId" class="form-control" disabled>
									<option value="">Select dealer...</option>
									@if(!$asd->isEmpty())
										@foreach($asd as $ad)
											<option value="{{ $ad->dealerId }}">{{ $ad->dealer->name }}</option>
										@endforeach
									@endif
								</select>
								@endif
							</div>

							<div class="col-md-2">
								@php($flag1=false)
								@php($flag2=false)
								@if(!$orders->isEmpty())
									@foreach($orders as $ord)
										@if($distribution->distributionId==$ord->distributionId)
											@if($ord->status==1)
												@php($flag2=true)
											@endif
											@php($flag1=true)
										@endif
									@endforeach
								@endif
								
								@if($flag1 && $flag2)
									<button type="submit" class="btn btn-success" disabled>Done</button>
								@elseif($flag1)
									<button type="submit" class="btn btn-primary" disabled>Sent</button>
								@else
									<button type="submit" class="btn btn-primary">Send to dealer</button>
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