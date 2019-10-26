@extends('layouts.login')
@section('body_class', 'login-page')
@section('body')


    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        @include('flash::message')

        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <div class="form-group has-feedback">
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Email"
                           value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           placeholder="Password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="icheckbox">

                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="social-auth-links text-center">
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Create new user') }}
                </a> |
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </div>
    </div>
@endsection
