@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 login-container sign-up">
            <div class="card-header">
                <div class="Log-In"><a href="{{ route('login') }}">{{ __('Login') }}</a></div>
                <div class="Join-Us">{{ __('Join Us') }}</div>
            </div>
            <div class="card-signup">
                    <div class="card-body">
                        <p class="Member-Login">{{ __('Join Incentavize Today') }}</p>
                        <p class="Youre-already-livin">{{ __('You’re already living life. Why not get paid for it?') }}</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="register_email" class="col-md-12 col-form-label text-md-left">{{ __('Email') }}</label>

                                <div class="col-md-12">
                                    <input id="register_email" type="email" class="form-control @error('register_email') is-invalid @enderror" name="register_email" value="{{ old('register_email') }}" required autocomplete="email" autofocus>

                                    @error('register_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="register_password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="register_password" type="password" class="form-control @error('register_password') is-invalid @enderror" name="register_password" required autocomplete="current-password">

                                    @error('register_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="agree-div">
                                    <input type="checkbox" class="form-control" id="checkbox_agree">
                                    {{ __('I agree to the Terms of Service') }}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary register-btn" disabled>
                                        {{ __("Let's do this") }}
                                    </button>
                                </div>
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
