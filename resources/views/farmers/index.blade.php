@extends('layouts.main')

@section('title', 'Farmers')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="farmers-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-farmers-tab" data-toggle="tab" href="#all-farmers" role="tab" aria-controls="all-farmers" aria-expanded="true">All Farmers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-farmer-tab" data-toggle="tab" href="#create-farmer" role="tab" aria-controls="create-farmer">Create Farmer</a>
						</li>
					</ul>
					<div class="tab-content" id="farmers-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-farmers" role="tabpanel" aria-labelledby="all-farmers-tab">
							@include('farmers.partials._all_farmers_tab')
						</div>

						<div class="tab-pane fade" id="create-farmer" role="tabpanel" aria-labelledby="create-farmer-tab">
							@include('farmers.partials._create_farmer_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection