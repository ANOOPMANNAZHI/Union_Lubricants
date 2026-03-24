@extends('layouts.admin')

@section('title', 'Create Brand - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Create Brand</h4>
        <p class="text-muted small">Add a new brand for organizing product catalogs</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Brand Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="E.g., Shell, Castrol, Mobil, etc." required
                    class="form-control @error('name') is-invalid @enderror" maxlength="255">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" placeholder="Provide a brief description of this brand"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Logo Upload -->
            <div class="mb-3">
                <label class="form-label">Brand Logo</label>
                <input type="file" name="logo" accept="image/jpeg,image/png,image/gif"
                    class="form-control @error('logo') is-invalid @enderror">
                <small class="text-muted d-block mt-2">
                    <i class="bx bx-info-circle"></i> Max 2MB (JPEG, PNG, GIF)
                </small>
                @error('logo')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Create Brand
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
