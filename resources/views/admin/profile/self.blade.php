@extends('layouts.admin')

@section('title', 'Your Profile')

@section('stylesheets')

	<style type="text/css">
		
		.profile-image {
			height: 125px;
		}
	</style>

@endsection

@section('content')

	<div class="jumbotron text-center">
		<img src="{{ $user->profile_image }}" alt="Your Profile Image" class="profile-image border border-primary rounded-circle">
		<h2 class="mt-3">{{ $user->fullName }}</h2>
		<p>
			@if($user->roles()->count())
				{{ $user->roles()->first()->name }}
			@else
				<p>No Role</p>
			@endif
		</p>
		
		{{-- Social Media --}}
		@if($socialLinks)
		<p>
			@foreach($socialLinks as $link)
				<a href="{{ $link->link }}"><img src="{{ $link->icon }}" alt="{{ \Str::ucfirst($link->site) }}"></a>
			@endforeach
		</p>
		@endif
		<p>
			<a href="{{ route('admin.profile.social-links.index') }}" class="btn btn-sm btn-primary">
				<i class="fas fa-share-alt-square"></i> Edit Social Media Links
			</a>
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

	

@endsection