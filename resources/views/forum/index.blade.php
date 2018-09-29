@extends('layouts.forum')

@section('title', 'Forum Home')

@section('content')

	@if($posts->count())
		@foreach($posts as $post)
			<div class="post-preview-link">
			    <div class="row">
			        <div class="col-sm-2 text-center p-2">
			        	<a href="{{ route('user.profile.public', $post->user->username) }}">
			            	<img src="{{ $post->user->profile_image }}" alt="{{ $post->user->fullName }}'s Profile Picture" class="profile-image rounded-circle border border-secondary">
			        	</a>
			        </div>
			        <div class="col-sm-10 p-2">
			            <h4>
			                <a href="{{ route('forum.post.show', $post->slug) }}" class="text-black">{{ $post->title }}</a>
			                <small>
			                    <span class="badge badge-pill badge-category" style="background-color: {{ $post->category->color }};">
			                        {{ $post->category->name }}
			                    </span>
			                </small>
			            </h4>
			            <p>
			            	<small>Posted By <a href="{{ route('user.profile.public', $post->user->username) }}">{{ $post->user->fullName }}</a> {{ $post->created_at }}</small>
			            </p>
			            <p>
			                {!! strip_tags(htmlspecialchars_decode(str_limit($post->body, 150))) !!}
			            </p>
			        </div>
			    </div>
			</div>
		@endforeach

		<div class="row mt-3">
			<div class="col-sm-12">
				{{ $posts->links() }}
			</div>
		</div>
	@else
		<div class="row text-center">
			<div class="col-sm-12">
				<p class="lead">
					No Posts! Make one!
				</p>
			</div>
		</div>
	@endif

@endsection