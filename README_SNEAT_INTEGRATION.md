# Union Lubricants Admin Panel - Sneat Bootstrap Template Integration

## Overview

The admin panel has been converted from a custom Tailwind CSS design to the professional **Sneat Bootstrap 5 Admin Template**. This provides a modern, feature-rich dashboard with a clean sidebar navigation, responsive design, and extensive component library.

## What's Been Completed ✅

### 1. Master Layout (`resources/views/layouts/admin.blade.php`)
- **Complete rewrite** using Sneat template structure
- Bootstrap 5 CSS framework
- Responsive sidebar with collapsible menu
- Top navigation navbar with user dropdown
- Flash message alerts system
- Form validation error display
- Active navigation highlighting
- Proper asset path integration pointing to `/public/admin/assets/`

### 2. Views Converted to Bootstrap 5
- ✅ **Dashboard** (`admin/dashboard.blade.php`)
  - Statistics cards with icons
  - Recent enquiries table
  - Responsive grid layout
  
- ✅ **Products Index** (`admin/products/index.blade.php`)
  - Advanced filter bar (search, category, status)
  - Data table with hover effects
  - Action dropdown menus
  - Pagination
  - Empty state messaging

- ✅ **Categories Index** (`admin/categories/index.blade.php`)
  - Category listing table
  - Status badges with indicators
  - Edit/delete actions
  - Responsive design

### 3. Documentation Created
- `SNEAT_TEMPLATE_INTEGRATION.md` - Complete integration guide
- `ADMIN_UI_DOCUMENTATION.md` - Design system reference

## Current State 🔄

The following views **still need conversion** from Tailwind CSS to Bootstrap 5:

### Forms
- [ ] `admin/categories/form.blade.php`
- [ ] `admin/industries/form.blade.php`
- [ ] `admin/products/create.blade.php`
- [ ] `admin/products/edit.blade.php`
- [ ] `admin/posts/form.blade.php`
- [ ] `admin/settings/index.blade.php`
- [ ] `admin/profile/edit.blade.php`

### List Views
- [ ] `admin/industries/index.blade.php`
- [ ] `admin/posts/index.blade.php`
- [ ] `admin/enquiries/index.blade.php`

### Detail Views
- [ ] `admin/products/show.blade.php`
- [ ] `admin/enquiries/show.blade.php`

### Reusable Components
- [ ] `components/alert.blade.php` (Convert to Bootstrap alerts)
- [ ] `components/empty-state.blade.php` (Convert to Bootstrap cards)
- [ ] `components/loading-spinner.blade.php` (Convert to Bootstrap spinners)

## How to Use the Template

### Asset Paths
All admin assets are located in `/public/admin/assets/`:
```
public/admin/assets/
├── css/               # CSS files
├── js/               # JavaScript files
├── vendor/           # Third-party libraries
│   ├── css/         # Bootstrap, DataTables, Select2, etc.
│   ├── js/          # jQuery, Popper, Bootstrap, etc.
│   └── fonts/       # Boxicons
└── img/             # Images and avatars
```

### Navigation Setup

The sidebar automatically highlights the current page based on routes:
```blade
<!-- Active class applied based on route -->
<li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon icon-base bx bx-home-smile"></i>
        <div>Dashboard</div>
    </a>
</li>
```

### Bootstrap 5 Form Examples

Standard form input:
```blade
<div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
           value="{{ old('name') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

Select dropdown:
```blade
<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">Select Category</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</div>
```

Checkbox:
```blade
<div class="form-check mb-3">
    <input type="checkbox" name="is_active" class="form-check-input" id="isActive"
           {{ old('is_active') ? 'checked' : '' }}>
    <label class="form-check-label" for="isActive">
        Active
    </label>
</div>
```

### Bootstrap 5 Table Examples

Data table with actions:
```blade
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <span class="badge bg-label-success">Active</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill" 
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('...edit', $item->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('...delete', $item->id) }}">
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

### Alert Messages

Success alert:
```blade
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your changes have been saved.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
```

Error alert:
```blade
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Something went wrong.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
```

### Icons

