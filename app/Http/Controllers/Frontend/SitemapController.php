<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;
use App\Models\Industry;
use App\Models\ProductCategory;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate the sitemap.xml for search engines
     */
    public function index(): Response
    {
        $posts = Post::where('is_active', true)
            ->select('slug', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        $products = Product::where('is_active', true)
            ->select('slug', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        $categories = ProductCategory::where('is_active', true)
            ->select('slug', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        $industries = Industry::where('is_active', true)
            ->select('slug', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('frontend.sitemap', [
            'posts' => $posts,
            'products' => $products,
            'categories' => $categories,
            'industries' => $industries,
        ])->header('Content-Type', 'text/xml');
    }
}
