@extends('layouts.admin')

@section('title', 'About Page Settings')

@section('content')

	@if($settings)
		{!! Form::model($settings, ['route' => ['admin.site.about.update', $settings->id], 'method' => 'PUT']) !!}
	@else
		{!! Form::open(['route' => ['admin.site.about.update'], 'method' => 'PUT']) !!}
	@endif

	{{ Form::label('Mission Statement', null, ['class' => 'control-label']) }}
	{{ Form::textarea('mission_statement', null, ['class' => 'form-control']) }}

	{{ Form::label('Our Story', null, ['class' => 'control-label mt-3']) }}
	{{ Form::textarea('our_story', null, ['class' => 'form-control']) }}

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