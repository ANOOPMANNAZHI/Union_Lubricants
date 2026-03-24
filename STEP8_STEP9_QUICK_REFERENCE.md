# STEP 8 & 9 – QUICK REFERENCE GUIDE

## File Upload & Storage (STEP 8)

### Setup (One-Time)
```bash
php artisan storage:link
chmod -R 755 storage/app/public/
```

### Upload a File (Controller)
```php
if (request()->hasFile('image')) {
    $imagePath = request()->file('image')->store('products', 'public');
    $model->image_path = $imagePath; // "products/uuid.jpg"
}
```

### Display a File (Blade)
```blade
<!-- Image -->
<img src="{{ asset('storage/' . $product->image_path) }}" alt="Product">

<!-- Download -->
<a href="{{ asset('storage/' . $product->tds_pdf) }}" download>Download</a>
```

### Delete a File (Controller)
```php
Storage::disk('public')->delete($product->image_path);
$product->delete();
```

### Directory Structure
```
public/storage/ → symbolic link to storage/app/public/
├── products/
│   ├── uuid-image1.jpg
│   └── uuid-image2.png
└── docs/
    ├── uuid-tds.pdf
    └── uuid-msds.pdf
```

### Common Issues
| Problem | Solution |
|---------|----------|
| 404 on file | Check symbolic link exists: `ls public/storage` |
| Upload fails | Check permissions: `chmod -R 755 storage/` |
| File not found | Verify path in DB: `SELECT image_path FROM products;` |
| Wrong size | Check `.env` and `php.ini` file limits |

---

## SEO & Meta Tags (STEP 9)

### Add Meta Tags (Child View)
```blade
@extends('layouts.app')

@section('title', 'Page Title')
@section('meta_description', 'Page description for search results')
@section('meta_keywords', 'keyword1, keyword2, keyword3')
@section('og_image', asset('image-url.jpg'))

@section('json_ld')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "Product Name"
}
</script>
@endsection

@section('content')
    <!-- Page content -->
@endsection
```

### Available Sections
```blade
@section('title', '...')              <!-- Page <title> -->
@section('meta_description', '...')   <!-- Search snippet -->
@section('meta_keywords', '...')      <!-- Keywords (optional) -->
@section('og_image', '...')           <!-- Social preview image -->
@section('json_ld')                   <!-- Schema.org data -->
@section('canonical', '...')          <!-- Override canonical URL -->
```

### Default Values (Fallbacks)
```php
// Title
'Union Lubricants - Premium Lubricant Solutions'

// Description
'Union Lubricants provides premium lubricant solutions...'

// Keywords
'lubricants, oils, industrial oils...'

// OG Image
asset('images/og-image.jpg')
```

### Dynamic Content Examples

**Product Page:**
```blade
@section('title', $product->name . ' - Union Lubricants')
@section('meta_description', $product->short_description)
@section('og_image', asset('storage/' . $product->image_path))
```

**Blog Post:**
```blade
@section('title', $post->title . ' | Union Lubricants Blog')
@section('meta_description', Str::limit($post->content, 160))
```

**Category Page:**
```blade
@section('title', $category->name . ' Products - Union Lubricants')
@section('meta_description', "Browse all " . $category->name . " products")
```

### Schema.org JSON-LD Examples

**Product Schema:**
```json
{
    "@type": "Product",
    "name": "Product Name",
    "description": "Description",
    "image": "https://example.com/image.jpg",
    "brand": { "name": "Union Lubricants" },
    "offers": { "availability": "InStock" }
}
```

**Article Schema:**
```json
{
    "@type": "BlogPosting",
    "headline": "Article Title",
    "image": "https://example.com/image.jpg",
    "datePublished": "2025-01-01",
    "author": { "name": "Union Lubricants" }
}
```

**Organization Schema:** (Already in header)
```json
{
    "@type": "Organization",
    "name": "Union Lubricants",
    "url": "https://example.com",
    "logo": "https://example.com/logo.png"
}
```

### Sitemap & Robots

**Sitemap:**
```
GET /sitemap.xml
Returns XML list of all pages
Auto-generated from database
```

**Robots.txt:**
```
public/robots.txt
Tells search engines what to crawl
Points to sitemap.xml
```

### Character Limits

| Element | Limit | Example |
|---------|-------|---------|
| Title | 50-60 | "Product Name - Union Lubricants" |
| Meta Description | 150-160 | "Premium synthetic oil for modern engines..." |
| Meta Keywords | 5-10 | "motor oil, synthetic, 5W-30" |
| URL Length | < 75 | `/products/synthetic-motor-oil-5w-30` |
| H1 Tag | 1 per page | Product name or page title |

