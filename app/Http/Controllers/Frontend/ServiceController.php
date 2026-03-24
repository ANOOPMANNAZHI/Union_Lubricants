<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display all services.
     */
    public function index(): View
    {
        try {
            $services = Service::all();
            $products = Product::where('is_active', true)->limit(6)->get();
            $categories = ProductCategory::where('is_active', true)->get();
            $recentPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(5)
                ->get();
            $footerServices = Service::limit(5)->get();
        } catch (\Exception $e) {
            $services = collect();
            $products = collect();
            $categories = collect();
            $recentPosts = collect();
            $footerServices = collect();
        }

        return view('frontend.services', [
            'services' => $services ?? collect(),
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'recentPosts' => $recentPosts ?? collect(),
            'footerServices' => $footerServices ?? collect(),
        ]);
    }

    /**
     * Display a single service.
     */
    public function show($id): View
    {
        try {
            $service = Service::findOrFail($id);
            $services = Service::all();
            $products = Product::where('is_active', true)->limit(6)->get();
            $categories = ProductCategory::where('is_active', true)->get();
            $recentPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(5)
                ->get();
            $footerServices = Service::limit(5)->get();

            // Fetch settings and convert to associative array
            $settingsCollection = Setting::all();
            $settings = [];
            foreach ($settingsCollection as $setting) {
                $settings[$setting->key] = $setting->value;
            }
        } catch (\Exception $e) {
            abort(404, 'Service not found');
        }

        return view('frontend.service-detail', [
            'service' => $service,
            'services' => $services ?? collect(),
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'recentPosts' => $recentPosts ?? collect(),
            'footerServices' => $footerServices ?? collect(),
            'settings' => $settings ?? [],
        ]);
    }
}
