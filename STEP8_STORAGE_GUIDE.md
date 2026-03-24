# STEP 8 – File Upload & Storage Configuration Guide

## Overview

This guide explains how file uploads and storage work in the Union Lubricants Laravel application. Files are stored securely outside the web root and served through a symbolic link for public access.

---

## 1. Storage Directory Structure

### Location and Hierarchy
```
storage/
├── app/
│   ├── public/
│   │   ├── products/     # Product images
│   │   └── docs/         # PDFs (TDS, MSDS)
│   ├── private/          # Private files (not accessible publicly)
│   └── ...
└── logs/
```

**Key Points:**
- Files are stored in `storage/app/public/` by default
- Laravel's `public` disk is configured to store files here
- Files in this directory are NOT directly accessible via HTTP
- A symbolic link must be created to make them public (see below)

---

## 2. Creating the Storage Link

### Command
```bash
php artisan storage:link
```

### What It Does
- Creates a symbolic link from `public/storage` → `storage/app/public/`
- Allows files stored in `storage/app/public/` to be accessible via HTTP
- Run this command **once** during initial setup

### Verification
After running the command, you should see:
```
The [public/storage] link has been successfully created.
```

Check that `public/storage` exists as a folder in your project root.

### On Different Hosting Environments
- **Local/Development**: Use `php artisan storage:link`
- **Shared Hosting**: If symbolic links fail, you may need to use SSH or contact hosting support
- **cPanel/Plesk**: Some hosts require using the control panel's file manager
- **Cloud (AWS, Heroku, etc.)**: Links are typically created automatically or persist if properly configured

---

## 3. File Storage Paths in Database

### How Paths Are Stored

**Product Model Example:**
```php
// When storing an image:
$imagePath = $image->store('products', 'public');
// Result in DB: "products/abc123def456.jpg"
```

**What Gets Saved:**
- **Only the relative path** is saved: `products/abc123def456.jpg`
- **Not the full URL** - this keeps the database flexible
- **Not the filename** - Laravel adds a hash for uniqueness

### Database Fields (products table)
```sql
-- Relative paths stored in database
image_path       VARCHAR(255)  -- e.g., "products/abc123def456.jpg"
tds_pdf          VARCHAR(255)  -- e.g., "docs/tds_document.pdf"
msds_pdf         VARCHAR(255)  -- e.g., "docs/msds_document.pdf"
```

### Why This Approach?
1. **Flexibility**: Change storage paths without updating database
2. **Portability**: Easy to migrate to different servers
3. **Clean DB**: Stores minimal data, not full URLs
4. **Consistency**: All relative paths follow the same format

---

## 4. Displaying Images and PDFs in Views

### Using the `asset()` Helper

**Basic Syntax:**
```blade
{{ asset('storage/path/to/file') }}
```

### Product Image (Frontend)
```blade
<!-- In resources/views/frontend/products/show.blade.php -->
<img src="{{ asset('storage/' . $product->image_path) }}" 
     alt="{{ $product->name }}" 
     class="w-full h-auto rounded">
```

### Product Image (Admin)
```blade
<!-- In resources/views/admin/products/show.blade.php -->
<img src="{{ asset('storage/' . $product->image_path) }}" 
     alt="{{ $product->name }}" 
     class="max-w-sm h-auto rounded">
```

### PDF Downloads (TDS Document)
```blade
<!-- Display a download link -->
@if($product->tds_pdf)
    <a href="{{ asset('storage/' . $product->tds_pdf) }}" 
       download 
       class="btn btn-primary">
        Download TDS
    </a>
@endif

<!-- Or in a table -->
<a href="{{ asset('storage/' . $product->tds_pdf) }}" 
   target="_blank" 
   class="text-blue-600 hover:underline">
    View TDS PDF
</a>
```

### PDF Downloads (MSDS Document)
```blade
@if($product->msds_pdf)
    <a href="{{ asset('storage/' . $product->msds_pdf) }}" 
       download 
       class="btn btn-danger">
        Download MSDS
    </a>
@endif
```

