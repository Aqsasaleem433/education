<?php

namespace App\Http\Controllers\School;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
   
    public function dashboard()
    {
        return view('school.dash')->with('user', Auth::user());
    }

    public function index()
    {
        $schools = School::all();
        return view('school.index', compact('schools'));
    }

    // ✅ Show create form
    public function create()
    {
        return view('school.create');
    }

    // ✅ Store new school
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'address' => 'nullable|string',
            'contact_email' => 'nullable|email',
        ]);

        School::create($request->all());

        return redirect()->route('school.index')->with('success', 'School created successfully.');
    }


    public function show(School $school)
    {
        return view('school.show', compact('school'));
    }
 
    public function edit(School $school)
    {
        return view('school.edit', compact('school'));
    }

   
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'address' => 'nullable|string',
            'contact_email' => 'nullable|email',
        ]);

        $school->update($request->all());

        return redirect()->route('school.index')->with('success', 'School updated successfully.');
    }

    
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('school.index')->with('success', 'School deleted successfully.');
    }
}
