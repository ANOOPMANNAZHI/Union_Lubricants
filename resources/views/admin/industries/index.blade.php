@extends('layouts.admin')

@section('title', 'Industries - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Industries</h4>
            <p class="text-muted small">Manage product industries and categories</p>
        </div>
        <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Add Industry
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th class="text-center">Products</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($industries as $industry)
                <tr>
                    <td>
                        <strong>{{ $industry->name }}</strong>
                    </td>
                    <td>
                        <code class="text-muted">{{ $industry->slug }}</code>
                    </td>
                    <td>
                        <small class="text-muted">{{ Str::limit($industry->description, 50) }}</small>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-label-info">{{ $industry->products_count ?? 0 }}</span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.industries.edit', $industry->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.industries.destroy', $industry->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this industry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bx bx-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <p class="text-muted mb-3">No industries found</p>
                        <a href="{{ route('admin.industries.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus me-1"></i> Create First Industry
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($industries->hasPages())
<div class="mt-3">
    {{ $industries->links() }}
</div>
@endif

@endsection
