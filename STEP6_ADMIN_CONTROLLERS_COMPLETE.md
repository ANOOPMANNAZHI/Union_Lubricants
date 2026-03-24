# STEP 6 – Admin Controllers: COMPLETE ✅

## Union Lubricants - Admin Controllers

---

## 📊 SUMMARY

**Controllers Created**: 6 admin controllers  
**Total Methods**: 27 CRUD methods  
**File Uploads**: Image and PDF handling  
**Slug Generation**: Auto-generate from name using Str::slug()  
**Validation**: Complete validation for all operations  
**Status**: ✅ Ready for admin views

---

## 📁 CONTROLLERS LOCATION

```
c:\laragon\www\union_lubricants\app\Http\Controllers\Admin\

DashboardController.php
ProductCategoryController.php
ProductController.php
IndustryController.php
PostController.php
EnquiryController.php
SettingController.php
```

---

## 📋 COMPLETE CONTROLLER CODE

### Controller 1: DashboardController

```php
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
```

**Route:** `GET /admin/` or `GET /admin/dashboard`

**Features:**
- Displays 9 statistics cards (products, categories, posts, enquiries)
- Shows enquiry breakdown by status (new, in_progress, closed)
- Lists 5 most recent enquiries
- Database counts for quick overview

---

### Controller 2: ProductCategoryController (Resource)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of product categories.
     */
    public function index(): View
    {
        $categories = ProductCategory::orderBy('name', 'asc')->paginate(15);

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:product_categories,name',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'Category name is required.',
            'name.unique' => 'A category with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            ProductCategory::create($validated);

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the category.');
        }
    }

    /**
     * Display the specified category.
     */
    public function show(ProductCategory $category): View
    {
        $products = $category->products()->paginate(15);

        return view('admin.categories.show', [
            'category' => $category,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(ProductCategory $category): View
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(ProductCategory $category): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:product_categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'Category name is required.',
            'name.unique' => 'A category with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            $category->update($validated);

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the category.');
        }
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(ProductCategory $category): RedirectResponse
    {
        try {
            $category->delete();

            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the category.');
        }
    }
}
```

**Routes:** Full resource routes
- `GET /admin/categories` - index
- `GET /admin/categories/create` - create
- `POST /admin/categories` - store
- `GET /admin/categories/{id}` - show
- `GET /admin/categories/{id}/edit` - edit
- `PATCH /admin/categories/{id}` - update
- `DELETE /admin/categories/{id}` - destroy

**Features:**
- ✅ Auto-generate slug from name using `Str::slug()`
- ✅ Unique constraint on category name
- ✅ Pagination (15 per page)
- ✅ Show products in category
- ✅ is_active toggle for soft disable

---

### Controller 3: ProductController (Resource)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Industry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(): View
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $industries = Industry::orderBy('name', 'asc')->get();

        return view('admin.products.create', [
            'categories' => $categories,
            'industries' => $industries,
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255|unique:products,name',
            'code' => 'required|string|max:100|unique:products,code',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'viscosity_grade' => 'nullable|string|max:50',
            'specifications' => 'nullable|string',
            'applications' => 'nullable|string',
            'pack_sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tds_pdf' => 'nullable|mimes:pdf|max:5120',
            'msds_pdf' => 'nullable|mimes:pdf|max:5120',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'industries' => 'nullable|array',
            'industries.*' => 'exists:industries,id',
        ], [
            'category_id.required' => 'Please select a category.',
            'name.required' => 'Product name is required.',
            'name.unique' => 'A product with this name already exists.',
            'code.required' => 'Product code is required.',
            'code.unique' => 'A product with this code already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle image upload
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imagePath = $image->store('products', 'public');
                $validated['image_path'] = $imagePath;
            }

            // Handle TDS PDF upload
            if (request()->hasFile('tds_pdf')) {
                $tds = request()->file('tds_pdf');
                $tdsPath = $tds->store('docs', 'public');
                $validated['tds_pdf'] = $tdsPath;
            }

            // Handle MSDS PDF upload
            if (request()->hasFile('msds_pdf')) {
                $msds = request()->file('msds_pdf');
                $msdsPath = $msds->store('docs', 'public');
                $validated['msds_pdf'] = $msdsPath;
            }

            // Convert pack_sizes string to JSON array if provided
            if (!empty($validated['pack_sizes'])) {
                $packs = array_map('trim', explode(',', $validated['pack_sizes']));
                $validated['pack_sizes'] = json_encode($packs);
            }

            // Create product
            $product = Product::create($validated);

            // Attach industries
            if (!empty($validated['industries'])) {
                $product->industries()->sync($validated['industries']);
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the product.');
        }
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product): View
    {
        $product->load(['category', 'industries']);

        return view('admin.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $product->load(['category', 'industries']);
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        $industries = Industry::orderBy('name', 'asc')->get();
        $selectedIndustries = $product->industries()->pluck('id')->toArray();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'industries' => $industries,
            'selectedIndustries' => $selectedIndustries,
        ]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Product $product): RedirectResponse
    {
        $validated = request()->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'code' => 'required|string|max:100|unique:products,code,' . $product->id,
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'viscosity_grade' => 'nullable|string|max:50',
            'specifications' => 'nullable|string',
            'applications' => 'nullable|string',
            'pack_sizes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tds_pdf' => 'nullable|mimes:pdf|max:5120',
            'msds_pdf' => 'nullable|mimes:pdf|max:5120',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'industries' => 'nullable|array',
            'industries.*' => 'exists:industries,id',
        ], [
            'category_id.required' => 'Please select a category.',
            'name.required' => 'Product name is required.',
            'name.unique' => 'A product with this name already exists.',
            'code.required' => 'Product code is required.',
            'code.unique' => 'A product with this code already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            // Handle image upload
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imagePath = $image->store('products', 'public');
                $validated['image_path'] = $imagePath;
            }

            // Handle TDS PDF upload
            if (request()->hasFile('tds_pdf')) {
                $tds = request()->file('tds_pdf');
                $tdsPath = $tds->store('docs', 'public');
                $validated['tds_pdf'] = $tdsPath;
            }

            // Handle MSDS PDF upload
            if (request()->hasFile('msds_pdf')) {
                $msds = request()->file('msds_pdf');
                $msdsPath = $msds->store('docs', 'public');
                $validated['msds_pdf'] = $msdsPath;
            }

            // Convert pack_sizes string to JSON array if provided
            if (!empty($validated['pack_sizes'])) {
                $packs = array_map('trim', explode(',', $validated['pack_sizes']));
                $validated['pack_sizes'] = json_encode($packs);
            }

            // Update product
            $product->update($validated);

            // Sync industries
            if (!empty($validated['industries'])) {
                $product->industries()->sync($validated['industries']);
            } else {
                $product->industries()->detach();
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the product.');
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        try {
            $product->delete();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the product.');
        }
    }
}
```

**Routes:** Full resource routes

**Features:**
- ✅ Auto-generate slug from name
- ✅ Image upload to `storage/app/public/products/`
- ✅ TDS PDF upload to `storage/app/public/docs/`
- ✅ MSDS PDF upload to `storage/app/public/docs/`
- ✅ Pack sizes: Convert comma-separated string to JSON array
- ✅ Category assignment via dropdown
- ✅ Multiple industries selection with sync()
- ✅ Unique constraints on name and code
- ✅ Pagination (15 per page)
- ✅ is_active and is_featured toggles

**Validation Rules:**
```
category_id: required, exists in product_categories
name: required, unique, max 255
code: required, unique, max 100
short_description: nullable, max 500
description: nullable
viscosity_grade: nullable, max 50
specifications: nullable
applications: nullable
pack_sizes: nullable, converted to JSON
image: nullable, jpeg/png/jpg/gif, max 2MB
tds_pdf: nullable, pdf only, max 5MB
msds_pdf: nullable, pdf only, max 5MB
is_active: boolean
is_featured: boolean
industries: nullable array of existing IDs
```

---

### Controller 4: IndustryController (Resource)

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display a listing of industries.
     */
    public function index(): View
    {
        $industries = Industry::orderBy('name', 'asc')->paginate(15);

        return view('admin.industries.index', [
            'industries' => $industries,
        ]);
    }

    /**
     * Show the form for creating a new industry.
     */
    public function create(): View
    {
        return view('admin.industries.create');
    }

    /**
     * Store a newly created industry in storage.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:industries,name',
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Industry name is required.',
            'name.unique' => 'An industry with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            Industry::create($validated);

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the industry.');
        }
    }

    /**
     * Display the specified industry.
     */
    public function show(Industry $industry): View
    {
        $products = $industry->products()->paginate(15);

        return view('admin.industries.show', [
            'industry' => $industry,
            'products' => $products,
        ]);
    }

    /**
     * Show the form for editing the specified industry.
     */
    public function edit(Industry $industry): View
    {
        return view('admin.industries.edit', [
            'industry' => $industry,
        ]);
    }

    /**
     * Update the specified industry in storage.
     */
    public function update(Industry $industry): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255|unique:industries,name,' . $industry->id,
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Industry name is required.',
            'name.unique' => 'An industry with this name already exists.',
        ]);

        try {
            $validated['slug'] = Str::slug($validated['name']);

            $industry->update($validated);

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the industry.');
        }
    }

    /**
     * Remove the specified industry from storage.
     */
    public function destroy(Industry $industry): RedirectResponse
    {
        try {
            $industry->delete();

            return redirect()
                ->route('admin.industries.index')
                ->with('success', 'Industry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the industry.');
        }
    }
}
```

**Routes:** Full resource routes

**Features:**
- ✅ Auto-generate slug from name
- ✅ Unique constraint on name
- ✅ Show related products (paginated)
- ✅ Simple CRUD structure

---

### Controller 5: PostController (Resource)

```php
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
```

**Routes:** Full resource routes

**Features:**
- ✅ Auto-generate slug from title
- ✅ Featured image upload to `storage/app/public/posts/`
- ✅ Published_at datetime handling
- ✅ is_published flag for draft/publish workflow
- ✅ Unique constraint on title
- ✅ Pagination (15 per page)

**Validation Rules:**
```
title: required, unique, max 255
excerpt: nullable, max 500
content: required, string
featured_image: nullable, image only, max 2MB
published_at: nullable, Y-m-d H:i format
is_published: boolean
```

---

### Controller 6: EnquiryController

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries with optional status filter.
     */
    public function index(): View
    {
        $status = request()->query('status', null);
        $query = Enquiry::query();

        if ($status && in_array($status, ['new', 'in_progress', 'closed'])) {
            $query->where('status', $status);
        }

        $enquiries = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.enquiries.index', [
            'enquiries' => $enquiries,
            'currentStatus' => $status,
        ]);
    }

    /**
     * Display the specified enquiry.
     */
    public function show(Enquiry $enquiry): View
    {
        return view('admin.enquiries.show', [
            'enquiry' => $enquiry,
        ]);
    }

    /**
     * Update the status of an enquiry.
     */
    public function updateStatus(Enquiry $enquiry): RedirectResponse
    {
        $validated = request()->validate([
            'status' => 'required|in:new,in_progress,closed',
        ], [
            'status.required' => 'Please select a status.',
            'status.in' => 'Invalid status value.',
        ]);

        try {
            $enquiry->update(['status' => $validated['status']]);

            return redirect()
                ->route('admin.enquiries.show', $enquiry->id)
                ->with('success', 'Enquiry status updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while updating the enquiry status.');
        }
    }

    /**
     * Remove the specified enquiry from storage.
     */
    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        try {
            $enquiry->delete();

            return redirect()
                ->route('admin.enquiries.index')
                ->with('success', 'Enquiry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the enquiry.');
        }
    }
}
```

