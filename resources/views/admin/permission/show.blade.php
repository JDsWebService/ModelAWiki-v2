@extends('layouts.admin')

@section('title', 'View Permission')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.permission.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $permission->category }} - {{ $permission->name }}</h3>
			<hr>
			<p>{{ $permission->description }}</p>
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">
						
						<dt class="col-sm-5">Category</dt>
						<dd class="col-sm-7">{{ $permission->category }}</dd>

						<dt class="col-sm-5">Slug</dt>
						<dd class="col-sm-7">{{ $permission->slug }}</dd>

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $permission->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $permission->updated_at }}</dd>
						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deletePermissionModal">
							  <i class="far fa-trash-alt"></i> Delete
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deletePermissionModal" tabindex="-1" role="dialog" aria-labelledby="deletePermissionLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deletePermissionLabel">Delete "{{ $permission->name }}" Permission?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>By deleting the "{{ $permission->name }}" permission, this permission will no longer be associated with <strong>ANY</strong> Roles.</p>
											<p>Are you sure you want to do that?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
											{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.permission.destroy', $permission->id]]) }}
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




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection