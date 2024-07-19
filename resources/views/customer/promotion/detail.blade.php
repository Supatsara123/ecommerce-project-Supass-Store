@extends('layouts.user')

@section('title', $promotions['name'])

@section('content')
    <div class="col-lg-9 col-md-10 col-sm-12 mx-auto">
        <div class="container p-4 bg-white">
            {{-- <h6 class="mb-0">Promotion / {{ $promotions['name'] }}</h6> --}}
            <div class="d-flex">
                <a href="{{ route('customer.index') }}" class="px-2 text-dark"> Home</a> /
                <a href="{{ route('category') }}" class="px-2 text-dark"> All Promotion</a> /
                {{ $promotions['name'] }}
            </div>
        </div>

        <br>

        <div class="container p-4 bg-white">
            <div class="row p-4">
                <h2 class="text-center py-2 bg-info">{{ $promotions['name'] }}</h2>

                <div class="d-flex justify-content-between align-items-center py-2 mb-3">
                    <img src="{{ asset($promotions->image) }}" class="w-100 rounded" alt="image" />
                </div>

                <p>{!! $promotions['description'] !!}</p>

                <div class="d-flex">
                    <strong>Duration :</strong>
                    <p class="px-2">{{ $promotions['start_date'] }} - {{ $promotions['end_date'] }} </p>
                </div>

            </div>
        </div>
    </div>
@endsection
