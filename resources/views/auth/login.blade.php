@extends('layouts.app')

@section('title', 'Log in')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-lg-4 col-md-8">
            <div class="card text-center bg-white p-2">
                <div class="navbar-brand p-0">
                    <img src="/image/logo/logo_login.png" alt="Img" width="200px">
                </div>

                <hr class="my-2">

                <h2 class="my-4 fw-bold">Log in with your account.</h2>
                <div class="text-start px-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <span id="passwordHelpInline" class="form-text">
                                Must be 8-20 characters long.
                            </span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                <hr class="my-2">
                <div class="text-center">
                    <span>Don't have an account with us yet?</span>
                    <a class="nav-link text-danger" href="{{ route('register') }}">Create an Account</a>
                </div>
            </div>
        </div>
    </div>
@endsection
