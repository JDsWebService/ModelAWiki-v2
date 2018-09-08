@extends('layouts.admin')

@section('title', 'Create CRUD Permissions')

@section('stylesheets')
	
	{{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.permission.index') }}"><< Go Back</a>
	    </div>
	</div>
	
	{{ Form::crudPermissionForm('Create CRUD Permissions', $categories) }}

@endsection

@section('scripts')

	{{-- Select 2 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script>
	    $(document).ready(function() {
	        $('.category-select').select2({
			  tags: true
			});
	    });
	</script>

@endsection