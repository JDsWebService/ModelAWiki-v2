@extends('layouts.main')

@section('title', $user->fullName . ' Public Profile')

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

			<img src="{{ $user->profile_image }}" alt="{{ $user->fullName }}'s Profile Image" class="profile-image border border-secondary rounded-circle">
			<h2 class="mt-3">{{ $user->fullName }}</h2>
			
			@if($socialLinks)
			<p>
				@foreach($socialLinks as $link)
					<a href="{{ $link->link }}"><img src="{{ $link->icon }}" alt="{{ \Str::ucfirst($link->site) }}"></a>
				@endforeach
			</p>
			@endif

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

		
	</div>

@endsection