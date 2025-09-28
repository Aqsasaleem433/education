<?php

namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('school_id', auth()->id())->get();
        return view('schools.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('schools.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'school_id' => auth()->id(),
        ]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('schools.roles.index')
            ->with('success', 'Role created successfully for your school.');
    }

    public function edit(Role $role)
    {
        $this->authorizeRole($role);

        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('schools.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorizeRole($role);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('schools.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $this->authorizeRole($role);

        $role->delete();

        return redirect()->route('schools.roles.index')
            ->with('success', 'Role deleted successfully.');
    }

    private function authorizeRole(Role $role)
    {
        if ($role->school_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
