@extends('layouts.admin')

@section('title', 'Posts Index')

@section('stylesheets')

	<style type="text/css">
		.buttons {
			font-size: 1.2em;
		}
		.buttons a:hover {
			color: #aaa;
		}
		.pagination {
			justify-content: center;
		}
	</style>

@endsection

@section('content')
	<div class="row justify-content-center mb-4">
		<div class="col-sm-2 text-center">
			<a href="{{ route('post.create') }}" class="btn btn-success btn-block btn-sm">Create Post</a>
		</div>
	</div>

	@if($posts->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Created At</th>
					<th>Published</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->created_at }}</td>
						<td>{{ $post->published_at }}</td>
						<td class="buttons">
							<a href="{{ route('post.show', $post->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('post.edit', $post->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $posts->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new post!
			</div>
		</div>
	@endif

@endsection