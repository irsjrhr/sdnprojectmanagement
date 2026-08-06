<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('can:read roles', only: ['index', 'getPermissions']),
            new Middleware('can:create roles', only: ['create', 'store']),
            new Middleware('can:update roles', only: ['edit', 'update', 'syncPermissions']),
            new Middleware('can:delete roles', only: ['destroy']),
        ];
    }

    public function index()
    {
        $roles = Role::withCount('users', 'permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            return redirect()->route('roles.index')->with('error', 'Cannot delete role assigned to users.');
        }
        if ($role->name === 'Super Admin') {
            return redirect()->route('roles.index')->with('error', 'Cannot delete Super Admin role.');
        }
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }

    public function getPermissions(Role $role)
    {
        $allPermissions = \Spatie\Permission\Models\Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        
        $permissions = $allPermissions->map(function($permission) use ($rolePermissions) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'assigned' => in_array($permission->name, $rolePermissions)
            ];
        });

        return response()->json([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function syncPermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array'
        ]);

        $role->syncPermissions($request->permissions ?? []);

        return back()->with('success', 'Permissions updated successfully.');
    }
}
