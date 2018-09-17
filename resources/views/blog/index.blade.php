@extends('layouts.main')

@section('title', 'Blog Index')

@section('stylesheets')

	<style type="text/css">
		.btn-sm {
			padding: 0px 5px;
		}
	</style>

@endsection

@section('content')
	<div class="container mt-4">

			<div class="row">
				<div class="col-md-8 blog-main">
					<h3 class="pb-3 mb-4 font-italic border-bottom">
						Blog
					</h3>
					
					@if($posts->count() === 0)
						<p class="text-center">
							Nothing to show here yet!
						</p>
					@else

						@foreach($posts as $post)
							@if($loop->first)
								<div class="blog-post">
							@else
								<div class="blog-post mt-3">
							@endif
									<h2 class="blog-post-title">{{ $post->title }}</h2>
									<p class="blog-post-meta">{{ $post->published_at }} by {{ $post->user->full_name }}</p>
									
									<p>{!! $post->longPreview !!}</p>

									<a href="{{ route('blog.post', $post->slug) }}" class="btn btn-sm btn-secondary">Read More</a>
									<hr>
								</div><!-- /.blog-post -->
						@endforeach
						
						<nav class="pagination mt-3">
							{{ $posts->links() }}
						</nav>

					@endif

				</div><!-- /.blog-main -->

				<aside class="col-md-4 blog-sidebar">
					<div class="p-3 mb-3 bg-light rounded">
						<h4 class="font-italic">About</h4>
						<p class="mb-0">This is a collection of thoughts, ideas, and more from our team! Take the time to read some old legacy articles as well.</p>
					</div>

					{{-- <div class="p-3">
						<h4 class="font-italic">Archives</h4>
						<ol class="list-unstyled mb-0">
							<li><a href="#">March 2014</a></li>
							<li><a href="#">February 2014</a></li>
							<li><a href="#">January 2014</a></li>
							<li><a href="#">December 2013</a></li>
							<li><a href="#">November 2013</a></li>
							<li><a href="#">October 2013</a></li>
							<li><a href="#">September 2013</a></li>
							<li><a href="#">August 2013</a></li>
							<li><a href="#">July 2013</a></li>
							<li><a href="#">June 2013</a></li>
							<li><a href="#">May 2013</a></li>
							<li><a href="#">April 2013</a></li>
						</ol>
					</div> --}}

					<div class="p-3">
						<h4 class="font-italic">Elsewhere</h4>
						<ol class="list-unstyled">
							@foreach($socialLinks as $link)
								<li><a href="{{ $link->link }}">{{ $link->name }}</a></li>
							@endforeach
						</ol>
					</div>
				</aside><!-- /.blog-sidebar -->
			

			</div><!-- /.row -->


	</div> <!-- /.container -->
	


@endsection