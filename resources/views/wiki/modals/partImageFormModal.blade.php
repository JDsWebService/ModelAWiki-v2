<!-- Part Image Form Modal -->
<div class="modal fade" id="partImageFormModal" tabindex="-1" role="dialog" aria-labelledby="partImageFormLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success text-white rounded-0">
				<h5 class="modal-title" id="partImageFormLabel">Submit A Picture</h5>
			</div>
			
			{{-- Open Form --}}
			{{ Form::open(['route' => ['wiki.part.images.store', $part->slug], 'method' => 'POST', 'files' => true]) }}
				<div class="modal-body">
					<p class="lead">Part: {{ $part->name }}</p>

					{{-- Image --}}
					{{ Form::label('image', 'Image:', ['class' => 'control-label mt-3']) }}
					<div class="input-group">
					    <label class="input-group-btn" style="margin-bottom: 0px;">
					        <span class="btn btn-primary">
					            <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="image">
					        </span>
					    </label>
					    <input type="text" class="form-control" readonly>
					</div>

					{{ Form::label('caption', 'Caption', ['class' => 'control-label mt-2']) }}
					{{ Form::textarea('caption', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Please provide as much detail as possible...']) }}

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Discard</button>
					<button type="submit" class="btn btn-success rounded-0">Submit Your Contribution</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>