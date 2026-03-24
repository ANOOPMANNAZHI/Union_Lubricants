@extends('layouts.admin')

@section('title', 'Certifications - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Certifications</h4>
            <p class="text-muted small">Manage certification documents and images</p>
        </div>
        <a href="{{ route('admin.certifications.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Certification
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Files</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certifications as $cert)
                <tr>
                    <td>
                        <strong>{{ $cert->title }}</strong>
                    </td>
                    <td>
                        <small class="text-muted">{{ Str::limit($cert->description, 50) }}</small>
                    </td>
                    <td>
                        @if($cert->pdf_path)
                            <span class="badge bg-label-danger">
                                <i class="bx bx-file me-1"></i> PDF
                            </span>
                        @endif
                        @if($cert->image_path)
                            <span class="badge bg-label-info">
                                <i class="bx bx-image me-1"></i> Image
                            </span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.certifications.edit', $cert->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.certifications.destroy', $cert->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this certification?');">
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
                    <td colspan="4" class="text-center py-5">
                        <p class="text-muted mb-3">No certifications yet</p>
                        <a href="{{ route('admin.certifications.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus me-1"></i> Add First Certification
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($certifications->hasPages())
<div class="mt-3">
    {{ $certifications->links() }}
</div>
@endif

@endsection
