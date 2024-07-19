@extends('layouts.user')

@section('title', $category['name'])

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <div class="row px-4">

            <h4 class="py-2">{{ $category->name }}</h4>

            @if (isset($products) && count($products) > 0)
                @foreach ($products as $prod)
                    <div class="col-lg-3 col-md-4 col-sm-6 g-1">
                        <a href="{{ url('customer/category/' . $category->slug . '/' . $prod->slug) }}">
                            <div class="card">
                                <img src="{{ asset('/' . $prod->image) }}" class="card-img-top" alt="{{ $prod['name'] }}">
                                <div class="card-body">
                                    <strong>{{ $prod['name'] }}</strong>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text text-success">฿{{ number_format($prod['selling_price'], 2) }}
                                        </p>
                                        <p class="text-decoration-line-through">
                                            ฿{{ number_format($prod['original_price'], 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <img src="/image/img_data_not_found.png" alt="Img" width="200px" height="200px">
                    <h5 class="text-secondary">No Product Available.</h5>
                </div>
            @endif
        </div>
    </div>
@endsection
