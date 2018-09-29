<!-- Create Forum Post Modal -->
<div class="modal fade" id="createForumPostModal" tabindex="-1" role="dialog" aria-labelledby="createForumPostLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success text-white rounded-0">
				<h5 class="modal-title" id="createForumPostLabel">Create New Forum Post</h5>
			</div>
			{!! Form::open(['route' => 'forum.post.store', 'method' => 'POST']) !!}
				<div class="modal-body">
					
					{{ Form::label('title', 'Title', ['class' => 'control-label']) }}
					{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post Title']) }}

					{{ Form::label('category_id', 'Category', ['class' => 'control-label mt-2']) }}
					<select name="category_id" class="form-control">
						<option disabled selected>Select A Forum Category...</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>

					{{ Form::label('body', 'Body', ['class' => 'control-label mt-2']) }}
					{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Your Post Content Goes Here...']) }}

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Discard</button>
					<button type="submit" class="btn btn-success rounded-0">Create Post</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>