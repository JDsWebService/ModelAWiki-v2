<!-- Create Forum Post Modal -->
<div class="modal fade" id="reportPostModal" tabindex="-1" role="dialog" aria-labelledby="reportPostLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning text-white rounded-0">
				<h5 class="modal-title" id="reportPostLabel">Report Forum Post</h5>
			</div>
			{!! Form::open(['route' => 'report.generate', 'method' => 'POST']) !!}
				<div class="modal-body">

					{{ Form::label('reason', 'Reason', ['class' => 'control-label']) }}
					<select name="reason" class="form-control">
						<option disabled selected>Select A Reason...</option>
							<option value="harassment">Harassment</option>
							<option value="hurtful">Hurtful</option>
							<option value="private_info">Contains Private Info</option>
							<option value="ban_evading">Ban Evading</option>
							<option value="explicit_language">Explicit Language</option>
							<option value="english_language">Not Using English Language</option>
							<option value="politics">Politics</option>
							<option value="mature">Mature Content</option>
							<option value="other">Other</option>
					</select>

					{{ Form::label('message', 'Explain What Happened', ['class' => 'control-label mt-2']) }}
					{{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Please provide as much detail as possible...']) }}

					{{ Form::hidden('post_id', $post->id) }}

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Discard</button>
					<button type="submit" class="btn btn-success rounded-0">Send Report</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>