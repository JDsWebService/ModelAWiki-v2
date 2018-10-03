@extends('layouts.forum')

@section('title', 'Forum Post')

@section('content')

	    <div class="row">
	        <div class="col-sm-2 text-center p-2">
	        	@if($reply->user_id)
		        	<a href="{{ route('user.profile.public', $reply->user->username) }}">
		            	<img src="{{ $reply->user->profile_image }}" alt="{{ $reply->user->fullName }}'s Profile Picture" class="profile-image rounded-circle">
		        	</a>
		        @else
		        	<a href="{{ route('admin.profile.public', $reply->admin->username) }}">
		            	<img src="{{ $reply->admin->profile_image }}" alt="{{ $reply->admin->fullName }}'s Profile Picture" class="profile-image rounded-circle">
		        	</a>
	        	@endif
	        	<a href="" class="btn btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#reportReplyModal">
	        		<i class="far fa-flag"></i> Report
	        	</a>
	        	@if(
	        		Auth::guard('user')->user()->id === $reply->user_id
	        		or
	        		Auth::guard('admin')->check())
					<a href="" class="btn btn-primary btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#editReplyModal">
						<i class="fas fa-edit"></i> Edit
					</a>
					<a href="" class="btn btn-danger btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#deleteReplyModal">
						<i class="fas fa-trash-alt"></i> Delete
					</a>
	            @endif
	        </div>
	        <div class="col-sm-10 p-2">
	            <p>
	            	@if($reply->user_id)
	            		<small>Posted By <a href="{{ route('user.profile.public', $reply->user->username) }}">{{ $reply->user->fullName }}</a> {{ $reply->created_at }}</small>
	            	@else
	            		<small>Posted By <a href="{{ route('admin.profile.public', $reply->admin->username) }}">{{ $reply->admin->fullName }}</a> {{ $reply->created_at }}</small>
	            	@endif
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