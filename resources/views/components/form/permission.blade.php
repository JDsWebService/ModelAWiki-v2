<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::model($permission, ['route' => ['admin.permission.' . $route, $permission_id], 'method' => $method]) !!}

		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'post-create, tag-edit, part-update']) }}

		    {{ Form::label('cagtegory', null, ['class' => 'control-label mt-3']) }}
		    @if(Route::is('admin.permission.edit'))
				{{ Form::select('category', $categories, null, ['class' => 'form-control category-select']) }}
			@else
				<select name="category" class="form-control category-select">
					<option value="" disabled selected>Select Or Create a Category...</option>
			    	@foreach($categories as $category)
						<option value="{{ $category }}">{{ $category }}</option>
			    	@endforeach
			    </select>
			@endif
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
