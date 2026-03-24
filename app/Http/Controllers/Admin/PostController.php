<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create(): View
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date_format:Y-m-d H:i',
            'is_published' => 'boolean',
        ], [
            'title.required' => 'Post title is required.',
            'title.unique' => 'A post with this title already exists.',
            'content.required' => 'Post content is required.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['title']);

            // Handle featured image upload
            if (request()->hasFile('featured_image')) {
                $image = request()->file('featured_image');
                $imagePath = $image->store('posts', 'public');
                $validated['featured_image'] = $imagePath;
            }

            Post::create($validated);

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the post.');
        }
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post): View
    {
        return view('admin.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Post $post): RedirectResponse
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date_format:Y-m-d H:i',
            'is_published' => 'boolean',
        ], [
            'title.required' => 'Post title is required.',
            'title.unique' => 'A post with this title already exists.',
            'content.required' => 'Post content is required.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['title']);

            // Handle featured image upload
            if (request()->hasFile('featured_image')) {
                $image = request()->file('featured_image');
                $imagePath = $image->store('posts', 'public');
                $validated['featured_image'] = $imagePath;
            }

            $post->update($validated);

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the post.');
        }
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        try {
            $post->delete();

            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the post.');
        }
    }
}
