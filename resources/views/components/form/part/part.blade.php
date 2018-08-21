{!! Form::model($part, ['route' => ['part.' . $route, $part_id], 'method' => $method, 'files' => true]) !!}
	<div class="row justify-content-center">
		<div class="col-sm-8">
			
				{{-- Sections --}}
				{{ Form::label('section_id', 'Section:') }}
			    <select name="section_id" class="form-control">
			    	<option value="" disabled selected>Select A Section...</option>
			    	@foreach($sections as $section)
						<option value="{{ $section->id }}"
							@if(isset($part->section_id))
								{{ $section->id == $part->section_id ? 'selected' : ''}}
							@endif
						>{{ $section->name }}</option>
			    	@endforeach
			    </select>

				{{-- Name --}}
				{{ Form::label('name', 'Name:', ['class' => 'mt-3']) }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{-- Part Number --}}
				{{ Form::label('part_number', 'Part Number:', ['class' => 'mt-3']) }}
				{{ Form::text('part_number', null, ['class' => 'form-control']) }}

				{{-- Description --}}
				{{ Form::label('description', 'Description:', ['class' => 'mt-3']) }}
				{{ Form::textarea('description', null, ['class' => 'form-control']) }}
				
				{{-- Date Start --}}
				{{ Form::label('date_start', 'Date Start:', ['class' => 'mt-3']) }}
				<div class="row" name="date_start">
					<div class="col-sm-6">
						{{ Form::selectMonth('date_start_month', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::selectRange('date_start_year', 1927, 1932, null, ['class' => 'form-control']) }}
					</div>
				</div>

				{{-- Date End --}}
				{{ Form::label('date_end', 'Date End:', ['class' => 'mt-3']) }}
				<div class="row" name="date_end">
					<div class="col-sm-6">
						{{ Form::selectMonth('date_end_month', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-sm-6">
						{{ Form::selectRange('date_end_year', 1927, 1932, null, ['class' => 'form-control']) }}
					</div>
				</div>

				{{-- Body Type --}}
				{{ Form::label('body_type', 'Body Type:', ['class' => 'mt-3']) }}
				{{ Form::text('body_type', null, ['class' => 'form-control']) }}

				{{-- Year --}}
				{{ Form::label('year', 'Year:', ['class' => 'mt-3']) }}
				{{ Form::selectRange('year', 1927, 1932, null, ['class' => 'form-control']) }}

		        {{-- Featured Image --}}
		        {{ Form::label('featured_image', 'Featured Image:', ['class' => 'mt-3']) }}
		        <div class="input-group">
		            <label class="input-group-btn" style="margin-bottom: 0px;">
		                <span class="btn btn-primary">
		                    <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="featured_image">
		                </span>
		            </label>
		            <input type="text" class="form-control" style="color: white;" readonly>
		        </div>
				
				<h4 class="mt-3 text-center">Additional Information</h4>
				<hr>
				
				<div class="row">
					<div class="col-sm-6 mt-3">
						{{-- Reminder Modal Button --}}
						<button type="button" class="btn btn-primary btn-block reminderButton" data-toggle="modal" data-target="#reminderModal">
						  <i class="fas fa-bell"></i> Reminders
						</button>
					</div>
					<div class="col-sm-6 mt-3">
						{{-- Tips Modal Button --}}
						<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#tipsModal">
						  <i class="fas fa-info-circle"></i> Tips
						</button>
					</div>
					<div class="col-sm-6 mt-3">
						{{-- Warnings Modal Button --}}
						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#warningsModal">
						  <i class="fas fa-exclamation-triangle"></i> Warnings
						</button>
					</div>
					<div class="col-sm-6 mt-3">
						{{-- Fun Facts Modal Button --}}
						<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#funFactsModal">
						  <i class="fas fa-lightbulb"></i> Fun Facts
						</button>
					</div>
					@include('components.form.part.modals.reminder')
					@include('components.form.part.modals.tips')
					@include('components.form.part.modals.warnings')
					@include('components.form.part.modals.funfacts')
				</div>

		</div>
	</div>
	
	<div class="row justify-content-center mt-3">
		<div class="col-sm-6 text-center">
		    {{-- Submit Button --}}
		    <button class="btn btn-block btn-success">{{ $submit_text }}</button>
			
		</div>
	</div>

{!! Form::close() !!}
