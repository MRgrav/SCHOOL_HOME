<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return Inertia::render('school-admin/Departments/Index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('school-admin/Departments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['name'] = strtolower(str_replace(' ', '_', $data['display_name']));

        Department::create($data);

        return redirect()->route('school-admin.departments.index')->with('success', 'Department created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $department = Department::findOrFail($id);
        return Inertia::render('school-admin/Departments/Show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $department = Department::findOrFail($id);

        return Inertia::render('school-admin/Departments/Edit', [
            'department' => $department,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $department = Department::findOrFail($id);

        $data = $request->validate([
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['name'] = strtolower(str_replace(' ', '_', $data['display_name']));


        $department->update($data);

        return redirect('/school-admin/departments')->with('success', 'Department updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('school-admin.departments.index')->with('success', 'Department deleted.');
    }
}
