@extends('layouts.forum')

@section('title', 'Forum Post - ' . $post->title)

@section('content')

	    <div class="row">
	        <div class="col-sm-2 text-center p-2">
	        	@if($post->user_id)
		        	<a href="{{ route('user.profile.public', $post->user->username) }}">
		            	<img src="{{ $post->user->profile_image }}" alt="{{ $post->user->fullName }}'s Profile Picture" class="profile-image rounded-circle">
		        	</a>
		        @else
		        	<a href="{{ route('admin.profile.public', $post->admin->username) }}">
		            	<img src="{{ $post->admin->profile_image }}" alt="{{ $post->admin->fullName }}'s Profile Picture" class="profile-image rounded-circle">
		        	</a>
	        	@endif
	        	<a href="" class="btn btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#reportPostModal">
	        		<i class="far fa-flag"></i> Report
	        	</a>
	        	@if(
	        		Auth::guard('user')->user()->id === $post->user_id
	        		or
	        		Auth::guard('admin')->check())
					<a href="" class="btn btn-primary btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#editPostModal">
						<i class="fas fa-edit"></i> Edit
					</a>
					<a href="" class="btn btn-danger btn-sm rounded-0 mt-1" data-toggle="modal" data-target="#deletePostModal">
						<i class="fas fa-trash-alt"></i> Delete
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
	            	@if($post->user_id)
	            		<small>Posted By <a href="{{ route('user.profile.public', $post->user->username) }}">{{ $post->user->fullName }}</a> {{ $post->created_at }}</small>
	            	@else
	            		<small>Posted By <a href="{{ route('admin.profile.public', $post->admin->username) }}">{{ $post->admin->fullName }}</a> {{ $post->created_at }}</small>
	            	@endif
	            </p>
	            <p>
	                {!! $post->body !!}
	            </p>
	            <p>
	            	@if($post->created_at != $post->updated_at)
						<small>Updated {{ $post->updated_at }}</small>
            		@endif
	            </p>
	        </div>
	    </div>

	    {{-- Post Replies --}}
	    @if($replies->count())
	    	<h4>Replies</h4>
	    	<hr>
	    	@foreach($replies as $reply)
	    		<div class="bd-callout" style="border-left-color: #6c757d;">
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
    							<a href="" class="btn btn-primary btn-sm rounded-0 mt-2" data-toggle="modal" data-target="#editReplyModal">
    								<i class="fas fa-edit"></i> Edit
    							</a>
    							<a href="" class="btn btn-danger btn-sm rounded-0 mt-2" data-toggle="modal" data-target="#deleteReplyModal">
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
    			            <p>
    			            	@if($reply->created_at != $reply->updated_at)
									<small>Updated {{ $reply->updated_at }}</small>
			            		@endif
    			            </p>
    			        </div>
    			    </div>
	    		</div>

	    		{{-- Edit Reply Modal --}}
	    		@include('forum.post.modals.editReply')

	    		{{-- Delete Reply Modal --}}
	    		@include('forum.post.modals.deleteReply')

	    		{{-- Report Reply Modal --}}
	    		@include('forum.post.modals.reportReply')
			@endforeach

			<div class="row justify-content-center">
				<div class="col-sm-12">
					{{ $replies->links() }}
				</div>
			</div>
	    @endif

	    {{-- Forum Reply Form --}}
	    <hr>
	    <div class="row justify-content-center">
	    	<div class="col-sm-12">
	    		{!! Form::open(['route' => ['forum.reply.store', $post->slug], 'method' => 'POST']) !!}
					
					{{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Reply to this user\'s post?']) }}
					
					<div class="row justify-content-center mt-2">
						<div class="col-sm-4">
							<button type="submit" class="btn btn-block btn-success rounded-0">
								<i class="fas fa-reply"></i> Post Your Reply
							</button>
						</div>
					</div>
	    		{!! Form::close() !!}
	    	</div>
	    </div>

		{{-- Edit Post Modal --}}
		@include('forum.post.modals.editPost')
	    
		{{-- Delete Post Modal --}}
	    @include('forum.post.modals.deletePost')

	    {{-- Report Post Modal --}}
	    @include('forum.post.modals.reportPost')

@endsection