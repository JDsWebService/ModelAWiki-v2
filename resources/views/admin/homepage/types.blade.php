@extends('layouts.admin')

@section('title', 'Homepage Types Information')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-9 align-self-center">
	        <a href="{{ route('admin.site.homepage.index') }}"><< Go Back</a>
	    </div>
	    <div class="col-sm-3 text-right">
			<a href="{{ route('admin.site.homepage.create') }}" class="btn btn-success btn-block btn-sm">Create Entry</a>
		</div>
	</div>

	<div class="row justify-content-center mb-4">
		
	</div>

	

@endsection