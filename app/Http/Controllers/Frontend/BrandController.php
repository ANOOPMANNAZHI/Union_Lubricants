<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display all brands.
     */
    public function index(): View
    {
        try {
            $brands = Brand::all();
            $products = Product::where('is_active', true)->limit(6)->get();
            $categories = ProductCategory::where('is_active', true)->get();
            $recentPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(5)
                ->get();
            $footerServices = Brand::limit(5)->get();
        } catch (\Exception $e) {
            $brands = collect();
            $products = collect();
            $categories = collect();
            $recentPosts = collect();
            $footerServices = collect();
        }

        return view('frontend.brands.index', [
            'brands' => $brands ?? collect(),
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'recentPosts' => $recentPosts ?? collect(),
            'footerServices' => $footerServices ?? collect(),
        ]);
    }

    /**
     * Display a single brand.
     */
    public function show($id): View
    {
        try {
            $brand = Brand::findOrFail($id);
            $brands = Brand::all();
            $catalogs = $brand->catalogs()->get();
            $products = Product::where('is_active', true)->limit(6)->get();
            $categories = ProductCategory::where('is_active', true)->get();
            $recentPosts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->limit(5)
                ->get();
            $footerServices = Brand::limit(5)->get();

            // Fetch settings and convert to associative array
            $settingsCollection = Setting::all();
            $settings = [];
            foreach ($settingsCollection as $setting) {
                $settings[$setting->key] = $setting->value;
            }
        } catch (\Exception $e) {
            abort(404, 'Brand not found');
        }

        return view('frontend.brands.show', [
            'brand' => $brand ?? null,
            'brands' => $brands ?? collect(),
            'catalogs' => $catalogs ?? collect(),
            'products' => $products ?? collect(),
            'categories' => $categories ?? collect(),
            'recentPosts' => $recentPosts ?? collect(),
            'footerServices' => $footerServices ?? collect(),
        ]);
    }

    /**
     * Download brand catalog files directly.
     */
    public function download($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $catalogId = request()->get('catalog_id');

            if ($catalogId) {
                // Download specific catalog
                $catalog = $brand->catalogs()->findOrFail($catalogId);

                if ($catalog->file_path) {
                    // Check both storage and public paths
                    $storageFilePath = storage_path('app/' . $catalog->file_path);
                    $publicFilePath = public_path($catalog->file_path);

                    // If file_path starts with 'public/', adjust to point to storage/app/public/
                    if (strpos($catalog->file_path, 'public/') === 0) {
                        $storageFilePath = storage_path('app/' . $catalog->file_path);
                    }

                    if (file_exists($storageFilePath)) {
                        $filePath = $storageFilePath;
                    } elseif (file_exists($publicFilePath)) {
                        $filePath = $publicFilePath;
                    } else {
                        return back()->with('error', 'Catalog file not found at ' . $catalog->file_path);
                    }

                    $fileExtension = pathinfo($catalog->file_name, PATHINFO_EXTENSION);
                    $fileName = str_replace(' ', '_', $brand->name) . '_productList.' . $fileExtension;
                    return response()->download($filePath, $fileName);
                }

                return back()->with('error', 'No file path specified for this catalog.');
            } else {
                // Download first available catalog
                $catalogs = $brand->catalogs()->get();

                if ($catalogs->count() === 0) {
                    return back()->with('error', 'No catalogs available for this brand.');
                }

                // Download first catalog file that exists
                foreach ($catalogs as $catalog) {
                    if ($catalog->file_path) {
                        // Check both storage and public paths
                        $storageFilePath = storage_path('app/' . $catalog->file_path);
                        $publicFilePath = public_path($catalog->file_path);

                        // If file_path starts with 'public/', adjust to point to storage/app/public/
                        if (strpos($catalog->file_path, 'public/') === 0) {
                            $storageFilePath = storage_path('app/' . $catalog->file_path);
                        }

                        if (file_exists($storageFilePath)) {
                            $filePath = $storageFilePath;
                        } elseif (file_exists($publicFilePath)) {
                            $filePath = $publicFilePath;
                        } else {
                            continue; // Try next catalog
                        }

                        $fileExtension = pathinfo($catalog->file_name, PATHINFO_EXTENSION);
                        $fileName = str_replace(' ', '_', $brand->name) . '_productList.' . $fileExtension;
                        return response()->download($filePath, $fileName);
                    }
                }

                return back()->with('error', 'No downloadable files available for this brand.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
