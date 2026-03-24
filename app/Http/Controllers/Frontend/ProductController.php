<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCatalog;
use App\Models\Setting;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Get settings data as associative array.
     */
    private function getSettings()
    {
        $settingsCollection = Setting::all();
        $settings = [];
        foreach ($settingsCollection as $setting) {
            $settings[$setting->key] = $setting->value;
        }
        return $settings;
    }

    /**
     * Display a paginated listing of active products.
     */
    public function index(): View
    {
        try {
            $products = Product::where('is_active', true)
                ->with('category')
                ->paginate(12);

            $categories = ProductCategory::where('is_active', true)
                ->get();

            // Get the latest product catalog
            $latestCatalog = ProductCatalog::latest('version')->first();

            $settings = $this->getSettings();
        } catch (\Exception $e) {
            $products = collect();
            $categories = collect();
            $settings = [];
            $latestCatalog = null;
        }

        return view('frontend.products.index', [
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'latestCatalog' => $latestCatalog ?? null,
            'settings' => $settings ?? [],
            'recentPosts' => collect(),
            'footerServices' => collect(),
        ]);
    }

    /**
     * Display products filtered by category slug.
     */
    public function category(string $slug): View
    {
        try {
            $category = ProductCategory::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();

            $products = $category->products()
                ->where('is_active', true)
                ->paginate(12);

            $categories = ProductCategory::where('is_active', true)
                ->get();

            // Get the latest product catalog
            $latestCatalog = ProductCatalog::latest('version')->first();

            $settings = $this->getSettings();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('frontend.products.category', [
            'category' => $category,
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'latestCatalog' => $latestCatalog ?? null,
            'settings' => $settings ?? [],
            'recentPosts' => collect(),
            'footerServices' => collect(),
        ]);
    }

    /**
     * Display a single product with its industries.
     */
    public function show(string $slug): View
    {
        try {
            $product = Product::where('slug', $slug)
                ->where('is_active', true)
                ->with(['category', 'industries'])
                ->firstOrFail();

            $relatedProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('is_active', true)
                ->limit(4)
                ->get();

            $categories = ProductCategory::where('is_active', true)->get();

            // Get the latest product catalog
            $latestCatalog = ProductCatalog::latest('version')->first();

            $settings = $this->getSettings();
        } catch (\Exception $e) {
            abort(404);
        }

        return view('frontend.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts ?? collect(),
            'categories' => $categories ?? collect(),
            'latestCatalog' => $latestCatalog ?? null,
            'settings' => $settings ?? [],
            'recentPosts' => collect(),
            'footerServices' => collect(),
        ]);
    }
}