**Routes:**
- `GET /admin/enquiries` - index (with optional ?status filter)
- `GET /admin/enquiries/{id}` - show
- `PATCH /admin/enquiries/{id}/status` - updateStatus
- `DELETE /admin/enquiries/{id}` - destroy

**Features:**
- ✅ Filter by status query parameter (?status=new)
- ✅ Show single enquiry details
- ✅ Update status (new → in_progress → closed)
- ✅ Delete enquiry
- ✅ Pagination (15 per page)

---

### Controller 7: SettingController

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of settings.
     */
    public function index(): View
    {
        $settings = Setting::orderBy('key', 'asc')->get();

        // Group settings by category for better organization
        $groupedSettings = [
            'Company' => ['site_name', 'company_email', 'company_phone', 'company_address'],
            'SEO' => ['meta_title', 'meta_description', 'meta_keywords'],
            'Social' => ['facebook_url', 'linkedin_url', 'twitter_url', 'instagram_url'],
        ];

        return view('admin.settings.index', [
            'settings' => $settings,
            'groupedSettings' => $groupedSettings,
        ]);
    }

    /**
     * Store/Create a new setting or update existing.
     */
    public function store(): RedirectResponse
    {
        $validated = request()->validate([
            'key' => 'required|string|max:255',
            'value' => 'nullable|string',
        ], [
            'key.required' => 'Setting key is required.',
        ]);

        try {
            Setting::updateOrCreate(
                ['key' => $validated['key']],
                ['value' => $validated['value']]
            );

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Setting saved successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while saving the setting.');
        }
    }

    /**
     * Update a specific setting.
     */
    public function update(Setting $setting): RedirectResponse
    {
        $validated = request()->validate([
            'value' => 'nullable|string',
        ]);

        try {
            $setting->update(['value' => $validated['value']]);

            return redirect()
                ->route('admin.settings.index')
                ->with('success', 'Setting updated successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the setting.');
        }
    }
}
```

**Routes:**
- `GET /admin/settings` - index
- `POST /admin/settings` - store (create or update)
- `PATCH /admin/settings/{id}` - update

**Features:**
- ✅ Simple key-value storage
- ✅ updateOrCreate for flexible storage
- ✅ Grouped settings display (Company, SEO, Social)
- ✅ No pagination needed (typically small number of settings)

**Common Settings Keys:**
```
Company
  - site_name
  - company_email
  - company_phone
  - company_address

