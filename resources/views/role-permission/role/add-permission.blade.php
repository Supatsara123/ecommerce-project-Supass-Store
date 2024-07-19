@extends('layouts.superadmin')

@section('title', 'Add permission')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (@session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Roles : {{ $role->name }}
                            <a href="{{ url('/super-admin/roles') }}" class="btn btn-danger float-end">Add Role</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ url('/super-admin/roles/'.$role->id.'/give-permission') }}" method="POST">
                            @csrf

                            @method('PUT')
                            <div class="mb-3">
                                <label for=""  class="mb-4"><strong>Permission:</strong></label>

                                @error('permission')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <label>
                                                <input
                                                    type="checkbox"
                                                    name="permission[]"
                                                    value="{{ $permission->name }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                />
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                     @endforeach
                                </div>

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
