@extends('layouts.admin')

@section('title', 'Edit Admin')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.manage.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $admin->fullName }}</h3>
			<hr>
			
			<div class="row justify-content-center">
				<div class="col-sm-10 text-center">
					{!! Form::model($admin, ['route' => ['admin.manage.update', $admin->id], 'method' => 'PUT']) !!}

					    {{ Form::label('first_name', null, ['class' => 'control-label mt-3']) }}
					    {{ Form::text('first_name', null, ['class' => 'form-control']) }}

					    {{ Form::label('last_name', null, ['class' => 'control-label mt-3']) }}
					    {{ Form::text('last_name', null, ['class' => 'form-control']) }}

					    {{ Form::label('email', null, ['class' => 'control-label mt-3']) }}
					    {{ Form::text('email', null, ['class' => 'form-control']) }}

					    {{ Form::label('username', null, ['class' => 'control-label mt-3']) }}
					    <div class="input-group">
					    	<div class="input-group-prepend">
					    		<span class="input-group-text" id="username_addon">@</span>
					    	</div>
					    	{{ Form::text('username', null, ['class' => 'form-control form-control-lg', 'aria-describedby' => 'username_addon', 'placeholder' => 'Username']) }}
					    </div>

					    <h4 class="mt-3">Roles</h4>
					    <hr>
						
						@if($roles->count())
							<div class="row justify-content-center">
								@foreach($roles as $role)
									<div class="col-sm-4">
										<input type="checkbox" name="roles[]" value="{{ $role->id }}"
										@foreach($admin->roles as $admin_role)
											@if($admin_role->id == $role->id)
												checked
											@endif
										@endforeach
										>&nbsp;&nbsp;{{ $role->name }}
									</div>
								@endforeach
							</div>
						@else
							<p>No Roles Exist. Please create one first!</p>
							<a href="{{ route('admin.role.create') }}" class="btn btn-primary btn-block">Create New Role</a>
						@endif
						
						<hr>
						<div class="row justify-content-center">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-block btn-success mt-2">
									<i class="far fa-save"></i>&nbsp;&nbsp;Save Changes
								</button>		
							</div>
						</div>
					    
					{!! Form::close() !!}
				</div>
			</div>
			
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $admin->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $admin->updated_at }}</dd>

						<dt class="col-sm-5">Active</dt>
						<dd class="col-sm-7">{!! $admin->active !!}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/admin/{{ $admin->id }}/profile">
								{{ config('app.url') }}/admin/{{ $admin->id }}/profile
							</a>
						</dd>

						
					</dl>

					<div class="row">

						<div class="col-sm-12">

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deactivateAdminModal">
							  <i class="fas fa-lock"></i>&nbsp;&nbsp;Deactivate
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deactivateAdminModal" tabindex="-1" role="dialog" aria-labelledby="deactivateAdminLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deactivateAdminLabel">Deactivate {{ $admin->fullName }}?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>By deactivating this admin, "{{ $admin->fullName }}", this admin will no longer be allowed to login to the Admin Backend.</p>
											<p>Are you sure you want to do that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
											{{ Form::open(['method'  => 'POST', 'route' => ['admin.manage.deactivate', $admin->id]]) }}
												{{Form::button('<i class="fas fa-lock"></i> Deactivate', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
											{{ Form::close() }}
										</div>
									</div>
								</div>
							</div>

						</div> <!-- /.div-sm-6 -->

					</div> <!-- /.row -->


				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection