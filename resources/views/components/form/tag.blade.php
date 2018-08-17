<div class="row justify-content-center">
	<div class="col-sm-8">
		{!! Form::model($tag, ['route' => ['tag.' . $route, $tag_id], 'method' => $method]) !!}
		    {{ Form::label('name', null, ['class' => 'control-label']) }}
		    {{ Form::text('name', null, ['class' => 'form-control']) }}
			
			<div class="row justify-content-center">
				<div class="col-sm-6">
					{{ Form::submit($submit_text, ['class' => 'btn btn-block btn-success mt-4']) }}		
				</div>
			</div>
		    
		{!! Form::close() !!}
	</div>
</div>
