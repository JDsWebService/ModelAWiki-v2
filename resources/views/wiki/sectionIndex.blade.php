@extends('layouts.main')

@section('title', 'Wiki - Sections')

@section('content')

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Parts Wiki</h1>
			<p class="lead text-muted">This is the most comprehensive Ford Model A online parts database. We have over 15,000 parts and counting! Help contribute to our database by creating a new account and submitting your content.</p>
			<p>
				<a href="{{ route('register') }}" class="btn btn-success my-2">Create New Account</a>
				<a href="#" class="btn btn-primary my-2">Submit New Entry</a>
			</p>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">

			<div class="row justify-content-center">

				@foreach($sections as $section)
					<div class="col-sm-4">
						<div class="card mb-4 shadow-sm">
							<img class="card-img-top" src="/images/sections/{{ $section->image }}">
							<div class="card-body text-center">
								<p class="card-text lead">{{ $section->name }}</p>
								<div class="col-sm-12">
									<div class="btn-group">
										<a href="{{ route('wiki.section', $section->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
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