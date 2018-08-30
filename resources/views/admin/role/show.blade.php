@extends('layouts.admin')

@section('title', 'View Role')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.role.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $role->name }}</h3>
			<hr>
			@if($role->users->count())
				<table class="table text-center table-hover table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>eMail</th>
							<th>Created On</th>
						</tr>
					</thead>
					<tbody>
						@foreach($role->users as $user)
							<tr>
								<td>{{ $user->fullName }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>	
			@else
				<div class="row justify-content-center">
					<div class="col-sm-8 text-center">
						<p>
							Nothing to show here!
							<br>
							Add a User to this Role!
						</p>
						<a href="{{ route('admin.manage.index') }}" class="btn btn-success">Assign User A Role</a>
					</div>
				</div>
			@endif
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $role->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $role->updated_at }}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/role/{{ $role->slug }}">
								{{ config('app.url') }}/role/{{ $role->slug }}
							</a>
						</dd>

						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteRoleModal">
							  <i class="far fa-trash-alt"></i> Delete
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoleLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteRoleLabel">Delete "{{ $role->name }}" Role?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>By deleting the "{{ $role->name }}" role, this role will no longer be associated with <strong>ANY</strong> users.</p>
											<p>Are you sure you want to do that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
											{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.role.destroy', $role->id]]) }}
												{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
											{{ Form::close() }}
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->

			<div class="card mt-3">
				<div class="card-body">
					<h5 class="card-title">Permissions</h5>
					<hr>
					<dl class="row">

						@foreach($permissionsByCategory as $category => $permissions)
							
							<dt class="col-sm-5 text-right">{{ $category }}</dt>
							<dd class="col-sm-7">
								@foreach($permissions as $permission)
									@foreach($role->permissions as $role_permission)
										@if($role_permission->id == $permission->id)
											<span class="badge badge-pill badge-success">{{ $permission->name }}</span>
											<br>
										@endif
									@endforeach
									
								@endforeach
							</dd>
							
						@endforeach

					</dl>

				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection