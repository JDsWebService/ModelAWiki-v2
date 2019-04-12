@extends('layouts.main')

@section('title', 'Wiki - Sections')

@section('stylesheets')

	<style type="text/css">
		.thumbnail-image {
			width: 100px;
		}
	</style>

@endsection

@section('content')

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">{{ $part->name }}</h1>
			<p class="lead text-muted">#{{ $part->part_number }}</p>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row justify-content-center">
				{{-- Featured Image First --}}
				<div class="col-sm-3 d-flex align-items-stretch">
					<div class="card w-100 align-items-center image-card mb-4 shadow-sm">
						<img class="card-img-top mt-4 thumbnail-image" src="/images/parts/thumbnails/{{ $part->featured_image }}">
						<div class="card-body text-center d-flex flex-column">
							<div class="mt-auto">
								<p class="card-text">Featured Image</p>
								
								<div class="btn-group">
									<a href="#" class="btn btn-sm btn-outline-secondary">View</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				{{-- User Submitted Images --}}
				@foreach($images as $image)
						<div class="col-sm-3 d-flex align-items-stretch">
							<div class="card w-100 align-items-center image-card mb-4 shadow-sm">
								<img class="card-img-top mt-4 thumbnail-image" src="/images/parts/thumbnails/{{ $image->image }}">
								<div class="card-body text-center d-flex flex-column">
									<div class="mt-auto">
										<p class="card-text">{{ $image->caption }}</p>
										
										<div class="btn-group">
											<a href="#" class="btn btn-sm btn-outline-secondary">View</a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
				@endforeach
				
			</div>
		</div>
	</div>

@endsection