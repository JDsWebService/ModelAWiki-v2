<!-- Delete Forum Post Modal -->
<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deleteForumPostLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white rounded-0">
				<h5 class="modal-title" id="deleteForumPostLabel">Delete Forum Post</h5>
			</div>
				<div class="modal-body">
					Are you sure you want to delete your post? This action can not be reversed!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
					{{ Form::open(['method'  => 'DELETE', 'route' => ['forum.post.destroy', $post->slug]]) }}
						<button type="submit" class="btn btn-danger rounded-0">
							<i class="fas fa-trash-alt"></i> Delete Post
						</button>
					{{ Form::close() }}
				</div>
		</div>
	</div>
</div>