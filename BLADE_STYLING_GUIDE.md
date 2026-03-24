# BLADE TEMPLATE STYLING GUIDE
## Union Lubricants - Admin Dashboard Style Standards

---

## 📋 TABLE OF CONTENTS

1. Overview
2. Index/List Page Structure
3. Create/Edit Form Structure
4. Style Classes Reference
5. Key Patterns to Follow
6. Files Updated (Status)
7. Validation Checklist

---

## 🎯 INDEX/LIST PAGE STRUCTURE

### Complete Base Layout Pattern

```blade
@extends('layouts.admin')

@section('title', 'Resource Name - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0">
                <span class="text-muted fw-light">Admin /</span> Resource Name
            </h4>
            <p class="text-muted small">Brief description of what's shown here</p>
        </div>
        <a href="{{ route('admin.resources.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Add New Resource
        </a>
    </div>
</div>

<!-- Filter Card (Optional) -->
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.resources.index') }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" placeholder="Search..." 
                       value="{{ request('search') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Filter</label>
                <select name="filter" class="form-select">
                    <option value="">All</option>
                    <option value="active" {{ request('filter') === 'active' ? 'selected' : '' }}>
                        Active
                    </option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bx bx-search me-1"></i> Filter
                </button>
                @if(request()->anyFilled(['search', 'filter']))
                    <a href="{{ route('admin.resources.index') }}" class="btn btn-secondary">
                        <i class="bx bx-x me-1"></i> Clear
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Data Table -->
@if($resources->count() > 0)
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resources as $resource)
                    <tr>
                        <td>{{ $resource->name }}</td>
                        <td>{{ $resource->value }}</td>
                        <td>
                            @if($resource->is_active)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.resources.edit', $resource->id) }}" 
                               class="btn btn-sm btn-outline-primary me-2">
                                <i class="bx bx-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.resources.destroy', $resource->id) }}" 
                                  class="d-inline" 
                                  onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bx bx-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
@if($resources->hasPages())
<div class="mt-4">
    {{ $resources->links() }}
</div>
@endif

@else
<div class="card">
    <div class="card-body text-center py-5">
        <i class="bx bx-folder-open text-muted" style="font-size: 2.5rem;"></i>
        <p class="text-muted mt-3">No resources found</p>
        <a href="{{ route('admin.resources.create') }}" class="btn btn-primary mt-2">
            <i class="bx bx-plus me-1"></i> Create First Resource
        </a>
    </div>
</div>
@endif

@endsection
```

---

## ✏️ CREATE/EDIT FORM STRUCTURE

### Complete Form Pattern with Validation

