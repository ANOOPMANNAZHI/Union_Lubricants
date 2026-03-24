@extends('layouts.admin')

@section('title', 'Edit Brand - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Edit Brand</h4>
        <p class="text-muted small">Update brand details and logo</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Brand Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name', $brand->name) }}" placeholder="E.g., Shell, Castrol, Mobil, etc." required
                    class="form-control @error('name') is-invalid @enderror" maxlength="255">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" placeholder="Provide a brief description of this brand"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $brand->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Logo -->
            @if($brand->logo)
            <div class="mb-3">
                <label class="form-label">Current Logo</label>
                <div class="p-3 bg-light rounded">
                    <img src="{{ Storage::url($brand->logo) }}" alt="{{ $brand->name }}" class="img-fluid" style="max-height: 150px;">
                </div>
            </div>
            @endif

            <!-- Logo Upload -->
            <div class="mb-3">
                <label class="form-label">Brand Logo {{ $brand->logo ? '(Optional - Leave blank to keep current)' : '' }}</label>
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
                    <i class="bx bx-check me-1"></i> Update Brand
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
