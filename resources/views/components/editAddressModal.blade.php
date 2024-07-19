<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editAddressModal">
    <i class="bi bi-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Edit Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.editAddress', $user->id) }}" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">House no./Unit no.Building<span class="text-danger">*</span> :</label>
                            <input type="text" name="house_number" value="{{ $user->house_number }}" class="form-control @error('house_number') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('house_number') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Moo :</label>
                            <input type="number" name="moo" value="{{ $user->moo }}" class="form-control @error('moo') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('moo') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Soi :</label>
                            <input type="text" name="soi" value="{{ $user->soi }}" class="form-control @error('soi') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('soi') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Road :</label>
                            <input type="text" name="road" value="{{ $user->road }}" class="form-control @error('road') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('road') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Province<span class="text-danger">*</span> :</label>
                            <input type="text" name="province" value="{{ $user->province }}" class="form-control @error('province') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('province') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">District<span class="text-danger">*</span> :</label>
                            <input type="text" name="district" value="{{ $user->district }}" class="form-control @error('district') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('district') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Sub District :</label>
                            <input type="text" name="sub_district" value="{{ $user->sub_district }}" class="form-control @error('sub_district') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('sub_district') }}</div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <label class="form-label">Postal code<span class="text-danger">*</span> :</label>
                            <input type="number" name="postal_code" value="{{ $user->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('postal_code') }}</div>
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
