@extends('layouts.admin')

@section('title', 'Edit Section')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('part.section.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::partSectionForm('update', 'PUT', 'Save Section', $section, $section->id) }}

@endsection

@section('scripts')

	{{-- Image Upload Javascript --}}
	<script src="/js/imageupload.js"></script>

@endsection