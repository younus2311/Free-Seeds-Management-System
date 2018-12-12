@extends('layouts.main')

@section('title', 'Seeds')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="seeds-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-seeds-tab" data-toggle="tab" href="#all-seeds" role="tab" aria-controls="all-seeds" aria-expanded="true">All Seeds</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-seed-tab" data-toggle="tab" href="#create-seed" role="tab" aria-controls="create-seed">Create Seed</a>
						</li>
					</ul>
					<div class="tab-content" id="seeds-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-seeds" role="tabpanel" aria-labelledby="all-seeds-tab">
							@include('seeds.partials._all_seeds_tab')
						</div>

						<div class="tab-pane fade" id="create-seed" role="tabpanel" aria-labelledby="create-seed-tab">
							@include('seeds.partials._create_seed_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection