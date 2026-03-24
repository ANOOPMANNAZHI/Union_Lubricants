@extends('layouts.admin')

@section('title', 'Services - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Services</h4>
            <p class="text-muted small">Manage company services and offerings</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Service
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Description</th>
                    <th class="text-center">Image</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>
                        <strong>{{ $service->title }}</strong>
                    </td>
                    <td>
                        @if($service->icon)
                            <i class="bx {{ $service->icon }}" style="font-size: 1.5rem;"></i>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </td>
                    <td>
                        <small class="text-muted">{{ Str::limit($service->description, 60) }}</small>
                    </td>
                    <td class="text-center">
                        @if($service->image_path)
                            <span class="badge bg-label-success">
                                <i class="bx bx-image me-1"></i> Yes
                            </span>
                        @else
                            <span class="badge bg-label-secondary">No</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                        <p class="text-muted mb-3">No services yet</p>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus me-1"></i> Add First Service
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($services->hasPages())
<div class="mt-3">
    {{ $services->links() }}
</div>
@endif

@endsection
