@extends('layouts.superadmin')

@section('title', 'Permission')

@section('content')

    @include('role-permission.nav-link')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (@session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Permissions
                            <a href="{{ url('/super-admin/permissions/create') }}" class="btn btn-primary float-end">Add Permission</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($permissions) > 0)
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <div>
                                                    {{-- Edit button --}}
                                                    <a href="{{ url('/super-admin/permissions/'.$permission->id.'/edit') }}">
                                                        <button class="btn btn-sm btn-secondary me-2" role="button">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>

                                                    {{-- Delete button --}}
                                                    <form method="POST" action="{{ url('/super-admin/permissions/'.$permission->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete {{ $permission->name }}?')">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    {{-- No Data Available Message --}}
                                    <tr style="height: 300px;" class="text-center bg-light">
                                        <td colspan="6" class="text-center" style="vertical-align: middle;">No data available.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
