@extends('layouts.admin')

@section('title', 'Profile Social Media Links')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-4">
			<a href="{{ route('admin.profile.social-links.create') }}" class="btn btn-block btn-sm btn-success">
				Create New Social Media Link
			</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-sm-12">
			
			@if($links->count())
				<table class="table text-center table-hover table-striped">
					<thead>
						<tr>
							<th>Site</th>
							<th>Link</th>
							<th>Last Updated</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($links as $link)
							<tr>
								<td style="width: 45%;">{{ \Str::ucfirst($link->site) }}</td>
								<td style="width: 25%;">
									<a href="{{ $link->link }}" target="_blank">Your Profile</a>
								</td>
								<td style="width: 15%;">{{ $link->updated_at }}</td>
								<td class="buttons" style="width: 15%;">
									{{ Form::open(['method'  => 'DELETE', 'route' => ['admin.profile.social-links.destroy', $link->id]]) }}
										<a href="{{ route('admin.profile.social-links.edit', $link->id) }}"><i class="far fa-edit"></i></a>&nbsp;&nbsp;
									
										{{Form::button('<i class="far fa-trash-alt"></i>', array('type' => 'submit', 'class' => 'btn-danger'))}}
									{{ Form::close() }}
									
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<div class="row justify-content-center">
					<div class="col-sm-6 text-center">
						<p>
							Nothing to Show Here Yet!
						</p>
					</div>
				</div>
			@endif

		</div>
	</div>

@endsection