@extends('layouts.admin')

@section('title', 'User Management Dashboard')

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
			<a href="#" class="btn btn-success btn-block btn-sm">
				<i class="fas fa-user-plus"></i>&nbsp;&nbsp;Create Admin User
			</a>
		</div>
	</div>

	@if($users->count())
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
				@foreach($users as $user)
					<tr>
						<td style="width: 35%;">{{ $user->fullName }}</td>
						<td style="width: 25%;">{{ $user->email }}</td>
						<td style="width: 25%;">{{ $user->created_at }}</td>
						<td class="buttons" style="width: 15%;">
							<a href="{{ route('user.manage.show', $user->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="#"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $users->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Nobody has signed up to use the site!
			</div>
		</div>
	@endif

@endsection