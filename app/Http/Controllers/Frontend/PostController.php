<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a paginated listing of published posts.
     */
    public function index(): View
    {
        try {
            $posts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->paginate(10);
        } catch (\Exception $e) {
            $posts = collect();
        }

        return view('frontend.news.index', [
            'posts' => $posts ?? collect(),
            'categories' => collect(),
            'recentPosts' => collect(),
            'footerServices' => collect(),
        ]);
    }

    /**
     * Display a single published post.
     */
    public function show(string $slug): View
    {
        try {
            $post = Post::where('slug', $slug)
                ->where('is_published', true)
                ->firstOrFail();

            // Get previous post (older, so less recent)
            $previousPost = Post::where('is_published', true)
                ->where('published_at', '<', $post->published_at)
                ->orderBy('published_at', 'desc')
                ->first();

            // Get next post (newer, so more recent)
            $nextPost = Post::where('is_published', true)
                ->where('published_at', '>', $post->published_at)
                ->orderBy('published_at', 'asc')
                ->first();

            $relatedPosts = Post::where('is_published', true)
                ->where('id', '!=', $post->id)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('frontend.news.show', [
            'post' => $post,
            'previousPost' => $previousPost ?? null,
            'nextPost' => $nextPost ?? null,
            'relatedPosts' => $relatedPosts ?? collect(),
            'categories' => collect(),
            'recentPosts' => collect(),
            'footerServices' => collect(),
        ]);
    }
}
