@extends('layouts.main')

@section('title', 'Profile Settings')

@section('content')
	<div class="container mt-3">
		<div class="row">
			<div class="col-sm-12">
				{!! Form::model($user, ['route' => 'user.profile.save', 'method' => 'PUT', 'files' => true]) !!}

					<div class="row">
						<div class="col-sm-6">
							{{ Form::label('first_name', null, ['class' => 'control-label']) }}
							{{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}
						</div>
						<div class="col-sm-6">
							{{ Form::label('last_name', null, ['class' => 'control-label']) }}
							{{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}
						</div>
					</div>
					
					{{ Form::label('email', null, ['class' => 'control-label mt-3']) }}
					{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'eMail']) }}

					{{ Form::label('username', null, ['class' => 'control-label mt-3']) }}
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="username_addon">@</span>
						</div>
						{{ Form::text('username', null, ['class' => 'form-control', 'aria-describedby' => 'username_addon', 'placeholder' => 'Username']) }}
					</div>

					{{-- Image --}}
					{{ Form::label('profile_image', 'Profile Image:', ['class' => 'control-label mt-3']) }}
					<div class="input-group">
					    <label class="input-group-btn" style="margin-bottom: 0px;">
					        <span class="btn btn-primary">
					            <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="profile_image">
					        </span>
					    </label>
					    <input type="text" class="form-control" style="color: white;" readonly>
					</div>

					<div class="row justify-content-center">
						<div class="col-sm-6">
							{{ Form::submit('Save Profile', ['class' => 'btn btn-block btn-success mt-4']) }}
						</div>
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	{{-- Image Upload Javascript --}}
    <script src="/js/imageupload.js"></script>

@endsection