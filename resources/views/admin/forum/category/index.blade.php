@extends('layouts.admin')

@section('title', 'Forum Categories')

@section('stylesheets')
	
	{{-- ColorPicker CSS --}}
	<link rel="stylesheet" type="text/css" href="/css/colorpicker.css">

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
	
	{{-- ColorPicker JS --}}
	<script src="/js/colorpicker.js"></script>

@endsection