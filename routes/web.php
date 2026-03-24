<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\IndustryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\EnquiryController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\IndustryController as AdminIndustryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\BrandController as FrontendBrandController;
use Illuminate\Support\Facades\Route;

// ============================================================================
// PUBLIC ROUTES
// ============================================================================

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Services Routes
Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [FrontendServiceController::class, 'show'])->name('services.show');

// Brands Routes
Route::get('/brands', [FrontendBrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{id}', [FrontendBrandController::class, 'show'])->name('brands.show');
Route::get('/brands/{id}/download', [FrontendBrandController::class, 'download'])->name('brands.download');

// Products Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{slug}', [ProductController::class, 'category'])->name('products.by-category');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Industries Routes
Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

// News/Blog Routes
Route::get('/news', [PostController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('news.show');

// Contact Form Routes
Route::get('/contact', [EnquiryController::class, 'contact'])->name('contact.show');
Route::post('/contact', [EnquiryController::class, 'submit'])->name('contact.store');

// Product Enquiry Routes
Route::post('/enquiry/product/{product}', [EnquiryController::class, 'productEnquiry'])->name('enquiry.store');

// Product Catalog Download Route (Public)
Route::get('/catalog/{catalog}/download', [CatalogController::class, 'downloadPublic'])->name('catalog.download-public');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');

// ============================================================================
// AUTHENTICATION ROUTES (from Breeze)
// ============================================================================

require __DIR__.'/auth.php';

// ============================================================================
// FRONTEND PROFILE ROUTES (authenticated users only)
// ============================================================================

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================================================================
// ADMIN ROUTES (authenticated users only)
// ============================================================================

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Product Categories Resource Routes
    Route::resource('categories', ProductCategoryController::class);

    // Products Resource Routes
    Route::resource('products', AdminProductController::class);

    // Industries Resource Routes
    Route::resource('industries', AdminIndustryController::class);

    // Posts Resource Routes
    Route::resource('posts', AdminPostController::class);

    // About Us Routes
    Route::resource('about', AboutController::class, ['only' => ['index', 'edit', 'update']]);

    // Certifications Resource Routes
    Route::resource('certifications', CertificationController::class);

    // Testimonials Resource Routes
    Route::resource('testimonials', TestimonialController::class);

    // Services Resource Routes
    Route::resource('services', ServiceController::class);

    // Banners Resource Routes
    Route::resource('banners', BannerController::class);

    // Product Catalogs Resource Routes
    Route::resource('catalogs', CatalogController::class);
    Route::get('/catalogs/{catalog}/download', [CatalogController::class, 'download'])->name('catalogs.download');

    // Brands Resource Routes
    Route::resource('brands', BrandController::class);

    // Enquiries Routes (with status update)
    Route::resource('enquiries', AdminEnquiryController::class, ['only' => ['index', 'show', 'destroy']]);
    Route::patch('/enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.update-status');

    // Settings Routes
    Route::resource('settings', SettingController::class, ['only' => ['index', 'store', 'update']]);
    Route::post('/settings/test-email', [SettingController::class, 'testEmail'])->name('settings.test-email');

    // User Profile Routes
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});
