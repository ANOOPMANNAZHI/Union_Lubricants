@extends('layouts.admin')

@section('title', 'Product Catalogs')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Product Catalogs</h4>
        <a href="{{ route('admin.catalogs.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Upload New Catalog
        </a>
    </div>

    <!-- Alert Messages -->
    @if ($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Catalogs Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>File Name</th>
                        <th>Type</th>
                        <th>Version</th>
                        <th>Uploaded By</th>
                        <th>Uploaded Date</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($catalogs as $catalog)
                        <tr>
                            <td>
                                <strong>{{ Str::limit($catalog->file_name, 30) }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-label-info">{{ strtoupper($catalog->file_type) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-label-primary">v{{ $catalog->version }}</span>
                            </td>
                            <td>
                                {{ $catalog->uploadedByUser?->name ?? 'Unknown' }}
                            </td>
                            <td>
                                <small class="text-muted">{{ $catalog->created_at->format('M d, Y H:i') }}</small>
                            </td>
                            <td>
                                <small>{{ Str::limit($catalog->description, 50) ?? '—' }}</small>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.catalogs.show', $catalog->id) }}">
                                                <i class="bx bx-show me-2"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.catalogs.download', $catalog->id) }}" download>
                                                <i class="bx bx-download me-2"></i> Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.catalogs.edit', $catalog->id) }}">
                                                <i class="bx bx-edit me-2"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('admin.catalogs.destroy', $catalog->id) }}"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Are you sure you want to delete this catalog?')">
                                                    <i class="bx bx-trash me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bx bx-file" style="font-size: 3rem; opacity: 0.3;"></i>
                                    <p class="mt-3">No product catalogs uploaded yet.</p>
                                    <a href="{{ route('admin.catalogs.create') }}" class="btn btn-primary btn-sm">
                                        Upload First Catalog
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($catalogs->hasPages())
            <div class="card-footer">
                {{ $catalogs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
