@extends('layouts.superadmin')

@section('title', 'Create Roles')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Roles
                            <a href="{{ url('roles') }}" class="btn btn-danger float-end">Add Role</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('super-admin/roles') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
