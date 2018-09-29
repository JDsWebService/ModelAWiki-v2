@extends('layouts.admin')

@section('title', 'Forum Settings')

@section('content')

	<div class="row justify-content-center">
		<div class="col-sm-12">

			@if(!$settings)
				{!! Form::open(['route' => 'admin.forum.settings.save', 'method' => 'POST', 'files' => true]) !!}
			@else
				{!! Form::model($settings, ['route' => 'admin.forum.settings.save', 'method' => 'POST', 'files' => true]) !!}
			@endif
				
					{{ Form::label('heading', 'Heading', ['class' => 'control-label']) }}
					{{ Form::text('heading', null, ['class' => 'form-control']) }}

					{{ Form::label('motd', 'Message Of The Day', ['class' => 'control-label mt-3']) }}
					{{ Form::text('motd', null, ['class' => 'form-control']) }}

					{{-- Forum Header Image --}}
					{{ Form::label('image', 'Forum Header Image:', ['class' => 'mt-3']) }}
					<div class="input-group">
					    <label class="input-group-btn" style="margin-bottom: 0px;">
					        <span class="btn btn-primary">
					            <i class="fas fa-cloud-upload-alt"></i> Browse&hellip; <input type="file" style="display: none;" name="image">
					        </span>
					    </label>
					    <input type="text" class="form-control" style="color: white;" readonly>
					</div>

					<div class="row justify-content-center mt-3">
						<div class="col-sm-4">
							<button type="submit" class="btn btn-block btn-success">
								Save Settings
							</button>
						</div>
					</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{{-- Image Upload Javascript --}}
	<script src="/js/imageupload.js"></script>

@endsection