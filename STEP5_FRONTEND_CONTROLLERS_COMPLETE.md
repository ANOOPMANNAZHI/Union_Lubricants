# STEP 5 – Frontend Controllers: COMPLETE ✅

## Union Lubricants - Frontend Controllers

---

## 📊 SUMMARY

**Controllers Created**: 5 frontend controllers  
**Total Methods**: 11 methods  
**Validation**: Input validation on all enquiry methods  
**Error Handling**: firstOrFail() for not found, try-catch for submissions  
**Relationships**: Eloquent eager loading throughout  
**Status**: ✅ Ready for views

---

## 📁 CONTROLLERS LOCATION

```
c:\laragon\www\union_lubricants\app\Http\Controllers\Frontend\

PageController.php
ProductController.php
IndustryController.php
PostController.php
EnquiryController.php
```

---

## 📋 COMPLETE CONTROLLER CODE

### Controller 1: PageController

```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Post;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the home page with featured products, categories, and latest posts.
     */
    public function home(): View
    {
        $featuredProducts = Product::where('is_featured', true)
            ->where('is_active', true)
            ->with('category')
            ->limit(6)
            ->get();

        $categories = ProductCategory::where('is_active', true)
            ->with(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->get();

        $latestPosts = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.pages.home', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'latestPosts' => $latestPosts,
        ]);
    }

    /**
     * Show the about page.
     */
    public function about(): View
    {
        return view('frontend.pages.about');
    }
}
```

**Routes:**
- `GET /` → `PageController@home` (route name: `home`)
- `GET /about` → `PageController@about` (route name: `about`)

**Features:**
- Loads 6 featured active products with categories
- Loads all active categories with their products
- Loads 3 latest published posts ordered by publish date
- Returns data to `frontend.pages.home` and `frontend.pages.about` views

---

### Controller 2: ProductController

```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a paginated listing of active products.
     */
    public function index(): View
    {
        $products = Product::where('is_active', true)
            ->with('category')
            ->paginate(12);

        $categories = ProductCategory::where('is_active', true)
            ->get();

        return view('frontend.products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Display products filtered by category slug.
     */
    public function category(string $slug): View
    {
        $category = ProductCategory::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $products = $category->products()
            ->where('is_active', true)
            ->paginate(12);

        $categories = ProductCategory::where('is_active', true)
            ->get();

        return view('frontend.products.category', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Display a single product with its industries.
     */
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with(['category', 'industries'])
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('frontend.products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
```

**Routes:**
- `GET /products` → `ProductController@index` (route name: `products.index`)
- `GET /products/category/{slug}` → `ProductController@category` (route name: `products.by-category`)
- `GET /products/{slug}` → `ProductController@show` (route name: `products.show`)

**Features:**
- Lists all active products with pagination (12 per page)
- Filters products by category slug using `firstOrFail()`
- Shows single product with related products in same category
- Eager loads relationships (category, industries)
- Returns 4 related products from same category

---

### Controller 3: IndustryController

```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\View\View;

class IndustryController extends Controller
{
    /**
     * Display industry details with related products.
     */
    public function show(string $slug): View
    {
        $industry = Industry::where('slug', $slug)
            ->with(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->firstOrFail();

        $products = $industry->products()
            ->where('is_active', true)
            ->paginate(12);

        return view('frontend.industries.show', [
            'industry' => $industry,
            'products' => $products,
        ]);
    }
}
```

**Routes:**
- `GET /industries/{slug}` → `IndustryController@show` (route name: `industries.show`)

**Features:**
- Loads industry by slug using `firstOrFail()` (404 if not found)
- Eager loads only active products
- Returns paginated products (12 per page)
- Designed for many-to-many relationship through `industry_product` pivot

---

### Controller 4: PostController

```php
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
        $posts = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('frontend.news.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display a single published post.
     */
    public function show(string $slug): View
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.news.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
```

**Routes:**
- `GET /news` → `PostController@index` (route name: `news.index`)
- `GET /news/{slug}` → `PostController@show` (route name: `news.show`)

**Features:**
- Lists only published posts ordered by publish date (newest first)
- Pagination of 10 posts per page
- Shows single post by slug using `firstOrFail()`
- Returns 3 related posts (other published posts)
- Draft posts (is_published=false) are not shown

---

### Controller 5: EnquiryController

```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    /**
     * Show the contact form page.
     */
    public function contact(): View
    {
        return view('frontend.contact.form');
    }

    /**
     * Store a general enquiry/contact form submission.
     * Validates input and stores as enquiry with status 'new'.
     */
    public function submit(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter a valid email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please enter your message.',
            'message.max' => 'Your message cannot exceed 5000 characters.',
        ]);

        try {
            Enquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'product_id' => null,
                'status' => 'new',
            ]);

            return redirect()
                ->route('contact.show')
                ->with('success', 'Thank you! Your enquiry has been received. We will contact you soon.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your enquiry. Please try again.');
        }
    }

    /**
     * Submit a product-specific enquiry.
     * Validates input and stores enquiry linked to product.
     */
    public function productEnquiry(Product $product): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter a valid email address.',
            'email.email' => 'Please enter a valid email address.',
            'subject.required' => 'Please enter a subject.',
            'message.required' => 'Please enter your message.',
            'message.max' => 'Your message cannot exceed 5000 characters.',
        ]);

        try {
            Enquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'product_id' => $product->id,
                'status' => 'new',
            ]);

            return redirect()
                ->route('products.show', $product->slug)
                ->with('success', 'Thank you! Your product enquiry has been received. We will contact you soon.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your enquiry. Please try again.');
        }
    }
}
```

