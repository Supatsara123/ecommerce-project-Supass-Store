<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editProfileInfoModal">
    <i class="bi bi-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editProfileInfoModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Edit Basic Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.editBasicInfo', $user->id) }}" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">First Name<span class="text-danger">*</span> :</label>
                            <input type="text" name="fname" value="{{ $user->fname }}" class="form-control @error('fname') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('fname') }}</div>
                        </div>

                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Last Name<span class="text-danger">*</span> :</label>
                            <input type="text" name="lname" value="{{ $user->lname }}" class="form-control @error('lname') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('lname') }}</div>
                        </div>

                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Gender<span class="text-danger">*</span> :</label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="lgbt" {{ $user->gender == 'lgbt' ? 'selected' : '' }}>LGBT+</option>
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Date of Birth<span class="text-danger">*</span> :</label>
                            <input type="date" id="dateOfBirth" name="dateOfBirth" value="{{ $user->dateOfBirth }}" class="form-control @error('dateOfBirth') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('dateOfBirth') }}</div>
                            <small class="text-secondary">* Must be at least seven years old.</small>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