### Complete Example (Show View)
```blade
<div class="product-documents">
    <h3 class="text-lg font-bold mb-4">Documentation</h3>
    
    <div class="space-y-4">
        <!-- Image Section -->
        <div>
            <h4 class="font-semibold">Product Image</h4>
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" 
                     alt="{{ $product->name }}"
                     class="max-w-xs h-auto rounded border">
            @else
                <p class="text-gray-500">No image available</p>
            @endif
        </div>

        <!-- TDS Section -->
        <div>
            <h4 class="font-semibold">Technical Data Sheet</h4>
            @if($product->tds_pdf)
                <a href="{{ asset('storage/' . $product->tds_pdf) }}" 
                   target="_blank" 
                   download
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    📄 Download TDS
                </a>
            @else
                <p class="text-gray-500">Not available</p>
            @endif
        </div>

        <!-- MSDS Section -->
        <div>
            <h4 class="font-semibold">Material Safety Data Sheet</h4>
            @if($product->msds_pdf)
                <a href="{{ asset('storage/' . $product->msds_pdf) }}" 
                   target="_blank" 
                   download
                   class="inline-block bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    ⚠️ Download MSDS
                </a>
            @else
                <p class="text-gray-500">Not available</p>
            @endif
        </div>
    </div>
</div>
```

---

## 5. Controller Implementation (File Upload Handling)

### Store Method
```php
public function store(): RedirectResponse
{
    $validated = request()->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tds_pdf' => 'nullable|mimes:pdf|max:5120',
        'msds_pdf' => 'nullable|mimes:pdf|max:5120',
        // ... other validations
    ]);

    // Handle image upload
    if (request()->hasFile('image')) {
        $image = request()->file('image');
        // Store in storage/app/public/products/
        $imagePath = $image->store('products', 'public');
        $validated['image_path'] = $imagePath; // e.g., "products/abc123.jpg"
    }

    // Handle TDS PDF
    if (request()->hasFile('tds_pdf')) {
        $tds = request()->file('tds_pdf');
        // Store in storage/app/public/docs/
        $tdsPath = $tds->store('docs', 'public');
        $validated['tds_pdf'] = $tdsPath; // e.g., "docs/tds_xyz.pdf"
    }

    // Handle MSDS PDF
    if (request()->hasFile('msds_pdf')) {
        $msds = request()->file('msds_pdf');
        // Store in storage/app/public/docs/
        $msdsPath = $msds->store('docs', 'public');
        $validated['msds_pdf'] = $msdsPath; // e.g., "docs/msds_xyz.pdf"
    }

    // Create product with file paths
    $product = Product::create($validated);

    return redirect()->route('admin.products.index')
        ->with('success', 'Product created with files.');
}
```

### Update Method (Preserve Existing Files)
```php
public function update(Product $product): RedirectResponse
{
    $validated = request()->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ... validations
    ]);

    // Only update image if new one is uploaded
    if (request()->hasFile('image')) {
        // Delete old image if it exists
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        
        $image = request()->file('image');
        $imagePath = $image->store('products', 'public');
        $validated['image_path'] = $imagePath;
    }

    $product->update($validated);

    return redirect()->route('admin.products.index')
        ->with('success', 'Product updated.');
}
```

### Delete Method (Clean Up Files)
```php
public function destroy(Product $product): RedirectResponse
{
    // Delete associated files before deleting the product
    if ($product->image_path) {
        Storage::disk('public')->delete($product->image_path);
    }
    
    if ($product->tds_pdf) {
        Storage::disk('public')->delete($product->tds_pdf);
    }
    
    if ($product->msds_pdf) {
        Storage::disk('public')->delete($product->msds_pdf);
    }

    $product->delete();

    return redirect()->route('admin.products.index')
        ->with('success', 'Product deleted.');
}
```

