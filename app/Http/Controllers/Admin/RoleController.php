<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class RoleController implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:role-list|role-create|role-edit|role-delete', only: ['index', 'store']),
            new Middleware('permission:role-create', only: ['create', 'store']),
            new Middleware('permission:role-edit', only: ['edit', 'update']),
            new Middleware('permission:role-delete', only: ['destroy']),
        ];
    } 

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);

        return view('admin.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $permission = Permission::all();
        return view('admin.roles.create', compact('permission'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully');
    }

    public function show($id): View
    {
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;

        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit($id): View
    {
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permission' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
     $permissionIds = $request->input('permission', []);

// Convert IDs → names
$permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();

$role->syncPermissions($permissions);



        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
