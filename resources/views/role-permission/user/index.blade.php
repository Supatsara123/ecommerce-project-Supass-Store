@extends('layouts.superadmin')

@section('title', 'Users')

@section('content')

    @include('role-permission.nav-link')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Users
                            <a href="{{ url('/super-admin/users/create') }}" class="btn btn-primary float-end">Add Role</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->getRoleNames()->isNotEmpty())
                                                    @foreach ($user->getRoleNames() as $rolename)
                                                        <span class="badge bg-primary mx-1">{{ $rolename }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- Edit button --}}
                                                    <a href="{{ url('/super-admin/users/'.$user->id.'/edit') }}" aria-label="Edit {{ $user->name }}">
                                                        <button class="btn btn-sm btn-secondary me-2" role="button">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>

                                                    {{-- Delete button --}}
                                                    <form method="POST" action="{{ url('/super-admin/users/'.$user->id) }}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')" aria-label="Delete {{ $user->name }}">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
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