### Testing URLs

```
Sitemap:     http://union-lubricants.local/sitemap.xml
Robots:      http://union-lubricants.local/robots.txt
Home:        http://union-lubricants.local/
Products:    http://union-lubricants.local/products
Product:     http://union-lubricants.local/products/{slug}
Industries:  http://union-lubricants.local/industries
News:        http://union-lubricants.local/news
```

### Verification Steps

1. **View Page Source** (Right-click → View Page Source)
   - Look for `<title>`, `<meta name="description">`, `<link rel="canonical">`
   - Look for `<meta property="og:*">` tags
   - Look for `<script type="application/ld+json">`

2. **Validate Schema**
   - Go to https://validator.schema.org/
   - Paste page source
   - Check for errors

3. **Test Social Sharing**
   - Facebook: https://developers.facebook.com/tools/debug/
   - Twitter: https://cards-dev.twitter.com/validator

4. **Check Sitemap**
   - Visit `/sitemap.xml`
   - Should return XML with all pages
   - Check Content-Type is `text/xml`

### Common Pitfalls

| ❌ Wrong | ✅ Right |
|---------|---------|
| No title tag | Title with primary keyword |
| Generic description | Unique, compelling description |
| Duplicate titles | Unique title per page |
| Keyword stuffing | Natural keyword usage |
| No alt text on images | Descriptive alt text |
| Missing schema | Proper JSON-LD schema |
| Broken sitemap links | Valid, working URLs |
| No canonical tag | Canonical on every page |

### Routes to Check

```php
// In routes/web.php

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');

// Frontend Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/news', [PostController::class, 'index'])->name('news.index');
```

### Controllers to Check

```php
// Sitemap Controller
app/Http/Controllers/Frontend/SitemapController.php
- Fetches active products, posts, categories, industries
- Returns XML response

// Product Controller
app/Http/Controllers/Frontend/ProductController.php
- show() method passes product & relatedProducts

// Industry Controller
app/Http/Controllers/Frontend/IndustryController.php
- index() method lists all active industries
- show() method shows industry with products
```

### Views to Check

```
Frontend:
  resources/views/layouts/app.blade.php                     ✅ SEO headers
  resources/views/frontend/products/show.blade.php         ✅ Product schema
  resources/views/frontend/sitemap.blade.php               ✅ Sitemap XML

Admin:
  resources/views/layouts/admin.blade.php                  ✅ noindex, nofollow

Public:
  public/robots.txt                                        ✅ Crawler directives
```

---

## Deployment Commands

```bash
# Setup File Storage
php artisan storage:link
chmod -R 755 storage/app/public/

# Clear Cache
php artisan cache:clear
php artisan config:cache

# Test Routes
php artisan route:list | grep sitemap

# Test Sitemap
curl http://localhost:8000/sitemap.xml

# Check Logs
tail -f storage/logs/laravel.log
```

---

## Post-Deployment Checklist

```
☐ php artisan storage:link executed
☐ Storage permissions set (755)
☐ Test file upload works
☐ Test file download works
☐ Verify meta tags in browser
☐ Test sitemap.xml
☐ Test robots.txt
☐ Submit sitemap to Google Search Console
☐ Enable HTTPS
☐ Configure Google Analytics
☐ Set up monitoring
☐ Check logs for errors
```

---

## Support Resources

**Laravel Documentation:**
- File Storage: https://laravel.com/docs/11.x/filesystem
- Blade Templates: https://laravel.com/docs/11.x/blade

**SEO Resources:**
- Google Search Central: https://developers.google.com/search
- Schema.org: https://schema.org/
- Moz SEO Guide: https://moz.com/beginners-guide-to-seo

**Tools:**
- Schema.org Validator: https://validator.schema.org/
- Google Search Console: https://search.google.com/search-console/
- Google Lighthouse: https://developers.google.com/web/tools/lighthouse

---

## Key Takeaways

### File Storage
✅ Files stored in `storage/app/public/` (secure)
✅ Accessible via `public/storage/` (symbolic link)
✅ Database stores relative paths only
✅ Use `asset()` helper to generate URLs

### SEO
✅ Every page needs unique title and description
✅ Canonical tags prevent duplicate content issues
✅ Schema.org JSON-LD helps search engines understand content
✅ Sitemap helps crawlers find all pages
✅ Robots.txt gives crawlers guidelines

### Production
✅ Run `php artisan storage:link` on production
✅ Set correct file permissions
✅ Submit sitemap to Google Search Console
✅ Monitor with Google Analytics
✅ Keep content fresh and updated

**You're all set! 🚀**

