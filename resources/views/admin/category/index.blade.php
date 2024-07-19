@extends('layouts.admin')

@section('title', 'Categories List')

@section('content')

    <div class="row">
        <div class="col-12 mx-auto">

            @if (@session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Categories List
                        <a href="{{ url('/admin/create-category') }}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td><img src="{{ asset($category->image) }}" class="size-image" alt="Img" /></td>
                                            <td>
                                                <div class="g-2">
                                                    {{-- Edit button --}}
                                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-secondary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    {{-- Delete button --}}
                                                    <form method="POST" action="{{ route('category.delete', $category->id) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete {{ $category->title }} ?')">
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
                                        <td colspan="6" class="align-middle">
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
