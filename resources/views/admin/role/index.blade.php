@extends('layouts.admin')

@section('title', 'Role Index')

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
			<a href="{{ route('admin.role.create') }}" class="btn btn-success btn-block btn-sm">Create Role</a>
		</div>
	</div>

	@if($roles->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
					<tr>
						<td>{{ $role->name }}</td>
						<td>{{ $role->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('admin.role.show', $role->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('admin.role.edit', $role->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $roles->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new role!
			</div>
		</div>
	@endif

@endsection