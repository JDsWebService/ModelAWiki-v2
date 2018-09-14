@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')

	@if($settings)
		{!! Form::model($settings, ['route' => ['admin.site.setting.update', $settings->id], 'method' => 'PUT']) !!}
	@else
		{!! Form::open(['route' => ['admin.site.setting.update'], 'method' => 'PUT']) !!}
	@endif

	{{ Form::label('Terms of Service', null, ['class' => 'control-label']) }}
	{{ Form::textarea('tos', null, ['class' => 'form-control']) }}

	{{ Form::label('Privacy Policy', null, ['class' => 'control-label mt-3']) }}
	{{ Form::textarea('privacy', null, ['class' => 'form-control']) }}

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