**Routes:**
- `GET /contact` → `EnquiryController@contact` (route name: `contact.show`)
- `POST /contact` → `EnquiryController@submit` (route name: `contact.store`)
- `POST /enquiry/product/{product}` → `EnquiryController@productEnquiry` (route name: `enquiry.store`)

**Features:**
- **contact()**: Loads contact form view
- **submit()**: Validates general enquiry form and stores with product_id=null
- **productEnquiry()**: Validates product-specific enquiry and stores with product_id
- All three methods validate:
  - name (required, string, max 255)
  - email (required, valid email with DNS check)
  - phone (optional, string, max 20)
  - subject (required, string, max 255)
  - message (required, string, max 5000)
- Custom validation messages for better UX
- Try-catch error handling on submissions
- Redirects with success/error messages
- Re-populates form on validation failure with `withInput()`
- Sets default status as 'new' for all enquiries

---

## 🔄 VALIDATION RULES

### Enquiry Validation Rules

| Field | Rules | Messages |
|---|---|---|
| name | required\|string\|max:255 | Please enter your name. |
| email | required\|email:rfc,dns\|max:255 | Please enter a valid email address. |
| phone | nullable\|string\|max:20 | (optional field) |
| subject | required\|string\|max:255 | Please enter a subject. |
| message | required\|string\|max:5000 | Message cannot exceed 5000 characters. |

**Validation Features:**
- RFC email validation with DNS lookup
- Custom error messages
- Phone number is optional
- Message limited to 5000 characters

---

## 📊 METHOD SUMMARY

| Controller | Method | Purpose | Returns |
|---|---|---|---|
| PageController | home() | Homepage with featured products | View |
| PageController | about() | About page | View |
| ProductController | index() | All products paginated | View |
| ProductController | category($slug) | Products by category | View |
| ProductController | show($slug) | Single product details | View |
| IndustryController | show($slug) | Industry + products | View |
| PostController | index() | Published posts paginated | View |
| PostController | show($slug) | Single post details | View |
| EnquiryController | contact() | Show contact form | View |
| EnquiryController | submit() | Store general enquiry | Redirect |
| EnquiryController | productEnquiry(Product) | Store product enquiry | Redirect |

---

## 🚀 ELOQUENT RELATIONSHIPS USED

```php
// HomeController
Product::where('is_featured', true)->with('category')
ProductCategory::with(['products' => fn($q) => $q->where('is_active', true)])
Post::where('is_published', true)->orderBy('published_at')

// ProductController
Product::with('category')
Product::with(['category', 'industries'])
ProductCategory::get()

// IndustryController
Industry::with(['products' => fn($q) => $q->where('is_active', true)])

// PostController
Post::where('is_published', true)->orderBy('published_at', 'desc')

// EnquiryController
Enquiry::create() // Creates new enquiry
Product::findOrFail() // Route model binding (implicit)
```

---

## ✅ ERROR HANDLING

**Not Found (404):**
```php
->firstOrFail()  // Throws ModelNotFoundException
```

**Validation Errors:**
```php
request()->validate([...])  // Throws ValidationException
// Automatically redirects back with errors & old input
```

**Database Errors:**
```php
try {
    Enquiry::create([...])
} catch (\Exception $e) {
    // Returns error message
}
```

---

## 🔗 VIEW FILES REFERENCED

Frontend views to be created:
```
resources/views/frontend/pages/home.blade.php
resources/views/frontend/pages/about.blade.php
resources/views/frontend/products/index.blade.php
resources/views/frontend/products/category.blade.php
resources/views/frontend/products/show.blade.php
resources/views/frontend/industries/show.blade.php
resources/views/frontend/news/index.blade.php
resources/views/frontend/news/show.blade.php
resources/views/frontend/contact/form.blade.php
```

---

## 📝 PAGINATION

Pagination applied to:
- Products index: 12 per page
- Products by category: 12 per page
- Industries products: 12 per page
- Posts (news) index: 10 per page

Use in views:
```blade
{{ $products->links() }}
{{ $posts->links() }}
```

---

## 🎯 DATA FLOW EXAMPLES

### Homepage Flow
```
GET / → PageController@home()
  ├── Get 6 featured active products
  ├── Get all active categories + their products
  ├── Get 3 latest published posts
  └── Return frontend.pages.home view
```

### Product Details Flow
```
GET /products/synthetic-motor-oil → ProductController@show('synthetic-motor-oil')
  ├── Get product by slug (or 404)
  ├── Load category + industries relationships
  ├── Get 4 related products from same category
  └── Return frontend.products.show view
```

### Product Enquiry Flow
```
POST /enquiry/product/1 → EnquiryController@productEnquiry($product)
  ├── Validate form input
  ├── Create enquiry with product_id=1 and status='new'
  ├── Store in database
  └── Redirect to product page with success message
```

---

**Status**: ✅ STEP 5 FRONTEND CONTROLLERS COMPLETE  
**Controllers Created**: 5 controllers  
**Methods Implemented**: 11 methods  
**Validation**: Full validation on all enquiry submissions  
**Error Handling**: 404s and form validation covered  
**Ready For**: View development and admin controllers