### Required Import
```php
use Illuminate\Support\Facades\Storage;
```

---

## 6. Laravel Disk Configuration

### File: `config/filesystems.php`

The default configuration already includes:
```php
'disks' => [
    // ... other disks
    
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
    ],
],
```

**Key Points:**
- `root`: Where files are physically stored (`storage/app/public/`)
- `url`: The HTTP base path for accessing files
- `visibility`: 'public' means files are readable by anyone via HTTP

### Custom Configuration (Optional)
To change the storage location, modify:
```php
'root' => storage_path('app/public'),  // Change this path
'url' => env('APP_URL').'/storage',    // Change this URL
```

---

## 7. File Paths Reference

### After Running `php artisan storage:link`

**Storage Directory:**
```
storage/app/public/
├── products/      (images)
│   ├── uuid1-image.jpg
│   └── uuid2-image.png
└── docs/         (PDFs)
    ├── uuid1-tds.pdf
    └── uuid2-msds.pdf
```

**Public Link:**
```
public/storage/ → symbolic link to storage/app/public/
```

**Access URLs:**
```
# Image
http://union-lubricants.local/storage/products/uuid1-image.jpg

# PDF
http://union-lubricants.local/storage/docs/uuid1-tds.pdf
```

**In Blade (using asset helper):**
```blade
<!-- Image -->
{{ asset('storage/products/uuid1-image.jpg') }}

<!-- PDF -->
{{ asset('storage/docs/uuid1-tds.pdf') }}
```

---

## 8. Troubleshooting

### Issue: Files upload but aren't accessible
**Solution:**
1. Verify symbolic link exists: Check if `public/storage` folder exists
2. Recreate link: `php artisan storage:link`
3. Check permissions: `chmod -R 755 storage/`

### Issue: 404 errors when accessing images
**Solution:**
1. Verify file exists: `ls storage/app/public/products/`
2. Check relative path in DB: `SELECT image_path FROM products;`
3. Ensure you're using `asset('storage/...')` in views

### Issue: Upload fails silently
**Solution:**
1. Check storage folder is writable: `chmod -R 777 storage/`
2. Check file size limits in `.env` and `php.ini`
3. Review Laravel logs: `storage/logs/laravel.log`

### Issue: "Failed to move uploaded file"
**Solution:**
1. Verify disk configuration in `config/filesystems.php`
2. Run `chmod -R 777 storage/app/public/`
3. Check temp directory: `php -r "echo sys_get_temp_dir();"`

### Issue: Symbolic link fails on Windows
**Solution:**
- Run Command Prompt as Administrator
- Use: `mklink /D public\storage storage\app\public`
- Or manually create the directory and copy files

---

## 9. Production Deployment Checklist

- [ ] Run `php artisan storage:link` on production server
- [ ] Set correct permissions: `chmod -R 755 storage/app/public/`
- [ ] Verify `public/storage` symbolic link exists
- [ ] Test file upload and access through URL
- [ ] Configure backup strategy for `storage/app/public/`
- [ ] Set up file cleanup/retention policies if needed
- [ ] Monitor disk space usage
- [ ] Consider cloud storage (S3) for large-scale deployment

---

## 10. Moving to Cloud Storage (AWS S3)

If you need to scale beyond local storage:

### Install AWS Package
```bash
composer require aws/aws-sdk-php
```

### Update `.env`
```env
FILESYSTEM_DRIVER=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your-bucket-name
AWS_URL=https://s3.amazonaws.com/your-bucket-name
```

### Update Storage Calls
No code changes needed - just change the disk:
```php
// Uses S3 instead of local storage
$imagePath = $image->store('products', 's3');
```

---

## Summary

✅ **File uploads** are validated and stored securely
✅ **Database** stores only relative paths
✅ **Symbolic link** makes files publicly accessible
✅ **asset() helper** converts paths to full URLs
✅ **File deletion** is handled in destroy() method
✅ **Production-ready** with proper configuration

