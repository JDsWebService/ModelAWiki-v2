<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::model($section, ['route' => ['part.section.' . $route, $section_id], 'method' => $method, 'files' => true]) !!}
			
			{{-- Name --}}
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}

		    {{-- Image --}}
		    {{-- Featured Image --}}
		    {{ Form::label('image', 'Image:', ['class' => 'mt-3']) }}
		    <div class="input-group">
		        <label class="input-group-btn" style="margin-bottom: 0px;">
		            <span class="btn btn-primary">
		                <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="image">
		            </span>
		        </label>
		        <input type="text" class="form-control" style="color: white;" readonly>
		    </div>
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
