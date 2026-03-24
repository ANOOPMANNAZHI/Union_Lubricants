@extends('layouts.admin')

@section('title', $category->name . ' - Category')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-start">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Categories /</span> {{ $category->name }}</h4>
            <p class="text-muted small">Category created on {{ $category->created_at->format('M d, Y') }}</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back me-1"></i> Back to Categories
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Category Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Category Name</p>
                    <h6 class="fw-semibold">{{ $category->name }}</h6>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Slug</p>
                    <code class="text-body">{{ $category->slug }}</code>
                </div>

                <div>
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Description</p>
                    <p class="text-body">{{ $category->description ?? 'No description provided' }}</p>
                </div>
            </div>
        </div>

        <!-- Products in Category -->
        @if($category->products->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Products in This Category</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Code</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->products as $product)
                        <tr>
                            <td>
                                <strong>{{ $product->name }}</strong>
                            </td>
                            <td>
                                <code class="text-muted">{{ $product->code }}</code>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bx bx-show"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Status</h6>
            </div>
            <div class="card-body">
                @if($category->is_active)
                    <span class="badge bg-label-success">
                        <i class="bx bx-check-circle me-1"></i> Published
                    </span>
                @else
                    <span class="badge bg-label-secondary">
                        <i class="bx bx-x-circle me-1"></i> Unpublished
                    </span>
                @endif
            </div>
        </div>

        <!-- Metadata Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <p class="text-muted small mb-1">Created</p>
                    <p class="small">{{ $category->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-muted small mb-1">Updated</p>
                    <p class="small">{{ $category->updated_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-muted small mb-1">Products</p>
                    <p class="small">
                        <span class="badge bg-label-info">{{ $category->products->count() }}</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Actions Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info w-100 mb-2">
                    <i class="bx bx-pencil me-1"></i> Edit Category
                </a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this category?')">
                        <i class="bx bx-trash me-1"></i> Delete Category
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
