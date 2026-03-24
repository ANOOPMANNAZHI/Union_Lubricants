@extends('layouts.admin')

@section('title', 'Banners - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Banners</h4>
            <p class="text-muted small">Manage website banners (1920x960px recommended)</p>
        </div>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Banner
        </a>
    </div>
</div>


<div class="row">
    @forelse($banners as $banner)
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->heading }}"
                class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">{{ $banner->heading }}</h5>
                <p class="card-text text-muted small">{{ Str::limit($banner->description, 100) }}</p>
                <div class="text-muted small mb-3">
                    <i class="bx bx-calendar"></i> {{ $banner->created_at->format('M d, Y') }}
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-outline-primary flex-grow-1">
                        <i class="bx bx-pencil"></i> Edit
                    </a>
                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="flex-grow-1"
                        onsubmit="return confirm('Are you sure you want to delete this banner?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                            <i class="bx bx-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <p class="text-muted mb-3">No banners yet</p>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> Create First Banner
                </a>
            </div>
        </div>
    </div>
    @endforelse
</div>

@if($banners->hasPages())
<div class="mt-4">
    {{ $banners->links() }}
</div>
@endif

@endsection
