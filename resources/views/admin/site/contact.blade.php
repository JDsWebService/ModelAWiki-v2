@extends('layouts.admin')

@section('title', 'Contact Page Settings')

@section('content')

	@if($settings->count())
		{!! Form::model($settings, ['route' => ['admin.site.contact.update', $settings->id], 'method' => 'PUT']) !!}
	@else
		{!! Form::open(['route' => ['admin.site.contact.update'], 'method' => 'PUT']) !!}
	@endif

	{{ Form::label('Phone Number', null, ['class' => 'control-label']) }}
	{{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '412.555.1234']) }}

	{{ Form::label('Email Address', null, ['class' => 'control-label mt-3']) }}
	{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'test@example.com']) }}

	{{ Form::label('Address', null, ['class' => 'control-label mt-3']) }}
	{{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => '555 Some St. City, AA 12345']) }}

	<div class="row justify-content-center mt-3">
		<div class="col-sm-6 text-center">
		    {{-- Submit Button --}}
		    <button class="btn btn-block btn-success">Save Settings</button>
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('scripts')

    {{-- Tiny MCE --}}
    <script src="/js/tinymce/tinymce.min.js"></script>

@endsection