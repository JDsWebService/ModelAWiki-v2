@extends('layouts.admin')

@section('title', 'Admin Login')

@section('content')
    <div class="row justify-content-center text-center">
        <div class="col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header"><i class="fas fa-sign-in-alt"></i> Admin Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="form-group row">

                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} mx-4" name="email" value="{{ old('email') }}" placeholder="eMail" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                        
                        {{-- Password --}}
                        <div class="form-group row mb-0">
                            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} mx-4" name="password" placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        {{-- Remember Me --}}
                        <div class="form-group row my-2">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-block btn-success">
                                    {{ __('Login') }}
                                </button>  
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-sm-12">
                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                    </form>

                </div> <!-- /.card-body -->
            </div> <!-- /.card -->

        </div>
    </div>

@endsection
