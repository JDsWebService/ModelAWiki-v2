@extends('layouts.admin')

@section('title', 'Edit Social Media Link')

@section('content')

	{!! Form::model($link, ['route' => ['admin.site.social-links.update', $link->id], 'method' => 'PUT']) !!}

	{{ Form::label('Name of Site', null, ['class' => 'control-label']) }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}

	{{ Form::label('Link', null, ['class' => 'control-label mt-3']) }}
	{{ Form::text('link', null, ['class' => 'form-control']) }}

	<div class="row justify-content-center mt-3">
		<div class="col-sm-6 text-center">
		    {{-- Submit Button --}}
		    <button class="btn btn-block btn-success">Save Link</button>
		</div>
	</div>

	{!! Form::close() !!}

@endsection