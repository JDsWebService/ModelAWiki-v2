@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
	
	<div class="container mt-3">
		
		<div class="row">
			<div class="col-sm-8 text-center">
				<h3>Contact Us</h3>
			</div>
		</div>


		<div class="row">
			<div class="col-md-8 text-center">
				@if(Auth::guard('user')->check())
					{!! Form::open(['route' => ['pages.contact.send'], 'method' => 'POST']) !!}
						
						{{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'What would you like to talk to us about?']) }}

						<div class="row justify-content-center mt-3">
							<div class="col-sm-6 text-center">
							    {{-- Submit Button --}}
							    <button class="btn btn-block btn-success">Send Email</button>
							</div>
						</div>

						<input name="email" type="hidden" value="{{ Auth::guard('user')->user()->email }}" />
						<input name="name" type="hidden" value="{{ Auth::guard('user')->user()->name }}" />
					{!! Form::close() !!}
				@else
					<p>
						Please login to use this feature!
						<br>
						<a href="{{ route('login') }}" class="btn btn-primary mt-2">Login</a>	
					</p>
				@endif
			</div>

			<div class="col-md-4">
				<b>Customer service:</b> <br />
				Phone: 412.465.0311<br />
				E-mail: <a href="mailto:modelawiki@gmail.com">modelawiki@gmail.com</a><br />
				<br /><br />
				<b>Headquarters:</b><br />
				Model A Wiki<br />
				555 Address St.<br />
				Pittsburgh, PA 15212<br />

			</div>
		</div>

	</div>

@endsection

@section('scripts')

    {{-- Tiny MCE --}}
    <script src="/js/tinymce/tinymce.min.js"></script>

@endsection