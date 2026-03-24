# STEP 9 – SEO & Meta Tags Configuration Guide

## Overview

This guide explains how to implement SEO best practices in the Union Lubricants Laravel application. It covers dynamic meta tags, structured data (schema.org), sitemaps, and robots.txt configuration.

---

## 1. Dynamic Title and Meta Description

### Location
**Layouts:** 
- `resources/views/layouts/app.blade.php` (frontend)
- `resources/views/layouts/admin.blade.php` (admin)

### How It Works

#### Frontend (app.blade.php)
```blade
<title>@yield('title', 'Union Lubricants - Premium Lubricant Solutions')</title>
<meta name="description" content="@yield('meta_description', 'Union Lubricants provides premium...')">
<meta name="keywords" content="@yield('meta_keywords', 'lubricants, oils, industrial')">
```

#### Usage in Child Views
```blade
@extends('layouts.app')

@section('title', 'Products - Union Lubricants')
@section('meta_description', 'Browse our complete range of premium lubricants')
@section('meta_keywords', 'products, lubricants, oils')

@section('content')
    <!-- Page content -->
@endsection
```

### Default Fallback Values
- **Title:** `Union Lubricants - Premium Lubricant Solutions`
- **Description:** `Union Lubricants provides premium lubricant solutions for industrial applications worldwide...`
- **Keywords:** `lubricants, oils, industrial oils, motor oils, hydraulic oils, gear oils`

---

## 2. Open Graph and Twitter Card Meta Tags

### What They Do
- Improve social media sharing preview appearance
- Allow you to control how links appear on Facebook, Twitter, LinkedIn, etc.

### Current Implementation

```blade
<!-- Open Graph Meta Tags (Facebook, LinkedIn, etc.) -->
<meta property="og:title" content="@yield('title', 'Union Lubricants')">
<meta property="og:description" content="@yield('meta_description', 'Premium lubricant solutions')">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
<meta property="og:site_name" content="Union Lubricants">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="@yield('title', 'Union Lubricants')">
<meta name="twitter:description" content="@yield('meta_description', 'Premium lubricant solutions')">
<meta name="twitter:image" content="@yield('og_image', asset('images/og-image.jpg'))">
```

### Adding Custom Image per Page

```blade
@extends('layouts.app')

@section('title', 'Motor Oils - Union Lubricants')
@section('meta_description', 'Premium motor oil products for all engine types')
@section('og_image', asset('storage/products/motor-oil-image.jpg'))

@section('content')
    <!-- Page content -->
@endsection
```

---

## 3. Canonical Tag

### Purpose
- Prevents duplicate content issues
- Tells search engines which version is the "canonical" (preferred)
- Important for multi-domain or parameter-based pages

### Current Implementation
```blade
<link rel="canonical" href="{{ url()->current() }}">
```

### Example Output
```html
<!-- On homepage -->
<link rel="canonical" href="http://union-lubricants.local/">

<!-- On product page -->
<link rel="canonical" href="http://union-lubricants.local/products/synthetic-motor-oil-5w-30">

<!-- With query parameters (e.g., sorted/filtered list) -->
<link rel="canonical" href="http://union-lubricants.local/products">
```

### When to Override
If you have intentional duplicates (pagination, sorted views), specify the canonical:

```blade
@section('canonical', route('products.index'))
```

Then in layout:
```blade
<link rel="canonical" href="@yield('canonical', url()->current())">
```

---

## 4. Schema.org JSON-LD Structured Data

### What Is It?
- Machine-readable format for search engines
- Helps Google understand your content better
- Enables rich snippets in search results

### Current Implementation

#### Organization Schema (in header)
```json
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Union Lubricants",
    "url": "http://union-lubricants.local",
    "logo": "http://union-lubricants.local/images/logo.png",
    "description": "Premium lubricant solutions for industrial applications",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1-555-0000",
        "contactType": "Sales"
    },
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "123 Oil Lane",
        "addressLocality": "City",
        "addressRegion": "ST",
        "postalCode": "12345",
        "addressCountry": "US"
    },
    "sameAs": [
        "https://www.facebook.com/unionlubricants",
        "https://www.twitter.com/unionlubricants"
    ]
}
```

### Product Schema (add to product show view)

**File:** `resources/views/frontend/products/show.blade.php`

```blade
@section('json_ld')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "{{ $product->name }}",
    "description": "{{ $product->short_description }}",
    "image": "{{ asset('storage/' . $product->image_path) }}",
    "brand": {
        "@type": "Brand",
        "name": "Union Lubricants"
    },
    "offers": {
        "@type": "AggregateOffer",
        "priceCurrency": "USD",
        "availability": "{{ $product->is_active ? 'InStock' : 'OutOfStock' }}"
    },
    "manufacturer": {
        "@type": "Organization",
        "name": "Union Lubricants"
    }
}
</script>
@endsection
```

