@extends('layouts.admin')

@section('title', 'Products List')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Products List
                        <a href="{{ route('product.create') }}" class="btn btn-primary float-end">Add Product</a>
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
                                    <th>Category</th>
                                    <th>Selling Price</th>
                                    <th>Action</th>
                                    {{-- Uncomment the following lines if needed in future --}}
                                    {{-- <th>Description</th>
                                    <th>Original Price</th>
                                    <th>Quantity (pcs.)</th>
                                    <th>Weight (kg.)</th>
                                    <th>Tax (%)</th>
                                    <th>Status</th>
                                    <th>Trending</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($products) > 0)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <img src="{{ asset($product->image) }}" class="size-image" alt="Img" />
                                            </td>
                                            <td>{{ $product->category->name }}</td> {{-- pull data from function category (file: product Model) --}}
                                            <td>฿ {{ $product->selling_price }}</td>
                                            <td>
                                                <div class="g-2">
                                                    {{-- Edit button --}}
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    {{-- Delete button --}}
                                                    <form method="POST" action="{{ route('product.delete', $product->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete {{ $product->name }}?')">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            {{-- Uncomment the following lines if needed in future --}}
                                            {{-- <td>{!! Str::limit($product->description, 80) !!}</td>
                                            <td>฿ {{ $product->original_price }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->weight }}</td>
                                            <td>{{ $product->tax }}</td>
                                            <td>{{ $product->status }}</td>
                                            <td>{{ $product->trending }}</td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    {{-- No Data Available Message --}}
                                    <tr class="text-center bg-light" style="height: 500px;">
                                        <td colspan="5" class="align-middle">
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
</div>

@endsection
