@extends('layouts.admin')

@section('title', 'Create Role')

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.role.index') }}"><< Go Back</a>
	    </div>
	</div>

	{{ Form::roleForm('store', 'POST', 'Create Role', $permissionsByCategory) }}

@endsection