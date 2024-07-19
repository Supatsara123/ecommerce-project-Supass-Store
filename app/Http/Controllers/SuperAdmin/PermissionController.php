<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('role-permission.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name'
        ]);

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('/super-admin/permissions')->with('status','Permission Created Successfully');
    }

    public function edit($id)
    {
        $permissions = Permission::find($id);
        return view('role-permission.permission.edit', ['permissions' => $permissions]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name'
        ]);

        $permission = Permission::find($id);
        if (!$permission) {
            return back()->withErrors(['error' => 'Permission not found']);
        }

        $permission = Permission::find($id);

        $permission->update([
            'name' => $request->name
        ]);

        return redirect('/super-admin/permissions')->with('status','Permission Updated Successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return back()->withErrors(['error' => 'Permission not found']);
        }

        $permission->delete();
        return redirect('/super-admin/permissions')->with('status','Deleted Successfully');

    }
}
