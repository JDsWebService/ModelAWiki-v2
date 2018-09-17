@extends('layouts.admin')

@section('title', 'Create Social Media Link')

@section('content')

	{!! Form::open(['route' => ['admin.site.social-links.store'], 'method' => 'POST']) !!}

	{{ Form::label('Name of Site', null, ['class' => 'control-label']) }}
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Twitter, Facebook, Pintrest, etc.']) }}

	{{ Form::label('Link', null, ['class' => 'control-label mt-3']) }}
	{{ Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'http://website.com/username']) }}

	<div class="row justify-content-center mt-3">
		<div class="col-sm-6 text-center">
		    {{-- Submit Button --}}
		    <button class="btn btn-block btn-success">Save Link</button>
		</div>
	</div>

	{!! Form::close() !!}

@endsection