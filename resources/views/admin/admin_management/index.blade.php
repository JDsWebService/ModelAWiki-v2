@extends('layouts.admin')

@section('title', 'Admin Management Dashboard')

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
		<div class="col-sm-4 text-center">
			<a href="{{ route('user.manage.index') }}" class="btn btn-success btn-block btn-sm">
				<i class="fas fa-user-plus"></i>&nbsp;&nbsp;Assign Admin User
			</a>
		</div>
	</div>

		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Full Name</th>
					<th>eMail Address</th>
					<th>Created On</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($admins as $admin)
					<tr>
						<td style="width: 35%;">{{ $admin->fullName }}</td>
						<td style="width: 25%;">{{ $admin->email }}</td>
						<td style="width: 25%;">{{ $admin->created_at }}</td>
						<td class="buttons" style="width: 15%;">
							<a href="{{ route('admin.manage.show', $admin->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('admin.manage.edit', $admin->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $admins->links() }}
			</div>
		</div>

@endsection