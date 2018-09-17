@extends('layouts.admin')

@section('title', 'Social Links Index')

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
			<a href="{{ route('admin.site.social-links.create') }}" class="btn btn-success btn-block btn-sm">Create Link</a>
		</div>
	</div>

	@if($links->count())
		<table class="table text-center table-hover table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>URL</th>
					<th>Created At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($links as $link)
					<tr>
						<td>{{ $link->name }}</td>
						<td><a href="{{ $link->link }}">Link</a></td>
						<td>{{ $link->created_at }}</td>
						<td class="buttons">
							{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.site.social-links.destroy', $link->id]]) }}
								<a href="{{ route('admin.site.social-links.edit', $link->id) }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
								{{Form::button('<i class="far fa-trash-alt"></i>', array('type' => 'submit', 'class' => 'btn-danger'))}}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
		<div class="row">
			<div class="col-sm-12">
				{{ $links->links() }}
			</div>
		</div>
	@else
		<div class="row justify-content-center">
			<div class="col-sm-6 text-center">
				Nothing to show here. Create a new link!
			</div>
		</div>
	@endif

@endsection