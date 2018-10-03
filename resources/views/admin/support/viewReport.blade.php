@extends('layouts.admin')

@section('title', 'View Report')

@section('stylesheets')

	<style type="text/css">
		.status-image {
			width: 75px;
		}
		.profile-image {
			width: 100px;
		}
	</style>

@endsection

@section('content')

	<div class="row mt-3">
		<div class="col-sm-12">
			
				<div class="row">
					<div class="col-sm-1">
						@switch($message->status)
							@case('open')
								<img src="/images/icons/support/open.png" alt="Status: Open" class="status-image">
								@break
							@case('closed')
								<img src="/images/icons/support/closed.png" alt="Status: Open" class="status-image">
								@break
							@case('needs_info')
								<img src="/images/icons/support/needs_info.png" alt="Status: Open" class="status-image">
								@break
						@endswitch
					</div>
					<div class="col-sm-11">
						@switch($message->status)
							@case('open')
								<h3>Status: <small>Open</small></h3>
								@break
							@case('closed')
								<h3>Status: <small>Closed</small></h3>
								@break
							@case('needs_info')
								<h3>Status: <small>Needs Information</small></h3>
								@break
						@endswitch
						
						<h3>
							Reason: 
							@switch($message->reason)
								@case('harassment')
									<small>Harassment</small>
									@break
								@case('hurtful')
									<small>Hurtful</small>
									@break
								@case('private_info')
									<small>Contains Private Info</small>
									@break
								@case('ban_evading')
									<small>Ban Evading</small>
									@break
								@case('explicit_language')
									<small>Explicit Language</small>
									@break
								@case('english_language')
									<small>Not Using English Language</small>
									@break
								@case('politics')
									<small>Politics</small>
									@break
								@case('mature')
									<small>Mature Content</small>
									@break
								@case('other')
									<small>Other</small>
									@break
			            	@endswitch
		            	</h3>

						<h3>Reported Item: </h3>
						@if($message->reply_id)
							<a href="{{ route('forum.reply.show', $message->reply->slug) }}" class="btn btn-sm btn-primary">View Item</a>
						@else
							<a href="{{ route('forum.post.show', $message->post->slug) }}" class="btn btn-sm btn-primary">View Item</a>
						@endif
						<hr>
							
							<div class="row">
								
								<div class="col-sm-6">
									<a href="#" class="btn btn-block btn-warning" data-toggle="modal" data-target="#requestInfoModal">
										Ask For More Info
									</a>
								</div>
								
								{{-- Needs Information Modal --}}
								@include('admin.support.modals.requestInfo')

								<div class="col-sm-6">
									<a href="{{ route('admin.support.closeReport', $message->id) }}" class="btn btn-block btn-danger">Close Report</a>
								</div>

							</div>

						<hr>

						{{-- Original Message --}}
						<div class="bd-callout" style="border-left-color: #6c757d;">
							
							<div class="row">
								<div class="col-sm-2 p-2 text-center">
									<img src="{{ $message->user->profile_image }}" class="profile-image rounded-circle">
								</div>

								<div class="col-sm-10">
									
									<h4>{{ $message->user->fullName }}</h4>
									Created {{ $message->created_at }}
									<p>
										{{ $message->message }}
									</p>

								</div>
							</div>

						</div>

						{{-- Responses --}}
						@if($responses->count())
							<h4>Responses</h4>
							@foreach($responses as $response)
								<div class="bd-callout" style="border-left-color: #ffc107;">
									
									<div class="row">
										<div class="col-sm-2 p-2 text-center">
											@if($response->admin_id)
												<img src="{{ $response->admin->profile_image }}" class="profile-image rounded-circle">
											@else
												<img src="{{ $response->user->profile_image }}" class="profile-image rounded-circle">
											@endif
										</div>

										<div class="col-sm-10">
											
											@if($response->admin_id)
												<h4>{{ $response->admin->fullName }}</h4>
											@else
												<h4>{{ $response->user->fullName }}</h4>
											@endif
											Created {{ $response->created_at }}
											<p>
												{{ $response->message }}
											</p>

										</div>
									</div>

								</div>
							@endforeach
						@endif

					</div>
				</div>

		</div>
	</div>

@endsection

@section('scripts')

	{{-- Tiny MCE --}}
	<script src="/js/tinymce/tinymce.min.js"></script>

@endsection