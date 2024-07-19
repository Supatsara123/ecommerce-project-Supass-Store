@extends('layouts.admin')

@section('title', 'Edit Promotion')

@section('content')

<div class="col-lg-10 col-md-10 col-sm-12 mx-auto">

    <div class="mb-5 text-center">
        <h2>Edit Promotion</h2>
    </div>

    <div class="card shadow-lg p-4 mb-5">
        <div class="row g-5">
            <h4 class="mb-2">Edit Promotion</h4>

            <form method="POST" action="{{ route('promotion.update', $promotion->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label class="form-label">Name<span class="text-danger">*</span> :</label>
                        <textarea name="name" rows="3" class="form-control @error('name') is-invalid @enderror">{{ $promotion->name }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label class="form-label">Slug<span class="text-danger">*</span> :</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $promotion->slug) }}" class="form-control @error('slug') is-invalid @enderror" oninput="this.value = this.value.toLowerCase()">
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $promotion->description }}</textarea>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label for="image" class="col-form-label">Current Image <span class="text-danger">*</span></label>
                        <div class="mb-2">
                            @if ($promotion->image)
                                <img src="{{ asset('/' . $promotion->image) }}" alt="Img" class="size-image">
                            @else
                                <p class="text-secondary bg-secondary">No image available.</p>
                            @endif
                        </div>

                        <label for="image" class="col-form-label">Change Image<span class="text-danger">*</span>:</label>
                        <input type="file" id="image" name="image" accept=".jpg,.gif,.png"
                            class="form-control @error('image') is-invalid @enderror" value="{{ $promotion->image }}">
                        <span class="text-">** Image Size 36"H X 72"W</span>
                        @error('image')
                            <span class="text text-danger my-1" style="font-size: 13px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label for="start_date" class="form-label">Start Date<span class="text-danger">*</span> :</label>
                        <input type="datetime-local" id="start_date" name="start_date" value="{{ $promotion->start_date }}" class="form-control @error('start_date') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label for="end_date" class="form-label">End Date<span class="text-danger">*</span> :</label>
                        <input type="datetime-local" id="end_date" name="end_date" value="{{ $promotion->end_date }}" class="form-control @error('end_date') is-invalid @enderror">
                        <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
                    </div>

                    <hr class="my-4">

                    {{-- Buttons --}}
                    <div class="row g-2">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <a href="/admin/promotion-list" class="btn btn-outline-secondary w-100">
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

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
