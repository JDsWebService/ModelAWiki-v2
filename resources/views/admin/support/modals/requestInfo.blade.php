<!-- Request Information Modal -->
<div class="modal fade" id="requestInfoModal" tabindex="-1" role="dialog" aria-labelledby="requestInfoModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning text-white rounded-0">
				<h5 class="modal-title" id="requestInfoModalLabel">Request More Information</h5>
			</div>
			{!! Form::open(['route' => ['admin.support.requestInfo', $message->id], 'method' => 'POST']) !!}
				<div class="modal-body">

					{{ Form::label('message', 'Reason To Request More Information', ['class' => 'control-label mt-2']) }}
					{{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Please provide as much detail as possible...']) }}

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Discard</button>
					<button type="submit" class="btn btn-success rounded-0">Send Request</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>