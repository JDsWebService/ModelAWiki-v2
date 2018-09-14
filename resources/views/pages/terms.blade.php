@extends('layouts.main')

@section('title', 'Terms of Service')

@section('content')

	<div class="row justify-content-center mt-3">
		<div class="col-sm-8">
			<h1>Terms of Service</h1>
			<hr>
			
			@if($settings)
				@if($settings->tos)
					<p>
						{!! $settings->tos !!}
					</p>
				@endif
			@else
				<p>
					Nothing to show here!
				</p>
			@endif

		</div>
	</div>

@endsection