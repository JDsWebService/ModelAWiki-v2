@extends('layouts.forum')

@section('title', 'Forum Post - ' . $post->title)

@section('content')

	    <div class="row">
	        <div class="col-sm-2 text-center p-2">
	        	<a href="{{ route('user.profile.public', $post->user->username) }}">
	            	<img src="{{ $post->user->profile_image }}" alt="{{ $post->user->fullName }}'s Profile Picture" class="profile-image rounded-circle border border-secondary">
	        	</a>
	        	@if(Auth::guard('user')->user()->id === $post->user_id)
					<a href="" class="btn btn-primary btn-sm rounded-0 mt-2" data-toggle="modal" data-target="#editPostModal">
						<i class="fas fa-edit"></i> Edit Post
					</a>
					<a href="" class="btn btn-danger btn-sm rounded-0 mt-2" data-toggle="modal" data-target="#deletePostModal">
						<i class="fas fa-trash-alt"></i> Delete Post
					</a>
	            @endif
	        </div>
	        <div class="col-sm-10 p-2">
	            <h4>
	                {{ $post->title }}
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
	                {!! $post->body !!}
	            </p>
	        </div>
	    </div>
		
		{{-- Edit Post Modal --}}
		@include('forum.post.modals.edit')
	    
		{{-- Delete Post Modal --}}
	    @include('forum.post.modals.delete')

@endsection