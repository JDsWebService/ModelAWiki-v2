@extends('layouts.admin')

@section('title', 'Create Your Admin Password')

@section('content')

    <div class="row justify-content-center">
    	<div class="col-sm-8">
    		{!! Form::open(['route' => ['admin.first-login.submit'], 'method' => 'POST']) !!}
    		    {{ Form::label('email', null, ['class' => 'control-label mt-3']) }}
    		    {{ Form::text('email', null, ['class' => 'form-control']) }}

    		    {{ Form::label('password', null, ['class' => 'control-label mt-3']) }}
    		    {{ Form::password('password', ['class' => 'form-control']) }}

    		    {{ Form::label('password_confirmation', null, ['class' => 'control-label mt-3']) }}
    		    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

    		    {{ Form::hidden('token', $token) }}
    			
    			<div class="row justify-content-center">
    				<div class="col-sm-6">
    					{{ Form::submit('Create Password', ['class' => 'btn btn-block btn-success mt-4']) }}		
    				</div>
    			</div>
    		    
    		{!! Form::close() !!}
    	</div>
    </div>

@endsection