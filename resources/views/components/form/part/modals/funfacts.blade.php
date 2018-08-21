<!-- Modal -->
<div class="modal fade" id="funFactsModal" tabindex="-1" role="dialog" aria-labelledby="funFactsModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="funFactsModalLabel">Fun Facts</h5>
			</div>
			<div class="modal-body">
				{{ Form::textarea('fun_fact', null, ['class' => 'form-control', 'id' => 'funFactsInput']) }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary funFactsCancel" data-dismiss="modal">Close Without Saving</button>
				<button type="button" class="btn btn-primary funFactsSave" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>