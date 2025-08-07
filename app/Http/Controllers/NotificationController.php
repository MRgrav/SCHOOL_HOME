<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('school-admin/Notifications/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        Notification::create([
            'title' => $validated['title'],
            'message' => $validated['message'] ?? null,
            'user_id' => Auth::id(), // or any other user ID
        ]);

        return redirect()->route('school-admin.notifications.schoolAdminIndex')
            ->with('success', 'Notification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notification::findOrFail($id);
        return Inertia::render('school-admin/Notifications/Show', [
            'notification' => $notification,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notification = Notification::findOrFail($id);
        return Inertia::render('school-admin/Notifications/Edit', [
                'notification' => $notification,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Update the notification
        $notification = Notification::findOrFail($id);
        $notification->update($validated);

        // Redirect back to index with success message
        return redirect()
            ->route('school-admin.notifications.schoolAdminIndex')
            ->with('success', 'Notification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);

        $notification->delete();

        return redirect()
            ->route('school-admin.notifications.schoolAdminIndex')
            ->with('success', 'Notification deleted successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function schoolAdminIndex()
    {

        $notifications = Notification::latest('created_at')->get();
        
        return Inertia::render('school-admin/Notifications/Index', [
            'notifications' => $notifications,
        ]);
    }
}
