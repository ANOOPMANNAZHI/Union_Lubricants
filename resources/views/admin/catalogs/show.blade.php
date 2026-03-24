@extends('layouts.admin')

@section('title', 'Product Catalog - ' . $catalog->file_name)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">{{ $catalog->file_name }}</h4>
            <p class="text-muted mb-0">Version {{ $catalog->version }}</p>
        </div>
        <div class="btn-group" role="group">
            <a href="{{ route('admin.catalogs.edit', $catalog->id) }}" class="btn btn-primary">
                <i class="bx bx-edit"></i> Edit
            </a>
            <a href="{{ route('admin.catalogs.download', $catalog->id) }}" class="btn btn-success" download>
                <i class="bx bx-download"></i> Download
            </a>
            <a href="{{ route('admin.catalogs.index') }}" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Catalog Details -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">File Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="w-25"><strong>File Name</strong></td>
                                <td>{{ $catalog->file_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Version</strong></td>
                                <td>
                                    <span class="badge bg-label-primary">v{{ $catalog->version }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>File Type</strong></td>
                                <td>
                                    <span class="badge bg-label-info">{{ strtoupper($catalog->file_type) }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Uploaded By</strong></td>
                                <td>{{ $catalog->uploadedByUser?->name ?? 'Unknown' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Uploaded Date</strong></td>
                                <td>
                                    {{ $catalog->created_at->format('F j, Y \a\t g:i A') }}
                                    <br>
                                    <small class="text-muted">{{ $catalog->created_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Last Updated</strong></td>
                                <td>
                                    {{ $catalog->updated_at->format('F j, Y \a\t g:i A') }}
                                    <br>
                                    <small class="text-muted">{{ $catalog->updated_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Description -->
            @if ($catalog->description)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ nl2br(e($catalog->description)) }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Actions Sidebar -->
        <div class="col-md-4">
            <!-- Quick Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body d-grid gap-2">
                    <a href="{{ route('admin.catalogs.download', $catalog->id) }}" class="btn btn-lg btn-success"
                        download>
                        <i class="bx bx-download"></i> Download File
                    </a>
                    <a href="{{ route('admin.catalogs.edit', $catalog->id) }}" class="btn btn-lg btn-primary">
                        <i class="bx bx-edit"></i> Edit Details
                    </a>

                    <form method="POST" action="{{ route('admin.catalogs.destroy', $catalog->id) }}"
                        onsubmit="return confirm('Are you sure you want to delete this catalog? This action cannot be undone.');"
                        class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-lg btn-danger w-100">
                            <i class="bx bx-trash"></i> Delete Catalog
                        </button>
                    </form>
                </div>
            </div>

            <!-- Version History -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Version History</h5>
                </div>
                <div class="card-body">
                    @php
                        $allVersions = App\Models\ProductCatalog::orderByDesc('version')->limit(10)->get();
                    @endphp

                    @forelse($allVersions as $version)
                        <div class="mb-3 pb-3 @if (!$loop->last) border-bottom @endif">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1">
                                        <strong>
                                            v{{ $version->version }}
                                            @if ($version->id === $catalog->id)
                                                <span class="badge bg-success">Current</span>
                                            @endif
                                        </strong>
                                    </p>
                                    <small class="text-muted d-block">{{ $version->created_at->format('M d, Y') }}</small>
                                </div>
                                @if ($version->id !== $catalog->id)
                                    <a href="{{ route('admin.catalogs.show', $version->id) }}" class="btn btn-sm btn-text-primary">
                                        View
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="small text-muted mb-0">No previous versions</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
