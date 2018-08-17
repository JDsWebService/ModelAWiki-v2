@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('category.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::categoryForm('store', 'POST', 'Create Category') }}

@endsection