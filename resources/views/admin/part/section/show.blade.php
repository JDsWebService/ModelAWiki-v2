@extends('layouts.admin')

@section('title', 'View Section')

@section('content')
	
	<div class="row mb-3">
	    <div class="col-sm-12">
	        <a href="{{ route('part.section.index') }}"><< Go Back</a>
	    </div>
	</div>

	<div class="row justify-content-center">

		<div class="col-sm-7">
			<h3>{{ $section->name }}</h3>
			<hr>
			
			@if($parts->count() != 0)
				<table class="table text-center table-hover table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Part Number</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($parts as $part)
							<tr>
								<td style="width: 55%;">{{ $part->name }}</td>
								<td style="width: 15%;">{{ $part->part_number }}</td>
								<td class="buttons" style="width: 15%;">
									<a href="{{ route('part.show', $part->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
									<a href="{{ route('part.edit', $part->id) }}"><i class="far fa-edit"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>

				<div class="row">
					<div class="col-sm-12">
						{{ $parts->links() }}
					</div>
				</div>	
			@else
				<div class="row justify-content-center">
					<div class="col-sm-8 text-center">
						<p>
							Nothing to show here!
							<br>
							Create a new part under this section!
						</p>
						<a href="#" class="btn btn-success">Create Part</a>
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
						<dd class="col-sm-7">{{ $section->created_at }}</dd>

						<dt class="col-sm-5">Updated</dt>
						<dd class="col-sm-7">{{ $section->updated_at }}</dd>

						<dt class="col-sm-5">Permalink</dt>
						<dd class="col-sm-7">
							<a href="{{ config('app.url') }}/wiki/part/section/{{ $section->slug }}">
								{{ config('app.url') }}/wiki/part/section/{{ $section->slug }}
							</a>
						</dd>

						
					</dl>

					<div class="row">
						<div class="col-sm-6">
							@can('part.section.edit', Auth::guard('admin')->user())
								<a href="{{ route('part.section.edit', $section->id) }}" class="btn btn-block btn-info">
									<i class="far fa-edit"></i> Edit
								</a>
							@endcan
						</div>
						<div class="col-sm-6">
							@can('part.section.delete', Auth::guard('admin')->user())
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteSectionModal">
								  <i class="far fa-trash-alt"></i> Delete
								</button>

								<!-- Modal -->
								<div class="modal fade" id="deleteSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Delete "{{ $section->name }}" Section?</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>By deleting the "{{ $section->name }}" section, you will delete <strong>ALL</strong> parts associated with this section.</p>
												<p>Are you sure you want to do that?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
												{{ Form::open(['method'  => 'DELETE', 'route' => ['part.section.destroy', $section->id]]) }}
													{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
												{{ Form::close() }}
											</div>
										</div>
									</div>
								</div>
							@endcan

						</div>
					</div>
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->




		</div> <!-- /.col-sm-5 -->

	</div> <!-- /.row -->

@endsection