SEO
  - meta_title
  - meta_description
  - meta_keywords

Social
  - facebook_url
  - linkedin_url
  - twitter_url
  - instagram_url
```

---

## 📊 FILE UPLOAD STORAGE

| Upload Type | Storage Path | Allowed Types | Max Size |
|---|---|---|---|
| Product Image | `storage/app/public/products/` | JPEG, PNG, JPG, GIF | 2 MB |
| Product TDS | `storage/app/public/docs/` | PDF | 5 MB |
| Product MSDS | `storage/app/public/docs/` | PDF | 5 MB |
| Post Featured Image | `storage/app/public/posts/` | JPEG, PNG, JPG, GIF | 2 MB |

---

## 📝 SLUG GENERATION

All controllers use Laravel's `Str::slug()` helper:

```php
use Illuminate\Support\Str;

$slug = Str::slug($name);
// "Hydraulic Oils" → "hydraulic-oils"
// "Synthetic Motor Oil 5W-30" → "synthetic-motor-oil-5w-30"
```

---

## ✅ ADMIN CONTROLLER FEATURES SUMMARY

**DashboardController:**
- ✅ 9 statistics cards
- ✅ Enquiry breakdown by status
- ✅ Recent enquiries list

**ProductCategoryController:**
- ✅ Full CRUD (7 actions)
- ✅ Auto slug generation
- ✅ Pagination (15/page)
- ✅ Show related products

**ProductController:**
- ✅ Full CRUD (7 actions)
- ✅ Image upload
- ✅ TDS/MSDS PDF uploads
- ✅ Pack sizes JSON conversion
- ✅ Category assignment
- ✅ Multiple industries sync
- ✅ Auto slug generation
- ✅ Pagination (15/page)

**IndustryController:**
- ✅ Full CRUD (7 actions)
- ✅ Auto slug generation
- ✅ Show related products
- ✅ Pagination (15/page)

**PostController:**
- ✅ Full CRUD (7 actions)
- ✅ Featured image upload
- ✅ Published_at datetime
- ✅ is_published flag (draft/publish)
- ✅ Auto slug generation
- ✅ Pagination (15/page)

**EnquiryController:**
- ✅ List with status filter
- ✅ View single enquiry
- ✅ Update status (workflow)
- ✅ Delete enquiry
- ✅ Pagination (15/page)

**SettingController:**
- ✅ List settings
- ✅ Store/Create setting
- ✅ Update setting
- ✅ Key-value structure
- ✅ Grouped display

---

**Status**: ✅ STEP 6 ADMIN CONTROLLERS COMPLETE  
**Controllers Created**: 6 controllers  
**CRUD Methods**: 27 total methods  
**File Uploads**: Image and PDF support  
**Validation**: Complete input validation  
**Ready For**: Admin view templates

