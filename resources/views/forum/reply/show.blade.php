@extends('layouts.forum')

@section('title', 'Forum Post')

@section('content')

	    <div class="row">
	        <div class="col-sm-2 text-center p-2">
	        	<a href="{{ route('user.profile.public', $reply->user->username) }}">
	            	<img src="{{ $reply->user->profile_image }}" alt="{{ $reply->user->fullName }}'s Profile Picture" class="profile-image rounded-circle">
	        	</a>
	        	<a href="" class="btn btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#reportPostModal">
	        		<i class="far fa-flag"></i> Report
	        	</a>
	        	@if(Auth::guard('user')->user()->id === $reply->post->user_id)
					<a href="" class="btn btn-primary btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#editPostModal">
						<i class="fas fa-edit"></i> Edit
					</a>
					<a href="" class="btn btn-danger btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#deletePostModal">
						<i class="fas fa-trash-alt"></i> Delete
					</a>
	            @endif
	        </div>
	        <div class="col-sm-10 p-2">
	            <p>
	            	<small>Posted By <a href="{{ route('user.profile.public', $reply->user->username) }}">{{ $reply->user->fullName }}</a> {{ $reply->created_at }}</small>
	            </p>
	            <p>
	                {!! $reply->body !!}
	            </p>
	        </div>
	    </div>

	    {{-- Edit Reply Modal --}}
	    @include('forum.post.modals.editReply')
		
		{{-- Delete Reply Modal --}}
	    @include('forum.post.modals.deleteReply')

	    {{-- Report Reply Modal --}}
	    @include('forum.post.modals.reportReply')
@endsection