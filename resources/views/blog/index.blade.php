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

	<div class="row">
		<div class="col-sm-8 offset-sm-2">
			<h2>Blog</h2>

			<hr>
			@foreach($posts as $post)
				<h3>{{ $post->title }}</h3>
				<p class="lead">{{ $post->subtitle }}</p>
				<p>{{ $post->preview }}</p>
				<p>Published: <small>{{ $post->published_at }}</small></p>
				<a href="#" class="btn btn-sm btn-secondary">Read More ></a>
				<hr>
			@endforeach

		</div> <!-- /.col-sm-10.offset-sm-2 -->
	</div> <!-- /.row -->

@endsection