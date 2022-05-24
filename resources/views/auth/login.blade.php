@extends('templates.main')

@section('content')
    <div class="col-md-15 text-center">
        <h3 class="mb-5"></h3>
    </div>
    <div class="d-flex justify-content-center" style="width: auto; height:400px;">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf
            <div class="card card-login card-white">
                <div class="card-header">
                <img class="card-img" src="/images/CMU-LOGO.png" alt="Card image" style="width: 300px;">
                    <h1 class="card-title">{{ __('Log in') }}</h1>
                </div>
                <div class="card-body">
                    <p class="text-dark mb-2">Sign in with email and the password </p>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85" style="width: 15px; height:25px;"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle" style="width: 15px; height:25px;"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{ __('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Login') }}</button>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link">{{ __('Create Account') }}</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <!-- <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Forgot password?') }}</a> -->
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
