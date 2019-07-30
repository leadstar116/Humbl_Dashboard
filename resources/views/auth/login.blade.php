@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-container log-in">
            <div class="card-header">
                <div class="Log-In">{{ __('Login') }}</div>
                <div class="Join-Us"><a href="{{ route('register') }}">{{ __('Join Us') }}</a></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="Member-Login">{{ __('Member Login') }}</p>
                    <p class="Youre-already-livin">{{ __('You’re already living life. Why not get paid for it?') }}</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">
                                {{ __('Email') }}
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left">
                                {{ __('Password') }}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="terms-div">
                                <span>
                                    {{ __('By clicking Log In, you acknowledge that you have read and agree to our ') }}
                                    <a>{{ __('Member terms and conditions of service') }}</a>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary login-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="col-md-12 forget-pass">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 login-footer">
                                <a class="btn btn-link">{{ __('Privacy Policy') }}</a>
                                <a class="btn btn-link">{{ __('Get Help') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
