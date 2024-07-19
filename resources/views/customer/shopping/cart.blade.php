@extends('layouts.user')

@section('title', 'My Cart')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">

        {{-- breadcrumb --}}
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span class="px-2">/</span> Your Cart
                </div>
            </div>
        </div>

        {{-- <div class="container text-center bg-white">
            <div class="d-flex">
                <i width="30" height="30" class="bi bi-cart-fill"></i>
                <h4 class="text px-4 py-2">My Cart</h4>
            </div>
        </div> --}}

        <section class="mt-50 mb-50">
            <div class="container bg-white rounded p-4">
                <div class="row">

                    <div class="d-flex flex-row border-bottom mb-0">
                        <i class="bi bi-cart-fill fs-2"></i>
                        <h4 class="text px-2 py-2">My Cart ({{ count($cartitems) }})</h4>
                    </div>

                    @if (isset($cartitems) && count($cartitems) > 0)
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cartitems as $item)
                            <div class="row product_data border-bottom w-100 py-3">
                                <div class="d-flex justify-content-end">
                                    <div class="delete-cart-item fs-5" style="cursor: pointer;">
                                        {{-- <i class="bi bi-trash3"></i> --}}
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                </div>
                                <div class="col-3 col-md-2">
                                    <img src="{{ asset($item->products->image) }}" width="80px" height="80px" alt="Img" />
                                </div>
                                <div class="col-9 col-md-10">
                                    <div class="col-md-12">
                                        <h6 class="fw-semibold">{{ $item->products->name }}</h6>
                                    </div>
                                    <div class="col-md-12 d-flex align-items-center">
                                        <h5>฿ {{ number_format($item->products->selling_price, 2) }}</h5>
                                        <p class="mb-0 mx-2">/Each</p>

                                        <span class="text-decoration-line-through text-secondary me-4">
                                            ฿ {{ number_format($item->products->original_price, 2) }}
                                        </span>
                                    </div>

                                    <div class="col-md-12 pt-2">
                                        <div class="row d-flex justify-content-between bg-light rounded">
                                            <div class="col-12 col-md-9">
                                                <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                                                @if ($item->products->quantity > $item->prod_qty)
                                                    <label for="Quantity">Quantity</label>
                                                    <div class="input-group text-center py-2 mb-0">
                                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                                        <input type="number" name="quantity" min="1" max="40"
                                                            step="1" name="quantity"
                                                            class="form-control qty-input text-center"
                                                            value="{{ $item->prod_qty }}" style="max-width: 60px;" />
                                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                                    </div>
                                                @else
                                                    <p class="fw-semibold py-2 mb-0">Out of Stock</p>
                                                @endif
                                            </div>
                                            {{-- <div class="col-12 col-md-3 d-flex align-self-center">
                                                <h5 class="text-danger">฿ {{ number_format($item->products->selling_price, 2) }}</h5>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $total += $item->products->selling_price * $item->prod_qty;
                            @endphp
                        @endforeach
                        <div class="d-flex justify-content-between align-items-center bg-light my-2 py-2">
                            <h6>Total Price :  ฿{{ number_format($total, 2) }}</h6>

                            <a href="{{ route('payment.index') }}">
                                <button class="btn btn-success">Continue to Check Out</button>
                            </a>
                        </div>

                        <div class="d-flex text-end mt-4">
                            Want to add more products?
                            <a href="{{ route('customer.index') }}" class="ms-2">Back to Shopping</a>
                        </div>
                    @else
                        {{-- No Data Available Message --}}
                        <div class="text-center py-4">
                            <img src="/image/cart_empty.png" alt="Img" width="100px" height="100px" class="mb-4">
                            <h6 class="text-secondary">Your Cart's Empty.</h6>
                            <h4 class="">Start Shopping Now</h4>
                            <br>
                            <a href="{{ route('customer.index') }}">
                                <button class="btn btn-dark">Browse Products</button>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
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
    </style>

@endsection
