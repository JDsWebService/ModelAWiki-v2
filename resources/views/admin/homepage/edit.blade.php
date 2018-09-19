@extends('layouts.admin')

@section('title', 'Edit Homepage Entry')

@section('stylesheets')
	
	{{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

	{!! Form::model($entry, ['route' => ['admin.site.homepage.update', $entry->id], 'method' => 'PUT', 'files' => true]) !!}

	{{ Form::label('Title', null, ['class' => 'control-label']) }}
	{{ Form::text('title', null, ['class' => 'form-control']) }}

	{{ Form::label('Description', null, ['class' => 'control-label mt-3']) }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}

	{{-- Image --}}
	{{ Form::label('image', 'Image:', ['class' => 'control-label mt-3']) }}
	<div class="input-group">
	    <label class="input-group-btn" style="margin-bottom: 0px;">
	        <span class="btn btn-primary">
	            <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="image">
	        </span>
	    </label>
	    <input type="text" class="form-control" style="color: white;" readonly>
	</div>

	{{ Form::label('Type', null, ['class' => 'control-label mt-3']) }}
	<select name="type" class="form-control type-select">
		<option value="" disabled selected>Select a Type...</option>
		<option value="Carousel" {{ $entry->type == 'Carousel' ? 'selected' : ''}}>Carousel</option>
		<option value="Card" {{ $entry->type == 'Card' ? 'selected' : ''}}>Card</option>
		<option value="Story" {{ $entry->type == 'Story' ? 'selected' : ''}}>Story</option>
	</select>
	
	{{-- Action Link --}}
	{{ Form::label('Link To:', null, ['class' => 'control-label mt-3']) }}
	{{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Use Full Link: http://example.com/something?variable=thisOrThat']) }}

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

    {{-- Select 2 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script>
	    $(document).ready(function() {
	        $('.type-select').select2();
	    });
	</script>

	{{-- Image Upload Javascript --}}
    <script src="/js/imageupload.js"></script>

@endsection