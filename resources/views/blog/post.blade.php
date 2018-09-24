@extends('layouts.main')

@section('title', 'Blog Post - ' . $post->title)

@section('stylesheets')

	<style type="text/css">
		.post-image {
			width: 100%;
		}
	</style>

@endsection

@section('content')

	<img class="d-block w-100" src="/images/posts/{{ $post->image }}" alt="Featured Image">		
	
	<div class="container">
		<div class="row justify-content-center mt-3">
			<div class="col-sm-8">
				<h2 class="blog-post-title">{{ $post->title }}</h2>
				@if($post->subtitle)
					<h4>{{ $post->subtitle }}</h4>
				@endif

				<p class="blog-post-meta">
					{{ $post->published_at }} by <a href="{{ route('admin.profile.public', $post->user->id) }}">{{ $post->user->full_name }}</a> in <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
				</p>
				
				<p>{!! $post->body !!}</p>

				<hr>

				@foreach($post->tags as $tag)
					<span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
				@endforeach	
			</div>
		</div>
	</div>
	

@endsection