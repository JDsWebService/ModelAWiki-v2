@extends('layouts.blankWithBackground')

@section('title', 'Admin Login')

@section('stylesheets')

    <style type="text/css">
        
        /* Form Title */
        p.form-title {
            font-family: 'Open Sans' , sans-serif;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            color: #FFFFFF;
            margin-top: 5%;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        /* Form CSS */
        form {
            width: 250px;
            margin: 0 auto;
        }
        
        /* Form Inputs */
        form.login input[type="email"], form.login input[type="password"] {
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            background: 0;
            border: 0;
            border-bottom: 1px solid #FFFFFF;
            outline: 0;
            font-style: italic;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 1px;
            margin-bottom: 5px;
            color: #FFFFFF;
            outline: 0;
        }

        form.login input[type="submit"] {
            width: 100%;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 500;
            margin-top: 16px;
            outline: 0;
            cursor: pointer;
            letter-spacing: 1px;
        }

        form.login input[type="submit"]:hover {
            transition: background-color 0.5s ease;
        }
        
        /* Form Remember and Forgot Password CSS */
        form.login .remember-forgot {
            float: left;
            width: 100%;
            margin: 10px 0 0 0;
        }
        
        /* Misc Form CSS */
        form.login label, form.login a {
            font-size: 12px;
            font-weight: 400;
            color: #FFFFFF;
        }

        form.login a {
            transition: color 0.5s ease;
        }

        form.login a:hover {
            color: #2ecc71;
        }

    </style>

@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-12">
                
                @if(count( $errors ) > 0)
                    @foreach ($errors->all() as $error)
                       <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error:</strong> {{ $error }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                       </div>
                    @endforeach
                @endif

                <p class="form-title">
                    Admin Login
                </p>

                <form method="POST" class="login" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="eMail" required autofocus>
                    

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} m" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                    <div class="row mt-2 text-center">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <label class="form-check-label" for="remember">
                                     {{ __('Remember Me') }}
                                 </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.password.request') }}" class="forgot-pass">Forgot Password</a>
                        </div>
                    </div>
                </form>

        </div>
    </div>

@endsection
