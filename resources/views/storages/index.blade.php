@extends('layouts.main')

@section('title', 'Storages')

@section('body')
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<div class="card" style="padding: 30px 0">
				<div class="container-fluid">
					<ul class="nav nav-tabs" id="storages-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="all-storages-tab" data-toggle="tab" href="#all-storages" role="tab" aria-controls="all-storages" aria-expanded="true">All Storages</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="create-storage-tab" data-toggle="tab" href="#create-storage" role="tab" aria-controls="create-storage">Create Storage</a>
						</li>
					</ul>
					<div class="tab-content" id="storages-tab-content">
						<br>
						<div class="tab-pane fade show active" id="all-storages" role="tabpanel" aria-labelledby="all-storages-tab">
							@include('storages.partials._all_storages_tab')
						</div>

						<div class="tab-pane fade" id="create-storage" role="tabpanel" aria-labelledby="create-storage-tab">
							@include('storages.partials._create_storage_tab')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection