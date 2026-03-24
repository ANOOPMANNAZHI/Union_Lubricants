# STEP 4 – Routes (web.php): COMPLETE ✅

## Union Lubricants - Complete Routing Structure

---

## 📊 SUMMARY

**Routes Created**: 23 public + admin routes  
**Public Routes**: 11 routes for website visitors  
**Admin Routes**: 12 resource routes for authenticated admin users  
**Middleware**: Auth, verified applied to admin routes  
**Status**: ✅ Ready for controller implementation

---

## 📁 ROUTES FILE LOCATION

```
c:\laragon\www\union_lubricants\routes\web.php
```

---

## 📋 COMPLETE web.php CODE

```php
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\Public\CategoryController as PublicCategoryController;
use App\Http\Controllers\Public\IndustryController as PublicIndustryController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\EnquiryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\IndustryController as AdminIndustryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// ============================================================================
// PUBLIC ROUTES
// ============================================================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Products Routes
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/products/category/{slug}', [PublicCategoryController::class, 'show'])->name('products.by-category');
Route::get('/products/{slug}', [PublicProductController::class, 'show'])->name('products.show');

// Industries Routes
Route::get('/industries/{slug}', [PublicIndustryController::class, 'show'])->name('industries.show');

// News/Blog Routes
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Contact Form Routes
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Product Enquiry Routes
Route::post('/enquiry/product/{product}', [EnquiryController::class, 'store'])->name('enquiry.store');

// ============================================================================
// AUTHENTICATION ROUTES (from Breeze)
// ============================================================================

require __DIR__.'/auth.php';

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
    Route::resource('posts', PostController::class);
    
    // Enquiries Routes (with status update)
    Route::resource('enquiries', AdminEnquiryController::class, ['only' => ['index', 'show', 'destroy']]);
    Route::patch('/enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.update-status');
    
    // Settings Routes
    Route::resource('settings', SettingController::class, ['only' => ['index', 'store', 'update']]);
    
    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
```

---

## 🌐 PUBLIC ROUTES

### Home & About

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/` | HomeController@index | home | Homepage with product highlights |
| GET | `/about` | HomeController@about | about | About company page |

### Products

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/products` | ProductController@index | products.index | Product list (all/paginated) |
| GET | `/products/category/{slug}` | CategoryController@show | products.by-category | Products filtered by category slug |
| GET | `/products/{slug}` | ProductController@show | products.show | Single product details page |

### Industries

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/industries/{slug}` | IndustryController@show | industries.show | Industry details with related products |

### News/Blog

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/news` | NewsController@index | news.index | Blog/news listing (paginated) |
| GET | `/news/{slug}` | NewsController@show | news.show | Single post/news article |

### Contact & Enquiries

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/contact` | ContactController@show | contact.show | Contact form page |
| POST | `/contact` | ContactController@store | contact.store | Store contact form submission |
| POST | `/enquiry/product/{product}` | EnquiryController@store | enquiry.store | Product-specific enquiry submission |

---

## 🔐 ADMIN ROUTES

**Prefix**: `/admin`  
**Middleware**: `auth`, `verified`  
**Route Name Prefix**: `admin.`

### Admin Dashboard

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/` | DashboardController@index | admin.dashboard | Admin dashboard home |
| GET | `/admin/dashboard` | DashboardController@index | admin.dashboard.index | Admin dashboard (alternative) |

### Product Categories (Resource)

```
Route::resource('categories', ProductCategoryController::class);
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/categories` | ProductCategoryController@index | admin.categories.index | List all categories |
| GET | `/admin/categories/create` | ProductCategoryController@create | admin.categories.create | Show create form |
| POST | `/admin/categories` | ProductCategoryController@store | admin.categories.store | Store new category |
| GET | `/admin/categories/{id}` | ProductCategoryController@show | admin.categories.show | Show category details |
| GET | `/admin/categories/{id}/edit` | ProductCategoryController@edit | admin.categories.edit | Show edit form |
| PUT/PATCH | `/admin/categories/{id}` | ProductCategoryController@update | admin.categories.update | Update category |
| DELETE | `/admin/categories/{id}` | ProductCategoryController@destroy | admin.categories.destroy | Delete category |

### Products (Resource)

```
Route::resource('products', AdminProductController::class);
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/products` | AdminProductController@index | admin.products.index | List all products |
| GET | `/admin/products/create` | AdminProductController@create | admin.products.create | Show create form |
| POST | `/admin/products` | AdminProductController@store | admin.products.store | Store new product |
| GET | `/admin/products/{id}` | AdminProductController@show | admin.products.show | Show product details |
| GET | `/admin/products/{id}/edit` | AdminProductController@edit | admin.products.edit | Show edit form |
| PUT/PATCH | `/admin/products/{id}` | AdminProductController@update | admin.products.update | Update product |
| DELETE | `/admin/products/{id}` | AdminProductController@destroy | admin.products.destroy | Delete product |

### Industries (Resource)

