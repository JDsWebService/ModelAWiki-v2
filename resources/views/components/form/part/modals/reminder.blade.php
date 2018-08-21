<!-- Modal -->
<div class="modal fade" id="reminderModal" tabindex="-1" role="dialog" aria-labelledby="reminderModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reminderModalLabel">Reminder</h5>
			</div>
			<div class="modal-body">
				{{ Form::textarea('reminder', null, ['class' => 'form-control', 'id' => 'reminderInput']) }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary reminderCancel" data-dismiss="modal">Close Without Saving</button>
				<button type="button" class="btn btn-primary reminderSave" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>