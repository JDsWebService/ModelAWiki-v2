@extends('layouts.admin')

@section('title', 'Edit Forum Category')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">

	<style type="text/css">
		.sp-replacer {
			display: flex;
		}
		.sp-preview {
			width: 100%;
		}
	</style>

@endsection

@section('content')
	
	<div class="row justify-content-center">

		{{-- Create Form --}}
		<div class="col-sm-6">
			{!! Form::model($category, ['route' => ['admin.forum.category.update', $category->id], 'method' => 'PUT']) !!}
				
				{{ Form::label('name', 'Name', ['class' => 'control-label'])}}
				{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}

				{{ Form::label('color', 'Color', ['class' => 'control-label mt-2']) }}
				<input type="color" id="colorpicker" name="color" value="#283593"/>

				<div class="row justify-content-center mt-3">
					<div class="col-sm-6">
						<button type="submit" class="btn btn-block btn-success">
							Save Category
						</button>
					</div>
				</div>

			{!! Form::close() !!}
		</div>

	</div>
	

@endsection

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>

	<script>
		$("#colorpicker").spectrum({
		    preferredFormat: "hex",
		    showPaletteOnly: true,
	        showPalette: true,
	        color: '#283593',
	        hideAfterPaletteSelect: true,
	        palette: [
	            ['#C62828', '#AD1457', '#6A1B9A', '#4527A0', '#283593'],
	            ['#1565C0', '#0277BD', '#00838F', '#00695C', '#2E7D32'],
	            ['#558B2F', '#9E9D24', '#F9A825', '#FF8F00', '#EF6C00'],
	            ['#D84315', '#4E342E', '#424242', '#37474F']
	        ]
		});
	</script>

@endsection