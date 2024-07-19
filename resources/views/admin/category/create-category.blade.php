@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-12 mx-auto">

    <div class="mb-5 text-center">
        <h2>Add New Category Form</h2>
    </div>

    <div class="card shadow-lg p-4 mb-5">
        <div class="row g-5">
            <h4 class="mb-2">Add New Category</h4>

            <form method="POST" action="{{ route('category.insert') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">Name<span class="text-danger">*</span> :</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">Slug<span class="text-danger">*</span> :</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" oninput="this.value = this.value.toLowerCase()">
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label class="form-label">Description<span class="text-danger">*</span> :</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <div class="col">
                            <label class="form-label">Status :</label>
                            <input type="checkbox" name="status" class="@error('status') is-invalid @enderror" {{ old('status') ? 'checked' : '' }}>
                            <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                        </div>
                        <div class="col">
                            <label class="form-label">Popular :</label>
                            <input type="checkbox" name="popular" class="@error('popular') is-invalid @enderror" {{ old('popular') ? 'checked' : '' }}>
                            <div class="invalid-feedback">{{ $errors->first('popular') }}</div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">Popular<span class="text-danger">*</span> :</label>
                        <input type="checkbox" name="popular" class="@error('popular') is-invalid @enderror" {{ old('popular') ? 'checked' : '' }}>
                        <div class="invalid-feedback">{{ $errors->first('popular') }}</div>
                    </div> --}}
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label for="image" class="col-form-label">Selected Image<span class="text-danger">*</span> :</label>
                        <input type="file" id="image" name="image" accept=".jpg,.gif,.png" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="text text-danger my-1" style="font-size: 13px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <hr class="my-4">

                    {{-- Buttons --}}
                    <div class="row g-2">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <a href="/admin/category-list" class="btn btn-outline-secondary w-100">
                                Cancel
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input type="submit" value="Save" class="btn btn-dark w-100">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
