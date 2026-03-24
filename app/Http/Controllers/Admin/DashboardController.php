<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Enquiry;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard with statistics.
     */
    public function index(): View
    {
        // Get statistics
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $featuredProducts = Product::where('is_featured', true)->count();

        $totalCategories = ProductCategory::count();
        $activeCategories = ProductCategory::where('is_active', true)->count();

        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();

        // Enquiry counts by status
        $enquiryStats = [
            'new' => Enquiry::where('status', 'new')->count(),
            'in_progress' => Enquiry::where('status', 'in_progress')->count(),
            'closed' => Enquiry::where('status', 'closed')->count(),
        ];
        $totalEnquiries = array_sum($enquiryStats);

        // Recent enquiries
        $recentEnquiries = Enquiry::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'activeProducts' => $activeProducts,
            'featuredProducts' => $featuredProducts,
            'totalCategories' => $totalCategories,
            'activeCategories' => $activeCategories,
            'totalPosts' => $totalPosts,
            'publishedPosts' => $publishedPosts,
            'totalEnquiries' => $totalEnquiries,
            'enquiryStats' => $enquiryStats,
            'recentEnquiries' => $recentEnquiries,
        ]);
    }
}
