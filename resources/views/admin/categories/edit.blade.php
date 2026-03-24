@extends('layouts.admin')

@section('title', 'Edit Category - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Edit Category</h4>
        <p class="text-muted small">Update category details</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" placeholder="E.g., Coolants, Engine Oils, etc." required
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" placeholder="Describe what products fall under this category"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-check mb-3 p-3 bg-light rounded">
                <input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input"
                    {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    <strong>Published</strong>
                    <p class="text-muted small mb-0">This category will be visible on the frontend</p>
                </label>
            </div>

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Update Category
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
