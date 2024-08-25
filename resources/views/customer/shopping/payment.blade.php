@extends('layouts.user')

@section('title', 'Payment')

@section('content')
    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">

        {{-- breadcrumb --}}
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('customer.index') }}">Home</a>
                    <span class="px-2">/</span><a href="{{ route('cart') }}">Cart</a>
                    <span class="px-2">/</span><div class="text-secondary mb-0">Payment</div>
                </div>
            </div>
        </div>

        <div class="container p-4">
            <div class="row g-5">

                <h2 class="fw-bold">Payment</h2>
                <hr class="my-0">

                <div class="col-12 col-md-7 p-4 bg-white rounded">

                    {{-- Customer --}}
                    <section>
                        <div class="row">
                            <div class="d-flex mb-2">
                                <strong class="fs-5">Customer</strong>
                                <div class="btn btn-outline-secondary btn-sm ms-auto">Edit</div>
                            </div>

                            <div class="d-flex flex-column">
                                <div>{{ $user->fname }} {{ $user->lname }}</div>
                                <div>{{ $user->email }}</div>
                                <div>{{ $user->phone }}</div>
                            </div>
                        </div>
                    </section>

                    <hr class="my-4">

                    {{-- Address --}}
                    <section>
                        <div class="row">
                            <div class="d-flex mb-2">
                                <strong class="fs-5">Shipping Address</strong>
                                <div class="btn btn-outline-secondary btn-sm ms-auto">Change</div>
                            </div>

                            <div class="d-flex flex-column">
                                <div>{{ $user->fname }} {{ $user->lname }}</div>
                                <div class="d-flex flex-row">
                                        {{ $user->house_number }}
                                        Moo {{ $user->moo }}
                                        {{ $user->soi }}
                                        {{ $user->sub_district }},
                                        {{ $user->Road }}
                                        {{ $user->district }} District,
                                        {{ $user->province }}
                                        {{ $user->postal_code }}
                                </div>
                                <div>{{ $user->phone }}</div>
                            </div>
                        </div>
                    </section>

                    <hr class="my-4">

                    {{-- Shipping --}}
                    <section>
                        <div class="row">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-truck fs-3"></i>
                                <strong class="fs-5 px-2">Shipping options</strong>
                            </div>

                            <div class="row">
                                <div
                                    class="col-lg-5 col-md-8 col-sm-12 delivery-option border border-2 rounded py-4 mb-2 mx-2">
                                    <input type="radio" name="shipping" id="standard_delivery" value="standard_delivery">
                                    <label for="standard_delivery">
                                        <div class="d-flex">
                                            <div>Standard Delivery</div>
                                            <div class="text-secondary ms-auto">Free</div>
                                        </div>
                                    </label>
                                </div>
                                <div
                                    class="col-lg-5 col-md-8 col-sm-12 delivery-option border border-2 rounded py-4 mb-2 mx-2">
                                    <input type="radio" name="shipping" id="express_delivery" value="express_delivery">
                                    <label for="express_delivery">
                                        <div class="d-flex justify-content-between">
                                            <div>EMS</div>
                                            <div class="text-secondary">฿ 50</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </section>

                    <hr class="my-4">

                    {{-- payment --}}
                    <section>
                        <div class="row">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-coin fs-3"></i>
                                <strong class="fs-5 px-2">Payment Method</strong>
                            </div>

                            <div class="row g-1">
                                <div class="col-3 col-md-3 border border-2 rounded py-2 mx-2">
                                    <input type="radio" name="payment" id="cash" value="cash">
                                    <label for="cash">
                                        <div class="d-flex flex-column text-center">
                                            Cash on Delivery
                                            <img src="/image/payment/img_cash.png" alt="Img" width="50%" height="50%"
                                                class="rounded mx-auto d-block my-2">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-3 col-md-3 border border-2 rounded py-2 mx-2 ">
                                    <input type="radio" name="payment" id="qr_promptpay" value="qr_promptpay">
                                    <label for="qr_promptpay">
                                        <div class="d-flex flex-column text-center">
                                            QR Promptpay
                                            <img src="/image/payment/img_promtpay.png" alt="Img" width="50%" height="50%"
                                                class="rounded mx-auto d-block my-2">
                                        </div>
                                    </label>
                                </div>
                                <div class="col-3 col-md-3 border border-2 rounded py-2 mx-2">
                                    <input type="radio" name="payment" id="mobile_banking" value="mobile_banking">
                                    <label for="mobile_banking">
                                        <div class="d-flex flex-column text-center">
                                            Mobile Banking
                                            <img src="/image/payment/img_mobile_banking.jpg" alt="Img" width="50%"
                                                height="50%" class="rounded mx-auto d-block my-2">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <hr class="my-4">

                    {{-- summary payment --}}
                    <section>
                        <div class="row mb-5">
                            <div class="bg-light p-4">
                                <strong class="fs-5 px-2 mb-2">Order Summary</strong>

                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount">
                                                <span class="font-lg fw-900 text-brand">$240.00</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount">
                                                <i class="ti-gift mr-5"></i>
                                                Free Shipping
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong>
                                                <span
                                                class="font-xl fw-900 text-brand">$240.00</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                </div>

                <div class="right-top col-12 col-md-5 p-4 bg-white rounded">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span>My Order</span>
                        <span class="badge bg-primary rounded-pill">{{ count($cartItems) }}</span>
                    </h4>
                    <ul class="list-group">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <span class="my-0">{{ $item->products->name }}</span>

                                <div class="row text-end">
                                    <span>฿ {{ number_format($item->products->selling_price), 2 }}</span>
                                    <small class="text-muted">x{{ $item->prod_qty }}</small>
                                </div>
                            </li>
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (BATH)</span>
                            {{-- <strong>{{ number_format($total, 2) }}</strong> --}}
                        </li>
                    </ul>
                </div>

                <form method="POST" action="{{ route('placeorder', $user->id) }}" id="updateForm"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3 mb-3">

                        <!-- Hidden input fields for predefined values -->
                        <input type="hidden" name="fname" value={{ $user->fname }}>
                        <input type="hidden" name="lname" value={{ $user->lname }}>
                        <input type="hidden" name="email" value={{ $user->email }}>
                        <input type="hidden" name="phone" value={{ $user->phone }}>
                        <input type="hidden" name="house_number" value={{ $user->house_number }}>
                        <input type="hidden" name="moo" value={{ $user->moo }}>
                        <input type="hidden" name="soi" value={{ $user->soi }}>
                        <input type="hidden" name="road" value={{ $user->road }}>
                        <input type="hidden" name="province" value={{ $user->province }}>
                        <input type="hidden" name="district" value={{ $user->district }}>
                        <input type="hidden" name="sub_district" value={{ $user->sub_district }}>
                        <input type="hidden" name="postal_code" value={{ $user->postal_code }}>

                        {{-- Buttons --}}
                        <div class="row g-2 text-center">
                            <div class="col-6 col-md-4">
                                <a href="{{ route('cart') }}">
                                    <button class="btn btn-outline-secondary w-100">
                                        Cancel
                                    </button>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="bi bi-cart4"></i>
                                    Buy
                                </button>
                            </div>
                        </div>
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
    </style>

@endsection
