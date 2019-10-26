@extends('layouts.login')
@section('body_class', 'login-page')
@section('body')


    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body">
            <h2 class="text-center">New register</h2>
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf

                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required placeholder="Email">

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
                           required placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required placeholder="Retype password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12" >
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Register') }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
