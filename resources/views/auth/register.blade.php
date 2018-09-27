@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center mt-3">
        <div class="col-sm-4 align-self-center">
            Register Using Social Media
            <hr>
            <a href="{{ route('login.facebook') }}" class="btn btn-facebook m-2 btn-block">
                <i class="fab fa-facebook-f"></i>&nbsp;&nbsp;Facebook
            </a>
            <a href="{{ route('login.google') }}" class="btn btn-google m-2 btn-block">
                <i class="fab fa-google-plus-g"></i>&nbsp;&nbsp;Google
            </a>
            <a href="{{ route('login.twitter') }}" class="btn btn-twitter m-2 btn-block">
                <i class="fab fa-twitter"></i>&nbsp;&nbsp;Twitter
            </a>
            <hr>
            Already Have An Account?
            <a href="#" class="btn btn-block m-2 btn-secondary">
                <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login
            </a>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header">Sign Up Today!</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="eMail Address" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="username_addon">@</span>
                                    </div>
                                    {{ Form::text('username', null, ['class' => 'form-control', 'aria-describedby' => 'username_addon', 'placeholder' => 'Username']) }}
                                </div>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-block">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
