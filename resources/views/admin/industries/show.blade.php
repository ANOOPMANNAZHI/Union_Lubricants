@extends('layouts.admin')

@section('title', $industry->name . ' - Industry')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-start">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Industries /</span> {{ $industry->name }}</h4>
            <p class="text-muted small">Industry created on {{ $industry->created_at->format('M d, Y') }}</p>
        </div>
        <a href="{{ route('admin.industries.index') }}" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back me-1"></i> Back to Industries
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Industry Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Industry Name</p>
                    <h6 class="fw-semibold">{{ $industry->name }}</h6>
                </div>

                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Slug</p>
                    <code class="text-body">{{ $industry->slug }}</code>
                </div>

                <div>
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Description</p>
                    <p class="text-body">{{ $industry->description ?? 'No description provided' }}</p>
                </div>
            </div>
        </div>

        <!-- Products in Industry -->
        @if($industry->products->count() > 0)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Products Using This Industry</h5>
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
                        @foreach($industry->products as $product)
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
        <!-- Metadata Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <p class="text-muted small mb-1">Created</p>
                    <p class="small">{{ $industry->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-muted small mb-1">Updated</p>
                    <p class="small">{{ $industry->updated_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-muted small mb-1">Products</p>
                    <p class="small">
                        <span class="badge bg-label-info">{{ $industry->products->count() }}</span>
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
                <a href="{{ route('admin.industries.edit', $industry->id) }}" class="btn btn-info w-100 mb-2">
                    <i class="bx bx-pencil me-1"></i> Edit Industry
                </a>
                <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this industry?')">
                        <i class="bx bx-trash me-1"></i> Delete Industry
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
