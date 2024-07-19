@extends('layouts.admin')

@section('title', 'Promotions List')

@section('content')

    <div class="row">
        <div class="col-12 mx-auto">

            {{-- carousel --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Preview Banner Ads</h5>
                </div>
                <div class="card-body center-carousel text-center">
                    <div class="w-50">
                        @include('components.banner')
                    </div>
                </div>
            </div>

            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Advertising List
                        <a href="{{ url('/admin/create-promotion') }}" class="btn btn-primary float-end">Add Promotion</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>start_date</th>
                                    <th>end_date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($promotions) > 0)
                                    @foreach ($promotions as $promotion)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $promotion->id }}</td>
                                            <td>{{ $promotion->name }}</td>
                                            <td><img src="{{ asset($promotion->image) }}" class="size-image-banner"
                                                    alt="Img" />
                                            </td>
                                            <td>{!! Str::limit($promotion->description, 80) !!}</td>
                                            <td>{{ $promotion->slug }}</td>
                                            <td>{{ $promotion->start_date }}</td>
                                            <td>{{ $promotion->end_date }}</td>
                                            <td>
                                                <div class="g-2">
                                                    {{-- Edit button --}}
                                                    <a href="{{ route('promotion.edit', $promotion->id) }}">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            data-bs-title="Edit Promotion">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>

                                                    {{-- Delete button --}}
                                                    <form method="POST"
                                                        action="{{ route('promotion.delete', $promotion->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete {{ $promotion->title }} ?')">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{-- No Data Available Message --}}
                                    <tr class="text-center bg-light" style="height: 500px;">
                                        <td colspan="8" class="align-middle">
                                            <img src="/image/img_data_not_found.png" alt="Img" width="200px" height="200px">
                                            <h5 class="text-secondary">No Data Available.</h5>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
