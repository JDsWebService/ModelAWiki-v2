@extends('layouts.admin')

@section('title', 'Section Index')

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
			<a href="{{ route('part.section.create') }}" class="btn btn-success btn-block btn-sm">Create Section</a>
		</div>
	</div>

	@if($sections->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($sections as $section)
					<tr>
						<td>{{ $section->name }}</td>
						<td>{{ $section->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('part.section.show', $section->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('part.section.edit', $section->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $sections->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new section!
			</div>
		</div>
	@endif

@endsection