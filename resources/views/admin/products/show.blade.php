@extends('layouts.admin')

@section('page_title', 'View Product')
@section('title', $product->name . ' - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h4 class="py-3 mb-0">{{ $product->name }}</h4>
                <p class="text-muted small">Code: {{ $product->code }} | Category: {{ $product->category->name }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit me-1"></i> Edit
                </a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Basic Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Basic Information</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted">Product Code</label>
                        <p class="text-body">{{ $product->code }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Category</label>
                        <p class="text-body">{{ $product->category->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Viscosity Grade</label>
                        <p class="text-body">{{ $product->viscosity_grade ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted">Status</label>
                        <div>
                            @if($product->is_active)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-secondary">Inactive</span>
                            @endif

                            @if($product->is_featured)
                                <span class="badge bg-label-warning"><i class="bx bxs-star"></i> Featured</span>
                            @endif
                        </div>
                    </div>
                    @if($product->short_description)
                        <div class="col-12">
                            <label class="form-label text-muted">Short Description</label>
                            <p class="text-body">{{ $product->short_description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Detailed Information -->
        @if($product->description || $product->specifications || $product->applications)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Detailed Information</h5>
                </div>
                <div class="card-body">
                    @if($product->description)
                        <div class="mb-3">
                            <label class="form-label text-muted">Description</label>
                            <p class="text-body">{!! nl2br(e($product->description)) !!}</p>
                        </div>
                    @endif

                    @if($product->specifications)
                        <div class="mb-3">
                            <label class="form-label text-muted">Specifications</label>
                            <p class="text-body">{!! nl2br(e($product->specifications)) !!}</p>
                        </div>
                    @endif

                    @if($product->applications)
                        <div>
                            <label class="form-label text-muted">Applications</label>
                            <p class="text-body">{!! nl2br(e($product->applications)) !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Pack Sizes -->
        @if($product->pack_sizes)
            @php
                $packSizes = is_array($product->pack_sizes) ? $product->pack_sizes : explode(',', $product->pack_sizes);
                $packSizes = array_map('trim', $packSizes);
            @endphp
            @if(count($packSizes) > 0)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Available Pack Sizes</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($packSizes as $size)
                            <span class="badge bg-label-info">{{ $size }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        @endif

        <!-- Industries -->
        @if($product->industries->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Industries</h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        @foreach($product->industries as $industry)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center bg-light px-3 py-2 rounded">
                                    <i class="bx bx-check-circle text-success me-2"></i>
                                    <span class="text-body small">{{ $industry->name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Product Image -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Product Image</h5>
            </div>
            <div class="card-body">
                @if($product->image_path)
                    <div class="bg-light rounded p-3">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-100 rounded">
                        <p class="text-muted small text-center mt-3 mb-0">{{ basename($product->image_path) }}</p>
                    </div>
                @else
                    <div class="bg-light rounded p-5 text-center">
                        <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                        <p class="text-muted mt-3 mb-0">No image uploaded</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Documentation -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Documentation</h5>
            </div>
            <div class="card-body">
                <!-- TDS PDF -->
                <div class="mb-3">
                    <label class="form-label text-muted">Technical Data Sheet</label>
                    @if($product->tds_pdf)
                        <a href="{{ asset('storage/' . $product->tds_pdf) }}" target="_blank" download class="btn btn-sm btn-outline-primary w-100">
                            <i class="bx bx-download me-1"></i> Download TDS
                        </a>
                        <p class="text-muted small mt-2 mb-0">{{ basename($product->tds_pdf) }}</p>
                    @else
                        <p class="text-muted small">Not available</p>
                    @endif
                </div>

                <!-- MSDS PDF -->
                <div>
                    <label class="form-label text-muted">Material Safety Data Sheet</label>
                    @if($product->msds_pdf)
                        <a href="{{ asset('storage/' . $product->msds_pdf) }}" target="_blank" download class="btn btn-sm btn-outline-danger w-100">
                            <i class="bx bx-download me-1"></i> Download MSDS
                        </a>
                        <p class="text-muted small mt-2 mb-0">{{ basename($product->msds_pdf) }}</p>
                    @else
                        <p class="text-muted small">Not available</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Metadata -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Metadata</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Created</label>
                    <p class="text-body small">{{ $product->created_at->format('M d, Y H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Last Updated</label>
                    <p class="text-body small">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted">Product ID</label>
                    <p class="text-body small font-monospace">{{ $product->id }}</p>
                </div>

                <div>
                    <label class="form-label text-muted">Slug</label>
                    <p class="text-body small font-monospace">{{ $product->slug }}</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100 mb-2">
                <i class="bx bx-trash me-1"></i> Delete Product
            </button>
        </form>

        <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="btn btn-success w-100">
            <i class="bx bx-show me-1"></i> View on Frontend
        </a>
    </div>
</div>

@endsection