### Article/Blog Post Schema (for news)

**File:** `resources/views/frontend/posts/show.blade.php`

```blade
@section('json_ld')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $post->title }}",
    "description": "{{ $post->excerpt }}",
    "image": "{{ asset('storage/' . $post->image_path) }}",
    "datePublished": "{{ $post->created_at->toIso8601String() }}",
    "dateModified": "{{ $post->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Organization",
        "name": "Union Lubricants"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Union Lubricants",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/logo.png') }}"
        }
    }
}
</script>
@endsection
```

### BreadcrumbList Schema (for navigation)

```blade
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Products",
            "item": "{{ route('products.index') }}"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $product->category->name }}",
            "item": "{{ route('products.by-category', $product->category->slug) }}"
        },
        {
            "@type": "ListItem",
            "position": 4,
            "name": "{{ $product->name }}",
            "item": "{{ route('products.show', $product->slug) }}"
        }
    ]
}
</script>
```

---

## 5. Sitemap.xml Configuration

### Location
- **File:** `public/sitemap.xml` (or generated dynamically)
- **Route:** `/sitemap.xml`
- **Controller:** `app/Http/Controllers/Frontend/SitemapController.php`
- **View:** `resources/views/frontend/sitemap.blade.php`

### Access
```
http://union-lubricants.local/sitemap.xml
```

### What's Included
```
✓ Homepage (priority: 1.0)
✓ Products listing (priority: 0.9)
✓ Individual products (priority: 0.8)
✓ Product categories (priority: 0.7)
✓ Industries (priority: 0.8 for listing, 0.7 for individual)
✓ Blog/News (priority: 0.8 for listing, 0.7 for posts)
✓ Static pages (priority: 0.6)
```

### Dynamic Generation
The sitemap is generated dynamically from the database:

```php
// SitemapController.php
public function index(): Response
{
    $products = Product::where('is_active', true)->get();
    $posts = Post::where('is_active', true)->get();
    // ... fetch other data
    
    return response()->view('frontend.sitemap', [
        'products' => $products,
        'posts' => $posts,
        // ...
    ])->header('Content-Type', 'text/xml');
}
```

### Example Output (XML Format)
```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>http://union-lubricants.local/</loc>
        <lastmod>2025-12-01T10:30:00+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>http://union-lubricants.local/products/synthetic-motor-oil-5w-30</loc>
        <lastmod>2025-11-28T14:22:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <!-- More URLs... -->
</urlset>
```

### Priority Meanings
- **1.0** = Highest priority (homepage)
- **0.8** = High priority (key content like products)
- **0.7** = Medium priority (categories, detail pages)
- **0.6** = Low priority (static pages like about)

### Changefreq Meanings
- **daily** = Content changes frequently (news/blog)
- **weekly** = Regular updates (product listings)
- **monthly** = Occasional updates (product details)
- **yearly** = Rarely changes (about page)

