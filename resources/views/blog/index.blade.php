@extends('layouts.main')

@section('title', 'Blog Index')

@section('content')

	<div class="row">
		<div class="col-sm-10 offset-sm-1">
			<h2>Blog</h2>

			<hr>

			<div class="row">
				<div class="col-sm-12">
					@foreach($posts as $post)
						{{ $post->title }}
					@endforeach
				</div>
			</div> <!-- /.row -->

		</div> <!-- /.col-sm-10.offset-sm-2 -->
	</div> <!-- /.row -->

@endsection