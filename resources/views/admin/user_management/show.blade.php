@extends('layouts.admin')

@section('title', 'View User')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('user.manage.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $user->fullName }}</h3>
			<hr>
			
			<div class="row justify-content-center">
				<div class="col-sm-8 text-center">
					
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
						<dd class="col-sm-7">{{ $user->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $user->updated_at }}</dd>

						<dt class="col-sm-5">eMail</dt>
						<dd class="col-sm-7">{{ $user->email }}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/user/{{ $user->id }}">
								{{ config('app.url') }}/user/{{ $user->id }}
							</a>
						</dd>

						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('user.manage.edit', $user->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">
							
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#banUserModal">
							  <i class="fas fa-gavel"></i> Ban
							</button>

							<!-- Modal -->
							<div class="modal fade" id="banUserModal" tabindex="-1" role="dialog" aria-labelledby="banUserLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="banUserLabel">Ban {{ $user->fullName }}?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>By banning this user, "{{ $user->fullName }}", this user will no longer be allowed to login, and will be placed on the blacklist.</p>
											<p>Are you sure you want to do that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
											{{ Form::open(['method'  => 'DELETE', 'route' => ['user.manage.ban', $user->id]]) }}
												{{Form::button('<i class="fas fa-gavel"></i> Ban', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
											{{ Form::close() }}
										</div>
									</div>
								</div>
							</div>

						</div> <!-- /.div-sm-6 -->
						
						@can('admin.global', Auth::guard('admin')->user())
							<div class="col-sm-12 mt-4">
								
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#makeUserAdminModal">
								  <i class="fas fa-user-shield"></i>&nbsp;&nbsp;Make Admin
								</button>

								<!-- Modal -->
								<div class="modal fade" id="makeUserAdminModal" tabindex="-1" role="dialog" aria-labelledby="makeUserAdminLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="makeUserAdminLabel">Make {{ $user->fullName }} an Administrator?</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>By making this user, "{{ $user->fullName }}", an administrator, you will grant them permission to the Administrator Backend.</p>
												<p>You will need to assign this user a role by clicking on the "Admin Management" link in the sidebar. If no role is added, this user will not be able to fullfill his/her duties as an Administrator!</p>
												<p>Are you sure you want to do that?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
												{{ Form::open(['method'  => 'POST', 'route' => ['user.manage.make-admin', $user->id]]) }}
													{{Form::button('<i class="fas fa-user-shield"></i> Make Admin', array('type' => 'submit', 'class' => 'btn btn-block btn-primary'))}}
												{{ Form::close() }}
											</div>
										</div>
									</div>
								</div>

							</div> <!-- /.div-sm-12 -->
						@endcan

					</div> <!-- /.row -->


				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection