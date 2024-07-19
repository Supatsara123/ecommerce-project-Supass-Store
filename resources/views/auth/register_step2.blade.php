@extends('layouts.app')

@section('title', 'Register - Step 2')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-10 col-lg-5 col-md-8">
        <div class="card text-center bg-white p-2">
            <div class="navbar-brand p-0">
                <img src="/image/logo/logo_login.png" alt="Img" width="200px">
            </div>

            <hr class="my-2">

            <h2 class="my-4 fw-bold">Create an Account - Step 2</h2>
            <div class="text-start px-5">
                <form method="POST" action="{{ route('register.complete') }}" id="step2Form">
                    @csrf

                    @method('PUT')
                    <div class="row g-3">

                    <h3>Basic Info</h3>
                    <div class="col-12 col-md-6 mb-1">
                        <label for="fname" class="form-label">{{ __('First Name') }}</label>
                        <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror"
                            name="fname" value="{{ old('fname') }}" required autocomplete="fname">
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="lname" class="form-label">{{ __('Last Name') }}</label>
                        <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"
                            name="lname" value="{{ old('lname') }}" required autocomplete="lname">
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="gender" class="form-label">{{ __('Gender') }}</label>
                        <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="lgbt" {{ old('gender') == 'lgbt' ? 'selected' : '' }}>LGBT+</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="dateOfBirth" class="form-label">{{ __('Date of Birth') }}</label>
                        <input id="dateOfBirth" type="date" class="form-control @error('dateOfBirth') is-invalid @enderror"
                            name="dateOfBirth" value="{{ old('dateOfBirth') }}" required>
                        @error('dateOfBirth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <h3>Contact Info</h3>
                    <div class="col-12 col-md-6 mb-1">
                        <label for="phone" class="form-label">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <h3>Address</h3>
                    <div class="col-12 col-md-6 mb-1">
                        <label for="house_number" class="form-label">{{ __('House No./Unit No./Building') }}</label>
                        <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror"
                            name="house_number" value="{{ old('house_number') }}" required autocomplete="house_number">
                        @error('house_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="moo" class="form-label">{{ __('Moo') }}</label>
                        <input id="moo" type="text" class="form-control @error('moo') is-invalid @enderror"
                            name="moo" value="{{ old('moo') }}" required autocomplete="moo">
                        @error('moo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="soi" class="form-label">{{ __('Soi') }}</label>
                        <input id="soi" type="text" class="form-control @error('soi') is-invalid @enderror"
                            name="soi" value="{{ old('soi') }}" required autocomplete="soi">
                        @error('soi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="road" class="form-label">{{ __('Road') }}</label>
                        <input id="road" type="text" class="form-control @error('road') is-invalid @enderror"
                            name="road" value="{{ old('road') }}" required autocomplete="road">
                        @error('road')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="province" class="form-label">{{ __('Province') }}</label>
                        <input id="province" type="text" class="form-control @error('province') is-invalid @enderror"
                            name="province" value="{{ old('province') }}" required autocomplete="province">
                        @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="district" class="form-label">{{ __('District') }}</label>
                        <input id="district" type="text" class="form-control @error('district') is-invalid @enderror"
                            name="district" value="{{ old('district') }}" required autocomplete="district">
                        @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="sub_district" class="form-label">{{ __('Sub District') }}</label>
                        <input id="sub_district" type="text" class="form-control @error('sub_district') is-invalid @enderror"
                            name="sub_district" value="{{ old('sub_district') }}" required autocomplete="sub_district">
                        @error('sub_district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-1">
                        <label for="postal_code" class="form-label">{{ __('Postal Code') }}</label>
                        <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror"
                            name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code">
                        @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary w-100" onclick="submitForm()">
                            {{ __('Complete Registration') }}
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
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('step2Form').submit();
            }
        })
    }
</script>
@endsection