```blade
@extends('layouts.admin')

@section('title', 'Create/Edit Resource - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0">
            <span class="text-muted fw-light">Admin /</span> 
            {{ isset($resource) ? 'Edit Resource' : 'Create Resource' }}
        </h4>
        @if(isset($resource))
            <p class="text-muted small">{{ $resource->name }}</p>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" 
              action="{{ isset($resource) ? route('admin.resources.update', $resource->id) : route('admin.resources.store') }}" 
              enctype="multipart/form-data">
            @csrf
            @if(isset($resource))
                @method('PUT')
            @endif

            <div class="row g-3">
                <!-- Left Column -->
                <div class="col-md-6">
                    <!-- Text Input -->
                    <div class="mb-3">
                        <label class="form-label">Resource Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Enter name"
                               value="{{ old('name', $resource->name ?? '') }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Select Input -->
                    <div class="mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" 
                                class="form-select @error('category_id') is-invalid @enderror" 
                                required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        @if(old('category_id', $resource->category_id ?? '') == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Textarea -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" 
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter description">{{ old('description', $resource->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Checkbox -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" 
                                   id="is_active" value="1" 
                                   @if(old('is_active', $resource->is_active ?? false)) checked @endif>
                            <label class="form-check-label" for="is_active">
                                Mark as Active
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <!-- File Upload with Preview -->
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        
                        @if(isset($resource) && $resource->image_path)
                            <div class="mb-3">
                                <p class="form-label text-muted small">Current Image</p>
                                <div class="border rounded p-2 bg-light">
                                    <img src="{{ asset('storage/' . $resource->image_path) }}" 
                                         alt="{{ $resource->name }}" 
                                         style="max-height: 150px; width: auto;">
                                </div>
                            </div>
                        @endif

                        <div class="border-2 border-dashed rounded p-4 text-center cursor-pointer" 
                             id="dropZone" style="border-color: #dee2e6; cursor: pointer;">
                            <input type="file" name="image" id="imageInput" 
                                   accept="image/jpeg,image/png" class="d-none">
                            <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                            <p class="mt-2 mb-0 text-muted small">Click or drag image here</p>
                            <p class="text-muted" style="font-size: 0.85rem;">JPG, PNG | Max 5MB</p>
                            <img id="imagePreview" style="display: none; max-height: 150px; margin-top: 10px;">
                        </div>
                        @error('image')
                            <div class="text-danger small mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i> 
                        {{ isset($resource) ? 'Update Resource' : 'Create Resource' }}
                    </button>
                    <a href="{{ route('admin.resources.index') }}" class="btn btn-secondary ms-2">
                        <i class="bx bx-arrow-back me-1"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- File Upload JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('dropZone');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    // Click to select
    if (dropZone) {
        dropZone.addEventListener('click', () => imageInput.click());

        // Drag and drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#0d6efd';
            dropZone.style.backgroundColor = '#f0f6ff';
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.style.borderColor = '#dee2e6';
            dropZone.style.backgroundColor = 'transparent';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '#dee2e6';
            imageInput.files = e.dataTransfer.files;
            previewImage();
        });

        imageInput.addEventListener('change', previewImage);

        function previewImage() {
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    }
});
</script>

@endsection
```

---

## 🎨 STYLE CLASSES REFERENCE

### Badge Classes (Status Indicators)
```blade
<!-- Success Status -->
<span class="badge bg-label-success">Active</span>

<!-- Danger Status -->
<span class="badge bg-label-danger">Inactive</span>

<!-- Warning Status -->
<span class="badge bg-label-warning">Pending</span>

<!-- Info Status -->
<span class="badge bg-label-info">Info</span>

<!-- Secondary Status -->
<span class="badge bg-label-secondary">Secondary</span>
```

### Button Classes
```blade
<!-- Primary Button -->
<button class="btn btn-primary">Primary</button>

<!-- Secondary Button -->
<button class="btn btn-secondary">Secondary</button>

<!-- Danger Button -->
<button class="btn btn-danger">Delete</button>

<!-- Outline Button -->
<a href="#" class="btn btn-outline-primary">Outline</a>

<!-- Small Button -->
<button class="btn btn-sm btn-primary">Small</button>
```

### Input & Form Classes
```blade
<!-- Text Input (Success State) -->
<input class="form-control is-valid">

<!-- Text Input (Error State) -->
<input class="form-control is-invalid">
<div class="invalid-feedback">Error message</div>

<!-- Disabled Input -->
<input class="form-control" disabled>

<!-- Select Input -->
<select class="form-select">
    <option>Option 1</option>
</select>

<!-- Checkbox -->
<div class="form-check">
    <input class="form-check-input" type="checkbox" id="check1">
    <label class="form-check-label" for="check1">Checkbox</label>
</div>

<!-- Textarea -->
<textarea class="form-control" rows="4"></textarea>
```

### Table & Layout Classes
```blade
<!-- Table -->
<table class="table table-hover">
    <thead class="table-light">
        <tr><th>Header</th></tr>
    </thead>
</table>

<!-- Responsive Table -->
<div class="table-responsive">
    <table class="table">...</table>
</div>

<!-- Grid Layout -->
<div class="row g-3">
    <div class="col-md-6">Left</div>
    <div class="col-md-6">Right</div>
</div>

<!-- Card -->
<div class="card">
    <div class="card-header"><h5>Title</h5></div>
    <div class="card-body">Content</div>
    <div class="card-footer">Footer</div>
</div>
```

---

## 📝 KEY PATTERNS TO FOLLOW

1. **Always use `.form-control` for text inputs**
2. **Always use `.form-select` for select dropdowns**
3. **Always use `.form-label` for field labels**
4. **Always mark required fields with `<span class="text-danger">*</span>`**
5. **Always use `@error()` to display validation error messages**
6. **Always use `old()` function to preserve form data on validation failures**
7. **Always include `enctype="multipart/form-data"` for file uploads**
8. **Always wrap tables with `.table-responsive` for mobile support**
9. **Always use `.badge bg-label-*` for status indicators**
10. **Always use Bootstrap grid (row/col-md-*) for form layouts**
11. **Always confirm destructive actions with `onclick="return confirm('...')"`**
12. **Always show an empty state with helpful message when no data exists**

---

## ✅ STATUS: FILES ALREADY PROPERLY STYLED

### Index Pages ✅
- ✅ `resources/views/admin/products/index.blade.php`
- ✅ `resources/views/admin/posts/index.blade.php`
- ✅ `resources/views/admin/services/index.blade.php`
- ✅ `resources/views/admin/certifications/index.blade.php`
- ✅ `resources/views/admin/banners/index.blade.php`
- ✅ `resources/views/admin/testimonials/index.blade.php`
- ✅ `resources/views/admin/industries/index.blade.php`
- ✅ `resources/views/admin/about/index.blade.php`

### Create/Edit Pages ✅
- ✅ `resources/views/admin/products/create.blade.php`
- ✅ `resources/views/admin/products/edit.blade.php`
- ✅ `resources/views/admin/posts/create.blade.php`
- ✅ `resources/views/admin/posts/edit.blade.php`
- ✅ `resources/views/admin/services/create.blade.php`
- ✅ `resources/views/admin/services/edit.blade.php`
- ✅ `resources/views/admin/certifications/create.blade.php`
- ✅ `resources/views/admin/certifications/edit.blade.php`
- ✅ `resources/views/admin/banners/create.blade.php`
- ✅ `resources/views/admin/banners/edit.blade.php`
- ✅ `resources/views/admin/testimonials/create.blade.php`
- ✅ `resources/views/admin/testimonials/edit.blade.php`
- ✅ `resources/views/admin/industries/create.blade.php`
- ✅ `resources/views/admin/industries/edit.blade.php`
- ✅ `resources/views/admin/about/edit.blade.php`

### Show/Detail Pages ✅
- ✅ `resources/views/admin/products/show.blade.php`
- ✅ `resources/views/admin/posts/show.blade.php`

### Admin Settings ✅
- ✅ `resources/views/admin/settings/index.blade.php`

---

## ✅ VALIDATION CHECKLIST

### Index/List Pages
- [x] All use consistent header with breadcrumb and "Add" button
- [x] All have filter/search functionality when applicable
- [x] All use `.table-responsive` wrapper
- [x] All use `.table.table-hover` for styling
- [x] All use `.table-light` for thead
- [x] All use badge classes for status indicators
- [x] All show empty state when no data exists
- [x] All have proper pagination

### Create/Edit Form Pages
- [x] All use consistent two-column layout (left for inputs, right for files)
- [x] All have proper form validation with `@error()` display
- [x] All preserve old values with `old()` function
- [x] All mark required fields with red asterisk `*`
- [x] All have file upload with drag-and-drop UI
- [x] All have proper form action (store/update)
- [x] All have CSRF token with `@csrf` and `@method()`
- [x] All have Cancel button to return to index

### Overall Standards
- [x] All use Sneat template classes and patterns
- [x] All follow Bootstrap 5 grid system (row/col-md-*)
- [x] All use consistent button styling
- [x] All use consistent color badges
- [x] All have proper spacing and margins
- [x] All are mobile responsive
- [x] All include proper icons from Boxicons (bx classes)

---

## 📚 REFERENCE TEMPLATES

The Sneat Admin Template reference files:
- `tables-datatables-basic.html` - Table styling
- `form-layouts.html` - Form element patterns
- `form-elements.html` - Input field patterns
- `buttons.html` - Button styling
- `badges.html` - Badge styling

All Blade templates in this project follow these Sneat template standards.

---

**Last Updated:** December 8, 2025
**Status:** Implementation Complete ✅
