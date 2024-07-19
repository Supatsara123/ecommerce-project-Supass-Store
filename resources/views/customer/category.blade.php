@extends('layouts.user')

@section('title', 'All Categories')

@section('content')

    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
        <div class="row px-4">

            <h4 class="text py-2">ALL CATEGORIES</h4>

            @if (isset($category) && count($category) > 0)
                @foreach ($category as $cate)
                    <div class="col-6 col-lg-2 col-md-4 g-2">
                        <a href="{{ route('viewcategory', $cate->slug) }}">
                            <div class="card">
                                <img src="{{ asset('/' . $cate->image) }}" alt="{{ $cate['slug'] }}" class="card-img-top">
                                <div class="card-body">
                                    <strong>{{ $cate->name }}</strong>
                                    <p>{{ $cate->description }}</p>
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
