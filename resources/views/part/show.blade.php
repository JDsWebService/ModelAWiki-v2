@extends('layouts.admin')

@section('title', 'View Part')

@section('content')
	
	<div class="row mb-3">
        <div class="col-sm-12">
            <a href="{{ route('part.index') }}"><< Go Back</a>
        </div>
    </div>

	<div class="row justify-content-center">

		<div class="col-sm-7">

			<h3>{{ $part->name }}</h3>
			<hr>
			{!! $part->description !!}
			
			@if($part->featured_image != 'placeholder.png')
				<div class="row">
					<div class="col-sm-12 text-center">
						<hr>
						<h5>Part Image Thumbnail</h5>
						<a href="/images/parts/originals/{{ $part->featured_image }}">
							<img src="/images/parts/thumbnails/{{ $part->featured_image }}" alt="Part Number {{ $part->part_number }} Image">
						</a>
					</div>
				</div>
			@endif
			
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $part->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $part->updated_at }}</dd>

						<dt class="col-sm-5">Part Number</dt>
						<dd class="col-sm-7">{{ $part->part_number }}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/wiki/part/{{ $part->slug }}">
								{{ config('app.url') }}/wiki/part/{{ $part->slug }}
							</a>
						</dd>

						<dt class="col-sm-5">Section</dt>
						<dd class="col-sm-7">
							<a href="{{ route('part.section.show', $part->section->id) }}">{{ $part->section->name }}</a>
						</dd>
						
						@if($part->featured_image == 'placeholder.png')
							<dt class="col-sm-5">Image</dt>
							<dd class="col-sm-7">
								No Image Available
							</dd>
						@endif
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('part.edit', $part->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">
							{{ Form::open(['method'  => 'DELETE', 'route' => ['part.destroy', $part->id]]) }}
								{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
							{{ Form::close() }}
						</div>
					</div>
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection