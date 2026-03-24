# Blade Template Conversion Examples

## Quick Copy-Paste Reference for Converting Remaining Views

---

## 1. Page Header Pattern

### Before (Tailwind)
```blade
<!-- Page Header -->
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Page Title</h2>
        <p class="text-gray-600 text-sm mt-1">Page description</p>
    </div>
    <a href="{{ route(...) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Add Item
    </a>
</div>
```

### After (Bootstrap 5)
```blade
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="py-3 mb-0"><span class="text-muted fw-light">Section /</span> Page Title</h4>
                <p class="text-muted mb-0 small">Page description</p>
            </div>
            <a href="{{ route(...) }}" class="btn btn-primary">
                <i class="bx bx-plus me-2"></i> Add Item
            </a>
        </div>
    </div>
</div>
```

---

## 2. Form Layout Pattern

### Before (Tailwind)
```blade
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route(...) }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Field Label</label>
            <input type="text" name="field" placeholder="Placeholder..." 
                   value="{{ old('field') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent
                   @error('field') border-red-500 @enderror">
            @error('field')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-6 border-t">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Save
            </button>
            <a href="{{ route(...) }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
```

### After (Bootstrap 5)
```blade
<div class="card">
    <div class="card-body">
        <form action="{{ route(...) }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Field Label</label>
                <input type="text" name="field" placeholder="Placeholder..." 
                       value="{{ old('field') }}" 
                       class="form-control @error('field') is-invalid @enderror">
                @error('field')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="pt-3 border-top">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Save
                </button>
                <a href="{{ route(...) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
```

---

## 3. Data Table Pattern

### Before (Tailwind)
```blade
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-700' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                            <a href="{{ route(...) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <a href="{{ route(...) }}" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
```

### After (Bootstrap 5)
```blade
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if($item->is_active)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route(...) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item text-danger" href="{{ route(...) }}">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
```

---

## 4. Filter Form Pattern

### Before (Tailwind)
```blade
<div class="mb-6 bg-white rounded-lg shadow p-4">
    <form action="{{ route(...) }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
            <input type="text" name="search" placeholder="Search..." 
                   value="{{ request('search') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                <option value="">All</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                <option value="">All</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Filter</button>
            <a href="{{ route(...) }}" class="w-full px-4 py-2 bg-gray-300 text-gray-700 rounded-lg text-sm text-center">Clear</a>
        </div>
    </form>
</div>
```

### After (Bootstrap 5)
```blade
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route(...) }}" method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" placeholder="Search..." 
                       value="{{ request('search') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bx bx-search me-1"></i> Filter
                </button>
                <a href="{{ route(...) }}" class="btn btn-secondary">Clear</a>
            </div>
        </form>
    </div>
</div>
```

---

## 5. Empty State Pattern

### Before (Tailwind)
```blade
<x-empty-state
    title="No items found"
    description="Get started by creating your first item."
    actionText="Create Item"
    actionUrl="{{ route(...) }}"
    icon="..."
/>
```

### After (Bootstrap 5)
```blade
<div class="card">
    <div class="card-body text-center py-5">
        <h5>No items found</h5>
        <p class="text-muted">Get started by creating your first item.</p>
        <a href="{{ route(...) }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Create Item
        </a>
    </div>
</div>
```

---

## 6. Alert Pattern

### Before (Tailwind)
```blade
@if(session('success'))
    <x-alert type="success" title="Success">
        {{ session('success') }}
    </x-alert>
@endif

@if($errors->any())
    <x-alert type="error" title="Error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </x-alert>
@endif
```

### After (Bootstrap 5)
```blade
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h6 class="alert-heading">Error!</h6>
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
```

---

## 7. Checkbox Pattern

### Before (Tailwind)
```blade
<div class="mb-4">
    <label class="flex items-center">
        <input type="checkbox" name="is_active" class="w-4 h-4 text-blue-600" 
               {{ old('is_active') ? 'checked' : '' }}>
        <span class="ml-2 text-sm text-gray-700">Is Active</span>
    </label>
</div>
```

### After (Bootstrap 5)
```blade
<div class="form-check mb-3">
    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
           {{ old('is_active') ? 'checked' : '' }}>
    <label class="form-check-label" for="isActive">
        Is Active
    </label>
</div>
```

---

## 8. Badge Variants

### Before (Tailwind)
```blade
<span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Active</span>
<span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">Inactive</span>
<span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">Pending</span>
<span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">New</span>
```

### After (Bootstrap 5)
```blade
<span class="badge bg-label-success">Active</span>
<span class="badge bg-label-danger">Inactive</span>
<span class="badge bg-label-warning">Pending</span>
<span class="badge bg-label-info">New</span>
```

---

## 9. Select/Dropdown Pattern

### Before (Tailwind)
```blade
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>
    <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg @error('category_id') border-red-500 @enderror">
        <option value="">Choose Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
```

### After (Bootstrap 5)
```blade
<div class="mb-3">
    <label class="form-label">Select Category</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">Choose Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

## 10. Textarea Pattern

### Before (Tailwind)
```blade
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
    <textarea name="description" rows="4" placeholder="Enter description..."
              class="w-full px-3 py-2 border border-gray-300 rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
```

### After (Bootstrap 5)
```blade
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" rows="4" placeholder="Enter description..."
              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

## Boxicons Quick Reference

```blade
<!-- Navigation -->
<i class="bx bx-home-smile"></i>          <!-- Home/Dashboard -->
<i class="bx bx-cart-alt"></i>            <!-- Shopping/eCommerce -->
<i class="bx bx-book"></i>                <!-- Blog/Content -->
<i class="bx bx-list-ul"></i>             <!-- List/Categories -->
<i class="bx bx-mail-send"></i>           <!-- Email/Enquiries -->
<i class="bx bx-cog"></i>                 <!-- Settings -->
<i class="bx bx-user"></i>                <!-- User/Profile -->
<i class="bx bx-log-out"></i>             <!-- Logout -->

<!-- Actions -->
<i class="bx bx-plus"></i>                <!-- Add/Create -->
<i class="bx bx-search"></i>              <!-- Search/Filter -->
<i class="bx bx-edit-alt"></i>            <!-- Edit -->
<i class="bx bx-trash"></i>               <!-- Delete -->
<i class="bx bx-show"></i>                <!-- View/Eye -->
<i class="bx bx-check"></i>               <!-- Checkmark/Save -->
<i class="bx bx-x"></i>                   <!-- Close/Cancel -->
<i class="bx bx-chevron-down"></i>        <!-- Expand/Dropdown -->
<i class="bx bx-dots-vertical-rounded"></i> <!-- More options -->

<!-- Status -->
<i class="bx bxs-star"></i>               <!-- Featured/Star -->
<i class="bx bx-check-circle"></i>        <!-- Success/Done -->
<i class="bx bx-x-circle"></i>            <!-- Error/Failed -->
<i class="bx bx-info-circle"></i>         <!-- Info/Alert -->

<!-- Sizes -->
<i class="icon-base bx"></i>              <!-- Base size -->
<i class="icon-base bx bx-lg"></i>        <!-- Large -->
<i class="icon-base bx bx-md"></i>        <!-- Medium -->
```

---

**Note**: All these patterns are used in the already-converted views (dashboard, products/index, categories/index). Use them as templates for remaining views.
