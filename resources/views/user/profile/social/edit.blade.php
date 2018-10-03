@extends('layouts.main')

@section('title', 'Edit Profile Social Media Link')

@section('stylesheets')
	
	{{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
	
	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-12">
				
				{!! Form::model($link, ['route' => 'user.profile.social-links.store', 'method' => 'POST']) !!}

					{{ Form::label('site', 'Social Media Site', ['class' => 'control-label']) }}
					<select name="site" class="form-control site-select">
						<option value="" disabled>Select a Type...</option>
						<option value="facebook" {{ $link->site == 'facebook' ? 'selected' : ''}}>Facebook</option>
						<option value="google" {{ $link->site == 'google' ? 'selected' : ''}}>Google</option>
						<option value="instagram" {{ $link->site == 'instagram' ? 'selected' : ''}}>Instagram</option>
						<option value="pintrest" {{ $link->site == 'pinterest' ? 'selected' : ''}}>Pintrest</option>
						<option value="twitter" {{ $link->site == 'twitter' ? 'selected' : ''}}>Twitter</option>
					</select>

					{{ Form::label('link', 'Your Profile Link', ['class' => 'control-label mt-3']) }}
					{{ Form::text('link', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'http://somesite.com/yourprofile']) }}

					<div class="row justify-content-center mt-3">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-block btn-success">
								Create Social Media Link
							</button>
						</div>
					</div>

				{!! Form::close() !!}

			</div>
		</div>

	</div> <!-- /.container -->

@endsection

@section('scripts')

    {{-- Select 2 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script>
	    $(document).ready(function() {
	        $('.site-select').select2();
	    });
	</script>

@endsection