<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::model($post, ['route' => ['post.' . $route, $post_id], 'method' => $method, 'files' => true]) !!}
		    {{ Form::label('title', null, ['class' => 'control-label']) }}
		    {{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}

		    {{ Form::label('subtitle', null, ['class' => 'control-label mt-3']) }}
		    {{ Form::text('subtitle', null, ['class' => 'form-control']) }}

		    {{ Form::label('category_id', null, ['class' => 'control-label mt-3']) }}
		    <select name="category_id" class="form-control">
		    	<option value="" disabled selected>Select A Category. . .</option>
		    	@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if(isset($post->category_id))
							{{ $category->id == $post->category_id ? 'selected' : ''}}
						@endif
					>{{ $category->name }}</option>
		    	@endforeach
		    </select>

		    {{ Form::label('tags', null, ['class' => 'control-label mt-3']) }}
		    @if(Route::is('post.edit'))
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			@else
				<select name="tags[]" class="form-control select2-multi" multiple="multiple">
			    	@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			    	@endforeach
			    </select>
		    @endif

		    {{ Form::label('body', null, ['class' => 'control-label mt-3']) }}
		    {{ Form::textarea('body', null, ['class' => 'form-control']) }}

		    {{-- Image --}}
		    {{ Form::label('image', 'Image:', ['class' => 'control-label mt-3']) }}
		    <div class="input-group">
		        <label class="input-group-btn" style="margin-bottom: 0px;">
		            <span class="btn btn-primary">
		                <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="image">
		            </span>
		        </label>
		        <input type="text" class="form-control" style="color: white;" readonly>
		    </div>

		    {{ Form::label('Published', null, ['class' => 'control-label mt-3']) }}
		    <label class="switch">
		    	@if(isset($post->published_at))
		    		@if($post->published_at != "Not Published")
			    	    <input type="checkbox" name="status" checked>
			    	@else
			    	    <input type="checkbox" name="status">
			    	@endif
			    @else
			    	<input type="checkbox" name="status">
			    @endif
	            
		        <span class="slider round"></span>
		    </label>
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>



