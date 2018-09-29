@extends('layouts.admin')

@section('title', 'Forum Categories')

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
	
	<div class="row">

		{{-- Index Results --}}
		<div class="col-sm-6 text-center">
			<h4>Active Categories</h4>
			<hr>
			@if($categories->count())
				<div class="alert alert-info alert-dismissible fade show text-left" role="alert">
					<strong>Heads Up!</strong> Click To Edit Category

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<ul class="list-group mt-2">
					@foreach($categories as $category)
						<a href="{{ route('admin.forum.category.show', $category->slug) }}">
							<li class="list-group-item" style="background-color: {{ $category->color }};">{{ $category->name }}</li>
						</a>
					@endforeach
				</ul>
			@else
				<p>No Active Categories!</p>
			@endif

		</div> <!-- /.col-sm-6 -->

		<div class="col-sm-6">

			<div class="row">
				{{-- Create Form --}}
				<div class="col-sm-12">
					{!! Form::open(['route' => 'admin.forum.category.store', 'method' => 'POST']) !!}
					
						{{ Form::label('name', 'Name', ['class' => 'control-label']) }}
						{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
						
						{{ Form::label('color', 'Color', ['class' => 'control-label mt-2']) }}
						<input type="color" id="colorpicker" name="color" value="#283593"/>

						<div class="row justify-content-center mt-3">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-block btn-success">
									Create Category
								</button>
							</div>
						</div>

					{!! Form::close() !!}
				</div>
				
				{{-- If there are any deleted categories --}}
				@if($deletedCategories->count())
					<div class="col-sm-12 text-center">
						<hr>
						<h4>Archived Categories</h4>
						<p><small>To Restore A Category Just Click It!</small></p>
						<hr>
						<ul class="list-group mt-2">
							@foreach($deletedCategories as $category)
								<a href="{{ route('admin.forum.category.restore', $category->id) }}">
									<li class="list-group-item" style="color: white; background-color: {{ $category->color }};">{{ $category->name }}</li>
								</a>
							@endforeach
						</ul>
					</div>
				@endif

			</div> <!-- /.row -->
		</div> <!-- /.col-sm-6 -->



	</div> <!-- /.row -->
	

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