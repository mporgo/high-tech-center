<?php

// app/Http/Controllers/Admin/BlogController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        if ($validated['status'] === 'published' && !$validated['published_at']) {
            $validated['published_at'] = now()->format('Y-m-d');
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Article créé avec succès');
    }

    public function show(BlogPost $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    public function edit(BlogPost $blog)
    {
        // Passer la variable $blog à la vue avec l'alias $post pour compatibilité
        return view('admin.blog.edit', ['post' => $blog]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date'
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blog', 'public');
        }

        if ($validated['status'] === 'published' && !$validated['published_at']) {
            $validated['published_at'] = now()->format('Y-m-d');
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Article mis à jour avec succès');
    }

    public function destroy(BlogPost $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Article supprimé avec succès');
    }
}
