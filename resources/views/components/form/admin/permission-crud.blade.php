<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::open(['route' => 'admin.permission.store.crud', 'method' => 'POST']) !!}

		    {{ Form::label('prefix', null, ['class' => 'control-label mt-3']) }}
		    {{ Form::text('prefix', null, ['class' => 'form-control', 'placeholder' => 'post, tag, category']) }}

		    {{ Form::label('cagtegory', null, ['class' => 'control-label mt-3']) }}
			<select name="category" class="form-control category-select">
				<option value="" disabled selected>Select Or Create a Category...</option>
		    	@foreach($categories as $category)
					<option value="{{ $category }}">{{ $category }}</option>
		    	@endforeach
		    </select>
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}	
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