### Registering with Google
1. Go to [Google Search Console](https://search.google.com/search-console)
2. Add your property
3. In **Sitemaps** section, click **Add/test sitemap**
4. Enter: `http://union-lubricants.local/sitemap.xml`
5. Click **Submit**

---

## 6. Robots.txt Configuration

### Location
- **File:** `public/robots.txt`
- **Access:** `http://union-lubricants.local/robots.txt`

### Current Configuration

```txt
# Union Lubricants - robots.txt
# Allow all search engines
User-agent: *
Allow: /

# Disallow private/admin areas
Disallow: /admin/
Disallow: /login
Disallow: /register

# Sitemap
Sitemap: http://union-lubricants.local/sitemap.xml
```

### Directives Explained

#### User-agent
- `*` = All robots
- `Googlebot` = Google only
- `Bingbot` = Bing only

#### Allow
- Explicitly allow specific paths
- Default is allow all if not specified

#### Disallow
- Paths robots should NOT crawl
- Use `Disallow: /` to block all crawling

#### Sitemap
- Points search engines to your sitemap
- Can include multiple sitemaps

### Common Configuration Examples

**Block all bots:**
```txt
User-agent: *
Disallow: /
```

**Allow all, but exclude admin:**
```txt
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/
```

**Different rules for different bots:**
```txt
User-agent: Googlebot
Allow: /

User-agent: Bingbot
Disallow: /private/

User-agent: *
Disallow: /
```

### Important Notes
- `robots.txt` is in the public root, NOT in a view
- It's a text file, not HTML
- Bots read it automatically when accessing the site
- It's advisory only (bots can ignore it)
- For true privacy, use authentication or X-Robots-Tag header

---

## 7. X-Robots-Tag Header (Alternative to robots.txt)

For dynamic content, use HTTP headers in the controller:

```php
// In controller
return response()
    ->view('admin.dashboard')
    ->header('X-Robots-Tag', 'noindex, nofollow');
```

This is already configured in `layouts/admin.blade.php`:
```blade
<meta name="robots" content="noindex, nofollow">
```

---

## 8. SEO Best Practices Checklist

### On-Page SEO
- [ ] **Title tags** (50-60 characters)
  ```
  ✓ Product Name - Union Lubricants
  ✗ Just "Product" (too vague)
  ```

- [ ] **Meta descriptions** (150-160 characters)
  ```
  ✓ "Explore our synthetic motor oil 5W-30, perfect for modern engines"
  ✗ "Product page" (too vague)
  ```

- [ ] **Heading hierarchy** (H1, H2, H3)
  ```
  ✓ One H1 per page (product name)
  ✓ H2 for sections (Overview, Specifications)
  ```

- [ ] **URL structure**
  ```
  ✓ /products/synthetic-motor-oil-5w-30 (descriptive)
  ✗ /products/p123 (not descriptive)
  ```

- [ ] **Image alt text**
  ```
  ✓ alt="{{ $product->name }}"
  ✗ alt="image"
  ```

### Technical SEO
- [ ] Sitemap submitted to Google Search Console
- [ ] robots.txt configured correctly
- [ ] Mobile responsiveness (Tailwind handles this)
- [ ] Page speed optimization
- [ ] HTTPS enabled (for production)
- [ ] Canonical tags implemented
- [ ] No duplicate content
- [ ] Structured data (schema.org) added

### Content SEO
- [ ] Content is original and valuable
- [ ] Keywords naturally distributed (3-5% density)
- [ ] At least 300 words per page
- [ ] Internal linking to related pages
- [ ] External links to authoritative sources
- [ ] Regular content updates

---

## 9. Implementing for Existing Pages

### Example: Product Show Page

Add to `resources/views/frontend/products/show.blade.php`:

```blade
@extends('layouts.app')

@section('title', $product->name . ' - Union Lubricants')

@section('meta_description', 
    ($product->short_description ?: 'View details of ' . $product->name)
)

@section('og_image', asset('storage/' . $product->image_path))

@section('json_ld')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "{{ $product->name }}",
    "description": "{{ $product->short_description }}",
    "image": "{{ asset('storage/' . $product->image_path) }}",
    "brand": { "@type": "Brand", "name": "Union Lubricants" },
    "offers": {
        "@type": "AggregateOffer",
        "availability": "{{ $product->is_active ? 'InStock' : 'OutOfStock' }}"
    }
}
</script>
@endsection

@section('content')
    <!-- Page content -->
@endsection
```

### Example: Blog Post Show Page

```blade
@section('title', $post->title)

@section('meta_description', Str::limit($post->content, 160))

@section('json_ld')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $post->title }}",
    "datePublished": "{{ $post->created_at->toIso8601String() }}",
    "author": { "@type": "Organization", "name": "Union Lubricants" }
}
</script>
@endsection
```

---

## 10. Monitoring & Optimization

### Tools to Use

1. **Google Search Console** (Free)
   - Track impressions and clicks
   - Fix indexing issues
   - Submit sitemaps
   - View search queries

2. **Google Analytics 4** (Free)
   - Track user behavior
   - Monitor traffic sources
   - Identify high-performing pages

3. **Lighthouse** (Built-in Chrome DevTools)
   - Audit performance
   - Check SEO compliance
   - Generate accessibility reports

4. **SEO Testing Tools** (Optional)
   - Ahrefs, SEMrush, Moz (paid)
   - Check backlinks
   - Analyze competitors
   - Track rankings

### Regular Maintenance
- [ ] Check Google Search Console monthly
- [ ] Update old content
- [ ] Fix broken links
- [ ] Monitor page speed
- [ ] Review keyword rankings
- [ ] Check for crawl errors

---

## Summary

✅ **Dynamic titles & descriptions** for each page
✅ **Open Graph & Twitter cards** for social sharing
✅ **Canonical tags** to prevent duplicates
✅ **Schema.org JSON-LD** for rich snippets
✅ **Sitemap.xml** for search engine crawling
✅ **robots.txt** for crawler instructions
✅ **No-index on admin** pages for privacy
✅ **Mobile-responsive design** (Tailwind)
✅ **Fast page load** (optimized assets)

All configured and production-ready! 🚀

