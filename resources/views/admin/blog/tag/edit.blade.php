@extends('layouts.admin')

@section('title', 'Edit Tag')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('tag.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::tagForm('update', 'PUT', 'Save Tag', $tag, $tag->id) }}

@endsection