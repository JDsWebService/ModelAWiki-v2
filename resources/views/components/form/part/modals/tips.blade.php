<!-- Modal -->
<div class="modal fade" id="tipsModal" tabindex="-1" role="dialog" aria-labelledby="tipsModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tipsModalLabel">Tips</h5>
			</div>
			<div class="modal-body">
				{{ Form::textarea('tip', null, ['class' => 'form-control', 'id' => 'tipsInput']) }}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary tipsCancel" data-dismiss="modal">Close Without Saving</button>
				<button type="button" class="btn btn-primary tipsSave" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>