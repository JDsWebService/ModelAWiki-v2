@extends('layouts.admin')

@section('title', 'Homepage Types Information')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-9 align-self-center">
	        <a href="{{ route('admin.site.homepage.index') }}"><< Go Back</a>
	    </div>
	    <div class="col-sm-3 text-right">
			<a href="{{ route('admin.site.homepage.create') }}" class="btn btn-success btn-block btn-sm">Create Entry</a>
		</div>
	</div>

	<div class="row justify-content-center mb-4">
		<div class="col-sm-12">
			<h3>Carousel Example</h3>
			<p>A carousel image is 1280px by 512px. A description should be no longer then 300 characters long. Click on the image to view an example.</p>
			<a href="/images/homepage/carousel_example.png" target="_blank">
				<img class="w-50 h-50" src="/images/homepage/carousel_example.png" alt="Carousel Example Image">
			</a>
			<hr>
		</div>
		
		<div class="col-sm-12">
			<h3>Card Example</h3>
			<p>A card image is 140px by 140px. A description should be no longer then 300 characters long. Click on the image to view an example.</p>
			<a href="/images/homepage/card_example.png" target="_blank">
				<img src="/images/homepage/card_example.png" alt="Card Example Image">
			</a>
			<hr>
		</div>
		
		<div class="col-sm-12">
			<h3>Story Example</h3>
			<p>A story image is 500px by 500px. A description should be no longer then 300 characters long. Click on the image to view an example.</p>
			<a href="/images/homepage/story_example.png" target="_blank">
				<img class="w-50 h-50" src="/images/homepage/story_example.png" alt="Story Example Image">
			</a>
		</div>
		

	</div>

	

@endsection