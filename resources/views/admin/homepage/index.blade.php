@extends('layouts.admin')

@section('title', 'Homepage Entry Index')

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
			<a href="{{ route('admin.site.homepage.create') }}" class="btn btn-success btn-block btn-sm">Create Entry</a>
		</div>
	</div>

	@if($entries->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Type</th>
					<th>Link (Optional)</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($entries as $entry)
					<tr>
						<td>{{ $entry->title }}</td>
						<td>{{ $entry->type }}</td>
						<td>
							@if($entry->url)
								<a href="{{ $entry->url }}" target="_blank">Entry Has Link</a>
							@else
								No Link
							@endif
						</td>
						<td>{{ $entry->created_at }}</td>
						<td class="buttons">
							<a href="{{ route('admin.site.homepage.show', $entry->id) }}"><i class="far fa-eye"></i></a>&nbsp;&nbsp;
							<a href="{{ route('admin.site.homepage.edit', $entry->id) }}"><i class="far fa-edit"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $entries->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new entry!
			</div>
		</div>
	@endif

@endsection