<!-- Delete Forum Post Modal -->
<div class="modal fade" id="deleteReplyModal" tabindex="-1" role="dialog" aria-labelledby="deleteForumReplyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white rounded-0">
				<h5 class="modal-title" id="deleteForumReplyLabel">Delete Forum Reply</h5>
			</div>
				<div class="modal-body">
					Are you sure you want to delete your reply? This action can not be reversed!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
					{{ Form::open(['method'  => 'DELETE', 'route' => ['forum.reply.destroy', $post->slug, $reply->slug]]) }}
						<button type="submit" class="btn btn-danger rounded-0">
							<i class="fas fa-trash-alt"></i> Delete Reply
						</button>
					{{ Form::close() }}
				</div>
		</div>
	</div>
</div>