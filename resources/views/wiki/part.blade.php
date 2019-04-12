@extends('layouts.main')

@section('title', 'Wiki - Part ' . $part->part_number)

@section('content')
	

	<div id="featured_image" class="carousel" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="/images/parts/headers/{{ $part->featured_image }}" alt="Featured Image">
				<div class="carousel-caption d-none d-md-block">
					@if($images->count())
						<a href="{{ route('wiki.part.images.publicIndex', $part->slug) }}" class="btn btn-sm btn-secondary">View More Pictures</a>
					@endif
					<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#partImageFormModal">Submit Pictures</a>
				</div>
			</div>
		</div>
	</div>

	@include('wiki.modals.partImageFormModal')

	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-8">
				<h1>{{ $part->name }}</h1>
				<hr>
				<p>
					{!! $part->description !!}
				</p>
				
				@if($part->reminder)
					<div class="card text-white bg-primary mb-3">
						<div class="card-header"><i class="fas fa-bell"></i> Reminders</div>
						<div class="card-body">
							<p class="card-text">{!! $part->reminder !!}</p>
						</div>
					</div>
				@endif
				@if($part->tip)
					<div class="card text-white bg-info mb-3">
						<div class="card-header"><i class="fas fa-info-circle"></i> Tips</div>
						<div class="card-body">
							<p class="card-text">{!! $part->tip !!}</p>
						</div>
					</div>
				@endif
				@if($part->warning)
					<div class="card text-white bg-danger mb-3">
						<div class="card-header"><i class="fas fa-exclamation-triangle"></i> Warnings</div>
						<div class="card-body">
							<p class="card-text">{!! $part->warning !!}</p>
						</div>
					</div>
				@endif
				@if($part->fun_fact)
					<div class="card text-white bg-warning mb-3">
						<div class="card-header"><i class="fas fa-lightbulb"></i> Fun Fact</div>
						<div class="card-body">
							<p class="card-text">{!! $part->fun_fact !!}</p>
						</div>
					</div>
				@endif

			</div>

			<div class="col-sm-4">
				
				<div class="card text-white bg-dark">
					<div class="card-body">
						<h5 class="card-title">Part Information</h5>
						<hr>
						<dl class="row">
							
							<dt class="col-sm-5">Part Number</dt>
							<dd class="col-sm-7">{{ $part->part_number }}</dd>
							
							<dt class="col-sm-5">Section</dt>
							<dd class="col-sm-7">
								<a href="{{ route('wiki.section', $part->section->slug) }}">{{ $part->section->name }}</a>
							</dd>
							
							<dt class="col-sm-5">Year</dt>
							<dd class="col-sm-7">{{ $part->year }}</dd>

							<dt class="col-sm-5">Production Start</dt>
							<dd class="col-sm-7">{{ $part->productionStart }}</dd>

							<dt class="col-sm-5">Production End</dt>
							<dd class="col-sm-7">{{ $part->productionEnd }}</dd>

							<dt class="col-sm-5">Body Type</dt>
							<dd class="col-sm-7">{{ $part->body_type }}</dd>
							
						</dl>

						
					</div> <!-- /.card-body -->
				</div> <!-- /.card -->
				
				<div class="card text-white bg-dark mt-3">
					<div class="card-body">
						<h5 class="card-title">Technical Information</h5>
						<hr>
						<dl class="row">

							<dt class="col-sm-5">Created</dt>
							<dd class="col-sm-7">{{ $part->created_at }}</dd>

							<dt class="col-sm-5">Updated</dt>
							<dd class="col-sm-7">{{ $part->updated_at }}</dd>

							<dt class="col-sm-5">Permalink</dt>
							<dd class="col-sm-7">
								<a href="{{ config('app.url') }}/wiki/part/{{ $part->part_number }}">
									Right Click To Save Link
								</a>
							</dd>	

						</dl>

						
					</div> <!-- /.card-body -->
				</div> <!-- /.card -->

			</div>
		</div>
	</div>
	

@endsection

@section('scripts')

	{{-- Image Upload Javascript --}}
	<script src="/js/imageupload.js"></script>

@endsection