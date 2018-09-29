@extends('layouts.admin')

@section('title', $category->name . ' Category')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-8">
			<div class="jumbotron text-center">
				<p class="lead">What would you like to do?</p>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('admin.forum.category.edit', $category->slug) }}" class="btn btn-block btn-primary">
							<i class="fas fa-edit"></i> Edit
						</a>
					</div>
					<div class="col-sm-6">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteForumCategoryModal">
						  <i class="far fa-trash-alt"></i> Delete
						</button>

						<!-- Modal -->
						<div class="modal fade" id="deleteForumCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteForumCategoryLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="deleteForumCategoryLabel">Delete "{{ $category->name }}" Category?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>By deleting the "{{ $category->name }}" category, this category will no longer be associated with <strong>ANY</strong> forum discussions and <strong>ALL</strong> discussion will be <strong>DELETED</strong>.</p>
										<p>Are you sure you want to do that?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Go Back</button>
										{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.forum.category.destroy', $category->id]]) }}
											{{Form::button('<i class="far fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
										{{ Form::close() }}
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>

@endsection