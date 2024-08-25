@extends('layouts.user')

@section('title', $products['name'])

@section('content')
    <div class="col-lg-9 col-md-10 col-sm-12 mx-auto">
        <div class="container p-4 bg-white rounded">
            <div class="mb-0">
                <a href="{{ route('customer.index') }}">Home </a>/
                <a href="{{ route('category') }}">All Categories </a>/
                <a href="{{ route('viewcategory', $products->category->slug) }}">{{ $products->category->name }} </a>/
                <div class="text-secondary mb-0">{{ $products->name }}</div>
            </div>

        </div>

        <br>

        <div class="container bg-white rounded">
                <div class="row p-4">

                    {{-- Image product --}}
                    <div class="col-md-5 col-sm-12 border-right">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <img src="{{ asset($products->image) }}" class="w-100 h-100" alt="image" />
                        </div>
                    </div>

                    {{-- Data --}}
                    <div class="col-md-7 col-sm-12">
                        <h3 class="mb-3">
                            {{ $products['name'] }}
                            @if ($products->trending == '1')
                                <label class="float-end badge bg-danger fs-6 trending-tag">Trending</label>
                            @endif
                        </h3>

                        <hr>

                        <div class="d-flex text-secondary">
                            <i class="bi bi-clock-history pe-2"></i>
                            <p class="pe-2">latest update</p>
                            {{ $products['updated_at'] ? $products['updated_at'] : $products['created_at'] }}
                        </div>

                        <div class="flex flex-column">
                            <div class="d-flex">
                                <p class="me-1">หมวดหมู่</p>
                                <i class="bi bi-tags"></i>
                                <span class="px-2">:</span>
                                <a href="{{ route('viewcategory', $products->cate_id) }}">{{ $products->category->name }}</a>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-decoration-line-through text-secondary me-2">฿{{ number_format($products['original_price'], 2) }}</span>
                                <h3>฿ {{ number_format($products['selling_price'], 2) }}</h3>
                            </div>

                            <div class="flex items-center">
                                <hr>
                                @if ($products->quantity > 0)
                                    <label class="badge bg-success">In stock</label>
                                @else
                                    <label class="badge bg-danger">Out of stock</label>
                                @endif
                            </div>

                            <div class="row">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control qty-input text-center" style="max-width: 40px;" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            @if ($products->quantity > 0)
                                <button type="button" class="btn btn-outline-danger addToCartBtn" aria-disabled="false">
                                    <i class="bi bi-cart-plus"></i>
                                    <span>add to cart</span>
                                </button>
                                <button type="button" class="btn btn-danger" aria-disabled="false">
                                    buy now
                                </button>
                            @endif
                            <button type="button" class="btn btn-warning">
                                <i class="bi bi-bookmark"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="p-4 bg-white rounded">
                <div class="row p-4">
                    <h4 class="text py-2 bg-light">Product Specifications</h4>

                    <div class="d-flex">
                        <label class="w-25"><strong>Category :</strong></label>
                        <a href="{{ route('customer.index') }}" class="px-2"> Home</a> >
                        <a href="{{ route('category') }}" class="px-2"> All Categories</a> >
                        <a href="{{ route('viewcategory', $products->category->slug) }}" class="px-2 text-secondary">
                            <p>{{ $products->category->name }}</p>
                        </a>
                    </div>

                    <div class="d-flex">
                        <label class="w-25"><strong>Stock :</strong></label>
                        <p class="px-2">{{ $products['quantity'] }} pieces.</p>
                    </div>

                    <div class="d-flex">
                        <label class="w-25"><strong>Weight :</strong></label>
                        <p class="px-2">{{ $products['weight'] }} kg.</p>
                    </div>
                </div>
            </div>

            <br>
            <div class="p-4 bg-white rounded">
                <div class="row p-4">
                    <h4 class="text py-2 bg-light">Product Description</h4>
                    <p>{!! $products['description'] !!}</p>
                </div>
            </div>

            <br>
            <div class="p-4 bg-white rounded">
                <div class="row p-4">
                    <h4 class="text py-2 bg-light">Product Ratings</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
