@extends('layouts.main')

@section('title', 'Admin Public Profile')

@section('stylesheets')

	<style type="text/css">
		
		.profile-image {
			height: 125px;
		}
	</style>

@endsection

@section('content')
	
	<div class="container mt-3">
		<div class="jumbotron text-center">

			<img src="{{ $user->profile_image }}" alt="Your Profile Image" class="profile-image border border-secondary rounded-circle">
			<h2 class="mt-3">{{ $user->fullName }}</h2>
			<p>
				@if($user->roles()->count())
					{{ $user->roles()->first()->name }}
				@else
					<p>No Role</p>
				@endif
			</p>
			
			{{-- Social Media --}}
			<p>
				<a href="#"><img src="/images/icons/facebook.png" alt="Facebook"></a>
				<a href="#"><img src="/images/icons/google-plus.png" alt="Google Plus"></a>
				<a href="#"><img src="/images/icons/instagram.png" alt="Instagram"></a>
				<a href="#"><img src="/images/icons/pinterest.png" alt="Pinterest"></a>
				<a href="#"><img src="/images/icons/twitter.png" alt="Twitter"></a>
			</p>

			{{-- Username and Email --}}
			<div class="row justify-content-center">
				<div class="col-sm-4">
					<i class="fas fa-user"></i> {{ '@' . $user->username }}
				</div>
				<div class="col-sm-4">
					<i class="fas fa-envelope"></i> {{ $user->email }}
				</div>
			</div>

		</div>

		{{-- Contributions --}}
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				<h4>Blog Posts</h4>
				<hr>
				@if($posts->count())
					@foreach($posts as $post)
						<a href="{{ route('blog.post', $post->slug) }}">{{ $post->title }}</a>
						<br>
					@endforeach

					<nav class="pagination mt-3">
						{{ $posts->links() }}
					</nav>
				@else
					No Posts Yet
				@endif
			</div>
		</div>
	</div>

@endsection