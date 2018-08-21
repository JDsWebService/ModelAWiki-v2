@extends('layouts.admin')

@section('title', 'Parts Index')

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
		<div class="col-sm-2 text-center">
			<a href="{{ route('part.create') }}" class="btn btn-success btn-block btn-sm">Create Part</a>
		</div>
	</div>

	@if($parts->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Part Number</th>
					<th>Section</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($parts as $part)
					<tr>
						<td style="width: 55%;">{{ $part->name }}</td>
						<td style="width: 15%;">{{ $part->part_number }}</td>
						<td style="width: 15%;">{{ $part->section->name }}</td>
						<td class="buttons" style="width: 15%;">
							<a href="{{ route('part.show', $part->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('part.edit', $part->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $parts->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new part!
			</div>
		</div>
	@endif

@endsection