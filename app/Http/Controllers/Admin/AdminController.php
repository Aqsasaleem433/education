<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        // Get only users with role schooladmin
        $items = User::role('SchoolAdmin')->get();
        return view('school.index', compact('items'));
    }

    public function create()
    {
        return view('school.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make('12345678'), // default password
        ]);

        // Make sure role exists
        Role::firstOrCreate(['name' => 'SchoolAdmin']);

        // Assign role to user
        $user->assignRole('SchoolAdmin');

        return redirect()->route('school.index')->with('success', 'School created successfully.');
    }

    public function show($id)
    {
        $item = User::findOrFail($id);

        if (!$item->hasRole('SchoolAdmin')) {
            abort(403, 'Not a school admin');
        }

        return view('school.show', compact('item'));
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        if (!$item->hasRole('SchoolAdmin')) {
            abort(403, 'Not a school admin');
        }

        return view('school.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);

        if (!$item->hasRole('SchoolAdmin')) {
            abort(403, 'Not a school admin');
        }

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $item->id,
        ]);

        $item->update($request->only('name', 'email'));

        return redirect()->route('school.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $item = User::findOrFail($id);

        if (!$item->hasRole('SchoolAdmin')) {
            abort(403, 'Not a school admin');
        }

        $item->delete();

        return redirect()->route('school.index')->with('success', 'School deleted successfully.');
    }
}
