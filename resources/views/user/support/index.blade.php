@extends('layouts.main')

@section('title', 'Support Messages')

@section('stylesheets')

	<style type="text/css">
		.status-image {
			width: 75px;
		}
	</style>

@endsection

@section('content')

	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-12">
				<h3>Your Support Messages</h3>
				<hr>
				
				@if($messages->count())
			    	@foreach($messages as $message)
			    		@switch($message->status)
							@case('open')
								<div class="bd-callout" style="border-left-color: #28a745;">
								@break
							@case('closed')
								<div class="bd-callout" style="border-left-color: #dc3545;">
								@break
							@case('needs_info')
								<div class="bd-callout" style="border-left-color: #ffc107;">
								@break
			    		@endswitch
			    		
		    			    <div class="row">
		    			        <div class="col-sm-2 text-center p-2">
		    			        	@switch($message->status)
										@case('open')
											<img src="/images/icons/support/open.png" alt="Status" class="status-image rounded-circle">
											@break
										@case('closed')
											<img src="/images/icons/support/closed.png" alt="Status" class="status-image rounded-circle">
											@break
										@case('needs_info')
											<img src="/images/icons/support/needs_info.png" alt="Status" class="status-image rounded-circle">
											@break
		    			        	@endswitch
	    			            	
		    			        </div>
		    			        <div class="col-sm-10 p-2">
		    			            <p>
		    			            	<strong>Type of Forum Message:</strong>
		    			            	@if($message->reply_id)
											Reply
		    			            	@else
											Post
		    			            	@endif
		    			            <br>
		    			            	<strong>Reason for Report:</strong>
		    			            	@switch($message->reason)
											@case('harassment')
												Harassment
												@break
											@case('hurtful')
												Hurtful
												@break
											@case('private_info')
												Contains Private Info
												@break
											@case('ban_evading')
												Ban Evading
												@break
											@case('explicit_language')
												Explicit Language
												@break
											@case('english_language')
												Not Using English Language
												@break
											@case('politics')
												Politics
												@break
											@case('mature')
												Mature Content
												@break
											@case('other')
												Other
												@break
		    			            	@endswitch
		    			            	<br>
		    			            	<strong>Created: </strong> {{ $message->created_at}}
		    			            	<br>
		    			            	<strong>Status: </strong>
		    			            	@switch($message->status)
											@case('open')
												Open
												@break
											@case('closed')
												Closed / Resolved
												@break
											@case('needs_info')
												Needs More Information
												<br>
												<a href="{{ route('user.support.viewReport', $message->id) }}" class="btn btn-primary btn-sm">Click To Respond</a>
												@break
		    			            	@endswitch
		    			            </p>
		    			        </div>
		    			    </div>
			    		</div>
					@endforeach
				@else
					<div class="row justify-content-center">
						<div class="col-sm-6">
							<p>
								Nothing To Show Here!
							</p>
						</div>
					</div>
				@endif


			</div>
		</div>
	</div>

@endsection