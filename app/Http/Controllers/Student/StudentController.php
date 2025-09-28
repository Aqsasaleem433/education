<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student; 

class StudentController extends Controller
{
    public function index()
    {
        $items = User::where('role', 'school')->get();
        return view('school.index', compact('items'))->with('role', 'school');
    }

    public function create()
    {
        return view('school.create')->with('role', 'school');
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

        return redirect()->route('school.index')->with('success', 'School created successfully.');
    }

    public function show($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('students.show', compact('item'))->with('role', 'student');
    }

    public function edit($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        return view('students.edit', compact('item'))->with('role', 'student');
    }

    public function update(Request $request, $id)
    {
        $item = User::where('role', 'student')->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$item->id,
        ]);

        $item->update($request->only('name', 'email'));

        return redirect()->route('students.index')->with('success', 'S updated successfully.');
    }

    public function destroy($id)
    {
        $item = User::where('role', 'school')->findOrFail($id);
        $item->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
