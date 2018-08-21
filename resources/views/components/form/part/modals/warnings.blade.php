<!-- Modal -->
<div class="modal fade" id="warningsModal" tabindex="-1" role="dialog" aria-labelledby="warningsModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="warningsModalLabel">Warnings</h5>
			</div>
			<div class="modal-body">
				{{ Form::textarea('warning', null, ['class' => 'form-control', 'id' => 'warningsInput']) }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary warningsCancel" data-dismiss="modal">Close Without Saving</button>
				<button type="button" class="btn btn-primary warningsSave" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>