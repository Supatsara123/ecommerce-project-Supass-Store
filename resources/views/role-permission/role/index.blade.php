@extends('layouts.superadmin')

@section('title', 'Role')

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
                        <h4>Roles
                            <a href="{{ url('/super-admin/roles/create') }}" class="btn btn-primary float-end">Add Role</a>
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
                                @if (count($roles) > 0)
                                    @foreach ($roles as $role)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div>
                                                    {{-- Add/Edit Permission button --}}
                                                    <a href="{{ url('/super-admin/roles/'.$role->id.'/give-permission') }}">
                                                        <button class="btn btn-sm btn-secondary me-2" role="button">
                                                            <i class="bi bi-shield-fill-check"></i>
                                                            Add/Edit Role Permission
                                                        </button>
                                                    </a>

                                                    {{-- Edit button --}}
                                                    <a href="{{ url('/super-admin/roles/'.$role->id.'/edit') }}">
                                                        <button class="btn btn-sm btn-secondary me-2" role="button">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>

                                                    {{-- Delete button --}}
                                                    <form method="POST" action="{{ url('/super-admin/roles/'.$role->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete {{ $role->name }}?')">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
