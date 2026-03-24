@extends('layouts.admin')

@section('title', $brand->name . ' - Brand')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-start">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Brands /</span> {{ $brand->name }}</h4>
            <p class="text-muted small">Brand created on {{ $brand->created_at->format('M d, Y') }}</p>
        </div>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back me-1"></i> Back to Brands
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Brand Details Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Brand Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Brand Name</p>
                    <h6 class="fw-semibold">{{ $brand->name }}</h6>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Slug</p>
                    <code class="text-body">{{ $brand->slug }}</code>
                </div>

                @if($brand->logo_path)
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Logo</p>
                    <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" class="img-fluid" style="max-height: 200px;">
                </div>
                @endif

                <div>
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Description</p>
                    <p class="text-body">{{ $brand->description ?? 'No description provided' }}</p>
                </div>
            </div>
        </div>

        <!-- Catalogs Related to Brand -->
        @if($catalogs && $catalogs->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Associated Catalogs</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>File Name</th>
                            <th>Version</th>
                            <th>Type</th>
                            <th>Uploaded</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catalogs as $catalog)
                        <tr>
                            <td>
                                <strong>{{ $catalog->file_name }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-label-primary">v{{ $catalog->version }}</span>
                            </td>
                            <td>
                                <span class="badge bg-label-info">{{ strtoupper($catalog->file_type) }}</span>
                            </td>
                            <td class="text-muted small">
                                {{ $catalog->created_at->format('M d, Y') }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.catalogs.show', $catalog->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bx bx-show"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($catalogs && $catalogs->hasPages())
            <div class="card-footer">
                {{ $catalogs->links() }}
            </div>
            @endif
        </div>
        @else
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="bx bx-inbox text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-3">No catalogs associated with this brand yet.</p>
            </div>
        </div>
        @endif
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Metadata Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <p class="text-muted small mb-1">Created</p>
                    <p class="small">{{ $brand->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-muted small mb-1">Updated</p>
                    <p class="small">{{ $brand->updated_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-muted small mb-1">Associated Catalogs</p>
                    <p class="small">
                        <span class="badge bg-label-info">{{ $catalogs ? $catalogs->total() : 0 }}</span>
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
                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-info w-100 mb-2">
                    <i class="bx bx-pencil me-1"></i> Edit Brand
                </a>
                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this brand?')">
                        <i class="bx bx-trash me-1"></i> Delete Brand
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
