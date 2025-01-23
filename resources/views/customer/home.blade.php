@extends('layouts.user')

@section('title', 'Home')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <div class="px-4">

            {{-- Banner --}}
            <div class="row mb-4 g-0">
                <div class="col-md-8 col-sm-12 p-0">
                    @include('components.banner')
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-12 mb-0">
                            <img src="/image/banner/banner-summer.jpg" alt="Summer Banner" class="img-fluid">
                        </div>
                        <div class="col-12">
                            <a href="#">
                                <img src="/image/banner/banner-shipping.jpg" alt="Shipping Banner" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Categories --}}
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="py-2">Trending Categories</h4>
                <a href="{{ route('category') }}" class="text-secondary">See All</a>
            </div>
            <div id="categoryCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner px-4">
                    @if (isset($trending_category) && count($trending_category) > 0)
                        @foreach ($trending_category->chunk(6) as $chunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} d-none d-lg-block">
                                <div class="row">
                                    @foreach ($chunk as $tcate)
                                        <div class="col-2 col-lg-2 col-md-3 g-1">
                                            <a href="{{ route('viewcategory', $tcate->slug) }}">
                                                <div class="card">
                                                    <img src="{{ asset($tcate->image) }}" class="card-img-small"
                                                        alt="{{ $tcate->name }}">
                                                    <div class="card-body font-small-card text-center">
                                                        {{ $tcate->name }}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        @foreach ($trending_category->chunk(8) as $chunk)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} d-lg-none">
                                <div class="row">
                                    @foreach ($chunk as $tcate)
                                        <div class="col-3 col-md-3 g-2">
                                            <a href="{{ route('viewcategory', $tcate->slug) }}">
                                                <div class="card">
                                                    <img src="{{ asset($tcate->image) }}" class="card-img-small"
                                                        alt="{{ $tcate->name }}">
                                                    <div class="card-body font-small-card text-center">
                                                        {{ $tcate->name }}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No Trending categories available.</p>
                    @endif
                </div>
                <button id="carouselPrev" class="carousel-control-prev custom-carousel-control" type="button"
                    data-bs-target="#categoryCarousel" data-bs-slide="prev" disabled>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button id="carouselNext" class="carousel-control-next custom-carousel-control" type="button"
                    data-bs-target="#categoryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <br>
            <hr class="py-2">

            {{-- Featured Product --}}
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="py-2">Featured Product</h4>
                <a href="#" class="text-secondary">See All</a>
            </div>
            <div class="row">
                @if (isset($featured_product) && count($featured_product) > 0)
                    @foreach ($featured_product as $item)
                        <div class="col-6 col-lg-2 col-md-3 g-2">
                            {{-- <a href="{{ url('customer/category/'.$category->slug.'/'.$item->slug) }}"> --}}
                            <div class="card shadow-sm">
                                <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">

                                <div class="card-body">
                                    {{-- <p class="card-text fw-semibold">{{ $item->name }}</p> --}}
                                    <p class="card-text fw-semibold">{{ ucwords(strtolower($item->name)) }}</p>
                                </div>
                                <div class="card-footer bg-white border-0">
                                    @if ($item['selling_price'] != $item['original_price'])
                                        <div class="d-flex justify-content-between">
                                            <span class="text-success">฿{{ number_format($item->selling_price, 2) }}</span>
                                            <span class="text-decoration-line-through">฿{{ number_format($item->original_price, 2) }}</span>
                                        </div>
                                    @else
                                        <p class="mb-0">
                                            ฿{{ number_format($item['original_price'], 2) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>No featured products available.</p>
                @endif
            </div>

        </div>
    </div>

    <style>
        .custom-carousel-control {
            width: 30px;
            height: 30px;
            background-color: #dadada;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev.custom-carousel-control {
            left: -30px;
        }

        .carousel-control-next.custom-carousel-control {
            right: -30px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }
    </style>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var carouselPrev = document.getElementById('carouselPrev');
            var carouselNext = document.getElementById('carouselNext');
            var categoryCarousel = document.getElementById('categoryCarousel');
            var carouselItems = categoryCarousel.querySelectorAll('.carousel-item');
            var bsCarousel = new bootstrap.Carousel(categoryCarousel, {
                interval: false
            });

            categoryCarousel.addEventListener('slide.bs.carousel', function(event) {
                carouselPrev.disabled = event.to === 0;
                carouselNext.disabled = event.to === carouselItems.length - 1;
            });

            // Initially check the state of the carousel controls
            carouselPrev.disabled = true; // Disable previous button on load
            if (carouselItems.length <= 1) {
                carouselNext.disabled = true;
            }
        });
    </script>
@endsection
