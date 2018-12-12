@extends('layouts.main')

@section('title', 'Dealers')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="dealers-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-dealers-tab" data-toggle="tab" href="#all-dealers" role="tab" aria-controls="all-dealers" aria-expanded="true">All Dealers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-dealer-tab" data-toggle="tab" href="#create-dealer" role="tab" aria-controls="create-dealer">Create Dealers</a>
						</li>
					</ul>
					<div class="tab-content" id="dealers-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-dealers" role="tabpanel" aria-labelledby="all-dealers-tab">
							@include('dealers.partials._all_dealers_tab')
						</div>

						<div class="tab-pane fade" id="create-dealer" role="tabpanel" aria-labelledby="create-dealer-tab">
							@include('dealers.partials._create_dealer_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection