@extends('layouts.admin')

@section('title', 'View Homepage Entry')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('admin.site.homepage.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $entry->title }}</h3>
			<hr>
			<p>{!! $entry->description !!}</p>
		</div>

		<div class="col-sm-5">

			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Technical Information</h5>
					<hr>
					<dl class="row">
						
						<dt class="col-sm-5">Type of Entry</dt>
						<dd class="col-sm-7">{{ $entry->type }}</dd>

						<dt class="col-sm-5">Created</dt>
						<dd class="col-sm-7">{{ $entry->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $entry->updated_at }}</dd>

						<dt class="col-sm-5">Image</dt>
						<dd class="col-sm-7">
							<a href="/images/homepage/{{ $entry->image }}" target="_blank">View Image</a>
						</dd>

						<dt class="col-sm-5">Image Resolution</dt>
						<dd class="col-sm-7 align-self-center">
							@switch($entry->type)
								@case('Carousel')
									1280 x 512
									@break
								@case('Card')
									140 x 140
									@break
								@case('Story')
									500 x 500
									@break
							@endswitch
						</dd>
						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							<a href="{{ route('admin.site.homepage.edit', $entry->id) }}" class="btn btn-block btn-info">
								<i class="far fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-sm-6">

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteEntryModal">
							  <i class="far fa-trash-alt"></i> Delete
							</button>

							<!-- Modal -->
							<div class="modal fade" id="deleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="deleteEntryLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="deleteEntryLabel">Delete "{{ $entry->title }}" Role?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Are you sure you want to delete this entry? After deletion you can not undo this change.</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
											{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.site.homepage.destroy', $entry->id]]) }}
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