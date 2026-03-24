@extends('layouts.admin')

@section('title', 'Upload Product Catalog')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="mb-4">
        <h4 class="mb-1">Upload New Product Catalog</h4>
        <p class="text-muted">Upload a product catalog file (PDF, Excel, or CSV)</p>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validation Errors!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.catalogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- File Upload Field -->
                        <div class="mb-4">
                            <label class="form-label" for="file">
                                <strong>Catalog File</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file" accept=".pdf,.xlsx,.xls,.csv" required
                                    onchange="updateFileInfo(this)">
                                <label class="input-group-text" for="file">
                                    <i class="bx bx-cloud-upload"></i> Browse
                                </label>
                            </div>

                            @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <small class="text-muted d-block mt-2">
                                <strong>Accepted formats:</strong> PDF, Excel (.xlsx, .xls), CSV
                                <br>
                                <strong>Maximum file size:</strong> 10 MB
                            </small>
                        </div>

                        <!-- File Info Display -->
                        <div id="fileInfo" class="alert alert-info d-none mb-4" role="alert">
                            <strong>File Information:</strong>
                            <div class="mt-2">
                                <p class="mb-1"><strong>Name:</strong> <span id="fileName">—</span></p>
                                <p class="mb-1"><strong>Size:</strong> <span id="fileSize">—</span></p>
                                <p class="mb-0"><strong>Type:</strong> <span id="fileType">—</span></p>
                            </div>
                        </div>

                        <!-- Brand Selection -->
                        <div class="mb-4">
                            <label class="form-label" for="brand_id">
                                Associated Brand
                            </label>
                            <select class="form-select @error('brand_id') is-invalid @enderror"
                                id="brand_id" name="brand_id">
                                <option value="">-- Select a brand (optional) --</option>
                                @forelse($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @empty
                                    <option disabled>No brands available</option>
                                @endforelse
                            </select>

                            @error('brand_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <small class="text-muted d-block mt-2">
                                Optionally associate this catalog with a brand.
                            </small>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label class="form-label" for="description">
                                Description (Optional)
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="4"
                                placeholder="Enter catalog description, notes, or version information...">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror

                            <small class="text-muted d-block mt-2">
                                Max 1000 characters. Use this field to add notes about the catalog content or version details.
                            </small>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-upload"></i> Upload Catalog
                            </button>
                            <a href="{{ route('admin.catalogs.index') }}" class="btn btn-secondary">
                                <i class="bx bx-x"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bx bx-info-circle"></i> Upload Guidelines
                    </h6>

                    <div class="mb-3">
                        <h6 class="text-muted">File Formats</h6>
                        <ul class="list-unstyled small">
                            <li><i class="bx bx-check text-success"></i> PDF (.pdf)</li>
                            <li><i class="bx bx-check text-success"></i> Excel (.xlsx, .xls)</li>
                            <li><i class="bx bx-check text-success"></i> CSV (.csv)</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">File Size</h6>
                        <p class="small mb-0">Maximum: <strong>10 MB</strong></p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Version Control</h6>
                        <p class="small mb-0">Each upload automatically increments the version number. Previous versions are kept for reference.</p>
                    </div>

                    <div class="alert alert-info small mb-0">
                        <strong>Tip:</strong> Use descriptive names and add notes in the description field to help track catalog updates.
                    </div>
                </div>
            </div>

            <!-- Recent Uploads -->
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bx bx-history"></i> Recent Uploads
                    </h6>

                    @php
                        $recentCatalogs = App\Models\ProductCatalog::latest('created_at')->limit(5)->get();
                    @endphp

                    @forelse($recentCatalogs as $recent)
                        <div class="mb-2 pb-2 border-bottom">
                            <p class="small mb-1">
                                <strong>v{{ $recent->version }}</strong>
                            </p>
                            <small class="text-muted d-block">{{ $recent->created_at->diffForHumans() }}</small>
                        </div>
                    @empty
                        <p class="small text-muted mb-0">No previous uploads</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileInfo(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const fileType = document.getElementById('fileType');

            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            fileType.textContent = file.type || 'Unknown';

            fileInfo.classList.remove('d-none');
        }
    }

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
</script>
@endsection
