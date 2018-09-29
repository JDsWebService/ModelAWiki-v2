<!-- Edit Forum Post Modal -->
<div class="modal fade" id="editReplyModal" tabindex="-1" role="dialog" aria-labelledby="editForumReplyLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-secondary text-white rounded-0">
				<h5 class="modal-title" id="editForumReplyLabel">Edit Forum Reply</h5>
			</div>
			{!! Form::model($reply, ['route' => ['forum.reply.update', $post->slug, $reply->slug], 'method' => 'PUT']) !!}
				<div class="modal-body">
					{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Your Post Content Goes Here...']) }}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Discard</button>
					<button type="submit" class="btn btn-success rounded-0">Save Reply</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>