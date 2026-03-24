<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Post;
use App\Models\About;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\Certification;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the home page with banners, featured products, services, and latest posts.
     */
    public function home(): View
    {
        try {
            $banners = Banner::orderBy('created_at', 'desc')->get();
            $about = About::first();
            $featuredServices = Service::limit(6)->get();
            $featuredProducts = Product::where('is_featured', true)
                ->where('is_active', true)
                ->with('category')
                ->limit(6)
                ->get();

            $categories = ProductCategory::where('is_active', true)->get();
            $testimonials = Testimonial::where('is_featured', true)->limit(5)->get();
            $latestPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(6)
                ->get();
        } catch (\Exception $e) {
            $banners = collect();
            $about = null;
            $featuredServices = collect();
            $featuredProducts = collect();
            $categories = collect();
            $testimonials = collect();
            $latestPosts = collect();
        }

        return view('frontend.home', [
            'banners' => $banners ?? collect(),
            'about' => $about ?? null,
            'categories' => $categories ?? collect(),
            'featuredServices' => $featuredServices ?? collect(),
            'featuredProducts' => $featuredProducts ?? collect(),
            'testimonials' => $testimonials ?? collect(),
            'latestPosts' => $latestPosts ?? collect(),
            'recentPosts' => $latestPosts ?? collect(),
            'footerServices' => collect(),
        ]);
    }

    /**
     * Show the about page.
     */
    public function about(): View
    {
        try {
            $about = About::first();
            $services = Service::limit(6)->get();
            $testimonials = Testimonial::where('is_featured', true)->get();
            $certifications = Certification::limit(6)->get();
            $categories = ProductCategory::where('is_active', true)->get();
            $recentPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(5)
                ->get();
        } catch (\Exception $e) {
            $about = null;
            $services = collect();
            $testimonials = collect();
            $certifications = collect();
            $categories = collect();
            $recentPosts = collect();
        }

        return view('frontend.about', [
            'about' => $about ?? null,
            'categories' => $categories ?? collect(),
            'services' => $services ?? collect(),
            'testimonials' => $testimonials ?? collect(),
            'certifications' => $certifications ?? collect(),
            'recentPosts' => $recentPosts ?? collect(),
            'footerServices' => collect(),
        ]);
    }
}
