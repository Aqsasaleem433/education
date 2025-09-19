<?php

namespace App\Http\Controllers\School;
namespace App\Http\Controllers;

use App\Models\School; // assuming schools are stored in users table with role=school
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $items = User::where('role', 'school')->get();
        return view('schools.index', compact('items'))->with('role', 'schools');
    }

    public function create()
    {
        return view('schools.create')->with('role', 'schools');
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

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }

    public function show($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('schools.show', compact('item'))->with('role', 'schools');
    }

    public function edit($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('schools.edit', compact('item'))->with('role', 'schools');
    }

    public function update(Request $request, $id)
    {
        $item = User::where('role', 'school')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$item->id,
        ]);

        $item->update($request->only('name', 'email'));

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        $item->delete();

        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }
}

