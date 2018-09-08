@extends('layouts.admin')

@section('title', 'Permissions Index')

@section('stylesheets')

	<style type="text/css">
		.buttons {
			font-size: 1.2em;
		}
		.buttons a:hover {
			color: #aaa;
		}
		.pagination {
			justify-content: center;
		}
	</style>

@endsection

@section('content')
	<div class="row justify-content-center mb-4">
		<div class="col-sm-3 text-center">
			<a href="{{ route('admin.permission.create.single') }}" class="btn btn-success btn-block btn-sm">Create Single Permission</a>
		</div>
		<div class="col-sm-3 text-center">
			<a href="{{ route('admin.permission.create.crud') }}" class="btn btn-success btn-block btn-sm">Create CRUD Permissions</a>
		</div>
	</div>

	@if($permissions->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Category</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions as $permission)
					<tr>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->category }}</td>
						<td>{{ $permission->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('admin.permission.show', $permission->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('admin.permission.edit', $permission->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $permissions->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new permission!
			</div>
		</div>
	@endif

@endsection