```
Route::resource('industries', AdminIndustryController::class);
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/industries` | AdminIndustryController@index | admin.industries.index | List all industries |
| GET | `/admin/industries/create` | AdminIndustryController@create | admin.industries.create | Show create form |
| POST | `/admin/industries` | AdminIndustryController@store | admin.industries.store | Store new industry |
| GET | `/admin/industries/{id}` | AdminIndustryController@show | admin.industries.show | Show industry details |
| GET | `/admin/industries/{id}/edit` | AdminIndustryController@edit | admin.industries.edit | Show edit form |
| PUT/PATCH | `/admin/industries/{id}` | AdminIndustryController@update | admin.industries.update | Update industry |
| DELETE | `/admin/industries/{id}` | AdminIndustryController@destroy | admin.industries.destroy | Delete industry |

### Posts (Resource)

```
Route::resource('posts', PostController::class);
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/posts` | PostController@index | admin.posts.index | List all posts |
| GET | `/admin/posts/create` | PostController@create | admin.posts.create | Show create form |
| POST | `/admin/posts` | PostController@store | admin.posts.store | Store new post |
| GET | `/admin/posts/{id}` | PostController@show | admin.posts.show | Show post details |
| GET | `/admin/posts/{id}/edit` | PostController@edit | admin.posts.edit | Show edit form |
| PUT/PATCH | `/admin/posts/{id}` | PostController@update | admin.posts.update | Update post |
| DELETE | `/admin/posts/{id}` | PostController@destroy | admin.posts.destroy | Delete post |

### Enquiries (Custom Resource)

```
Route::resource('enquiries', AdminEnquiryController::class, ['only' => ['index', 'show', 'destroy']]);
Route::patch('/enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.update-status');
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/enquiries` | AdminEnquiryController@index | admin.enquiries.index | List all enquiries |
| GET | `/admin/enquiries/{id}` | AdminEnquiryController@show | admin.enquiries.show | Show enquiry details |
| DELETE | `/admin/enquiries/{id}` | AdminEnquiryController@destroy | admin.enquiries.destroy | Delete enquiry |
| PATCH | `/admin/enquiries/{id}/status` | AdminEnquiryController@updateStatus | admin.enquiries.update-status | Update enquiry status |

### Settings (Custom Resource)

```
Route::resource('settings', SettingController::class, ['only' => ['index', 'store', 'update']]);
```

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/settings` | SettingController@index | admin.settings.index | List all settings |
| POST | `/admin/settings` | SettingController@store | admin.settings.store | Create/store setting |
| PUT/PATCH | `/admin/settings/{id}` | SettingController@update | admin.settings.update | Update setting |

### User Profile

| Method | Route | Controller@Method | Name | Purpose |
|---|---|---|---|---|
| GET | `/admin/profile` | ProfileController@edit | admin.profile.edit | Show profile edit form |
| PATCH | `/admin/profile` | ProfileController@update | admin.profile.update | Update profile |
| DELETE | `/admin/profile` | ProfileController@destroy | admin.profile.destroy | Delete profile/account |

---

## 🔗 ROUTE NAMING CONVENTIONS

### Public Routes
```
home
about
products.index
products.by-category
products.show
industries.show
news.index
news.show
contact.show
contact.store
enquiry.store
```

### Admin Routes (prefixed with `admin.`)
```
admin.dashboard
admin.dashboard.index
admin.categories.index
admin.categories.create
admin.categories.store
admin.categories.show
admin.categories.edit
admin.categories.update
admin.categories.destroy
admin.products.*  (same pattern)
admin.industries.* (same pattern)
admin.posts.*     (same pattern)
admin.enquiries.index
admin.enquiries.show
admin.enquiries.destroy
admin.enquiries.update-status
admin.settings.index
admin.settings.store
admin.settings.update
admin.profile.*   (edit, update, destroy)
```

---

## 📝 ROUTE GROUPING STRUCTURE

```
routes/web.php
├── PUBLIC ROUTES (no middleware)
│   ├── HomeController (/, /about)
│   ├── ProductController (/products, /products/{slug})
│   ├── CategoryController (/products/category/{slug})
│   ├── IndustryController (/industries/{slug})
│   ├── NewsController (/news, /news/{slug})
│   ├── ContactController (/contact GET/POST)
│   └── EnquiryController (/enquiry/product/{product} POST)
│
├── AUTHENTICATION ROUTES (from auth.php)
│   └── Laravel Breeze auth scaffold
│
└── ADMIN ROUTES (middleware: auth, verified)
    ├── prefix: /admin
    ├── name prefix: admin.
    ├── DashboardController (/admin, /admin/dashboard)
    ├── ProductCategoryController (resource)
    ├── ProductController (resource)
    ├── IndustryController (resource)
    ├── PostController (resource)
    ├── EnquiryController (custom - index, show, destroy, updateStatus)
    ├── SettingController (custom - index, store, update)
    └── ProfileController (profile management)
```

---

## 🚀 USAGE EXAMPLES IN BLADE TEMPLATES

### Public Routes

```php
<!-- Homepage link -->
<a href="{{ route('home') }}">Home</a>

