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
            <h2 class="text-center">{{ __('Reset Password') }}</h2>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
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


                <div class="form-group row text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
