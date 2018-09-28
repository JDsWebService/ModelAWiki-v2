@extends('layouts.admin')

@section('title', 'Create Part')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('part.section.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::partForm($sections, 'store', 'POST', 'Create Part') }}

@endsection

@section('scripts')
	
	{{-- Tiny MCE --}}
	<script src="/js/tinymce/tinymce.min.js"></script>

	{{-- Modals Clear without Saving --}}
	<script src="/js/partmodals.js"></script>

	{{-- Image Upload Javascript --}}
	<script src="/js/imageupload.js"></script>

@endsection