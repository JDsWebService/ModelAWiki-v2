@extends('layouts.main')

@section('title', 'Wiki - Part Section')

@section('content')

	<div class="container mt-3">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<h1>{{ $section->name }}</h1>
				<hr>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-sm-8">
				@foreach($parts as $part)
					
					<div class="row mt-2">
						<div class="col-sm-2">
							<img src="/images/parts/thumbnails/{{ $part->featured_image }}" alt="{{ $part->part_number }}">
						</div>
						<div class="col-sm-10 align-self-center">
							<h5>{{ $part->name }}</h5>
							<p><strong>Part Number:</strong> <small>{{ $part->part_number }}</small></p>
							<p>{{ $part->preview }}</p>
							<a href="{{ route('wiki.part', $part->part_number) }}" class="btn btn-sm btn-info">View Information</a>
						</div>
					</div>

					<hr>

				@endforeach

				<div class="row">
					<div class="col-sm-12">
						{{ $parts->links() }}
					</div>
				</div>	
			</div>
		</div>


	</div>
	

@endsection