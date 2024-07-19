@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-10 col-lg-4 col-md-8">
            <div class="card text-center bg-white p-2">
                <div class="navbar-brand p-0">
                    <img src="/image/logo/logo_login.png" alt="Img" width="200px">
                </div>

                <hr class="my-2">

                <h2 class="my-4 fw-bold">Create an Account</h2>
                <div class="text-start px-5">

                    <form method="POST" action="{{ route('register') }}" id="inputForm">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Nickname') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary w-100" onclick="submitForm()">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>

                <hr class="my-2">
                <div class="text-center">
                    <span>Already have an account?</span>
                    <a class="nav-link text-danger" href="{{ route('login') }}">Log in with your account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function submitForm() {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm your details!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('inputForm').submit();
                }
            })

        }
    </script>
@endsection
