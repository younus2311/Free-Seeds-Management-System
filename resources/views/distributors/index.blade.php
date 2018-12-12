@extends('layouts.main')

@section('title', 'Distributors')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="distributors-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-distributors-tab" data-toggle="tab" href="#all-distributors" role="tab" aria-controls="all-distributors" aria-expanded="true">All Distributors</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-distributor-tab" data-toggle="tab" href="#create-distributor" role="tab" aria-controls="create-distributor">Create Distributors</a>
						</li>
					</ul>
					<div class="tab-content" id="distributors-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-distributors" role="tabpanel" aria-labelledby="all-distributors-tab">
							@include('distributors.partials._all_distributors_tab')
						</div>

						<div class="tab-pane fade" id="create-distributor" role="tabpanel" aria-labelledby="create-distributor-tab">
							@include('distributors.partials._create_distributor_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection