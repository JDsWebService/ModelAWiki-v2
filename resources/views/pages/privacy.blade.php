@extends('layouts.main')

@section('title', 'Privacy Policy')

@section('content')

	<div class="row justify-content-center mt-3">
		<div class="col-sm-8">
			<h1>Privacy Policy</h1>
			<hr>
			
			@if($settings)
				@if($settings->privacy)
					<p>
						{!! $settings->privacy !!}
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