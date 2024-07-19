<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('/super-admin/roles')->with('status','Role Created Successfully');
    }

    public function edit($id)
    {
        $roles = Role::find($id);
        return view('role-permission.role.edit', ['roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name'
        ]);

        $role = Role::find($id);
        if (!$role) {
            return back()->withErrors(['error' => 'Role not found']);
        }

        $role = Role::find($id);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('/super-admin/roles')->with('status','Role Updated Successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return back()->withErrors(['error' => 'Role not found']);
        }

        $role->delete();
        return redirect('/super-admin/roles')->with('status','Deleted Successfully');
    }

    public function addPermissionToRole($id)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($id);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id')
                                ->all();

        // Return the view with the role and permissions
        return view('role-permission.role.add-permission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }

    public function givePermissionToRole(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        // Find the role by its ID, or fail if not found
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }
}
