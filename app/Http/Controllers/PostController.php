<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return Inertia::render('school-admin/Posts/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('school-admin/Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => "required|file|mimes:pdf,jpg,jpeg,png|max:2048",
            'content' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Generate UUID and keep original extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = Str::uuid()->toString() . '.' . $extension;

            // Store in public/uploads
            $request->file('image')->storeAs('uploads', $filename, 'public');

            $data['image'] = $filename;
        }

        Post::create($data);

        return redirect()->route('school-admin.posts.index')->with('success', 'Post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return Inertia::render('school-admin/Posts/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return Inertia::render('school-admin/Posts/Edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'image' => "nullable|file|mimes:pdf,jpg,jpeg,png|max:2048",
            'content' => 'nullable|string',
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

        $post->update($validated);

        return redirect()->route('school-admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('school-admin.posts.index')->with('success', 'Post deleted.');
    }
}
