@extends('layouts.admin')

@section('title', 'Category Index')

@section('stylesheets')

	<style type="text/css">
		.buttons {
			font-size: 1.2em;
		}
		.buttons a:hover {
			color: #aaa;
		}
		.pagination {
			justify-content: center;
		}
	</style>

@endsection

@section('content')
	<div class="row justify-content-center mb-4">
		<div class="col-sm-3 text-center">
			<a href="{{ route('category.create') }}" class="btn btn-success btn-block btn-sm">Create Category</a>
		</div>
	</div>

	@if($categories->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td>{{ $category->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('category.show', $category->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('category.edit', $category->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $categories->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new category!
			</div>
		</div>
	@endif

@endsection