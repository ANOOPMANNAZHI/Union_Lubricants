# STEP 4 – Routes: Quick Reference

## Route Summary

### PUBLIC ROUTES (No Auth Required)

```
GET  /                          → home (Home page with highlights)
GET  /about                     → about (About company)
GET  /products                  → products.index (All products)
GET  /products/category/{slug}  → products.by-category (Filter by category)
GET  /products/{slug}           → products.show (Single product)
GET  /industries/{slug}         → industries.show (Industry + products)
GET  /news                      → news.index (News listing)
GET  /news/{slug}               → news.show (Single article)
GET  /contact                   → contact.show (Contact form)
POST /contact                   → contact.store (Submit contact)
POST /enquiry/product/{product} → enquiry.store (Product enquiry)
```

### AUTHENTICATION ROUTES (from auth.php)

```
GET  /register          → register
POST /register          → (store) - DISABLED for admin-only
GET  /login             → login
POST /login             → (store)
POST /logout            → logout
... (password reset, email verification, etc.)
```

### ADMIN ROUTES (Auth Required - /admin prefix)

```
GET  /admin                      → admin.dashboard
GET  /admin/dashboard            → admin.dashboard.index

GET    /admin/categories         → admin.categories.index
GET    /admin/categories/create  → admin.categories.create
POST   /admin/categories         → admin.categories.store
GET    /admin/categories/{id}    → admin.categories.show
GET    /admin/categories/{id}/edit → admin.categories.edit
PATCH  /admin/categories/{id}    → admin.categories.update
DELETE /admin/categories/{id}    → admin.categories.destroy

GET    /admin/products           → admin.products.index
GET    /admin/products/create    → admin.products.create
POST   /admin/products           → admin.products.store
GET    /admin/products/{id}      → admin.products.show
GET    /admin/products/{id}/edit → admin.products.edit
PATCH  /admin/products/{id}      → admin.products.update
DELETE /admin/products/{id}      → admin.products.destroy

GET    /admin/industries         → admin.industries.index
GET    /admin/industries/create  → admin.industries.create
POST   /admin/industries         → admin.industries.store
GET    /admin/industries/{id}    → admin.industries.show
GET    /admin/industries/{id}/edit → admin.industries.edit
PATCH  /admin/industries/{id}    → admin.industries.update
DELETE /admin/industries/{id}    → admin.industries.destroy

GET    /admin/posts              → admin.posts.index
GET    /admin/posts/create       → admin.posts.create
POST   /admin/posts              → admin.posts.store
GET    /admin/posts/{id}         → admin.posts.show
GET    /admin/posts/{id}/edit    → admin.posts.edit
PATCH  /admin/posts/{id}         → admin.posts.update
DELETE /admin/posts/{id}         → admin.posts.destroy

GET    /admin/enquiries          → admin.enquiries.index
GET    /admin/enquiries/{id}     → admin.enquiries.show
DELETE /admin/enquiries/{id}     → admin.enquiries.destroy
PATCH  /admin/enquiries/{id}/status → admin.enquiries.update-status

GET    /admin/settings           → admin.settings.index
POST   /admin/settings           → admin.settings.store
PATCH  /admin/settings/{id}      → admin.settings.update

GET    /admin/profile            → admin.profile.edit
PATCH  /admin/profile            → admin.profile.update
DELETE /admin/profile            → admin.profile.destroy
```

## Controllers Needed

### Public Controllers
- `App\Http\Controllers\Public\HomeController`
- `App\Http\Controllers\Public\ProductController`
- `App\Http\Controllers\Public\CategoryController`
- `App\Http\Controllers\Public\IndustryController`
- `App\Http\Controllers\Public\NewsController`
- `App\Http\Controllers\Public\ContactController`
- `App\Http\Controllers\Public\EnquiryController`

### Admin Controllers
- `App\Http\Controllers\Admin\DashboardController`
- `App\Http\Controllers\Admin\ProductCategoryController`
- `App\Http\Controllers\Admin\ProductController`
- `App\Http\Controllers\Admin\IndustryController`
- `App\Http\Controllers\Admin\PostController`
- `App\Http\Controllers\Admin\EnquiryController`
- `App\Http\Controllers\Admin\SettingController`

## In Blade Templates

```blade
{{ route('home') }}
{{ route('products.index') }}
{{ route('products.show', $product->slug) }}
{{ route('admin.products.index') }}
{{ route('admin.products.edit', $product->id) }}
```

