@extends('layouts.admin')

@section('title', 'View Tag')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('tag.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $tag->name }}</h3>
			<hr>
			@if($tag->posts->count())
				<table class="table text-center table-hover table-striped">
					<thead>
						<tr>
							<th>Title</th>
							<th>Created At</th>
							<th>Published</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tag->posts as $post)
							<tr>
								<td>{{ $post->title }}</td>
								<td>{{ $post->created_at }}</td>
								<td>{{ $post->published_at }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>	
			@else
				<div class="row justify-content-center">
					<div class="col-sm-8 text-center">
						<p>
							Nothing to show here!
							<br>
							Create a new post under this category!
						</p>
						<a href="{{ route('post.create') }}" class="btn btn-success">Create Post</a>
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
						<dd class="col-sm-7">{{ $tag->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $tag->updated_at }}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/tag/{{ $tag->slug }}">
								{{ config('app.url') }}/tag/{{ $tag->slug }}
							</a>
						</dd>

						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">

							{{ Form::open(['method'  => 'DELETE', 'route' => ['tag.destroy', $tag->id]]) }}
								{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
							{{ Form::close() }}

						</div>
					</div>
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection