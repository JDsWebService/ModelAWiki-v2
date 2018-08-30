@extends('layouts.admin')

@section('title', 'View Admin')

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
						<dd class="col-sm-7">{{ $admin->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $admin->updated_at }}</dd>

						<dt class="col-sm-5">eMail</dt>
						<dd class="col-sm-7">{{ $admin->email }}</dd>

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
						<div class="col-sm-6">
							<a href="{{ route('admin.manage.edit', $admin->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">

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