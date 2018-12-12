@extends('layouts.main')

@section('title', 'Areas')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="areas-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-areas-tab" data-toggle="tab" href="#all-areas" role="tab" aria-controls="all-areas" aria-expanded="true">All Areas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-area-tab" data-toggle="tab" href="#create-area" role="tab" aria-controls="create-area">Create Area</a>
						</li>
					</ul>
					<div class="tab-content" id="areas-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-areas" role="tabpanel" aria-labelledby="all-areas-tab">
							@include('areas.partials._all_areas_tab')
						</div>

						<div class="tab-pane fade" id="create-area" role="tabpanel" aria-labelledby="create-area-tab">
							@include('areas.partials._create_area_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection