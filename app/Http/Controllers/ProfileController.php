<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Profile;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::with('role', 'department')->latest()->get();
        return Inertia::render('school-admin/Profiles/Index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return Inertia::render('school-admin/Profiles/Create', [
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => "nullable|file|mimes:pdf,jpg,jpeg,png|max:2048",
            'role_id' => 'nullable|exists:roles,id',
            'position' => 'nullable|string',
            'department_id' => 'nullable|exists:departments,id',
            'detail' => 'nullable|string',
            'message' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Generate UUID and keep original extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = Str::uuid()->toString() . '.' . $extension;

            // Store in public/uploads
            $request->file('image')->storeAs('uploads', $filename, 'public');

            $data['image'] = $filename;
        }

        Profile::create($data);

        return redirect()->route('school-admin.profiles.index')->with('success', 'Profile created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->load('role');
        $profile->load('department');
        return Inertia::render('school-admin/Profiles/Show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $profile = Profile::findOrFail($id);
        $roles = Role::all();
        $departments = Department::all();

        return Inertia::render('school-admin/Profiles/Edit', [
            'profile' => $profile,
            'roles' => $roles,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $profile = Profile::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'position' => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'detail' => 'nullable|string',
            'message' => 'nullable|string',
            'image' => "nullable|file|mimes:pdf,jpg,jpeg,png|max:2048",
        ]);

        // Only update if a new image is uploaded
        if ($request->hasFile('image')) {
            // Generate UUID and keep original extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = Str::uuid()->toString() . '.' . $extension;

            // Store in public/uploads
            $request->file('image')->storeAs('uploads', $filename, 'public');

            $validated['image'] = $filename;
        }else {
            unset($validated['image']); // remove from update array
        }

        $profile->update($validated);

        return redirect('/school-admin/profiles')->with('success', 'Profile updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('school-admin.profiles.index')->with('success', 'Profile deleted.');
    }
}
