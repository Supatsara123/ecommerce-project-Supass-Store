<!-- Button trigger modal -->
<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editContactModal">
    <i class="bi bi-pencil"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Edit Contact Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.editContact', $user->id) }}" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <label class="form-label">Mobile Number<span class="text-danger">*</span> :</label>
                            <input type="number" name="phone" value="{{ $user->phone }}" class="form-control @error('phone') is-invalid @enderror">
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email<span class="text-danger">*</span> :</label>
                            <div class="info-icon">
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" disabled>
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                <button type="button" class="btn btn-link" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="<small>This information cannot be edited. Please contact admin.</small>">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
