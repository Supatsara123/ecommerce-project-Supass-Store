@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')

    <div class="col-lg-10 col-md-10 col-sm-12 mx-auto">

        <div class="mb-5 text-center">
            <h2>Edut Product Form</h2>
        </div>

        <div class="card shadow-lg p-4 mb-5">
            <div class="row g-5">
                <h4 class="mb-2">Edit Product</h4>

                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label class="form-label">Name<span class="text-danger">*</span> :</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror" oninput="this.value = this.value.toSentence()">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label class="form-label">Slug<span class="text-danger">*</span> :</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" class="form-control @error('slug') is-invalid @enderror" oninput="this.value = this.value.toLowerCase()">
                            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Categories<span class="text-danger">*</span> :</label>
                            <select name="cate_id" id="cate_id" aria-label="cate_id" class="form-select @error('cate_id') is-invalid @enderror">
                                <option value="" disabled selected>-- Select --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->cate_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('cate_id') }}</div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Original Price<span class="text-danger">*</span> :</label>
                            <div class="input-group has-validation">
                                <input type="number" min="1" name="original_price" value="{{ $product->original_price }}" class="form-control @error('original_price') is-invalid @enderror">
                                <span class="input-group-text">฿</span>
                                <div class="invalid-feedback">{{ $errors->first('original_price') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Selling Price<span class="text-danger">*</span> :</label>
                            <div class="input-group has-validation">
                                <input type="number" min="1" name="selling_price" value="{{ $product->selling_price }}" class="form-control @error('selling_price') is-invalid @enderror">
                                <span class="input-group-text">฿</span>
                                <div class="invalid-feedback">{{ $errors->first('selling_price') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Quantity<span class="text-danger">*</span> :</label>
                            <div class="input-group has-validation">
                                <input type="number" min="0" name="quantity" value="{{ $product->quantity }}" class="form-control @error('quantity') is-invalid @enderror">
                                <span class="input-group-text">pieces.</span>
                                <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Weight<span class="text-danger">*</span> :</label>
                            <div class="input-group has-validation">
                                <input type="number" step="0.01" min="0.01" name="weight" value="{{ $product->weight }}" class="form-control @error('weight') is-invalid @enderror">
                                <span class="input-group-text">kg.</span>
                                <div class="invalid-feedback">{{ $errors->first('weight') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <label class="form-label">Tax<span class="text-danger">*</span> :</label>
                            <div class="input-group has-validation">
                                <input type="number" step="0.1" min="0" name="tax" value="{{ $product->tax }}" class="form-control @error('tax') is-invalid @enderror">
                                <span class="input-group-text">%</span>
                                <div class="invalid-feedback">{{ $errors->first('tax') }}</div>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="image" class="col-form-label">Current Image <span class="text-danger">*</span></label>
                            <div class="mb-2">
                                @if ($product->image)
                                    <img src="{{ asset('/' . $product->image) }}" alt="Img" class="size-image">
                                @else
                                    <p class="text-secondary bg-secondary">No image available.</p>
                                @endif
                            </div>
                            <label for="image" class="col-form-label">Change Image<span class="text-danger">*</span>:</label>
                            <input type="file" id="image" name="image" accept=".jpg,.gif,.png" class="form-control @error('image') is-invalid @enderror" value="{{ $product->image }}">
                            @error('image')
                                <span class="text text-danger my-1" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="col">
                                <label class="form-label">Status :</label>
                                <input type="checkbox" name="status" class="@error('status') is-invalid @enderror" {{ $product->status ? 'checked' : '' }}>
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                            </div>
                            <div class="col">
                                <label class="form-label">Trending :</label>
                                <input type="checkbox" name="trending" class="@error('trending') is-invalid @enderror" {{ $product->trending ? 'checked' : '' }}>
                                <div class="invalid-feedback">{{ $errors->first('trending') }}</div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="description">Description :</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $product->description }}</textarea>
                        </div>

                        <hr class="my-4">

                        {{-- Buttons --}}
                        <div class="row g-2">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <a href="/admin/product-list" class="btn btn-outline-secondary w-100">
                                    Cancel
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <button type="reset" class="btn btn-secondary w-100">
                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                </button>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <input type="submit" value="Save" class="btn btn-dark w-100">
                            </div>
                        </div>
                    </div>

                </form>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#description'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>
        </div>
    </div>
@endsection
