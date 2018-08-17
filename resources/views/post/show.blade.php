@extends('layouts.admin')

@section('title', 'View Post')

@section('content')
	
	<div class="row mb-3">
        <div class="col-sm-12">
            <a href="{{ route('post.index') }}"><< Go Back</a>
        </div>
    </div>

	<div class="row justify-content-center">

		<div class="col-sm-7">

			<h3>{{ $post->title }}</h3>
			@if(!is_null($post->subtitle))
				<h6>{{ $post->subtitle }}</h6>
			@endif
			<hr>
			{!! $post->body !!}
			<div class="tags mt-3">
				@foreach($post->tags as $tag)
					<span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
				@endforeach	
			</div>
			
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">
						<dt class="col-sm-5">Published</dt>
						<dd class="col-sm-7">{{ $post->published_at }}</dd>

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $post->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $post->updated_at }}</dd>

						<dt class="col-sm-5">Created By</dt>
						<dd class="col-sm-7">
							{{ $post->user->fullName }}
						</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/blog/{{ $post->slug }}">
								{{ config('app.url') }}/blog/{{ $post->slug }}
							</a>
						</dd>

						<dt class="col-sm-5">Category</dt>
						<dd class="col-sm-7">
							<a href="#">{{ $post->category->name }}</a>
						</dd>
						
						@if($post->image != 'placeholder.png')
							<dt class="col-sm-5">Image</dt>
							<dd class="col-sm-7">
								<a href="/images/posts/{{ $post->image }}">View Image</a>
							</dd>
						@endif
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('post.edit', $post->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">
							{{ Form::open(['method'  => 'DELETE', 'route' => ['post.destroy', $post->id]]) }}
								{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
							{{ Form::close() }}
						</div>
					</div>
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection