@extends('layouts.user')

@section('title', 'Personal Profile')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">

        <div class="row g-2 mb-5">
            <div class="d-flex align-items-center text-center bg-secondary py-4">
                <div class="col-12 col-md-2 text-center">
                    @if ($user->image !== null)
                        <img src="{{ asset($user->image) }}" class="rounded-circle" width="100px" height="100px"
                            alt="profile_image" style="object-fit: cover;" />
                    @else
                        <img src="/image/logo/profile_icon.png" alt="profile_icon" class="rounded-circle" width="100px"
                            height="100px" style="object-fit: cover;" />
                    @endif

                    <button class="btn btn-outline-dark btn-sm p-1 mt-2" onclick="editImg(event)">
                        <small>Edit Image</small>
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
                <div class="col-12 col-md-4 text-start ms-3">
                    <div class="row text-white">
                        <h3>{{ $user->name }}</h3>
                        <h6 class="fw-light mb-4">{{ $user->email }}</h6>

                        <h6 class="fw-light mb-0">Logout</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <ul class="list-group text-start">
                    {{-- <li class="list-group-item w-100"> --}}
                    <a class="nav-link-profile" href="{{ route('profile') }}">
                        <button class="btn btn-lg btn-light text-start w-100">
                            <i class="bi bi-tags"></i>
                            My Profile
                        </button>
                    </a>
                    {{-- </li> --}}
                    <li class="list-group-item d-flex justify-content-start">
                        Payment Method
                    </li>
                    <li class="list-group-item d-flex justify-content-start">
                        Change Password
                    </li>
                    <li class="list-group-item d-flex justify-content-start">
                        Cart
                    </li>
                </ul>
            </div>

            <div class="right-top col-md-8">

                <div class="py-2">
                    <h2>My Profile</h2>
                </div>

                @if ($user->fname !== null)
                    <div class="row g-2">

                        {{-- <a href="{{ route('profile.edit') }}" class="text-end">
                                    <button class="btn btn-dark btn-sm">Edit Profile</button>
                                </a> --}}

                        <div class="p-4 bg-white rounded">
                            <div class="row">
                                <div class="d-flex">
                                    <h4 class="py-2">Basic Info</h4>
                                    @include('components.editProfileInfoModal')
                                </div>

                                <div class="d-flex">
                                    <label class="w-25 text-end"><strong>Name :</strong></label>
                                    <p class="px-4">{{ Str::title($user->fname) }} {{ Str::title($user->lname) }}</p>
                                </div>
                                <div class="d-flex">
                                    <label class="w-25 text-end"><strong>Gender :</strong></label>
                                    <p class="px-4">{{ $user->gender }}</p>
                                </div>
                                <div class="d-flex">
                                    <label class="w-25 text-end"><strong>Birth :</strong></label>
                                    <p class="px-4">{{ $user->dateOfBirth }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white rounded">
                            <div class="row">
                                <div class="d-flex">
                                    <h4 class="py-2">Contact Info</h4>
                                    @include('components.editContactModal')
                                </div>

                                <div class="d-flex">
                                    <label class="w-25"><strong>Phone Number :</strong></label>
                                    <p class="px-2">{{ $user->phone }}</p>
                                </div>
                                <div class="d-flex">
                                    <label class="w-25"><strong>Email :</strong></label>
                                    <p class="px-2">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white rounded">
                            <div class="row">
                                <div class="d-flex">
                                    <h4 class="py-2">Address</h4>
                                    @include('components.editAddressModal')
                                </div>

                                <div class="row d-flex">
                                    <p>
                                        {{ $user->house_number }}
                                        Moo {{ $user->moo }}
                                        {{ $user->soi }}
                                        {{ $user->sub_district }},
                                        {{ $user->Road }}
                                        {{ $user->district }} District,
                                        {{ $user->province }}
                                        {{ $user->postal_code }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="tenter" height="500px">
                        <img src="/image/img_data_not_found.png" alt="Img" width="200px" height="200px">
                        <h6 class="text-secondary">No Data Profile.</h6>
                        <a href=" {{ route('profile.edit') }}">
                            <button class="btn btn-danger">Create Data
                                Profile</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function editImg(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Edit Image',
                html: `
            <form method="POST" action="{{ route('profile.editImg') }}" id="edit-image-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="text-start mb-3">
                    @if ($user->image !== null)
                        <label for="image" class="col-form-label">Current Image</label>
                        <div class="mb-2">
                            @if ($user->image)
                                <img src="{{ asset('/' . $user->image) }}" alt="Current Image" width="70px" height="70px">
                            @else
                                <p class="text-secondary bg-secondary">No image available.</p>
                            @endif
                        </div>
                    @endif
                    <label for="image" class="col-form-label">Change Image<span class="text-danger">*</span>:</label>
                    <input type="file" id="image" name="image" accept=".jpg,.gif,.png" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="text text-danger my-1" style="font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>

                <br>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary me-2" id="cancelBtn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
            `,
                showConfirmButton: false,
                showCancelButton: false,
                didOpen: () => {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    const form = document.getElementById('edit-image-form');
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const formData = new FormData(form);

                        fetch('{{ route('profile.editImg') }}', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content')
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: data.message,
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000 // Auto close after 2 seconds
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error); // Log any JavaScript fetch errors
                                Swal.fire('Error', 'An error occurred', 'error');
                            });

                    });

                    document.getElementById('cancelBtn').addEventListener('click', () => {
                        Swal.close();
                    });
                }
            });
        }
    </script>

@endsection
