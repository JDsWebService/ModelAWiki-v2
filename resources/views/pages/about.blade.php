@extends('layouts.main')

@section('title', 'About Us')

@section('content')

	<div class="row justify-content-center mt-3">
		<div class="col-sm-8">
			<h1>About Us</h1>
			<hr>
			
			@if($settings)
				@if($settings->mission_statement)
					<h3>Mission Statement</h3>
					<p>
						{!! $settings->mission_statement !!}
					</p>
				@endif
				
				@if($settings->our_story)
					<h3>Our Story</h3>
					<p>
						{!! $settings->our_story !!}
					</p>
				@endif
			@endif

			<h3>Team Members</h3>
			<div class="row justify-content-center">
				@foreach($admins as $admin)
					<div class="col-sm-4 text-center">
						<img class="rounded-circle" src="{{ $admin->profile_image }}" alt="{{ $admin->fullName }}'s Profile Image" width="140" height="140">
						<h5 class="mt-2">{{ $admin->fullName }}</h5>
						<p>
							@if($admin->roles->count())
								@foreach($admin->roles as $role)
									{{ $role->name }}
									<br>
								@endforeach
							@else
								No Roles Yet
							@endif
						</p>
					</div>
				@endforeach
			</div>

		</div>
	</div>

@endsection