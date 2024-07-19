@extends('layouts.user')

@section('title', 'Add New Product')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <div class="container px-4 mb-3">
            <h2>Create Profile</h2>
        </div>

        <div class="container bg-white rounded p-4">

            <form method="POST" action="{{ route('profile.update', $user->id) }}" id="updateForm" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="row g-3 mb-3">

                    <h5 class="mb-3">Basic Info</h5>

                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">First Name<span class="text-danger">*</span> :</label>
                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control @error('fname') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('fname') }}</div>
                    </div>

                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Last Name<span class="text-danger">*</span> :</label>
                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control @error('lname') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('lname') }}</div>
                    </div>

                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Gender<span class="text-danger">*</span> :</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="lgbt" {{ old('gender') == 'lgbt' ? 'selected' : '' }}>LGBT+</option>
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Date of Birth<span class="text-danger">*</span> :</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" value="{{ old('dateOfBirth') }}" class="form-control @error('dateOfBirth') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('dateOfBirth') }}</div>
                        <small class="text-secondary">* Must be at least seven years old.</small>
                    </div>

                    <h5 class="mt-4 mb-3">Contact Info</h5>

                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Mobile Number<span class="text-danger">*</span> :</label>
                        <input type="number" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Email<span class="text-danger">*</span> :</label>
                        <div class="info-icon">
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" disabled>
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            <button type="button" class="btn btn-link" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<small>This information cannot be edited. Please contact admin.</small>">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </div>
                    </div>

                    <h5 class="mt-4 mb-3">Address</h5>

                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">House no./Unit no.Building<span class="text-danger">*</span> :</label>
                        <input type="text" name="house_number" value="{{ old('house_number') }}" class="form-control @error('house_number') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('house_number') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Moo :</label>
                        <input type="number" name="moo" value="{{ old('moo') }}" class="form-control @error('moo') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('moo') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Soi :</label>
                        <input type="text" name="soi" value="{{ old('soi') }}" class="form-control @error('soi') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('soi') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Road :</label>
                        <input type="text" name="road" value="{{ old('road') }}" class="form-control @error('road') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('road') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Province<span class="text-danger">*</span> :</label>
                        <input type="text" name="province" value="{{ old('province') }}" class="form-control @error('province') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('province') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">District<span class="text-danger">*</span> :</label>
                        <input type="text" name="district" value="{{ old('district') }}" class="form-control @error('district') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Sub District :</label>
                        <input type="text" name="sub_district" value="{{ old('sub_district') }}" class="form-control @error('sub_district') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('sub_district') }}</div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <label class="form-label">Postal code<span class="text-danger">*</span> :</label>
                        <input type="number" name="postal_code" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('postal_code') }}</div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="row g-2 text-center">
                    <div class="col-16 col-md-3">
                        <a href="{{ route('home') }}">
                            <button class="btn btn-outline-secondary w-100">
                                Cancel
                            </button>
                        </a>
                    </div>
                    <div class="col-16 col-md-3">
                        <button type="reset" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </button>
                    </div>
                    <div class="col-16 col-md-3">
                        <input type="submit" value="Save" class="btn btn-dark w-100" onclick="submitForm()">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Hide the number input spinner */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* email input:: info-icon */
        .info-icon {
            position: relative;
        }
        .info-icon input {
            padding-right: 40px;
        }
        .info-icon .btn-link {
            position: absolute;
            right: 4px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

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
                    document.getElementById('updateForm').submit();
                }
            })
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dateOfBirthInput = document.getElementById('dateOfBirth');
            const today = new Date();
            const sevenYearsAgo = new Date(today.setFullYear(today.getFullYear() - 7));

            // Format date as YYYY-MM-DD
            const year = sevenYearsAgo.getFullYear();
            const month = ('0' + (sevenYearsAgo.getMonth() + 1)).slice(-2);
            const day = ('0' + sevenYearsAgo.getDate()).slice(-2);
            const maxDate = `${year}-${month}-${day}`;

            dateOfBirthInput.setAttribute('max', maxDate);
        });
    </script>

@endsection
