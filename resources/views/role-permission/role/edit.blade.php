@extends('layouts.superadmin')

@section('title', 'Edit Roles')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Roles
                            <a href="{{ url('/super-admin/roles') }}" class="btn btn-danger float-end">Add Role</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('/super-admin/roles/' . $roles->id) }}" method="POST">
                            @csrf

                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" value="{{ $roles->name }}" class="form-control" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