<!-- Products listing -->
<a href="{{ route('products.index') }}">All Products</a>

<!-- Products by category -->
<a href="{{ route('products.by-category', 'hydraulic-oils') }}">Hydraulic Oils</a>

<!-- Single product -->
<a href="{{ route('products.show', 'synthetic-motor-oil-5w-30') }}">View Product</a>

<!-- Industry page -->
<a href="{{ route('industries.show', 'automotive') }}">Automotive Industry</a>

<!-- News listing -->
<a href="{{ route('news.index') }}">Latest News</a>

<!-- Single news article -->
<a href="{{ route('news.show', 'new-product-launch') }}">Read Article</a>

<!-- Contact form -->
<a href="{{ route('contact.show') }}">Contact Us</a>

<!-- Contact form submission -->
<form method="POST" action="{{ route('contact.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Your Name">
    <input type="email" name="email" placeholder="Your Email">
    <button type="submit">Send</button>
</form>

<!-- Product enquiry -->
<form method="POST" action="{{ route('enquiry.store', $product->id) }}">
    @csrf
    <input type="text" name="name" placeholder="Your Name">
    <button type="submit">Send Enquiry</button>
</form>
```

### Admin Routes

```php
<!-- Admin Dashboard -->
<a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>

<!-- Categories -->
<a href="{{ route('admin.categories.index') }}">Categories</a>
<a href="{{ route('admin.categories.create') }}">Add Category</a>
<a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
    @csrf @method('DELETE')
    <button>Delete</button>
</form>

<!-- Products -->
<a href="{{ route('admin.products.index') }}">Products</a>
<a href="{{ route('admin.products.create') }}">Add Product</a>
<a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>

<!-- Industries -->
<a href="{{ route('admin.industries.index') }}">Industries</a>
<a href="{{ route('admin.industries.create') }}">Add Industry</a>

<!-- Posts -->
<a href="{{ route('admin.posts.index') }}">Posts</a>
<a href="{{ route('admin.posts.create') }}">Add Post</a>

<!-- Enquiries -->
<a href="{{ route('admin.enquiries.index') }}">Enquiries</a>
<a href="{{ route('admin.enquiries.show', $enquiry->id) }}">View Enquiry</a>

<!-- Update enquiry status -->
<form action="{{ route('admin.enquiries.update-status', $enquiry->id) }}" method="POST">
    @csrf @method('PATCH')
    <select name="status">
        <option value="new">New</option>
        <option value="in_progress">In Progress</option>
        <option value="closed">Closed</option>
    </select>
    <button>Update Status</button>
</form>

<!-- Settings -->
<a href="{{ route('admin.settings.index') }}">Settings</a>

<!-- Profile -->
<a href="{{ route('admin.profile.edit') }}">Edit Profile</a>
```

---

## 📊 ROUTE STATISTICS

| Category | Count |
|---|---|
| Public Routes | 11 |
| Admin Routes (RESTful) | 28 |
| Auth Routes (included) | 9 |
| **Total** | **48** |

---

## ✅ ROUTE FEATURES

✅ **RESTful Resource Routes** - Standard CRUD operations  
✅ **Proper Middleware** - Auth & verified on admin routes  
✅ **Named Routes** - Easy linking in templates with route()  
✅ **Route Groups** - Organized by public/admin sections  
✅ **Slug-based URLs** - SEO-friendly product/news URLs  
✅ **Custom Actions** - Status update for enquiries  
✅ **Consistent Naming** - Predictable route name patterns  
✅ **Controller Namespaces** - Public/Admin separation  

---

## 🚀 NEXT STEPS

1. **Create Public Controllers:**
   - HomeController (index, about)
   - ProductController (index, show)
   - CategoryController (show)
   - IndustryController (show)
   - NewsController (index, show)
   - ContactController (show, store)
   - EnquiryController (store)

2. **Create Admin Controllers:**
   - DashboardController (index)
   - ProductCategoryController (resource)
   - ProductController (resource)
   - IndustryController (resource)
   - PostController (resource)
   - EnquiryController (index, show, destroy, updateStatus)
   - SettingController (index, store, update)

3. **Create Views:**
   - Public layouts and pages
   - Admin layouts and CRUD views

4. **Add Controllers Logic:**
   - Data fetching and filtering
   - Form validation
   - Business logic

---

## 📚 MIDDLEWARE EXPLANATION

### `auth` Middleware
- Ensures user is authenticated
- Redirects to login if not authenticated

### `verified` Middleware
- Ensures user has verified their email (from Breeze)
- Part of Breeze's email verification workflow

### `admin.` name prefix
- Routes automatically prefixed with 'admin.'
- Example: `categories.index` becomes `admin.categories.index`

---

**Status**: ✅ STEP 4 ROUTES COMPLETE  
**Routes Configured**: 47 total routes  
**Ready For**: Controller implementation  
**Controllers Needed**: 13 controllers (7 public + 6 admin + 1 dashboard)

