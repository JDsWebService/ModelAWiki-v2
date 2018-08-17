@extends('layouts.admin')

@section('title', 'Tag Index')

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
			<a href="{{ route('tag.create') }}" class="btn btn-success btn-block btn-sm">Create Tag</a>
		</div>
	</div>

	@if($tags->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->name }}</td>
						<td>{{ $tag->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('tag.show', $tag->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('tag.edit', $tag->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $tags->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new tag!
			</div>
		</div>
	@endif

@endsection