@extends('layouts.admin')

@section('title', 'Create Tag')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('tag.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::tagForm('store', 'POST', 'Create Tag') }}

@endsection