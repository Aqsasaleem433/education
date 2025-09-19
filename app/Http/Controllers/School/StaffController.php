<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff; 

class StaffController extends Controller
{
    public function index()
    {
        $items = User::where('role', 'school')->get();
        return view('staff.index', compact('items'))->with('role', 'staff');
    }

    public function create()
    {
        return view('staff.create')->with('role', 'staff');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => 'school',
            'password' => bcrypt('password'), // default password
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    public function show($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('staff.show', compact('item'))->with('role', 'staff');
    }

    public function edit($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('staff.edit', compact('item'))->with('role', 'staff');
    }

    public function update(Request $request, $id)
    {
        $item = User::where('role', 'school')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$item->id,
        ]);

        $item->update($request->only('name', 'email'));

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        $item->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