Using Boxicons (all available at [boxicons.com](https://boxicons.com)):

```blade
<!-- Menu icons -->
<i class="bx bx-home-smile"></i>          <!-- Home -->
<i class="bx bx-cart-alt"></i>            <!-- Cart -->
<i class="bx bx-book"></i>                <!-- Book -->
<i class="bx bx-mail-send"></i>           <!-- Email -->
<i class="bx bx-cog"></i>                 <!-- Settings -->
<i class="bx bx-user"></i>                <!-- User -->
<i class="bx bx-log-out"></i>             <!-- Logout -->

<!-- Action icons -->
<i class="bx bx-plus"></i>                <!-- Add -->
<i class="bx bx-search"></i>              <!-- Search -->
<i class="bx bx-edit-alt"></i>            <!-- Edit -->
<i class="bx bx-trash"></i>               <!-- Delete -->
<i class="bx bx-show"></i>                <!-- View -->
<i class="bx bx-dots-vertical-rounded"></i> <!-- More -->

<!-- Status icons -->
<i class="bx bxs-star"></i>               <!-- Featured -->
<i class="bx bx-check"></i>               <!-- Checkmark -->
<i class="bx bx-x"></i>                   <!-- Close -->
```

### Color/Status Badges

Success/Active:
```blade
<span class="badge bg-label-success">Active</span>
<span class="badge bg-success">Success</span>
```

Danger/Error:
```blade
<span class="badge bg-label-danger">Inactive</span>
<span class="badge bg-danger">Error</span>
```

Warning:
```blade
<span class="badge bg-label-warning">Pending</span>
```

Info:
```blade
<span class="badge bg-label-info">New</span>
```

## Next Steps for Completion

### 1. Convert Remaining Views
Follow the conversion pattern in `SNEAT_TEMPLATE_INTEGRATION.md` for:
- Form views (categories/form, industries/form, etc.)
- List views (industries, posts, enquiries)
- Detail views (product show, enquiry show)

### 2. Update Components
Convert the three reusable components:
- `components/alert.blade.php` → Use Bootstrap alert classes
- `components/empty-state.blade.php` → Use Bootstrap card structure
- `components/loading-spinner.blade.php` → Use Bootstrap spinners

### 3. Test All Views
After each conversion:
- Check form validation error display
- Test responsive design on mobile
- Verify all buttons and dropdowns work
- Check table sorting/filtering
- Test pagination links

### 4. Remove Tailwind References
Once all views are converted:
- Check if Tailwind CSS is used elsewhere in the app
- Remove from `tailwind.config.js` if not needed
- Remove from `package.json` if not needed
- Remove `@vite` reference from layout if using Bootstrap only

## Browser DevTools Tips

When debugging:
1. **Toggle Sidebar**: Click the hamburger menu or the sidebar toggle
2. **Check Responsive**: Use Chrome DevTools device toolbar
3. **Inspect Forms**: Look for `.form-control` and `.form-select` classes
4. **Table Issues**: Check for `.table-responsive` wrapper
5. **Alert Display**: Verify `.alert` and dismissible classes

## Common Bootstrap 5 Classes Reference

| Component | Class | Example |
|-----------|-------|---------|
| Button | `.btn .btn-primary` | `<button class="btn btn-primary">Click</button>` |
| Form Input | `.form-control` | `<input class="form-control">` |
| Form Select | `.form-select` | `<select class="form-select"></select>` |
| Alert | `.alert .alert-success` | `<div class="alert alert-success">` |
| Badge | `.badge .bg-label-primary` | `<span class="badge bg-label-primary">` |
| Card | `.card` | `<div class="card"><div class="card-body">` |
| Table | `.table .table-hover` | `<table class="table table-hover">` |
| Row | `.row` | `<div class="row">` |
| Column | `.col-md-6` | `<div class="col-md-6">` |

## Support Resources

- **Bootstrap 5 Docs**: https://getbootstrap.com/docs/5.0/
- **Boxicons**: https://boxicons.com/
- **Sneat Demo**: Check `/public/admin/template/` files for examples
- **Integration Guide**: See `SNEAT_TEMPLATE_INTEGRATION.md`

## File Locations

- **Main Layout**: `resources/views/layouts/admin.blade.php`
- **Admin Views**: `resources/views/admin/`
- **Components**: `resources/views/components/`
- **Assets**: `public/admin/assets/`
- **Templates**: `public/admin/template/` (reference only)

## Important Notes

1. The layout file uses `{{ asset('admin/assets/...') }}` - make sure admin assets are in public/admin/assets/
2. All Bootstrap 5 functionality (dropdowns, modals, tooltips) is already included
3. The sidebar navigation is responsive - collapses on mobile
4. Flash messages are displayed automatically in the layout
5. Form validation errors use Bootstrap's `.invalid-feedback` class
6. Icons use Boxicons (bx prefix), not other icon libraries

## Deployment Checklist

- [ ] All views converted to Bootstrap 5
- [ ] All components updated
- [ ] Admin assets exist in `public/admin/assets/`
- [ ] Test in production environment
- [ ] Check responsive design on actual devices
- [ ] Verify all forms work correctly
- [ ] Check database queries for n+1 issues
- [ ] Test with different user roles if applicable
