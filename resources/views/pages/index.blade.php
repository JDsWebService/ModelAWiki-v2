@extends('layouts.main')

@section('title', 'Home')

@section('content')
	
	@if($carousels->count())
		<div id="indexCarousel" class="carousel slide" data-ride="carousel">
			
			<div class="carousel-inner">
				@foreach($carousels as $carousel)
				<div class="carousel-item {{ $loop->first() ? 'active' : '' }}">
					<img src="/images/homepage/{{ $carousel->image }}">
					<div class="container">
						<div class="carousel-caption text-left">
							<h1>{{ $carousel->title }}</h1>
							<p>{!! $carousel->description !!}</p>
							@if($carousel->url)
								<p>
									<a class="btn btn-lg btn-primary" href="{{ $carousel->url }}" role="button">Learn More</a>
								</p>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#indexCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#indexCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
	@endif

	
	<div class="container mt-5">

		{{-- Cards --}}
		@if($cards->count())
			<div class="row justify-content-center text-center">

				@foreach($cards as $card)
					<div class="col-lg-4">
						<img class="rounded-circle" src="/images/homepage/{{ $card->image }}" width="140" height="140">
						<h2>{{ $card->title }}</h2>
						<p>
							{!! $card->description !!}
						</p>
						@if($card->url)
							<p>
								<a class="btn btn-secondary" href="{{ $card->url }}" role="button">Learn More</a>
							</p>
						@endif
					</div><!-- /.col-lg-4 -->
				@endforeach
				
			</div><!-- /.row -->
		@endif
		
		{{-- Stories --}}
		@if($stories->count())
			@foreach($stories as $story)
				@if($loop->iteration != 1)
					<hr>
				@endif
				
				<div class="row">
					<div class="col-md-7 align-self-center {{ $loop->iteration % 2 ? 'order-md-2' : '' }}">
						<h2>{{ $story->title }}</h2>
						<p class="lead">
							{!! $story->description !!}
						</p>
						@if($story->url)
							<p>
								<a class="btn btn-secondary" href="{{ $story->url }}" role="button">Learn More</a>
							</p>
						@endif
					</div>
					<div class="col-md-5 {{ $loop->iteration % 2 ? 'order-md-1' : '' }}">
						<img class="img-fluid mx-auto" src="/images/homepage/{{ $story->image }}">
					</div>
				</div>

			@endforeach
		@endif

	</div><!-- /.container -->

	@if($carousels->count() == 0 and $cards->count() == 0 and $stories->count() == 0)
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead">
					Coming soon!
				</p>
			</div>
		</div>
	@endif
        
@endsection
