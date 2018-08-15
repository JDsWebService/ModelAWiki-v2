<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::open(['route' => 'tag.' . $route, 'method' => $method]) !!}
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}

		    {{ Form::label('slug', null, ['class' => 'control-label mt-3']) }}
		    {{ Form::text('slug', null, ['class' => 'form-control']) }}
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
